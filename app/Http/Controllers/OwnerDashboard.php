<?php


namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Message;
use App\Objects;
use App\Orders;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class OwnerDashboard extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sendMessages() {
        $m = new Message();
        $order = new Orders();
        $objIds = $order->join('messages','order_id','=','orders.id')->selectRaw('distinct orders.id')->get()->toArray();
        $user = Auth::user();


        $objects = new Objects();
        $userObjects = $order->join('objects','objects.id','=','object_id')->where('objects.user_id','=',$user->getAttribute('id'))->get(['orders.id'])->toArray();
        $userOrders = $order->where('user_id','=',$user->getAttribute('id'))->get('orders.id')->toArray();
        $messages = [];

        $resultArray = [];
        $resultArray['userObjects']  = Arr::flatten($userObjects);
        $resultArray['userOrders']  = Arr::flatten($userOrders);
        $results =  Arr::collapse($resultArray);


       if (count($resultArray['userObjects']) > 0) {
           foreach ($resultArray['userObjects'] as $objId) {
               array_push($messages,
                   [ 'id' => $objId,
                       'type' => 'userObjects',
                       'message' => DB::select('SELECT * FROM messages WHERE order_id = ' . $objId . ' ORDER BY messages.created_at DESC LIMIT 1', [1]),
                       'info' => $order->leftJoin('objects', 'objects.id', '=', 'orders.object_id')->leftJoin('users','users.id','=','orders.user_id')->where('orders.id', '=', $objId)->where('objects.user_id', '=', $user->getAttribute('id'))->get(['date_from','date_to','orders.user_id','orders.object_id','orders.status','orders.id','name','avatar','objects.user_id as ownerId'])->toArray(),
                       'photos' => $order->join('objects', 'objects.id', '=', 'orders.object_id')->leftJoin('object_photos', 'object_photos.object_id', '=', 'orders.object_id')->where('orders.id', '=', $objId)->where('objects.user_id', '=', $user->getAttribute('id'))->limit(1)->get(['name'])->toArray()
                   ]
               );

           }


       }

       if (count( $resultArray['userOrders']) > 0){
           foreach ( $resultArray['userOrders'] as $objId) {
               array_push($messages,
                       [   'id' => $objId,
                           'type' => 'userOrders',
                           'message' => DB::select('SELECT * FROM messages WHERE order_id = ' . $objId . ' ORDER BY messages.created_at DESC LIMIT 1', [1]),
                           'info' => $order->leftJoin('objects','objects.id','=','orders.object_id')->leftJoin('users','users.id','=','orders.user_id')->leftJoin('object_occupation','object_occupation.object_id','=','orders.object_id')->where('orders.user_id','=',$user->getAttribute('id'))->where('orders.id','=',$objId)->get(['orders.date_from','orders.date_to','orders.user_id','orders.object_id','orders.status','orders.id','name','avatar','objects.user_id as ownerId'])->toArray(),
                           'photos' => $order->leftJoin('object_photos','object_photos.object_id','=','orders.object_id')->where('orders.user_id','=',$user->getAttribute('id'))->limit(1)->get(['name'])->toArray()
                       ]
               );

           }

       }






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

           $data = [['object_service' => $order->leftJoin('objects','objects.id','=','orders.object_id')->leftJoin('object_service','object_service.object_id','=','objects.id')->where('orders.user_id','=',$user->getAttribute('id'))->whereRaw('service_id  IN (4,16,204,205)')->get(['service_id','object_service.object_id','value','type','string'])->toArray()]];

           foreach ($data as $item) {
               foreach ($item['object_service'] as $service) {

                   if ((int)$service['type'] === 1) {
                       if ((int)$service['service_id'] === 4) {
                           $string = 'Гостиница - на ул ' .
                               $service['string'] . '-' .
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







            foreach ($messages as $k => $m) {
                if (empty($m['info']) && empty($m['photos'])){
                    $messages = [];
                } else {
                    if (count($objects) > 0) {
                        $messages[$k]['info'] = array_merge($m['info'][0], ['address' => $objects[$messages[$k]['info'][0]['object_id']], 'admin' => false]);

                    }
                }
            }

        $counter =  $this->getCounter();


        return $messages;
    }

    public function getCalendar(){
      $id =   \Route::current()->parameter('object_id');
      $object = new Objects();

      $values = $object->leftJoin('object_occupation','objects.id','=','object_id')->where('object_id','=', $id)->get()->toArray();
      $array = [];
        foreach ($values as $key => $guest){
            $array[$key] = ['startDate' => date('Y-m-d', strtotime($guest['date_from'])), 'endDate' => date('Y-m-d', strtotime($guest['date_to'])), 'key' => 'selection'. $key];
        }
      $counter = $this->getCounter();


        $user = Auth::user();
        $data = $user->objects()->with(['objectService' => function ($query) {
            $query->whereRaw('service_id  IN (4,16,204,205)');
        }])->where('objects.id','=', $id)->get()->toArray();

        $string = '';

        $objects = [];
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


     return view('dashboard.occupation')->with('counter', $counter)->with('occupation', $array)->with('address', $objects[$id]);
    }
    public function showObjectDialogs(){
        $order = new Orders();


        $ids = $order->where('orders.object_id','=',\Route::current()->parameter('object_id'))->get(['orders.id'])->toArray();
        $counter =  $this->getCounter();
        if (count($ids) === 0) {
            return view('dashboard.owner')->with('error','У Вас нет сообщений по данному объекту')->with('counter', $counter)->with('messagesCount', 0 );
        }
        $user = Auth::user();
        $messages = [];
        foreach ($ids as $orderId) {

            array_push($messages,
                [ 'id' => $orderId['id'],
                    'type' => 'userObjects',
                    'message' => DB::select('SELECT * FROM messages WHERE order_id = ' . $orderId['id'] . ' ORDER BY messages.created_at DESC LIMIT 1', [1]),
                    'info' => $order->leftJoin('objects', 'objects.id', '=', 'orders.object_id')->leftJoin('users','users.id','=','orders.user_id')->where('orders.id', '=', $orderId['id'])->where('objects.user_id', '=', $user->getAttribute('id'))->get(['date_from','date_to','orders.user_id','orders.object_id','orders.status','orders.id','name','avatar'])->toArray(),
                    'photos' => $order->join('objects', 'objects.id', '=', 'orders.object_id')->leftJoin('object_photos', 'object_photos.object_id', '=', 'orders.object_id')->where('orders.id', '=', $orderId['id'])->where('objects.user_id', '=', $user->getAttribute('id'))->limit(1)->get(['name'])->toArray()
                ]
            );

        }


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

        $data = [['object_service' => $order->leftJoin('objects','objects.id','=','orders.object_id')->leftJoin('object_service','object_service.object_id','=','objects.id')->where('orders.user_id','=',$user->getAttribute('id'))->whereRaw('service_id  IN (4,16,204,205)')->get(['service_id','object_service.object_id','value','type','string'])->toArray()]];

        foreach ($data as $item) {
            foreach ($item['object_service'] as $service) {

                if ((int)$service['type'] === 1) {
                    if ((int)$service['service_id'] === 4) {
                        $string = 'Гостиница - на ул ' .
                            $service['string'] . '-' .
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

        foreach ($messages as $k => $m) {
            if (empty($m['info']) && empty($m['photos'])){
                $messages = [];
            } else {
                if (count($objects) > 0) {
                    $messages[$k]['info'] = array_merge($m['info'][0], ['address' => $objects[$messages[$k]['info'][0]['object_id']]]);

                }
            }
        }





        return view('dashboard.owner')->with('messages',$messages)->with('counter', $counter)->with('messagesCount', count($ids) );
    }


    public function updateSettings(Request $request){
        $user = Auth::user();
        $validator = $this->validate($request, [
            'photo' => 'image|mimes:jpeg,png,jpg',
        ]);

        $image = $request->file('photo');
        $filename = rand(1, 5).'avatar.' . $request->photo->getClientOriginalExtension();



        if (!File::isDirectory(public_path('images/avatar/' . $user->getAuthIdentifier() ))) {

            File::makeDirectory(public_path('images/avatar/' . $user->getAuthIdentifier().'/' ),0777,true);
        }
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(124, 124);

        if (File::exists(public_path('images/avatar/' . $user->getAuthIdentifier() . '/' . $filename))){
            File::delete(public_path('images/avatar/' . $user->getAuthIdentifier() . '/' . $filename));
        }
        $image_resize->save(public_path('images/avatar/' . $user->getAuthIdentifier() . '/' . $filename));

        $user->updateAvatar('/images/avatar/' . $user->getAuthIdentifier() . '/' . $filename);

        return ['path' => '/images/avatar/' . $user->getAuthIdentifier() . '/' . $filename];
    }

    public function showObjects(){
        $user = Auth::user();

        $obj = new Objects();
       $services = $obj->leftJoin('object_service','objects.id','=','object_service.object_id')->where('objects.user_id','=',$user->getAttribute('id'))->whereIn('service_id', array(4,16,23, 38,21,196,204,147,205))->get(['object_id','service_id','value'])->toArray();
       $photos = $obj->with('objectPhotos')->where('objects.user_id','=',$user->getAttribute('id'))->get(['id'])->toArray();
       $objects = $user->objects()->get()->toArray();


        $metro = $user->leftJoin('objects','objects.user_id','=','users.id')->leftJoin('metro','metro.object_id','=','objects.id')->whereNotNull('metro')->get(['metro_path','metro','object_id'])->toArray();
       $seas =  $user->leftJoin('objects','objects.user_id','=','users.id')->leftJoin('sea','sea.object_id','=','objects.id')->whereNotNull('sea')->get(['sea_path','sea','object_id'])->toArray();
        $newPhoto = [];
        $string = '';
        $address = [];
        $counter =  $this->getCounter();
        if (count($objects) > 0) {
            foreach ($objects as $key => $object) {

                foreach ($photos as $photo) {
                    foreach ($photo['object_photos'] as $p) {
                        if ((int)$object['id'] === (int)$p['object_id']) {
                            $objects[$key]['photos']['data'][] = $p['name'];

                        }
                    }

                }

                foreach ($services as $s) {
                    if ((int)$s['object_id'] === (int)$object['id']) {
                        $objects[$key]['services'][] = $s;
                    }
                }

                foreach ($metro as $m) {
                    if ((int)$m['object_id'] === (int)$object['id']) {
                        $objects[$key]['metros'][] = $m;
                    }
                }

                foreach ($seas as $sea) {
                    if ((int)$sea['object_id'] === (int)$object['id']) {
                        $objects[$key]['seas'][] = $sea;
                    }
                }


                $objects[$key]['photos'] = array_merge($objects[$key]['photos'], [
                    'settings' => [
                        'slidesToShow' => 1,
                        'slidesToScroll' => 1,
                        'speed' => 1000,
                        'arrows' => true,
                        'autoplay' => false,
                        'lazyLoad' => false
                    ],
                    'customArrow' => true
                ]);
            }


            $data = $user->objects()->with(['objectService' => function ($query) {
                $query->whereRaw('service_id  IN (4,16,204,205)');
            }])->with('objectPhotos')->get()->toArray();


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
            return view('dashboard.objects')->with('objects',$objects)->with('address', $address)->with('counter',$counter);

        } else {
            return view('dashboard.objects')->with('objects',[])->with('address', $address)->with('error','У Вас нет ни одного объекта')->with('counter',$counter);
        }




    }

    public function addSettings(Request $request){
        $user = Auth::user();
        $user->update($request->all());
        $settings = $user->toArray();
        $orders = new Orders();
        $counter =  $this->getCounter();
        return view('settings')->with('settings', $settings)->with('counter', $counter);

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

    public function showGuests(){

        $orders = new Orders();
        $user = Auth::user();

       $guests = $orders->leftJoin('objects','objects.id','=','orders.object_id')->where('orders.status','=','1')->leftJoin('users','orders.user_id','=','users.id')->leftJoin('object_occupation','object_occupation.object_id','=','orders.object_id')->where('objects.user_id','=',$user->getAttribute('id'))->get(['orders.id','name','surname','phone_number','objects.city','orders.date_from','orders.date_to','price'])->toArray();



       $days = [];
       $prices = [];
       foreach ($guests as $guest){
            $days[$guest['id']] = (strtotime ($guest['date_to'])-strtotime ($guest['date_from']))/(60*60*24);
            $prices[$guest['id']] =  $days[$guest['id']] * $guest['price'];
       }



       $array = [];
       foreach ($guests as $key => $guest){
           $array[$key] = ['startDate' => date('Y-m-d', strtotime($guest['date_from'])), 'endDate' => date('Y-m-d', strtotime($guest['date_to'])), 'key' => 'selection'. $key];
       }


        $counter =  $this->getCounter();

        return view('dashboard.guests')->with('guests', $guests)->with('days', $days)->with('prices',$prices)->with('counter',$counter)->with('occupation', $array);
    }

    public function  hideObject(){

    }

    public function show(Request $request)
    {
        $user = Auth::user();


        $data = $user->objects()->with(['objectService' => function ($query) {
            $query->whereRaw('service_id  IN (4,16,204,205)');
        }])->with('objectOccupation')->with('objectPhotos')->get()->toArray();



        $messages = $user->objects()->with(['messages' => function ($query) {
            $query->orderByDesc('messages.id')->first();
        }])->get(['objects.id'])->toArray();

        $obj = new Objects();
        $order = new Orders();

        $counter =  $this->getCounter();




        foreach ($messages as $index => $message) {


            foreach ($data as $key => $item) {


                if ((int)$message['id'] === (int)$item['id']) {
                    $data[$key] = array_merge($item, $message);
                }
            }
        }

        $string = '';
        $objects = [];
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


        $m =  $user->messages()->first();

        $order = new Orders();



        if ($user->hasRole('owner')) {
            return view('dashboard/owner')->with('counter',$counter);
        } else {
            return view('dashboard/client')->with('counter',$counter);
        }
    }

    public function getOrders(){
        $user = Auth::user();
        $orders = new Orders();
        $objects = $orders->leftJoin('objects','orders.object_id','=','objects.id')->where('orders.user_id','=',$user->getAuthIdentifier())->where('orders.status','=',1)->get(['objects.id','orders.id as orderId','orders.object_id','orders.status','orders.date_from','orders.date_to','string','house'])->toArray();
        $services = $orders->leftJoin('object_service','orders.object_id','=','object_service.object_id')->where('orders.user_id','=',$user->getAuthIdentifier())->where('orders.status','=',1)->where('orders.user_id','=',$user->getAuthIdentifier())->whereIn('service_id', array(4,16,23, 38,21,196,204,147,205))->get(['orders.object_id','service_id','value'])->toArray();

        $userInfo = $orders->leftJoin('objects','orders.object_id','=','objects.id')->leftJoin('users','objects.user_id','=','users.id')->where('orders.user_id','=',$user->getAuthIdentifier())->where('orders.status','=',1)->where('orders.user_id','=',$user->getAuthIdentifier())->get(['name','phone_number','orders.object_id'])->toArray();
        $string='';
        $address = [];

        $string = '';
        $address = [];
        $data['object_service'] = $orders->leftJoin('objects','orders.object_id','=','objects.id')->join('object_service', function ($query) {
            $query->on('orders.object_id','=','object_service.object_id')->whereRaw('service_id  IN (4,16,204,205)');
        })->where('orders.user_id','=',$user->getAuthIdentifier())->where('orders.user_id','=',$user->getAuthIdentifier())->where('orders.status','=',1)->get(['orders.object_id','service_id','value'])->toArray();
        $data['object'] = $orders->leftJoin('objects','orders.object_id','=','objects.id')->where('orders.user_id','=',$user->getAuthIdentifier())->where('orders.status','=',1)->where('orders.user_id','=',$user->getAuthIdentifier())->get()->toArray();
        foreach ($data['object'] as $item) {
        $data['object_service'] = Arr::sortRecursive($data['object_service']);
            foreach ($data['object_service'] as $service) {
                if ((int)$item['type'] === 1) {
                    if ((int)$service['service_id'] === 4) {
                        $string = 'Гостиница - на ул' .
                           $item['string'] . '-' .
                            $service['value'] . 'м²';
                    }

                } elseif ((int)$item['type'] === 2) {
                    if ((int)$service['service_id'] === 16) {
                        $string .= $service['value'] . ' м²';
                    } elseif ((int)$service['service_id'] === 4) {
                        $string .= $service['value'] . '-комнатная квартира на ул. ' .$item['string'] . ' -  ';

                    }


                } elseif ((int)$item['type'] === 3) {
                    if ((int)$service['service_id'] === 205) {
                        $string = ' Дом -   ' . $service['value'] . '-комнат  на ул. ' .$item['string'] . ' - ';
                    } elseif ((int)$service['service_id'] === 16) {
                        $string .= $service['value'] . ' м²';
                    }
                } elseif ($item['type'] === 4) {
                    if ((int)$service['service_id'] === 16) {
                        $string = ' Комната на ул. ' .$item['string'] . ' - ' . $service['value'] . ' м²';
                    }


                }

            }
            $address[$item['id']] = $string;
            $string = '';
        }



        $photos = $orders->leftJoin('objects','objects.user_id','=','orders.object_id')->leftJoin('object_photos','object_photos.object_id','=','orders.object_id')->where('orders.status','=',1)->where('orders.user_id','=',$user->getAuthIdentifier())->orderBy('object_photos.id','asc')->limit(1)->get(['name','orders.object_id'])->toArray();


        $metro = $orders->leftJoin('objects','objects.id','=','orders.object_id')->leftJoin('metro','metro.object_id','=','objects.id')->where('orders.status','=',1)->where('orders.user_id','=',$user->getAuthIdentifier())->whereNotNull('metro')->get(['metro_path','metro','orders.object_id'])->toArray();
        $seas =  $orders->leftJoin('objects','objects.id','=','orders.object_id')->leftJoin('sea','sea.object_id','=','objects.id')->where('orders.status','=',1)->where('orders.user_id','=',$user->getAuthIdentifier())->whereNotNull('sea')->get(['sea_path','sea','orders.object_id'])->toArray();


        $counter =  $this->getCounter();


        if (count($objects) > 0) {
            foreach ($objects as $key => $object) {

                foreach ($photos as $photo) {
                        if ($object['id'] === $photo['object_id']) {
                            $objects[$key]['photos']['data'][] = $photo['name'];
                        }

                }

                foreach ($services as $s) {
                    if ($s['object_id'] === $object['id']) {
                        $objects[$key]['services'][] = $s;
                    }
                }

                foreach ($userInfo as $info){
                    if ((int)$info['object_id'] === $object['id']){
                        $objects[$key]['userInfo'] = $info;
                    }
                }


                foreach ($address as $key2 => $value){
                    if ((int)$key2 === $object['id']){
                        $objects[$key]['address'] = $value;
                    }
                }


                foreach ($metro as $m) {
                    if ($m['object_id'] === $object['id']) {
                        $objects[$key]['metros'][] = $m;
                    }
                }

                foreach ($seas as $sea) {
                    if ($sea['object_id'] === $object['id']) {
                        $objects[$key]['seas'][] = $sea;
                    }
                }

            }


            return view('dashboard.order')->with('objects', $objects)->with('counter',$counter);

        } else {
            return view('dashboard.order')->with('objects', [])->with('error','У Вас еще не было заказов.')->with('counter', $counter);
        }



    }

    public function editSettings(Request $request){
        $user = Auth::user();
        $settings = $user->toArray();
        $orders = new Orders();
        $counter =  $this->getCounter();
        return view('settings')->with('settings', $settings)->with('counter', $counter);
    }
}
