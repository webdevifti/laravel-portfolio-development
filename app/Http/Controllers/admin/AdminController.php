<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $banner = Banner::all();
        $about = About::all();
        $portfolio = Portfolio::all();
        $brand = Brand::all();
        $testimonial = Testimonial::all();
        $service = Service::all();
        return view('admin.index',compact('banner','about','portfolio','brand','testimonial','service'));
    }
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }
}
