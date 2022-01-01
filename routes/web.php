<?php

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
Route::group(['middleware' => 'prevent-back-history'],function(){

Auth::routes();

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...
        Route::get('/', function () {
            return view('welcome');
        });




        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');


        Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
        Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
        Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
        Route::get('/admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

        //Password reset routes for admin
        Route::post('/admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
        Route::get('/admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
        Route::post('/admin/password/reset', 'Auth\ResetPasswordController@reset');
        Route::get('/admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');



        Route::group(['namespace' => 'Grades'], function () {
            Route::resource('Grades', 'GradeController');
        });

        //==============================Classrooms============================
        Route::group(['namespace' => 'Classrooms'], function () {
            Route::resource('Classrooms', 'ClassroomController');
            Route::post('delete_all', 'ClassroomController@delete_all')->name('delete_all');

            Route::post('Filter_Classes', 'ClassroomController@Filter_Classes')->name('Filter_Classes');

        });


        //==============================Sections============================

        Route::group(['namespace' => 'Sections'], function () {

            Route::resource('Sections', 'SectionController');

            Route::get('/classes/{id}', 'SectionController@getclasses');

        });

        //==============================parents============================

             Route::view('add_parent','livewire.show_Form')->name('add_parent');

        //==============================Teachers============================
        Route::group(['namespace' => 'Teachers'], function () {
            Route::resource('Teachers', 'TeacherController');
        });

        //==============================Students============================
        Route::group(['namespace' => 'Students'], function () {
            Route::resource('Students', 'StudentController');
            Route::get('/Get_classrooms/{id}', 'StudentController@Get_classrooms');
            Route::get('/Get_Sections/{id}', 'StudentController@Get_Sections');
        });
        Route::resource('settings', 'SettingController');
        });

        Route::group(['namespace' => 'Students'], function(){
            Route::get('pages/Students/pdfview','StudentController@pdfview')->name('pdfview');

        });

    });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
