@extends('layouts.app')
@section('title', $title)
@section('content')
    <div class="search">
        <div class="container">
            <div class="intro__inner">
            {!! $breadCrumbs !!}
                </div>
                <div class="intro__form-inner">
                    <div id="example3" data-region="{{   app('request')->input('region')  }}" data-city="{{   $city   }}" data-from="{{  app('request')->input('dateFrom') }}" data-to="{{  app('request')->input('dateTo')  }}" data-guests="{{app('request')->input('guests')   }}"></div>
                </div>    <!--  intro__form-inner -->
                <div class="under__input">
                    <div class="under__text">Регион, город, место</div>
                    <div class="under__text">Дата заезда</div>
                    <div class="under__text">Дата отъезда</div>
                    <div class="under__text">Количество гостей</div>
                </div>
            </div>
        </div>
        <!-- Content -->
        <div class="content">
            <div class="container">
                <div class="content__inner">


                @if ((count($items) > 0 ))


                        <div id="cardFilters" data-days="{{ $days }}" data-filteredItems="{{ json_encode($items) }}" data-region="{{  $city }}"></div>


                            @else
                                <div style="display: flex;flex-wrap:wrap">
                                <div id="cardFilters" data-region="{{  $city }}"></div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>







@endsection
