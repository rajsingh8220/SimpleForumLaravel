@extends('layout.master')
@section('title')
Home:Welcome page
@endsection

@section('inner_page_title')
Ask
<hr />
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('layout.message')
        <form role="form" action="{{ route('post.question') }}" method="post">
            <div class="form-group">
                <label for="question">Question</label>
                <textarea id="question" class="form-control" cols="20" rows="4" name="question" ></textarea>
            </div>
            <input type="hidden" name="_token" value="{{ Session::token() }}" />
            <div class="form-group">
                <input type="submit" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h4>You Posts</h4>
        @foreach($questions as $question)
        <article class="question">
            <p style="font-size: 16px;"><i class="glyphicon glyphicon-circle-arrow-right"></i> {{$question->question}}</p>
            <div class="info">
                Posted by {{$question->user->name}} on {{ date("M d Y",strtotime($question->created_at)) }}
            </div>
            <div style="margin-top: 3px;">
                <a href="{{route('delete.question',['question_id'=>$question->id])}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>
               
            </div>
        </article>
        @endforeach
        {!! $questions->links() !!}
    </div>
</div>
@endsection

