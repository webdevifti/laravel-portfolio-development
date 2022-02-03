<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SiteInformation as ModelSiteInfo;
use Exception;
use Illuminate\Http\Request;

class SiteInformation extends Controller
{
    //
    public function index(){
        $info = ModelSiteInfo::first();
        return view('admin.site-information',compact('info'));
    }

    public function updateInformation(Request $request, $id){
        $request->validate([
            'site_description' => 'required',
            'site_keyword' => 'required',
            'copyright_text' => 'required'
        ]);

        $i = ModelSiteInfo::findOrFail($id);
        try{
            $i->site_description = $request->site_description;
            $i->site_keyword = $request->site_keyword;
            $i->copyright_text = $request->copyright_text;
            $i->save();
            return redirect('/site-information')->with('success','Save Changed');
        }catch(Exception $e){
            return redirect('/site-information')->with('error','Save Changed');
        }
    }

    public function updateLogo(Request $request, $id){
        $request->validate([
            'logo' => 'required',
        ]);
        if($request->logo){
            $request->validate([
                'logo' => 'mimes:jpg,png,jpeg'
            ]);
           
            $logo = ModelSiteInfo::findOrfail($id);
            $newImageName = uniqid().'_logo_'.'.'.$request->logo->extension();
            unlink(public_path('uploads/logo/'.$logo->logo));
            $request->logo->move(public_path('uploads/logo/'), $newImageName);
            try{
                
                $logo->logo = $newImageName;
                $logo->save();
          
                return redirect('/site-information')->with('success','Updated Sucessfully!');
            }catch(Exception $e){
                return redirect('/site-information')->with('error','Could not Updated!');
            }
        }
    }
    public function updateSiteIcon(Request $request, $id){
        $request->validate([
            'site_icon' => 'required',
        ]);
        if($request->site_icon){
            $request->validate([
                'site_icon' => 'mimes:jpg,png,jpeg'
            ]);
           
            $site_icon = ModelSiteInfo::findOrfail($id);
            $newImageName = uniqid().'_site_icon_'.'.'.$request->site_icon->extension();
            unlink(public_path('uploads/logo/'.$site_icon->site_icon));
            $request->site_icon->move(public_path('uploads/logo/'), $newImageName);
            try{
                
                $site_icon->site_icon = $newImageName;
                $site_icon->save();
          
                return redirect('/site-information')->with('success','Updated Sucessfully!');
            }catch(Exception $e){
                return redirect('/site-information')->with('error','Could not Updated!');
            }
        }
    }
}
