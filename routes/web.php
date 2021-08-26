<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CoffeeTypeController;
use App\Http\Controllers\Admin\CupController;
use App\Http\Controllers\CoffeeNameController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\User\UserController;
use App\Models\CoffeeType;
use Illuminate\Support\Facades\Auth;

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


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->name('user.')->group(function(){

    Route::middleware(['guest:web', 'PreventBackHistory'])->group(function(){
        Route::view('/login', 'dashboard.user.login')->name('login');
        Route::view('/register', 'dashboard.user.register')->name('register');
        Route::post('/create', [UserController::class, 'create'])->name('create');
        Route::post('/check', [UserController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:web', 'PreventBackHistory'])->group(function(){
         Route::view('/home', 'dashboard.user.home')->name('home');
    });
});

Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware(['guest:admin'])->group(function(){
        Route::view('/login', 'dashboard.admin.login')->name('login');
        Route::post('/check', [AdminController::class, 'check'])->name('check');
        
    
    });

    Route::middleware(['auth:admin'])->group(function(){
         Route::view('/home', 'dashboard.admin.home')->name('home');
         Route::resource('/product', ProductController::class);
         Route::view('/register', 'dashboard.admin.register')->name('register');
         Route::post('/create', [AdminController::class, 'create'])->name('create');

         Route::get('/read', [CupController::class, 'read'])->name('read');
         Route::get('/cup', [CupController::class, 'index'])->name('cup');
         Route::post('/createcup', [CupController::class, 'create'])->name('createcup');
         Route::get('edit/{id}',[CupController::class, 'edit'])->name('edit');
         Route::put('update/{id}',[CupController::class, 'update'])->name('updatecup');
         Route::delete('delete/{id}',[CupController::class, 'delete'])->name('deletecup');

         Route::get('/readcoftype', [CoffeeTypeController::class, 'read'])->name('readcoftype');
         Route::get('/coffeetype', [CoffeeTypeController::class, 'index'])->name('coffeetype');
         Route::post('/createcoftype', [CoffeeTypeController::class, 'create'])->name('createcoftype');
         Route::get('/editcoftype/{id}',[CoffeeTypeController::class, 'edit'])->name('editcoftype');
         Route::put('/updatecoftype/{id}',[CoffeeTypeController::class, 'update'])->name('updatecoftype');
         Route::delete('/deletecoftype/{id}',[CoffeeTypeController::class, 'delete'])->name('deletecoftype');

         Route::get('/coffeenameread',[CoffeeNameController::class, 'read'])->name('coffeenameread');
         Route::resource('/coffeename',CoffeeNameController::class);
    });

   
});


 

// Route::resource('/orders', OrderController::class);


// Route::group(['middleware' => ['auth']], function () {
// });