<?php

namespace App\Http\Controllers\Ajax;

use App\Metro;
use App\ObjectLocking;
use App\ObjectOccupation;
use App\Objects;
use App\ObjectService;
use App\ObjectsPhoto;
use App\ObjectSubTypes;
use App\ObjectTypes;
use App\OccupationSurcharge;
use App\Sea;
use App\Service;
use App\ServiceTypes;
use App\States;
use App\Types;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\In;
use Intervention\Image\ImageManagerStatic as Image;


class ObjectController extends Controller
{
    /*

 @param  \Illuminate\Http\Request  $request

 */
    public function sendNames(Request $request)
    {
        $model = new ServiceTypes();
        $names = $model
            ->where([['service_types.id', '<>', 13], ['service_types.id', '<>', 14]])
            ->get();
        return response()->json($names->toArray());


    }

    public function updatePrepay(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $object = new Objects();
        $object->where('id', $data['id'])->update(['prepay' => $data['prepay']]);
    }

    /*

@param  \Illuminate\Http\Request  $request

*/
    public function sendValues(Request $request)
    {
        $model = new ObjectService();
        $values = $model
            ->leftJoin('services', 'service_type', '=', 'service_id')
            ->leftJoin('service_types', 'service_type', '=', 'service_types.id')
            ->where([['service_id', '>', 1], ['service_types.id', '<>', 13]])
            ->select('service_id', 'name', 'services.id')
            ->distinct()
            ->get();
        return response()->json($values->toArray());
    }


    public function hideObject(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $id = \Route::current()->parameter('object_id');
        $object = new Objects();
        $object->where('id', '=', $id)->update(['status' => $data['status']]);
    }

    public function addToFavourites(){

        if (!Auth::guest()) {
            $object = Objects::find(\Route::current()->parameter('object_id'));;
            $object->toggleFavorite(\Auth::id());
        } else {
            return ["error" => "Эта функция доступна для авторизированных пользователей"];
        }

    }


    public function updateObject(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $objects = $data['objects'];


        $lockings = $data['object_locking'];

        $surcharge = $data['occupation_surcharge'];
        foreach ($lockings as $locking) {
            DB::table('object_locking')->updateOrInsert(['object_id' => $data['id']], array_merge($locking, ['object_id' => $data['id']]));
        }


        $object = new Objects();
        $object->where('id', $data['id'])->update($objects);


        $metros = $data['metro'];
        $seas = $data['sea'];

        $objectServices = $data['object_service'];

        $photos = $data['object_photos'];

        $occupation = $data['object_occupation'];
        $oc = new ObjectOccupation();
        $oc->where('object_id', $data['id'])->update(array_merge($occupation, ['object_id' => $data['id']]));
        $ph = new ObjectsPhoto();
        $ph->where('object_id', $data['id'])->delete();

        $os = new OccupationSurcharge();

        foreach ($surcharge as $surch) {

            DB::table('occupation_surcharge')->updateOrInsert(['object_id' => $data['id']], array_merge($surch, ['object_id' => $data['id']]));
        }




        foreach ($photos as $photo) {
            ObjectsPhoto::updateOrCreate(['object_id' => $data['id'], 'name' => $photo['photo']], ['object_id' => $data['id'], 'name' => $photo['photo'], 'description' => $photo['value'], "path" => $photo['path'], 'extension' => $photo['extension'] ]);
        }

        $ser = new ObjectService();


        foreach ($objectServices as $services) {
            foreach ($services['value'] as $service) {
//                    dd(  $ser->where('object_id',$data['id'])->where( 'service_id','=',$service[0])->get()->toArray());
                ObjectService::updateOrCreate(['object_id' => $data['id'], 'service_id' => $service[0]], ['value' => intval($service[1])]);
//                    $ser->where('object_id',$data['id'])->where( 'service_id','=',$service[0])->update( [ 'value' => intval($service[1])]);
            }
        }


        $currentSeas = new Sea();
        $currentSeas->where('object_id', $data['id'])->delete();


        foreach ($seas as $sea) {
            Sea::updateOrCreate(['object_id' => $data['id'], 'sea' => $sea['sea']], array_merge($sea, ['object_id' => $data['id']]));
//                DB::table('sea')->where('object_id',$data['id'])->update( array_merge($sea));
        }

        $currentMetros = new Metro();
        $currentMetros->where('object_id', $data['id'])->delete();

        foreach ($metros as $metro) {
            Metro::updateOrCreate(['object_id' => $data['id'], 'metro' => $metro['metro']], array_merge($metro, ['object_id' => $data['id']]));
//                DB::table('metro')->where('object_id',$data['id'])->update( $metro);
        }


    }

