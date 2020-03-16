@extends('layouts.app')

@section('content')


    <!-- characteristic  -->
    <div class="characteristic">
        <div class="container">
            <div class="chara__inner">
                <div class="chara__left">

{{--                    <div class="chara__title" id="charaTitle">--}}
{{--                        Тип объекта и адресс--}}
{{--                    </div>--}}


{{--                    <div class="photo">--}}
{{--                        <div class="photo_inner">--}}
{{--                            <div class="photo__item">--}}
{{--                                <label class="photo-items">--}}
{{--                                    <a href="#"><img class="photo" src="img/add-photo/1.png" alt=""></a>--}}
{{--                                    <div class="photo__title">Гостиница</div>--}}
{{--                                    <div class="photo__text">--}}
{{--                                        номера в отеле, гостевом<br>доме или хостеле--}}
{{--                                    </div>--}}
{{--                                    <input name="value[type]"  type="radio">--}}
{{--                                </label>--}}
{{--                            </div>--}}

{{--                            <div class="photo__item">--}}
{{--                                <label class="photo-items">--}}
{{--                                    <a href="#"><img class="photo" src="img/add-photo/2.png" alt=""></a>--}}
{{--                                    <div class="photo__title">Квартира, апартаменты</div>--}}
{{--                                    <div class="photo__text">--}}

{{--                                        целиком<br>--}}
{{--                                        под ключ--}}
{{--                                    </div>--}}
{{--                                    <input name="value[type]"  type="radio">--}}
{{--                                </label>--}}
{{--                            </div>--}}

{{--                            <div class="photo__item">--}}
{{--                                <label class="photo-items">--}}
{{--                                    <a href="#"><img class="photo" src="img/add-photo/3.png" alt=""></a>--}}
{{--                                    <div class="photo__title">Дом, коттедж, эллинг</div>--}}
{{--                                    <div class="photo__text">--}}
{{--                                        целиком<br>--}}
{{--                                        под ключ--}}
{{--                                    </div>--}}
{{--                                    <input name="value[type]"  type="radio">--}}
{{--                                </label>--}}
{{--                            </div>--}}

{{--                            <div class="photo__item">--}}
{{--                                <label class="photo-items">--}}
{{--                                    <a href="#"><img class="photo" src="img/add-photo/4.png" alt=""></a>--}}
{{--                                    <div class="photo__title">Комната</div>--}}
{{--                                    <div class="photo__text">--}}
{{--                                        гости снимут комнату в<br>--}}
{{--                                        квартире или доме--}}
{{--                                    </div>--}}
{{--                                    <input name="value[type]" type="radio">--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}


{{--                    <div class="chara__title" id="charaType">--}}
{{--                        Укажите адресс--}}
{{--                    </div>--}}
{{--                    <div class="setting__inner">--}}





{{--                        <div class="setting__info one">--}}
{{--                            <div class="form__inner">--}}
{{--                                <label>	<span class="initial">Микрорайон</span>--}}

{{--                                    <input class="name" type="text" placeholder="Если есть">--}}

{{--                                </label>--}}
{{--                            </div>--}}

{{--                            <div class="form__inner">--}}
{{--                                <label>	<span class="initial">Улица</span>--}}

{{--                                    <input id="street" class="name" type="text" placeholder="Меньшикова">--}}

{{--                                </label>--}}
{{--                            </div>--}}

{{--                            <div class="form__street">--}}
{{--                                <div class="form__inner  street">--}}
{{--                                    <label>	<span class="initial">Дом</span>--}}

{{--                                        <input id="flat" class="street" type="text" placeholder="2">--}}

{{--                                    </label>--}}
{{--                                </div>--}}


{{--                                <div class="form__inner street">--}}
{{--                                    <label>	<span class="initial">Корпус</span>--}}

{{--                                        <input class="street" type="text" placeholder="3">--}}

{{--                                    </label>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}

{{--                    <div class="chara__title" id="charaType">--}}
{{--                        Укажите расположение на карте--}}
{{--                    </div>--}}

{{--                    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d2011.6102154842715!2d34.16962910801503!3d44.518298482738096!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sua!4v1569173991438!5m2!1sru!2sua" width="750" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>--}}


{{--                    <div class="chara__title" id="charaType">--}}
{{--                        Укажите расстояние--}}
{{--                    </div>--}}

{{--                    <div class="km__main">--}}
{{--                        <div class="km__inner">--}}
{{--                            <div class="km__col-1">--}}
{{--                                <div class="form__inner km">--}}
{{--                                    <label>	<span class="initial">Центр</span>--}}

{{--                                        <input class="name kms" type="text" placeholder="2 км">--}}

{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="km__col-1">--}}
{{--                                <div class="form__inner km middle-input">--}}
{{--                                    <label>	<span class="initial">Метро</span>--}}

{{--                                        <input class="name kmr" type="text" placeholder="Симферополь">--}}

{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="km__col-1">--}}
{{--                                <div class="form__inner km">--}}
{{--                                    <label>	<span class="initial al">+ добавить метро</span>--}}

{{--                                        <input class="name kml" type="text" placeholder="100 м">--}}

{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="km__inner">--}}
{{--                            <div class="km__flex">--}}
{{--                                <div class="km__col-1 ">--}}
{{--                                    <div class="form__inner km middle-input">--}}
{{--                                        <label>	<span class="initial">Аэропорт</span>--}}

{{--                                            <input class="name kmr" type="text" placeholder="Симферополь">--}}

{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="km__col-1">--}}
{{--                                    <div class="form__inner km eles small-input">--}}
{{--                                        <label>--}}

{{--                                            <input class="name kml ele" type="text" placeholder="2 км">--}}

{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="km__col-1">--}}
{{--                                    <div class="form__inner km middle-input">--}}
{{--                                        <label>	<span class="initial">Море</span>--}}

{{--                                            <input class="name kmr" type="text" placeholder="Черное море">--}}

{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="km__col-1">--}}
{{--                                    <div class="form__inner km   ">--}}
{{--                                        <label>	<span class="initial al">+ добавить море</span>--}}

{{--                                            <input class="name kml" type="text" placeholder="100 км">--}}

{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                        <div class="km__flexx">--}}
{{--                            <div class="km__col-1 ">--}}
{{--                                <div class="form__inner km middle-input">--}}
{{--                                    <label>	<span class="initial">Ж/Д вокзал</span>--}}

{{--                                        <input class="name kmr" type="text" placeholder="Севастополь">--}}

{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="km__col-1">--}}
{{--                                <div class="form__inner km    eles small-input">--}}
{{--                                    <label>--}}

{{--                                        <input class="name kml ele" type="text" placeholder="2 км">--}}

{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div id="objectsTypes" data-tab3="{{ isset($data3) ? json_encode($data3) : json_encode([]) }}" data-tab2="{{ isset($data2) ? json_encode($data2) :  json_encode([])  }}" data-tab1="{{ isset($data1) ? json_encode($data1) : json_encode([])  }}"></div>



                </div>

{{--                <div class="chara__right">--}}
{{--                    <a href="personal-area.html">--}}
{{--                        <img class="chara__close" src="img/add/4.png" alt="close">--}}
{{--                    </a>--}}

{{--                    <div class="chara__right-inner">--}}
{{--                    @component('object-panel')--}}
{{--                    @endcomponent--}}
{{--                    </div>--}}
{{--                </div>  <!-- CHARA RIGHT -->--}}
            </div>

        </div>
    </div>


@endsection
