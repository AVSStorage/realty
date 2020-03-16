@extends('layouts.app')

@section('content')


    <!-- characteristic  -->
    <div class="characteristic">
        <div class="container">
            <div class="chara__inner">
                {{ Form::open(array('url' => 'update-object')) }}

                <div class="chara__left">
                    <div class="chara__title" id="charaTitle">
                        Характеристики объекта
                    </div>
                    <div class="chara__left-inner">

                        <div class="chara__item">


                            @foreach($objects->take(7) as $object)

                                <div class="chara__left-block">
                                    @if ( $object->name === 'комнаты смежные' || $object->name === 'комнаты раздельные')
                                        <div class="service">
                                            <label for="services{{$object->id}}">{{$object->name}}</label>
                                            <input name="value[1][{{$object->id}}]" id="services{{$object->id}}" type="checkbox">
                                        </div>

                                        {{--                                        @elseif ( $object->name === 'комнаты раздельные')--}}
                                        {{--                                            <div class="service  service--active ser--act">--}}
                                        {{--                                                комнаты раздельные--}}
                                        {{--                                            </div>--}}

                                    @else
                                        <div class="chara__left-line">
                                            <div class="chara__type types">
                                                {{ $object->name }}
                                            </div>
                                            @if ( $object->name === 'Тип строения')
                                                <select name="value[1][{{$object->id}}]">
                                                    @foreach($types as $type)
                                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                                    @endforeach
                                                </select>
{{--                                                <input class="streett" placeholder="Сруб">--}}
                                            @elseif ( $object->name === 'Состояние жилья')
                                                <select name="value[1][{{$object->id}}]">
                                                    @foreach($states as $state)
                                                        <option value="{{$state->id}}">{{$state->name}}</option>
                                                    @endforeach
                                                </select>
{{--                                                <input class="streett" placeholder="Евро ремонт">--}}

                                            @else
                                                <input class="street" value="{{ $object->value ? $object->value : '' }}" name="value[1][{{$object->id}}]" placeholder="3">
                                            @endif

                                        </div>

                                    @endif
                                </div>
                            @endforeach
{{--                            <div class="chara__left-block">--}}
{{--                                <div class="chara__left-line">--}}
{{--                                    <div class="chara__type types">--}}
{{--                                        Тип<br>строения--}}
{{--                                    </div>--}}
{{--                                    <input class="streett" placeholder="Сруб">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="chara__left-block">--}}
{{--                                <div class="chara__left-line">--}}
{{--                                    <div class="chara__type-1 types">--}}
{{--                                        Состояние<br>жилья--}}
{{--                                    </div>--}}
{{--                                    <input class="streett" placeholder="Евро ремонт">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="chara__left-maximum">--}}
{{--                                <div class="chara__type">--}}
{{--                                    Максимум гостей*--}}
{{--                                </div>--}}
{{--                                <input class="street" placeholder="3">--}}
{{--                            </div>--}}



{{--                            <div class="chara__left-maximum-1">--}}
{{--                                <div class="chara__type top">--}}
{{--                                    Комнат*--}}
{{--                                </div>--}}
{{--                                <input class="street" placeholder="3">--}}
{{--                            </div>--}}


{{--                            <div class="service  service--active ser--act">--}}
{{--                                комнаты раздельные--}}
{{--                            </div>--}}
{{--                            <div class="service">--}}
{{--                                комнаты смежные--}}
{{--                            </div>--}}

