@extends('layouts.app')

@section('content')


    <div class="dialog">
        <div class="container">
            <div class="dialog__inner">
                <div class="dialog__inner-left">
                    <div class="rev__inner">
                        <div class="rev__inner-left">
                            <div class="rev__rev">
                                Мои сообщения
                                @if(isset($error))
                                @else
                                    <span class="rev__num"> {{ $counter  }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="rev__inner-right">
                            <div class="rev__inner-reviews  new">
                                новые сообщения
                            </div>
                            <div class="rev__inner-reviews">
                                все сообщения
                            </div>
                        </div>
                    </div>

                    @if(isset($error))
                        <div class="alert alert-danger">{{ $error }}</div>
                    @else
                        <div data-messages="{{ isset($messages) ? json_encode($messages) : json_encode([]) }}" id="chatDialog"></div>
                    @endif

                </div>

                @include('dashboard/dashboard-panel')
            </div>
        </div>
    </div>
@endsection
