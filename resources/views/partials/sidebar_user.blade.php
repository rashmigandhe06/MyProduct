<div class="sidebar">
    <ul class="widget widget-menu user-menu unstyled">
        <li class="active"><a href="{{route('home')}}"><i class="menu-icon icon-dashboard"></i>Dashboard
            </a></li>
        <li><a href="{{route('profile')}}"><i class="menu-icon icon-bullhorn"></i>My Profile</a>
        </li>
        <li><a href="{{route('user.document')}}"><i class="menu-icon icon-bullhorn"></i>My Documents</a>
        </li>
        <li><a href="{{route('bank.connect')}}"><i class="menu-icon icon-bullhorn"></i>Connect</a>
        </li>
        <li><a href="{{route('bank.account')}}"><i class="menu-icon icon-bullhorn"></i>Accounts</a>
        </li>





    </ul>
    <!--/.widget-nav-->


    <!--/.widget-nav-->
    <ul class="widget widget-menu user-menu unstyled">


        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </ul>
</div>
<!--/.sidebar-->
