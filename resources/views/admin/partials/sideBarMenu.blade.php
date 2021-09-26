<div class="sidebar-header">
    <div class="logo">
        <a href="index.html"><img src="{{ asset('general/images/logo/logo.png') }}" alt="logo"></a>
    </div>
</div>
<div class="main-menu">
    <div class="menu-inner">
        <nav>
            <ul class="metismenu" id="menu">

                <li class="{{ (request()->is('admin')) ? 'active' : '' }}">
                    <a href="{{ route('admin.home') }}"><i class="ti-dashboard"></i> <span>Dashboard</span></a>
                </li>
                <li class="{{ (request()->is('admin/citizens*')) ? 'active' : '' }}">
                    <a href="{{ route('admin.citizens.index') }}"><i class="ti-user"></i> <span>Citizens</span></a>
                </li>
                <li class="{{ (request()->is('admin/cities*')) ? 'active' : '' }}">
                    <a href="{{ route('admin.cities.index') }}"><i class="ti-user"></i> <span>Cities</span></a>
                </li>
                <li class="{{ (request()->is('admin/vaccination_centers*')) ? 'active' : '' }}">
                    <a href="{{ route('admin.vaccination_centers.index') }}"><i class="ti-building"></i> <span>Vaccination Center</span></a>
                </li>
            </ul>
        </nav>
    </div>
</div>
