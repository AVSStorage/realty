<?php

namespace App\Http\Controllers;

use App\Mail\OrderAlert;
use App\Notifications\OrderMade;
use App\Objects;
use App\Orders;
use App\Role;
use Twilio\Rest\Client;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class OrdersController extends Controller
{
    public function updateStatus(Request $request){
        $order = new Orders();
        $orderId= \Route::current()->parameter('order_id');
        $order->where('id',$orderId)->update(['status' => $request->get('status') ]);
    }

    public function createOrderAndUser(Request $request){

        $data = json_decode($request->getContent(), true);

        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
        $password = substr($random, 0, 10);

        $locking = DB::table('object_locking')->where('object_id',$data['object_id'])->whereBetween('date_from',[$data['date_from'], $data['date_to']])->whereBetween('date_to',[$data['date_from'],$data['date_to']])->get()->count();

        $parents = 0;
        $children = 0;
        if ($request->session()->has('order')){

            $parents = $request->session()->get('order')[0]['guests'];
            $children = isset($request->session()->get('order')[0]['children']->count) ? $request->session()->get('order')[0]['children']->count : 0 ;
        }

      //  $this->sendMessage($data['phone_number'], 'Вы зарегистрированы на сайте Zabroniroval.ru.Ваш пароль для входа '.$password.'. URL: http://progect-9.network-pro.ru/ ');

        if ((int)$data['parents'] || $parents) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => isset($data['password']) ? Hash::make($data['password']) : Hash::make($password),
                'phone_number' => $data['phone_number']
            ]);
            $user->roles()->attach('2');

            $user->sendEmailVerificationNotification($user, $password);


            Auth::loginUsingId($user->getAttribute('id'));


        $object = new Objects();
        $objUser = $object->leftJoin('users','objects.user_id','=','users.id')->where('objects.id',$data['object_id'])->get(['phone_number', 'email','objects.id'])->toArray()[0];
//        if ($objUser['phone_number']) {
//            $this->sendMessage($objUser['phone_number'], 'Ваш объект № '.$objUser['id'].' был забронирован. Смотреть http://progect-9.network-pro.ru/dashboard');
//        }



      //  (new OrderAlert($object->where('objects.id',$data['object_id'])->first()))->to($objUser['email']);

        if ($locking === 0) {

            $data['parents'] = (int)$data['parents'] ? (int)$data['parents'] : (int)$parents;
            $data['children'] = (int)$data['children'] ? (int)$data['children'] : (int)$children;
            $data['totalPrice'] = (int)$data['totalPrice'];
            Orders::create(array_merge($data, ['user_id' => $user->getAttribute('id')]));
            return ["error" => false];
        } else {
            return ["error" => "Даты, которые Вы выбрали содержат заблокированные владельцем.Выберите пожалуйста снова."];
        }
        } else {
            return ['error' => "У Вас не выбрано количество гостей"];
        }
    }



    public function makeOrder(Request $request){
        $data = $request->all();
        $order = new Orders();
        $order->where('orders.id',$data['orderId'])->update(['status' => 1, 'totalPrice' => $data['price']]);
        $when = now()->addMinutes(10);
        //$order->notify((new OrderMade($order->where('orders.id',$data['orderId'])->first()))->delay($when));
    }

    public function sendMessage($number, $message){
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create("+". $number,
            ['from' => $twilio_number, 'body' => $message] );
    }

    public function sendWhatsapp($number, $message){
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create("whatsapp:+". $number,
            ['from' => "whatsapp:".$twilio_number, 'body' => $message] );
    }


    public function createOrder(Request $request){
        $order = new Orders();
        $data = json_decode($request->getContent(), true);
        $user = \Auth::user()->getAuthIdentifier();
        $locking = DB::table('object_locking')->where('object_id',$data['object_id'])->whereBetween('date_from',[$data['date_from'], $data['date_to']])->whereBetween('date_to',[$data['date_from'],$data['date_to']])->get()->count();
        $parents = 0;
        $children = 0;
        if ($locking === 0) {
            if ($request->session()->has('order')){

                $parents = $request->session()->get('order')[0]['guests'];
                $children = isset($request->session()->get('order')[0]['children']->count) ? $request->session()->get('order')[0]['children']->count : 0 ;
            }


            if ((int)$data['parents'] || $parents) {

                $data['parents'] = (int)$data['parents'] ? (int)$data['parents'] : (int)$parents;
                $data['children'] = (int)$data['children'] ? (int)$data['children'] : (int)$children;
                $data['totalPrice'] = (int)$data['totalPrice'];

                Orders::updateOrCreate(['object_id' => $data['object_id'], 'user_id' => $user], array_merge($data, ['user_id' => $user]));


                $object = new Objects();
                $objUser = $object->leftJoin('users', 'objects.user_id', '=', 'users.id')->where('objects.id', $data['object_id'])->get(['phone_number', 'email', 'objects.id'])->toArray()[0];
            } else {
                return ['error' => "У Вас не выбрано количество гостей"];
            }
//            if ($objUser['phone_number']) {
//                $this->sendMessage($objUser['phone_number'], 'Ваш объект № '.$objUser['id'].' был забронирован. Смотреть http://progect-9.network-pro.ru/dashboard');
//            }

           // $this->sendWhatsapp($data['phone_number'],"Вы оставили заявку на сайте Zabroniroval.ru." );
            return ['error' => false];
        } else {
            return ['error' => "Даты, которые Вы выбрали содержат заблокированные владельцем.Выберите пожалуйста снова."];
        }
    }
}
