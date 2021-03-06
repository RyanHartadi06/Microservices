<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('mentors', 'MentorController@index');
Route::get('mentors/{id}', 'MentorController@show');
Route::post('mentors', 'MentorController@create');
Route::put('mentors/{id}', 'MentorController@update');
Route::delete('mentors/{id}', 'MentorController@destroy');

Route::get('courses', 'CourseController@index');
Route::get('courses/{id}', 'CourseController@show');
Route::post('courses', 'CourseController@create');
Route::put('courses/{id}', 'CourseController@update');
Route::delete('courses/{id}', 'CourseController@destroy');


Route::post('chapter', 'ChapterController@create');
Route::put('chapter/{id}', 'ChapterController@update');
Route::get('chapter', 'ChapterController@index');
Route::get('chapter/{id}', 'ChapterController@show');
Route::delete('chapter/{id}', 'ChapterController@destroy');



Route::post('lesson', 'LessonController@create');
Route::put('lesson/{id}', 'LessonController@update');
Route::get('lesson', 'LessonController@index');
