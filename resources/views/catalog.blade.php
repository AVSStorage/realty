@extends('layouts.app')
@section('title', $title)
@section('content')
    <div class="search">
        <div class="container">
            <div class="intro__inner">
            {!! $breadCrumbs !!}
                </div>
                <div class="intro__form-inner">
                    <div id="example3" data-region="{{   app('request')->input('region')  }}" data-city="{{  app('request')->input('city')  }}" data-from="{{  app('request')->input('dateFrom') }}" data-to="{{  app('request')->input('dateTo')  }}" data-guests="{{app('request')->input('guests')   }}"></div>
                </div>    <!--  intro__form-inner -->
                <div class="under__input">
                    <div class="under__text">Регион, город, место</div>
                    <div class="under__text">Дата заезда</div>
                    <div class="under__text">Дата отъезда</div>
                    <div class="under__text">Количество гостей</div>
                </div>
            </div>
        </div>
        <!-- Content -->
        <div class="content">
            <div class="container">
                <div class="content__inner">


                @if ((count($items) > 0 ))


                        <div id="cardFilters" data-days="{{ $days + 1 }}" data-filteredItems="{{ json_encode($items) }}" data-region="{{  app('request')->input('region') }}"></div>


                            @else
                                <div style="display: flex;flex-wrap:wrap">
                                <div id="cardFilters"></div>
                                </div>
                            @endif



