<?php

namespace App\Http\Controllers;

use App\Objects;
use App\ObjectService;
use App\ObjectSubTypes;
use App\ServiceTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;


class CardController extends Controller
{

    function declOfNum($index, $titles)
    {
        $cases = [2, 0, 1, 1, 1, 2];
        return $titles[($index % 100 > 4 && $index % 100 < 20) ? 2 : $cases[($index % 10 < 5) ? $index % 10 : 5]];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $model = new Objects();

        $items = $model
            ->where('objects.id', '=', $id)
            ->select('string', 'housing', 'house', 'type', 'objects.id', 'coordinateX', 'coordinateY', "city", "country", "region", "area", 'user_id')
            ->get()
            ->toArray();


        $addServices = $model
            ->leftJoin('object_service', 'object_service.object_id', '=', 'objects.id')
            ->where('objects.id', '=', $id)
            ->whereRaw('service_id IN (4,16, 204, 205)')
            ->orderBy("service_id")
            ->select('service_id', 'value')
            ->get();

        $addServices = $addServices->toArray();


        $icons = $model
            ->leftJoin('object_service', 'object_service.object_id', '=', 'objects.id')
            ->where('objects.id', '=', $id)
            ->whereRaw('service_id IN (7,9,18,151,23)')
            ->select('service_id', 'value')
            ->get()
            ->toArray();

        $photos = $model
            ->leftJoin('object_photos', 'object_id', '=', 'objects.id')
            ->where('objects.id', '=', $id)
            ->select('name', 'path', 'extension', 'description')
            ->get()
            ->toArray();


        $model = new ServiceTypes();
        $services = $model
            ->leftJoin('services', 'service_type', '=', 'service_types.id')
            ->leftJoin('object_service', 'object_service.service_id', '=', 'services.id')
            ->where('object_service.object_id', '=', $id)
            ->where('value', '=', '1')
            ->select('name', 'value', 'service_type_name')
            ->get();

        $allServices = $model
            ->leftJoin('services', 'service_type', '=', 'service_types.id')
            ->whereRaw('service_types.id = 9 or service_types.id = 12')
            ->select('service_type_name', 'name')
            ->get()
            ->toArray();


        $basic = [
            'Оснащения жилья',
            'Оснащение территории',
            'Ванная комната',
            'Тип питания',
            'Кухонное оборудование',
            'Для детей',
            'Парковка',
            'Правила проживания',
            'Инфраструктура и досуг рядом',
            'Пляж',
            'Принимается оплата',
            'Услуги за дополнительную плату'
        ];

        $locking = DB::table('object_locking')->where('object_id', $id)->get()->toArray();
        $services = $services->toArray();
        $result = [];
        foreach ($services as $service) {
            if (in_array($service['service_type_name'], $basic)) {
                $result[$service['service_type_name']][] = [
                    'name' => $service['name'],
                    'value' => $service['value']
                ];

//                foreach ($allServices as $service2){
//                    $result[$service2['service_type_name']][] = ['name' => $service2['name'], 'value' => 0];
//                }
            }


        }

        $model = new Objects();

        $occupation = $model
            ->leftJoin('object_occupation', 'object_id', '=', 'objects.id')
            ->where('objects.id', '=', $id)
            ->selectRaw('date_to as dateTo,date_from as dateFrom,min_days, user_id, objects.id')
            ->get()
            ->toArray();

        $currentDate = Date::createFromTimestamp(strtotime($occupation[0]['dateFrom']));


        $occupation[0]['days'] = $currentDate->addDays($occupation[0]['min_days'])->format('Y-m-d');


        $data = $model->with(['objectService' => function ($query) {
            $query->whereRaw('service_id  IN (4,16,204,205)');
        }])->where('objects.id', '=', $id)->get()->toArray();


        $string = "";
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
            $objects["key"] = $string;
            $string = '';
        }

        $types = ObjectSubTypes::all()->toArray();


        $breadcrums = "<div class='crop__title'><span class='crop__span'>Главная </span> › <span class=\"crop__span\">" . $items[0]["country"] . "</span>  › <span class=\"crop__span\">" . $items[0]["region"] . "</span> › <span class=\"crop__span\">" . $items[0]["city"] . "</span> › <span class=\"crop__span\">" . $items[0]["area"] . "</span> › <span class=\"crop__span\">" . $types[(int)$items[0]["type"] - 1]['name'] . "</span> › <span class=\"crop__span\">" . $objects["key"] . "</span></div>";


        $title = "Снять " . $types[(int)$items[0]["type"] - 1]['name'] . " в городе " . $items[0]["city"];
        return view('card')->with('locking', $locking)->with('occupation', $occupation[0])->with('addService', $addServices)->with('description', $result)->with('item', $items[0])->with('info', $services)->with('icons', $icons)->with('photos', $photos)->with('disable', (int)$occupation[0]['user_id'] === \Auth::id())
            ->with("breadCrumbs", $breadcrums)->with("title", $title)->with('name', $types[(int)$items[0]["type"] - 1]['name'])->with('type', $types[(int)$items[0]["type"] - 1]['type_id'])->with('prefix', $this->declOfNum((int)$addServices[3]['value'], ['комната', 'комнаты', 'комнат']));
    }
}
