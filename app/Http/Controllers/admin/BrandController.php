<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    //
    public function index(){
        $brands = Brand::all();
        return view('admin.brand.brands',['brands'=>$brands]);
    }
    public function create(){
        return view('admin.brand.add-brand');
    }
    public function store(Request $request){
        $request->validate([
            'brand_image' => 'required|mimes:jpg,png,jpeg'
        ]);
        $newImageName = uniqid().'_brand_image_'.'.'.$request->brand_image->extension();
        $request->brand_image->move(public_path('uploads/brands/'), $newImageName);
        $userID = Auth::user()->id;
        try{
            Brand::create([
                'brand_image' => $newImageName,
                'user_id' => $userID,
            ]);
            return redirect('/brand/create')->with('upload_success','Brand Image Uploaded Sucessfully!');
        }catch(Exception $e){
            return redirect('/brand/create')->with('upload_error','Could not uploaded!');
        }

    }
    public function edit($id)
    {
        //
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit-brand',['brand' => $brand]);
    }
    
    public function update(Request $request, $id){
        $request->validate([
            'brand_image' => 'required',
        ]);
        if($request->brand_image){
            $request->validate([
                'brand_image' => 'mimes:jpg,png,jpeg'
            ]);
           
            $brand = Brand::findOrfail($id);
            $newImageName = uniqid().'_brand_image_'.'.'.$request->brand_image->extension();
            unlink(public_path('uploads/brands/'.$brand->brand_image));
            $request->brand_image->move(public_path('uploads/brands/'), $newImageName);
            try{
                
                $brand->brand_image = $newImageName;
                $brand->save();
          
                return redirect('/brand/'.$id.'/edit')->with('update_success','Brand Image Updated Sucessfully!');
            }catch(Exception $e){
                return redirect('/brand/'.$id.'/edit')->with('update_error','Could not Updated!');
            }
        }
    }
    public function destroy($id)
    {
        //
        $brand = Brand::findOrFail($id);
        try{
            $brand->delete();
            unlink(public_path('uploads/brands/'.$brand->brand_image));
            return redirect('/brands')->with('success','Brand Item Deleted');
        }catch(Exception $e){
            return redirect('/brands')->with('error','Could not Deleted!');
        }
    }
    public function changeStatus($id){
        $brand = Brand::select('status')->where('id','=',$id)->first();

        if($brand->status == 1){
            $status = '0';
           
        }else{
            $status = '1';
        }
        $values = array('status' => $status);
        Brand::where('id',$id)->update($values);

        return redirect('/brands')->with('success',"Status Changed");
    }
}