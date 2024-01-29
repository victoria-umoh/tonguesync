<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LanguageController;

use App\Http\Controllers\PreferredLanguageController;




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get_languages', [LanguageController::class, 'getLanguages']);

Route::post('/preferred_language', [PreferredLanguageController::class, 'insertPreferredLanguage']);

Route::get('user', function(){
    return 'hello';
});
