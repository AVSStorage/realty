@extends('layouts.app')

@section('content')

    <!-- ЛИЧНЫЙ КАБИНЕТ -->
    <div class="personal">
        <div class="container">
            <div class="personal__inner">
                <div class="personal__left">
                    <div class="personal__left-back">

                        <div class="personal__left-back-text">
                            <a href="{{ url('/') }}"><img src="/img/content/back.png" height="13" alt="Back">На главную</a>
                        </div>
                    </div>

                    @role('client')
                        <div class="attention">
                            <div class="attention__inner " style="flex-direction: row">
                                <div class="attention__left"><img src="/img/choice/1.png" alt="Summer"></div>
                                <div class="attention__right">
                                    <div class="perosnal__left-rev"><img alt="Person" class="personal__photo"
                                                                         src="/img/setting/1.png" width="45"
                                                                         height="45">
                                        <div class="personal__name">Алиса <span class="personal--grey">по объекту</span><br><span
                                                class="personal__hotels">6-комнатная квартира на ул. Дачная -  15 м²</span>
                                        </div>
                                    </div>

                                    <div class="personal__rev__inner">
                                        <div class="center__rev-btn"><button disabled="{{ (int)$orderInfo[0]['status'] !== 1 }}" class="peronal__rev__btn">Внести предоплату</button></div>
                                    </div>

                                    <div class="attention__footer-inner">
                                        <div class="attention__footer-right"><img src="/img/personal/1.png" alt="Good"
                                                                                  width="30"></div>
                                        <div class="attention__footer-left-1">
                                            <div class="attention__footer-text-inner">
                                                <div class="attetion__footer-text-4"><span class="attention__orange">{{ $orderInfo[0]['status'] === 0 ? "Не забронировано" : "В процессе" }}</span><br>с
                                                    {{ $orderInfo[0]['date_from'] }} по {{ $orderInfo[0]['date_to'] }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endrole

                    <div class="attention">
                        <div class="attention__inner">
                            <div class="attention__title">Внимание!</div>
                            <div class="attention__text">Обмен контактами с гостями запрещён. Вы увидите его телефон
                                после подтверждения брони и внесения <br>
                                предоплаты. Вознагрождение zabroniroval.ru – 15% от общей стоимости проживания.
                            </div>
                        </div>


                    </div>
                    <div data-simplebar class="personal__all">
                        <div data-user="{{ json_encode(Auth::user()) }}" id="chat">

                        </div>
                    </div>
                </div>

                <div class="personal__right">
                    @include('dashboard/dashboard-panel',['withoutClass' => true])
                    @role('owner')
                    <form method="post">
                        @csrf

                        <div class="reservation">
                            <div class="reservation__inner">
                                <div class="reserv">
                                    Бронирование<br>
                                    № <span id="orderId">{{ $orderId }}</span><br>
                                    <span class="reserv__obj">объект № {{ $objectId }},</span> <span
                                        class="reserv__room">
                                    {{ $address }}
                                </span>
                                </div>
                                <div class="reserv__date">
                                    <img src="/img/personal/5.png" alt="next"> <span class="reserv__go">Заезд</span>
                                    {{ $dateFrom }}
                                    14:00
                                </div>

                                <div class="reserv__date two">
                                    <img src="/img/personal/4.png" alt="back"> <span class="reserv__go">Выезд</span>
                                    {{ $dateTo }}
                                    12:00
                                </div>


                                <div class="reserv  res">
                                    {{ (int)$orderInfo[0]['children'] + (int)$orderInfo[0]['parents'] }} человек
                                    отдых<br>
                                    <span class="reserv__obj">дети есть, животных нет</span>
                                </div>

                                {{--                            <div data-simplebar class="reserv__man  res__height">--}}
                                {{--                                <span class="res__men">гость 1</span> мужчина<br>--}}
                                {{--                                <span class="res__men">гость 2</span> не указан<br>--}}
                                {{--                                <span class="res__men">гость 3</span> не указан<br>--}}
                                {{--                                <span class="res__men">гость 4</span> женщина<br>--}}
                                {{--                                <span class="res__men">гость 5</span> ребёнок (8 лет)<br>--}}
                                {{--                                <span class="res__men">гость 6</span> ребёнок (2 года)<br>--}}
                                {{--                                <span class="res__men">гость 1</span> мужчина<br>--}}
                                {{--                                <span class="res__men">гость 2</span> не указан<br>--}}
                                {{--                                <span class="res__men">гость 3</span> не указан<br>--}}
                                {{--                                <span class="res__men">гость 4</span> женщина<br>--}}
                                {{--                                <span class="res__men">гость 5</span> ребёнок (8 лет)<br>--}}
                                {{--                                <span class="res__men">гость 6</span> ребёнок (2 года)<br>--}}
                                {{--                            </div>--}}


                                <div class="reserv  res-1">
                                    {{ $price }} руб. ({{ $days }} ночи)<br>
                                    <span class="reserv__obj">расчетная стоимость</span>
                                </div>

                                <div class="reserv  res-2">
                                    - {{ $payment }} руб.<br>
                                    <span class="reserv__obj">вознаграждение zabroniroval.ru от
				общей суммы проживания</span>
                                </div>
                            </div>
                        </div>

                        <div class="res__inner">
                            <div class="res__client">
                                получить от гостя при заселении
                            </div>
                            <div class="res__much">
                                {{ $price - $payment }} руб.
                            </div>
                        </div>
                        <input type="hidden" name="orderId" value="{{ $orderId }}">
                        <div class="res__inner ress">
                            <div class="res__client mb-5">
                                изменить цену
                                <input type="text" name="price" class="form-control mr-3" style="width: 90%"
                                       value="{{ $price }}">
                            </div>

                            <div class="">
                                <button type="submit"
                                        id="sendForm"
                                        class="reserver">Предложить бронь
                                </button>
                            </div>

                            <div class="mt-2 mt-lg-5">
                                <button id="resetForm" class="reserver cett" href="#">Отказать</button>
                            </div>
                        </div>

                    </form>
                    @endrole
                </div>
            </div>

        </div>
    </div>

@endsection
