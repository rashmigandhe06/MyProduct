@extends('layouts.app')
@section('content')

    @if(session()->has('status'))
        @if(session('status') =="admin_login_failed")
            <div class="alert alert-failed">
                Invalid Login details!
            </div>
        @else
            <div class="alert alert-success">
                Verified successfully! You can login now to access your account.
            </div>
        @endif


    @endif

    @isset($url)
        <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
            @else
                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @endisset


                    <div class="module-head">
                        <h3>{{ isset($url) ? ucwords($url) : ""}} {{ __('Login') }}</h3>
                    </div>

                    @csrf


                    <div class="module-body">
                        <div class="control-group">
                            <div class="controls row-fluid">
                                <input class="span12" id="email" type="email" placeholder="Username"
                                       @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required
                                autocomplete="email" autofocus>
                            </div>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                        @enderror

                        <div class="control-group">
                            <div class="controls row-fluid">
                                <input class="span12" id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password" required
                                       autocomplete="current-password" placeholder="Password">
                            </div>
                        </div>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
            </span>
                        @enderror
                    </div>


                    <div class="module-foot">
                        <div class="control-group">
                            <div class="controls clearfix">
                                <button type="submit" class="btn btn-primary pull-right">Login</button>
                                <label class="checkbox">
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    Remember me
                                </label>
                            </div>
                        </div>
                    </div>


                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>
                    @endif


                </form>

@endsection
