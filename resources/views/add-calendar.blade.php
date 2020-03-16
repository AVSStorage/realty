@extends('layouts.app')

@section('content')

<!-- characteristic  -->
<div class="characteristic">
    <div class="container">
        <div class="chara__inner">
            <div class="chara__left">
                <div class="chara__title" id="charaTitle">
                    Принимается оплата
                </div>

                <div class="services">
                    <div class="serivce__inner">
                        <div class="service">

                            <label for="price1">наличными</label>
                            <input id="price1" name="value[payment][1]"  type="checkbox">
                        </div>

                        <div class="service">
                            <label for="price2">безналичными</label>
                            <input id="price2" name="value[payment][2]"   type="checkbox">
                        </div>
                    </div>

                    <div class="serivce__inner">
                        <div class="service">
                            <label for="price3"> принимаются к оплате карты</label>
                            <input id="price3" name="value[payment][3]"   type="checkbox">

                        </div>

                        <div class="service">
                            <label for="price4">  отчетные документы</label>
                            <input id="price4" name="value[payment][4]"   type="checkbox">

                        </div>
                    </div>
                </div>


                <div class="chara__title" id="charaTitle">
                    Цены
                </div>

                <div class="chara__km-inner">
                    <div class="attraction__left">
                        <div class="attraction">
                            Цена за сутки*
                        </div>
                        <input class="attraction-km" placeholder="2000 руб." class="attraction-km">



                        <div class="attraction">
                            Включает проживание не более
                        </div>
                        <input class="attraction-km" placeholder="3 гостей" class="attraction-km">

                        <div class="attraction">
                            Заселение после*
                        </div>
                        <input class="attraction-km" placeholder="14:00" class="attraction-km">
                    </div>

                    <div class="attraction__right">
                        <div class="attraction">
                            Доплата за гостя
                        </div>
                        <input class="attraction-km" placeholder="500 руб." class="attraction-km">

                        <div class="attraction">
                            Минимальный срок аренды
                        </div>
                        <input class="attraction-km" placeholder="3 суток" class="attraction-km">

                        <div class="attraction">
                            Выселение до*
                        </div>
                        <input class="attraction-km" placeholder="10:00" class="attraction-km">
                    </div>
                </div>


                <div class="chara__title sub" id="charaAtt">
                    Услуги за дополнительную плату<br>
                    <span class="chara__subtitle-text">
		*если эти услуги уже включены в стоимость или Вы их не предоставляете, просто пропустите
	</span>
                </div>



                <div class="services">
                    <div class="services__inner">
                        <div class="service serv">
                            <label for="service1"> наличными</label>
                            <input id="service1" name="value[service][1]"   type="checkbox">
                        </div>

                        <div class="service serv">
                            <label for="service2">  безналичными</label>
                            <input id="service2" name="value[service][2]"   type="checkbox">

                        </div>
                    </div>

{{--                    <div class="service__inner">--}}
{{--                        <div class="service serv">--}}
{{--                            --}}
{{--                            наличными--}}
{{--                        </div>--}}

