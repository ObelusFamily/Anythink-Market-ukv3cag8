<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/ping', function (Request  $request) {    
    $con = DB::connection('mongodb');
    $msg = 'Accessible';
    try {
        var_dump($con->Command(["ping"=>1]));
    } catch (\Exception  $e) {
        $msg = 'Not Accessible' . $e;
    }
    
    return $msg;
    });
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
