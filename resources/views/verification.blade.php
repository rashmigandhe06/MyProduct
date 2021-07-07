@extends('layouts.app')
@section('content')


    @if (session('status'))
        <div class="alert alert-failed">
            Account Varification failed! Please try again.
        </div>
    @endif

    <form method="POST" action="{{ route('user.verify') }}">
        <div class="module-head">
            <h3>User Verification</h3>
        </div>
        @csrf

        <div class="module-body">
            <div class="control-group">
                <div class="controls row-fluid">
                    <input class="span12" id="email" type="email" placeholder="Email"
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
                    <input class="span12" id="verification_code" type="text" placeholder="Verification Code"
                           @error('verification_code') is-invalid @enderror" name="verification_code"
                    value="{{ old('verification_code') }}" required
                    autocomplete="verification_code" autofocus>
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
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </div>
                </div>
            </div>
    </form>

@endsection
