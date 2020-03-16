<?php

namespace App\Events;

use App\Message;
use App\Objects;
use App\Orders;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    /**
     * User that sent the message
     *
     */
    public $user;

    /**
     * Message details
     *
     * @var Message
     */
    public $message;


    public $dialog;

    /**
     * Create a new event instance.
     *
     * @param User $user
     * @param Message $message
     * @param Orders $order
     */
    public function __construct(User $user, Message $message, Orders $order)
    {
        $this->user = Auth::user();
        $this->message = $message;
        $m = new Message();

        $messages  =  [
            'id' => $order->getAttribute('id'),
            'type' => 'userObjects',
            'message' => DB::select('SELECT * FROM messages WHERE order_id = ' . $order->getAttribute('id') . ' ORDER BY messages.created_at DESC LIMIT 1', [1]),
            'info' => $order->leftJoin('objects', 'objects.id', '=', 'orders.object_id')->leftJoin('users','users.id','=','orders.user_id')->where('orders.id', '=', $order->getAttribute('id') )->get(['date_from','date_to','orders.user_id','orders.object_id','orders.status','orders.id','name'])->toArray(),
            'photos' => $order->join('objects', 'objects.id', '=', 'orders.object_id')->leftJoin('object_photos', 'object_photos.object_id', '=', 'orders.object_id')->where('orders.id', '=', $order->getAttribute('id'))->limit(1)->get(['name'])->toArray()
        ];



//
//
//        $objects = new Objects();
//        $userObjects = $order->join('objects','objects.id','=','object_id')->where('objects.user_id','=', $this->user ->getAttribute('id'))->get(['orders.id'])->toArray();
//        $userOrders = $order->where('user_id','=', $this->user->getAttribute('id'))->get('orders.id')->toArray();
//        $messages = [];
//
//        $resultArray = [];
//        $resultArray['userObjects']  = Arr::flatten($userObjects);
//        $resultArray['userOrders']  = Arr::flatten($userOrders);
//        $results =  Arr::collapse($resultArray);
//
//
//        if (count($resultArray['userObjects']) >0) {
//            foreach ($resultArray['userObjects'] as $objId) {
//                array_push($messages,
//                    ['type' => 'userObjects',
//                        'message' => DB::select('SELECT * FROM messages WHERE order_id = ' . $objId . ' ORDER BY messages.created_at DESC LIMIT 1', [1]),
//                        'info' => $order->leftJoin('objects', 'objects.id', '=', 'orders.object_id')->leftJoin('users','users.id','=','orders.user_id')->where('orders.id', '=', $objId)->where('objects.user_id', '=',  $this->user->getAttribute('id'))->get(['date_from','date_to','orders.user_id','orders.object_id','orders.status','orders.id','name'])->toArray(),
//                        'photos' => $order->join('objects', 'objects.id', '=', 'orders.object_id')->leftJoin('object_photos', 'object_photos.object_id', '=', 'orders.object_id')->where('orders.id', '=', $objId)->where('objects.user_id', '=',  $this->user->getAttribute('id'))->limit(1)->get(['name'])->toArray()
//                    ]
//                );
//
//            }
//
//
//        }
//
//        if (count( $resultArray['userOrders']) > 0){
//            foreach ( $resultArray['userOrders'] as $objId) {
//                array_push($messages,
//                    [    'type' => 'userOrders',
//                        'message' => DB::select('SELECT * FROM messages WHERE order_id = ' . $objId . ' ORDER BY messages.created_at DESC LIMIT 1', [1]),
//                        'info' => $order->leftJoin('objects','objects.id','=','orders.object_id')->leftJoin('users','users.id','=','orders.user_id')->leftJoin('object_occupation','object_occupation.object_id','=','orders.object_id')->where('orders.user_id','=', $this->user->getAttribute('id'))->where('orders.id','=',$objId)->get(['object_occupation.date_from','object_occupation.date_to','orders.user_id','orders.object_id','orders.status','orders.id','name'])->toArray(),
//                        'photos' => $order->leftJoin('object_photos','object_photos.object_id','=','orders.object_id')->where('orders.user_id','=', $this->user->getAttribute('id'))->limit(1)->get(['name'])->toArray()
//                    ]
//                );
//
//            }
//
//        }




        $string = '';
        $objects = [];
        if (count($user->objects()->get()->toArray()) > 0) {
            $data = $user->objects()->with(['objectService' => function ($query) {
                $query->whereRaw('service_id  IN (4,16,204,205)');
            }])->with('objectOccupation')->with('objectPhotos')->get()->toArray();


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
                $objects[$item['id']] = $string;
                $string='';
            }
        }
        $data = [['object_service' => $order->leftJoin('objects','objects.id','=','orders.object_id')->leftJoin('object_service','object_service.object_id','=','objects.id')->where('orders.user_id','=', $this->user->getAttribute('id'))->whereRaw('service_id  IN (4,16,204,205)')->get(['service_id','object_service.object_id','value','type','string'])->toArray()]];

        foreach ($data as $item) {
            foreach ($item['object_service'] as $service) {

                if ((int)$service['type'] === 1) {
                    if ((int)$service['service_id'] === 4) {
                        $string = 'Гостиница - на ул' .
                            $item['string'] . '-' .
                            $service['value'] . 'м²';
                    }

                } elseif ((int)$service['type'] === 2) {
                    if ((int)$service['service_id'] === 4) {
                        $string = $service['value'] . '-комнатная квартира на ул. ' . $service['string'] . ' -  ';
                    } elseif ((int)$service['service_id'] === 16) {
                        $string .= $service['value'] . ' м²';
                    }



                } elseif ((int)$service['type'] === 3) {
                    if ((int)$service['service_id'] === 205) {
                        $string = ' Дом -   ' . $service['value'] . '-комнат  на ул. ' . $service['string'] . ' - ';
                    } elseif ((int)$service['service_id'] === 16) {
                        $string .= $service['value'] . ' м²';
                    }
                } elseif ($service['type'] === 4) {
                    if ((int)$service['service_id'] === 16) {
                        $string = ' Комната на ул. ' . $service['string'] . ' - ' . $service['value'] . ' м²';
                    }
                }


                $objects[$service['object_id']] = $string;

            }
            $string='';

        }











        if (empty($messages['info']) && empty($messages['photos'])){
            $messages = [];
        } else {

            if (count($objects) > 0) {
                $messages['info'] = array_merge($messages['info'][0], ['address' => $objects[$messages['info'][0]['object_id']]]);

            }
        }

        $this->dialog = $messages;

    }



    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('chat');
    }
}
