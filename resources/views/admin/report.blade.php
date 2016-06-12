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
        <div style="text-align: center;" class="col-md-12">
            <h1>Reports</h1>
            <h3>Under Developement</h3>
        </div>
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
