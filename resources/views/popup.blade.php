<div style="display: none;" id="animatModal" class="animated-modal">
    <div class="animat">
        <div class="animat__inner">
            <div class="animat__left ">

                <div class="preloader hidden">

                <div class="blobs m-auto">
                    <div class="blob-center"></div>
                    <div class="blob"></div>
                    <div class="blob"></div>
                    <div class="blob"></div>
                    <div class="blob"></div>
                    <div class="blob"></div>
                    <div class="blob"></div>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
                    <defs>
                        <filter id="goo">
                            <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur"/>
                            <feColorMatrix in="blur" mode="matrix"
                                           values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo"/>
                            <feBlend in="SourceGraphic" in2="goo"/>
                        </filter>
                    </defs>
                </svg>
            </div>
                <div class="animat__slider">

                    @if (!empty($photos))
                        @foreach ($photos as $photo)

                            <div>
                            <div class="animat__photo">


                                @if(($photo['path'] !== '') && file_exists($photo['path'].'.'.$photo['extension']))

                                <img src="{{ asset( $photo['path'].'.'.$photo['extension']) }}" width="700" height="360"
                                     alt="Room" class="main__photo">
                                @else
                                    <img src="{{ asset( $photo['name']) }}" width="700" height="360"
                                         alt="Room" class="main__photo">
                                @endif
                                <img src="{{ asset("img/photo/1.png") }}" alt="water-item" class="watter-item">

                            </div>
                            <div class="main__room animat__room">
                                {{ $photo['description'] }}
                            </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="animat__photos">
                    @if (!empty($photos))
                        @foreach (array_slice($photos,0, 6) as $photo)
                            <div class="slider">
                                <div class="photo" style="padding:0;margin:0;margin-left:5px;margin-right: 5px">
                                    <img src="{{ asset($photo['name']) }}" width="100" height="100" alt="Room"
                                         class="main__photo">
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="animat__right">
                <div data-simplebar class="animat--block">
                    @foreach ($description as $key => $items)

                        @foreach( $items as $itemKey => $itemValue)

                            <div class="service   service--active-dec">
                                {{ $itemValue['name'] }}
                            </div>

                        @endforeach
                    @endforeach
                </div>

                <div class="animat__flex">
                    <div class="animat__service">
                        Чистота
                    </div>
                    <div class="animat__span">
                        <img src="{{ asset("img/photo/6.png") }}" alt="ratting">5.0
                    </div>
                </div>

                <div class="animat__flex">
                    <div class="animat__service">
                        Цена-качество
                    </div>
                    <div class="animat__span">
                        <img src="{{ asset("img/photo/6.png") }}" alt="ratting">5.0
                    </div>
                </div>

                <div class="animat__flex">
                    <div class="animat__service">
                        Соответствите фото
                    </div>
                    <div class="animat__span">
                        <img src="{{ asset("img/photo/6.png") }}" alt="ratting">5.0
                    </div>
                </div>

                <div class="animat__flex">
                    <div class="animat__service">
                        Обслуживание
                    </div>
                    <div class="animat__span">
                        <img src="{{ asset("img/photo/6.png") }}" alt="ratting">5.0
                    </div>
                </div>

                <div class="animat__flex">
                    <div class="animat__service">
                        Расположение
                    </div>
                    <div class="animat__span">
                        <img src="{{ asset("img/photo/6.png") }}" alt="ratting">5.0
                    </div>
                </div>

                <div class="animat__flex">
                    <div class="animat__service">
                        Комфорт
                    </div>
                    <div class="animat__span">
                        <img src="{{ asset("img/photo/6.png") }}" alt="ratting">5.0
                    </div>
                </div>

            </div>

        </div>


    </div>
</div>