    /*

@param  \Illuminate\Http\Request  $request

*/
    public function sendFilters(Request $request)
    {
        $model = new Objects();

        $prices = $model
            ->leftJoin('object_service', 'object_id', '=', 'objects.id')
            ->selectRaw(" MIN(value) as min, MAX(value) as max")
            ->where('service_id', '=', 204)
            ->get();

        $seas = $model
            ->leftJoin('sea', 'object_id', '=', 'objects.id')
            ->selectRaw(" MIN(sea_path) as min, MAX(sea_path) as max")
            ->get();

        $metros = $model
            ->leftJoin('metro', 'object_id', '=', 'objects.id')
            ->selectRaw(" MIN(metro_path) as min, MAX(metro_path) as max")
            ->get();

        $data = [
            'prices' => $prices->toArray()[0],
            'metros' => $metros->toArray()[0],
            'seas' => $seas->toArray()[0]
        ];


        return response()->json($data);
    }

    public function getObjectServices(Request $request)
    {
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
        $objects_12 = Service::where('service_type', 12)->get();
        $objects_13 = Service::where('service_type', 13)->get();
        $objects_14 = Service::where('service_type', 14)->get();
        $types = Types::all();
        $states = States::all();

        $data = [];
        $data[0] = $objects;
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

        $user = \Auth::user();
        $objects = new Objects();
        $max = $objects->selectRaw('MAX(id) as max')->get()->toArray()[0]['max'];
        return response()->json(['objects' => $data, 'types' => $types, 'states' => $states, 'calendarData' => $calendarData, 'user' => $user->getAuthIdentifier(), 'linkId' => (int)$max + 1]);
    }

    public function sortList(Request $request){
        $objects = new Objects();
        return $objects->where('city','like','%'.$request->json()->get('input').'%' )->groupBy('city')->get(['id','city'])->unique('city')->toArray();

    }

    public function sendInfo(){
        $objects = new Objects();
        return $objects->groupBy('city')->get(['id','city'])->unique('city')->toArray();
    }


    public function getSubTypes(){

$object = new ObjectSubTypes();

        return $object->leftJoin('object_types','object_types.id','=','object_subtypes.type_id')->distinct()->get(['object_types.type','object_subtypes.id','name'])->groupBy('type')->toArray();
    }


    public function uploadImage(Request $request)
    {
        // $request->photo->storeAs('public/photos',$request->num.'.'.$request->photo->getClientOriginalExtension());

        $this->validate($request, [
            'photo' => 'image|mimes:jpeg,png,jpg|dimensions:min_width=870,min_height=532',
        ]);



        $id =  Input::get('id') !== null ? Input::get('id') : Objects::orderBy('id', "DESC")->get('id')->first()->toArray()['id'] + 1;
        $image = $request->file('photo');

        $filename = pathinfo($request->photo->getClientOriginalName(), PATHINFO_FILENAME)  .rand(1, 100) . '.' . $request->photo->getClientOriginalExtension();


        $image_resize = Image::make($image->getRealPath());
        $user = \Auth::user();

        if (!File::isDirectory(public_path('images/choice/' . $user->getAuthIdentifier() . '/' . $id  ))) {
            File::makeDirectory(public_path('images/choice/' . $user->getAuthIdentifier() . '/' . $id ),0777,true);
        }

        $image_resize->save(public_path('images/choice/' . $user->getAuthIdentifier() . '/' . $id . '/'. $filename));
        $image_resize->resize(220, 220);



        $smallFilename = pathinfo($request->photo->getClientOriginalName(), PATHINFO_FILENAME) .rand(1, 100) . '_220x220.' . $request->photo->getClientOriginalExtension();

        $image_resize->save(public_path('images/choice/' . $user->getAuthIdentifier() . '/' . $id . '/'. $smallFilename));

        return [
            'id' => (int)$request->num,
            'photo' => 'images/choice/' . $user->getAuthIdentifier() . '/' . $id . '/'. $smallFilename,
            "path" => 'images/choice/' . $user->getAuthIdentifier() . '/' . $id . '/'. pathinfo($request->photo->getClientOriginalName(), PATHINFO_FILENAME),
            "extension" => $request->photo->getClientOriginalExtension(),
            'description' => 'фото',
            'placeHolder' => 'Что на фото?',
            'value' => '',
            'empty' => false
        ];
    }

