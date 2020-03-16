@extends('layouts.app')

@section('content')
    <div class="dialog">
        <div class="container">
            <a href="{{ url()->previous() }}" class="btn btn-success">Назад</a>
            <div  class="chara__title"> {{ $address }}</div>
    <div id="calendar" data-big="1" data-range="{{ json_encode($occupation) }}"></div>
        </div>
    </div>

@endsection
