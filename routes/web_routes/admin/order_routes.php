<?php

use Application\Admin\Orders\Controllers\OrdersController;
use Illuminate\Support\Facades\Route;

Route::resource('orders' , OrdersController::class);
