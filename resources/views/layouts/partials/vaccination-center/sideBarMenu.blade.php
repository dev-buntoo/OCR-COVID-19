<div class="sidebar-header">
    <div class="logo">
        <a href="index.html"><img src="{{ asset('general/images/logo/logo.png') }}" alt="logo"></a>
    </div>
</div>
<div class="main-menu">
    <div class="menu-inner">
        <nav>
            <ul class="metismenu" id="menu">

                <li class="{{ request()->is('vaccination-center') ? 'active' : '' }}">
                    <a href="{{ route('vaccination_center.home') }}"><i class="ti-dashboard"></i>
                        <span>Dashboard</span></a>
                </li>
                <li class="{{ request()->is('vaccination-center/citizen_verification') ? 'active' : '' }}">
                    <a href="{{ route('vaccination_center.citizen_verificaiton') }}"><i class="ti-user"></i>
                        <span>Citizen Verification</span></a>
                </li>
            </ul>
        </nav>
    </div>
</div>
