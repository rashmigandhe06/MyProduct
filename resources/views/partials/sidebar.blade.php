<div class="sidebar">
    <ul class="widget widget-menu unstyled">
        <li class="active"><a href="index.html"><i class="menu-icon icon-dashboard"></i>Dashboard
            </a></li>
        <li><a href="{{ route('bank') }}"><i class="menu-icon icon-bullhorn"></i>Banks </a>
        </li>
        <li><a href="{{ route('branch') }}"><i class="menu-icon icon-bullhorn"></i>Branches </a>
        </li>
        <li><a href="{{ route('document') }}"><i class="menu-icon icon-bullhorn"></i>Documents </a>
        </li>


    </ul>
    <!--/.widget-nav-->


    <ul class="widget widget-menu unstyled">
        <li><a href="ui-button-icon.html"><i class="menu-icon icon-bold"></i> Buttons </a></li>
        <li><a href="ui-typography.html"><i class="menu-icon icon-book"></i>Typography </a></li>
        <li><a href="form.html"><i class="menu-icon icon-paste"></i>Forms </a></li>
        <li><a href="table.html"><i class="menu-icon icon-table"></i>Tables </a></li>
        <li><a href="charts.html"><i class="menu-icon icon-bar-chart"></i>Charts </a></li>
    </ul>
    <!--/.widget-nav-->
    <ul class="widget widget-menu unstyled">
        <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">
                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                </i>More Pages </a>
            <ul id="togglePages" class="collapse unstyled">
                <li><a href="other-login.html"><i class="icon-inbox"></i>Login </a></li>
                <li><a href="other-user-profile.html"><i class="icon-inbox"></i>Profile </a></li>
                <li><a href="other-user-listing.html"><i class="icon-inbox"></i>All Users </a></li>
            </ul>
        </li>

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