{{--                        <div class="service serv">--}}
{{--                            безналичными--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="service__inner">
                        <div class="service serv">
                            <label for="service3">     принимаются к оплате карты</label>
                            <input id="service3" name="value[service][3]"   type="checkbox">

                        </div>

                        <div class="service serv">
                            <label for="service4">отчетные документы</label>
                            <input id="service4" name="value[service][4]"   type="checkbox">

                        </div>
                    </div>
                </div>


                <div class="chara__title" id="charaTitle">
                    Календарь занятости и цены по датам
                </div>





                <div class="slider__items">
                    <div class="slider__calendar">

                        <!-- СЕНТЯБРЬ -->
                        <div class="slider__item">
                            <div class="calendar__month">
                                Сентябрь 2019 года
                            </div>
                            <div class="calendar">
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Пн
                                    </div>
                                    <div class="calendar__date first">
                                        <span class="number">26</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Вт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">27</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Ср
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">28</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Чт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">29</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Пт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">30</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Сб
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">31</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Вс
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">1</span>
                                        <span class="number-day">сентябрь</span>
                                    </div>
                                </div>



                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">2</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">3</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">4</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">5</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">6</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">7</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">8</span>
                                    </div>
                                </div>




                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">9</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">10</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">11</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">12</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">13</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">14</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">15</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>



                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">16</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">17</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">18</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">19</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">20</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">21</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">22</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">23</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">24</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">25</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">26</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">27</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">28</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">29</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">30</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">1</span>
                                        <span class="number-day">октябрь</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">2</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">3</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">4</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">5</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">6</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /СЕНТЯБРЬ -->




                        <!-- ОКТЯБРЬ -->
                        <div class="slider__item">
                            <div class="calendar__month">
                                Октябрь 2019 года
                            </div>
                            <div class="calendar">
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Пн
                                    </div>
                                    <div class="calendar__date first">
                                        <span class="number">31</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Вт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number-day">октябрь</span>
                                        <span class="number">1</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Ср
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">2</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Чт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">3</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Пт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">4</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Сб
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">5</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Вс
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">6</span>
                                    </div>
                                </div>



                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">7</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">8</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">9</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">10</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">11</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">12</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">13</span>
                                    </div>
                                </div>




                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">14</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">15</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">16</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">17</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">18</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">19</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">20</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>



                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">21</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">22</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">23</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">24</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">25</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">26</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">27</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">28</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">29</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">30</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">31</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">1</span>
                                        <span class="number-day">ноябрь</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">2</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">3</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">4</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">5</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">6</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">7</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">8</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">9</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">10</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /ОКТЯБРЬ -->


                        <!-- НОЯБРЬ -->
                        <div class="slider__item">
                            <div class="calendar__month">
                                Ноябрь 2019 года
                            </div>
                            <div class="calendar">
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Пн
                                    </div>
                                    <div class="calendar__date first">
                                        <span class="number">28</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Вт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">29</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Ср
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">30</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Чт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">31</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Пт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number-day">ноябрь</span>
                                        <span class="number">1</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Сб
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">2</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Вс
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">3</span>
                                    </div>
                                </div>



                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">4</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">5</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">6</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">7</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">8</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">9</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">10</span>
                                    </div>
                                </div>




                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">11</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">12</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">13</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">14</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">15</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">16</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">17</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>



                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">18</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">19</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">20</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">21</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">22</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">23</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">24</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">25</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">26</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">27</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">28</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">29</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">30</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number-day">декабрь</span>
                                        <span class="number">1</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">2</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">3</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">4</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">5</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">6</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">7</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">8</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /НРОЯБРЬ -->



                        <!-- ДЕКАБРЬ -->
                        <div class="slider__item">
                            <div class="calendar__month">
                                Декабрь 2019 года
                            </div>
                            <div class="calendar">
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Пн
                                    </div>
                                    <div class="calendar__date first">
                                        <span class="number">25</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Вт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">26</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Ср
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">27</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Чт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">28</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Пт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">29</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Сб
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">30</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Вс
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number-day">декабрь</span>
                                        <span class="number">1</span>
                                    </div>
                                </div>



                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">2</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">3</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">4</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">5</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">6</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">7</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">8</span>
                                    </div>
                                </div>




                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">9</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">10</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">11</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">12</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">13</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">14</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">15</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>



                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">16</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">17</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">18</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">19</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">20</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">21</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">22</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">23</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">24</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">25</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">26</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">27</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">28</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">29</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">30</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">31</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number-day">январь</span>
                                        <span class="number">1</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">2</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">3</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">4</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">5</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /ДЕКАБРЬ -->


                        <!-- ЯНВАРЬ -->
                        <div class="slider__item">
                            <div class="calendar__month">
                                Январь 2020 года
                            </div>
                            <div class="calendar">
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Пн
                                    </div>
                                    <div class="calendar__date first">
                                        <span class="number">30</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Вт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">31</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Ср
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number-day">январь</span>
                                        <span class="number">1</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Чт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">2</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Пт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">3</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Сб
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">4</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Вс
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">5</span>
                                    </div>
                                </div>



                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">6</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">7</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">8</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">9</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">10</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">11</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">12</span>
                                    </div>
                                </div>




                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">13</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">14</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">15</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">16</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">17</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">18</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">19</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>



                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">20</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">21</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">22</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">23</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">24</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">25</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">26</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">27</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">28</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">29</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">30</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">31</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number-day">февраль</span>
                                        <span class="number">1</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">2</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">3</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">4</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">5</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">6</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">7</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">8</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">9</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /ЯНВАРЬ -->



                        <!-- ФЕВРАЛЬ -->
                        <div class="slider__item">
                            <div class="calendar__month">
                                Февраль 2020 года
                            </div>
                            <div class="calendar">
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Пн
                                    </div>
                                    <div class="calendar__date first">
                                        <span class="number">27</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Вт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">28</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Ср
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">29</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Чт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">30</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Пт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">31</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Сб
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number-day">февраль</span>
                                        <span class="number">1</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Вс
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">2</span>
                                    </div>
                                </div>



                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">3</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">4</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">5</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">6</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">7</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">8</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">9</span>
                                    </div>
                                </div>




                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">10</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">11</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">12</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">13</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">14</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">15</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">16</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>



                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">17</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">18</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">19</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">20</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">21</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">22</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">23</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">24</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">25</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">26</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">27</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">28</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">29</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number-day">март</span>
                                        <span class="number">1</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">2</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">3</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">4</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">5</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">6</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">7</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">8</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /ФЕВРАЛЬ -->



                        <!-- МАРТ -->
                        <div class="slider__item">
                            <div class="calendar__month">
                                Март 2020 года
                            </div>
                            <div class="calendar">
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Пн
                                    </div>
                                    <div class="calendar__date first">
                                        <span class="number">24</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Вт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">25</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Ср
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">26</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Чт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">27</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Пт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">28</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Сб
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">29</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Вс
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number-day">март</span>
                                        <span class="number">1</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">2</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">3</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">4</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">5</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">6</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">7</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">8</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">9</span>
                                    </div>
                                </div>




                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">10</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">11</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">12</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">13</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">14</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">15</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">16</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>



                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">17</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">18</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">19</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">20</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">21</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">22</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">23</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">24</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">25</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">26</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">27</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">28</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">29</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">30</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">31</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number-day">апрель</span>
                                        <span class="number">1</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">2</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">3</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">4</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">5</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /МАРТ -->



                        <!-- АПРЕЛЬ -->
                        <div class="slider__item">
                            <div class="calendar__month">
                                Апрель 2020 года
                            </div>
                            <div class="calendar">
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Пн
                                    </div>
                                    <div class="calendar__date first">
                                        <span class="number">30</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Вт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">31</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Ср
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number-day">апрель</span>
                                        <span class="number">1</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Чт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">2</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Пт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">3</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Сб
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">4</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Вс
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">5</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">6</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">7</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">8</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">9</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">10</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">11</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">12</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">13</span>
                                    </div>
                                </div>




                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">14</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">15</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">16</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">17</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">18</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">19</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">20</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>



                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">21</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">22</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">23</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">24</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">25</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">26</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">27</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">28</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">29</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">30</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number-day">май</span>
                                        <span class="number">1</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">2</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">3</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">4</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">5</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">6</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">7</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">8</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">9</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">10</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /АПРЕЛЬ -->




                        <!-- МАЙ -->
                        <div class="slider__item">
                            <div class="calendar__month">
                                Май 2020 года
                            </div>
                            <div class="calendar">
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Пн
                                    </div>
                                    <div class="calendar__date first">
                                        <span class="number">27</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Вт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">28</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Ср
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">29</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Чт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">30</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Пт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number-day">май</span>
                                        <span class="number">1</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Сб
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">2</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Вс
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">3</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">4</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">5</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">6</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">7</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">8</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">9</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">10</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">11</span>
                                    </div>
                                </div>




                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">12</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">13</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">14</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">15</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">16</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">17</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">18</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>



                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">19</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">20</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">21</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">22</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">23</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">24</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">25</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">26</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">27</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">28</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">29</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">30</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">31</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number-day">Июнь</span>
                                        <span class="number">1</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">2</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">3</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">4</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">5</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">6</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">7</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /МАЙ -->





                        <!-- ИЮНЬ -->
                        <div class="slider__item">
                            <div class="calendar__month">
                                Июнь 2020 года
                            </div>
                            <div class="calendar">
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Пн
                                    </div>
                                    <div class="calendar__date first">
                                        <span class="number-day">июнь</span>
                                        <span class="number">1</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Вт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">2</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Ср
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">3</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Чт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">4</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Пт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">5</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Сб
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">6</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Вс
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">7</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">8</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">9</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">10</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">11</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">12</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">13</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">14</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">15</span>
                                    </div>
                                </div>




                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">16</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">17</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">18</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">19</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">20</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">21</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">22</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>



                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">23</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">24</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">25</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">26</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">27</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">28</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">29</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">30</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number-day">июль</span>
                                        <span class="number">1</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">2</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">3</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">4</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">5</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">6</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">7</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">8</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">9</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">10</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">11</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">12</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /ИЮНЬ -->



                        <!-- ИЮЛЬ -->
                        <div class="slider__item">
                            <div class="calendar__month">
                                Июль 2020 года
                            </div>
                            <div class="calendar">
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Пн
                                    </div>
                                    <div class="calendar__date first">
                                        <span class="number">29</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Вт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">30</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Ср
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number-day">июль</span>
                                        <span class="number">1</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Чт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">2</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Пт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">3</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Сб
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">4</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Вс
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">5</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">6</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">7</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">8</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">9</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">10</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">11</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">12</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">13</span>
                                    </div>
                                </div>




                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">14</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">15</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">16</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">17</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">18</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">19</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">20</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>



                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">21</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">22</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">23</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">24</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">25</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">26</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">27</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">28</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">29</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">30</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">31</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number-day">август</span>
                                        <span class="number">1</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">2</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">3</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">4</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">5</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">6</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">7</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">8</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">9</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /ИЮЛЬ -->




                        <!-- АВГУСТ -->
                        <div class="slider__item">
                            <div class="calendar__month">
                                Август 2020 года
                            </div>
                            <div class="calendar">
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Пн
                                    </div>
                                    <div class="calendar__date first">
                                        <span class="number">27</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Вт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">28</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Ср
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">29</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Чт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">30</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Пт
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">31</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Сб
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number-day">август</span>
                                        <span class="number">1</span>
                                    </div>
                                </div>
                                <div class="calendar__item">
                                    <div class="calendar__day">
                                        Вс
                                    </div>
                                    <div class="calendar__date">
                                        <span class="number">2</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">3</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">4</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">5</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">6</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">7</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">8</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">9</span>
                                    </div>
                                </div>
                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">10</span>
                                    </div>
                                </div>




                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">11</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">12</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">13</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">14</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">15</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">16</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">17</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>



                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">18</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">19</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">20</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">21</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">22</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">23</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">24</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">25</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">26</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">27</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">28</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">29</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">30</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date first two">
                                        <span class="number">31</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number-day">сентябрь</span>
                                        <span class="number">1</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>


                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">2</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">3</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">4</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">5</span>
                                        <img class="user" src="img/add/10.png" alt="user">
                                        <span class="user__number">+500</span>
                                        <span class="money">3000 руб.</span>
                                    </div>
                                </div>

                                <div class="calendar__item">

                                    <div class="calendar__date two">
                                        <span class="number">6</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /АВГУСТ -->
                    </div>

                    <button class="btn__yes" type="submit">
                        Далее
                    </button>
                </div>
            </div>










            <div class="chara__right">
                <a href="personal-area.html">
                    <img class="chara__close" src="img/add/4.png" alt="close">
                </a>

                <div class="chara__right-inner">
                    @component('object-panel')
                    @endcomponent

                </div>



                <div class="calendar__right">
                    <div class="calendar__right-inner">
                        <div class="calendar-content">
                            <div class="calendar__right-start">С</div>
                            <div class="calendar__right-input">
                                <input class="calendar__in" placeholder="10.09.2019">
                                <img class="img-calendar" src="img/calendar.png" alt="date">
                            </div>
                        </div>

                        <div class="calendar-content">
                            <div class="calendar__right-start">До</div>
                            <div class="calendar__right-input">
                                <input class="calendar__in put" placeholder="дд.мм.гггг">
                                <img class="img-calendar" src="img/calendar.png" alt="date">
                            </div>
                        </div>

                        <div class="service cal">
                            без конечной даты
                        </div>

                        <div class="calendar__all-day">
                            Применить изменения к дням
                        </div>
                        <div class="calendar__all">
                            <div class="service call">
                                Пн
                            </div>

                            <div class="service call">
                                Вт
                            </div>

                            <div class="service call">
                                Ср
                            </div>

                            <div class="service call">
                                Чт
                            </div>

                            <div class="service call">
                                Пт
                            </div>

                            <div class="service call">
                                Сб
                            </div>

                            <div class="service call">
                                Вс
                            </div>
                        </div>





                    </div>

                </div>

                <div class="calendar__price"> <span class="cost">Цена</span>
                    <input class="calendar__in prices" placeholder="3000">
                    <div class="currency">руб.</div>
                </div>


                <div class="calendar__min-cost">
                    <div class="calendar__right-start min--cost">Минимальный<br>срок проживания
                    </div>
                    <input class="calendar__in prices costt" placeholder="1 сутки">

                    <div class="calendar__right-start">
                        Доплата за гостя
                    </div>
                    <input class="calendar__in prices costt" placeholder="3000">
                    <div class="currency currency--cost">руб.</div>


                    <div class="calendar__min-btn">
                        <div class="calendar__btn-inner">
                            <a href="#" class="button--calendar red">
                                Сбросить
                            </a>
                        </div>

                        <div class="calendar__btn-inner">
                            <a href="#" class="button--calendar green">
                                Сохранить
                            </a>
                        </div>
                    </div>
                </div>
            </div>  <!-- CHARA RIGHT -->
        </div>
    </div>
</div>



    @endsection
