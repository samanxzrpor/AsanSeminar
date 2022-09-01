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

require __DIR__ . '/web_routes/auth.php';

Route::redirect('/' , 'webinars');

require __DIR__ . '/web_routes/webinar.php';

require __DIR__ . '/web_routes/transaction.php';


Route::middleware('auth')->group(function () {

    require __DIR__ . '/web_routes/admin.php';

    require __DIR__ . '/web_routes/user.php';

    require __DIR__ . '/web_routes/checkout.php';

    require __DIR__ . '/web_routes/wallet.php';

});
