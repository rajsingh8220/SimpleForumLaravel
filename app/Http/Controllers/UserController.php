<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Middleware\ErrorBinder;

class UserController extends Controller{
    public function registerRequest(Request $request){
        $this->validate($request, [
           'email'=>'required|email|unique:users',
           'name' => 'required|max:180',
            'password' => 'required|min:3',
        ]);
        $name = $request['name'];
        $address = $request['address'];
        $phone = $request['phone'];
        $email = $request['email'];
        $password = bcrypt($request['password']);
        //echo "kjasd";
        $user = new User();
        //echo "scfd";
        $user->name = $name;
        $user->address = $address;
        $user->phone = $phone;
        $user->email = $email;
        $user->password = $password;
        //echo "sjlskdjf";
        try{
            $user->save();
            $profile = new Profile();
            //echo "test";
            $profile->userid = $user->id;
            
            $profile->about = '';
            $profile->education = '';
            $profile->profession = '';
            $profile->save();
         }
         catch(Exception $e){
            echo   $e->getMessage(); 
         }
        return redirect('/');
        
    }
    
    public function loginRequest(Request $request){
        echo $request['email'];
        echo $request['password'];
        
        if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']])){
            echo "dfdfdxxxx";
            return redirect()->route('profile');
        }
        //echo "sdsd";
        return redirect()->back();
    }
    
    public function showProfile(){
        return view('user.profile');
    }
    
    public function logoutRequest(){
        Auth::logout();
        return redirect('/login');
    }
    
    public function getHome(){
        $questions = Question::orderBy('created_at','desc')->get();
        return view('user.welcome',['questions'=>$questions]);
        //return view('user.welcome');
    }
    
    
}
