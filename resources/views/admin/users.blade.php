@extends('layout.master')
@section('title')
Home:Welcome page
@endsection

@section('inner_page_title')
Admin - Users

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
            <tr style="color: {{ $user->active==0 ? 'red' : '' }}">
                    
                    <td>{{$user->name}}</td>
                    <td>
                        {{$user->email}}
                    </td>
                    <td>
                        <a>
                        <?php
                        //The Efficient way will be doing AJAX or getting data from Controller by joining the both table
                        $results = DB::select('select * from questions where user_id = :id', ['id' => $user->id]);    
                        echo count($results);
                        //This is not efficient way sometimes.
                        ?>
                        </a>
                    </td>
                    <td>
                        <a href="{{route('role.user',['user_id'=>$user->id,'role'=>$user->role])}}" style="color: {{ $user->role== 'admin' ? 'green' : '' }}">{{$user->role}}</a> 
                    </td>
                    <td>
                        <a href="{{route('show.user',['user_id'=>$user->id])}}" class="btn btn-primary btn-sm">Profile</a>
                        <a href="{{route('block.user',['user_id'=>$user->id,'status'=>$user->active])}}" class="btn btn-{{ $user->active==1 ? 'danger' : 'success' }} btn-sm">
                            @if($user->active==1)
                            Block
                            @else
                            Active
                            @endif
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="col-md-12" style="text-align: center">{!! $users->links() !!}</div>
 
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
