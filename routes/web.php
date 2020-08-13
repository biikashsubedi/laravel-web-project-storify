<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAdmin;

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

Route::middleware(['auth'])->group(function (){
   Route::resource('stories', 'StoriesController');
});

Route::get('/', 'DashboardController@index')->name('index');
Route::get('story/{activestory:slug}', 'DashboardController@show')->name('dashboard.show');

Route::get('/email', 'DashboardController@email');

Route::namespace('Admin')->middleware(['auth', CheckAdmin::class])->prefix('admin')->group(function (){
    Route::get('/deleted-stories', 'StoriesController@index')->name('admin.stories.index');
    Route::put('/stories/restore/{id}', 'StoriesController@restore')->name('admin.stories.restore');
    Route::delete('/stories/delete/{id}', 'StoriesController@delete')->name('admin.stories.delete');
});

Route::get('/image', function (){

});

