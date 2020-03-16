<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Nexmo\Laravel\Facade\Nexmo;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function authenticated(Request $request, Authenticatable $user)
    {
//        Auth::logout();
//        $verification = Nexmo::verify()->start([
//                'number' => $user->phone_number,
//                'brand'  => 'Laravel Demo'
//        ]);
       // Session::put('verify:user:id', $user->id);

        if ($request->ajax()){

            return response()->json([
                'auth' => auth()->check(),
                'user' => $user,
                'intended' => $this->redirectPath(),
            ]);

        }

        $request->session()->put('verify:user:id', $user->id);
        return redirect('/');
    }


    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }

//
//    public function validate(Request $request, array $rules, array $messages = [], array $customAttributes = [])
//    {
//    }


    public function showLogin()
    {
    // show the form
        return View::make('login');
    }



    protected function getFailedLoginMessage()
    {
        return 'Неправильный пароль или email';
    }


}
