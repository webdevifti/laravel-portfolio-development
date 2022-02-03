<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Funfact;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FunFactController extends Controller
{
    //
    public function index(){
        $funfacts = Funfact::all();
        return view('admin.funfact.funfacts',compact('funfacts'));
    }

    public function create(){
        $all_font = fa_icons();
        return view('admin.funfact.add-fun',compact('all_font'));
    }
    public function store(Request $request){
        $request->validate([
            'icon' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'counter_number' => 'required|integer',
        ]);
       
        $userID = Auth::user()->id;
        try{
            Funfact::create([
                'icon' => $request->icon,
                'title' => $request->title,
                'counter_number' => $request->counter_number,
                'user_id' => $userID,
            ]);
            return redirect('/funfact/create')->with('upload_success','Funfact Uploaded Sucessfully!');
        }catch(Exception $e){
            return redirect('/funfact/create')->with('upload_error','Could not uploaded!');
        }
    }
    public function edit($id){
        $fun = Funfact::findOrFail($id);
        $all_font = fa_icons();
        return view('admin.funfact.edit-fun',['fun' => $fun,'all_font'=>$all_font]);
    }
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'icon' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'counter_number' => 'required|integer',
           
        ]);
       
        $fun = Funfact::findOrfail($id);
        
        try{
            $fun->icon = $request->icon;
            $fun->title = $request->title;
            $fun->counter_number = $request->counter_number;
            $fun->save();
        
            return redirect('/funfact/'.$id.'/edit')->with('update_success','Funfact Updated Sucessfully!');
        }catch(Exception $e){
            return redirect('/funfact/'.$id.'/edit')->with('update_error','Could not Updated!');
        }
        
    }
    public function changeStatus($id){
        $fun = Funfact::select('status')->where('id','=',$id)->first();

        if($fun->status == 1){
            $status = '0';
           
        }else{
            $status = '1';
        }
        $values = array('status' => $status);
        Funfact::where('id',$id)->update($values);

        return redirect('/funfacts')->with('success',"Status Changed");
    }

    public function destroy($id)
    {
        //
        $funfact = Funfact::findOrFail($id);
        try{
            $funfact->delete();
            
            return redirect('/funfacts')->with('success','Funfact Item Deleted');
        }catch(Exception $e){
            return redirect('/funfacts')->with('error','Could not Deleted!');
        }
    }
}
