@extends('layouts.admin.admin')

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="module-body clearfix">
        <div class="pull-left">

        </div>
        <div class="pull-right"><a href="{{route('document.upload')}}" class="btn btn-success">Upload Document</a></div>
    </div>

    <div class="module-body table">
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-condensed"
               width="100%">
            <thead>
            <tr>
                <th>Sr.No</th>
                <th>Document Name</th>
                <th>URL</th>
                <th>Note</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @php
                @endphp
            @forelse($userDocuments as $document)
                @php
                    $counter = ($document->page - 1) * $document->per_page + 1;
                @endphp
                <tr class="odd gradeX">
                    <td>{{$num++}}</td>
                    <td>{{$document->document_id}}</td>
                    <td>{{$document->url}}</td>
                    <td>{{$document->note}}</td>

                    <td class="center">
                        <div class="margin-val"><a href="{{route('document.edit', array($document))}}" class="btn btn-xs btn-primary">Edit</a></div>
                        <div class="margin-val"><a href="{{route('document.delete', array($document))}}" class="btn btn-xs btn-danger">Delete</a></div>
                    </td>

                </tr>
            @empty
                <tr class="odd gradeX">
                    <td colspan="7">No Documents found</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="module-body">
            <div class="pull-right">
                <div class="d-flex justify-content-center">
                    {!! $documents->links() !!}
                </div>
            </div>
        </div>

    </div>
@endsection
