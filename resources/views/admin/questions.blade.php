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
                        <label style="color: {{ $question->enabled == '1' ? '' : 'red' }}">
                            {{ $question->enabled == '1' ? 'active' : 'dasabled' }}
                        </label>
                    </td>
                    <td>
                        @if($question->enabled == '1')
                        <a href="{{route('enabled.question',['question_id'=>$question->id,'status'=>$question->enabled])}}" class="btn btn-sm btn-danger">Disable</a>
                        @else
                         <a href="{{route('enabled.question',['question_id'=>$question->id,'status'=>$question->enabled])}}" class="btn btn-sm btn-success">Enable</a>
                        @endif
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