{{--                            <div class="chara__left-maximum-1">--}}
{{--                                <div class="chara__type top">--}}
{{--                                    Спален*--}}
{{--                                </div>--}}
{{--                                <input class="street" placeholder="3">--}}
{{--                            </div>--}}


                        </div>


                        <div class="chara__center-block">

                            @foreach($objects->slice(7, 8) as $object)
                                <div class="chara__left-maximum">
                                    <div class="chara__type-first">
                                        {{ $object->name }}
                                    </div>
                                    <input class="street"  name="value[1][{{$object->id}}]" placeholder="3">
                                </div>
                            @endforeach
{{--                            <div class="chara__left-maximum">--}}
{{--                                <div class="chara__type-first">--}}
{{--                                    Односпальных кроватей--}}
{{--                                </div>--}}
{{--                                <input class="street" placeholder="3">--}}
{{--                            </div>--}}
{{--                            <div class="chara__left-maximum">--}}
{{--                                <div class="chara__type">--}}
{{--                                    Двуспальных кроватей--}}
{{--                                </div>--}}
{{--                                <input class="street" placeholder="3">--}}
{{--                            </div>--}}
{{--                            <div class="chara__left-maximum">--}}
{{--                                <div class="chara__type">--}}
{{--                                    Односпальных диванов--}}
{{--                                </div>--}}
{{--                                <input class="street" placeholder="3">--}}
{{--                            </div>--}}
{{--                            <div class="chara__left-maximum">--}}
{{--                                <div class="chara__type">--}}
{{--                                    Двуспальных диванов--}}
{{--                                </div>--}}
{{--                                <input class="street" placeholder="3">--}}
{{--                            </div>--}}
{{--                            <div class="chara__left-maximum">--}}
{{--                                <div class="chara__type">--}}
{{--                                    Двухъярусных кроватей--}}
{{--                                </div>--}}
{{--                                <input class="street" placeholder="3">--}}
{{--                            </div>--}}
{{--                            <div class="chara__left-maximum">--}}
{{--                                <div class="chara__type">--}}
{{--                                    Кресло-кроватей--}}
{{--                                </div>--}}
{{--                                <input class="street" placeholder="3">--}}
{{--                            </div>--}}
{{--                            <div class="chara__left-maximum">--}}
{{--                                <div class="chara__type">--}}
{{--                                    Детских кроваток--}}
{{--                                </div>--}}
{{--                                <input class="street" placeholder="3">--}}
{{--                            </div>--}}
{{--                            <div class="chara__left-maximum">--}}
{{--                                <div class="chara__type">--}}
{{--                                    Раскладушек--}}
{{--                                </div>--}}
{{--                                <input class="street" placeholder="3">--}}
{{--                            </div>--}}

                        </div>




                        <div class="chara__right-block">
                            @foreach($objects->slice(15, 5) as $object)
                                <div class="chara__left-maximum">
                                    <div class="chara__type-first">
                                        {{ $object->name }}
                                    </div>
                                    <input class="street" value="{{ $object->value ? $object->value : '' }}" name="value[1][{{$object->id}}]" placeholder="20">
                                </div>
                            @endforeach
{{--                            <div class="chara__left-maximum">--}}
{{--                                <div class="chara__type">--}}
{{--                                    Площадь м²*--}}
{{--                                </div>--}}
{{--                                <input class="street" placeholder="20">--}}
{{--                            </div>--}}

{{--                            <div class="chara__left-maximum">--}}
{{--                                <div class="chara__type">--}}
{{--                                    Всего этажей в доме--}}
{{--                                </div>--}}
{{--                                <input class="street" placeholder="3">--}}
{{--                            </div>--}}

{{--                            <div class="chara__left-maximum">--}}
{{--                                <div class="chara__type">--}}
{{--                                    Этаж--}}
{{--                                </div>--}}
{{--                                <input class="street" placeholder="3">--}}
{{--                            </div>--}}

{{--                            <div class="chara__left-maximum">--}}
{{--                                <div class="chara__type">--}}
{{--                                    Сдаётся комнат--}}
{{--                                </div>--}}
{{--                                <input class="street" placeholder="3">--}}
{{--                            </div>--}}

{{--                            <div class="chara__left-maximum">--}}
{{--                                <div class="chara__type">--}}
{{--                                    Количество<br>парковочных мест--}}
{{--                                </div>--}}
{{--                                <input class="street" placeholder="3">--}}
{{--                            </div>--}}

                        </div>
                    </div>


                    <div class="chara__title" id="charaHouse">
                        Оснащения жилья
                    </div>
                    <div class="chara__left-inner-house">
                        <div class="chara__item">

                            @foreach($objects_2->slice(0,10) as $object_)
                                <div class="service">
                                    <label for="services{{$object_->id}}">{{$object_->name}}</label>
                                    <input {{ $object->value ? 'checked' : '' }} name="value[2][{{$object_->id}}]" id="services{{$object_->id}}" type="checkbox">
                                </div>
                            @endforeach



