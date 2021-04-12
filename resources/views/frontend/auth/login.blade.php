@extends('frontend.layouts.master')
@section('content')

    <ul class="breadcrumb">
        <li><a href="{{ route('frontend.home') }}"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Login</a></li>
    </ul>
    <div class="col-sm-6 col-md-offset-3">
        <div class="well">
            <h2 align="center">User Login</h2>

            <form enctype="multipart/form-data" method="post" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="input-email" class="control-label @error('email') is-invalid @enderror">E-Mail Address</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="input-email" placeholder="E-Mail Address" value="">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="input-password" class="control-label @error('password') is-invalid @enderror">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="input-password" placeholder="Password" value="" >

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <a href="#">Forgotten Password</a>
                    <a href="{{ route('register') }}" class="pull-right">Register a new account!</a>
                </div>
                <button type="submit" class="btn btn-primary" value="Login">Login</button>

            </form>
        </div>
    </div>
@endsection
