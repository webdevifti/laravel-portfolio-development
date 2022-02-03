<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EducationController extends Controller
{
    //

    public function index(){
        $educations = Education::all();
        return view('admin.education.educations',compact('educations'));
    }
    public function create(){
        return view('admin.education.add-education');
    }

    public function store(Request $request){
        $request->validate([
            'passing_year' => 'required|integer',
            'certification' => 'required|string',
            'result' => 'required',
        ]);
        $userID = Auth::user()->id;
        try{
            Education::create([
                'passing_year' => $request->passing_year,
                'certification' => $request->certification,
                'result_gpa' => $request->result,
                'user_id' => $userID,
            ]);
            return redirect('education/create')->with('upload_success','Education has been added successfully.');
        }catch(Exception $e){
            return redirect('education/create')->with('upload_error','Could not added!.');
        }
    }
    public function edit($id){
        $education = Education::findOrFail($id);
       
        return view('admin.education.edit-education',['education' => $education]);
    }
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'passing_year' => 'required|integer',
            'certification' => 'required|string',
            'result' => 'required',
        ]);
       
        $education = Education::findOrfail($id);
        
        try{
            $education->passing_year = $request->passing_year;
            $education->certification = $request->certification;
            $education->result_gpa = $request->result;
            $education->save();
        
            return redirect('/education/'.$id.'/edit')->with('update_success','Education Updated Sucessfully!');
        }catch(Exception $e){
            return redirect('/education/'.$id.'/edit')->with('update_error','Could not Updated!');
        }
        
    }
    public function changeStatus($id){
        $edu = Education::select('status')->where('id','=',$id)->first();

        if($edu->status == 1){
            $status = '0';
           
        }else{
            $status = '1';
        }
        $values = array('status' => $status);
        Education::where('id',$id)->update($values);

        return redirect('/educations')->with('success',"Status Changed");
    }

    public function destroy($id)
    {
        //
        $education = Education::findOrFail($id);
        try{
            $education->delete();
            
            return redirect('/educations')->with('success','Education Item Deleted');
        }catch(Exception $e){
            return redirect('/educations')->with('error','Could not Deleted!');
        }
    }
}
