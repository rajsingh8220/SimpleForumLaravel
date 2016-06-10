<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Question;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Middleware\ErrorBinder;

class AdminController extends Controller{
    public function adminIndex(Request $request){
        $users = User::orderBy('role', 'desc')->paginate(10);
        return view('admin.users',['users'=>$users]);
        
    }
    
    public function getQuestion(){
        $questions = Question::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.questions',['questions'=>$questions]);
    }
    
    
    
}
