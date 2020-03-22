<?php

namespace Tests\Feature;

use App\Http\Controllers\Auth\RegisterController;
use App\User;
use Faker\Guesser\Name;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Generator as Faker;

class RegisterTest extends TestCase
{

    public function test_user_can_view_a_register_form()
    {
        $response = $this->get('/register');

        $response->assertRedirect('/');
    }


    public function test_user_can_register_with_correct_credentials()
    {
        $user = factory(User::class)->make([
            'password' => bcrypt($password = 'i-love-laravel'),

        ]);


        $this->post('/register?type=1', [
            'name' => $user->name,
            'phone_number' => $user->phone_number,
            'email' => $user->email
        ]);

        $this->assertDatabaseHas('users',  [
            'name' => $user->name,
            'phone_number' => $user->phone_number,
            'email' => $user->email
        ]);



    }


    public function test_user_can_not_register_with_incorrect_credentials()
    {

        // Validate name
        $user = factory(User::class)->make([
            'password' => bcrypt($password = 'i-love-laravel'),
            'name' => "

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec auctor, nibh nec euismod euismod, tellus ex accumsan est, at sagittis elit ex sit amet erat. Maecenas eu purus at justo suscipit laoreet. Nunc euismod pretium purus sed pellentesque. Aliquam erat volutpat. In hac habitasse platea dictumst. Aliquam feugiat nibh eu enim hendrerit imperdiet. Sed rhoncus ante eu sagittis elementum. Maecenas quis mauris elementum, facilisis quam in, vestibulum nisl.

Suspendisse ex velit, faucibus in urna eleifend, viverra cursus dolor. Donec nec mauris malesuada, mattis ligula at, pharetra quam. Mauris vestibulum feugiat nisl a ultricies. Nulla ut sollicitudin orci. Integer vel magna mattis, placerat leo et, finibus elit. Proin a fringilla dolor. Aliquam dignissim turpis quis interdum dapibus. Praesent finibus pulvinar justo, quis dapibus urna accumsan rutrum. Pellentesque vehicula id leo eget scelerisque. Donec lobortis felis rutrum pretium cursus.

Sed scelerisque enim augue. Praesent auctor feugiat lectus, ut dapibus nisi malesuada vel. Vestibulum ac nisi eu erat gravida tincidunt quis sed nisl. Pellentesque ornare pretium velit, id laoreet leo maximus quis. Nulla aliquam eros metus, eu mattis elit laoreet nec. Mauris ac dapibus diam. Proin posuere, neque ut suscipit pellentesque, leo arcu consequat felis, sed tempor sapien odio eget neque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce condimentum sapien est, et dignissim velit suscipit vitae. Duis gravida, eros eget rhoncus congue, ipsum eros malesuada mi, eget tempor sapien nunc eget diam. Duis eleifend arcu quis cursus convallis.

Pellentesque a eros massa. Curabitur gravida vitae elit eu eleifend. Quisque ac sapien a est elementum iaculis vel id leo. Sed bibendum in eros vel pellentesque. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut at enim sagittis tortor tincidunt condimentum vel nec nulla. Sed vestibulum ligula sed egestas auctor. Aliquam vitae turpis. "

        ]);




        $this->post('/register?type=1', [
            'name' => $user->name,
            'phone_number' => $user->phone_number,
            'email' => $user->email
        ])->assertSessionHasErrors('name');



        // Validate email
        $user = factory(User::class)->make([
            'password' => bcrypt($password = 'i-love-laravel'),
            'email' => "hjsjhskdfjhsf"

        ]);




        $this->post('/register?type=1', [
            'name' => $user->name,
            'phone_number' => $user->phone_number,
            'email' => $user->email
        ])->assertSessionHasErrors('email');


        // Validate number

        $user = factory(User::class)->make([
            'password' => bcrypt($password = 'i-love-laravel'),
            'phone_number' => 79218761934

        ]);




        $this->post('/register?type=1', [
            'name' => $user->name,
            'phone_number' => $user->phone_number,
            'email' => $user->email
        ])->assertSessionHasErrors('phone_number');




    }

    public function test_send_verification_email_when_registered()
    {

        $user = factory(User::class)->make([
            'password' => bcrypt($password = 'i-love-laravel'),

        ]);


        $this->post('/register?type=1', [
            'name' => $user->name,
            'phone_number' => $user->phone_number,
            'email' => $user->email
        ]);



    }
}
