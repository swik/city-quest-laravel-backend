<?php

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

Route::middleware('auth:api')->get(
    '/user',
    function (Request $request) {
        return $request->user();
    }
);

Route::get('quests', 'QuestController@index')->middleware('auth.basic');
Route::get('quests/{id}', 'QuestController@show')->middleware('auth.basic');
Route::post('quests', 'QuestController@store')->middleware('auth.basic');
Route::delete('quests', 'QuestController@destroy')->middleware('auth.basic');
