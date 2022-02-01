<?php

use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\PortfolioController;
use App\Http\Controllers\admin\TestimonialController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
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


Auth::routes(['register' => false]);
Route::post('logout', [AdminController::class, 'logout'])->name('logout');
Route::get('/admin', [AdminController::class, 'index'])->name('admin');



Route::group(['middleware' => ['protectedRoutes']], function(){
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
});