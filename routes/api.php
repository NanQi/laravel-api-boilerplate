<?php

use App\Controllers\AuthController;
use Dingo\Api\Routing\Router;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
 * Welcome route - link to any public API documentation here
 */
Route::get('/', function () {
    echo 'Welcome to our API';
});

/** @var Router $api */
$api = app(Router::class);
$api->version('v1', ['middleware' => ['api']], function (Router $api) {

    /** @var Router $api */
    $api->get('/token', [AuthController::class, 'token']);
});
