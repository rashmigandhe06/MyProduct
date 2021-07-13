@extends('layouts.user')


@section('content')

    @if ($status ?? '' > 200)
        <div class="">Oops! Something went wrong ! Please <a href="{{route('bank.connect')}}">click here</a> to try again</div>
    @endif

@endsection
