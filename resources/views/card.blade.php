@extends('layouts.app')


@section('title', $title)
@section('content')


    <input type="hidden" value="{{ $occupation['id'] }}" id="objectId">
    <!-- CROP -->
    <div class="crop">
        <div class="container">
                {!! $breadCrumbs !!}
            </div>
        </div>
    </div>
    <!-- /CROP -->
    <!-- MAIN -->
    <div class="main">
        <div class="container">
            <div class="main__title">
                @if ((int)$item['type'] === 1)
                    Гостиница -  на ул. {{$item['string']}} - {{$addService[1]['value']}} м²
                @elseif ((int)$item['type'] === 2)
                    {{$addService[0]['value']}}-комнатная квартира на ул. {{$item['string']}} -  {{$addService[1]['value']}} м²
                @elseif ((int)$item['type'] === 3)
                    Дом -   {{$addService[3]['value']}}-комнат  на ул. {{$item['string']}} - {{$addService[1]['value']}} м²
                @elseif ($item['type'] === 4)

                    Комната на ул. {{$item['string']}} - {{$addService[1]['value']}} м²
                    @endif

            </div>
            <div class="main__inner">
                <div class="main__left">
                    <div class="main__left-inner">
                        <div class="preloader active">
                            <!-- Loader -->
                            <div class="blobs">
                                <div class="blob-center"></div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                                <div class="blob"></div>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
                                <defs>
                                    <filter id="goo">
                                        <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                                        <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                                        <feBlend in="SourceGraphic" in2="goo" />
                                    </filter>
                                </defs>
                            </svg>
                        </div>
                        <div class="slider__main">
                            <div class="slider">
                                <a href="#" data-fancybox data-animation-duration="800" data-src="#animatModal" href="javascript:;" class="photo">
                                    <img src="{{ asset('img//photo/2.png') }}" alt="Room" class="main__photo">
                                    <img src="{{ asset('img//photo/1.png') }}" alt="water-item" class="watter-item">
                                    <a href="#"><img src="{{ asset('img//photo/4.png') }}" alt="best" class="best"></a>
                                    <img src="{{ asset('img//photo/5.png') }}" alt="full" class="big">
                                </a>
                            </div>

                            <div class="slider">
                                <a href="#" data-fancybox data-animation-duration="800" data-src="#animatModal" href="javascript:;" class="photo">
                                    <img src="{{ asset('img//photo/2.png') }}" alt="Room" class="main__photo">
                                    <img src="{{ asset('img//photo/1.png') }}" alt="water-item" class="watter-item">
                                    <a href="#"><img src="{{ asset('img//photo/4.png') }}" alt="best" class="best"></a>
                                    <img src="i{{ asset('img//photo/5.png') }}" alt="full" class="big">
                                </a>
                            </div>

                            <div class="slider">
                                <a href="#" data-fancybox data-animation-duration="800" data-src="#animatModal" href="javascript:;" class="photo">
                                    <img src="{{ asset('img//photo/2.png') }}" alt="Room" class="main__photo">
                                    <img src="{{ asset('img//photo/1.png') }}" alt="water-item" class="watter-item">
                                    <a href="#"><img src="img/photo/4.png" alt="best" class="best"></a>
                                    <img src="{{ asset('img//photo/5.png') }}" alt="full" class="big">
                                </a>
                            </div>

                            <div class="slider">
                                <a href="#" data-fancybox data-animation-duration="800" data-src="#animatModal" href="javascript:;" class="photo">
                                    <img src="{{ asset('img//photo/2.png') }}" alt="Room" class="main__photo">
                                    <img src="{{ asset('img//photo/1.png') }}" alt="water-item" class="watter-item">
                                    <a href="#"><img src="img/photo/4.png" alt="best" class="best"></a>
                                    <img src="{{ asset('img//photo/5.png') }}" alt="full" class="big">
                                </a>
                            </div>

                            <div class="slider">
                                <a href="#" data-fancybox data-animation-duration="800" data-src="#animatModal" href="javascript:;" class="photo">
                                    <img src="{{ asset('img//photo/2.png') }}" alt="Room" class="main__photo">
                                    <img src="{{ asset('img//photo/1.png') }}" alt="water-item" class="watter-item">
                                    <a href="#"><img src="img/photo/4.png" alt="best" class="best"></a>
                                    <img src="{{ asset('img//photo/5.png') }}" alt="full" class="big">
                                </a>
                            </div>

                            <div class="slider">
                                <a href="#" data-fancybox data-animation-duration="800" data-src="#animatModal" href="javascript:;" class="photo">
                                    <img src="{{ asset('img//photo/2.png') }}" alt="Room" class="main__photo">
                                    <img src="{{ asset('img//photo/1.png') }}" alt="water-item" class="watter-item">
                                    <a href="#"><img src="img/photo/4.png" alt="best" class="best"></a>
                                    <img src="{{ asset('img//photo/5.png') }}" alt="full" class="big">
                                </a>
                            </div>

                            <div class="slider">
                                <a href="#" data-fancybox data-animation-duration="800" data-src="#animatModal" href="javascript:;" class="photo">
                                    <img src="{{ asset('img//photo/2.png') }}" alt="Room" class="main__photo">
                                    <img src="{{ asset('img//photo/1.png') }}" alt="water-item" class="watter-item">
                                    <a href="#"><img src="{{ asset('img//photo/4.png') }}" alt="best" class="best"></a>
                                    <img src="{{ asset('img//photo/5.png') }}" alt="full" class="big">
                                </a>
                            </div>


