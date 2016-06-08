@extends('layout.master')
@section('title')
Home:Welcome page
@endsection

@section('inner_page_title')
Login
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('layout.message')
        <div class="col-lg-6">
            <form  action="{{ route('login') }}" method="post">
                <div class="form-group" >
                    <label for="email" >Email:</label>
                    <input class="form-control" name="email" type="text" placeholder="email" required="" />
                </div>
                <div class="form-group" >
                    <label for="fullname" >Password:</label>
                    <input class="form-control" name="password" type="password" placeholder="Password" required="" />
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}" />
                <div class="form-group" >
                    <input class="btn btn-sm btn-primary" type="submit" value="Login" >
                    <a class="btn btn-sm btn-default">Cancel</a>
                </div>
            </form>
            <label>Dont have an Account?</label><a href="{{ url('/register') }}">Register Now</a>
        </div>
        <div class="col-md-6">
            
            
        </div>
    </div>
</div>
@endsection

