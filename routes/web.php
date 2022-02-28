<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PushController;

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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::middleware(['auth'])->group(function(){



    Route::get('/', function () {
        return view('welcome');
    });


Route::get('test', function () {
    event(new App\Events\StatusLiked('Someone'));
    return "Event has been sent!";
});
Route::get('user_first',[PushController::class,'user_first']);
Route::get('dash/{id}',[PushController::class,'chat']);
Route::post('/store_comment',[PushController::class,'send']);
Route::get('/chat',[PushController::class,'home_page']);
Route::post('/enterChat',[PushController::class,'enterChat']);




});
