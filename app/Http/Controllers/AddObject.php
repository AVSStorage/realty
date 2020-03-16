<?php

namespace App\Http\Controllers;

use App\ObjectMetro;
use App\Objects;
use App\ObjectService;
use App\Service;
use App\States;
use App\Types;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AddObject extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin|owner');

    }

    /**
     * @param Request $request
     */
    public function object(Request $request) {

            $comment = Objects::find(1);


            $objects = Service::where('service_type', 1)->get();
            $objects_2 = Service::where('service_type', 2)->get();
            $objects_3 = Service::where('service_type', 3)->get();
            $objects_4 = Service::where('service_type', 4)->get();
            $objects_5 = Service::where('service_type', 5)->get();
            $objects_6 = Service::where('service_type', 6)->get();
            $objects_7 = Service::where('service_type', 7)->get();
            $objects_8 = Service::where('service_type', 8)->get();
            $objects_9 = Service::where('service_type', 9)->get();
            $objects_10 = Service::where('service_type', 10)->get();
            $objects_11 = Service::where('service_type', 11)->get();
            $types = Types::all();
            $states = States::all();
            return view('add-object')->with(compact('objects'))
                ->with(compact('types'))
                ->with(compact('states'))
                ->with(compact('objects_2'))
                ->with(compact('objects_3'))
                ->with(compact('objects_4'))
                ->with(compact('objects_5'))
                ->with(compact('objects_6'))
                ->with(compact('objects_7'))
                ->with(compact('objects_8'))
                ->with(compact('objects_9'))
                ->with(compact('objects_10'))
                ->with(compact('objects_11'));
    }

    public function checkPerson($id){
        $user = \Auth::user();
        return $user->objects()->where('objects.id','=',$id)->exists();
    }


    public function edit(){

        if ($this->checkPerson(\Route::current()->parameter('object_id')) || Auth::user()->hasRole('admin')) {
            $objects = new Objects();
            $result = $objects->where('id', '=', \Route::current()->parameter('object_id'))->selectRaw('center_path as center,airport as airoportName, airport_path as airoportDistance,railway as railwayName, railway_path as railwayDistance')->get()->toArray();
            $result2 = $objects->where('id', '=', \Route::current()->parameter('object_id'))->get(['country', 'region', 'area', 'city', 'district', 'community', 'string', 'house', 'housing'])->toArray();
            $metro = $objects->leftJoin('metro', 'metro.object_id', '=', 'objects.id')->where('objects.id', '=', \Route::current()->parameter('object_id'))->whereNotNull('metro')->selectRaw('object_id as id, metro as metroName,metro_path as metroPath')->get()->toArray();
            $seas = $objects->leftJoin('sea', 'sea.object_id', '=', 'objects.id')->where('objects.id', '=', \Route::current()->parameter('object_id'))->whereNotNull('sea')->selectRaw('object_id as id, sea as seaName,sea_path as seaPath')->get()->toArray();
            $coords = $objects->where('id', '=', \Route::current()->parameter('object_id'))->get(['coordinateX', 'coordinateY'])->toArray()[0];


            $services = $objects->leftJoin('object_service', 'object_service.object_id', '=', 'objects.id')->leftJoin('services', 'services.id', '=', 'object_service.service_id')->where('objects.id', '=', \Route::current()->parameter('object_id'))->get(['service_id', 'value', 'services.service_type'])->toArray();

            $result3 = array();
            foreach ($services as $element) {
                $result3[$element['service_type']][] = [$element['service_id'] => $element['value']];
            }

            $result4 = [];
            foreach ($result3 as $key => $element) {

                $result4[] = ['id' => $key, 'value' => $element];
            }

            $objects22 = $objects->leftJoin('object_service', 'object_service.object_id', '=', 'objects.id')->leftJoin('services', 'services.id', '=', 'object_service.service_id')->where('service_type', '=', 1)->where('objects.id', '=', \Route::current()->parameter('object_id'))->get(['service_id', 'value']);
            $objects_2 = $objects->leftJoin('object_service', 'object_service.object_id', '=', 'objects.id')->leftJoin('services', 'services.id', '=', 'object_service.service_id')->where('service_type', '=', 2)->where('objects.id', '=', \Route::current()->parameter('object_id'))->get(['service_id', 'value']);
            $objects_3 = $objects->leftJoin('object_service', 'object_service.object_id', '=', 'objects.id')->leftJoin('services', 'services.id', '=', 'object_service.service_id')->where('service_type', '=', 3)->where('objects.id', '=', \Route::current()->parameter('object_id'))->get(['service_id', 'value']);
            $objects_4 = $objects->leftJoin('object_service', 'object_service.object_id', '=', 'objects.id')->leftJoin('services', 'services.id', '=', 'object_service.service_id')->where('service_type', '=', 4)->where('objects.id', '=', \Route::current()->parameter('object_id'))->get(['service_id', 'value']);
            $objects_5 = $objects->leftJoin('object_service', 'object_service.object_id', '=', 'objects.id')->leftJoin('services', 'services.id', '=', 'object_service.service_id')->where('service_type', '=', 5)->where('objects.id', '=', \Route::current()->parameter('object_id'))->get(['service_id', 'value']);
            $objects_6 = $objects->leftJoin('object_service', 'object_service.object_id', '=', 'objects.id')->leftJoin('services', 'services.id', '=', 'object_service.service_id')->where('service_type', '=', 6)->where('objects.id', '=', \Route::current()->parameter('object_id'))->get(['service_id', 'value']);
            $objects_7 = $objects->leftJoin('object_service', 'object_service.object_id', '=', 'objects.id')->leftJoin('services', 'services.id', '=', 'object_service.service_id')->where('service_type', '=', 7)->where('objects.id', '=', \Route::current()->parameter('object_id'))->get(['service_id', 'value']);
            $objects_8 = $objects->leftJoin('object_service', 'object_service.object_id', '=', 'objects.id')->leftJoin('services', 'services.id', '=', 'object_service.service_id')->where('service_type', '=', 8)->where('objects.id', '=', \Route::current()->parameter('object_id'))->get(['service_id', 'value']);
            $objects_9 = $objects->leftJoin('object_service', 'object_service.object_id', '=', 'objects.id')->leftJoin('services', 'services.id', '=', 'object_service.service_id')->where('service_type', '=', 9)->where('objects.id', '=', \Route::current()->parameter('object_id'))->get(['service_id', 'value']);
            $objects_10 = $objects->leftJoin('object_service', 'object_service.object_id', '=', 'objects.id')->leftJoin('services', 'services.id', '=', 'object_service.service_id')->where('service_type', '=', 10)->where('objects.id', '=', \Route::current()->parameter('object_id'))->get(['service_id', 'value']);
            $objects_11 = $objects->leftJoin('object_service', 'object_service.object_id', '=', 'objects.id')->leftJoin('services', 'services.id', '=', 'object_service.service_id')->where('service_type', '=', 11)->where('objects.id', '=', \Route::current()->parameter('object_id'))->get(['service_id', 'value']);
            $objects_12 = $objects->leftJoin('object_service', 'object_service.object_id', '=', 'objects.id')->leftJoin('services', 'services.id', '=', 'object_service.service_id')->where('service_type', '=', 12)->where('objects.id', '=', \Route::current()->parameter('object_id'))->get(['service_id', 'value']);
            $objects_13 = $objects->leftJoin('object_service', 'object_service.object_id', '=', 'objects.id')->leftJoin('services', 'services.id', '=', 'object_service.service_id')->where('service_type', '=', 13)->where('objects.id', '=', \Route::current()->parameter('object_id'))->get(['service_id', 'value']);
            $objects_14 = $objects->leftJoin('object_service', 'object_service.object_id', '=', 'objects.id')->leftJoin('services', 'services.id', '=', 'object_service.service_id')->where('service_type', '=', 14)->where('objects.id', '=', \Route::current()->parameter('object_id'))->get(['service_id', 'value']);
            $types = Types::all();
            $states = States::all();

            $data = [];
            $data[0] = $objects22;
            $data[1] = $objects_2;
            $data[2] = $objects_3;
            $data[3] = $objects_4;
            $data[4] = $objects_5;
            $data[5] = $objects_6;
            $data[6] = $objects_7;
            $data[7] = $objects_8;
            $data[8] = $objects_9;
            $data[9] = $objects_10;
            $data[10] = $objects_11;


            $calendarData[0] = $objects_12;
            $calendarData[1] = $objects_13;
            $calendarData[2] = $objects_14;
            $result4 = ['objects' => $data, 'types' => $types, 'states' => $states, 'calendarData' => $calendarData];

            $result5 = $objects->leftJoin('object_photos', 'objects.id', '=', 'object_photos.object_id')->where('objects.id', '=', \Route::current()->parameter('object_id'))->selectRaw('object_photos.name as photo, path as value')->get()->toArray();
            $res = [];
            foreach ($result5 as $key => $r) {
                $res[$key] = array_merge($r, ['description' => 'фото',
                    'placeHolder' => 'Что на фото?',
                    "extension" => "",
                    "path" => "",
                    'empty' => false]);
            }

            return view('add-type')->with('data1', ['coords' => [$coords['coordinateX'], $coords['coordinateY']], 'type' => $objects->where('id', '=', \Route::current()->parameter('object_id'))->get(['type'])->toArray()[0]['type'], 'distance' => array_merge($result[0], ['metros' => $metro], ['seas' => $seas]), 'address' => $result2[0]])
                ->with('data2', $result4)->with('data3', $res);
        } else {
            return redirect('/dashboard/objects');
        }
    }


    /**
     * @param Request $request
     */
    public function type(Request $request) {
        return view('add-type');
    }

    /**
     * @param Request $request
     */
    public function calendar(Request $request) {
        return view('add-calendar');
    }

    /**
     * @param Request $request
     */
    public function photo(Request $request) {
        return view('add-photo');
    }
}