{{--                            <!-- CHOICE -->--}}
{{--                            <div class="choice">--}}
{{--                                <div class="choice__inner">--}}
{{--                                    <div class="choice__left">--}}
{{--                                        <div class="choice__left-content">--}}
{{--                                            <div class="choice__left-slider">--}}
{{--                                                <div class="slider__choice">--}}
{{--                                                    <div class="slide__choice">--}}
{{--                                                        <img src="img/choice/2.png" alt="Жилье">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="slide__choice">--}}
{{--                                                        <img src="img/choice/2.png" alt="Жилье">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="slide__choice">--}}
{{--                                                        <img src="img/choice/2.png" alt="Жилье">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="slide__choice">--}}
{{--                                                        <img src="img/choice/2.png" alt="Жилье">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="choice__left-info">--}}
{{--                                                <div class="choice__info-title">--}}
{{--                                                    2-комнатная квартира - 38 м²--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__street">--}}
{{--                                                    Ялта, ул. Дражинского, д. 50--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__reviews">--}}
{{--                                                    <img class="choice__star" src="img/star/2.png" alt="Ratting">--}}
{{--                                                    71 отзыв--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__services-item">--}}
{{--                                                    <img src="img/service/1.png" alt="service">--}}
{{--                                                    <img src="img/service/2.png" alt="service">--}}
{{--                                                    <img src="img/service/3.png" alt="service">--}}
{{--                                                    <img src="img/service/4.png" alt="service">--}}
{{--                                                    <img src="img/service/5.png" alt="service">--}}
{{--                                                    <img src="img/service/6.png" alt="service">--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__km">--}}
{{--                                                    1 км.--}}
{{--                                                    <span class=choice__km-span>до моря</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__km">--}}
{{--                                                    500 м.--}}
{{--                                                    <span class=choice__km-span>до центра</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__km">--}}
{{--                                                    1 км.--}}
{{--                                                    <span class=choice__km-span>до метро, ст. Ялтинская</span>--}}
{{--                                                </div>--}}

{{--                                            </div>    <!-- choice__left-info -->--}}

{{--                                        </div>    <!-- choice__left-content -->--}}
{{--                                    </div>        <!-- choice__left -->--}}


{{--                                    <div class="choice__right">--}}
{{--                                        <div class="choice__right-contents">--}}
{{--                                            <div class="choice__right-price">--}}
{{--                                                20 000 руб. <span class="choice__price-span">10 суток</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="choice__right-prices">--}}
{{--                                                2 000 руб. <span class="choice__price-span">сутки</span>--}}
{{--                                            </div>--}}
{{--                                            <a href="{{ url('card') }}" class="form--btn  choice--btn">Подробнее</a>--}}
{{--                                            <a href="#" class="choice__best">--}}
{{--                                                <img src="img/heart.png" alt="like">в избранное--}}
{{--                                            </a>--}}
{{--                                            <a href="#" class="choice__best  best">--}}
{{--                                                <img src="img/house.png" alt="like">в сравнение--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- /CHOICE -->--}}

{{--                            <!-- CHOICE -->--}}
{{--                            <div class="choice">--}}
{{--                                <div class="choice__inner">--}}
{{--                                    <div class="choice__left">--}}
{{--                                        <div class="choice__left-content">--}}
{{--                                            <div class="choice__left-slider">--}}
{{--                                                <div class="slider__choice">--}}
{{--                                                    <div class="slide__choice">--}}
{{--                                                        <img src="img/choice/3.png" alt="Жилье">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="slide__choice">--}}
{{--                                                        <img src="img/choice/3.png" alt="Жилье">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="slide__choice">--}}
{{--                                                        <img src="img/choice/3.png" alt="Жилье">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="slide__choice">--}}
{{--                                                        <img src="img/choice/3.png" alt="Жилье">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="choice__left-info">--}}
{{--                                                <div class="choice__info-title">--}}
{{--                                                    1-комнатная квартира - 22 м²--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__street">--}}
{{--                                                    Ялта, ул. Свердлова, д. 14--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__reviews">--}}
{{--                                                    <img class="choice__star" src="img/star/1.png" alt="Ratting">--}}
{{--                                                    64 отзыва--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__services-item">--}}
{{--                                                    <img src="img/service/1.png" alt="service">--}}
{{--                                                    <img src="img/service/2.png" alt="service">--}}
{{--                                                    <img src="img/service/3.png" alt="service">--}}
{{--                                                    <img src="img/service/4.png" alt="service">--}}
{{--                                                    <img src="img/service/5.png" alt="service">--}}
{{--                                                    <img src="img/service/6.png" alt="service">--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__km">--}}
{{--                                                    1 км.--}}
{{--                                                    <span class=choice__km-span>до моря</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__km">--}}
{{--                                                    2 км.--}}
{{--                                                    <span class=choice__km-span>до центра</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__km">--}}
{{--                                                    3,2 км.--}}
{{--                                                    <span class=choice__km-span>до метро, ст. Ялтинская</span>--}}
{{--                                                </div>--}}

{{--                                            </div>    <!-- choice__left-info -->--}}

{{--                                        </div>    <!-- choice__left-content -->--}}
{{--                                    </div>        <!-- choice__left -->--}}


{{--                                    <div class="choice__right">--}}
{{--                                        <div class="choice__right-contents">--}}
{{--                                            <div class="choice__right-price">--}}
{{--                                                12 000 руб. <span class="choice__price-span">10 суток</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="choice__right-prices">--}}
{{--                                                1 200 руб. <span class="choice__price-span">сутки</span>--}}
{{--                                            </div>--}}
{{--                                            <a href="{{ url('card') }}" class="form--btn  choice--btn">Подробнее</a>--}}
{{--                                            <a href="#" class="choice__best">--}}
{{--                                                <img src="img/heart.png" alt="like">в избранное--}}
{{--                                            </a>--}}
{{--                                            <a href="#" class="choice__best  best">--}}
{{--                                                <img src="img/house.png" alt="like">в сравнение--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- /CHOICE -->--}}

{{--                            <!-- CHOICE -->--}}
{{--                            <div class="choice">--}}
{{--                                <div class="choice__inner">--}}
{{--                                    <div class="choice__left">--}}
{{--                                        <div class="choice__left-content">--}}
{{--                                            <div class="choice__left-slider">--}}
{{--                                                <div class="slider__choice">--}}
{{--                                                    <div class="slide__choice">--}}
{{--                                                        <img src="img/choice/4.png" alt="Жилье">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="slide__choice">--}}
{{--                                                        <img src="img/choice/4.png" alt="Жилье">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="slide__choice">--}}
{{--                                                        <img src="img/choice/4.png" alt="Жилье">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="slide__choice">--}}
{{--                                                        <img src="img/choice/4.png" alt="Жилье">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="choice__left-info">--}}
{{--                                                <div class="choice__info-title">--}}
{{--                                                    3-комнатная квартира - 85 м²--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__street">--}}
{{--                                                    Ялта, ул. Сосновая, д. 22--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__reviews">--}}
{{--                                                    <img class="choice__star" src="img/star/2.png" alt="Ratting">--}}
{{--                                                    52 отзыва--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__services-item">--}}
{{--                                                    <img src="img/service/1.png" alt="service">--}}
{{--                                                    <img src="img/service/2.png" alt="service">--}}
{{--                                                    <img src="img/service/3.png" alt="service">--}}
{{--                                                    <img src="img/service/4.png" alt="service">--}}
{{--                                                    <img src="img/service/5.png" alt="service">--}}
{{--                                                    <img src="img/service/6.png" alt="service">--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__km">--}}
{{--                                                    900 м.--}}
{{--                                                    <span class=choice__km-span>до моря</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__km">--}}
{{--                                                    1,5 км.--}}
{{--                                                    <span class=choice__km-span>до центра</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__km">--}}
{{--                                                    2 км.--}}
{{--                                                    <span class=choice__km-span>до метро, ст. Ялтинская</span>--}}
{{--                                                </div>--}}

{{--                                            </div>    <!-- choice__left-info -->--}}

{{--                                        </div>    <!-- choice__left-content -->--}}
{{--                                    </div>        <!-- choice__left -->--}}



{{--                                    <div class="choice__right">--}}
{{--                                        <div class="choice__right-contents">--}}
{{--                                            <div class="choice__right-price">--}}
{{--                                                25 000 руб. <span class="choice__price-span">10 суток</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="choice__right-prices">--}}
{{--                                                2 500 руб. <span class="choice__price-span">сутки</span>--}}
{{--                                            </div>--}}
{{--                                            <a href="{{ url('card') }}" class="form--btn  choice--btn">Подробнее</a>--}}
{{--                                            <a href="#" class="choice__best">--}}
{{--                                                <img src="img/heart.png" alt="like">в избранное--}}
{{--                                            </a>--}}
{{--                                            <a href="#" class="choice__best  best">--}}
{{--                                                <img src="img/house.png" alt="like">в сравнение--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- /CHOICE -->--}}

{{--                            <!-- CHOICE -->--}}
{{--                            <div class="choice">--}}
{{--                                <div class="choice__inner">--}}
{{--                                    <div class="choice__left">--}}
{{--                                        <div class="choice__left-content">--}}
{{--                                            <div class="choice__left-slider">--}}
{{--                                                <div class="slider__choice">--}}
{{--                                                    <div class="slide__choice">--}}
{{--                                                        <img src="img/choice/1.png" alt="Жилье">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="slide__choice">--}}
{{--                                                        <img src="img/choice/1.png" alt="Жилье">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="slide__choice">--}}
{{--                                                        <img src="img/choice/1.png" alt="Жилье">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="slide__choice">--}}
{{--                                                        <img src="img/choice/1.png" alt="Жилье">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="choice__left-info">--}}
{{--                                                <div class="choice__info-title">--}}
{{--                                                    1-комнатная квартира - 24 м²--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__street">--}}
{{--                                                    Ялта, ул. Киевская, д. 27--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__reviews">--}}
{{--                                                    <img class="choice__star" src="img/star/2.png" alt="Ratting">--}}
{{--                                                    94 отзыва--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__services-item">--}}
{{--                                                    <img src="img/service/1.png" alt="service">--}}
{{--                                                    <img src="img/service/2.png" alt="service">--}}
{{--                                                    <img src="img/service/3.png" alt="service">--}}
{{--                                                    <img src="img/service/4.png" alt="service">--}}
{{--                                                    <img src="img/service/5.png" alt="service">--}}
{{--                                                    <img src="img/service/6.png" alt="service">--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__km">--}}
{{--                                                    500 м.--}}
{{--                                                    <span class=choice__km-span>до моря</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__km">--}}
{{--                                                    1 км.--}}
{{--                                                    <span class=choice__km-span>до центра</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__km">--}}
{{--                                                    1,5 км.--}}
{{--                                                    <span class=choice__km-span>до метро, ст. Ялтинская</span>--}}
{{--                                                </div>--}}

{{--                                            </div>    <!-- choice__left-info -->--}}

{{--                                        </div>    <!-- choice__left-content -->--}}
{{--                                    </div>        <!-- choice__left -->--}}


{{--                                    <div class="choice__right">--}}
{{--                                        <div class="choice__right-contents">--}}
{{--                                            <div class="choice__right-price">--}}
{{--                                                10 000 руб. <span class="choice__price-span">10 суток</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="choice__right-prices">--}}
{{--                                                1 000 руб. <span class="choice__price-span">сутки</span>--}}
{{--                                            </div>--}}
{{--                                            <a href="{{ url('card') }}" class="form--btn  choice--btn">Подробнее</a>--}}
{{--                                            <a href="#" class="choice__best">--}}
{{--                                                <img src="img/heart.png" alt="like">в избранное--}}
{{--                                            </a>--}}
{{--                                            <a href="#" class="choice__best  best">--}}
{{--                                                <img src="img/house.png" alt="like">в сравнение--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- /CHOICE -->--}}
{{--                            <!-- CHOICE -->--}}
{{--                            <div class="choice">--}}
{{--                                <div class="choice__inner">--}}
{{--                                    <div class="choice__left">--}}
{{--                                        <div class="choice__left-content">--}}
{{--                                            <div class="choice__left-slider">--}}
{{--                                                <div class="slider__choice">--}}
{{--                                                    <div class="slide__choice">--}}
{{--                                                        <img src="img/choice/2.png" alt="Жилье">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="slide__choice">--}}
{{--                                                        <img src="img/choice/2.png" alt="Жилье">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="slide__choice">--}}
{{--                                                        <img src="img/choice/2.png" alt="Жилье">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="slide__choice">--}}
{{--                                                        <img src="img/choice/2.png" alt="Жилье">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="choice__left-info">--}}
{{--                                                <div class="choice__info-title">--}}
{{--                                                    2-комнатная квартира - 38 м²--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__street">--}}
{{--                                                    Ялта, ул. Дражинского, д. 50--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__reviews">--}}
{{--                                                    <img class="choice__star" src="img/star/2.png" alt="Ratting">--}}
{{--                                                    71 отзыв--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__services-item">--}}
{{--                                                    <img src="img/service/1.png" alt="service">--}}
{{--                                                    <img src="img/service/2.png" alt="service">--}}
{{--                                                    <img src="img/service/3.png" alt="service">--}}
{{--                                                    <img src="img/service/4.png" alt="service">--}}
{{--                                                    <img src="img/service/5.png" alt="service">--}}
{{--                                                    <img src="img/service/6.png" alt="service">--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__km">--}}
{{--                                                    1 км.--}}
{{--                                                    <span class=choice__km-span>до моря</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__km">--}}
{{--                                                    500 м.--}}
{{--                                                    <span class=choice__km-span>до центра</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__km">--}}
{{--                                                    1 км.--}}
{{--                                                    <span class=choice__km-span>до метро, ст. Ялтинская</span>--}}
{{--                                                </div>--}}

{{--                                            </div>    <!-- choice__left-info -->--}}

{{--                                        </div>    <!-- choice__left-content -->--}}
{{--                                    </div>        <!-- choice__left -->--}}


{{--                                    <div class="choice__right">--}}
{{--                                        <div class="choice__right-contents">--}}
{{--                                            <div class="choice__right-price">--}}
{{--                                                20 000 руб. <span class="choice__price-span">10 суток</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="choice__right-prices">--}}
{{--                                                2 000 руб. <span class="choice__price-span">сутки</span>--}}
{{--                                            </div>--}}
{{--                                            <a href="{{ url('card') }}" class="form--btn  choice--btn">Подробнее</a>--}}
{{--                                            <a href="#" class="choice__best">--}}
{{--                                                <img src="img/heart.png" alt="like">в избранное--}}
{{--                                            </a>--}}
{{--                                            <a href="#" class="choice__best  best">--}}
{{--                                                <img src="img/house.png" alt="like">в сравнение--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- /CHOICE -->--}}

{{--                            <!-- CHOICE -->--}}
{{--                            <div class="choice">--}}
{{--                                <div class="choice__inner">--}}
{{--                                    <div class="choice__left">--}}
{{--                                        <div class="choice__left-content">--}}
{{--                                            <div class="choice__left-slider">--}}
{{--                                                <div class="slider__choice">--}}
{{--                                                    <div class="slide__choice">--}}
{{--                                                        <img src="img/choice/3.png" alt="Жилье">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="slide__choice">--}}
{{--                                                        <img src="img/choice/3.png" alt="Жилье">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="slide__choice">--}}
{{--                                                        <img src="img/choice/3.png" alt="Жилье">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="slide__choice">--}}
{{--                                                        <img src="img/choice/3.png" alt="Жилье">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="choice__left-info">--}}
{{--                                                <div class="choice__info-title">--}}
{{--                                                    1-комнатная квартира - 22 м²--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__street">--}}
{{--                                                    Ялта, ул. Свердлова, д. 14--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__reviews">--}}
{{--                                                    <img class="choice__star" src="img/star/1.png" alt="Ratting">--}}
{{--                                                    64 отзыва--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__services-item">--}}
{{--                                                    <img src="img/service/1.png" alt="service">--}}
{{--                                                    <img src="img/service/2.png" alt="service">--}}
{{--                                                    <img src="img/service/3.png" alt="service">--}}
{{--                                                    <img src="img/service/4.png" alt="service">--}}
{{--                                                    <img src="img/service/5.png" alt="service">--}}
{{--                                                    <img src="img/service/6.png" alt="service">--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__km">--}}
{{--                                                    1 км.--}}
{{--                                                    <span class=choice__km-span>до моря</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__km">--}}
{{--                                                    2 км.--}}
{{--                                                    <span class=choice__km-span>до центра</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__km">--}}
{{--                                                    3,2 км.--}}
{{--                                                    <span class=choice__km-span>до метро, ст. Ялтинская</span>--}}
{{--                                                </div>--}}

{{--                                            </div>    <!-- choice__left-info -->--}}

{{--                                        </div>    <!-- choice__left-content -->--}}
{{--                                    </div>        <!-- choice__left -->--}}


{{--                                    <div class="choice__right">--}}
{{--                                        <div class="choice__right-contents">--}}
{{--                                            <div class="choice__right-price">--}}
{{--                                                12 000 руб. <span class="choice__price-span">10 суток</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="choice__right-prices">--}}
{{--                                                1 200 руб. <span class="choice__price-span">сутки</span>--}}
{{--                                            </div>--}}
{{--                                            <a href="{{ url('card') }}" class="form--btn  choice--btn">Подробнее</a>--}}
{{--                                            <a href="#" class="choice__best">--}}
{{--                                                <img src="img/heart.png" alt="like">в избранное--}}
{{--                                            </a>--}}
{{--                                            <a href="#" class="choice__best  best">--}}
{{--                                                <img src="img/house.png" alt="like">в сравнение--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- /CHOICE -->--}}

{{--                            <!-- CHOICE -->--}}
{{--                            <div class="choice">--}}
{{--                                <div class="choice__inner">--}}
{{--                                    <div class="choice__left">--}}
{{--                                        <div class="choice__left-content">--}}
{{--                                            <div class="choice__left-slider">--}}
{{--                                                <div class="slider__choice">--}}
{{--                                                    <div class="slide__choice">--}}
{{--                                                        <img src="img/choice/4.png" alt="Жилье">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="slide__choice">--}}
{{--                                                        <img src="img/choice/4.png" alt="Жилье">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="slide__choice">--}}
{{--                                                        <img src="img/choice/4.png" alt="Жилье">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="slide__choice">--}}
{{--                                                        <img src="img/choice/4.png" alt="Жилье">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="choice__left-info">--}}
{{--                                                <div class="choice__info-title">--}}
{{--                                                    3-комнатная квартира - 85 м²--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__street">--}}
{{--                                                    Ялта, ул. Сосновая, д. 22--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__reviews">--}}
{{--                                                    <img class="choice__star" src="img/star/2.png" alt="Ratting">--}}
{{--                                                    52 отзыва--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__services-item">--}}
{{--                                                    <img src="img/service/1.png" alt="service">--}}
{{--                                                    <img src="img/service/2.png" alt="service">--}}
{{--                                                    <img src="img/service/3.png" alt="service">--}}
{{--                                                    <img src="img/service/4.png" alt="service">--}}
{{--                                                    <img src="img/service/5.png" alt="service">--}}
{{--                                                    <img src="img/service/6.png" alt="service">--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__km">--}}
{{--                                                    900 м.--}}
{{--                                                    <span class=choice__km-span>до моря</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__km">--}}
{{--                                                    1,5 км.--}}
{{--                                                    <span class=choice__km-span>до центра</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="choice__km">--}}
{{--                                                    2 км.--}}
{{--                                                    <span class=choice__km-span>до метро, ст. Ялтинская</span>--}}
{{--                                                </div>--}}

{{--                                            </div>    <!-- choice__left-info -->--}}

{{--                                        </div>    <!-- choice__left-content -->--}}
{{--                                    </div>        <!-- choice__left -->--}}


{{--                                    <div class="choice__right">--}}
{{--                                        <div class="choice__right-contents">--}}
{{--                                            <div class="choice__right-price">--}}
{{--                                                25 000 руб. <span class="choice__price-span">10 суток</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="choice__right-prices">--}}
{{--                                                2 500 руб. <span class="choice__price-span">сутки</span>--}}
{{--                                            </div>--}}
{{--                                            <a href="{{ url('card') }}" class="form--btn  choice--btn">Подробнее</a>--}}
{{--                                            <a href="#" class="choice__best">--}}
{{--                                                <img src="img/heart.png" alt="like">в избранное--}}
{{--                                            </a>--}}
{{--                                            <a href="#" class="choice__best  best">--}}
{{--                                                <img src="img/house.png" alt="like">в сравнение--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <!-- /CHOICE -->


                        </div>        <!-- /RIGHT SITEBAR -->

                        <!-- /Content -->
                    </div>
                </div>
            </div>







@endsection
