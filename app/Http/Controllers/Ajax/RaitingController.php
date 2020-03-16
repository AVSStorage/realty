<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RaitingController extends Controller
{
       /*

    @param  \Illuminate\Http\Request  $request

    */
    public function send(Request $request) {

        $type = $request->input('type');
        $object = [
            'places' => [
                    'Дома' => 256,
                    'Квартиры' => 1328,
                    'Отели' => 60,
                    'Спальное место' => 10577,
                    'Гостинц' => 253
            ],
            'country' => [
                'Крым' => '60 городов и поселков, 12 000 вариантов размещения',
                'Москва' => '70 отелей, 824 квартиры',
                'Красная Поляна' => '40 отелей, 110 домов',
                'Краснодар' => '24 отеля, 390 квартир',
                'Ялта' => '24 отеля, 390 квартир'
            ]
        ];
        return response()->json([
            'objects' => $object[$type],
        'descriptions' => [
            'Коттеджи, виллы, эллинги, таунхаусы,дачи, бунгалл',
            'Квартиры, апартаменты, отдельные номера, лофт',
            'Отели, гостиницы, гостевые дома,мотели, санатории',
            'Хостел, комната, комната в доме'
        ]
            ]);
    }
}
