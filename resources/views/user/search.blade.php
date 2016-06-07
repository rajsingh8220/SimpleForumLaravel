@extends('layout.master')
@section('title')
Home:Welcome page
@endsection

@section('inner_page_title')
Search
<hr />
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
      
        @foreach($questions as $question)
        <a href="#">
        <article class="question">
            <p style="font-size: 16px;"><i class="glyphicon glyphicon-circle-arrow-right"></i> {{$question->question}}</p>
            <div class="info">
                Posted by {{$question->user->name}} on {{ date("M d Y",strtotime($question->created_at)) }}
            </div>
            <div style="margin-top: 3px;">
                <a class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-comment"></i> Comment</a>
                
            </div>
        </article>
        </a>
        @endforeach
        
    </div>
</div>

@endsection

