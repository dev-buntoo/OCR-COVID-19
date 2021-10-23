<div class="sidebar-header">
    <div class="logo">
        <a href="index.html"><img src="{{ asset('general/images/logo/logo.png') }}" alt="logo"></a>
    </div>
</div>
<div class="main-menu">
    <div class="menu-inner">
        <nav>
            <ul class="metismenu" id="menu">

                <li class="{{ request()->is('citizen') ? 'active' : '' }}">
                    <a href="{{ route('citizen.home') }}"><i class="ti-dashboard"></i> <span>Home</span></a>
                </li>
            </ul>
        </nav>
    </div>
</div>
