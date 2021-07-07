@extends('layouts.admin.admin')

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="{{ route('branch.store') }}" class="form-horizontal row-fluid">
        @csrf

        <div class="control-group">
            <label class="control-label" for="bank_id">Bank Name {{$bank_id}}</label>
            <div class="controls">
                <select required autocomplete="bank_id" name="bank_id" class="span8" id="bank_id">
                    <option value="">Select Bank </option>
                    @foreach($banks as $bank)
                        <option value="{{$bank->id}}"    @if($bank->id==$bank_id) selected   @endif >{{$bank->bank_name}}</option>
                    @endforeach
                </select>

                @error('bank_id')
                <span class="help-inline" role="alert">
                                 <strong class="text-danger">{{ $message }}</strong>
                               </span>
                @enderror
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="branch_code">Branch Code</label>
            <div class="controls">
                <input class="span8" placeholder="Branch Code" id="branch_code" type="text"
                       class="form-control @error('branch_code') is-invalid @enderror" name="branch_code"
                       value="{{ old('branch_code') }}" required autocomplete="branch_code" autofocus>

                @error('branch_code')
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
                       value="{{ old('address_line1') }}" required autocomplete="address_line1" autofocus>

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
                       value="{{ old('address_line2') }}" required autocomplete="address_line2" autofocus>

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
                       value="{{ old('city') }}" required autocomplete="city" autofocus>

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
                <select required autocomplete="country" name="country" class="span8" id="country">
                    <option value="">Select Country</option>
                    @foreach($countries as $country_code => $county)
                        <option value="{{$country_code}}">{{$county}}</option>
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
                       value="{{ old('postcode') }}" required autocomplete="postcode" autofocus>

                @error('postcode')
                <span class="help-inline" role="alert">
                                     <strong class="text-danger">{{ $message }}</strong>
                                   </span>
                @enderror
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
                <button type="submit" class="btn btn-primary pull-right">Create</button>
            </div>
        </div>
    </form>

@endsection
