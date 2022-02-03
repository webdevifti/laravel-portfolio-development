<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function index(){
        $user_id = Auth::id();
        $get_user = User::findOrFail($user_id);
        return view('admin.profile.profile',compact('get_user'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'bio' => 'required'
        ]);
        if($request->user_image){
            $request->validate([
                'user_image' => 'mimes:jpg,png,jpeg'
            ]);
           
            $user = User::findOrfail($id);
            $newImageName = uniqid().'_user_'.'.'.$request->user_image->extension();
            unlink(public_path('uploads/users/'.$user->user_photo));
            $request->user_image->move(public_path('uploads/users/'), $newImageName);
            try{
                $user->name = $request->username;
                $user->email = $request->email;
                $user->user_bio = $request->bio;
                $user->user_photo = $newImageName;
                $user->save();
          
                return redirect('/profile')->with('profile_update_success','Updated Sucessfully!');
            }catch(Exception $e){
                return redirect('/profile')->with('update_update_error','Could not Updated!');
            }
        }else{
            try{
                $user = User::findOrfail($id);
                $user->name = $request->username;
                $user->email = $request->email;
                $user->user_bio = $request->bio;
                $user->save();
          
                return redirect('/profile')->with('profile_update_success','Updated Sucessfully!');
            }catch(Exception $e){
                return redirect('/profile')->with('profile_update_error','Could not Updated!');
            }
        }
    }
    public function updatePassword(Request $request, $id){
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'min:6|different:password',
        ]);
        
        try{ 
            
            $user = User::findOrfail($id);
            if (Hash::check($request->current_password, $user->password)) { 
               $user->fill([
                'password' => Hash::make($request->new_password)
                ])->save();
            }else{
                return redirect('/profile')->with('profile_update_error','Current Password Does not Match!');
            }
            // $oldpassword = $request->input('c_pass');
            
            // if (Hash::check($oldpassword, $user->password)) {
            // // redirect back with error
            // }
            // $newpassword = $request->input('n_pass'); 
            // $user->update(['password' => Hash::make($newpassword)]);
      
            return redirect('/profile')->with('profile_update_success','Password has been changed!');
        }catch(Exception $e){
            return redirect('/profile')->with('profile_update_error','Could not Updated!');
        }
    }
}
