@extends('layout.master')
@section('title')
Home:Welcome page
@endsection

@section('content')
<h1>Question</h1>
<p>
    {{$question->question}}
</p>   
    <small>Posted By: {{$question->user->name}} | Posted on: {{$question->created_at}}</small>


<hr/>
<h3>Comments: </h3>
<div class="row">
    <div class="col-md-12">
       @if(count($comments)<1)
       <span>No comments found!</span>
       @else
            @foreach($comments as $comment)
            <div class="alert alert-info">
                    {{$comment->answer}}
            </div>
            <div id="comments_div">
                
            </div>
            @endforeach
       @endif
       
       <div>
           <form id="commentForm">
               <div class="form-group">
                   <label>Post Your Comment</label>
                   <textarea id="comment" class="form-control" ></textarea>
                   <input type="hidden" value="{{$question->id}}" id="question_id" />
               </div>
               <div class="form-group">
                   <input id="submitComment" type="button" class="btn btn-primary" value="Comment" />
                   
               </div>
           </form>
           <div id="result_message"></div>
       </div>
    </div>
</div>
@endsection

<script type="text/javascript" >
    var user_id = '{{ Auth::user()->id}}';
    var commentURL = '{{route("post.comment")}}';
    var token = '{{ Session::token()}}';
    var loadingIMG = "{{URL::to('img/loading.gif')}}"; 
</script>

