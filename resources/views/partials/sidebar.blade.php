<div class="sidebar">
    <ul class="widget widget-menu unstyled">
        <li class="active"><a href="index.html"><i class="menu-icon icon-dashboard"></i>Dashboard
        </a></li>
        <li><a href="{{ route('user') }}"><i class="menu-icon icon-bullhorn"></i>Users </a>
        </li>
        <li><a href="{{ route('bank') }}"><i class="menu-icon icon-bullhorn"></i>Banks </a>
        </li>
        <li><a href="{{ route('branch') }}"><i class="menu-icon icon-bullhorn"></i>Branches </a>
        </li>
        <li><a href="{{ route('document') }}"><i class="menu-icon icon-bullhorn"></i>Documents </a>
        </li>


    </ul>
    <!--/.widget-nav-->


    <!--/.widget-nav-->
    <ul class="widget widget-menu unstyled">


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
