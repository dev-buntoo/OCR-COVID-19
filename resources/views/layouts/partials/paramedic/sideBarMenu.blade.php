<div class="sidebar-header">
    <div class="logo">
        <a href="index.html"><img src="{{ asset('general/images/logo/logo.png') }}" alt="logo"></a>
    </div>
</div>
<div class="main-menu">
    <div class="menu-inner">
        <nav>
            <ul class="metismenu" id="menu">

                <li class="{{ request()->is('paramedic') ? 'active' : '' }}">
                    <a href="{{ route('paramedic.home') }}"><i class="ti-dashboard"></i>
                        <span>Dashboard</span></a>
                </li>
                <li class="{{ request()->is('paramedic/vaccinating') ? 'active' : '' }}">
                    <a href="{{ route('paramedic.vaccinating') }}"><i class="ti-user"></i>
                        <span>Vaccinating By You</span></a>
                </li>
                <li class="{{ request()->is('paramedic/vaccinated') ? 'active' : '' }}">
                    <a href="{{ route('paramedic.vaccinated') }}"><i class="ti-user"></i>
                        <span>Vaccinated By You</span></a>
                </li>
            </ul>
        </nav>
    </div>
</div>
