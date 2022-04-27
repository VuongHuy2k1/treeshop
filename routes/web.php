<?php

use App\Http\Controllers\Admin\User\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;

Route::get('admin/user/login',[LoginController::class,'index'])->name('login');
#Hoặc sử dụng cái này
#Route::get('login',[LoginController::class,'index'])->name('login');


Route::post('admin/user/login/store',[LoginController::class,'store']);

Route::middleware(['auth'])->group(function (){

    Route::prefix('admin')->group(function (){
        Route::get('/',[MainController::class,'index'])->name('admin');
        Route::get('/main',[MainController::class,'index']);
        #Menu
        Route::prefix('menu',)->group(function ()
        {
            Route::get('add',[MenuController::class,'create']);
            Route::post('add',[MenuController::class,'store']);
            Route::get('list',[MenuController::class,'index']);

        });
    });

});
//tui la huy

