<!DOCTYPE html>
<html lang="en">
@include('partials.head')

<body>
@include('partials.top_navbar')
<!-- /navbar -->
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="span3">
                @include('partials.sidebar')
            </div>
            <!--/.span3-->
            <div class="span9">
                <div class="content">

                    <div class="module">

                        <div class="module-body">
                            @yield('content')
                        </div>
                    </div><!--/.module-->
                </div><!--/.content-->
            </div><!--/.span9-->

        </div>
    </div>
    <!--/.container-->
</div>
<!--/.wrapper-->
@include('partials.footer')

</body>
