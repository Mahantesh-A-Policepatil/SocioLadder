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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::Resource('experience', 'ExperienceController')->middleware('admin');
Route::group(['middleware' => ['auth']], function() {
	Route::Resource('experience', 'ExperienceController');
	Route::Resource('skills', 'SkillController');
	Route::get('exp_pdfview',array('as'=>'exp_pdfview','uses'=>'ExperienceController@exp_pdfview'));
	Route::get('skills_pdfview',array('as'=>'skills_pdfview','uses'=>'SkillController@skills_pdfview'));


	Route::get("addmore","ExperienceController@addMore")->name('experience.addmore');
	Route::post("addmore","ExperienceController@addMoreExp")->name('addmoreExp');

	Route::get("addmoreSkills","SkillController@addmoreSkills")->name('skills.addmoreSkills');
	Route::post("addmoreSkills","SkillController@addMoreSkillsDetails")->name('addMoreSkillsDetails');
	
});
