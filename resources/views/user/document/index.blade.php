@extends('layouts.user')


@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif


    <div class="module-body clearfix">
        <div class="pull-left">

        </div>
        <div class="pull-right"><a href="{{route('user.document.create')}}" class="btn btn-success">Upload Document</a></div>
    </div>

    <div class="module-body table">
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-condensed"
               width="100%">
            <thead>
            <tr>
                <th>Document Name</th>
                <th>URL</th>
                <th>Note</th>
                <th>Is Verified</th>
               <th>Action</th>
            </tr>
            </thead>
            <tbody>

            @forelse($userDocuments as $document)
                @php

                @endphp
                <tr class="odd gradeX">

                    <td>{{$document->document_name}}</td>
                    <td><a href="{{asset($document->pivot->document_url)}}">view {{$document->ext}}</a></td>
                    <td>{{$document->pivot->note}}</td>
                    <td>{{$document->verified}}</td>

                <td class="center">
                        <div class="margin-val"><a href="{{route('user.document.edit', array("id"=>$document->pivot->id))}}" class="btn btn-xs btn-primary">Edit</a></div>
                        <div class="margin-val"><a href="{{route('user.document.delete', array("id"=>$document->pivot->id))}}" class="btn btn-xs btn-danger">Delete</a></div>
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

                </div>
            </div>
        </div>

    </div>
@endsection

