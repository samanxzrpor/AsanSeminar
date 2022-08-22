<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->name('admin.')
    ->middleware('role: Admin')
    ->group(function (){

    Route::get('/' , function (Request $request) {
        return view('admin.dashboard');
    });
});
