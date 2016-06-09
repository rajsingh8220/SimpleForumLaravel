<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Question;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Middleware\ErrorBinder;

class AdminController extends Controller{
    public function adminIndex(Request $request){
        //echo "test";
        return view('admin.admin');
        
    }
    
    
    
}
