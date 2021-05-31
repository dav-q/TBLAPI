<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ApiKeyLaika;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



// Creamos un grupo para validar el Header 'api-key-laika'
Route::middleware([ApiKeyLaika::class])->group(function () {
    Route::resource('users', 'UserController');
    Route::resource('type_documents', 'TypeDocumentsController');
});
