@extends('layouts.admin.admin')

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="module-body clearfix">
        <div class="pull-left">
            <form action="{{route('user')}}" method="GET">

                <div class="control-group">
                    <div class="controls">
                        <input class="span2" placeholder="Search" id="search" type="text"
                               class="form-control" name="search" autofocus>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="module-body table">
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-condensed"
               width="100%">
            <thead>
            <tr>
                <th>Sr.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>View</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @php

                @endphp
            @forelse($users as $user)
                @php
                    $counter = ($user->page - 1) * $user->per_page + 1;
                @endphp
                <tr class="odd gradeX">
                    <td>{{$num++}}</td>
                    <td>{{$user->name ." ".$user->middle_name." ".$user->last_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone_no}}</td>

                    <td class="center">
                        <div class="margin-val"><a href="{{route('user.details', array($user))}}" class="btn btn-xs btn-success">View</a></div>
                    </td>
                    <td class="center">
                        <div class="margin-val"><a href="{{route('user.delete', array($user))}}" class="btn btn-xs btn-danger">Delete</a></div>
                    </td>

                </tr>
            @empty
                <tr class="odd gradeX">
                    <td colspan="7">No Users found</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="module-body">
            <div class="pull-right">
                <div class="d-flex justify-content-center">
                    {!! $users->links() !!}
                </div>
            </div>
        </div>

    </div>
@endsection
