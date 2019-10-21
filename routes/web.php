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

// Route::get('/', function () {
//     return view('welcome');
// });

// For Frontend
Route::get('/', 'FrontendController@getCourses')->name('showCourses');

Route::get('/registerstudent', 'FrontendController@showRegisterForm')->name('showRegisterStudent');

Route::get('/showmentors', 'FrontendController@getMentors')->name('showMentors');

Route::get('/info', 'FrontendController@showInfo')->name('showinfo');

Route::post('/getstudentforcoleader','FrontendController@getstudentforcoleader')->name('getstudentforcoleader');

Route::post('/getstudentformembers','FrontendController@getstudentformembers')->name('getstudentformembers');

Route::get('/creategroup', 'FrontendController@createGroup')->name('showCreateGroup');

Route::resource('/group','GroupController'); //7

// For Dashboard Page
Route::get('/dashboard',function (){
	return view('dashboard');
})->name('dashboard')->middleware('auth');

// For Teacher Role / testing project
Route::group(['middleware' => ['permission:give instrations to student project']], function () {
    Route::get('/testingproject',function (){
		return view('teacher.testingproject');
	})->name('testingproject');
});

Route::group(['middleware' => ['role:admin']], function () {
	// Fro Assign Mentor
	Route::get('/assignmentor','AssignMentorController@create')->name('assignmentor');
	Route::post('/getgroups','AssignMentorController@getgroups')->name('getgroups');

	Route::post('/assignmentor','AssignMentorController@store')->name('assignmentor.store');
	// For Admin Setup
	Route::resource('/courses','CourseController');

	Route::resource('/batches','BatchController');

	Route::resource('/mentors','MentorController');
});

// For Student
Route::resource('/students','StudentController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Login For Mentor
Route::get('/login/mentor', 'Auth\LoginController@showMentorLoginForm')->name('login.mentor');

Route::post('/login/mentor', 'Auth\LoginController@mentorLogin');

Route::group(['middleware' => 'auth:mentor','prefix'=>'mentor'], function () {
    Route::view('/uploadproject', 'mentor.uploadproject');
});
