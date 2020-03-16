@extends('layouts.app')

@section('content')
{{--    <div class="center">--}}
{{--        <img class="error" src="img/404.png" alt="404">--}}
{{--    </div>--}}





<div style="display: block;width: 400px;display: flex;flex-direction: column;align-items: center;margin:0 auto" id="login" class="animated-modal">
    <div id="login" style=""></div>
    {{--            <div>--}}
    {{--                <div class="modal__inner">--}}
    {{--                    <div class="modal__logo">--}}
    {{--                        <img src="img/logo.png" alt="Logo">--}}
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



@endsection
