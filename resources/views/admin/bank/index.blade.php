@extends('layouts.admin.admin')

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="module-body clearfix">
        <div class="pull-left">
            <form action="{{route('bank')}}" method="GET">

                <div class="control-group">
                    <div class="controls">
                        <input class="span2" placeholder="Search" id="search" type="text"
                               class="form-control" name="search" autofocus>
                    </div>
                </div>
            </form>
        </div>
        <div class="pull-right"><a href="{{route('bank.create')}}" class="btn btn-primary">Create Bank</a></div>
    </div>

    <div class="module-body table">
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-condensed"
               width="100%">
            <thead>
            <tr>
                <th>Sr.No</th>
                <th>Bank Name</th>
                <th>Bank Code</th>
                <th>Address</th>
                <th>Country</th>
                <th>Postcode</th>
                <th>View</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @php

            @endphp
            @forelse($banks as $bank)
                @php
                    $counter = ($bank->page - 1) * $bank->per_page + 1;
                @endphp
                <tr class="odd gradeX">
                    <td>{{$num++}}</td>
                    <td>{{$bank->bank_name}}</td>
                    <td>{{$bank->bank_code}}</td>
                    <td>{{$bank->address_line1}} {{$bank->address_line2}}, {{$bank->city}}</td>
                    <td class="center">{{$bank->country}}</td>
                    <td class="center">{{$bank->postcode}}</td>
                    <td class="center">
                        <div class="margin-val"><a href="{{route('branch', array("bank_id"=>$bank->id))}}" class="btn btn-primary">View Branches ({{$bank->branches->count()}})</a></div>
                        <div class="margin-val"><a href="{{route('branch.create', array("bank_id"=>$bank->id))}}" class="btn btn-primary">Create Branch</a></div>
                    </td>
                    <td class="center">
                        <div class="margin-val"><a href="{{route('bank.edit', array($bank))}}" class="btn btn-primary">Edit</a></div>
                        <div class="margin-val"><a href="{{route('bank.delete', array($bank))}}" class="btn btn-danger">Delete</a></div>
                    </td>

                </tr>
            @empty
                <tr class="odd gradeX">
                    <td colspan="7">No Banks found</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="module-body">
            <div class="pull-right">
                <div class="d-flex justify-content-center">
                    {!! $banks->links() !!}
                </div>
            </div>
        </div>

    </div>
@endsection
