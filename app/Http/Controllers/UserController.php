<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;


class UserController extends Controller
{
    public function profile(){
        //select from user table
        $auth=Auth::user();
        return view("user.profile");
    }
    public function upload(Request $request){
         
        // return $request;
        // if($request->hasFile('image')){
            $photo = $request->file('image');

            $fileName = time().'_'. Auth::user()->id.".".$photo->getClientOriginalExtension();
            $path = $request->file('image')->move(public_path('profile'),$fileName);
            $user = User::find(Auth::user()->id);
            $user->profile = $fileName;
            $user->save();
            return response()->json([
                'message' => 'image has been uploaded to '.$fileName,
            ],200);
        // }
        // else{
        //     return response()->json([
        //         'message' => 'somthing is wrong',
        //     ],400);
        // }

        
        
    }
    public function edit(Request $request,User $user){
        return view("user.profile")->with("user",$user);
        
        
    }
    public function save(Request $re,User $user){
        
       
       
    // $user->name=$re["username"];
        // $user->email=$re["email"];     
        $user=auth()->user();

        $user->update([
            'name'=>$re->name,
            'email'=>$re->email,
        ]);
        return redirect()->route('dashboard')->with('success','Profile has been updated');
    }

    // public function change_password(){
    //     return redirect()->route('dashboard');
    // }
   
    // public function changePassword(UpdatesUserPasswords $updater) {
        
    //     $updater->update(auth()->user(),[
    //         'current_password'=>$this->state['current_password'] ?? '',
    //         'password'=>$this->state['password'] ?? '',
    //         'password_confirmation'=>$this->state['password_confirmation'] ?? '',
    //     ]);
    //     // $r->validate([
    //     //     'old_password' => 'required|min:8',
    //     //     'new_password' => 'required|min:8|different:old_password',
    //     //     'confirm_password' => 'required|same:new_password',
    //     // ]);
    
    //     // $current_user = Auth::user();
    
    //     // if (Hash::check($request->old_password, $current_user->password)) {
    //     //     // Update the password
    //     //     $current_user->update([
    //     //         'password' => Hash::make($request->new_password)
    //     //     ]);
    //     //     return redirect()->route('dashboard')->with('success', 'Password has been changed successfully.');
    //     // } else {
    //     //     // Old password is incorrect
    //     //     return redirect()->route('dashboard')->with('error', 'Old password is incorrect.');
    //     // }
    // }
    

}

