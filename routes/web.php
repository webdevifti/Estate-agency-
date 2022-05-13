<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\TeamMemberController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\admin\BlogPostController;
use App\Http\Controllers\admin\ContactPageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\site\AboutController;
use App\Http\Controllers\site\AgentController;
use App\Http\Controllers\site\BlogController;
use App\Http\Controllers\site\ContactController;
use App\Http\Controllers\site\PropertiesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [AboutController::class, 'index'])->name('about');
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact');
Route::get('/properties', [PropertiesController::class, 'index'])->name('properties');
Route::get('/property/show/{slug}', [PropertiesController::class, 'show'])->name('property.single');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/show/{slug}', [BlogController::class, 'show'])->name('blog.single');
Route::get('/agents', [AgentController::class, 'index'])->name('agents');
Route::get('/agents/show/{id}', [AgentController::class, 'show'])->name('agent.single');
Route::get('/join-as-a-agent', [AgentController::class, 'join'])->name('agent.join');
Route::post('/joining-agent', [AgentController::class, 'registerAgent'])->name('agent.register');
Route::get('/agent/verify/email', [AgentController::class, 'verifyAgent']);
Route::get('/agent/account', [AgentController::class, 'account'])->name('agent.account');
Route::post('/agent/pass/update', [AgentController::class, 'passwordUpdate'])->name('agent.pass.update');
Route::post('/agent/profile/update', [AgentController::class, 'profileUpdate'])->name('agent.profile.update');
Route::post('/agent/logout', [AgentController::class, 'logout'])->name('agent.logout');
Route::post('/agent/login',[AgentController::class, 'login'])->name('agent.login');
Route::get('/agent/property/add', [PropertiesController::class, 'create'])->name('add.property');
Route::post('/agent/property/store', [PropertiesController::class, 'store'])->name('agent.store.property');
Route::get('/property/search', [PropertiesController::class, 'search'])->name('search');
Auth::routes(['register' => false]);

Route::post('/contact-with-us/message', [ContactController::class, 'contact']);


Route::get('/admin-panel', [AdminController::class, 'index'])->name('admin.panel');
Route::group(['prefix' => 'admin-panel', 'as' => 'admin.'], function(){
    // Testimonial Routes
    Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonial');
    Route::post('/testimonials/create', [TestimonialController::class, 'create'])->name('testimonial.add');
    Route::get('/testimonials/status/{id}', [TestimonialController::class, 'statusChange'])->name('testimonial.status');
    Route::get('/testimonials/delete/{id}', [TestimonialController::class, 'delete'])->name('testimonial.delete');

    // Team Member Routes
    Route::resource('/team-member', TeamMemberController::class);
    Route::get('/team-member/status/{id}', [TeamMemberController::class, 'statusChange'])->name('team-member.status');
    
    //Blog Routes
    Route::resource('/blog', BlogPostController::class);
    Route::get('/blog/status/{id}', [BlogPostController::class, 'statusChange'])->name('blog.status');

    Route::post('/category/create', [CategoryController::class, 'store'])->name('category.store');

    Route::get('/contact-page', [ContactPageController::class, 'index'])->name('contact.page');
    Route::put('/contact-page/page-info-top/update/{id}', [ContactPageController::class, 'pageinfoTop'])->name('contact.basic');
    Route::put('/contact-page/contact-map/update/{id}', [ContactPageController::class, 'mapUpdate'])->name('contact.map');
    Route::put('/contact-page/contact-info/update/{id}', [ContactPageController::class, 'ContactInfoUpdate'])->name('contact.info.update');
    Route::put('/contact-page/contact-social/update/{id}', [ContactPageController::class, 'ContactSocialUpdate'])->name('contact.social');
});