    public function addNewObject(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $objects = $data['objects'];
        $object = new Objects();
        DB::table('objects')->insert($objects);
        $id = $object->selectRaw("MAX(id) as max")->get()->toArray();

        $metros = $data['metro'];
        $seas = $data['sea'];

        $objectServices = $data['object_service'];

        $photos = $data['object_photos'];

        $occupation = $data['object_occupation'];
        DB::table('object_occupation')->insert(array_merge($occupation, ['object_id' => $id[0]['max']]));
        foreach ($photos as $photo) {
            DB::table('object_photos')->insert(['object_id' => $id[0]['max'], 'name' => $photo['photo'], 'description' => $photo['value'],'extension' => $photo['extension'], 'path' => $photo['path'] ]);
        }

        foreach ($objectServices as $services) {
            foreach ($services['value'] as $service) {
                DB::table('object_service')->insert(['object_id' => $id[0]['max'], 'service_id' => $service[0], 'value' => intval($service[1])]);
            }
        }
        foreach ($seas as $sea) {
            DB::table('sea')->insert(array_merge($sea, ['object_id' => $id[0]['max']]));
        }

        foreach ($metros as $metro) {
            DB::table('metro')->insert(array_merge($metro, ['object_id' => $id[0]['max']]));
        }
//        $metros = array_merge($data['metro'],['object_id' => $id[0]['max']]);
//        dd($metros);
        //


        $lockings = $data['object_locking'];

        foreach ($lockings as $locking) {

            DB::table('object_locking')->insert(array_merge($locking, ['object_id' => $id[0]['max']]));
        }
    }

    /*

@param  \Illuminate\Http\Request  $request

*/
    public function getFilters(Request $request)
    {

        $postData = json_decode($request->getContent(), true);
        $model = new Objects();
        $minLength = count($postData['checkboxes']);
        if ($minLength > 0) {

            $filteredByRanges = $model
                ->join('metro', 'metro.object_id', '=', 'objects.id')
                ->join('sea', 'sea.object_id', '=', 'objects.id')
                ->join('object_service', 'object_service.object_id', '=', 'objects.id')
                ->whereRaw('metro_path >= ' . ($postData['metroMin']) . ' and metro_path <= ' . ($postData['metroMax']))
                ->whereRaw('sea_path >= ' . ($postData['seaMin']) . ' and sea_path <= ' . ($postData['seaMax']))
                ->whereRaw('((service_id = 204) and ( value >= ' . $postData['priceMin'] . ' and value <= ' . $postData['priceMax'] . ') )')
                ->select('city', 'string', 'housing', 'house', 'type', 'objects.id')
                ->distinct()
                ->get();


            $filteredByCheckboxes = $model
                ->join('metro', 'metro.object_id', '=', 'objects.id')
                ->join('sea', 'sea.object_id', '=', 'objects.id')
                ->join('object_service', 'object_service.object_id', '=', 'objects.id')
                ->whereRaw(' service_id IN (' . implode(',', $postData['checkboxes']) . ') and value=1')->select('city', 'string', 'housing', 'house', 'type', 'objects.id')
                ->groupBy('objects.id')
                ->havingRaw('COUNT(`objects`.`id`) = ' . $minLength)
                ->get();

            $data['objects'] = $filteredByRanges->intersect($filteredByCheckboxes);

        } else {

            $data['objects'] = $model
                ->join('object_service', 'object_service.object_id', '=', 'objects.id', 'left outer')
                ->join('sea', 'sea.object_id', '=', 'objects.id')
                ->join('metro', 'metro.object_id', '=', 'objects.id')
                ->whereRaw('metro_path >= ' . ($postData['metroMin']) . ' and metro_path <= ' . ($postData['metroMax']))
                ->whereRaw('sea_path >= ' . ($postData['seaMin']) . ' and sea_path <= ' . ($postData['seaMax']))
                ->whereRaw('((service_id = 204) and ( value >= ' . $postData['priceMin'] . ' and value <= ' . $postData['priceMax'] . ') )')
                ->select('city', 'string', 'housing', 'house', 'type', 'objects.id')
                ->distinct()
                ->get();
        }

        $metro = $model
            ->leftJoin('metro', 'metro.object_id', '=', 'objects.id')
            ->select('objects.id', 'metro', 'metro_path', 'metro.object_id')
            ->whereRaw('metro_path >= ' . ($postData['metroMin']) . ' and metro_path <= ' . ($postData['metroMax']))
            ->whereNotNull('metro')
            ->get();

        $sea = $model
            ->leftJoin('sea', 'sea.object_id', '=', 'objects.id')
            ->select('objects.id', 'sea', 'sea_path', 'sea.object_id')
            ->whereNotNull('sea')
            ->whereRaw('sea_path >= ' . ($postData['seaMin']) . ' and sea_path <= ' . ($postData['seaMax']))
            ->get();


        $metro = $this->getIntersectedByIdCollection($metro,$data['objects']);
        $sea = $this->getIntersectedByIdCollection($sea,$data['objects'] );
        $photos = $this->getIntersectedByIdCollection($model->getPhotos(),$data['objects']);
        $services = $this->getIntersectedByIdCollection($model->getServices(),$data['objects']);


        $data['objects'] = $this->generateSendedArray($data['objects'],$metro, $services, $photos, $sea );


        return response()->json(['objects' => $data['objects']]);
    }


