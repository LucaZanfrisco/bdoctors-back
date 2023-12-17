<div class="logo">
    <i class="fa-solid fa-stethoscope"></i>
    B-Doctor
</div>
<ul class="list-unstyled" id="link-list">
    <li class="{{ url()->current() == route('admin.doctor.index') ? 'active' : null }}">
        <a class="text-decoration-none" href="{{ route('admin.doctor.index') }}">
            <i class="fa-solid fa-bars"></i>
            <div>Dashboard</div>
        </a>

    </li>
    <li class="{{ url()->current() == route('admin.message.index') ? 'active' : null }}">
        <a href="{{ route('admin.message.index') }}" class="text-decoration-none">
            <i class="fa-solid fa-envelope"></i>
            <div>Messaggi</div>
        </a>
    </li>
    <li class="">
        <a href="" class="text-decoration-none">
            <i class="fa-solid fa-credit-card"></i>
            <div>Sponsor</div>
        </a>
    </li>
</ul>
<div class="logout">
    <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
        <i class="fa-solid fa-door-open"></i>Logout
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>


</div>
