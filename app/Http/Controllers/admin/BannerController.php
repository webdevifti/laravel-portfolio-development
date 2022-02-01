<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $banners = Banner::all();
        return view('admin.banner.banner',['banners' => $banners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.banner.add-banner');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'sub_title' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required',
            'banner_image' => 'required|mimes:jpg,png,jpeg'
        ]);
        $newImageName = uniqid().'_banner_image_'.'.'.$request->banner_image->extension();
        $request->banner_image->move(public_path('uploads/banners/'), $newImageName);
        $userID = Auth::user()->id;
        try{
            Banner::create([
                'sub_title' => $request->sub_title,
                'title' => $request->title,
                'banner_image' => $newImageName,
                'description' => $request->description,
                'user_id' => $userID,
            ]);
            return redirect('/banners/create')->with('upload_success','Banner Uploaded Sucessfully!');
        }catch(Exception $e){
            return redirect('/banners/create')->with('upload_error','Could not uploaded!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit-banner',['banner' => $banner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'sub_title' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required',
           
        ]);
        if($request->banner_image){
            $request->validate([
                'banner_image' => 'mimes:jpg,png,jpeg'
            ]);
           
            $banner = Banner::findOrfail($id);
            $newImageName = uniqid().'_banner_image_'.'.'.$request->banner_image->extension();
            unlink(public_path('uploads/banners/'.$banner->banner_image));
            $request->banner_image->move(public_path('uploads/banners/'), $newImageName);
            try{
                $banner->sub_title = $request->sub_title;
                $banner->title = $request->title;
                $banner->banner_image = $newImageName;
                $banner->description = $request->description;
                $banner->save();
          
                return redirect('/banners/'.$id.'/edit')->with('update_success','Banner Updated Sucessfully!');
            }catch(Exception $e){
                return redirect('/banners/'.$id.'/edit')->with('update_error','Could not Updated!');
            }
        }else{
            try{
                $banner = Banner::findOrfail($id);
                $banner->sub_title = $request->sub_title;
                $banner->title = $request->title;
                $banner->description = $request->description;
                $banner->save();
          
                return redirect('/banners/'.$id.'/edit')->with('update_success','Banner Updated Sucessfully!');
            }catch(Exception $e){
                return redirect('/banners/'.$id.'/edit')->with('update_error','Could not Updated!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $banner = Banner::findOrFail($id);
        try{
            $banner->delete();
            unlink(public_path('uploads/banners/'.$banner->banner_image));
            return redirect('/banners')->with('success','Banner Item Deleted');
        }catch(Exception $e){
            return redirect('/banners')->with('error','Could not Deleted!');
        }
    }
    public function changeStatus($id){
        $banner = Banner::select('status')->where('id','=',$id)->first();

        if($banner->status == 1){
            $status = '0';
           
        }else{
            $status = '1';
        }
        $values = array('status' => $status);
        Banner::where('id',$id)->update($values);

        return redirect('/banners')->with('success',"Status Changed");
    }
}
