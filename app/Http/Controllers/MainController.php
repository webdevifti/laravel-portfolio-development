<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Education;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\SocialLink;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function index(){
        $banner_data = Banner::where('status','=',1)->first();
        $about_data = About::where('status','=',1)->first();
        $portfolio_data = Portfolio::where('status','=',1)->get();
        $testimonial_data = Testimonial::where('status','=',1)->get();
        $service_data = Service::where('status','=',1)->limit(6)->get();
        $brand_data = Brand::where('status','=',1)->get();
        $social_data = SocialLink::where('status','=',1)->get();
        $education_data = Education::where('status','=',1)->orderBy('passing_year','DESC')->get();
        return view('index',['banners' => $banner_data,'about_data' => $about_data,'portfolio_data'=> $portfolio_data, 'testimonials' => $testimonial_data,'services' => $service_data,'brands'=>$brand_data,'social_links'=>$social_data,'educations' => $education_data]);
    }
    public function show($id, $slug){
        
        $portfolio = Portfolio::findOrFail($id);
        $get_user_id = Portfolio::select('user_id')->where('id','=',$id)->first();
        $user = User::findOrFail($get_user_id)->first();
        return view('work',['portfolio' => $portfolio,'user' => $user]);

    }
}
