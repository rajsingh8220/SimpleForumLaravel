<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Question;
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
        $questions = Question::where('enabled',1)->orderBy('created_at', 'desc')->paginate(3);
        //$questions = DB::table('questions')->orderBy('created_at', 'desc')->paginate(7);
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
    
    public function searchQuestion(){
        $questions = Question::orderBy('created_at','desc')->get();
        return view('user.search',['questions'=>$questions]);
    }
    
}
