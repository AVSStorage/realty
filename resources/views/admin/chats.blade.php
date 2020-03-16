@extends('layouts.app')

@section('content')
    <div  class="container">
        @include('admin/menu')
<div data-messages="{{ isset($messages) ? json_encode($messages) : json_encode([]) }}" id="chatDialog"></div>
    </div>
@endsection
