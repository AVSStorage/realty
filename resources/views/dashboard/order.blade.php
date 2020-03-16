@extends('layouts.app')

@section('content')

    <div class="dialog">
        <div class="container">
            <div class="dialog__inner">
                <div class="dialog__inner-left">
                    <div class="rev__inner">
                        <div class="rev__inner-left">
                            <div class="rev__rev">
                                Мои бронирования <span class="rev__num">{{ count($objects) }}<span>
                            </div>
                        </div>
                        <div class="rev__inner-right">
                            <div class="rev__inner-reviews  new">
                                предстоящие поездки
                            </div>
                            <div class="rev__inner-reviews">
                                завершенные поезди
                            </div>
                        </div>
                    </div>
                    @isset($error)
                        <div class="alert alert-danger">{{ $error }}</div>
                        @endisset

                    @foreach($objects as $object)
                        <div class="attention">
                            <div class="attention__inner">
                                <div class="attention__left">
                                    <img src="/img/dialog/1.png" alt="Summer">
                                </div>
                                <div class="attention__right">
                                    <div class="perosnal__left-rev">
                                        <img src="/img/content/3.png" alt="Person" class="personal__photo">
                                        <div class="personal__name"><span class="personal__hotel">{{ $object['address'] }}</span>
                                            {{ $object['userInfo']['name'] }}.
                                            @if ($object['userInfo']['phone_number'] !== '')
                                            Контактный телефон <span class="personal__tel">{{ $object['userInfo']['phone_number'] }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="personal__rev-only">
                                        <div class="attetion__footer-text-2">
                                            Внесена предоплата <span class="attetion__span-footer">30 000 руб.</span><br>
                                            При заселении <span class="attetion__span-footer">250 000 руб.</span>
                                        </div>
                                        <div class="center">
                                            <a href="#" class="attention__footer-btn-3">
                                                Скачать ваучер на заселение
                                            </a>
                                        </div>
                                    </div>
                                    <div class="attention__footer-inner">
                                        <div class="attention__footer-right">
                                            <img src="/img/personal/1.png" width="30" alt="Good">
                                        </div>
                                        <div class="attention__footer-left-1">
                                            <div class="attention__footer-text-inner">
                                                <div class="attetion__footer-text-1">
                                                    <span class="attetion-green">Забронировано</span><br>
                                                    с {{ $object['date_from'] }} по {{ $object['date_to'] }}
                                                </div>
                                                <div class="attetion__footer-text-2">
                                                    <a class="attention__footer-btn" href="#">
                                                        Перейти к диалогу
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach



            </div>
                @include('dashboard/dashboard-panel')
        </div>

    </div>

@endsection
