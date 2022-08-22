<?php

use Application\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

include __DIR__ . '/web_routes/auth_routes.php';

Route::redirect('/' , 'webinars');

Route::middleware('auth')
    ->group(function () {

    require __DIR__ . '/web_routes/webinar_routes.php';

    Route::prefix('admin')
        ->middleware('role:Admin')
        ->name('admin.')
        ->group(function () {

        require __DIR__ . '/web_routes/admin/webinar_routes.php';
        require __DIR__ . '/web_routes/admin/user_routes.php';
        require __DIR__ . '/web_routes/admin/order_routes.php';
        require __DIR__ . '/web_routes/admin/payment_routes.php';
        require __DIR__ . '/web_routes/admin/discount_code_routes.php';

    });
});
