<?php

use App\Http\Controllers\Admin\admincontroller;
use App\Http\Controllers\Auth\Authcontroller;
use App\Http\Controllers\Contact\Contactcontroller;
use App\Http\Controllers\Course\Coursecontroller;
use App\Http\Controllers\Faqs\FaqFormcontroller;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Review\Reviewcontroller;
use App\Http\Controllers\Slider\Slidercontroller;
use App\Http\Controllers\Teacher\Teachercontroller;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\SliderRequest;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Homecontroller::class , 'home']);
Route::group(['prefix' => '/admin'] , function(){

    Route::get('/login' , [Authcontroller::class , 'getlogin'])->name('login_form');
    Route::post('/login' , [Authcontroller::class , 'postlogin'])->name('login');
    
    Route::get('/register' , [Authcontroller::class , 'getregister'])->name('register_form');
    Route::post('/register' , [Authcontroller::class , 'postregister'])->name('register');
    Route::get('/register/data' , [Authcontroller::class , 'getdata'])->name('register_data');

});

Route::group(['prefix' => '/admin' , 'middleware' => 'auth'] , function(){
    Route::get('' , [Admincontroller::class , 'admin'])->name('index');

    Route::post('/logout' , [Authcontroller::class , 'logout'])->name('logout');

    Route::group(['prefix' => '/faq' ] , function(){
        Route::post('/create' , [FaqFormcontroller::class, 'faqs'])->name("faq_form");
        Route::match(['get' , 'post'] , '/data' , [FaqFormcontroller::class, 'faq_data'])->name("faq_data");
        Route::post('/postanswer' , [FaqFormcontroller::class, 'sending'])->name("faq_ans");
        Route::get('/form/data' , [FaqFormcontroller::class, 'getdata'])->name("faq_form_data");
        Route::get('/answers' , [FaqFormcontroller::class, 'getanswer'])->name("faq_answer");
        Route::get('/updateform/{answer_id}' , [FaqFormcontroller::class, 'formupdate'])->name("faq_update");
        Route::put('/update/answer' , [FaqFormcontroller::class , 'update'])->name('update_ans');
    });
    
    Route::group(['prefix' => '/contact' ] , function(){
        Route::post('/us' , [Contactcontroller::class , 'creating'])->name('contact');
        Route::get('/data' , [Contactcontroller::class , 'getdata'])->name('our_contact');
    });
    
    Route::group(['prefix' => '/review'],function(){

        Route::get('/form' , [Reviewcontroller::class , 'reviewform'])->name('review_form');
        Route::post('/created' , [Reviewcontroller::class , 'creating'])->name('review');
        Route::get('/data' , [Reviewcontroller::class , 'getdata'])->name('std_review');
    });

    Route::group(['prefix' => '/slider'],function(){
        Route::get('/form' , [Slidercontroller::class , 'getslider'])->name('getting');
        Route::post('/posting' , [Slidercontroller::class , 'creating'])->name('create_slider');
        Route::get('/data' , [Slidercontroller::class , 'sliding'])->name('get_slider');
        Route::delete('/delete' , [Slidercontroller::class , 'deleting'])->name('delete_slider');
        Route::get('/update/form/{slider_id}' , [Slidercontroller::class, 'update_form'])->name("slider_update_form");
        Route::put('/update' , [Slidercontroller::class, 'updating'])->name("update_slider");
    });

    Route::group(['prefix' => '/course'] , function(){
        Route::get('/form' , [Coursecontroller::class , 'course_form'])->name('course_form');
        Route::post('/create' , [Coursecontroller::class , 'postcourse'])->name('create_course');
        Route::get('/data' , [Coursecontroller::class , 'course_data'])->name('course_data');
        Route::delete('/delete' , [Coursecontroller::class , 'deleting'])->name('delete_course');
        Route::get('/form/update/{course_id}' , [Coursecontroller::class , 'update_form'])->name('course_update_form');
        Route::put('/update' , [Coursecontroller::class , 'updatecourse'])->name('update_course');
    });

    Route::group(['prefix' => '/teacher'] , function(){
        Route::get('/form' , [Teachercontroller::class , 'index'])->name('teacher_form');
        Route::post('/create' , [Teachercontroller::class , 'postteacher'])->name('create_teacher');
    });
});




