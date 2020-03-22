<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\User;

Route::resource('/', 'IndexController',['only' => ['index', 'show','update']])->names([
    'index' => 'index'
]);

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/rating', 'Ajax\RaitingController@send')->middleware(\App\Http\Middleware\OnlyAjax::class);
Route::get('/objects/names', 'Ajax\ObjectController@sendNames')->middleware(\App\Http\Middleware\OnlyAjax::class);
Route::get('/objects/values', 'Ajax\ObjectController@sendValues')->middleware(\App\Http\Middleware\OnlyAjax::class);
Route::get('/objects/objects', 'Ajax\ObjectController@sendObjects')->middleware(\App\Http\Middleware\OnlyAjax::class);
Route::get('/objects/filters', 'Ajax\ObjectController@sendFilters')->middleware(\App\Http\Middleware\OnlyAjax::class);
Route::get('/objects/images', 'Ajax\ObjectController@sendImages')->middleware(\App\Http\Middleware\OnlyAjax::class);
Route::post('/objects/photo', 'Ajax\ObjectController@uploadImage')->middleware(\App\Http\Middleware\OnlyAjax::class);
Route::get('/object/subtypes', 'Ajax\ObjectController@getSubTypes')->middleware(\App\Http\Middleware\OnlyAjax::class);

Route::get('/objects/objects/max', 'Ajax\ObjectController@sendMaxObjectCount')->middleware(\App\Http\Middleware\OnlyAjax::class);
Route::post('/objects/hide/{object_id}', 'Ajax\ObjectController@hideObject')->middleware(\App\Http\Middleware\OnlyAjax::class);
Route::post('/objects/update/prepay', 'Ajax\ObjectController@updatePrepay')->middleware(\App\Http\Middleware\OnlyAjax::class);
Route::post('/user/avatar', 'OwnerDashboard@updateSettings');
Route::get('/dashboard/messages', 'OwnerDashboard@sendMessages');
Route::get('/dashboard/settings', 'OwnerDashboard@editSettings');
Route::post('/dashboard/settings', 'OwnerDashboard@addSettings');
Route::get('/dashboard/orders', 'OwnerDashboard@getOrders')->middleware('role:client');
Route::get('/messages/{id}/{object_id}','ChatsController@show');
Route::get('/add-type', 'AddObject@type');;
Route::post('/update-object', 'AddObject@updateObject');
Route::post('/messages/{id}/{object_id}','OrdersController@makeOrder');
Route::post('/orders/create','OrdersController@createOrder')->middleware(\App\Http\Middleware\OnlyAjax::class);
Route::post('/order/create/new-user','OrdersController@createOrderAndUser')->middleware(\App\Http\Middleware\OnlyAjax::class);
Auth::routes();
Route::post('/orders/{order_id}/update/status', 'OrdersController@updateStatus')->middleware(\App\Http\Middleware\OnlyAjax::class);
Route::post('/objects/add-object', 'Ajax\ObjectController@addNewObject')->middleware(\App\Http\Middleware\OnlyAjax::class);
Route::post('/objects/update-object', 'Ajax\ObjectController@updateObject')->middleware(\App\Http\Middleware\OnlyAjax::class);
Route::post('/objects/filter', 'Ajax\ObjectController@getFilters')->middleware(\App\Http\Middleware\OnlyAjax::class);
Route::get("/objects/favourite/{object_id}", 'Ajax\ObjectController@addToFavourites')->middleware(\App\Http\Middleware\OnlyAjax::class);
Route::get('/dashboard/guests','OwnerDashboard@showGuests');
Route::get('/dashboard/objects','OwnerDashboard@showObjects')->name('dashboard.objects');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/catalog', 'CatalogController@index')->name('catalog');

Route::get('/object/{id}', 'CardController@index')->name('card');

Route::get('/comparsion', 'ComparsionController@index')->name('comparsion');

Route::get('/objects/services', 'Ajax\ObjectController@getObjectServices')->middleware(\App\Http\Middleware\OnlyAjax::class);

Route::get('/sms/send/{to}', function(\Nexmo\Client $nexmo, $to){

    $message = $nexmo->message()->send([
        'to' => $to,
        'from' => '@leggetter',
        'text' => 'Вы зарегистрированы на сайте Zabroniroval.ru.URL: http://realty.localhost:8080/ ',
        'type' => 'unicode'
    ]);
    Log::info('sent message: ' . $message['message-id']);
})->middleware(\App\Http\Middleware\OnlyAjax::class);;

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes(['verify' => true]);
Route::get('/add-object', 'AddObject@object');

Route::get('/add-object/{item}', 'AddObject@object');
//
Route::get('/dashboard/calendar/{object_id}', 'OwnerDashboard@getCalendar');
Route::get('/dashboard/messages', 'OwnerDashboard@sendMessages');
Route::get('/objects/edit/{object_id}', 'AddObject@edit')->middleware(['role:admin|owner']);

Route::get('/verify', 'VerifyController@show')->name('verify');
Route::post('/verify', 'VerifyController@verify')->name('verify');
Auth::routes(['verify' => true]);

Route::get('/register', function () {
   // return redirect('/');
})->name('get_register');

Route::post('/register', 'Auth\RegisterController@register')->name('register');

Route::get('/dashboard', 'OwnerDashboard@show')->name('dashboard');
Route::get('/dashboard/messages/{object_id}', 'OwnerDashboard@showObjectDialogs');
//Route::post('/register/{type}', '\App\Auth\RegisterController@register');

Route::get('preview-emails', function () {
    $user = new User();
    $message = (new \App\Notifications\AccountVerification($user->where('name','Алиса')->first()))->toMail(User::where('name','Алиса') -> first());
    return $message->render();
});
//
//Notification::route(
//    'nexmo-viber_service_msg',
//    '79218761934'
//)->notify(new \App\Notifications\MerryChristmas());
//

Route::get('/messages', 'ChatsController@index');
Route::get('/{user_id}/messages', 'ChatsController@fetchMessages');
Route::post('/{user_id}/messages', 'ChatsController@sendMessage');
Route::post('/messages/{user_id}/delivered', 'ChatsController@updateMessageStatus');


Route::get('/admin/panel','AdminController@index');
Route::get('/admin/panel/chats','AdminController@getChats');
Route::get('/admin/panel/objects','AdminController@objects');
Route::post('/admin/panel/objects','AdminController@sortObjects');
Route::post('/admin/panel','AdminController@sort');
Route::get('/admin/panel/users/{user_id}','AdminController@getUser')->name('adminUsers');
Route::get('admin/messages/edit/{id}/{user_id}/{object_id}', 'AdminController@editMessages');


Route::post('/api/info','Ajax\ObjectController@sortList')->middleware(\App\Http\Middleware\OnlyAjax::class);
Route::get('/api/info','Ajax\ObjectController@sendInfo')->middleware(\App\Http\Middleware\OnlyAjax::class);
