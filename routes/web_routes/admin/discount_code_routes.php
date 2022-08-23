<?php
use Illuminate\Support\Facades\Route;

Route::resource('discount_codes' , \Application\Admin\DiscountCodes\Controllers\DiscountCodesController::class);
