<div class="sidebar">
    <ul class="widget widget-menu user-menu unstyled">
        <li class="active"><a href="index.html"><i class="menu-icon icon-dashboard"></i>Dashboard
            </a></li>
        <li><a href="activity.html"><i class="menu-icon icon-bullhorn"></i>News Feed </a>
        </li>
        <li><a href="message.html"><i class="menu-icon icon-inbox"></i>Inbox <b class="label green pull-right">
                    11</b> </a></li>
        <li><a href="task.html"><i class="menu-icon icon-tasks"></i>Tasks <b class="label orange pull-right">
                    19</b> </a></li>
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
