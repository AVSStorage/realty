<div class="{{ isset($withoutClass) ? '' : "dialog__inner-right" }}">
    <button id="openDashboard" class="btn btn-success d-sm-none" type="button" data-toggle="collapse"  aria-expanded="false" >
        Панель управления
    </button>
    <div class="d-none d-sm-block" id="collapseExample">
    @role('owner')
    <div class="personal__right-btn">
        <img class="img__plus-add" src="{{ asset("img/content/4.png") }}" alt="Add">
        <a class="btn-per-right" href={{ url('/add-type') }}>
            Добавить объект</a>
    </div>

    @endrole

    <div class="personal__right-btn-1 {{ request()->is('dashboard') ? 'active' : '' }}">
        <img class="img__plus-add-1" src="{{ asset("img/content/5.png") }}" alt="Add">
        <a class="btn-per-right-1" href="{{ url('/dashboard') }}">
            Мои сообщения {{ $counter === 0 ? '' : $counter  }}</a>
    </div>
    @role('owner')
    <div class="order orders-1 {{ request()->is('dashboard/guests') ? 'active' : '' }}">
        <a href="{{ url('/dashboard/guests') }}"><img src="{{ asset("img/personal/1.png") }}" alt="Order"> Мои брони и гости</a>
    </div>
    @endrole

    @role('client')
    <div class="order orders-1 {{ request()->is('dashboard/orders') ? 'active' : '' }}">
        <a href="{{ url('/dashboard/orders') }}"><img src="{{ asset("img/personal/1.png") }}" alt="Order"> Мои бронирования</a>
    </div>
    @endrole
    @role('owner')
    <div class="order {{ request()->is('dashboard/objects') ? 'active' : '' }}">
        <a href="{{ url('/dashboard/objects') }}"><img src="/img/personal/1.png" alt="Order"> Мои объекты</a>
    </div>
    @endrole
    <div class="order order-3 {{ request()->is('dashboard/settings') ? 'active' : '' }}">
        <a href="{{ url('/dashboard/settings') }}"><img src="/img/personal/3.png" alt="Order"> Настройка профиля</a>
    </div>
    </div>
</div>
