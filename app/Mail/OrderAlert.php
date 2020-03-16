<?php

namespace App\Mail;

use App\Objects;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderAlert extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Objects $objects)
    {
        $this->object = $objects->toArray();
        $this->user = User::find($this->object[0]['user_id']);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {



        $data = $this->user->objects()->with(['objectService' => function ($query) {
            $query->whereRaw('service_id  IN (4,16,204,205)');
        }])->get()->toArray();

        $string = '';
        foreach ($data as $item) {
            foreach ($item['object_service'] as $service) {
                if ((int)$item['type'] === 1) {
                    if ((int)$service['service_id'] === 4) {
                        $string = 'Гостиница - на ул' .
                            $item['string'] . '-' .
                            $service['value'] . 'м²';
                    }

                } elseif ((int)$item['type'] === 2) {
                    if ((int)$service['service_id'] === 4) {
                        $string = $service['value'] . '-комнатная квартира на ул. ' . $item['string'] . ' -  ';
                    } elseif ((int)$service['service_id'] === 16) {
                        $string .= $service['value'] . ' м²';
                    }

                } elseif ((int)$item['type'] === 3) {
                    if ((int)$service['service_id'] === 205) {
                        $string = ' Дом -   ' . $service['value'] . '-комнат  на ул. ' . $item['string'] . ' - ';
                    } elseif ((int)$service['service_id'] === 16) {
                        $string .= $service['value'] . ' м²';
                    }
                } elseif ($item['type'] === 4) {
                    if ((int)$service['service_id'] === 16) {
                        $string = ' Комната на ул. ' . $item['string'] . ' - ' . $service['value'] . ' м²';
                    }
                }


            }
            $address[$item['id']] = $string;
            $string = '';
        }

        $path = url()->route('/').$this->user->objects()->with('objectPhotos')->limit(1)->get('name');


        return $this->view('email.order.alert')->with('path', $path)->with('address', $address[$this->object[0]['id']]);
    }
}
