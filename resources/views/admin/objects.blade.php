@extends('layouts.app')

@section('content')
<div  class="container">
    @include('admin/menu')
    <div class="d-flex align-items-end">
        {!! Form::open(array('url' => 'admin/panel/objects') ) !!}

        <div class="form-group mt-3 mr-5">

            {!! Form::label('status','Статус') !!}
            {!! Form::select('status', [
                                                        0 => 'Скрытые',
                                                      1 => 'Новые',
                                                      2 => 'Забронированные'
                                                      ], ['class' => 'form-control', 'placeholder' => 'Владелец ответил клиенту', 'id' => 'status']) !!}

        </div>

        {{Form::submit('Сортировать',['class' => 'fancy__btn mb-3 mr-5'])}}

        {!! Form::close() !!}
        {!! Form::open(array('url' => 'admin/panel/objects') ) !!}
        {{Form::submit('Сбросить',['class' => 'fancy__btn bg-danger mb-3'])}}
        {!! Form::close() !!}
    </div>
    <table  class="table m-auto">
        <tr>
            <td>№</td>
            <td>Адрес</td>
            <td>Дата создания</td>
            <td>Пользователь</td>
            <td>Вдимость</td>
            <td>Даты бронирования</td>
            <td>Предоплата</td>
        </tr>

        @foreach($objects as $object)
            <tr>
                <td>{{ $object->id }}</td>
                <td><a href="{{ url('object/'.$object->id) }}"> {{ $address[$object->id] }}</a></td>
                <td>{{ $object->created_at }}</td>
                <td><a href="{{ route('adminUsers', ['user_id' => $object['user_id']]) }}">{{ $object['name'].' '.$object['surname'] }}</a></td>
                <td>{{ $statuses[$object->status] }}</td>
                <td>{{ date('d.m.Y', strtotime($object['date_from'])).' - '.date('d.m.Y',strtotime($object['date_to'])) }}</td>
                <td>{{ $prepays[$object->prepay] }}</td>
                <td><a href="{{ url('objects/edit/'.$object->id) }}">Редактировать</a></td>
            </tr>
        @endforeach
    </table>
    {!! $objects->links() !!}
</div>

@endsection
