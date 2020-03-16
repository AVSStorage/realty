@extends('layouts.app')

@section('content')

    <div class="container">
        @include('admin/menu')
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                <div class="d-flex align-items-end">
  {!! Form::open(array('url' => 'admin/panel?sortBy=status') ) !!}

         <div class="form-group mt-3 mr-5">

             {!! Form::label('status','Статус') !!}
           {!! Form::select('status', [
                                                    0 => 'Не забронировано',
                                                     1 => 'Клиент отправил запрос владельцу',
                                                     2 => 'Получена предоплата',
                                                     3 => 'Забронировано'
                                                   ], ['class' => 'form-control', 'placeholder' => 'Владелец ответил клиенту', 'id' => 'status']) !!}

         </div>

            {{Form::submit('Сортировать',['class' => 'fancy__btn mb-3'])}}

                  {!! Form::close() !!}
                   {!! Form::open(array('url' => 'admin/panel') ) !!}
                       {{Form::submit('Сбросить',['class' => 'fancy__btn bg-danger mb-3'])}}
                       {!! Form::close() !!}
                </div>
<table  class="table m-auto ">
    <tr>
        <td>№</td>
        <td>Статус</td>
        <td>Забронировано от</td>
        <td>Забронировано до</td>
        <td>Пользователь</td>
        <td>Номер телефона</td>
        <td>Дата создания бронирования</td>
        <td>Дата изменения статуса</td>
    </tr>
    @foreach($orders as $order)

        <tr>
            <td>{{$order->id}}</td>
            @if ($order->status === 0)
                 <td>{{'Не забронировано'}}</td>
            @elseif ($order->status === 1)
              <td>{{'Клиент отправил запрос владельцу'}}</td>
              @elseif ($order->status === 2)
               <td>{{'Получена предоплата'}}</td>
                 @elseif ($order->status === 3)
                         <td>{{'Забронировано'}}</td>
            @endif

            <td>{{$order->date_from}}</td>
            <td>{{$order->date_to}}</td>
            <td>{{$order->name.' '.$order->surname}}</td>
            <td>{{$order->phone_number}}</td>
            <td>{{$order->created_at}}</td>
             <td>{{$order->updated_at}}</td>
        </tr>
        @endforeach
</table>

{!! $orders->render() !!}
            </div>



    </div>
    </div>
@endsection
