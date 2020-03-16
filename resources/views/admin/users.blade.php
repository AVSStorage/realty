@extends('layouts.app')

@section('content')
<div  class="container">
    @include('admin/menu')
    <div class="card">

            <div>{{ $user['name'] }}</div>
            <div>{{ $user['surname'] }}</div>
            <div>{{ $user['email'] }}</div>
            <div>{{ $user['phone_number'] }}</div>

    </div>
</div>


@endsection
