<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Question;
use App\Comment;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Middleware\ErrorBinder;

class QuestionController extends Controller{
    public function postQuestion(Request $request){
        //echo "test";
        $this->validate($request, [
           'question'=>'required|max:1500' 
        ]);
        $question = new Question();
        $question->question = $request['question'];
        $message = "The was an Error";
        if($request->user()->questions()->save($question)){
            $message="Question has been posted successfully";
            //We can add email notification to client user
        }
        return redirect('/questions')->with(['message'=>$message]);
    }
    
    public function getQuestion(){
        $matchThese = ['enabled' => 1, 'user_id' => Auth::user()->id];
        $questions = Question::where($matchThese)->orderBy('created_at', 'desc')->paginate(3);
        //$questions = Auth::user()->questions;
        return view('user.questions',['questions'=>$questions]);
    }
    
    public function getDeleteQuestion($question_id){
        $question = Question::where('id',$question_id)->first();
        if(Auth::user()!=$question->user){
            return redirect()->back();
        }
        $question->delete();
        return redirect()->route('get.question')->with(['message'=>'Successfully deleted!']);
    }
    
    public function commentQuestion($question_id){
        $question = Question::where('id',$question_id)->first();
        $comments = $question->comments;
        return view('user.comment',['question'=>$question,'comments'=>$comments]);
    }
    
    public function searchQuestion(){
        $questions = Question::orderBy('created_at','desc')->get();
        return view('user.search',['questions'=>$questions]);
    }
    
    public function shuffleEnable($question_id,$enable){
        if($enable==1){
            $enable = 0;
        }
        else{
            $enable = 1;
        }
        
        //$profile->update();
        $question = Question::where('id',$user_id)->first();
        $question->enabled=$enable;
        $question->update();
        \Session::flash('flash_message','User Status Changed Successfully');
        return redirect()->back();
            
    }
    
    public function postComment(Request $request){
        $answer = $request['comment'];
        $user_id = $request['user_id'];
        $question_id = $request['question_id'];
        
        
          
        $comment = new Comment();
        $comment->answer = $answer;
        $comment->user_id = $user_id;
        $comment->question_id = $question_id;
        $comment->save();
        
        return response()->json(['message'=>'Comment Posted Successfully'],200);
    }
    
}
