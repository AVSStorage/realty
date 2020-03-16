@extends('layouts.app')

@section('content')
    <div data-simplebar class="personal__all">
        <div data-orderId="{{ $orderId }}" data-objectId="{{ $objectId }}" data-userID="{{ $userID }}" data-user="{{ json_encode(Auth::user()) }}" id="chat">

        </div>
    </div>
@endsection
