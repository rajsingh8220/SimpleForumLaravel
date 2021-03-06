@extends('layout.master')
@section('title')
Home:Welcome page
@endsection

@section('inner_page_title')
Register
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('layout.message');
        <div class="col-lg-6">
            <form action="{{ route('register') }}" onsubmit="return checkForm();" method="post">
                <div id="js_result"></div>
            <div class="form-group" >
                <label for="fullname" >Full Name:</label>
                <input class="form-control" name="name" type="text" placeholder="Name" />
            </div>
            <div class="form-group" >
                <label for="fullname" >Address:</label>
                <input class="form-control" name="address" type="text" placeholder="Address" required="" />
            </div>
            <div class="form-group" >
                <label for="fullname" >Phone:</label>
                <input class="form-control" type="text" name="phone" placeholder="00000000" />
            </div>
            <div class="form-group" >
                <label for="fullname" >Email:</label>
                <input class="form-control" type="email" name="email" placeholder="Email" />
            </div>
            <div class="form-group" >
                <label for="fullname" >Password:</label>
                <input class="form-control" id="password" type="password" name="password" placeholder="Password...." />
            </div>
            <div class="form-group" >
                <label for="fullname" >Re-Password:</label>
                <input class="form-control"id="re_password" type="password" required="" />
            </div>
            <div class="form-group" >
                <input type="hidden" name="_token" value="{{ Session::token() }}" />
                <input class="btn btn-primary" type="submit" value="Submit"/>
                <a href="{{ route('home') }}" class="btn btn-default">Cancel</a>
            </div>
        </form>
        </div>
        <div class="col-md-6"></div>
    </div>
</div>
@endsection

<script type="text/javascript">
    function checkForm(){
        var pass = document.getElementById("password").value;
        var re_pass = document.getElementById("re_password").value;
        if(pass==re_pass){
            return true;
        }
        else{
            
            document.getElementById("js_result").innerHTML = "<b style='color:red;'>Password did not match</b>"
            return false;
        }
    }
</script>