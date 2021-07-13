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
                <th>Tran ID</th>
                <th>Time</th>
                <th>Type</th>
                <th>Category</th>
                <th>Amount</th>
            </tr>
            </thead>
            <tbody>
            @php

                @endphp
            @forelse($transactions as $transaction)
                @php
                    $counter = ($transaction->page - 1) * $transaction->per_page + 1;
                @endphp

                <tr class="odd gradeX">
                    <td>{{$num++}}</td>
                    <td>{{$transaction->tran_id}} </td>

                    <td>{{$transaction->transaction_time}} </td>
                    <td>{{$transaction->transaction_type}} </td>
                    <td>{{$transaction->transaction_category}} </td>
                    <td>{{$transaction->amount}} ({{$transaction->currency}})</td>



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
                    {!! $transactions->render() !!}
                </div>
            </div>
        </div>

    </div>
@endsection