    /**
     * @param \Illuminate\Database\Eloquent\Collection $initialCollection
     * @param Collection $newCollection
     * @return mixed
     */
    public function getIntersectedByIdCollection(\Illuminate\Database\Eloquent\Collection $initialCollection, Collection $newCollection){
        return $initialCollection->intersect($newCollection)->groupBy('id')->toBase();
    }


    /**
     * @param \Illuminate\Database\Eloquent\Collection $objectData
     * @param Collection $metro
     * @param Collection $services
     * @param Collection $photos
     * @param Collection $sea
     * @return array|\Illuminate\Database\Eloquent\Collection
     */
    public function generateSendedArray(\Illuminate\Database\Eloquent\Collection $objectData, Collection $metro, Collection $services, Collection $photos, Collection $sea){

        $objectData = $objectData->toBase()->groupBy('id')->map(function ($item, $key) use ($metro, $services, $photos, $sea) {



           $serviceArray = $services->get($key)->mapWithKeys(function ($value) {
               return [$value['service_id'] => $value['value']];
           });

           $types = ObjectSubTypes::all()->toArray();

            return collect($item->get(0))->merge(['metros' => $metro->get($key)])
                ->merge(['seas' => $sea->get($key)])
                ->merge(['services' => $serviceArray])
                ->merge(['photos' => $photos->get($key)->map(function ($value, $key) {
                    return collect($value)->get('name');
                })])
                ->merge(['objectName' => $types[$item->get(0)['type'] - 1]['name']])
                ->merge(['objectType' => $types[$item->get(0)['type'] - 1]['type_id']]);
        })->values()->toArray();


        return $objectData;
    }

    public function sendMaxObjectCount(Request $request)
    {
        $model = new Objects();
        return response()->json(['total' => $model->count()]);
    }


    public function sendObjects()
    {
        $model = new Objects();

        $data['objects'] = $model->getShownObjects();
        $metro = $this->getIntersectedByIdCollection($model->getMetros(),   $data['objects'] );
        $sea = $this->getIntersectedByIdCollection($model->getSeas(),  $data['objects']);
        $photos = $this->getIntersectedByIdCollection($model->getPhotos(),  $data['objects']);
        $services = $this->getIntersectedByIdCollection($model->getServices(),  $data['objects']);

        $data['objects'] = $this->generateSendedArray($data['objects'],$metro, $services, $photos, $sea );


        return response()->json(['objects' => $data['objects']]);
    }

    public function sendImages()
    {

        $dateFrom = Input::get('dateFrom');
        $dateTo = Input::get('dateTo');
        $region = Input::get('region');
        $guests = Input::get('guests');
        $city = Input::get('city');
        $place = Input::get('place');
        $dispatchFromDate = substr($dateFrom, 0, strpos($dateFrom, '('));
        $model = new Objects();
        $items = $model
            ->leftJoin('object_service', 'object_service.object_id', '=', 'objects.id')
            ->leftJoin('object_occupation', 'object_occupation.object_id', '=', 'objects.id')
            ->whereRaw("(date_from <= '" . (date('Y-m-d', $dateFrom / 1000)) . "' and ( date_to >= '" . (date('Y-m-d', $dateTo / 1000)) . "' ) and (service_id = 205 and value > " . $guests . ") ) " . (!intval($region) || !intval($city) ? "and ( " . (!intval($region) ? " (region LIKE '%" . $region . "%')" : '') . " " . (!intval($city) ? " and (city LIKE '%" . $city . "%')" : '') . ")" : ''))
            ->get();


        $items = $items->toArray();

        $photos = $model
            ->leftJoin('object_photos', 'object_photos.object_id', '=', 'objects.id')
            ->select('name', 'object_photos.id', 'object_id')
            ->get();

        $photos = $photos->toArray();


        $photoArray = [];
        $photoArray2 = [];

        foreach ($items as $key => $item) {
            foreach ($photos as $photo) {
                if ((int)$item['id'] === (int)$photo['object_id']) {

                    array_push($photoArray, $photo['name']);

                }
            }

            $photoArray2[$key] = $photoArray;
            $photoArray = [];
        }


        return response()->json($photoArray2);
    }

