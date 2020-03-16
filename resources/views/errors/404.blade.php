@extends('layouts.app')

@section('content')
<div class="center">
    <img class="error" src="img/404.png" alt="404">
</div>


<div class="error__text">
    К сожелению, такой страницы больше не существует<br>
    или неправильно набран адресс
</div>


<div class="btn__center">
    <a href="{{ route('index') }}" class="error__btn">
        Вернуться на главную
    </a>
</div>
@endsection


















