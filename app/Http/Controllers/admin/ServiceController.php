<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    //
    public function index(){
        $services = Service::all();
        return view('admin.service.services',['services'=> $services]);
    }

    public function create(){
        
        $all_font = fa_icons();
        return view('admin.service.add-service', ['all_font' => $all_font]);
    }
    public function store(Request $request){
        $request->validate([
            'service_icon' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required',
        ]);
       
        $userID = Auth::user()->id;
        try{
            Service::create([
                'icon_class' => $request->service_icon,
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => $userID,
            ]);
            return redirect('/service/create')->with('upload_success','Service Uploaded Sucessfully!');
        }catch(Exception $e){
            return redirect('/service/create')->with('upload_error','Could not uploaded!');
        }
    }

    public function edit($id){
        $service = Service::findOrFail($id);
        $all_font = fa_icons();
        return view('admin.service.edit-service',['service' => $service,'all_font'=>$all_font]);
    }
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'service_icon' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required',
           
        ]);
       
        $service = Service::findOrfail($id);
        
        try{
            $service->icon_class = $request->service_icon;
            $service->title = $request->title;
            $service->description = $request->description;
            $service->save();
        
            return redirect('/service/'.$id.'/edit')->with('update_success','Service Updated Sucessfully!');
        }catch(Exception $e){
            return redirect('/service/'.$id.'/edit')->with('update_error','Could not Updated!');
        }
        
    }
    public function changeStatus($id){
        $banner = Service::select('status')->where('id','=',$id)->first();

        if($banner->status == 1){
            $status = '0';
           
        }else{
            $status = '1';
        }
        $values = array('status' => $status);
        Service::where('id',$id)->update($values);

        return redirect('/services')->with('success',"Status Changed");
    }

    public function destroy($id)
    {
        //
        $service = Service::findOrFail($id);
        try{
            $service->delete();
            
            return redirect('/services')->with('success','Service Item Deleted');
        }catch(Exception $e){
            return redirect('/services')->with('error','Could not Deleted!');
        }
    }
}
