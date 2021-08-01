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
                <li>
                    <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i>
                        <span>Citizens</span></a>
                    <ul class="collapse">
                        <li><a href="#">Register Citizen</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
