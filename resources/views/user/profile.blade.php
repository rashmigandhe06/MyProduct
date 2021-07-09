@extends('layouts.user')


@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" class="form-horizontal row-fluid" enctype="multipart/form-data">
        @csrf
        <div class="control-group">
            <label class="control-label" for="name">Username</label>
            <div class="controls"><div style="margin: 7px"><b>{{$details->email}}</b></div>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="name">First Name</label>
            <div class="controls">
                <input class="span8" placeholder="First Name" id="name" type="text"
                       class="form-control @error('name') is-invalid @enderror" name="name"
                       value="{{ $details->name }}" autocomplete="name" autofocus required>
                @error('name')
                <span class="help-inline" role="alert">
                              <strong class="text-danger">{{ $message }}</strong>
                            </span>
                @enderror
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="middle_name">Middle Name</label>
            <div class="controls">
                <input class="span8" placeholder="Middle Name" id="middle_name" type="text"
                       class="form-control @error('middle_name') is-invalid @enderror" name="middle_name"
                       value="{{ $details->middle_name }}" autocomplete="middle_name" autofocus required>
                @error('middle_name')
                <span class="help-inline" role="alert">
                              <strong class="text-danger">{{ $message }}</strong>
                            </span>
                @enderror
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="last_name">Last Name</label>
            <div class="controls">
                <input class="span8" placeholder="Last Name" id="last_name" type="text"
                       class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                       value="{{ $details->last_name }}" autocomplete="last_name" autofocus required>
                @error('last_name')
                <span class="help-inline" role="alert">
                              <strong class="text-danger">{{ $message }}</strong>
                            </span>
                @enderror
            </div>
        </div>


        <div class="control-group">
            <label class="control-label" for="phone_no">Phone No</label>
            <div class="controls">
                <input class="span8" placeholder="Phone No." id="phone_no" type="text"
                       class="form-control @error('phone_no') is-invalid @enderror" name="phone_no"
                       value="{{ $details->phone_no }}" autocomplete="phone_no" autofocus required>
                @error('phone_no')
                <span class="help-inline" role="alert">
                              <strong class="text-danger">{{ $message }}</strong>
                            </span>
                @enderror
            </div>
        </div>

        @if($details->image_url!="")
        <div class="control-group">
            <label class="control-label" for="phone_no">CurrentImage</label>

            <div class="controls">
                <img src="{{asset($details->image_url)}}" style="width:200px">
            </div>
        </div>
        @endif

        <div class="control-group">
            <label class="control-label" for="phone_no">Image</label>

            <div class="controls">
                <input class="span8" id="image_url" type="file"
                       class="form-control @error('image_url') is-invalid @enderror" name="image_url"
                       value="{{ $details->image_url }}" autocomplete="image_url" autofocus>

            </div>
        </div>


        <div class="control-group">
            <label class="control-label" for="address_line1">Address Line 1</label>
            <div class="controls">
                <input class="span8" placeholder="Address Line 1" id="address_line1" type="text"
                       class="form-control @error('address_line1') is-invalid @enderror" name="address_line1"
                       value="{{ $details->address_line1 }}" autocomplete="address_line1" autofocus required>
                @error('address_line1')
                <span class="help-inline" role="alert">
                              <strong class="text-danger">{{ $message }}</strong>
                            </span>
                @enderror
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="address_line2">Address Line 2</label>
            <div class="controls">
                <input class="span8" placeholder="Address Line 2" id="address_line2" type="text"
                       class="form-control @error('address_line2') is-invalid @enderror" name="address_line2"
                       value="{{ $details->address_line2 }}" autocomplete="address_line2" autofocus required>
                @error('address_line2')
                <span class="help-inline" role="alert">
                              <strong class="text-danger">{{ $message }}</strong>
                            </span>
                @enderror
            </div>
        </div>


        <div class="control-group">
            <label class="control-label" for="city">City</label>
            <div class="controls">
                <input class="span8" placeholder="City" id="city" type="text"
                       class="form-control @error('city') is-invalid @enderror" name="city"
                       value="{{ $details->city }}" autocomplete="city" autofocus required>
                @error('city')
                <span class="help-inline" role="alert">
                              <strong class="text-danger">{{ $message }}</strong>
                            </span>
                @enderror
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="country">Country</label>
            <div class="controls">
                <select required autocomplete="country" name="country" class="span8" id="country" required>
                    <option value="">Select Country</option>
                    @foreach($countries as $country_code => $county)
                        <option value="{{$country_code}}"
                                @if($details->country==$country_code) selected @endif >{{$county}}</option>
                    @endforeach
                </select>

                @error('country')
                <span class="help-inline" role="alert">
                                 <strong class="text-danger">{{ $message }}</strong>
                               </span>
                @enderror
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="postcode">Postcode</label>
            <div class="controls">
                <input class="span8" placeholder="Postcode" id="city" type="text"
                       class="form-control @error('postcode') is-invalid @enderror" name="postcode"
                       value="{{ $details->postcode }}" autocomplete="postcode" autofocus required>
                @error('postcode')
                <span class="help-inline" role="alert">
                              <strong class="text-danger">{{ $message }}</strong>
                            </span>
                @enderror
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="ni_number">NI Number</label>
            <div class="controls">
                <input class="span8" placeholder="NI Number"" id="ni_number" type="text"
                       class="form-control @error('ni_number') is-invalid @enderror" name="ni_number"
                       value="{{ $details->ni_number }}" autocomplete="ni_number" autofocus required>
                @error('ni_number')
                <span class="help-inline" role="alert">
                              <strong class="text-danger">{{ $message }}</strong>
                            </span>
                @enderror
            </div>
        </div>



        <div class="control-group">
            <div class="controls">
                <button type="submit" class="btn btn-primary pull-right">Update</button>
            </div>
        </div>
    </form>
@endsection
