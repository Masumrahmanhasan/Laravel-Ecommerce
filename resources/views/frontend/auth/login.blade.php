@extends('frontend.layouts.master')
@section('content')

    <ul class="breadcrumb">
        <li><a href="{{ route('frontend.home') }}"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Login</a></li>
    </ul>
    <div class="col-sm-6 col-md-offset-3">
        <div class="well">
            <h2 align="center">User Login</h2>
            @include('frontend.partials._messeges')
            <form enctype="multipart/form-data" method="post" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="input-email" class="control-label">E-Mail Address</label>
                    <input type="text" class="form-control" id="input-email" placeholder="E-Mail Address" value="" name="email">
                </div>
                <div class="form-group">
                    <label for="input-password" class="control-label">Password</label>
                    <input type="password" class="form-control" id="input-password" placeholder="Password" value="" name="password">
                    <a href="#">Forgotten Password</a>
                    <a href="{{ route('register') }}" class="pull-right">Register a new account!</a>
                </div>
                <button type="submit" class="btn btn-primary" value="Login">Login</button>

            </form>
        </div>
    </div>
@endsection
