<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialLinksController extends Controller
{
    //
    public function index(){
        $socials = SocialLink::all();
        return view('admin.social.socials', compact('socials'));
    }
    public function create(){
        $all_font = fa_icons();
        return view('admin.social.add-social',compact('all_font'));
    }

    public function store(Request $request){
        // dd($request);
        $request->validate([
            'icon_class' => 'required|string|max:255',
            'url' => 'required|max:255'
        ]);

        $userID = Auth::user()->id;
        try{
            SocialLink::create([
                'social_icon' => $request->icon_class,
                'social_url' => $request->url,
                'user_id' => $userID
            ]);
            return redirect('/social/create')->with('upload_success','Social Item Uploaded Sucessfully!');
        }catch(Exception $e){
            return redirect('/social/create')->with('upload_error','Could not Uploaded!');
        }
    }
    public function edit($id){
        $social = SocialLink::findOrFail($id);
        $all_font = fa_icons();
        return view('admin.social.edit-social',['social' => $social,'all_font'=>$all_font]);
    }
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'icon_class' => 'required|string|max:255',
            'url' => 'required|max:255'
           
        ]);
       
        $social = SocialLink::findOrfail($id);
        
        try{
            $social->social_icon = $request->icon_class;
            $social->social_url = $request->url;
            $social->save();
        
            return redirect('/social/'.$id.'/edit')->with('update_success','Social Updated Sucessfully!');
        }catch(Exception $e){
            return redirect('/social/'.$id.'/edit')->with('update_error','Could not Updated!');
        }
        
    }
    public function changeStatus($id){
        $social = SocialLink::select('status')->where('id','=',$id)->first();

        if($social->status == 1){
            $status = '0';
           
        }else{
            $status = '1';
        }
        $values = array('status' => $status);
        SocialLink::where('id',$id)->update($values);

        return redirect('/socials')->with('success',"Status Changed");
    }

    public function destroy($id)
    {
        //
        $social = SocialLink::findOrFail($id);
        try{
            $social->delete();
            
            return redirect('/socials')->with('success','Social Item Deleted');
        }catch(Exception $e){
            return redirect('/socials')->with('error','Could not Deleted!');
        }
    }
}
