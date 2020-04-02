<?php

namespace Tests\Feature;

use App\Orders;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderTest extends TestCase
{


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function test_make_order_with_data() {

       //send ajax data via post

        $order = factory(Orders::class)->make();

        $user = factory(User::class)->create();
        $response=  $this->actingAs($user)->json("POST", '/orders/create', [
            'totalPrice' => "30000",
            'object_id' => '24',
            'parents' => "0", // 0 users selected
            'children' => "0",
            'date_from' => '2020-04-02',
            'date_to' => '2020-04-05'
        ], ['HTTP_Authorization' => csrf_token(), 'HTTP_X-Requested-With' => 'XMLHttpRequest']);

        $response->assertExactJson([
            "error" => "У Вас не выбрано количество гостей"
        ]);



        $response=  $this->actingAs($user)->json("POST", '/orders/create', [
            'totalPrice' => $order->totalPrice,
            'parents' => $order->parents,
            'object_id' => $order->object_id,
            'children' => $order->children,
            'date_from' => $order->date_from,
            'date_to' => $order->date_to
        ], ['HTTP_Authorization' => csrf_token(), 'HTTP_X-Requested-With' => 'XMLHttpRequest']);

        $response->assertExactJson([
            "error" => false
        ]);

        $this->assertDatabaseHas('orders',  [
            'totalPrice' => $order->totalPrice,
            'parents' => $order->parents,
            'object_id' => $order->object_id,
            'children' => $order->children,
            'date_from' => $order->date_from,
            'date_to' => $order->date_to
        ]);
    }

    public function test_make_order_with_locking_dates() {
        $order = factory(Orders::class)->make();
        $user = factory(User::class)->create();

        $response=  $this->actingAs($user)->json("POST", '/orders/create', [
            'totalPrice' => "30000",
            'object_id' => '25',
            'parents' => "5", // 0 users selected
            'children' => "0",
            'date_from' => '2020-04-02',
            'date_to' => '2020-04-10'
        ], ['HTTP_Authorization' => csrf_token(), 'HTTP_X-Requested-With' => 'XMLHttpRequest']);

        $response->assertExactJson([
            'error' => "Даты, которые Вы выбрали содержат заблокированные владельцем.Выберите пожалуйста снова."
        ]);
    }


    public function test_make_order_unauthorized() {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->json('POST', '/order/create/new-user',[
            "totalPrice" => "26000",
            "parents" => "0",
            "children" => "1",
            "date_from" => "2020-04-3",
            "date_to" => "2020-04-16",
            "name" => "Алиса",
            "phone_number" => "79218761934",
            "email" => "avspostmail@gmail.com",
            "object_id" => "25"
        ], ['HTTP_Authorization' => csrf_token(), 'HTTP_X-Requested-With' => 'XMLHttpRequest']);



        $response->assertExactJson([
            'error' => "У Вас не выбрано количество гостей"
        ]);

        $response = $this->actingAs($user)->json('POST', '/order/create/new-user',[
            "totalPrice" => "26000",
            "parents" => "5",
            "children" => "1",
            "date_from" => "2020-04-3",
            "date_to" => "2020-04-5",
            "name" => "Алиса",
            "phone_number" => "79218761934",
            "email" => "avspostmail@gmail.com",
            "object_id" => "25"
        ], ['HTTP_Authorization' => csrf_token(), 'HTTP_X-Requested-With' => 'XMLHttpRequest']);

        $response->dump();


        $this->assertDatabaseHas('orders',  [
            "totalPrice" => "26000",
            "parents" => "5",
            "children" => "1",
            "date_from" => "2020-04-3",
            "date_to" => "2020-04-5",
            "object_id" => "25"
        ]);

        $this->assertDatabaseHas('users',  [
            "name" => "Алиса",
            "phone_number" => "79218761934",
            "email" => "avspostmail@gmail.com"
        ]);
    }
}
