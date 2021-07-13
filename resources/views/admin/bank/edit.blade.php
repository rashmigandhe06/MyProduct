@extends('layouts.admin.admin')

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('bank.update', array($bank->id)) }}" class="form-horizontal row-fluid">
        @csrf
        <div class="control-group">
            <label class="control-label" for="bank_name">Bank Name</label>
            <div class="controls">
                <input class="span8" placeholder="Bank Name" id="bank_name" type="text"
                       class="form-control @error('bank_name') is-invalid @enderror" name="bank_name"
                       value="{{ $bank->bank_name }}" autocomplete="bank_name" autofocus required>
                @error('bank_name')
                <span class="help-inline" role="alert">
                              <strong class="text-danger">{{ $message }}</strong>
                            </span>
                @enderror
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="bank_code">Bank Code</label>
            <div class="controls">
                <input class="span8" placeholder="Bank Code" id="bank_code" type="text"
                       class="form-control @error('bank_code') is-invalid @enderror" name="bank_code"
                       value="{{ $bank->bank_code }}" required autocomplete="bank_code" autofocus>

                @error('bank_code')
                <span class="help-inline" role="alert">
                                  <strong class="text-danger">{{ $message }}</strong>
                                </span>
                @enderror
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="address_line1">Address Line 1</label>
            <div class="controls">
                <input class="span8" placeholder="Address Line 1" id="address_line1" type="text"
                       class="form-control @error('address_line1') is-invalid @enderror" name="address_line1"
                       value="{{ $bank->address_line1 }}" autocomplete="address_line1" autofocus>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="address_line2">Address Line 2</label>
            <div class="controls">
                <input class="span8" placeholder="Address Line 2" id="address_line2" type="text"
                       class="form-control @error('address_line2') is-invalid @enderror" name="address_line2"
                       value="{{ $bank->address_line2 }}" autocomplete="address_line2" autofocus>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="city">City</label>
            <div class="controls">
                <input class="span8" placeholder="City" id="city" type="text"
                       class="form-control @error('city') is-invalid @enderror" name="city"
                       value="{{ $bank->city }}" autocomplete="city" autofocus>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="country">Country</label>
            <div class="controls">
                <select required autocomplete="country" name="country" class="span8" id="country">
                    <option value="">Select Country</option>
                    @foreach($countries as $country_code => $county)
                        <option value="{{$country_code}}"
                                @if($bank->country==$country_code) selected @endif >{{$county}}</option>
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
                <input class="span8" placeholder="PostCode" id="postcode" type="text"
                       class="form-control @error('postcode') is-invalid @enderror" name="postcode"
                       value="{{ $bank->postcode }}" autocomplete="postcode" autofocus>

            </div>
        </div>


        <div class="control-group">
            <div class="controls">
                <button type="submit" class="btn btn-primary pull-right">Update</button>
            </div>
        </div>
    </form>

@endsection
