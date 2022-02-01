<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    //
    public function index(){
        $portfolioes = Portfolio::all();
        return view('admin.portfolio.portfolio',['portfolioes' => $portfolioes]);
    }

    public function create(){
        return view('admin.portfolio.add-portfolio');
    }

    public function store(Request $request){
        
        //
        $request->validate([
            'category' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required',
            'portfolio_image' => 'required|mimes:jpg,png,jpeg'
        ]);
        $newImageName = uniqid().'_portfolio_image_'.'.'.$request->portfolio_image->extension();
        $request->portfolio_image->move(public_path('uploads/portfolioes/'), $newImageName);
        $userID = Auth::user()->id;
        $slug =  trim(strtolower(str_replace(' ','-',$request->title)));
        try{
            Portfolio::create([
                'category' => $request->category,
                'title' => $request->title,
                'portfolio_slug' => $slug,
                'portfolio_image' => $newImageName,
                'description' => $request->description,
                'user_id' => $userID,
            ]);
            return redirect('/portfolio/create')->with('upload_success','Portfolio Uploaded Sucessfully!');
        }catch(Exception $e){
            return redirect('/portfolio/create')->with('upload_error','Could not uploaded!');
        }
    }

    public function edit($id){
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.edit-portfolio',['portfolio' => $portfolio]);
    }
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'category' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required',
           
        ]);
        if($request->portfolio_image){
            $request->validate([
                'portfolio_image' => 'mimes:jpg,png,jpeg'
            ]);
           
            $portfolio = Portfolio::findOrfail($id);
            $newImageName = uniqid().'_portfolio_image_'.'.'.$request->portfolio_image->extension();
            unlink(public_path('uploads/portfolioes/'.$portfolio->portfolio_image));
            $request->portfolio_image->move(public_path('uploads/portfolioes/'), $newImageName);
            $slug =  trim(strtolower(str_replace(' ','-',$request->title)));
            try{
                $portfolio->category = $request->category;
                $portfolio->title = $request->title;
                $portfolio->portfolio_slug = $slug;
                $portfolio->portfolio_image = $newImageName;
                $portfolio->description = $request->description;
                $portfolio->save();
          
                return redirect('/portfolio/'.$id.'/edit')->with('update_success','Portfolio Updated Sucessfully!');
            }catch(Exception $e){
                return redirect('/portfolio/'.$id.'/edit')->with('update_error','Could not Updated!');
            }
        }else{
            try{
                $slug =  trim(strtolower(str_replace(' ','-',$request->title)));
                $portfolio = Portfolio::findOrfail($id);
                $portfolio->category = $request->category;
                $portfolio->title = $request->title;
                $portfolio->portfolio_slug = $slug;
                $portfolio->description = $request->description;
                $portfolio->save();
          
                return redirect('/portfolio/'.$id.'/edit')->with('update_success','Portfolio Updated Sucessfully!');
            }catch(Exception $e){
                return redirect('/portfolio/'.$id.'/edit')->with('update_error','Could not Updated!');
            }
        }
    }
    public function changeStatus($id){
        $banner = Portfolio::select('status')->where('id','=',$id)->first();

        if($banner->status == 1){
            $status = '0';
           
        }else{
            $status = '1';
        }
        $values = array('status' => $status);
        Portfolio::where('id',$id)->update($values);

        return redirect('/portfolioes')->with('success',"Status Changed");
    }

    public function destroy($id)
    {
        //
        $portfolio = Portfolio::findOrFail($id);
        try{
            $portfolio->delete();
            unlink(public_path('uploads/portfolioes/'.$portfolio->portfolio_image));
            return redirect('/portfolioes')->with('success','Portfolio Item Deleted');
        }catch(Exception $e){
            return redirect('/portfolioes')->with('error','Could not Deleted!');
        }
    }
}
