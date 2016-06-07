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
        @if( Auth::check() )
        <div class="col-md-3" style="text-align: center">
            <img class="thumbnail" height="200" width="200" src="{{URL::to('img/avatar.jpg')}}" />
            <a href="#">Change Picture</a>
        </div>
        <div class="col-md-9" style="padding: 10px">
            <table class="table table-striped">
                <tr>
                    <td>Name:</td>
                    <td>{{ Auth::user()->name }}</td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td>{{ Auth::user()->address }}</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>{{ Auth::user()->email }}</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>{{ Auth::user()->phone }}</td>
                </tr>
                
                <tr>
                    <td>Education</td>
                    <td>{{Auth::user()->profile->education}}</td>
                </tr>
                
                <tr>
                    <td>Who are you?</td>
                    <td>{{ Auth::user()->profile->profession }}</td>
                </tr>
                <tr>
                    <td>About You</td>
                    <td>{{ Auth::user()->profile->about }}</td>
                </tr>
                 
            </table>
            <a class="btn btn-primary " data-toggle="modal" data-target="#updateProfile"><i class="glyphicon glyphicon-edit"></i> Update Profile</a>
        </div>
        @endif
    </div>
</div>
@endsection

<!-- Modal -->
<div id="updateProfile" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <form>
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
              <label for="name" >Name</label>
              <input type="text" value="{{ Auth::user()->name }}" name="name" class="form-control" />
          </div>
          <div class="form-group">
              <label for="address" >Address</label>
              <input type="text" value="{{ Auth::user()->address }}" name="address" class="form-control" />
          </div>
          <div class="form-group">
              <label for="phone" >Phone</label>
              <input type="text" value="{{ Auth::user()->phone }}" name="phone" class="form-control" />
          </div>
          
          <div class="form-group">
              <label for="education" >Education</label>
              <input type="text" value="{{Auth::user()->profile->education}}" name="education" class="form-control" />
          </div>
          <div class="form-group">
              <label for="profession" >Who are you?</label>
              <input type="text" value="{{Auth::user()->profile->profession}}" name="profession" class="form-control" />
          </div>
          <div class="form-group">
              <label for="about" >About You</label>
              <textarea value="{{Auth::user()->profile->about}}" name="about" class="form-control" ></textarea>
          </div>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    </form>
  </div>
</div>

