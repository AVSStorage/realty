@extends('layouts.app')

@section('content')


    <div class="dialog">
        <div class="container">
            <div class="dialog__inner">
                <div class="dialog__inner-left">
                    <div class="rev__rev">
                        Настройка профиля
                    </div>
                    {{ Form::open(array('url' => 'dashboard/settings')) }}
                    <div class="setting">
                        <div class="setting__inner">
                            <div class="setting__left">
                                <div class="setting__photo">
                                    <label class="setting__load">
                                        Загрузить своё фото
                                        {{ Form::file('avatar',  array('style'=>'display:none')) }}
{{--                                        <input type="file" class="hidden">--}}
                                    </label>
                                    <a href="#"><img class="img__setting" src="{{ $settings['avatar'] }}" alt="You">
                                </div></a>
                            </div>
                            <div class="setting__right">
                                <div class="setting__info">
                                        <div class="form__inner">
                                            <label>	<span class="initial">ФИО</span>
                                                <img class="icon-2" src="/img/setting/2.png" alt="set">
                                                {{ Form::text('surname', $settings['surname'],['type'=>'text','placeholder' => "Введите фамилию",'class'=>'name','required' ] ) }}
{{--                                                <input class="name" value="{{ $settings['surname'] }}" type="text" placeholder="Введите фамилию">--}}

                                            </label>
                                        </div>

                                        <div class="form__inner">
                                            <label>
                                                {{ Form::text('name', $settings['name'],['type'=>'text','placeholder' => "Введите имя",'class'=>'name','required' ] ) }}
{{--                                                <input class="name" value="{{ $settings['name'] }}" type="text" placeholder="Павел">--}}
                                                <img class="icon-1" src="/img/setting/2.png" alt="set">
                                            </label>
                                        </div>

                                        <div class="form__inner">
                                            <label>
                                                {{ Form::text('patronym', $settings['patronym'],['type'=>'text','placeholder' => "Введите отчество",'class'=>'name name--bottom' ] ) }}
{{--                                                <input value="{{ $settings['patronym'] }}" class="name name--bottom" type="text" placeholder="Введите отчество">--}}
                                                <img class="icon-1" src="/img/setting/2.png" alt="set">
                                            </label>

                                        </div>
                                </div>

                                <div class="setting__info two">
                                    <form>
                                        <div class="form__inner">
                                            <label>	<span class="initial">Ваш телефон</span>
                                                <img class="icon-2" src="/img/setting/2.png" alt="set">
                                                {{ Form::tel('phone_number',$settings['phone_number'],['class'=> "name  name--bottom  name--top", 'placeholder' => "+7 990 123 45 67",'required' ]) }}
{{--                                                <input value="{{ $settings['phone_number'] }}" class="name  name--bottom  name--top" type="text" placeholder="+7 990 123 45 67">--}}
                                            </label>
                                            <div class="setting__service">
                                                <div class="service">
                                                    <label>Viber <input type="checkbox"></label>
                                                </div>
                                                <div class="service  service--active">
                                                    <label>WhatsApp <input type="checkbox"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>



                                <div class="setting__info two">
                                    <form>
                                        <div class="form__inner">
                                            <label>	<span class="initial">Ваш город</span>
                                                <img class="icon-2" src="/img/setting/2.png" alt="set">
                                                {{ Form::text('city',$settings['city'],['class'=> "name  name--bottom  name--top","placeholder" => 'Севастополь']) }}
{{--                                                <input value="{{ $settings['city'] }}" class="name  name--bottom  name--top" type="text" placeholder="Севастополь">--}}
                                            </label>
                                        </div>
                                    </form>
                                </div>


                                <div class="setting__info two">
                                    <form>
                                        <div class="form__inner">
                                            <label>	<span class="initial">Ваш почта</span>
                                                <img class="icon-2" src="/img/setting/2.png" alt="set">
                                                {{ Form::email('email',$settings['email'],['class'=> "name  name--bottom  name--top","placeholder" => 'gostovsky@mail.ru','required']) }}
{{--                                                <input value="{{ $settings['email'] }}" class="name  name--bottom  name--top" type="text" placeholder="gostovsky@mail.ru">--}}
                                            </label>
                                        </div>
                                    </form>
                                </div>

                                <button type="submit" class="setting--btn">
                                    Сохранить
                                </button>





                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

                @include('dashboard/dashboard-panel')
            </div>
        </div>
    </div>
@endsection
