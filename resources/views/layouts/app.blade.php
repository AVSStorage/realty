<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="Ut-A1Eii4T2fkph_DiPFFISR51Cz3J9qmw9KvM15M6c" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}. @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}" defer></script>
    <script src="{{ asset('js/slick.min.js') }}" defer></script>



    <script type="text/javascript" src="{{ asset('js/jquery.suggestions.min.js') }}" ></script>

{{--    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFxOzkscVS8iafJEM-VieLvWk577X0OMA&libraries=places"></script>--}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <meta name="auth" content="{{ Auth::check() }}">

    <script>
        var csrf_token = '<?php echo csrf_token(); ?>';
    </script>
</head>
<body>
<!-- Header -->
<header class="header">
	<div class="container container-index">
		<div class="header__inner">
		<nav class="navbar navbar-expand-md navbar-light w-100">
  <div class="row w-100">
  <div class="col-3 d-flex justify-content-end d-md-none">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  </div>
  <div class="col-8 col-md-3 col-lg-3 d-flex ml-3 ml-sm-0 justify-content-center">

  <a href="{{ route('index') }}" class="header__logo">
				<img src="{{ asset('img/logo.png') }}" alt="Zabroniroval">
			</a>
			<div class="header__search ml-2">
				<img src="{{ asset('img/search.png') }}" alt="Search">
			</div>
			</div>


     @guest
  <div class="collapse navbar-collapse col-md-9 col-lg-9" id="navbarSupportedContent">

		<div class="nav mt-2 mt-sm-0 w-100">
			<a href="{{ url('add-type') }}" class="nav__link col-sm-12 col-md-5 text-md-center text-lg-left col-lg-4 col-xl-3 mb-0">Сдать свой объект</a>
{{--			<a href="client-area-reserv.html" class="nav__link col-sm-12 col-md-5 col-lg-4 text-md-center  text-lg-left col-xl-3 mb-0">Мои бронирования</a>--}}
			<a href="#" class="nav__link col-sm-12 col-md col-xl  align-items-center d-md-none d-lg-flex">
				<img class="nav__img" src="{{ asset('img/heart.png') }}" alt="Heart">Избранное</a>
			<a href="{{ url('comparsion') }}" class="nav__link col-sm-12 col-md-4  align-items-center d-md-none d-lg-flex  mt-lg-2 mt-xl-0 col-xl">
				<img class="nav__img" src="{{ asset('img/house.png') }}" alt="House">Сравнение</a>
			<a data-fancybox data-animation-duration="800" data-src="#change" href="javascript:;" href="#" class="nav__link  nav__link--btn col-sm-2 col-lg-4 col-xl mt-lg-2 mt-xl-0">Войти</a>
		</div>

  </div>
  @endguest

   @role('admin')
            <a href="{{ url('admin/panel') }}" class="nav__link">Панель управления</a>
      <a class="nav__link nav__link--btn col-sm-2 col-lg-4 col-xl mt-lg-2 mt-xl-0" href="{{ url("logout") }}">Выйти</a>
            @endrole
            @role("client")


 <div class="collapse navbar-collapse col-md-9 col-lg-9" id="navbarSupportedContent">
              <div class="nav mt-2 mt-sm-0 w-100 d-flex justify-content-end">
                  @endrole
                  @role("owner")
                  <div class="collapse navbar-collapse col-md-9 col-lg-9" id="navbarSupportedContent">
                      <div class="nav mt-2 mt-sm-0 w-100">
              	<a href="{{ url('add-type') }}" class="nav__link col-sm-12 col-md-5 text-md-center text-lg-left col-lg-4 col-xl-3 mb-0">Сдать свой объект</a>
                  <a href="{{ url('dashboard') }}" class="nav__link col-sm-12 col-md col-xl  align-items-center d-md-none d-lg-flex">
                      <img class="nav__img" src="{{ asset('img/content/1.png') }}" alt="Heart">Сообщения <span class="nav__number"> 3</span></a>
                  <a href="{{ url('comparsion') }}" class="nav__link col-sm-12 col-md-4  align-items-center d-md-none d-lg-flex  mt-lg-2 mt-xl-0 col-xl">
                      <img class="nav__img" src="{{ asset('img/content/2.png') }}" alt="House">Помощь</a>

                  <a class="nav__link nav__link--btn col-sm-2 col-lg-4 col-xl mt-lg-2 mt-xl-0 " href="{{ url("logout") }}">Выйти</a>


              </div>
                  @endrole
                  @role("client")
			<a href="{{ url('dashboard') }}" class="nav__link col-sm-12 col-md  col-lg-3 justify-content-lg-end  align-items-center d-md-none d-lg-flex">
				<img class="nav__img" src="{{ asset('img/content/1.png') }}" alt="Heart">Сообщения <span class="nav__number ml-2"> 3</span></a>
			<a href="{{ url('comparsion') }}" class="nav__link col-sm-12 col-md-4 col-lg-3 justify-content-lg-end align-items-center d-md-none d-lg-flex  mt-lg-2 mt-xl-0">
				<img class="nav__img" src="{{ asset('img/content/2.png') }}" alt="House">Помощь</a>

			 <a class="nav__link nav__link--btn col-sm-2 col-lg-3 mt-lg-2 d-flex justify-content-lg-end mt-xl-0" href="{{ url("logout") }}">Выйти</a>


                </div>
            @endrole
  </div>
</nav>





		</div>
	</div>
</header>
<!-- /Header -->
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>


        <!-- Footer -->
        <div class="footer">
            <div class="container">
                <div class="footer__inner">
                    <div class="footer__left">
                        <img class="footer__white-logo" src="{{ asset("img/white-logo.png") }}" alt="Logo">
                        <div class="footer__text">Бронирование домов, квартир, отелей<br>Работает с 2006 года</div>
                        <div class="footer__phone">+7 990 123 45 67</div>
                    </div>
                    <div class="footer__center">
                        <div class="footer__center-title">Популярное</div>
                        <a href="" class="footer__link">Помощь</a>
                        <a href="" class="footer__link">Отзывы о zabroniroval.ru</a>
                        <a href="" class="footer__link">Блог</a>
                    </div>
                    <div class="footer__center">
                        <div class="footer__center-title">Арендовали</div>
                        <a href="" class="footer__link">Как начать сдавать жилье</a>
                        <a href="" class="footer__link">Разместить объявление</a>
                        <a href="" class="footer__link">Помощь</a>
                    </div>
                    <div class="footer__right">
                        <div class="footer__center-title">Гостям</div>
                        <a href="" class="footer__link">Как бронировать жилье</a>
                        <a href="" class="footer__link">Гарантия заселения</a>
                        <a href="" class="footer__link">Отзывы гостей</a>
                    </div>
                </div>

                <div class="footer__item">
                    <div class="footer__card">
                        <img src="{{ asset("img/card/1.png")}}" alt="Card" class="card__item">
                        <img src="{{ asset("img/card/2.png") }}" alt="Card" class="card__item">
                        <img src="{{ asset("img/card/3.png") }}" alt="Card" class="card__item">
                        <img src="{{ asset("img/card/4.png")}}" alt="Card" class="card__item">
                        <img src="{{ asset("img/card/5.png")}}" alt="Card" class="card__item">
                        <img src="{{ asset("img/card/6.png")}}" alt="Card" class="card__item">
                        <img src="{{ asset("img/card/7.png")}}" alt="Card" class="card__item">
                    </div>
                    <div class="footer__social">
                        <a href="#"><img src="{{ asset("img/social/1.png")}}" alt="Social" class="footer__soc-item"></a>
                        <a href="#"><img src="{{ asset("img/social/2.png")}}" alt="Social" class="footer__soc-item"></a>
                        <a href="#"><img src="{{ asset("img/social/3.png")}}" alt="Social" class="footer__soc-item"></a>
                        <a href="#"><img src="{{ asset("img/social/4.png") }}" alt="Social" class="footer__soc-item"></a>
                    </div>
                </div>
                <div class="footer__copyright">
                    <div class="copyright">© 2006 - 2019 zabroniroval.ru</div>
                    <div class="copyright__goverment">
                        <a href="#" class="copyright__user">Пользовательское соглашение<a>
                                <a target="_blank" href="about.html" class="copyright__gov">Политика обработки персональных данных</a>
                    </div>
                    <div class="copyright__search">
                        <label>
                            <img class="search__footer-item" src="{{ asset("img/white-search.png") }}" alt="Search">
                            <input class="search__footer" type="text" placeholder="Поиск по сайту">

                        </label>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Footer -->















        <div style="display: none;" id="animatedModal" class="animated-modal animated-small">
            <div>
                <div class="modal__inner">
                    <div class="modal__logo">
                        <img src="{{ asset("img/logo.png") }}" alt="Logo">
                    </div>
                </div>
                <div class="modal__title">
                    Укажите Ваши контакты
                </div>
                {!! Form::model( \Auth::user(), array('route' => array('register','type' => 2),  'method' => 'post')) !!}

                <div class="modal__form">
                    <div class="form__modal-inner">
                        <div class="form__box-modal">
                <label>
                    <span class="fancy__span">Укажите Ваше имя</span>
                    {!! Form::text('name', '', ['class' => 'fancy', 'placeholder' => 'Ваше имя']) !!}
{{--                    <input class="fancy" type="text" placeholder="Ваше имя">--}}
                </label>
                            <label>
                                <span class="fancy__span">Укажите Ваш телефон</span>
                                {!! Form::text('phone_number', '', ['class' => 'fancy fancy__text', 'placeholder' => '7', 'pattern' => "^(7)(\(\d{3}\)|\d{3})\d{7}$"]) !!}
{{--                                <input class="fancy fancy__text" type="text" placeholder="+7">--}}
                                <img src="img/flag/1.png" alt="Flag" class="flag">
                            </label>
                            <label>
                                <span class="fancy__span">Укажите Вашу почту</span>
                                {!! Form::text('email', '', ['class' => 'fancy', 'placeholder' => 'Ваша почта']) !!}
{{--                                <input class="fancy" type="text" placeholder="Ваша почта">--}}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    {{Form::submit('Продолжить как клиент',['class' => 'fancy__btn mb-3'])}}
                    {{Form::submit('Продолжить как владелец',['class' => 'fancy__btn', 'formaction' => '/register?type=1'])}}
{{--                    <a href="client-area.html" class="fancy__btn">Продолжить</a>--}}
                </div>
                <div class="fancy__remember d-flex">
                <label class="d-flex align-items-center"><input type="checkbox" class="col-2"  checked required>
                    <span class="col-10 ml-2">Я согласен на обработку <span class="span__remember">персональных данных</span> и
                    принимаю условия <span class="span__remember">пользовательского соглашения</span></span></label>

                </div>

                {!! Form::close() !!}
{{--                <form>--}}
{{--                    <div class="modal__form">--}}
{{--                        <div class="form__modal-inner">--}}
{{--                            <div class="form__box-modal">--}}
{{--                                <label>--}}
{{--                                    <span class="fancy__span">Укажите Ваше имя</span>--}}
{{--                                    <input class="fancy" type="text" placeholder="Ваше имя">--}}
{{--                                </label>--}}
{{--                                <label>--}}
{{--                                    <span class="fancy__span">Укажите Ваш телефон</span>--}}
{{--                                    <input class="fancy fancy__text" type="text" placeholder="+7">--}}
{{--                                    <img src="img/flag/1.png" alt="Flag" class="flag">--}}
{{--                                </label>--}}
{{--                                <label>--}}
{{--                                    <span class="fancy__span">Укажите Вашу почту</span>--}}
{{--                                    <input class="fancy" type="text" placeholder="Ваша почта">--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--                <div class="text-center">--}}
{{--                    <a href="client-area.html" class="fancy__btn">Продолжить</a>--}}
{{--                </div>--}}

            </div>
        </div>

        <div style="display: none;" id="login" class="animated-modal">
            <div id="login"></div>
{{--            <div>--}}
{{--                <div class="modal__inner">--}}
{{--                    <div class="modal__logo">--}}
{{--                        <img  src="{{ asset("img/logo.png")}}" alt="Logo">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="modal__title">--}}
{{--                    Укажите Ваши контакты--}}
{{--                </div>--}}
{{--                {!! Form::model( \Auth::user(), array('route' => array('login'))) !!}--}}
{{--                <div class="modal__form">--}}
{{--                    <div class="form__modal-inner">--}}
{{--                        <div class="form__box-modal">--}}
{{--                            <label>--}}
{{--                                <span class="fancy__span">Укажите Вашу почту</span>--}}
{{--                                {!! Form::text('email', '', ['class' => 'fancy', 'placeholder' => 'Ваша почта']) !!}--}}
{{--                                --}}{{--                                <input class="fancy" type="text" placeholder="Ваша почта">--}}
{{--                            </label>--}}
{{--                            <label>--}}
{{--                                <span class="fancy__span">Укажите Ваш пароль</span>--}}
{{--                                {!! Form::password('password', ['class' => 'fancy', 'placeholder' => 'Ваш пароль']) !!}--}}
{{--                                --}}{{--                                <input class="fancy fancy__text" type="text" placeholder="+7">--}}
{{--                            </label>--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                            <div class="form-check">--}}
{{--                                <input class="form-check-input" type="checkbox" style="width: 70px;height:30px;" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                <label class="form-check-label" for="remember">--}}
{{--                                    <span class="fancy__span">Запомнить меня</span>--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="text-center">--}}
{{--                    {{Form::submit('Войти',['class' => 'fancy__btn'])}}--}}
{{--                    --}}{{--                    <a href="client-area.html" class="fancy__btn">Продолжить</a>--}}
{{--                </div>--}}
{{--                <div class="fancy__remember">--}}
{{--                    Я согласен на обработку <span class="span__remember">персональных данных</span> и<br>--}}
{{--                    принимаю условия <span class="span__remember">пользовательского соглашения</span>--}}

{{--                </div>--}}

{{--                {!! Form::close() !!}--}}

            </div>
        </div>



        <div style="display: none;" id="change" class="changes">
            <div class="change">
                <div class="change__inner">
                    <img src="{{ asset("img/logo.png")}}" alt="Zabroniroval">

                    <a style="display:block" data-fancybox data-animation-duration="800" data-src="#login" href="javascript:;" href="#" class="change__client">Вход</a>
                    <div class="reg">
                        <a data-fancybox data-animation-duration="800" data-src="#animatedModal" href="javascript:;" href="#" class="change__client">Регистрация</a>
{{--                        <button style="background-color: transparent;border:none" id="registrate" class="change__client"> Регистрация </button>--}}
                    </div>
{{--                    <div class="change__reg">--}}
{{--                    --}}
{{--                        <a data-fancybox data-animation-duration="800" data-src="#owner" href="javascript:;" href="#" class="change__main">Владелец</a>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>



        <div style="display: none;" id="owner" class="owner">
            <div class="owner__inner">
                {!! Form::model( \Auth::user(), array('route' => array('register','type' => 2))) !!}
                <input type="hidden" name="type" value="2">
                <div class="owner__center">
                    <img class="owner__img"  src="{{ asset("img/logo.png")}}" alt="Zabroniroval">
                </div>
                <div class="owner__reg">

                    <div class="owner__left">
                        <div class="owner__left-inner">
                            <div class="owner__left-title">
                                Личные данные
                            </div>
                            <span class="owner__span">укажите Ваше имя</span>
                            {!! Form::text('name', '', ['class' => 'owner__input', 'placeholder' => 'Ваше имя']) !!}
{{--                            <input placeholder="Ваше имя" class="owner__input">--}}

                            <span class="owner__span">укажите Вашу фамилию</span>
                            {!! Form::text('surname', '', ['class' => 'owner__input', 'placeholder' => 'Ваша фамилия']) !!}
{{--                            <input placeholder="Ваше фамилия" class="owner__input">--}}

                            <span class="owner__span backed">укажите Ваше пол</span>
                            {!! Form::select('sex', [
                             0 => 'Мужской',
                              1 => 'Женский'
                            ], ['class' => 'owner__input', 'placeholder' => 'Пол']) !!}
{{--                            <input placeholder="Пол" class="owner__input">--}}
                            <span class="owner__span backed">укажите Вашу почту</span>
                            {!! Form::text('email', '', ['class' => 'owner__input', 'placeholder' => 'E-mal']) !!}
                        </div>
                    </div>
                    <div class="owner__center-block">
                        <div class="owner__center-inner">
                            <div class="owner__left-title">
                                Укажите Ваш город
                            </div>
                            <img src="img/flag/1.png" alt="Russia" class="flaged">
                            <span class="owner__span country-span">страна</span>
                            {!! Form::text('country', '', ['class' => 'owner__input', 'placeholder' => 'Страна', 'id' => 'registerCountry']) !!}
{{--                            <input placeholder="Выбрать" class="owner__input">--}}



                            <div>
                            <span class="owner__span backed">регион</span>
                            {!! Form::text('region', '', ['class' => 'owner__input', 'placeholder' => 'Регион','id' => 'registerRegion']) !!}
{{--                            <input placeholder="Выбрать" class="owner__input">--}}
                            </div>
                            <div>
                            <span class="owner__span backed">город</span>
                            {!! Form::text('city', '', ['class' => 'owner__input', 'placeholder' => 'Город','id' => 'registerCity']) !!}
                            </div>
{{--                            <input placeholder="Выбрать" class="owner__input">--}}
                        </div>
                    </div>
                    <div class="owner__right">
                        <div class="owner__left-title">
                            Какими языками владеете?
                        </div>
                        <div class="owner__right-inner">
                            <div class="owner__service">
                                <div class="service  service--active">
                                    <label for="language_1">Русский</label>
                                    <input id="language_1" type="checkbox" name="language[]">
                                </div>

                                <div class="service">
                                    <label for="language_2">Китайский</label>
                                    <input id="language_2" type="checkbox" name="language[]">
                                </div>
                            </div>


                            <div class="owner__service">
                                <div class="service  service--active">

                                    <label for="language_3">Украинский</label>
                                    <input id="language_3" type="checkbox" name="language[]">
                                </div>

                                <div class="service">
                                    <label for="language_4">Французкий</label>
                                    <input id="language_4" type="checkbox" name="language[]">

                                </div>
                            </div>

                            <div class="owner__service">

                                <div class="service">

                                    <label for="language_5">Беларусский</label>
                                    <input id="language_5" type="checkbox" name="language[]">
                                </div>

                                <div class="service service--active own">
                                    Немецкий
                                </div>
                            </div>


                            <div class="owner__service">

                                <div class="service">

                                    <label for="language_6">Английский</label>
                                    <input id="language_6" type="checkbox" name="language[]">
                                </div>

                                <div class="service own">
                                    <label for="language_7"> Язык жестов</label>
                                    <input id="language_7" type="checkbox" name="language[]">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="text-center top-owner">
                    {{Form::submit('Сохранить',['class' => 'fancy__btn'])}}
{{--                    <a href="personal-area.html" class="fancy__btn"></a>--}}
                </div>
                    <label class="d-flex align-items-center"><input type="checkbox" checked>
                    <span class="col-10 ml-2">Я согласен на обработку <span class="span__remember">персональных данных</span> и
                    принимаю условия <span class="span__remember">пользовательского соглашения</span></span></label>

                </div>


            </div>
            {!! Form::close() !!}
        </div>

    </div>
</div>

    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/jquery.fancybox.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/simplebar.min.js') }}" ></script>

<script>
{{--    $.getScript( "{{ asset('js/jquery.suggestions.min.js') }}" )--}}
{{--        .done(function( script, textStatus ) {--}}

{{--            var token = "c8fe4da91233a966a1de7bec8aa178dbfb662d87";--}}

{{--            var serviceUrl="https://suggestions.dadata.ru/suggestions/api/4_1/rs";--}}
{{--            var type  = "ADDRESS";--}}
{{--            var $region = $("#registerRegion");--}}
{{--            var $city   = $("#registerCity");--}}

{{--            function join(arr /*, separator */) {--}}
{{--                var separator = arguments.length > 1 ? arguments[1] : ", ";--}}
{{--                return arr.filter(function(n){return n}).join(separator);--}}
{{--            }--}}

{{--            function regionToString(address) {--}}
{{--                return join([--}}
{{--                    join([address.region_type, address.region], " "),--}}
{{--                    join([address.area_type, address.area], " "),--}}
{{--                ]);--}}
{{--            }--}}

{{--            function cityToString(address) {--}}
{{--                return join([--}}
{{--                    join([address.city_type, address.city], " "),--}}
{{--                    join([address.settlement_type, address.settlement], " ")--}}
{{--                ]);--}}
{{--            }--}}



{{--// регион и район--}}
{{--            $region.suggestions({--}}
{{--                serviceUrl: serviceUrl,--}}
{{--                token: token,--}}
{{--                type: type,--}}
{{--                hint: false,--}}
{{--                bounds: "region-area"--}}
{{--            });--}}

{{--// город и населенный пункт--}}
{{--            $city.suggestions({--}}
{{--                serviceUrl: serviceUrl,--}}
{{--                token: token,--}}
{{--                type: type,--}}
{{--                hint: false,--}}
{{--                bounds: "city-settlement",--}}
{{--                constraints: $region--}}
{{--            });--}}

{{--            $city.suggestions().getGeoLocation()--}}
{{--                .done(function(locationData) {--}}
{{--                    var sgt = {--}}
{{--                        value: null,--}}
{{--                        date: locationData--}}
{{--                    };--}}
{{--                    $region.suggestions().setSuggestion(sgt);--}}
{{--                    $region.val(regionToString(locationData));--}}
{{--                    $city.suggestions().setSuggestion(sgt);--}}
{{--                    $city.val(cityToString(locationData));--}}
{{--                });--}}


{{--            //your remaining code--}}
{{--        })--}}
{{--        .fail(function( jqxhr, settings, exception ) {--}}
{{--            //script fail warning if you want it--}}
{{--        });--}}

</script>
<!-- РАЗВОРАЧИВАЮЩИЙСЯ СПИСОК -->

<script>
    $('#resetForm').click(function(evt){
        evt.preventDefault();
        $(this).parents('form').trigger("reset");
        let orderId = $('#orderId').html();

        $.ajax({
            url: '/orders/'+ orderId + '/update/status',
            type: 'post',
            data: JSON.stringify({status: 3}),
            contentType:'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {

            }
        });
        window.location.href = '/dashboard';
    });


    function openbox(box) {
        display = document.getElementById('box').style.display;
        if(display == "none" ) {
            document.getElementById('box').style.display = "block";
        } else {
            document.getElementById('box').style.display = "none";
        }
    }

    $('#registrate').click(function(){
        $('.change__reg').toggle();
    })
</script>

<script>
    function openmap(map) {
        display = document.getElementById('map').style.display;
        if(display == "none" ) {
            document.getElementById('map').style.display = "block";
        } else {
            document.getElementById('map').style.display = "none";
        }
    }
</script>

<script>
    function openreviews(reviews) {
        display = document.getElementById('reviews').style.display;
        if(display == "none" ) {
            document.getElementById('reviews').style.display = "block";
        } else {
            document.getElementById('reviews').style.display = "none";
        }
    }
</script>

<!-- РАЗВОРАЧИВАЮЩИЙСЯ СПИСОК -->
<script>
    function openinfo(inform) {
        display = document.getElementById('inform').style.display;
        if(display == "none" ) {
            document.getElementById('inform').style.display = "block";
        } else {
            document.getElementById('inform').style.display = "none";
        }
    }

    $('#openDashboard').click(function () {

        $(this).parent().find('#collapseExample').toggleClass('d-none')
    })

    $(".big").on('click', function(evt) {
        evt.stopPropagation();
        let image = $(this);
    $.fancybox.open([
        {src: image.parent().find('.main__photo').attr('src')}
    ])
    })
</script>

</body>
</html>
