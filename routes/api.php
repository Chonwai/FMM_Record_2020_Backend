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
     * Record API ------------------------------------------------------------
     *
     * @api
     */
    // Get All Records
    Route::get('records/all', 'Record\ResponsesRecordsController@responsesAllRecords');

    // Get Specify Record
    Route::get('records/{id}', 'Record\ResponsesRecordsController@responsesSpecifyRecord');

    // Insert Record
    Route::post('records', 'Record\ResponsesRecordsController@insertRecord');

    // Update Record
    Route::put('records/{id}', 'Record\ResponsesRecordsController@insertRecord');

    // Delete Record
    Route::delete('records/{id}', 'Record\ResponsesRecordsController@deleteRecord');
});
