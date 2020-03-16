<?php

namespace App\Http\Controllers;

use App\Objects;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Input;

class CatalogController extends Controller
{
        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            //$this->middleware('auth');
        }

        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */
        public function index()
        {

            $items = [];
            $dateFrom = Input::get('dateFrom');
            $dateTo = Input::get('dateTo');
            $region = Input::get('region');
            $guests = Input::get('guests');
            $city = Input::get('city');
            $place = Input::get('place');
            $model = new Objects();


            $start_date = new DateTime();
            $start_date->setTimestamp($dateTo/1000);

            $end_date = new DateTime();
            $end_date->setTimestamp($dateFrom/1000);

            if ($dateFrom && $dateTo) {
            $dispatchFromDate = substr($dateFrom, 0, strpos($dateFrom, '('));
            $dispatchToDate = substr($dateTo, 0, strpos($dateTo, '('));
          //  echo date('Y-m-d h:i:s', strtotime($dispatchToDate." +3 hours"));
             // timestamp received from JS via ajax

            $data = [];

            $items = $model
                ->leftJoin('object_service','object_service.object_id','=','objects.id')
                ->leftJoin('object_occupation','object_occupation.object_id','=','objects.id')
                ->whereRaw("(date_from <= '".(date('Y-m-d',  $dateFrom/1000))."' and ( date_to >= '".(date('Y-m-d', $dateTo/1000))."' ) and (service_id = 205 and value > ".$guests.") ) ". ( !intval($region) || !intval($city) ? "and ( ".(!intval($region) ?" (region LIKE '%".$region."%')" : '')." ".(!intval($city) ?" and (city LIKE '%".$city."%')" : '').")" : ''))
                ->select('city','string','housing','house','type','objects.id','date_to','date_from','center_path','country',"area","region")
                ->distinct()
                ->get();




            $items = $items->toArray();




            $metro = $model
                ->leftJoin('metro','metro.object_id','=','objects.id')
//            ->leftJoin('sea','sea.object_id','=','objects.id')
                ->select('objects.id','metro','metro_path','metro.object_id')
                ->whereNotNull('metro')
                ->get();

            $metro = $metro->toArray();

            foreach ($items as $key => $item){
                foreach ($metro as $m) {
                    if ($item['id'] == $m['object_id'] ){
                        $items[$key]['metros'][] =  [ 'metro' => $m['metro'], 'metro_path' => $m['metro_path']];
                    }
                }
            }

            $sea = $model
//            ->leftJoin('metro','metro.object_id','=','objects.id')
                ->leftJoin('sea','sea.object_id','=','objects.id')
                ->select('objects.id','sea','sea_path','sea.object_id')
                ->whereNotNull('sea')
                ->get();

            $sea = $sea->toArray();


            foreach ($items as $key => $item){
                foreach ($sea as $s) {
                    if ($item['id'] == $s['object_id'] ){

                        $items[$key]['seas'][] =  [ 'sea' => $s['sea'], 'sea_path' => $s['sea_path']];

                    }
                }
            }

            $photos = $model
                ->leftJoin('object_photos','object_photos.object_id','=','objects.id')
                ->select('name','object_photos.id','object_id')
                ->get();

            $photos = $photos->toArray();



                $values = $model
                ->rightJoin('object_service', 'object_service.object_id', '=', 'objects.id')
                ->whereIn('service_id', array(4, 16, 23, 38,21,196,204))
                ->select('value','object_id','service_id')
                ->get();

            $services = $values->toArray();


            foreach ($items as $key => $item){
                foreach ($services as $service) {
                    if ($item['id'] == $service['object_id'] ){
                        $items[$key]['services'][$service['service_id']] =  $service['value'];
                    }
                }
            }


//
//            foreach ($items as $key => $item){
//                foreach ($services as $service) {
//                    if ($item['id'] == $service['object_id'] ){
//                        $items[$key]['services'][$service['service_id']] =  $service['value'];
//                    }
//                }
//            }



            foreach ($items as $key => $item){
                foreach ($photos as $photo) {
                    if ($item['id'] == $photo['object_id'] ){
                        $items[$key]['photos'][] =  $photo['name'];

                    }
                }
            }


            foreach ($items as $key => $item){
                $items[$key]['days'] = round((strtotime($item['date_to']) - strtotime($item['date_from'])) / (60 * 60 * 24));
            }

                $types = [
                    'Отель', 'Гостиница', 'Гостевой дом',
                    'Мини гостиница',
                    'Квартира, апартаменты', 'Отель эконом-класс', 'Эллинг по номерам', 'База отдыха',
                    'Тур база',
                    'Дом, коттедж, эллинг',
                    'Отель эконом-класс', 'Эллинг по номерам',
                    'База отдыха',
                    'Тур база',
                    'Комната', 'Санаторий', 'Пансионат', 'Хостел', 'Кровать и завтрак'
                ];


            $breadCrumbs = count($items) > 0 ?
                '<div class="search__title">Главная › '. $items[0]["country"] .' › '.$items[0]["region"].' › '.$items[0]["area"].' › '.$items[0]["city"].'</span></div>'
            : '<div class="search__title">Главная › <span class="search__active">Каталог</span></div>';


            $title = count($items) > 0 ? "Снять ".$types[ (int)$items[0]["type"] - 1]. " в городе " . $items[0]["city"] : "Снять без посредников - Каталог";

                return view('catalog')->with('items', $items)->with('days',date_diff($start_date,$end_date)->days)->with('breadCrumbs',$breadCrumbs)->with("title",$title);
            } else {
                $title =  "Снять без посредников - Каталог";
                $breadCrumbs =   '<div class="search__title">Главная › <span class="search__active">Каталог</span></div>';
                return view('catalog')->with('items', $items)->with('days',round((strtotime($dateFrom) - strtotime($dateTo)) / (60 * 60 * 24)))->with('breadCrumbs',$breadCrumbs)->with("title",$title);
            }
        }
}
