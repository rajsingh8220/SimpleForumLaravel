@extends('layout.master')
@section('title')
Home:Welcome page
@endsection

@section('inner_page_title')
Admin

@endsection

@section('content')
<div class="row">
    <div class="col-md-12" style="min-height: 300px">
        @include('layout.message')
        @include('admin.admin_header')
        <hr />
        
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Sn.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Total Posts</th>
                <th>User Type</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                
            <?php
            $count = 0;
            ?>
            @foreach($users as $user)
                <?php 
                $count = $count+1;
                ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td>{{$user->name}}</td>
                    <td>
                        {{$user->email}}
                    </td>
                    <td>
                        <a  class="label label-info">10</a>
                    </td>
                    <td>
                        @if( $user->role=='admin' )
                        <a href="" class="label label-danger ">{{$user->role}}</a>
                        @else
                        <a href="" class="label label-info">{{$user->role}}</a>
                        @endif
                    </td>
                    <td>
                        <a href="" class="btn btn-primary btn-sm">Profile</a>
                        <a class="btn btn-danger btn-sm">Block</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $users->links() !!}
        
        
        
    </div>
</div>
@endsection

 
<script type="text/javascript">
    var token = '{{ Session::token()}}'
    var user_id = '{{ Auth::user()->id}}'
    var url = '{{route("edit.profile")}}'
    var uploadURL = '{{route("upload.profile")}}'
    var loadingIMG = "{{URL::to('img/loading.gif')}}"
</script>