{{--                            @if (!empty($photos))--}}
{{--                                @foreach ($photos as $photo)--}}
{{--                                    <div class="slider">--}}
{{--                                        <a href="#" data-fancybox data-animation-duration="800" data-src="#animatModal" href="javascript:;" class="photo">--}}
{{--                                            <img src="{{ asset('img/choice/'.$photo['name']) }}" alt="Room" class="main__photo" width="870" height="592">--}}
{{--                                            <img src="{{ asset('img//photo/1.png') }}" alt="water-item" class="watter-item">--}}
{{--                                            <a href="#"><img src="{{ asset('img//photo/4.png') }}" alt="best" class="best"></a>--}}
{{--                                            <img src="{{ asset('img//photo/5.png') }}" alt="full" class="big">--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}

                        </div>
                        <div class="main__room">
                            Гостинная
                        </div>

                        <div class="slider__main-2 d-none d-sm-block">
                            @if (!empty($photos))
                                @foreach ($photos as $photo)
                                    <div class="slider">
                                        <div class="photo">
                                            <img src="{{ asset($photo['name']) }}" width="100" height="100" alt="Room" class="main__photo">
                                        </div>
                                    </div>
                                    @endforeach
                                @endif


{{--                            <div class="slider">--}}
{{--                                <div class="photo">--}}
{{--                                    <img src="{{ asset('img//photo/3.png') }}" alt="Room" class="main__photo">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="slider">--}}
{{--                                <div class="photo">--}}
{{--                                    <img src="{{ asset('img//photo/3.png') }}" alt="Room" class="main__photo">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="slider">--}}
{{--                                <div class="photo">--}}
{{--                                    <img src="{{ asset('img//photo/3.png') }}" alt="Room" class="main__photo">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="slider">--}}
{{--                                <div class="photo">--}}
{{--                                    <img src="{{ asset('img//photo/3.png') }}" alt="Room" class="main__photo">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="slider">--}}
{{--                                <div class="photo">--}}
{{--                                    <img src="{{ asset('img//photo/3.png') }}" alt="Room" class="main__photo">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="slider">--}}
{{--                                <div class="photo">--}}
{{--                                    <img src="{{ asset('img//photo/3.png') }}" alt="Room" class="main__photo">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="slider">--}}
{{--                                <div class="photo">--}}
{{--                                    <img src="{{ asset('img//photo/3.png') }}" alt="Room" class="main__photo">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="slider">--}}
{{--                                <div class="photo">--}}
{{--                                    <img src="{{ asset('img//photo/3.png') }}" alt="Room" class="main__photo">--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>

                        <div class="center d-none d-sm-block">
                            <a href="#" class="main__more">
                                Развернуть все фото
                            </a>
                        </div>

                        <div class="main__service-inner">

                                @isset ($icons[0])
{{--                            <div class="main__service-item">--}}
{{--                                <div class="main__service">--}}
{{--                                    <img src="{{ asset('img/photo/10.png') }}" alt="service">--}}
{{--                                    <div class="main__much">--}}
{{--                                        1 комната--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            @if ((int)$icons[0])
                                    <div class="main__service-item">
                                        <div class="main__service">
                                            <img src="{{ asset('img/photo/11.png') }}" alt="service">
                                            <div class="main__much">
                                                {{ $icons[0]['value'] }} cпальная
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endisset
                                @isset ($icons[1])
                                        @if ((int)$icons[1]['value'])
                                    <div class="main__service-item">
                                        <div class="main__service">
                                            <img src="{{ asset('img//photo/12.png') }}" alt="service">
                                            <div class="main__much">
                                                {{$icons[1]['value']}} кровати
                                            </div>
                                        </div>
                                    </div>
                                        @endif
                                @endisset
                            @isset ($icons[2])
                                        @if ((int)$icons[2]['value'] !== 0)
                                <div class="main__service-item">
                                    <div class="main__service">
                                        <img src="{{ asset('img/photo/14.png') }}" alt="service">
                                        <div class="main__much">
                                            {{$icons[2]['value']}} этаж
                                        </div>
                                    </div>
                                </div>
                                        @endif
                                    @endisset
                            @isset ($icons[3])
                                        @if ((int)$icons[3]['value'] !== 0)
                                <div class="main__service-item">
                                    <div class="main__service">
                                        <img src="{{ asset('img/photo/17.png') }}" alt="service">
                                        <div class="main__much">
                                            парковка
                                        </div>
                                    </div>
                                </div>
                                        @endif
                                        @endisset
                            @isset ($icons[4])
                                        @if ((int)$icons[4]['value'] !== 0)
                                <div class="main__service-item">
                                    <div class="main__service">
                                        <img src="{{ asset('img/photo/18.png') }}" alt="service">
                                        <div class="main__much">
                                            Wi-Fi
                                        </div>
                                    </div>
                                </div>
                                        @endif
                                            @endisset




{{--                            <div class="main__service-item">--}}
{{--                                <div class="main__service">--}}
{{--                                    <img src="{{ asset('img//photo/13.png') }}" alt="service">--}}
{{--                                    <div class="main__much">--}}
{{--                                        4 гостей--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="main__service-item">--}}
{{--                                <div class="main__service">--}}
{{--                                    <img src="{{ asset('img/photo/15.png') }}" alt="service">--}}
{{--                                    <div class="main__much">--}}
{{--                                        до моря--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="main__service-item">--}}
{{--                                <div class="main__service">--}}
{{--                                    <img src="{{ asset('img//photo/16.png') }}" alt="service">--}}
{{--                                    <div class="main__much">--}}
{{--                                        до метро--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}


                        </div>  <!-- /main__service-inner -->




                        <!-- MAIN INFO -->

                        <div class="main__info">
                            <div class="main__info-inner">
                                <a href="#box" onclick="openbox('box'); return false" class="main__info-left">
                                    Основная информация
                                </a>
                                <a href="#map" onclick="openmap('map'); return false" class="main__info-left">
                                    Карта расстояния
                                </a>
                                <a href="#reviews" onclick="openreviews('reviews'); return false" class="main__info-left">
                                    Рейтинг и отзывы
                                </a>
                            </div>

                            <div class="map" id="map" style="display: none">
                                <div id="MapComponent" data-coordinateY="{{ $item['coordinateY'] }}" data-coordinateX="{{ $item['coordinateX'] }}"></div>
{{--                                <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d2011.6102154842715!2d34.16962910801503!3d44.518298482738096!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sua!4v1569173991438!5m2!1sru!2sua" width="850" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>--}}

                            </div>



                            <div class="reviews" id="reviews" style="display: none">
                                <div class="reviews__inner">
                                    <div class="reviews__title">
                                        Оценка гостей
                                    </div>
                                    <div class="reviews__subtitle">
                                        рейтинг составлен на основании 8 отзывов
                                    </div>
                                    <div class="reviews__block-inner">
                                        <div class="reviews__block-left">
                                            <div class="reviews__number">
                                                <img src="{{ asset('img/ratting.png') }}" alt="">5.0
                                            </div>
                                        </div>
                                        <div class="reviews__block-center">
                                            <div class="reviews__clear">
                                                Чистота <span class="reviews__span">5.0</span>
                                            </div>
                                            <div class="reviews__clear">
                                                Цена-качество <span class="reviews__span">5.0</span>
                                            </div>
                                            <div class="reviews__clear">
                                                Соответствие фото <span class="reviews__span">5.0</span>
                                            </div>
                                        </div>
                                        <div class="reviews__block-right">
                                            <div class="reviews__clear  reviews__clear-1">
                                                Обслуживание <span class="reviews__span">5.0</span>
                                            </div>
                                            <div class="reviews__clear  reviews__clear-1">
                                                Расположение <span class="reviews__span">5.0</span>
                                            </div>
                                            <div class="reviews__clear  reviews__clear-1">
                                                Комфорт <span class="reviews__span">5.0</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="rev__inner">
                                        <div class="rev__inner-left">
                                            <div class="rev__rev">
                                                Отзывы <span class="rev__num">8</span>
                                            </div>
                                        </div>
                                        <div class="rev__inner-right">
                                            <div class="rev__inner-reviews  new">
                                                новые
                                            </div>
                                            <div class="rev__inner-reviews">
                                                лучшие оценки
                                            </div>
                                            <div class="rev__inner-reviews">
                                                худшие оценки
                                            </div>
                                        </div>
                                    </div>

                                    <div class="rev__comment">
                                        <div class="comment__inner">
                                            <div class="comment__left">
                                                <div class="comment__img">
                                                    <img src="{{ asset('img/content/3.png') }}" alt="Avatar">
                                                </div>
                                                <div class="comment__company">
                                                    <div class="comment__ratting">Надежда</div>
                                                    <div class="company__agency">
                                                        <img src="{{ asset('img/star/2.png') }}" alt="ratting">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment__right">
                                                <div class="comment__right-date">12 cентрября 2019</div>
                                            </div>
                                        </div>
                                        <div class="reviews__man">
                                            Разнообразный и богатый опыт реализации намеченых плановых заданий способствует подготовки и <br>
                                            реализации соотвутствующий условий активизации. Идейный соображения высшего порядка.
                                        </div>
                                    </div>

                                    <div class="rev__comment">
                                        <div class="comment__inner">
                                            <div class="comment__left">
                                                <div class="comment__img">
                                                    <img src="{{ asset('img/content/photo.png') }}" alt="Avatar">
                                                </div>
                                                <div class="comment__company">
                                                    <div class="comment__ratting">Константин</div>
                                                    <div class="company__agency">
                                                        <img src="{{ asset('img/star/2.png') }}" alt="ratting">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment__right">
                                                <div class="comment__right-date">20 октября 2019</div>
                                            </div>
                                        </div>
                                        <div class="reviews__man">
                                            Все супер!
                                        </div>
                                    </div>

                                    <div class="rev__comment">
                                        <div class="comment__inner">
                                            <div class="comment__left">
                                                <div class="comment__img">
                                                    <img src="{{ asset('img/content/3.png') }}" alt="Avatar">
                                                </div>
                                                <div class="comment__company">
                                                    <div class="comment__ratting">Екатерина</div>
                                                    <div class="company__agency">
                                                        <img src="{{ asset('img/star/2.png') }}А" alt="ratting">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment__right">
                                                <div class="comment__right-date">12 cентрября 2019</div>
                                            </div>
                                        </div>
                                        <div class="reviews__man">
                                            Разнообразный и богатый опыт реализации намеченых плановых заданий способствует подготовки и <br>
                                            реализации соотвутствующий условий активизации. Идейный соображения высшего порядка.
                                        </div>
                                    </div>

                                    <div class="rev__comment">
                                        <div class="comment__inner">
                                            <div class="comment__left">
                                                <div class="comment__img">
                                                    <img src="{{ asset('img/content/photo.png') }}" alt="Avatar">
                                                </div>
                                                <div class="comment__company">
                                                    <div class="comment__ratting">Максим</div>
                                                    <div class="company__agency">
                                                        <img src="{{ asset('img/star/2.png') }}" alt="ratting">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment__right">
                                                <div class="comment__right-date">20 октября 2019</div>
                                            </div>
                                        </div>
                                        <div class="reviews__man">
                                            Все супер!
                                        </div>
                                    </div>

                                    <div class="rev__comment">
                                        <div class="comment__inner">
                                            <div class="comment__left">
                                                <div class="comment__img">
                                                    <img src="{{ asset('img/content/3.png') }}" alt="Avatar">
                                                </div>
                                                <div class="comment__company">
                                                    <div class="comment__ratting">Надежда</div>
                                                    <div class="company__agency">
                                                        <img src="{{ asset('img/star/2.png') }}" alt="ratting">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment__right">
                                                <div class="comment__right-date">12 cентрября 2019</div>
                                            </div>
                                        </div>
                                        <div class="reviews__man">
                                            Разнообразный и богатый опыт реализации намеченых плановых заданий способствует подготовки и <br>
                                            реализации соотвутствующий условий активизации. Идейный соображения высшего порядка.
                                        </div>
                                    </div>

                                    <div class="rev__comment">
                                        <div class="comment__inner">
                                            <div class="comment__left">
                                                <div class="comment__img">
                                                    <img src="{{ asset('img/content/photo.png') }}" alt="Avatar">
                                                </div>
                                                <div class="comment__company">
                                                    <div class="comment__ratting">Константин</div>
                                                    <div class="company__agency">
                                                        <img src="{{ asset('img/star/2.png') }}" alt="ratting">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment__right">
                                                <div class="comment__right-date">20 октября 2019</div>
                                            </div>
                                        </div>
                                        <div class="reviews__man">
                                            Все супер!
                                        </div>
                                    </div>

                                    <div class="rev__comment">
                                        <div class="comment__inner">
                                            <div class="comment__left">
                                                <div class="comment__img">
                                                    <img src="{{ asset('img/content/3.png') }}" alt="Avatar">
                                                </div>
                                                <div class="comment__company">
                                                    <div class="comment__ratting">Екатерина</div>
                                                    <div class="company__agency">
                                                        <img src="{{ asset('img/star/2.png') }}" alt="ratting">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment__right">
                                                <div class="comment__right-date">12 cентрября 2019</div>
                                            </div>
                                        </div>
                                        <div class="reviews__man">
                                            Разнообразный и богатый опыт реализации намеченых плановых заданий способствует подготовки и <br>
                                            реализации соотвутствующий условий активизации. Идейный соображения высшего порядка.
                                        </div>
                                    </div>

                                    <div class="rev__comment">
                                        <div class="comment__inner">
                                            <div class="comment__left">
                                                <div class="comment__img">
                                                    <img src="{{ asset('img/content/photo.png') }}" alt="Avatar">
                                                </div>
                                                <div class="comment__company">
                                                    <div class="comment__ratting">Максим</div>
                                                    <div class="company__agency">
                                                        <img src="{{ asset('img/star/2.png') }}" alt="ratting">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment__right">
                                                <div class="comment__right-date">20 октября 2019</div>
                                            </div>
                                        </div>
                                        <div class="reviews__man">
                                            Все супер!
                                        </div>
                                    </div>

                                    <div class="center">
                                        <a href="#" class="rev__btn">
                                            Показать еще
                                        </a>
                                    </div>
                                </div>

                            </div>












                            <div class="block" id="box" style="display: none">

                                <div class="main__info-text">
                                    <p>	Повседневная практика показывает, что постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет выполнять важные задания по разработке направлений прогрессивного развития. С другой стороны дальнейшее развитие различных форм деятельности в значительной степени обуславливает создание дальнейших направлений развития. С другой стороны постоянное<br> информационно-пропагандистское обеспечение нашей деятельности играет важную роль в формировании дальнейших направлений развития.<br>
                                    </p><br>
                                    <p>Не следует, однако забывать, что начало повседневной работы по формированию позиции требуют определения и уточнения существенных финансовых и административных условий. Разнообразный и богатый опыт дальнейшее развитие различных форм деятельности играет важную роль в формировании дальнейших направлений развития. Повседневная практика показывает, что постоянный количественный рост и сфера нашей активности позволяет оценить значение соответствующий условий активизации. </p>
                                </div>

                                @foreach ($description as $key => $items)
                                    <div class="main__price">
                                        <div class="main-price">
                                           {{$key}}
                                        </div>
                                        <div class="main__inner-price">
                                        @foreach( $items as $itemKey => $item)


                                            <div class="main__{{ $itemKey % 2 === 0 ? 'left' : 'right' }}-price">
                                                <div class="main-text">{{ $item['name'] }}</div>
{{--                                                <div class="main--{{(int)$item['value'] ? 'yes' : 'no'}}">{{ (int)$item['value'] ? 'да' : 'нет'}}</div>--}}
                                            </div>
{{--                                            <div class="main__right-price">--}}
{{--                                                <div class="main--text">Безналичный</div>--}}
{{--                                                <div class="main--no">нет</div>--}}
{{--                                            </div>--}}

                                        @endforeach
                                        </div>
                                    </div>
                                    @endforeach
{{--                                <div class="main__price">--}}
{{--                                    <div class="main-price">--}}
{{--                                        Принимается оплата--}}
{{--                                    </div>--}}
{{--                                    <div class="main__inner-price">--}}
{{--                                        <div class="main__left-price">--}}
{{--                                            <div class="main--text">Наличными</div>--}}
{{--                                            <div class="main--yes">да</div>--}}
{{--                                        </div>--}}
{{--                                        <div class="main__right-price">--}}
{{--                                            <div class="main--text">Безналичный</div>--}}
{{--                                            <div class="main--no">нет</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="main__inner-price">--}}
{{--                                        <div class="main__left-price">--}}
{{--                                            <div class="main--text">Принимаются к оплате карты</div>--}}
{{--                                            <div class="main--yes">да</div>--}}
{{--                                        </div>--}}
{{--                                        <div class="main__right-price">--}}
{{--                                            <div class="main--text">Отчетные документы</div>--}}
{{--                                            <div class="main--no">нет</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="main-price">--}}
{{--                                    Услуги за дополнительную плату--}}
{{--                                </div>--}}
{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Размещение с животными</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Трансфер</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="main-price">--}}
{{--                                    Правила проживания--}}
{{--                                </div>--}}
{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main--text">Проживания с детьми</div>--}}
{{--                                        <div class="main--yes">разрешено</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main--text">Вечеринки</div>--}}
{{--                                        <div class="main--no">запрещено</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main--text">Животные</div>--}}
{{--                                        <div class="main--yes">разрешено</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main--text">Курение</div>--}}
{{--                                        <div class="main--no">запрещено</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main--text">Прием гостей</div>--}}
{{--                                        <div class="main--yes">разрешено</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main--text">Проведение свадеб и торжеств</div>--}}
{{--                                        <div class="main--no">запрещено</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


{{--                                <div class="main-price">--}}
{{--                                    Оснащение жилья--}}
{{--                                </div>--}}
{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Постельное белье</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Кондиционер</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Беспроводной интернет Wi-Fi</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Маскитная сетка</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Газовый водонагреватель</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Сейф</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Горячая вода постоянно</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Стиральная машина</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Гардеробная</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Сушилка для белья</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Гостинный уголок</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Утюг с гладильной доской</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Диван</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Центральное отопление</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Диван-кровать</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Чистящие средствам</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Домофон</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Шкаф</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Ковровое покрытие</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Панорамный вид</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


{{--                                <div class="main-price">--}}
{{--                                    Тип питания--}}
{{--                                </div>--}}
{{--                                <div class="main__left-price">--}}
{{--                                    <div class="main-text-1">Сообственная кухня</div>--}}
{{--                                </div>--}}

{{--                                <div class="main-price">--}}
{{--                                    Кухонное оборудование--}}
{{--                                </div>--}}
{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Газовая или электроплита</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Посуда и принадлежности</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Духовка</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Тостер</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Кофемашина</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Столовые приборы</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Фильтр для воды</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Кухонный гарнитур</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Микроволновая печь</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Холодильник</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Морозильник</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Электрический чайник</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="main__left-price">--}}
{{--                                    <div class="main-text">Обеденный стол</div>--}}
{{--                                </div>--}}

{{--                                <div class="main-price">--}}
{{--                                    Для детей--}}
{{--                                </div>--}}
{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Детский стульчик кроватка</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Детская кроватка</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Горшок</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Кровать-манеж</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="main-price">--}}
{{--                                    Доступность жилья--}}
{{--                                </div>--}}
{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Лифт</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Трансфер</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


{{--                                <div class="main-price">--}}
{{--                                    Парковка--}}
{{--                                </div>--}}
{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Подземный паркинг</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Бесплатная неохроняемая</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">На огороженной территории</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Парковка круглосуточная</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="main__left-price">--}}
{{--                                    <div class="main-text">Рядом с домом</div>--}}
{{--                                </div>--}}


{{--                                <div class="main-price">--}}
{{--                                    Оснащение территории--}}
{{--                                </div>--}}
{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Закрытый двор</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Обеденная зона на улице</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Огороженная территория</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Беседка</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Детские качели</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Пляжный зонт</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Парковка</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Веранда</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Игровая площадка</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Садовая мебель</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Барбекю</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Терраса</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Зеленные насаждения</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Уличная мебель</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="main__left-price">--}}
{{--                                    <div class="main-text">Бассейн</div>--}}
{{--                                </div>--}}



{{--                                <div class="main-price">--}}
{{--                                    Оснащение территории--}}
{{--                                </div>--}}
{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Закрытый двор</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Обеденная зона на улице</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Огороженная территория</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Беседка</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Детские качели</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Пляжный зонт</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}



{{--                                <div class="main-price">--}}
{{--                                    Инфраструктура и досуг рядом--}}
{{--                                </div>--}}
{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">SPA-центр</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Кинотеатр</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Баня</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Набережная</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Остановка общественного транспорта</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Ночной клубт</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Жильё находится в частном секторе</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Парк аттракционов</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


{{--                                <div class="main-price">--}}
{{--                                    Пляж--}}
{{--                                </div>--}}
{{--                                <div class="main__inner-price">--}}
{{--                                    <div class="main__left-price">--}}
{{--                                        <div class="main-text">Песчанный</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="main__right-price">--}}
{{--                                        <div class="main-text">Песчано-галечный</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


{{--                                <div class="main__left-price">--}}
{{--                                    <div class="main-text">Оборудованный бесплатный</div>--}}
{{--                                </div>--}}

                         </div>

                        </div>   <!-- MAIN INFO -->

                        <!-- РАЗВОРАЧИВАЮЩИЙСЯ СПИСОК -->








                    </div>  <!-- MAIN LEFT INNER -->
                </div>
                <div data-disable="{{ $disable }}" data-locking="{{ json_encode($locking) }}" data-dateFrom="{{ date('D M d Y H:i:s',strtotime($occupation['dateFrom'])).' GMT+0300 (Москва, стандартное время)' }}" data-dateTo="{{ date('D M d Y H:i:s',strtotime($occupation['dateTo'])).' GMT+0300 (Москва, стандартное время)'}}" data-days="{{$occupation['min_days']}}" data-price="{{ $addService[2]['value'] }}" data-minDate="{{ date('D M d Y H:i:s',strtotime($occupation['days'])).' GMT+0300 (Москва, стандартное время)' }}" id="cardFilter"></div>
{{--                <div class="main__right">--}}
{{--                    <div class="main__right-inner">--}}
{{--                        <div class="main__right-title">--}}
{{--                            Моя поездка--}}
{{--                        </div>--}}
{{--                        <div class="main__right-text">--}}
{{--                            Регион, город, место--}}
{{--                        </div>--}}

{{--                        <form>--}}
{{--                            <div class="main__right-form">--}}
{{--                                <label>--}}
{{--                                    <input class="main--form" type="text" placeholder="Ялта">--}}
{{--                                    <img class="main--form__img" src="{{ asset('img/gps.png') }}" alt="gps">--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </form>--}}

{{--                        <div class="main__right-text">--}}
{{--                            Дата заезда--}}
{{--                        </div>--}}

{{--                        <form>--}}
{{--                            <div class="main__right-form">--}}
{{--                                <label>--}}
{{--                                    <input class="main--form" type="text" placeholder="20 cентября 2019 г.">--}}
{{--                                    <img class="main--form__img" src="{{ asset('img/calendar.png') }}" alt="calendar">--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </form>--}}

{{--                        <div class="main__right-text">--}}
{{--                            Дата выезда--}}
{{--                        </div>--}}

{{--                        <form>--}}
{{--                            <div class="main__right-form">--}}
{{--                                <label>--}}
{{--                                    <input class="main--form" type="text" placeholder="30 cентября 2019 г.">--}}
{{--                                    <img class="main--form__img" src="{{ asset('img/calendar.png') }}" alt="calendar">--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </form>--}}

{{--                        <div class="main__right-text">--}}
{{--                            Гостей--}}
{{--                        </div>--}}

{{--                        <form>--}}
{{--                            <div class="main__right-form">--}}
{{--                                <label>--}}
{{--                                    <input class="main--form" type="text" placeholder="2 взрослых">--}}
{{--                                    <img class="main--form__images" src="{{ asset('img/down.png') }}" alt="calendar">--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </form>--}}

{{--                        <form>--}}
{{--                            <div class="main__right-form">--}}
{{--                                <label>--}}
{{--                                    <input class="main--form" type="text" placeholder="1 ребенок">--}}
{{--                                    <img class="main--form__images" src="{{ asset('img/down.png') }}" alt="calendar">--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                        <div class="main__right-ask">--}}
{{--                            Вы путешествуете по работе?--}}
{{--                        </div>--}}
{{--                        <div class="main__right-qna">--}}
{{--                            <div  class="service  main--active">--}}
{{--                                да--}}
{{--                            </div>--}}
{{--                            <div  class="service  main--active">--}}
{{--                                нет--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="main__right-much-inner">--}}
{{--                        <div class="main__right-much">--}}
{{--                            1 000 руб. <span class="main--grey"> x 10 суток</span>--}}
{{--                            <div class="main__right-money">--}}
{{--                                10 000 руб.--}}
{{--                            </div>--}}
{{--                            <div class="center">--}}
{{--                                <a href="#" data-fancybox data-animation-duration="800" data-src="#animModal" href="javascript:;" class="main__right-btn">--}}
{{--                                    Запрос на бронь--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="center">--}}
{{--                                <div class="main__right-remember">--}}
{{--                                    <a href="#inform" onclick="openinfo('inform'); return false"><img src="{{ asset('img/info.png') }}" alt="info"></a> Предоплата 15 %--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="main__right-info" id="inform" style="display: none">--}}
{{--                                Равным образом сложившаяся структура <br>организации позволяет выполнять важные<br> задания по разработке существенных <br> финансовых и административных условий--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
    <!-- /MAIN -->

@endsection
