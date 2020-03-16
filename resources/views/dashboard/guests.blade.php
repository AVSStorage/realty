@extends('layouts.app')

@section('content')


    <div class="dialog">
        <div class="container">
            <div class="dialog__inner">
                <div class="dialog__inner-left">
                    <div class="rev__rev">
                        Мои брони и гости
                    </div>

                    @foreach($guests as $guest)
                    <div class="client">
                        <div class="client__inner">
                            <div class="client__left">
                                <div class="client__name">
                                    {{ $guest['name'] }} {{ $guest['surname'] }} <span class="client--span">{{ $guest['phone_number'] }} {{ '('.$guest['city'].')' }}</span>
                                    <div class="client__child">
                                        2 взрослых<br>
                                        2 детей (5,3 года)
                                    </div>
                                </div>
                                <div class="client__date">
                                    <img src="{{ asset('img/my-client/1.png') }}" alt="start">Заезд <span class="client--span">{{ $guest['date_from'] }} в 12:00</span>
                                </div>
                                <div class="client__date">
                                    <img src="{{ asset('img/my-client/2.png') }}" alt="start">Выезд <span class="client--span">{{ $guest['date_to'] }} в 12:00</span>
                                </div>
                            </div>
                            <div class="client__right">
                                <div class="client__block">
                                    Предоплата <span class="client--span gr"> {{ $guest['price'] }} руб. </span><br>За {{ $days[$guest['id']] }} суток <span class="client--span gr"> {{ $prices[$guest['id']] }} руб. </span>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
       <div id="calendar" data-range="{{ json_encode($occupation) }}"></div>



                </div>

                @include('dashboard/dashboard-panel')
            </div>
        </div>
    </div>



@endsection
