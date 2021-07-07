<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <i class="icon-reorder shaded"></i></a><span class="brand" href="index.html">My Product </span>
            <div class="nav-collapse collapse navbar-inverse-collapse">
                <form class="navbar-search pull-left input-append" action="#">
                    <input type="text" class="span3">
                    <button class="btn" type="button">
                        <i class="icon-search"></i>
                    </button>
                </form>
                <ul class="nav pull-right">

                    <li><a href="">Welcome
                            @if(Auth::guard('admin')->check())
                                {{Auth::guard('admin')->user()->name}}
                            @elseif(Auth::guard()->check())
                                {{auth()->user()->name}}
                            @endif
                            !</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </li>


                </ul>
            </div>
            <!-- /.nav-collapse -->
        </div>
    </div>
    <!-- /navbar-inner -->
</div>
