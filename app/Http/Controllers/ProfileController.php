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
        $profile  = Auth::user()->profile;
        $profile->education = $request['education'];
        $profile->profession = $request['profession'];
        $profile->about = $request['about'];
        
        $profile->update();
        //I put sleep to see the ajax effect
        sleep(2);
        return response()->json(['message'=>'Profile Edited Successfully'],200);
    }
    
    public function showProfile(){
        return view('user.profile');
    }
    
    public function uploadProfilePic (Request $request){
        if($request['profile_pic']->isValid()){
            
            $file = $request->file('profile_pic');
            $mime = $request->file('profile_pic')->getMimeType();
            $mime = explode("/", $mime);
            //$filename = $request->file('profile_pic')->getClientOriginalName();
            $path = public_path();
            $destinationPath = $path. '/profile_image/';
            $fileName = Auth::user()->id.".".$mime[1];
            $request->file('profile_pic')->move($destinationPath, $fileName);
            //echo "kkjk";
            
            $profile  = Auth::user()->profile;
            $profile->profile_pic = $fileName;
            

            $profile->update();
            \Session::flash('flash_message','Profile Image Uploaded Successfully');
            return response()->json(['message'=>'Profile Image Uploaded Successfully'],200);
        }
    }

    
}
