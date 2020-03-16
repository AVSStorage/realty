@extends('layouts.app')

@section('content')



    <div class="dialog">
    <div class="container">
        <div class="dialog__inner">
            <div class="dialog__inner-left">
                <div class="rev__rev">
                    Мои объекты<span class="rev__num"> {{ count($objects) }}</span>
                </div>




                @isset($error)
                    <div class="alert alert-danger">{{ $error }}</div>
                    @endisset
                <!-- CHOICE -->
                @foreach( $objects as $object)
                    <div class="{{ $object['status'] === 0 ? "choice alert-info" : "choice" }}">
                        <div class="choice__inner">
                            <div class="choice__left">
{{--                                <div class="top__choice">--}}
{{--                                    <div class="top">--}}
{{--                                        <input type="checkbox" checked="{{ $object['prepay'] === 0 ? false : true }}">--}}
{{--                                    </div>--}}
{{--                                    <div class="top__choice-text">--}}
{{--                                        <label>Бронирование без предоплаты</label>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="checkBox" data-checked="{{ $object['prepay'] === 0 ? false : true }}" data-id="{{ $object['id'] }}" data-path="/objects/update/prepay"></div>

                                <div class="choice__left-content">

                                    <div class="choice__left-slider">
                                        <div class="cardSlider" data-photos="{{ json_encode($object['photos']) }}"></div>
                                    </div>
                                    <div class="choice__left-info">
                                        <div class="choice__info-title">
                                            {{ $address[$object['id']] }}
                                        </div>
                                        <div class="choice__street">
                                            {{ $object['region'] }}, ул. {{ $object['string'] }}, д. {{ $object['house'] }}
                                        </div>
                                        <div class="choice__reviews">
                                            <img class="choice__star" src="/img/star/2.png" alt="Ratting">
                                            94 отзыва
                                        </div>
                                        <div class="choice__services-item">
                                            @foreach($object['services'] as $service)
{{--                                            <img src="{{ asset('img/service/1.png') }}" alt="service">--}}

                                                    @if (((int)$service['service_id'] === 21) && ((int)$service['value'] === 1))
                                                        <img src="{{ asset('img/service/2.png') }}" alt="service">
                                                    @endif
                                                    @if (((int)$service['service_id'] === 23) && ((int)$service['value'] === 1))
                                                        <img src="{{ asset('img/service/3.png') }}" alt="service">
                                                    @endif
                                                        @if (((int)$service['service_id'] === 38) && ((int)$service['value'] === 1))
                                                            <img src="{{ asset('img/service/4.png') }}" alt="service">
                                                        @endif
                                                        @if (((int)$service['service_id'] === 196) && ((int)$service['value'] === 1))
                                                            <img src="{{ asset('img/service/5.png') }}" alt="service">
                                                        @endif
                                                        @if (((int)$service['service_id'] === 147) && ((int)$service['value'] === 1))
                                                            <img src="{{ asset('img/service/6.png') }}" alt="service">
                                                        @endif

                                            @endforeach

                                        </div>
                                        @isset($object['seas'])
                                        <div class="choice__km">
                                            @if (count($object['seas']) > 0)
                                                @foreach($object['seas'] as $sea)
                                                    @if ($sea['sea_path'] > 0 )
                                                        <div class="choice__km">
                                                            {{ $sea['sea_path'] }} м.
                                                            <span class=choice__km-span>до моря</span>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                        @endisset
                                        @if( $object['center_path'] > 0)
                                        <div class="choice__km">
                                            {{ $object['center_path'] }} км.
                                            <span class=choice__km-span>до центра</span>
                                        </div>
                                        @endisset
                                        @isset($object['metros'])
                                        @if (count($object['metros']) > 0)
                                        @foreach($object['metros'] as $metro)
                                            @if ($metro['metro_path'] > 0 )
                                        <div class="choice__km">
                                            {{ $metro['metro_path'] }} км.
                                            <span class=choice__km-span>до метро, ст. {{ $metro['metro'] }}</span>
                                        </div>
                                                @endif
                                            @endforeach
                                            @endif
                                            @endisset

                                    </div>	<!-- choice__left-info -->

                                </div>    <!-- choice__left-content -->
                            </div>		<!-- choice__left -->

                            <div class="choice__right">
                                <div class="choice__right-contents">
                                    <div class="choice__right-price">
                                        Объявление <br>
                                        № {{$object['id']}}
                                    </div>

                                    <a href="{{ url('/objects/edit/'.$object['id']) }}" class="choice__btn-my">Редактировать</a>


                                    <a href="{{ "/dashboard/calendar/". $object['id'] }}" class="choice__btn-my">Посмотреть календарь</a>

                                    <a href="{{ url('/dashboard/messages/'.$object['id']) }}" class="choice__btn-my">Посмотреть все диалоги</a>

                                    <div class="hideObject"  data-image={{ asset('img/content/6.png')  }} data-checked="{{ $object['status'] === 0 ? false : true }}" data-id="{{ $object['id'] }}" data-path={{ "/objects/hide/" . $object['id']}}></div>
{{--                                    <a href="#" class="choice__best">--}}
{{--                                        <img src="{{ asset('img/content/6.png') }}" alt="like">скрыть объявление--}}
{{--                                    </a>--}}
                                    <a href="#" class="choice__best  best">
                                        <img src="{{ asset('img/house.png') }}" alt="like">в сравнение
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /CHOICE -->
                    @endforeach


            </div>

            @include('dashboard/dashboard-panel')
        </div>
    </div>
</div>
@endsection
