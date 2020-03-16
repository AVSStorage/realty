@extends('layouts.app')

@section('content')

    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{route('home')}}">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        @for($i = 0; $i <= count(Request::segments()); $i++)
            <li>
                <a href="">{{Request::segment($i)}}</a>
                @if($i < count(Request::segments()) & $i > 0)
                    {!!'<i class="fa fa-angle-right"></i>'!!}
                @endif
            </li>
        @endfor
    </ul>
    <div class="comparison">
        <div class="container">
            <div class="crop__title"><a href="index.html"><span class="crop__span">Главная</span> </a> › <span class="crop__active"> 		Сравнение</span>
            </div>
            <div class="rev__rev">
                Сравнение<span class="rev__num"> 4</span>
            </div>
            <div class="comparison__inner">
                <div class="comparison__col-1">
                    <div class="service">
                        Только отличия
                    </div>
                    <div class="comparison__service  priced">
                        Стоимость
                    </div>

                    <div class="comparison__service">
                        Адрес
                    </div>

                    <div class="comparison__service serviced">
                        Рейтинг
                    </div>

                    <div class="comparison__service">
                        Можно с детьми
                    </div>

                    <div class="comparison__service">
                        Можно с животными
                    </div>

                    <div class="comparison__service">
                        Трансфер
                    </div>

                    <div class="comparison__service">
                        Курение
                    </div>

                    <div class="comparison__service">
                        Другой параметр
                    </div>

                    <div class="comparison__service">
                        Беспроводной интернет<br>
                        Wi-Fi
                    </div>
                </div>

                <div class="comparison__col-2">
                    <div class="comparison__item">
                        <img src="img/choice/1.png" alt="Номер" class="comparison__img">
                        <img class="photo__close" src="img/add/8.png" alt="X">
                    </div>
                    <div class="comparison__title">
                        1-комнатная квартира -<br>
                        24 м²
                    </div>
                    <div class="comparison__price  border">
                        10 000 руб.  <span class="comparison-span">10 суток</span> <br>
                        1 000 руб. <span class="comparison-span"> сутки</span>
                    </div>
                    <div class="comparison__street border">
                        Ялта, ул. Киевская, д. 27
                    </div>
                    <div class="comparison__ratting">
                        <div class="star">
                            <img src="img/star/2.png" alt="ratting"></div>
                        <div class="comparison__rat border">94 отзыва</div>
                    </div>
                    <div class="comparison__yes border">
                        Да
                    </div>

                    <div class="comparison__yes border">
                        Да
                    </div>

                    <div class="comparison__yes border">
                        Да
                    </div>

                    <div class="comparison__yes no border">
                        Нет
                    </div>

                    <div class="comparison__yes dont border">
                        Не указано
                    </div>

                    <div class="comparison__yes no border">
                        Нет
                    </div>

                </div>

                <div class="comparison__col-3">
                    <div class="comparison__item">
                        <img src="img/choice/2.png" alt="Номер" class="comparison__img">
                        <img class="photo__close" src="img/add/8.png" alt="X">
                    </div>
                    <div class="comparison__title">
                        2-комнатная квартира -<br>
                        38 м²
                    </div>
                    <div class="comparison__price  border">
                        20 000 руб.  <span class="comparison-span">10 суток</span> <br>
                        2 000 руб. <span class="comparison-span"> сутки</span>
                    </div>
                    <div class="comparison__street border">
                        Ялта, ул. Дражиснского, д. 50
                    </div>
                    <div class="comparison__ratting">
                        <div class="star">
                            <img src="img/star/2.png" alt="ratting"></div>
                        <div class="comparison__rat border">71 отзыв</div>
                    </div>

                    <div class="comparison__yes no border">
                        Нет
                    </div>

                    <div class="comparison__yes border">
                        Да
                    </div>

                    <div class="comparison__yes border">
                        Да
                    </div>

                    <div class="comparison__yes border">
                        Да
                    </div>

                    <div class="comparison__yes dont border">
                        Не указано
                    </div>

                    <div class="comparison__yes border">
                        Да
                    </div>
                </div>
                <div class="comparison__col-4">
                    <div class="comparison__item">
                        <img src="img/choice/3.png" alt="Номер" class="comparison__img">
                        <img class="photo__close" src="img/add/8.png" alt="X">
                    </div>
                    <div class="comparison__title">
                        1-комнатная квартира -<br>
                        22 м²
                    </div>
                    <div class="comparison__price  border">
                        25 000 руб.  <span class="comparison-span">10 суток</span> <br>
                        2 500 руб. <span class="comparison-span"> сутки</span>
                    </div>
                    <div class="comparison__street border">
                        Ялта, ул. Сосновая, д. 22
                    </div>
                    <div class="comparison__ratting">
                        <div class="star">
                            <img src="img/star/1.png" alt="ratting"></div>
                        <div class="comparison__rat border">64 отзыва</div>
                    </div>
                    <div class="comparison__yes border">
                        Да
                    </div>

                    <div class="comparison__yes no border">
                        Нет
                    </div>

                    <div class="comparison__yes border">
                        Да
                    </div>

                    <div class="comparison__yes no border">
                        Нет
                    </div>

                    <div class="comparison__yes dont border">
                        Не указано
                    </div>

                    <div class="comparison__yes border">
                        Да
                    </div>
                </div>
                <div class="comparison__col-5">
                    <div class="comparison__item">
                        <img src="img/choice/4.png" alt="Номер" class="comparison__img">
                        <img class="photo__close" src="img/add/8.png" alt="X">
                    </div>
                    <div class="comparison__title">
                        3-комнатная квартира -<br>
                        85 м²
                    </div>
                    <div class="comparison__price  border">
                        30 000 руб.  <span class="comparison-span">10 суток</span> <br>
                        3 000 руб. <span class="comparison-span"> сутки</span>
                    </div>
                    <div class="comparison__street border">
                        Ялта, ул. Свердлова, д. 14
                    </div>
                    <div class="comparison__ratting">
                        <div class="star">
                            <img src="img/star/2.png" alt="ratting"></div>
                        <div class="comparison__rat border">52 отзыва</div>
                    </div>
                    <div class="comparison__yes border">
                        Да
                    </div>

                    <div class="comparison__yes border">
                        Да
                    </div>

                    <div class="comparison__yes border">
                        Да
                    </div>

                    <div class="comparison__yes no border">
                        Нет
                    </div>

                    <div class="comparison__yes dont border">
                        Не указано
                    </div>

                    <div class="comparison__yes border">
                        Да
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
