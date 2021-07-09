@extends('layouts.admin.admin')

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="{{ route('document.update', array($document->id)) }}" class="form-horizontal row-fluid">
        @csrf
        <div class="control-group">
            <label class="control-label" for="document_name">Document Name</label>
            <div class="controls">
                <input class="span8" placeholder="Document Name" id="document_name" type="text"
                       class="form-control @error('document_name') is-invalid @enderror" name="document_name"
                       value="{{ $document->document_name }}" autocomplete="document_name" autofocus>
                @error('document_name')
                <span class="help-inline" role="alert">
                              <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Is Required</label>
            <div class="controls">
                <label class="radio inline">
                    <input type="radio" name="is_required" id="is_required" value="1"  @if($document->is_required==1) checked @endif>
                    Yes
                </label>
                <label class="radio inline">
                    <input type="radio" name="is_required" id="is_required"  value="0"  @if($document->is_required==0) checked @endif>
                    NO
                </label>
                @error('is_required')
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
