@extends('layouts.app')

@section('content')

    @isset($url)
        <form method="POST" action='{{ url("register/$url") }}' aria-label="{{ __('Register_User') }}">
            @else
                <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                    @endisset

                    <div class="module-head">
                        <h3>{{ isset($url) ? ucwords($url) : ""}} {{ __('Register') }}</h3>
                    </div>
                    @csrf


                    <div class="module-body">
                        <div class="control-group">
                            <div class="controls row-fluid">
                                <input class="span12" placeholder="First Name" id="name" type="text"
                                       class="form-control @error('name') is-invalid @enderror" name="name"
                                       value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                                 <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                @enderror
                            </div>
                        </div>

                        @isset($url)
                        @else

                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <input class="span12" placeholder="Middle Name" id="middle_name" type="text"
                                           class="form-control @error('middle_name') is-invalid @enderror"
                                           name="middle_name" value="{{ old('middle_name') }}"
                                           autocomplete="middle_name" autofocus>

                                    @error('middle_name')
                                    <span class="invalid-feedback">
                                                 <strong>{{ $message }}</strong>
                                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <input class="span12" placeholder="Last Name" id="last_name" type="text"
                                           class="form-control @error('last_name') is-invalid @enderror"
                                           name="last_name" value="{{ old('last_name') }}" required
                                           autocomplete="last_name" autofocus>

                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                    </span>
                                    @enderror
                                </div>
                            </div>


                        @endisset
                        <div class="control-group">
                            <div class="controls row-fluid">
                                <input class="span12" placeholder="E-mail Address" id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
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

                        @isset($url)
                        @else
                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <input class="span12" placeholder="Country" id="country" type="text"
                                           class="form-control @error('country') is-invalid @enderror" name="country"
                                           value="{{ old('country') }}" required autocomplete="country" autofocus>

                                    @error('country')
                                    <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <input class="span12" placeholder="Phone No" id="phone_no" type="text"
                                           class="form-control @error('phone_no') is-invalid @enderror" name="phone_no"
                                           value="{{ old('phone_no') }}" required autocomplete="phone_no" autofocus>

                                    @error('phone_no')
                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                  </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <input class="span12" placeholder="NI Number" id="ni_number" type="text"
                                           class="form-control @error('ni_number') is-invalid @enderror"
                                           name="ni_number" value="{{ old('ni_number') }}" required
                                           autocomplete="ni_number" autofocus>

                                    @error('ni_number')
                                    <span class="invalid-feedback" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                  </span>
                                    @enderror
                                </div>
                            </div>
                        @endisset

                        <div class="module-foot">
                            <div class="control-group">
                                <div class="controls clearfix">
                                    <button type="submit" class="btn btn-primary pull-right">Register</button>
                                </div>
                            </div>
                        </div>


                </form>


@endsection
