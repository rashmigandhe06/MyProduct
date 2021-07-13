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
    </div>
    <div class="module">
        <div class="profile-head media">
            <a href="#" class="media-avatar pull-left">
                <img src="{{asset($user->image_url)}}">
            </a>
            <div class="media-body">
                <h4>
                    {{$user->name}} {{$user->middle_name}} {{$user->last_name}}
                </h4>

                <p class="profile-brief">

                    <i class="icon-envelope-alt shaded"></i> {{$user->email}}
                    <br>
                    <i class="icon-phone"></i> {{$user->phone_no}}
                </p>
                <div class="profile-details">
                    Address:
                    <address>{!! $user->full_address !!}</address>
                </div>
            </div>
        </div>
    </div>

    <H4>User Document List</H4>
    <div class="module-body table">
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-condensed"
               width="100%">
            <thead>
            <tr>
                <th>Sr.No</th>
                <th>Document Name</th>
                <th>URL</th>
                <th>Note</th>
                <th>Is Verified</th>
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
                    <td>{{$document->document_name}}</td>
                    <td><a href="{{asset($document->pivot->document_url)}}">view {{$document->ext}}</a></td>
                    <td>{{$document->pivot->note}}</td>
                    <td>{{$document->verified}}</td>

                    <td class="center">

                        <div class="margin-val"><a
                                href="{{route('user.document.delete', array("id"=>$document->pivot->id))}}"
                                class="btn btn-xs btn-info">Verify</a></div>
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
                    {!! $userDocuments->links() !!}
                </div>
            </div>
        </div>

    </div>
@endsection
