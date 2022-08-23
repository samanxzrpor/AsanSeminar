<?php

use Application\Admin\Payments\Controllers\PaymentsController;
use Illuminate\Support\Facades\Route;

Route::resource('payments' , PaymentsController::class);
