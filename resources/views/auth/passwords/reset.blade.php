@extends('layouts.app')
@section('content')

                    <form method="POST" action="{{ route('password.update') }}">
                        <div class="module-head">
                            <h3>Reset Password</h3>
                        </div>
                        @csrf
                        @csrf
                    <div class="module-body">
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="control-group">
                            <div class="controls row-fluid">
                                <input class="span12" id="email" type="email" placeholder="Email Address"
                                       @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}"  required
                                autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls row-fluid">
                                <input class="span12" placeholder="Password" id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls row-fluid">
                                <input class="span12" placeholder="Confirm Password" id="password-confirm"
                                       type="password" class="form-control" name="password_confirmation" required
                                       autocomplete="new-password">
                            </div>
                        </div>

                        <div class="module-foot">
                            <div class="control-group">
                                <div class="controls clearfix">
                                    <button type="submit" class="btn btn-primary pull-right">Reset Password</button>
                                </div>
                            </div>
                        </div>
                    </form>

@endsection
