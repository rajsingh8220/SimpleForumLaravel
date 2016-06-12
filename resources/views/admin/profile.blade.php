@extends('layout.master')
@section('title')
Home:Welcome page
@endsection

@section('inner_page_title')
Profile
<hr />
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('layout.message')
        
        <div class="col-md-3" style="text-align: center">
            <img class="thumbnail" height="200" width="200" src="{{URL::to('profile_image/')}}/{{$user->profile->profile_pic}}" />
            
        </div>
        <div class="col-md-9" style="padding: 10px">
            <table class="table table-striped">
                <tr>
                    <td>Name:</td>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td>{{ $user->address }}</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>{{$user->phone }}</td>
                </tr>
                
                <tr>
                    <td>Education</td>
                    <td>{{$user->profile->education}}</td>
                </tr>
                
                <tr>
                    <td>Who are you?</td>
                    <td>{{ $user->profile->profession }}</td>
                </tr>
                <tr>
                    <td>About You</td>
                    <td>{{ $user->profile->about }}</td>
                </tr>
                 
            </table>
           
        </div>
        
    </div>
</div>
@endsection
