<?php

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
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});
//Register login
Route::get('/user_register','RegisterController@index')->name('user_register');
Route::post('/user_save', 'RegisterController@create')->name('create');
Route::get('/user_login', 'LoginController@index')->name('user_login');
Route::post('/user_auth', 'LoginController@login')->name('user_auth');
Route::get('/forgot_password', 'LoginController@forgot_password')->name('forgot_password');







//Home Controller
Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/gallery', 'HomeController@gallery')->name('gallery');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/privacy_policy', 'HomeController@privacy_policy')->name('privacy_policy');
Route::get('/terms', 'HomeController@terms')->name('terms');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::post('/add_contact', 'HomeController@add_contact')->name('add_contact');

//Course Controller
Route::get('/courses', 'CourseController@index')->name('index');
Route::get('/course_details/{id}', 'CourseController@details');


/*After login*/
Route::prefix('customer')->namespace('Customer')->middleware('customer')->group(function(){
//Profile management
Route::get('/profile_manage', 'Customer@index')->name('profile_manage');
Route::get('/profile_course', 'Customer@profile_course')->name('profile_course');
Route::get('/edit_profile', 'Customer@edit');
Route::post('/update_user', 'Customer@update')->name('update_user');

//Change password
Route::get('/change_password', 'Customer@changepassword');
Route::post('/update_password', 'Customer@update_password')->name('update_password');

//get course details
Route::get('/get_course_detail', 'Customer@course_details');

//get course details
Route::get('/buy_detail', 'Customer@buy_detail');

//Add batch to student profile
Route::post('/add_batch', 'Customer@add_batch')->name('add_student_batch');



//Payment Gateway
Route::get('/payment_processing', 'PaymentController@payment_processing')->name('payment_processing');


});

Route::post('/payment_status', 'Customer\PaymentController@payment_status')->name('customer.payment_status');


Route::name('user-logout')->get('/logout',function(){
		Auth::guard('customer')->logout();
        return Redirect::route('home');
    });

/*Admin Panel all routs */


//Login
Route::get('/admin', function () {
     return view('admin/index');
})->name('adminLogin');
Route::post('/admin_login', 'AdminLoginController@login');

//Forget Password Admin
/*Route::get('/admin/reset', function () {
     return view('admin/forget-password');
})->name('adminforget');*/

Auth::routes();


Route::prefix('admin')->namespace('Admin')->group(function(){
Route::group(['middleware' => ['auth']], function() { 

/*Dashboard*/
Route::get('/dashboard', 'AdminDashboard@index')->name('dashboard');

/*Students*/
Route::get('/trainee', 'Students@index');
Route::get('/change_student_status', 'Students@update_status');
Route::get('/view-student/{id}', 'Students@view');

/*Batches*/
Route::get('/batch', 'Batch@index')->name('batch');
Route::post('/add_batch', 'Batch@store')->name('add_batch');
Route::get('/edit_batch/{id}', 'Batch@edit');
Route::post('/update_batch/{id}', 'Batch@update');
Route::get('/delete_batch/{id}', 'Batch@destroy');
Route::get('/delete_student/{id}', 'Students@destroy');
Route::get('/view-batch/{id}', 'Batch@view');
Route::get('/attend_batch/{id}', 'Batch@attend_batch');
Route::post('/add_leave', 'Batch@add_leave')->name('add_leave');
Route::get('/edit_leave/{id}', 'Batch@edit_leave');
Route::post('/update_leave/{id}', 'Batch@update_leave');

/*Testimonial*/
Route::get('/testimonial', 'Testimonial@index')->name('testimonial');
Route::post('/add_testimonial', 'Testimonial@store')->name('add_testimonial');
Route::get('/edit_testimonial/{id}', 'Testimonial@edit');
Route::post('/update_testimonial/{id}', 'Testimonial@update');
Route::get('/delete_testimonial/{id}', 'Testimonial@destroy'); 

/*Banners*/
Route::get('/banner', 'Banner@index')->name('banner');
Route::post('/add_banner', 'Banner@store')->name('add_banner');
Route::get('/edit_banner/{id}', 'Banner@edit');
Route::post('/update_banner/{id}', 'Banner@update');
Route::get('/delete_banner/{id}', 'Banner@destroy'); 
/*Gallery*/
Route::get('/gallery', 'Gallery@index')->name('gallery');
Route::post('/add_gallery', 'Gallery@store')->name('add_gallery');
Route::get('/edit_gallery/{id}', 'Gallery@edit');
Route::post('/update_gallery/{id}', 'Gallery@update');
Route::get('/delete_gallery/{id}', 'Gallery@destroy'); 

/*video*/
Route::get('/video', 'Video@index')->name('video');
Route::post('/add_video', 'Video@store')->name('add_video');
Route::get('/edit_video/{id}', 'Video@edit');
Route::post('/update_video/{id}', 'Video@update');
Route::get('/delete_video/{id}', 'Video@destroy'); 

/*classtype*/
Route::get('/classtype', 'Classtype@index')->name('classtype');
Route::post('/add_classtype', 'Classtype@store')->name('add_classtype');
Route::get('/edit_classtype/{id}', 'Classtype@edit');
Route::post('/update_classtype/{id}', 'Classtype@update');
Route::get('/delete_classtype/{id}', 'Classtype@destroy'); 

/*Expenses*/
Route::get('/expenses', 'Expenses@index')->name('expenses');
Route::post('/add_expenses', 'Expenses@store')->name('add_expenses');
Route::get('/edit_expenses/{id}', 'Expenses@edit');
Route::post('/update_expenses/{id}', 'Expenses@update');
Route::get('/delete_expenses/{id}', 'Expenses@destroy'); 

/*course*/
Route::get('/course', 'Course@index')->name('course');
Route::post('/add_course', 'Course@store')->name('add_course');
Route::get('/edit_course/{id}', 'Course@edit');
Route::post('/update_course/{id}', 'Course@update');
Route::get('/delete_course/{id}', 'Course@destroy'); 

/*Reports*/
Route::get('/report', 'Report@index')->name('report');
Route::get('/quaterly_report', 'Report@quaterly')->name('quaterly_report');
Route::get('/class_report/{id}', 'Report@classbase')->name('class_report');
Route::get('/student_report', 'Report@studentbase')->name('student_report');
/*Reports*/

/*Reports*/
Route::get('/all_payments', 'PaymentController@index')->name('all_payments');
/*Reports*/



/*Profile*/
Route::get('/edit_profile', 'Profile@edit')->name('edit_profile');
Route::post('/update_profile/{id}', 'Profile@update');
    
/*Profile*/
Route::get('/admin_change_password', function () {
return view('admin/change-password');
})->name('admin_change_password'); 
Route::post('/admin_update_password/{id}', 'AdminPassword@update');


/*Logout*/
Route::name('admin-logout')->get('/logout',function(){
Auth::logout();
return Redirect::route('adminLogin');
});
});    
});