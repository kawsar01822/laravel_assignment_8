<?php

use App\Http\Controllers\photoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\formController;
use App\Http\Controllers\videoController;
use App\Http\Middleware\demoMiddleware;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Support\Facades\Route;

// Simple Request
Route::get('/user-agent', [formController::class, 'userAgent']);

// Request with Parameter && json data
Route::post('/form', [formController::class, 'index']);

// Request with Cookie
Route::get('/profile/{id}',[ProfileController::class,'index']);

// Request with file
Route::post('/file', [formController::class, 'fileUpload']);

// Request ip address && content negotiation
Route::get('/requestIp', [formController::class, 'requestIp']);

// Binary and File download response
Route::get('/binary', [formController::class, 'binary']);
Route::get('/download',[formController::class,'download']);



// Laravel Log
Route::get('/sum/{num1}/{num2}',[formController::class,'sum']);


// Laravel session
Route::get('/sessionPut/{email}',[formController::class,'sessionPut']);
Route::get('/sessionGet',[formController::class,'sessionGet']);         // keep session data after retrive
Route::get('/sessionPull',[formController::class,'sessionPull']);       // remove session data after retrive
Route::get('/sessionForget',[formController::class,'sessionForget']);
Route::get('/sessionFlush',[formController::class,'sessionFlush']);



// Middleware: single
Route::get('/hi',[formController::class,'hi'])->middleware(['throttle:5,1']);
Route::get('/testMiddleware',[formController::class,'testMiddleware'])->middleware(['demoMiddleware','throttle:5,1']);

// Middleware: group
Route::middleware(['demoMiddleware'])->group(function(){
    Route::get('/hi1',[formController::class,'hi1']);
    Route::get('/hi2',[formController::class,'hi2']);
});

// invokeable controller
Route::get('/video',videoController::class);    // [] doesn't need, will generate error if use

// Resource Controller
Route::resource('photo',photoController::class); // this resource route will responsible for many route call
/*
GET()           INDEX   /photo
GET()           CREATE  /photo/create
POST()          STORE   /photo/
GET()           SHOW    /photo/{photo}
GET()           EDIT    /photo/{photo}/edit
PUT/PATCH()     UPDATE  /photo/{photo}
DELETE()        DESTROY /photo/{photo}

*/

// middleware can be assigned in controller constructor function
ROUTE::GET('/profile',[ProfileController::class,'profile']);



