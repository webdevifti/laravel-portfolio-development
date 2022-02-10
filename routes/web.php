<?php

use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\AddressController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\EducationController;
use App\Http\Controllers\admin\FunFactController;
use App\Http\Controllers\admin\PortfolioController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\SiteInformation;
use App\Http\Controllers\admin\SocialLinksController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('frontend');
Route::get('/work/{id}/{slug}', [MainController::class, 'show'])->name('single_work');


Route::get('/email/sent', function(){
    Mail::to('01iftekharalam@gmail.com')->send(new WelcomeMail);
    return new WelcomeMail;
});


Auth::routes(['register' => false]);
Route::post('logout', [AdminController::class, 'logout'])->name('logout');
Route::get('/admin', [AdminController::class, 'index'])->name('admin');



Route::group(['middleware' => ['protectedRoutes']], function(){

    //User Profile Routes
    Route::get('/profile',[ProfileController::class,'index'])->name('profile');
    Route::put('/profile/{id}',[ProfileController::class,'update'])->name('profile.update');
    Route::put('/profile/changepass/{id}',[ProfileController::class,'updatePassword'])->name('profile.updatepass');

    // Address Routes
    Route::group(['middleware' => ['userRole']], function(){

        Route::get('/address-information',[AddressController::class, 'index'])->name('address');
        Route::put('/address/{id}',[AddressController::class, 'update'])->name('address.update');
        // Site Information Routes
        Route::get('/site-information', [SiteInformation::class, 'index'])->name('site.information');
        Route::put('/site/information/{id}', [SiteInformation::class, 'updateInformation'])->name('site.information.update');
        Route::put('/site/logo/{id}', [SiteInformation::class, 'updateLogo'])->name('site.logo.update');
        Route::put('/site/icon/{id}', [SiteInformation::class, 'updateSiteIcon'])->name('site.icon.update');
        
            //  User Profile Routes
            Route::get('/users',[UserController::class, 'index'])->name('user.index');
            Route::get('/user/create',[UserController::class, 'create'])->name('user.create');
            Route::post('/user/create',[UserController::class, 'store'])->name('user.store');
            Route::delete('/user/{id}',[UserController::class,'destroy'])->name('about.delete');
            Route::get('/user/status/{id}',[UserController::class,'changeStatus']);
    });



    // Routes For Banner Section
    Route::get('/banners',[BannerController::class,'index'])->name('banners.index');
    Route::get('/banners/create',[BannerController::class,'create'])->name('banners.create');
    Route::post('/banners/create',[BannerController::class,'store'])->name('banners.store');
    Route::get('/banners/{id}/edit',[BannerController::class,'edit'])->name('banners.edit');
    Route::put('/banners/{id}',[BannerController::class,'update'])->name('banners.update');
    Route::delete('/banners/{id}',[BannerController::class,'destroy'])->name('banners.delete');
    Route::get('/banners/status/{id}', [BannerController::class ,'changeStatus']);


    // Routes For About Section
    Route::get('/about',[AboutController::class,'index'])->name('about.index');
    Route::get('/about/create',[AboutController::class,'create'])->name('about.create');
    Route::post('/about/create',[AboutController::class,'store'])->name('about.store');
    Route::get('/about/{id}/edit',[AboutController::class,'edit'])->name('about.edit');
    Route::put('/about/{id}',[AboutController::class,'update'])->name('about.update');
    Route::delete('/about/{id}',[AboutController::class,'destroy'])->name('about.delete');
    Route::get('/about/status/{id}', [AboutController::class ,'changeStatus']);

    // Routes For Education Section
    Route::get('/educations',[EducationController::class,'index'])->name('education.index');
    Route::get('/education/create',[EducationController::class,'create'])->name('education.create');
    Route::post('/education/create',[EducationController::class,'store'])->name('education.store');
    Route::get('/education/{id}/edit',[EducationController::class,'edit'])->name('education.edit');
    Route::put('/education/{id}',[EducationController::class,'update'])->name('education.update');
    Route::delete('/education/{id}',[EducationController::class,'destroy'])->name('education.delete');
    Route::get('/education/status/{id}', [EducationController::class ,'changeStatus']);

    // Routes Portfolioes
    Route::get('/portfolioes',[PortfolioController::class,'index'])->name('portfolio.index');
    Route::get('/portfolio/create',[PortfolioController::class,'create'])->name('portfolio.create');
    Route::post('/portfolio/create',[PortfolioController::class,'store'])->name('portfolio.store');
    Route::get('/portfolio/{id}/edit',[PortfolioController::class,'edit'])->name('portfolio.edit');
    Route::put('/portfolio/{id}',[PortfolioController::class,'update'])->name('portfolio.update');
    Route::delete('/portfolio/{id}',[PortfolioController::class,'destroy'])->name('portfolio.delete');
    Route::get('/portfolio/status/{id}', [PortfolioController::class ,'changeStatus']); 

    // Routes Testimonial
    Route::get('/testimonials',[TestimonialController::class,'index'])->name('testimonial.index');
    Route::get('/testimonial/create',[TestimonialController::class,'create'])->name('testimonial.create');
    Route::post('/testimonial/create',[TestimonialController::class,'store'])->name('testimonial.store');
    Route::get('/testimonial/{id}/edit',[TestimonialController::class,'edit'])->name('testimonial.edit');
    Route::put('/testimonial/{id}',[TestimonialController::class,'update'])->name('testimonial.update');
    Route::delete('/testimonial/{id}',[TestimonialController::class,'destroy'])->name('testimonial.delete');
    Route::get('/testimonial/status/{id}', [TestimonialController::class ,'changeStatus']); 

    // Routes Services
    Route::get('/services',[ServiceController::class,'index'])->name('service.index');
    Route::get('/service/create',[ServiceController::class,'create'])->name('service.create');
    Route::post('/service/create',[ServiceController::class,'store'])->name('service.store');
    Route::get('/service/{id}/edit',[ServiceController::class,'edit'])->name('service.edit');
    Route::put('/service/{id}',[ServiceController::class,'update'])->name('service.update');
    Route::delete('/service/{id}',[ServiceController::class,'destroy'])->name('service.delete');
    Route::get('/service/status/{id}', [ServiceController::class ,'changeStatus']); 

    // Routes Brands
    Route::get('/brands',[BrandController::class,'index'])->name('brand.index');
    Route::get('/brand/create',[BrandController::class,'create'])->name('brand.create');
    Route::post('/brand/create',[BrandController::class,'store'])->name('brand.store');
    Route::get('/brand/{id}/edit',[BrandController::class,'edit'])->name('brand.edit');
    Route::put('/brand/{id}',[BrandController::class,'update'])->name('brand.update');
    Route::delete('/brand/{id}',[BrandController::class,'destroy'])->name('brand.delete');
    Route::get('/brand/status/{id}', [BrandController::class ,'changeStatus']);

    // Routes Social Links
    Route::get('/socials',[SocialLinksController::class,'index'])->name('social.index');
    Route::get('/social/create',[SocialLinksController::class,'create'])->name('social.create');
    Route::post('/social/create',[SocialLinksController::class,'store'])->name('social.store');
    Route::get('/social/{id}/edit',[SocialLinksController::class,'edit'])->name('social.edit');
    Route::put('/social/{id}',[SocialLinksController::class,'update'])->name('social.update');
    Route::delete('/social/{id}',[SocialLinksController::class,'destroy'])->name('social.delete');
    Route::get('/social/status/{id}', [SocialLinksController::class ,'changeStatus']);
     // Routes Fun Facts
     Route::get('/funfacts',[FunFactController::class,'index'])->name('funfact.index');
     Route::get('/funfact/create',[FunFactController::class,'create'])->name('funfact.create');
     Route::post('/funfact/create',[FunFactController::class,'store'])->name('funfact.store');
     Route::get('/funfact/{id}/edit',[FunFactController::class,'edit'])->name('funfact.edit');
     Route::put('/funfact/{id}',[FunFactController::class,'update'])->name('funfact.update');
     Route::delete('/funfact/{id}',[FunFactController::class,'destroy'])->name('funfact.delete');
     Route::get('/funfact/status/{id}', [FunFactController::class ,'changeStatus']);
});
