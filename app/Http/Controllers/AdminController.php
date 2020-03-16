<?php

namespace App\Http\Controllers;

use App\Message;
use App\Objects;
use App\Orders;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $orders = new Orders();
        $ordersArray = $orders->leftJoin('users', 'users.id', '=', 'orders.user_id')->select(['orders.id', 'status', 'date_from', 'date_to', 'name', 'surname', 'phone_number', 'orders.created_at', 'orders.updated_at', 'object_id'])->orderBy('orders.id', 'ASC')->paginate(5);



        return view('admin.orders')->with('orders', $ordersArray);
    }

    public function objects(){

        $prepays = [
            'Без предоплаты',
            'С предоплатой'
        ];
        $statuses = [

            'Скрыто',
            'Не скрыто'
        ];
        $objects = new Objects();
        $objectsArray = $objects->leftJoin('object_occupation','object_occupation.object_id','=','objects.id')->leftJoin('users','users.id','=','objects.user_id')->select(['objects.created_at','status','prepay','name','surname', 'objects.id','date_from','date_to','objects.user_id'])->groupBy('objects.id')->paginate(5);



        $data = $objects->with(['objectService' => function ($query) {
            $query->whereRaw('service_id  IN (4,16,204,205)')->orderBy('service_id')->get(['service_id','value']);
        }])->get()->toArray();



        $string = '';
        $address= [];
        foreach ($data as $item) {
            foreach ($item['object_service'] as $service) {
                if ((int)$item['type'] === 1) {
                    if ((int)$service['service_id'] === 4) {
                        $string = 'Гостиница - на ул. ' .
                            $item['string'] . ' - ' .
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

        return view('admin.objects')->with('address', $address)->with('objects', $objectsArray)->with('statuses',$statuses)->with('prepays',$prepays);
    }
    public function sort(Request $request)
    {
        $status = $request->input('status') !== null ? $request->input('status') : false;
        header("HTTP/1.1 303 See Other");
        if ($status) {
            $orders = new Orders();
            $ordersArray = $orders->leftJoin('users', 'users.id', '=', 'orders.user_id')->where('status', $status)->orderBy('orders.id', 'ASC')->select(['orders.id', 'status', 'date_from', 'date_to', 'name', 'surname', 'phone_number', 'orders.created_at', 'orders.updated_at', 'object_id'])->paginate(5);
            return view('admin.orders')->with('orders', $ordersArray);
        } else {
            return $this->index();
        }
    }

    public function sortObjects(Request $request){

        $status = $request->input('status') !== null ? $request->input('status') : null;
        $prepays = [
            'Без предоплаты',
            'С предоплатой'
        ];
        $statuses = [

            'Скрыто',
            'Не скрыто'
        ];
        $objects = new Objects();
        $data = $objects->with(['objectService' => function ($query) {
            $query->whereRaw('service_id  IN (4,16,204,205)')->orderBy('service_id')->get(['service_id','value']);
        }])->get()->toArray();



        $string = '';
        $address= [];
        foreach ($data as $item) {
            foreach ($item['object_service'] as $service) {
                if ((int)$item['type'] === 1) {
                    if ((int)$service['service_id'] === 4) {
                        $string = 'Гостиница - на ул. ' .
                            $item['string'] . ' - ' .
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





        header("HTTP/1.1 303 See Other");
        if ($status !== null) {
            if ((int)$status === 0) {
                $objectsArray = $objects->leftJoin('object_occupation', 'object_occupation.object_id', '=', 'objects.id')->leftJoin('users', 'users.id', '=', 'objects.user_id')->select(['objects.created_at', 'status', 'prepay', 'name', 'surname', 'objects.id', 'date_from', 'date_to', 'objects.user_id'])->groupBy('objects.id')->where('status', 0)->paginate(5);
                return view('admin.objects')->with('address', $address)->with('objects', $objectsArray)->with('statuses', $statuses)->with('prepays', $prepays);
            } elseif ((int)$status === 1) {
                $objectsArray = $objects->leftJoin('object_occupation', 'object_occupation.object_id', '=', 'objects.id')->leftJoin('users', 'users.id', '=', 'objects.user_id')->select(['objects.created_at', 'status', 'prepay', 'name', 'surname', 'objects.id', 'date_from', 'date_to', 'objects.user_id'])->groupBy('objects.id')->orderBy('created_at')->paginate(5);
                return view('admin.objects')->with('address', $address)->with('objects', $objectsArray)->with('statuses', $statuses)->with('prepays', $prepays);
            } elseif ((int)$status === 2) {
                $objectsArray = $objects->leftJoin('orders', 'orders.object_id', '=', 'objects.id')->leftJoin('object_occupation', 'object_occupation.object_id', '=', 'objects.id')->leftJoin('users', 'users.id', '=', 'objects.user_id')->select(['objects.created_at', 'objects.status', 'prepay', 'name', 'surname', 'objects.id', 'object_occupation.date_from', 'object_occupation.date_to', 'objects.user_id'])->where('orders.status', 3)->groupBy('objects.id')->paginate(5);

                return view('admin.objects')->with('address', $address)->with('objects', $objectsArray)->with('statuses', $statuses)->with('prepays', $prepays);
            }
        } else {
            return $this->objects();
        }
    }


    public function getUser(){


        $user = \App\User::find(\Route::current()->parameter('user_id'));
        $settings = $user->toArray();
        return view('admin.users')->with('user', $settings);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function getChats(){

        $m = new Message();
        $order = new Orders();
        $objIds = $order->join('messages','order_id','=','orders.id')->selectRaw('distinct orders.id')->get()->toArray();



        $objects = new Objects();
        $userObjects = $order->join('objects','objects.id','=','object_id')->get(['orders.id'])->toArray();

        $messages = [];

        $resultArray = [];
        $resultArray['userObjects']  = Arr::flatten($userObjects);

        $results =  Arr::collapse($resultArray);


        if (count($resultArray['userObjects']) > 0) {
            foreach ($resultArray['userObjects'] as $objId) {
                array_push($messages,
                    [ 'id' => $objId,
                        'type' => 'userObjects',
                        'message' => DB::select('SELECT * FROM messages WHERE order_id = ' . $objId . ' ORDER BY messages.created_at DESC LIMIT 1', [1]),
                        'info' => $order->leftJoin('objects', 'objects.id', '=', 'orders.object_id')->leftJoin('users','users.id','=','orders.user_id')->where('orders.id', '=', $objId)->get(['date_from','date_to','orders.user_id','orders.object_id','orders.status','orders.id','name','avatar','objects.user_id as ownerId'])->toArray(),
                        'photos' => $order->join('objects', 'objects.id', '=', 'orders.object_id')->leftJoin('object_photos', 'object_photos.object_id', '=', 'orders.object_id')->where('orders.id', '=', $objId)->limit(1)->get(['name'])->toArray()
                    ]
                );

            }


        }






        $string = '';
        $objects = [];
        $objectsModel = new Objects();

            $data = $objectsModel->with(['objectService' => function ($query) {
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


//        $data = [['object_service' => $order->leftJoin('objects','objects.id','=','orders.object_id')->leftJoin('object_service','object_service.object_id','=','objects.id')->where('orders.user_id','=',$user->getAttribute('id'))->whereRaw('service_id  IN (4,16,204,205)')->get(['service_id','object_service.object_id','value','type','string'])->toArray()]];
//
//        foreach ($data as $item) {
//            foreach ($item['object_service'] as $service) {
//
//                if ((int)$service['type'] === 1) {
//                    if ((int)$service['service_id'] === 4) {
//                        $string = 'Гостиница - на ул ' .
//                            $service['string'] . '-' .
//                            $service['value'] . 'м²';
//                    }
//
//                } elseif ((int)$service['type'] === 2) {
//                    if ((int)$service['service_id'] === 4) {
//                        $string = $service['value'] . '-комнатная квартира на ул. ' . $service['string'] . ' -  ';
//                    } elseif ((int)$service['service_id'] === 16) {
//                        $string .= $service['value'] . ' м²';
//                    }
//
//
//
//                } elseif ((int)$service['type'] === 3) {
//                    if ((int)$service['service_id'] === 205) {
//                        $string = ' Дом -   ' . $service['value'] . '-комнат  на ул. ' . $service['string'] . ' - ';
//                    } elseif ((int)$service['service_id'] === 16) {
//                        $string .= $service['value'] . ' м²';
//                    }
//                } elseif ($service['type'] === 4) {
//                    if ((int)$service['service_id'] === 16) {
//                        $string = ' Комната на ул. ' . $service['string'] . ' - ' . $service['value'] . ' м²';
//                    }
//                }
//
//
//                $objects[$service['object_id']] = $string;
//
//            }
//            $string='';
//
//        }







        foreach ($messages as $k => $m) {
            if (empty($m['info']) && empty($m['photos'])){
                $messages = [];
            } else {
                if (count($objects) > 0) {
                    $messages[$k]['info'] = array_merge($m['info'][0], ['address' => $objects[$messages[$k]['info'][0]['object_id']], 'admin' => true]);

                }
            }
        }






        return view('admin.chats')->with('messages', $messages);
    }

    public function editMessages() {
        $orderId = Route::current()->parameter('id');
        $object_id = Route::current()->parameter('object_id');
        $user = \App\User::find(Route::current()->parameter('user_id'));


        $data = $user->objects()->with(['objectService' => function ($query) {
            $query->whereRaw('service_id  IN (4,16,204,205)');
        }])->where('objects.id','=',$object_id)->get()->toArray();





        $string = '';
        $address= [];
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



        return view('admin.messages')->with('orderId', $orderId)->with('objectId',$object_id)->with('userID', Objects::find($object_id)->getAttribute('user_id'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
