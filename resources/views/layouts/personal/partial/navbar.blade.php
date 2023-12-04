<div class="logo">
    <i class="fa-solid fa-stethoscope"></i>
    B-Doctor
</div>
<ul class="list-unstyled" id="link-list">
    <li class="{{ url()->current() == route('admin.doctor.index') ? 'active' : null }}">
        <a class="text-decoration-none" href="">
            <i class="fa-solid fa-bars"></i>
            <div>Dashboard</div>
        </a>

    </li>
    <li class="">
        <a href="" class="text-decoration-none">
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
<div>

</div>