{{--                            <div class="service  service--active">--}}
{{--                                постельное белье--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                балкон/лоджия--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                беспроводной интернет Wi-Fi--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                вентилятор--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                водонагреватель--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                газовый водонагреватель--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                горячая вода постоянно--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                гардеробная--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                гостинный уголок--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                деревянный/паркетный пол--}}
{{--                            </div>--}}


                        </div>
                        <div class="chara__center-block">
                            @foreach($objects_2->slice(10,11) as $object_)
                                <div class="service">
                                    <label for="services{{$object_->id}}">{{$object_->name}}</label>
                                    <input {{ $object->value ? 'checked' : '' }} value="{{ $object->value ? $object->value : '' }}" name="value[2][{{$object_->id}}]" id="services{{$object_->id}}" type="checkbox">
                                </div>
                            @endforeach

                        </div>
                        <div class="chara__right-block">
                            @foreach($objects_2->slice(21,14) as $object_)
                                <div class="service">
                                    <label for="services{{$object_->id}}">{{$object_->name}}</label>
                                    <input {{ $object->value ? 'checked' : '' }} name="value[2][{{$object_->id}}]" id="services{{$object_->id}}" type="checkbox">
                                </div>
                            @endforeach
{{--                            <div class="service  service--active">--}}
{{--                                персональный компьютер--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                плиточный/мраморный пол--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                проводной интернет--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                кабинет--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                раскладная кровать--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                сейф--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                стиральная машина--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                сушилка для белья--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                сушильная машина--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                гоородской телефон--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                утюг с гладильной доской--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                центральное отопление--}}
{{--                            </div>--}}