    public function sendFilteredObject()
    {
        $dateFrom = Input::get('dateFrom');
        $dateTo = Input::get('dateTo');
        $region = Input::get('region');
        $guests = Input::get('guests');
        $city = Input::get('city');
        $place = Input::get('place');
        $dispatchFromDate = substr($dateFrom, 0, strpos($dateFrom, '('));
        $dispatchToDate = substr($dateTo, 0, strpos($dateTo, '('));
        //  echo date('Y-m-d h:i:s', strtotime($dispatchToDate." +3 hours"));
        // timestamp received from JS via ajax


        $model = new Objects();
        $items = $model
            ->leftJoin('object_service', 'object_service.object_id', '=', 'objects.id')
            ->leftJoin('object_occupation', 'object_occupation.object_id', '=', 'objects.id')
            ->whereRaw("(date_from <= '" . (date('Y-m-d', $dateFrom / 1000)) . "' and ( date_to >= '" . (date('Y-m-d', $dateTo / 1000)) . "' ) ) and ((service_id = 205 and value < " . $guests . ") " . (!intval($region) ? "or (region LIKE '%" . $region . "%')" : '') . " " . (!intval($city) ? "or (city LIKE '%" . $city . "%')" : '') . ")")
            ->select('city', 'string', 'housing', 'house', 'type', 'objects.id', 'price')
            ->distinct()
            ->get();


        $data['objects'] = $items->toArray();

        $metro = $model
            ->leftJoin('metro', 'metro.object_id', '=', 'objects.id')
//            ->leftJoin('sea','sea.object_id','=','objects.id')
            ->select('objects.id', 'metro', 'metro_path', 'metro.object_id')
            ->whereNotNull('metro')
            ->get();

        $metro = $metro->toArray();

        foreach ($data['objects'] as $key => $item) {
            foreach ($metro as $m) {
                if ($item['id'] == $m['object_id']) {
                    $data['objects'][$key]['metros'][] = ['metro' => $m['metro'], 'metro_path' => $m['metro_path']];
                }
            }
        }

        $sea = $model
//            ->leftJoin('metro','metro.object_id','=','objects.id')
            ->leftJoin('sea', 'sea.object_id', '=', 'objects.id')
            ->select('objects.id', 'sea', 'sea_path', 'sea.object_id')
            ->whereNotNull('sea')
            ->get();

        $sea = $sea->toArray();


        foreach ($data['objects'] as $key => $item) {
            foreach ($sea as $s) {
                if ($item['id'] == $s['object_id']) {

                    $data['objects'][$key]['seas'][] = ['sea' => $s['sea'], 'sea_path' => $s['sea_path']];

                }
            }
        }

        $photos = $model
            ->leftJoin('object_photos', 'object_photos.object_id', '=', 'objects.id')
            ->select('name', 'object_photos.id', 'object_id')
            ->get();

        $photos = $photos->toArray();


        $values = $model
            ->rightJoin('object_service', 'object_service.object_id', '=', 'objects.id')
            ->whereIn('service_id', array(4, 16, 23, 38, 21, 196, 204))
            ->select('value', 'object_id', 'service_id')
            ->get();

        $services = $values->toArray();


        foreach ($data['objects'] as $key => $item) {
            foreach ($services as $service) {
                if ($item['id'] == $service['object_id']) {
                    $data['objects'][$key]['services'][$service['service_id']] = $service['value'];
                }
            }
        }


//
//        foreach ($data['objects'] as $key => $item){
//            foreach ($services as $service) {
//                if ($item['id'] == $service['object_id'] ){
//                    $data['objects'][$key]['services'][$service['service_id']] =  $service['value'];
//                }
//            }
//        }


        foreach ($data['objects'] as $key => $item) {
            foreach ($photos as $photo) {
                if ($item['id'] == $photo['object_id']) {
                    $data['objects'][$key]['photos'][] = $photo['name'];

                }
            }
        }


        return response()->json($data['objects']);
    }
}
