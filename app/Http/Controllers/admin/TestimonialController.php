<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    //
    public function index(){
        $testimonials = Testimonial::all();
        return view('admin.testimonial.testimonials',['testimonials' => $testimonials]);
    }

    public function create(){
        return view('admin.testimonial.add-testimonial');
    }

    public function store(Request $request){
        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_designation' => 'required|string|max:255',
            'review' => 'required',
            'client_image' => 'required|mimes:jpg,png,jpeg'
        ]);
        $newImageName = uniqid().'_client_image_'.'.'.$request->client_image->extension();
        $request->client_image->move(public_path('uploads/testimonials/'), $newImageName);
        $userID = Auth::user()->id;
        try{
            Testimonial::create([
                'client_name' => $request->client_name,
                'client_designation' => $request->client_designation,
                'client_review' => $request->review,
                'client_image' => $newImageName,
                'user_id' => $userID,
            ]);
            return redirect('/testimonial/create')->with('upload_success','Testimonial Uploaded Sucessfully!');
        }catch(Exception $e){
            return redirect('/testimonial/create')->with('upload_error','Could not uploaded!');
        }
    }

    public function edit($id){
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonial.edit-testimonial',['testimonial' => $testimonial]);
    }

    public function update(Request $request, $id){
         //
         $request->validate([
            'client_name' => 'required|string|max:255',
            'client_designation' => 'required|string|max:255',
            'review' => 'required',
        ]);
        if($request->client_image){
            $request->validate([
                'client_image' => 'mimes:jpg,png,jpeg'
            ]);
           
            $testimonial = Testimonial::findOrfail($id);
            $newImageName = uniqid().'_client_image_'.'.'.$request->client_image->extension();
            unlink(public_path('uploads/testimonials/'.$testimonial->client_image));
            $request->client_image->move(public_path('uploads/testimonials/'), $newImageName);
            try{
                $testimonial->client_name = $request->client_name;
                $testimonial->client_designation = $request->client_designation;
                $testimonial->client_review = $request->review;
                $testimonial->client_image = $newImageName;
                $testimonial->save();
          
                return redirect('/testimonial/'.$id.'/edit')->with('update_success','Testimonial Updated Sucessfully!');
            }catch(Exception $e){
                return redirect('/testimonial/'.$id.'/edit')->with('update_error','Could not Updated!');
            }
        }else{
            try{
                $testimonial = Testimonial::findOrfail($id);
                $testimonial->client_name = $request->client_name;
                $testimonial->client_designation = $request->client_designation;
                $testimonial->client_review = $request->review;
                $testimonial->save();
          
                return redirect('/testimonial/'.$id.'/edit')->with('update_success','Testimonial Updated Sucessfully!');
            }catch(Exception $e){
                return redirect('/testimonial/'.$id.'/edit')->with('update_error','Could not Updated!');
            }
        }
    }

    public function changeStatus($id){
        $banner = Testimonial::select('status')->where('id','=',$id)->first();

        if($banner->status == 1){
            $status = '0';
           
        }else{
            $status = '1';
        }
        $values = array('status' => $status);
        Testimonial::where('id',$id)->update($values);

        return redirect('/testimonials')->with('success',"Status Changed");
    }

    public function destroy($id)
    {
        //
        $testimonial = Testimonial::findOrFail($id);
        try{
            $testimonial->delete();
            unlink(public_path('uploads/testimonials/'.$testimonial->client_image));
            return redirect('/testimonials')->with('success','Testimonial Item Deleted');
        }catch(Exception $e){
            return redirect('/testimonials')->with('error','Could not Deleted!');
        }
    }
}
