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
                @if ((int)$type === 1)
                    {{ $name }} -  на ул. {{$item['string']}} - {{$addService[1]['value']}} м²
                @elseif ((int)$type === 2)
                    {{ $name }}  на ул. {{$item['string']}} -  {{$addService[1]['value']}} м²
                @elseif ((int)$type === 3)
                    {{ $name }} -   {{$addService[3]['value']}}-{{ $prefix }}  на ул. {{$item['string']}} - {{$addService[1]['value']}} м²
                @elseif ($type === 4)

                    {{ $name }} на ул. {{$item['string']}} - {{$addService[1]['value']}} м²
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
                        @if (!empty($photos))
                            <div>
                            @foreach ($photos as $photo)
                                <a href="{{ '/'.$photo['path'].'.'.$photo['extension'] }}" data-fancybox="gallery" class="d-none" data-caption="{{ $photo['description'] }}">
                                    <img src="{{ asset( $photo['path'].'.'.$photo['extension']) }}" style="width:100%"
                                         alt="Room" class="main__photo">
                                </a>
                            @endforeach
                            </div>
                        @endif
                        <div class="slider__main">
                            @if (!empty($photos))
                                @foreach ($photos as $photo)
                                    <div>
                                    <div class="slider">


                                        <a href="#" data-fancybox data-animation-duration="800"  data-src="#animatModal"  class="photo">

                                            @if(($photo['path'] !== '') && file_exists($photo['path'].'.'.$photo['extension']))

                                                <img src="{{ asset( $photo['path'].'.'.$photo['extension']) }}" style="width:100%"
                                                     alt="Room" class="main__photo">
                                            @else
                                                <img src="{{ asset('img//photo/2.png') }}" alt="Room" class="main__photo">
                                            @endif
                                            <img src="{{ asset('img//photo/1.png') }}" alt="water-item" class="watter-item">
                                            <a href="#"><img src="{{ asset('img//photo/4.png') }}" alt="best" class="best"></a>
                                            <img src="{{ asset('img//photo/5.png') }}" alt="full" class="big">
                                        </a>
                                    </div>
                                    <div class="main__room">
                                        {{ $photo['description'] }}
                                    </div>
                                    </div>
                                @endforeach
                            @endif

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
                        </div>

                        <div class="center d-none d-sm-block">
                            <a data-fancybox-trigger="gallery"  class="main__more" href="javascript:;">
                                Развернуть все фото
                            </a>
{{--                            <a href="#" class="main__more">--}}
{{--                                Развернуть все фото--}}
{{--                            </a>--}}
                        </div>

                        <div class="main__service-inner">

                                @isset ($icons[0])
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
                                        @foreach( $items as $itemKey => $itemValue)


                                            <div class="main__{{ $itemKey % 2 === 0 ? 'left' : 'right' }}-price">
                                                <div class="main-text">{{ $itemValue['name'] }}</div>
                                            </div>


                                        @endforeach
                                        </div>
                                    </div>
                                    @endforeach

                         </div>

                        </div>   <!-- MAIN INFO -->

                        <!-- РАЗВОРАЧИВАЮЩИЙСЯ СПИСОК -->








                    </div>  <!-- MAIN LEFT INNER -->
                </div>
                <div data-disable="{{ $disable }}" data-locking="{{ json_encode($locking) }}" data-dateFrom="{{ date('D M d Y H:i:s',strtotime($occupation['dateFrom'])).' GMT+0300 (Москва, стандартное время)' }}" data-dateTo="{{ date('D M d Y H:i:s',strtotime($occupation['dateTo'])).' GMT+0300 (Москва, стандартное время)'}}" data-days="{{$occupation['min_days']}}" data-price="{{ $addService[2]['value'] }}" data-minDate="{{ date('D M d Y H:i:s',strtotime($occupation['days'])).' GMT+0300 (Москва, стандартное время)' }}" id="cardFilter"></div>
            </div>
        </div>
    </div>
    <!-- /MAIN -->



   @include('popup',['photos' => $photos, 'userId' => $item['user_id'], 'id' => $item['id'], 'descripttion' => $description])







@endsection
