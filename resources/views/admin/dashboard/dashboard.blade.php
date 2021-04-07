@extends('admin.layout.app')
@section('title', 'Dashboard')
@section('content')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
{{--        <a class="breadcrumb-item" href="index.html">Pages</a>--}}
{{--        <span class="breadcrumb-item active">Blank Page</span>--}}
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Welcome to Admin Panel </h6>
                <p class="mg-b-20 mg-sm-b-30">Here You can do all kind of stuff</p>
            </div>
        </div><!-- sl-page-title -->

    </div><!-- sl-pagebody -->
@endsection
