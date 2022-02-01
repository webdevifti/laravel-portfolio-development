<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    //
    public function index()
    {
        
        $about = About::all();
        return view('admin.about.about',['about_data' => $about]);
    }
    public function create(){
        return view('admin.about.add-about');
    }

    public function store(Request $request){
        $request->validate([
            'sub_title' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required',
            'about_image' => 'required|mimes:jpg,png,jpeg'
        ]);
        $newImageName = uniqid().'_about_image_'.'.'.$request->about_image->extension();
        $request->about_image->move(public_path('uploads/abouts/'), $newImageName);
        $userID = Auth::user()->id;
        try{
            About::create([
                'sub_title' => $request->sub_title,
                'title' => $request->title,
                'about_image' => $newImageName,
                'description' => $request->description,
                'user_id' => $userID,
            ]);
            return redirect('/about/create')->with('upload_success','About Content Uploaded Sucessfully!');
        }catch(Exception $e){
            return redirect('/about/create')->with('upload_error','Could not uploaded!');
        }
    }
    public function edit($id)
    {
        //
        $about = About::findOrFail($id);
        return view('admin.about.edit-about',['about' => $about]);
    }


    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'sub_title' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required',
           
        ]);
        if($request->about_image){
            $request->validate([
                'about_image' => 'mimes:jpg,png,jpeg'
            ]);
           
            $about = About::findOrfail($id);
            $newImageName = uniqid().'_about_image_'.'.'.$request->about_image->extension();
            unlink(public_path('uploads/abouts/'.$about->about_image));
            $request->about_image->move(public_path('uploads/abouts/'), $newImageName);
            try{
                $about->sub_title = $request->sub_title;
                $about->title = $request->title;
                $about->about_image = $newImageName;
                $about->description = $request->description;
                $about->save();
          
                return redirect('/about/'.$id.'/edit')->with('update_success','About Content Updated Sucessfully!');
            }catch(Exception $e){
                return redirect('/about/'.$id.'/edit')->with('update_error','Could not Updated!');
            }
        }else{
            try{
                $about = About::findOrfail($id);
                $about->sub_title = $request->sub_title;
                $about->title = $request->title;
                $about->description = $request->description;
                $about->save();
          
                return redirect('/about/'.$id.'/edit')->with('update_success','About Content Updated Sucessfully!');
            }catch(Exception $e){
                return redirect('/about/'.$id.'/edit')->with('update_error','Could not Updated!');
            }
        }
    }



    public function changeStatus($id){
        $about = About::select('status')->where('id','=',$id)->first();

        if($about->status == 1){
            $status = '0';
           
        }else{
            $status = '1';
        }
        $values = array('status' => $status);
        About::where('id',$id)->update($values);

        return redirect('/about')->with('success',"Status Changed");
    }

    public function destroy($id)
    {
        //
        $about = About::findOrFail($id);
        try{
            $about->delete();
            unlink(public_path('uploads/abouts/'.$about->about_image));
            return redirect('/about')->with('success','About Item Deleted');
        }catch(Exception $e){
            return redirect('/about')->with('error','Could not Deleted!');
        }
    }
}
