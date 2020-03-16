<ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/panel') ? 'active' : '' }}"  href="{{ url('admin/panel') }}" >Заказы</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/panel/objects') ? 'active' : '' }}" href="{{ url('admin/panel/objects') }}">Объекты</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/panel/chats') ? 'active' : '' }}" href="{{ url('admin/panel/chats') }}">Контакты</a>
    </li>
</ul>
