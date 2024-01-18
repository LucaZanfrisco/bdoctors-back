<div class="logo">
    <i class="fa-solid fa-stethoscope"></i>
    <span class="d-none d-lg-block">B-Doctor</span>
</div>
<ul class="list-unstyled" id="link-list">
    <li class="{{ url()->current() == route('admin.doctor.index') ? 'active' : null }}">
        <a class="text-decoration-none" href="{{ route('admin.doctor.index') }}">
            <i class="fa-solid fa-bars"></i>
            <div class="d-none d-lg-block">Dashboard</div>
        </a>

    </li>
    <li class="{{ url()->current() == route('admin.message.index') ? 'active' : null }}">
        <a href="{{ route('admin.message.index') }}" class="text-decoration-none">
            <i class="fa-solid fa-envelope"></i>
            <div class="d-none d-lg-block">Messaggi</div>
        </a>
    </li>
    <li class="{{ url()->current() == route('admin.sponsorship.index') ? 'active' : null }}">
        <a href="{{ route('admin.sponsorship.index') }}" class="text-decoration-none">
            <i class="fa-solid fa-credit-card"></i>
            <div class="d-none d-lg-block">Sponsor</div>
        </a>
    </li>
</ul>
<div class="logout">
    <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
        <i class="fa-solid fa-door-open"></i>
        <span class="d-none d-lg-inline">Logout</span>
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>


</div>
