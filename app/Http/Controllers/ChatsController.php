<?php

namespace App\Http\Controllers;

use App\Events\MessageDelivery;
use App\Events\MessageSent;
use App\Message;
use App\Objects;
use App\ObjectSubTypes;
use App\Orders;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;

class ChatsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('chat');
    }

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages($id)
    {
        return Message::with('user')->where('order_id','=',$id)->get();
    }

    /**
     * Update Status
     *
     * @param  Request $request
     * @return Response
     */
    public function updateMessageStatus($user_id) {
        $user = Auth::user();


        $message = $user->messages()->update([
            'status' => 1
        ]);



        broadcast(new MessageDelivery($user, Route::current()->parameter('user_id')));

        return ['status' => 1];
    }

    public function getCounter(){
        $user = Auth::user();
        $order = new Orders();
        $counter =  $order->where('user_id','=',$user->getAuthIdentifier())->get()->count();
        if ($user->hasRole('owner')){
            $counter += $order->leftJoin('objects','objects.id','=','orders.object_id')->where('objects.user_id','=',$user->getAuthIdentifier())->get()->count();
        }
        return $counter;
    }




    public function show(){
        $counter = $this->getCounter();
        $orderId = Route::current()->parameter('id');
        $object_id = Route::current()->parameter('object_id');
        $user = Auth::user();

        $data = $user->objects()->with(['objectService' => function ($query) {
            $query->whereRaw('service_id  IN (4,16,204,205)');
        }])->where('objects.id','=',$object_id)->get()->toArray();




        $string = '';
        $address= [];
        $types = ObjectSubTypes::all()->toArray();
        foreach ($data as $item) {
            foreach ($item['object_service'] as $service) {


                if ((int)$service['service_id'] === 4) {
                    $string = $types[$item['type'] - 1]['name'].' - на ул ' .
                        $item['string'];
                }  if ((int)$service['service_id'] === 16) {
                    $string .= ' - ' . $service['value'] . ' м²';
                }
            }
            $address[$item['id']] = $string;
            $string = '';
        }

        $order = new Orders();

        $orderInfo = $order->where('id','=',$orderId)->get()->toArray();

        $dateFrom = $this->generateDate($orderInfo[0]['date_from']);
        $dateTo = $this->generateDate($orderInfo[0]['date_to']);

        $days = $this->getDaysBetweenDates($orderInfo[0]['date_from'], $orderInfo[0]['date_to']);
        $object = new Objects();
        $price = $object->leftJoin('object_service','objects.id','=','object_id')->where('object_id','=',$object_id)->where('service_id','=',204)->get(['value'])->toArray();

        $price = (int)$price[0]['value'] * $days;

        $payment = $price * 0.15;

        $data = [['object_service' => $order->leftJoin('objects','objects.id','=','orders.object_id')->leftJoin('object_service','object_service.object_id','=','objects.id')->where('orders.user_id','=',$user->getAttribute('id'))->whereRaw('service_id  IN (4,16,204,205)')->get(['service_id','object_service.object_id','value','type','string'])->toArray()]];

        foreach ($data as $item) {
            foreach ($item['object_service'] as $service) {



                if ((int)$service['service_id'] === 4) {
                    $string = $types[$service['type'] - 1]['name'].' - на ул ' .
                        $service['string'];
                }  if ((int)$service['service_id'] === 16) {
                    $string .= ' - ' . $service['value'] . ' м²';
                }

                $address[$service['object_id']] = $string;

            }
            $string='';

        }

        return view('chat')->with('counter', $counter)->with('orderId', $orderId)->with('objectId',$object_id)->with('address', $address[$object_id])->with('orderInfo', $orderInfo )
            ->with('dateFrom', $dateFrom)->with('dateTo', $dateTo)->with('price', $price)->with('days', $days)->with('payment', $payment);
    }


    public function getDaysBetweenDates($dateFrom,$dateTo){
        $dateFrom = new Carbon($dateFrom);
        $dateTo = new Carbon($dateTo);
        return $dateTo->diffInDays($dateFrom);
    }

    public function generateDate($dateVar) {
        $months = array( 'января' , 'февраля' , 'марта' , 'апреля' , 'мая' , 'июня' , 'июля' , 'августа' , 'сентября' , 'октября' , 'ноября' , 'декабря' );
        $date = Date::createFromTimestamp(strtotime($dateVar));
        $date = $date->day.' '.$months[$date->month - 1].' '.$date->year;
        return $date;
    }


    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {
        $user = new User();

        $currentUser = Auth::user();
        $data = json_decode($request->getContent(), true);

        $message = $currentUser->messages()->create([
            'message' => $data['message'],
            'objects_id' => $data['object_id'],
            'order_id' => (int)$data['order_id']
        ]);

        $orders = new Orders();

        $order = $orders->where('id','=',(int)$data['order_id'])->first();

    broadcast(new MessageSent($currentUser, $message, $order))->toOthers();

        return ['status' => 0];
    }
}
