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
    </div>

    <div class="module-body table">
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-condensed"
               width="100%">
            <thead>
            <tr>
                <th>Sr.No</th>
                <th>Bank Name</th>
                <th>Bi Number</th>
                <th>Account Number</th>
                <th>Account Type</th>
            </tr>
            </thead>
            <tbody>
            @php

                @endphp
            @forelse($accounts as $account)
                @php
                    $counter = ($account->page - 1) * $account->per_page + 1;
                @endphp

                <tr class="odd gradeX">


                    <td>{{$num++}}</td>
                    <td>{{$account->bank->bank_name}} ({{$account->bank->bank_code}})
                        <br> ({{$account->branch->branch_code}})
                        <br>SORT: {{$account->branch->sort_code}}
                    </td>

                    <td>{{$account->bi_number}} </td>
                    <td><a href="{{route('account.transaction', array('id'=>$account->id))}}">{{$account->account_number}} </a></td>
                    <td class="center">{{$account->account_type}}</td>
                </tr>
            @empty
                <tr class="odd gradeX">
                    <td colspan="7">No Accounts found</td>
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
