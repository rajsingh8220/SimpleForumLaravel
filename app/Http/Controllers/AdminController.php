<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Question;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Middleware\ErrorBinder;

class AdminController extends Controller{
    public function adminIndex(Request $request){
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.users',['users'=>$users]);
        
    }
    
    public function getQuestion(){
        $questions = Question::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.questions',['questions'=>$questions]);
    }
    
    public function dashboard(){
        //$questions = Question::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.dashboard');
    }
    
    public function report(){
        return view('admin.report');
    }
    
    public function showProfile($user_id){
        $user = User::where('id',$user_id)->first();
        return view('admin.profile',['user'=>$user]);
    }
    
    public function shuffleStatus($user_id,$status){
        if($status==1){
            $status = 0;
        }
        else{
            $status = 1;
        }
        
        //$profile->update();
        $user = User::where('id',$user_id)->first();
        $user->active=$status;
        $user->update();
        \Session::flash('flash_message','User Status Changed Successfully');
        return redirect()->back();
            
    }
    
    public function shuffleUserRole($user_id,$role){
        $user = User::where('id',$user_id)->first();
        \Session::flash('flash_message','User Role Changed Successfully');
        
        if(Auth::user()->id==$user_id){
            
        }
        else {
            if($role=='admin'){
                $role = 'user';
                $matchThese = ['role' => 'admin', 'active' => '1'];
                $users = User::where($matchThese)->get();
                if(count($users)>=1){        
                    $user->role=$role;
                    $user->update();
                }
            }
            else{
                $role = 'admin';

                    $user->role=$role;
                    $user->update();

            }
        } 
        
        return redirect()->back();
            
    }
    
    
    public function shuffleQuestionStatus($question_id,$enabled){
        if($enabled==1){
            $enabled = 0;
            \Session::flash('flash_message','Question has been blocked');
        }
        else{
            $enabled = 1;
            \Session::flash('flash_message','Question has been un-blocked');
        }
        
        
        $question = Question::where('id',$question_id)->first();
        $question->enabled=$enabled;
        $question->update();
        return redirect()->back();
            
    }
    
    
    
    
    
}
