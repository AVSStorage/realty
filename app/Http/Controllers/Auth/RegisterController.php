<?php

namespace App\Http\Controllers\Auth;

use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Nexmo\Client;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorRoleClient(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => 'required|size:11|unique:users|regex:/^(7)/'
        ]);
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Поле имени является обяхательным',
            'email.required'  => 'Поле почта является обязательным',
            'phone_number.size' => 'Количество символов должно быть равно 11',
            'phone_number.regex' => 'Маска телефонного номера начинается с 7'
        ];
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorRoleOwner(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
        ]);
    }

    public function redirectPath()
    {
        return '/';
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function validateWith($validator, Request $request = null)
    {
        $validator->after(function ($validator) {
            if ($this->somethingElseIsInvalid()) {
                dd($validator->errors());
            }
        });
    }

    public function register(Request $request)
    {

        if ((int)$request->type === 1){

            $this->validatorRoleClient($request->all())->validate();
        $this->guard()->login($this->createRoleClient($request->all()));
        return redirect($this->redirectPath());

        } else {



            $this->validatorRoleOwner($request->all())->validate();
            $this->guard()->login($this->createRoleOwner($request->all()));
            return redirect($this->redirectPath());
        }


    }




    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function createRoleOwner(array $data)
    {

        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
        $password = substr($random, 0, 10);


        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'country' => $data['country'],
            'region' => $data['region'],
            'city' => $data['city'],
            'sex' => $data['sex'],
            'email' => $data['email'],
            'password' =>  Hash::make($password),
          //  'phone_number' => $data['phone_number']
        ]);


        $role = new Role();


        $user->roles()->attach('1');

        $user->sendEmailVerificationNotification($user, $password);

        return $user;
    }


    public function sendMessage($number, $message){
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new \Twilio\Rest\Client($account_sid, $auth_token);
        $client->messages->create("+". $number,
            ['from' => $twilio_number, 'body' => $message] );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function createRoleClient(array $data)
    {
        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
        $password = substr($random, 0, 10);



        //$this->sendMessage($data['phone_number'],'Вы зарегистрированы на сайте Zabroniroval.ru.Ваш пароль для входа '.$password.'. URL: http://progect-9.network-pro.ru/');
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => isset($data['password']) ? Hash::make($data['password']) : Hash::make($password),
            'phone_number' => $data['phone_number']
        ]);

        $role = new Role();
        $user->roles()->attach('2');

       // $user->sendEmailVerificationNotification($user, $password);


        return $user;
    }
}
