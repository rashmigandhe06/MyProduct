@extends('layouts.admin.admin')

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="module-body clearfix">
        <div class="pull-left"></div>
        <div class="pull-right"><a href="{{route('branch.create')}}" class="btn btn-primary">Create Branch</a></div>
    </div>

    <div class="module-body table">
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-condensed"
               width="100%">
            <thead>
            <tr>
                <th>Sr.No</th>
                <th>Bank Name</th>
                <th>Branch Code</th>
                <th>Address</th>
                <th>Country</th>
                <th>Postcode</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @php
                $counter=0;
            @endphp
            @forelse($branches as $branch)
                @php
                    $counter++;
                @endphp
                <tr class="odd gradeX">
                    <td>{{$counter}}</td>
                    <td>{{$branch->bank->bank_name}}</td>
                    <td>{{$branch->branch_code}}</td>
                    <td>{{$branch->address_line1}} {{$branch->address_line2}}, {{$branch->city}}</td>
                    <td class="center">{{$branch->country}}</td>
                    <td class="center">{{$branch->postcode}}</td>
                    <td class="center">
                        <div class="margin-val"><a href="{{route('branch.edit', array($branch))}}" class="btn btn-primary">Edit</a></div>
                        <div class="margin-val"><a href="{{route('branch.delete', array($branch))}}" class="btn btn-danger">Delete</a></div>
                    </td>
                </tr>
            @empty
                <tr class="odd gradeX">
                    <td colspan="7">No Branchs found</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
