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

require __DIR__ . '/web_routes/auth_routes.php';

Route::redirect('/' , 'webinars');

Route::middleware('auth')->group(function () {

    require __DIR__ . '/web_routes/webinar_routes.php';

    require __DIR__ . '/web_routes/admin_routes.php';

    require __DIR__ . '/web_routes/user_routes.php';

    require __DIR__ . '/web_routes/master_routes.php';

    require __DIR__ . '/web_routes/checkout_routes.php';

    require __DIR__ . '/web_routes/wallet_routes.php';

    require __DIR__ . '/web_routes/transaction_routes.php';
});
