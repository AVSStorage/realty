@extends('layouts.app')

@section('content')


    <!-- characteristic  -->
    <div class="characteristic">
        <div class="container">
            <div class="chara__inner">
                <div class="chara__left">
                    <div class="chara__title" id="charaTitle">
                        Добавьте фото объекта
                    </div>

                    <div class="photo__title">
                        Фото можно менять местами и подписывать
                    </div>

                    <div class="photo">
                        <div class="photo__inner">
                            <div class="photo__item">
                                <a href="#" class="photo__prev">
                                    <img class="photo__img" src="img/add/5.png" alt="Объект">
                                    <div class="photo__text">основное фото</div>
                                    <a href="#"><img class="photo__close" src="img/add/8.png" alt="Закрыть"></a>
                                </a>
                                <input class="photo__input  photos" type="text" placeholder="Гостинная">
                            </div>

                            <div class="photo__item">
                                <a href="#" class="photo__prev">
                                    <img class="photo__img" src="img/add/6.png" alt="Объект">
                                    <div class="photo__text">фото 2</div>
                                    <a href="#"><img class="photo__close" src="img/add/8.png" alt="Закрыть"></a>
                                </a>
                                <input class="photo__input  photos" type="text" placeholder="Кухня">
                            </div>


                            <div class="photo__item">
                                <a href="#" class="photo__prev">
                                    <img class="photo__img" src="img/add/7.png" alt="Объект">
                                    <div class="photo__text text-1">фото 3</div>
                                    <a href="#"><img class="photo__close" src="img/add/8.png" alt="Закрыть"></a>
                                </a>
                                <input class="photo__input" type="text" placeholder="Что на фото">
                            </div>


                            <div class="photo__item">
                                <a href="#" class="photo__prev">
                                    <img class="photo__img" src="img/add/7.png" alt="Объект">
                                    <div class="photo__text text-1">фото 4</div>
                                    <a href="#"><img class="photo__close" src="img/add/8.png" alt="Закрыть"></a>
                                </a>
                                <input class="photo__input" type="text" placeholder="Что на фото?">
                            </div>

                            <div class="photo__item">
                                <a href="#" class="photo__prev">
                                    <img class="photo__img" src="img/add/7.png" alt="Объект">
                                    <div class="photo__text text-1">фото 5</div>
                                    <a href="#"><img class="photo__close" src="img/add/8.png" alt="Закрыть"></a>
                                </a>
                                <input class="photo__input" type="text" placeholder="Что на фото">
                            </div>


                            <div class="photo__item">
                                <a href="#" class="photo__prev">
                                    <img class="photo__img" src="img/add/7.png" alt="Объект">
                                    <div class="photo__text text-1">фото 6</div>
                                    <a href="#"><img class="photo__close" src="img/add/8.png" alt="Закрыть"></a>
                                </a>
                                <input class="photo__input" type="text" placeholder="Что на фото?">
                            </div>


                            <div class="photo__item">
                                <a href="#" class="photo__prev">
                                    <img class="photo__img" src="img/add/7.png" alt="Объект">
                                    <div class="photo__text text-1">фото 7</div>
                                    <a href="#"><img class="photo__close" src="img/add/8.png" alt="Закрыть"></a>
                                </a>
                                <input class="photo__input" type="text" placeholder="Что на фото">
                            </div>


                            <div class="photo__item">
                                <a href="#" class="photo__prev">
                                    <img class="photo__img" src="img/add/7.png" alt="Объект">
                                    <div class="photo__text text-1">фото 8</div>
                                    <a href="#"><img class="photo__close" src="img/add/8.png" alt="Закрыть"></a>
                                </a>
                                <input class="photo__input" type="text" placeholder="Что на фото?">
                            </div>

                            <div class="photo__item">
                                <a href="#" class="photo__prev">
                                    <img class="photo__img" src="img/add/9.png" alt="Объект">
                                    <div class="photo__text text-1">добавить фото</div>
                                    <a href="#"><img class="photo__close" src="img/add/8.png" alt="Закрыть"></a>
                                </a>
                            </div>
                        </div>
                    </div>

                    <button class="photo__btn" type="submit">
                        Сохранить
                    </button>





                </div>

                <div class="chara__right">
                    <a href="personal-area.html">
                        <img class="chara__close" src="img/add/4.png" alt="close">
                    </a>

                    <div class="chara__right-inner">
                        @component('object-panel')
                        @endcomponent

                    </div>
                </div>  <!-- CHARA RIGHT -->
            </div>

        </div>
    </div>
    @endsection
