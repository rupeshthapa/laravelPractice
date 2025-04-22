<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\form;

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
// Route::get('/{id?}/{name?}', [PageController::class, 'home'])->name('home');
// Route::get('/about', [PageController::class, 'about'])->name('about');
// Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Route::get('/hello/{name}', function($name){
//     return view('hello', ['name'=> $name]);
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/task', [TaskController::class, 'store'])->name('store');

Route::get('/', [TaskController::class, 'index'])->name('home');
