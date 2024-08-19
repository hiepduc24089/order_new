@extends('web.master')

@section('content')
    @include('web.partials.header')

    <!-- Body: Body -->
    @include('web.partials.search')

    <!-- Modal Custom Settings-->
    @include('web.partials.tracking_details')
@endsection
