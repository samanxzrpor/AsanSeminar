<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function (){

    Route::get('/' , function (Request $request) {
        return view('admin.dashboard');
    });
});