{{--                            <div class="service end">--}}
{{--                                чистящие средства--}}
{{--                            </div>--}}

                        </div>
                    </div>

                    <div class="chara__title" id="charaTer">
                        Оснащение территории
                    </div>

                    <div class="chara__left-inner-house">
                        <div class="chara__item">

                            @foreach($objects_3->slice(0,12) as $object)
                                <div class="service">
                                    <label for="area{{$object->id}}">{{$object->name}}</label>
                                    <input name="value[3][{{$object->id}}]" id="area{{$object->id}}" type="checkbox">
                                </div>
                            @endforeach
{{--                            <div class="service">--}}
{{--                                закрытый двор--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                огороженная территория--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                баня--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                сауна--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                хамам--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                турецкая баня--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                беседка--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                веранда--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                гамак--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                гараж--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                детские качели--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                игровая площадка--}}
{{--                            </div>--}}


                        </div>
                        <div class="chara__center-block">
                            @foreach($objects_3->slice(12,12) as $object)
                                <div class="service">
                                    <label for="area{{$object->id}}">{{$object->name}}</label>
                                    <input name="value[3][{{$object->id}}]"  id="area{{$object->id}}" type="checkbox">
                                </div>
                            @endforeach
{{--                            <div class="service">--}}
{{--                                лодка--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                кухня во дворе--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                мангал--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                барбекю--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                уличная мебель--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                обеденная зона на улице--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                бассеин--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                охраняемая территория--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                парковка--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                патио--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                пляжные зонт--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                садовая мебель--}}
{{--                            </div>--}}

                        </div>
                        <div class="chara__right-block">
                            @foreach($objects_3->slice(24,5) as $object)
                                <div class="service">
                                    <label for="area{{$object->id}}">{{$object->name}}</label>
                                    <input name="value[3][{{$object->id}}]"  id="area{{$object->id}}" type="checkbox">
                                </div>
                            @endforeach
{{--                            <div class="service">--}}
{{--                                спортивный зал--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                терасса--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                шезлонги--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                зелёные насаждения--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                концетрный зал--}}
{{--                            </div>--}}

                        </div>
                    </div>

                    <div class="chara__title" id="charaWash">
                        Ванная комната
                    </div>

                    <div class="chara__left-inner-house">
                        <div class="chara__item">

                            @foreach($objects_4->slice(0,7) as $object)
                                <div class="service">
                                    <label for="bathroom{{$object->id}}">{{$object->name}}</label>
                                    <input name="value[4][{{$object->id}}]"  id="bathroom{{$object->id}}" type="checkbox">
                                </div>
                            @endforeach
{{--                            <div class="service">--}}
{{--                                санузел раздельный--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                санузел совмещенный--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                ванная комната--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                биде--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                ванна--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                гигиенический душ--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                гидромассажная ванна--}}
{{--                            </div>--}}
                        </div>

                        <div class="chara__center-block">
                            @foreach($objects_4->slice(7,7) as $object)
                                <div class="service">
                                    <label for="bathroom{{$object->id}}">{{$object->name}}</label>
                                    <input name="value[4][{{$object->id}}]"  id="bathroom{{$object->id}}" type="checkbox">
                                </div>
                            @endforeach
{{--                            <div class="service">--}}
{{--                                нескольок ванных--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                нескольок туалетов--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                душ--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                общая ванная комната--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                общий туалет--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                туалет на улице--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                полотенца--}}
{{--                            </div>--}}
                        </div>

                        <div class="chara__right-block">
                            @foreach($objects_4->slice(14,6) as $object)
                                <div class="service">
                                    <label for="bathroom{{$object->id}}">{{$object->name}}</label>
                                    <input name="value[4][{{$object->id}}]"  id="bathroom{{$object->id}}" type="checkbox">
                                </div>
                            @endforeach
{{--                            <div class="service">--}}
{{--                                сауна--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                тапочки--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                туалетные принадлежности--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                фен--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                халат--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                одноразовый набор туриста--}}
{{--                            </div>--}}

                        </div>
                    </div>

                    <div class="chara__title" id="charaEat">
                        Тип питания
                    </div>

                    <div class="chara__left-inner-house">
                        <div class="chara__item">
                            @foreach($objects_5->slice(0,2) as $object)
                                <div class="service">
                                    <label for="meal{{$object->id}}">{{$object->name}}</label>
                                    <input name="value[5][{{$object->id}}]"  id="meal{{$object->id}}" type="checkbox">
                                </div>
                            @endforeach
{{--                            <div class="service">--}}
{{--                                завтрак--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                полупансион--}}
{{--                            </div>--}}
                        </div>

                        <div class="chara__center-block">
                            @foreach($objects_5->slice(2,2) as $object)
                                <div class="service">
                                    <label for="meal{{$object->id}}">{{$object->name}}</label>
                                    <input name="value[5][{{$object->id}}]"  id="meal{{$object->id}}" type="checkbox">
                                </div>
                            @endforeach
{{--                            <div class="service">--}}
{{--                                полный пансион--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                всё включено--}}
{{--                            </div>--}}
                        </div>

                        <div class="chara__right-block">
                            @foreach($objects_5->slice(4,1) as $object)
                                <div class="service">
                                    <label for="meal{{$object->id}}">{{$object->name}}</label>
                                    <input name="value[5][{{$object->id}}]"  id="meal{{$object->id}}" type="checkbox">
                                </div>
                            @endforeach
{{--                            <div class="service">--}}
{{--                                с собственной кухней--}}
{{--                            </div>--}}
                        </div>

                    </div>


                    <div class="chara__title" id="charaObj">
                        Кухонное оборудование
                    </div>

                    <div class="chara__left-inner-house">
                        <div class="chara__item">
                            @foreach($objects_6->slice(0,7) as $object)
                                <div class="service">
                                    <label for="kitchen{{$object->id}}">{{$object->name}}</label>
                                    <input name="value[6][{{$object->id}}]"  id="kitchen{{$object->id}}" type="checkbox">
                                </div>
                            @endforeach
{{--                            <div class="service">--}}
{{--                                барная стойка--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                блендер--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                газовая или электроплита--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                духовка--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                кофеварка--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                кофе машина--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                кухонный гарнитур--}}
{{--                            </div>--}}

                        </div>

                        <div class="chara__center-block">
                            @foreach($objects_6->slice(7,7) as $object)
                                <div class="service">
                                    <label for="kitchen{{$object->id}}">{{$object->name}}</label>
                                    <input name="value[6][{{$object->id}}]"  id="kitchen{{$object->id}}" type="checkbox">
                                </div>
                            @endforeach
{{--                            <div class="service">--}}
{{--                                микроволновая печь--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                мини-бар--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                морозильник--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                мультиварка--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                обеденный стол--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                посуда и принадлежности--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                посудомоечная машина--}}
{{--                            </div>--}}
                        </div>

                        <div class="chara__right-block">
                            @foreach($objects_6->slice(14,7) as $object)
                                <div class="service">
                                    <label for="kitchen{{$object->id}}">{{$object->name}}</label>
                                    <input name="value[6][{{$object->id}}]"  id="kitchen{{$object->id}}" type="checkbox">
                                </div>
                            @endforeach
{{--                            <div class="service">--}}
{{--                                столовые приборы--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                тостер--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                турка для приготовления кофе--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                фильтр для воды--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                холодильник--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                электрический чайник--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                электроплита--}}
{{--                            </div>--}}
                        </div>

                    </div>

                    <div class="chara__title" id="charaChild">
                        Для детей
                    </div>

                    <div class="chara__left-inner-house">
                        <div class="chara__item">
                            @foreach($objects_7->slice(0,4) as $object)
                                <div class="service">
                                    <label for="children{{$object->id}}">{{$object->name}}</label>
                                    <input name="value[7][{{$object->id}}]"  id="children{{$object->id}}" type="checkbox">
                                </div>
                            @endforeach
{{--                            <div class="service">--}}
{{--                                детский стульчик для кормления--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                горшок--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                детская кровать--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                защита на окнах--}}
{{--                            </div>--}}
                        </div>

                        <div class="chara__center-block">
                            @foreach($objects_7->slice(4,4) as $object)
                                <div class="service">
                                    <label for="children{{$object->id}}">{{$object->name}}</label>
                                    <input name="value[7][{{$object->id}}]"  id="children{{$object->id}}" type="checkbox">
                                </div>
                            @endforeach
{{--                            <div class="service">--}}
{{--                                игрушки для детей--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                кровать-манеж--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                пеленальный стол--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                услуги няни--}}
{{--                            </div>--}}
                        </div>

                        <div class="chara__right-block">
                            @foreach($objects_7->slice(8,3) as $object)
                                <div class="service">
                                    <label for="children{{$object->id}}">{{$object->name}}</label>
                                    <input name="value[7][{{$object->id}}]"  id="children{{$object->id}}" type="checkbox">
                                </div>
                            @endforeach
{{--                            <div class="service">--}}
{{--                                детская комната--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                аниматоры--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                детский бассейн--}}
{{--                            </div>--}}
                        </div>

                    </div>


                    <div class="chara__title" id="charaPark">
                        Парковка
                    </div>

                    <div class="chara__left-inner-house-1">
                        <div class="chara__center-block">
                            @foreach($objects_8->slice(0,4) as $object)
                                <div class="service">
                                    <label for="parking{{$object->id}}">{{$object->name}}</label>
                                    <input name="value[8][{{$object->id}}]"  id="parking{{$object->id}}" type="checkbox">
                                </div>
                            @endforeach
{{--                            <div class="service">--}}
{{--                                в гараже--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                подземный паркинг--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                рядом с домом--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                на огороженной территории--}}
{{--                            </div>--}}
                        </div>

                        <div class="chara__right-block">
                            @foreach($objects_8->slice(4,4) as $object)
                                <div class="service">
                                    <label for="parking{{$object->id}}">{{$object->name}}</label>
                                    <input name="value[8][{{$object->id}}]"  id="parking{{$object->id}}" type="checkbox">
                                </div>
                            @endforeach
{{--                            <div class="service">--}}
{{--                                бесплатная неохраняемая--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                платная неохраняемая--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                парковку нужно бронировать заранее--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                парковка круглосуточная--}}
{{--                            </div>--}}
                        </div>

                    </div>


                    <div class="chara__title" id="charaLive">
                        Правила проживания
                    </div>

                    <div class="chara__left-inner-house-2">
                        <div class="chara__center-block">
                            @foreach($objects_9->slice(0,3) as $object)
                                <div class="service">
                                    <label for="leaving{{$object->id}}">{{$object->name}}</label>
                                    <input name="value[9][{{$object->id}}]"  id="leaving{{$object->id}}" type="checkbox">
                                </div>
                            @endforeach
{{--                            <div class="service">--}}
{{--                                вечеринки разрешены--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                курение разрешено--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                животные разрешены--}}
{{--                            </div>--}}
                        </div>

                        <div class="chara__right-block">
                            @foreach($objects_9->slice(3,3) as $object)
                                <div class="service">
                                    <label for="leaving{{$object->id}}">{{$object->name}}</label>
                                    <input name="value[9][{{$object->id}}]"  id="leaving{{$object->id}}" type="checkbox">
                                </div>
                            @endforeach
{{--                            <div class="service">--}}
{{--                                с детьми разрешено--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                проведение свадеб и торжеств--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                врменной с регистрацией--}}
{{--                            </div>--}}
                        </div>

                    </div>


                    <div class="chara__title" id="charaFun">
                        Инфраструктура и досуг рядом
                    </div>

                    <div class="chara__left-inner-house">
                        <div class="chara__item">
                            @foreach($objects_10->slice(0,10) as $object)
                                <div class="service">
                                    <label for="infrastructure{{$object->id}}">{{$object->name}}</label>
                                    <input name="value[10][{{$object->id}}]"  id="infrastructure{{$object->id}}" type="checkbox">
                                </div>
                            @endforeach
{{--                            <div class="service">--}}
{{--                                SPA-центр--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                альпинизм--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                баня--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                бильярдный клуб--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                боулинг--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                верховая езда--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                водные виды спорта--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                гольф--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                горные лыжи--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                дайвинг--}}
{{--                            </div>--}}
                        </div>

                        <div class="chara__center-block">
                            @foreach($objects_10->slice(10,10) as $object)
                                <div class="service">
                                    <label for="infrastructure{{$object->id}}">{{$object->name}}</label>
                                    <input name="value[10][{{$object->id}}]"  id="infrastructure{{$object->id}}" type="checkbox">
                                </div>
                            @endforeach
{{--                            <div class="service">--}}
{{--                                езда на снегоходах--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                зоопарк--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                каток--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                кинотеатр--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                лес--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                набережная--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                ночной клуб--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                охота--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                парк аттракционов--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                прокат велосипедов--}}
{{--                            </div>--}}
                        </div>

                        <div class="chara__right-block">
                            @foreach($objects_10->slice(20,10) as $object)
                                <div class="service">
                                    <label for="infrastructure{{$object->id}}">{{$object->name}}</label>
                                    <input name="value[10][{{$object->id}}]"  id="infrastructure{{$object->id}}" type="checkbox">
                                </div>
                            @endforeach
{{--                            <div class="service">--}}
{{--                                прокат роликовых коньков--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                пруд/озеро поблизости--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                рыaбалка--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                рынок--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                СТО--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                торговый центр--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                театр--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                теннистый корт--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                яхт-клуб--}}
{{--                            </div>--}}
                        </div>
                    </div>


                    <div class="chara__title" id="charaBeach">
                        Пляж
                    </div>

                    <div class="chara__left-inner-house">
                        <div class="chara__item">
                            @foreach($objects_11->slice(0,3) as $object)
                                <div class="service">
                                    <label for="beach{{$object->id}}">{{$object->name}}</label>
                                    <input name="value[11][{{$object->id}}]"  id="beach{{$object->id}}" type="checkbox">
                                </div>
                            @endforeach

