<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    //
    public function __construct()
    {
       
    }

    public function index(){
        $users = User::all()->whereNotIn('user_type','admin');
        return view('admin.user.users',compact('users'));
    }

    public function create(){
        return view('admin.user.add-user');
    }

    public function store(Request $request){
        $request->validate([
            'username' => 'required|string|max:255|min:5',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|max:255|min:6',
            'user_type' => 'required',
            'bio' => 'required',
            'user_image' => 'required|mimes:jpg,jpeg,png',
        ]);
        $newImageName = uniqid().'_user_'.'.'.$request->user_image->extension();
        $request->user_image->move(public_path('uploads/users/'), $newImageName);
        try{
            User::create([
                'name' => $request->username,
                'email' => $request->email,
                'user_photo' => $newImageName,
                'user_bio' => $request->bio,
                'user_type' => $request->user_type,
                'password' => Hash::make($request->password),
            ]);
           
            return redirect('/user/create')->with('upload_success','User has added Sucessfully!');
        }catch(Exception $e){
            return redirect('/user/create')->with('upload_error','Could not uploaded!');
        }
    }

    public function changeStatus($id){
        $user = User::select('status')->where('id','=',$id)->first();

        if($user->status == 1){
            $status = '0';
           
        }else{
            $status = '1';
        }
        $values = array('status' => $status);
        User::where('id',$id)->update($values);

        return redirect('/users')->with('success',"Status Changed");
    }

    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);
        try{
            $user->delete();
            unlink(public_path('uploads/users/'.$user->user_photo));
            return redirect('/users')->with('success','User Deleted');
        }catch(Exception $e){
            return redirect('/users')->with('error','Could not Deleted!');
        }
    }
}
