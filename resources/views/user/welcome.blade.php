@extends('layout.master')
@section('title')
Home:Welcome page
@endsection

@section('content')
<h1>Welcome to Demo forum</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at enim sed mauris imperdiet feugiat at at sem. Vivamus eu vulputate sapien, ac faucibus est. Nunc nunc urna, commodo tincidunt massa a, scelerisque accumsan augue. Morbi laoreet varius dui ut aliquam. Maecenas sollicitudin diam non metus luctus fermentum. Pellentesque sit amet justo mi. Mauris erat odio, rutrum et metus eu, mollis scelerisque mi. Maecenas in diam dolor. Integer quis tortor in mi consequat hendrerit. Nullam eget justo leo. Aliquam erat volutpat. Quisque velit turpis, porta faucibus fermentum eget, laoreet congue turpis. Vivamus id nisl malesuada metus feugiat vulputate nec sit amet ante. Mauris sit amet condimentum urna, non lobortis ante.</p>

<p>Nullam euismod feugiat erat, a aliquet libero maximus at. Etiam tincidunt lectus at efficitur sodales. Nulla ac euismod ex. Nunc in ipsum nulla. In sit amet nibh nec ligula viverra ultrices semper quis est. Vestibulum sed arcu sit amet massa scelerisque tempor. Fusce vel justo turpis. Cras quam nisi, pretium vel sapien in, hendrerit vulputate tortor. Donec eleifend sem et suscipit porta. Cras lobortis iaculis commodo. Aenean suscipit dignissim tortor nec tempus. Vivamus sapien mi, viverra vel scelerisque ac, convallis vel metus. Sed ipsum enim, ultricies vel iaculis viverra, mollis et elit. Sed interdum, lacus condimentum euismod consectetur, justo massa tincidunt erat, non molestie arcu ligula id augue. Duis ultrices id risus sed volutpat. Donec est ante, viverra quis euismod in, porttitor vitae dui.</p>
<hr/>
<h3>Recent Posts: </h3>

<div class="row">
    <div class="col-md-12">
       {!! $questions->links() !!}
        @foreach($questions as $question)
        <a href="#">
        <article class="question">
            <p style="font-size: 16px;"><i class="glyphicon glyphicon-circle-arrow-right"></i> {{$question->question}}</p>
            <div class="info">
                Posted by {{$question->user->name}} on {{ date("M d Y",strtotime($question->created_at)) }}
            </div>
            <div style="margin-top: 3px;">
                <a href="{{route('comment.question',['question_id'=>$question->id])}}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-comment"></i> Comment</a>
                <a href="{{route('delete.question',['question_id'=>$question->id])}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>
               
            </div>
        </article>
        </a>
        @endforeach
        {!! $questions->links() !!}
    </div>
</div>
@endsection

