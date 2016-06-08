<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Middleware\ErrorBinder;

class ProfileController extends Controller{
    public function editProfile(Request $request){
        $this->validate($request,[
           'name'=>'required',
            'address'=>'required'
        ]);
        //echo $request['user_id'];
        $user = User::find($request['user_id']);
        $user->name = $request['name'];
        $user->address = $request['address'];
        $user->phone = $request['phone'];
        
        $user->update();
        //return redirect("/profile");
        return response()->json(['message'=>'Profile Edited Successfully'],200);
    }
    
    public function showProfile(){
        return view('user.profile');
    }
    
}
