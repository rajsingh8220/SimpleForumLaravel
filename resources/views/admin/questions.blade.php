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
                <th>Question</th>
                <th>Answers</th>
                <th>Posted By</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                
            
            @foreach($questions as $question)
                <tr>
                    <td>{{substr($question->question,0,150)}}...</td>
                    <td>2</td>
                    <td>
                        {{$question->user->name}}
                        on {{ date("M d Y",strtotime($question->created_at)) }}
                    </td>
                    <td>
                        <label class="label {{ $question->enabled == '1' ? 'label-success' : 'label-danger' }}">
                            {{ $question->enabled == '1' ? 'active' : 'dasabled' }}
                        </label>
                    </td>
                    <td>
                        <a href="" class="btn btn-sm btn-success">Enable</a>
                        <a href="" class="btn btn-sm btn-danger">Disable</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $questions->links() !!}
        
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
