@extends('layouts.app')
@section('content')



    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        <div class="module-head">
            <h3>Reset Password</h3>
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

            <div class="module-foot">
                <div class="control-group">
                    <div class="controls clearfix">
                        <button type="submit" class="btn btn-primary pull-right">Send Password Reset Link</button>
                    </div>
                </div>
            </div>
    </form>

@endsection
