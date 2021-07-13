@extends('layouts.user')


@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('user.document.store') }}" class="form-horizontal row-fluid"
          enctype="multipart/form-data">
        @csrf

        <div class="control-group">
            <label class="control-label" for="document_id">Select Document</label>
            <div class="controls">
                <select autocomplete="document_id" name="document_id" class="span8" id="document_id">
                    <option value="">Select Document</option>
                    @foreach($documents as $document)
                        <option value="{{$document->id}}"
                        >{{$document->document_name}}</option>
                    @endforeach
                </select>

                @error('document_id')
                <span class="help-inline" role="alert">
                                 <strong class="text-danger">{{ $message }}</strong>
                               </span>
                @enderror
            </div>
        </div>


        <div class="control-group">
            <label class="control-label" for="document_url">Document</label>

            <div class="controls">
                <input class="span8" id="document_url" type="file"
                       class="form-control @error('document_url') is-invalid @enderror" name="document_url"
                       value="" autocomplete="document_url" autofocus>
            </div>
        </div>


        <div class="control-group">
            <label class="control-label" for="note">Note</label>
            <div class="controls">
                <input class="span8" placeholder="Note" id="note" type="text"
                       class="form-control @error('note') is-invalid @enderror" name="note"
                       value="" autocomplete="document_note" autofocus>
                @error('note')
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


