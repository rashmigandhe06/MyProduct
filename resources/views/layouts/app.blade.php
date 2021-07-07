<!DOCTYPE html>
<html lang="en">

@include('partials.head')
<body>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <i class="icon-reorder shaded"></i>
            </a>

            <a class="brand" href="/">
                MyProduct
            </a>

            <div class="nav-collapse collapse navbar-inverse-collapse">

                <ul class="nav pull-right">

                    <li>
                        <a href="{{ route('login') }}">Login</a>
                    </li>

                    <li><a href="{{ route('register') }}">
                            Sign Up
                        </a></li>


                    <li><a href="{{ route('password.request') }}">
                            Forgot your password?
                        </a></li>
                </ul>
            </div><!-- /.nav-collapse -->
        </div>
    </div><!-- /navbar-inner -->
</div><!-- /navbar -->


<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="module span5 offset3">

                @yield('content')

            </div>
        </div>
    </div>
</div><!--/.wrapper-->
<!--/.wrapper-->
@include('partials.footer')
</body>
