@extends('layouts.app')

@section('content')


    <div class="dialog">
        <div class="container">
            <div class="dialog__inner">
                <div class="dialog__inner-left">
                    @isset($counter)
                    <div class="rev__inner">
                        <div class="rev__inner-left">
                            <div class="rev__rev">
                                Мои сообщения
                                @if(isset($error))
                                    @else
                                    @if (isset($messagesCount))
                                        <span class="rev__num"> {{ $messagesCount }}</span>
                                        @else

                                <span class="rev__num"> {{ $counter }}</span>

                                        @endif
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
                    @endisset

                    @if(isset($error))
                        <div class="alert alert-danger">{{ $error }}</div>
                        @else
                    <div data-messages="{{ isset($messages) ? json_encode($messages) : json_encode([]) }}" id="chatDialog"></div>
                        @endif

                </div>
                @isset($counter)
             @include('dashboard/dashboard-panel')
                @endisset
            </div>
        </div>
    </div>
@endsection
