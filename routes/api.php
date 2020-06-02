<?php

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function () {
    /**
     * Records API ------------------------------------------------------------
     *
     * @api
     */
    // Get All Records
    Route::get('records/all', 'Record\RecordsController@responsesAllRecords');

    // Get Specify Record
    Route::get('records/{id}', 'Record\RecordsController@responsesSpecifyRecord');

    // Insert Record
    Route::post('records', 'Record\RecordsController@insertRecord');

    // Update Record
    Route::put('records/{id}/update', 'Record\RecordsController@updateRecord');

    // Delete Record
    Route::delete('records/{id}', 'Record\RecordsController@deleteRecord');

    /**
     * Assets API ------------------------------------------------------------
     *
     * @api
     */
    // Get All Assets
    Route::get('assets/all', 'Asset\AssetsController@responsesAllAssets');

    // Get Specify Asset
    Route::get('assets/{id}', 'Asset\AssetsController@responsesSpecifyAsset');

    // Insert Asset
    Route::post('assets', 'Asset\AssetsController@insertAsset');

    // Update Record
    Route::put('records/{id}/update', 'Record\RecordsController@updateRecord');

    // Delete Record
    Route::delete('assets/{id}', 'Asset\AssetsController@deleteAsset');
});