{{--                            <div class="service">--}}
{{--                                песчаный--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                песчано-галечный--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                мелкая галька--}}
{{--                            </div>--}}
                        </div>

                        <div class="chara__center-block">
                            @foreach($objects_11->slice(3,3) as $object)
                                <div class="service">
                                    <label for="beach{{$object->id}}">{{$object->name}}</label>
                                    <input name="value[11][{{$object->id}}]"  id="beach{{$object->id}}" type="checkbox">
                                </div>
                            @endforeach
{{--                            <div class="service">--}}
{{--                                галька--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                скалки--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                пирсы--}}
{{--                            </div>--}}
                        </div>

                        <div class="chara__right-block">
                            @foreach($objects_11->slice(6,4) as $object)
                                <div class="service">
                                    <label for="beach{{$object->id}}">{{$object->name}}</label>
                                    <input name="value[11][{{$object->id}}]"  id="beach{{$object->id}}" type="checkbox">
                                </div>
                            @endforeach
{{--                            <div class="service">--}}
{{--                                частный пляж--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                оборудованный бесплатный--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                оборудованный платный пляж--}}
{{--                            </div>--}}

{{--                            <div class="service">--}}
{{--                                дикий пляж--}}
{{--                            </div>--}}
                        </div>
                    </div>

{{--                    {{Form::submit('Click Me!')}}--}}
                    {{ Form::close() }}

                    <div class="chara__title" id="charaAtt">
                        Расстояние до достопримечательностей
                    </div>

                    <div class="chara__km-inner">
                        <div class="attraction__left">
                            <div class="attraction">
                                Крокус Экспо
                            </div>
                            <div class="attraction-km" class="attraction-km">
                                2 км
                            </div>

                            <div class="attraction">
                                Экспоцентр
                            </div>
                            <input class="attraction-km" placeholder="2 км" class="attraction-km">
                        </div>

                        <div class="attraction__right">
                            <div class="attraction">
                                Парк Горького
                            </div>
                            <input class="attraction-km" placeholder="2 км" class="attraction-km">

                            <div class="attraction">
                                Парк ВДНХ
                            </div>
                            <input class="attraction-km" placeholder="2 км" class="attraction-km">
                        </div>
                    </div>

                    <div class="chara__title" id="charaStreet">
                        Расстояние до улиц
                    </div>

                    <div class="chara__km-inner">
                        <div class="attraction__left">
                            <div class="attraction">
                                Горького
                            </div>
                            <input class="attraction-km" placeholder="2 км" class="attraction-km">

                            <div class="attraction">
                                Нахимова
                            </div>
                            <input class="attraction-km" placeholder="2 км" class="attraction-km">
                        </div>

                        <div class="attraction__right">
                            <div class="attraction">
                                Нахимова
                            </div>
                            <input class="attraction-km" placeholder="2 км" class="attraction-km">

                            <div class="attraction">
                                Ленина
                            </div>
                            <input class="attraction-km" placeholder="2 км" class="attraction-km">
                        </div>
                    </div>

                    <div class="margin"></div>


                    <a href="#" class="chara__btn">
                        Далее
                    </a>
                </div>
                <!-- LEFT -->


                <!-- RIGHT -->
                <div class="chara__right">
                    <a href="personal-area.html">
                        <img class="chara__close" src="img/add/4.png" alt="close">
                    </a>
                    <div class="chara__right-inner">

                        @component('object-panel')
                        @endcomponent


                        <a data-scroll="#charaTitle" href="#" class="chara__position">
                            Характеристики объекта
                        </a>

                        <a data-scroll="#charaHouse" href="#" class="chara__position">
                            Оснащение жилья
                        </a>

                        <a data-scroll="#charaTer" href="#" class="chara__position">
                            Оснащение территории
                        </a>

                        <a data-scroll="#charaWash" href="#" class="chara__position">
                            Ванная комната
                        </a>

                        <a data-scroll="#charaEat" href="#" class="chara__position">
                            Тип питания
                        </a>

                        <a data-scroll="#charaObj" href="#" class="chara__position">
                            Кухонное оборудование
                        </a>

                        <a data-scroll="#charaChild" href="#" class="chara__position">
                            Для детей
                        </a>

                        <a data-scroll="#charaPark" href="#" class="chara__position">
                            Парковка
                        </a>

                        <a data-scroll="#charaLive" href="#" class="chara__position">
                            Правила проживания
                        </a>

                        <a data-scroll="#charaFun" href="#" class="chara__position">
                            Инфраструктра и досуг рядом
                        </a>

                        <a data-scroll="#charaBeach" href="#" class="chara__position">
                            Пляж
                        </a>

                        <a data-scroll="#charaAtt" href="#" class="chara__position">
                            Расстояние до достопримечательностей
                        </a>

                        <a data-scroll="#charaStreet" href="#" class="chara__position">
                            Расстояние до улиц
                        </a>

                    </div>
                </div>

                <!-- /RIGHT -->


            </div>   <!-- /chara__inner -->
        </div>     <!-- /container -->
    </div>
    <!-- /characteristic -->

    @endsection
