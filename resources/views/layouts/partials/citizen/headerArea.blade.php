<div class="row align-items-center">
    <!-- nav and search button -->
    <div class="col-md-6 col-sm-8 clearfix">
        <div class="nav-btn pull-left">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- profile info & task notification -->
    <div class="col-md-6 col-sm-4 clearfix">
        <ul class="notification-area pull-right">
            <li class="dropdown">
                <h6 class="dropdown-toggle" data-toggle="dropdown">
                    {{ Auth::user()->citizen ? Auth::user()->citizen->name : null }}
                    <i class="fa fa-angle-down"></i>
                </h6>
                <div class="dropdown-menu">
                    {{-- <a class="dropdown-item" href="#">Message</a>
                        <a class="dropdown-item" href="#">Settings</a> --}}
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>
