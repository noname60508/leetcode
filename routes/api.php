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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('hello', 'test@hello');
Route::get('romanToInt', 'test@romanToInt');
Route::get('firstUniqChar', 'test@firstUniqChar');
Route::get('uniqueMorseRepresentations', 'test@uniqueMorseRepresentations');
Route::get('minSetSize', 'test@minSetSize');
Route::get('isPowerOfFour', 'test@isPowerOfFour');
Route::get('canConstruct', 'test@canConstruct');
Route::get('rotate', 'test@rotate');
Route::get('largestPerimeter', 'test@largestPerimeter');
Route::get('checkIfPangram', 'test@checkIfPangram');
Route::get('countAndSay', 'test@countAndSay');
Route::get('topKFrequent', 'test@topKFrequent');
Route::get('diffArray', 'test@diffArray');
Route::get('minMutation', 'test@minMutation');
Route::get('reverseVowels', 'test@reverseVowels');
Route::get('maximum69Number', 'test@maximum69Number');
Route::get('makeGood', 'test@makeGood');
Route::get('removeDuplicates', 'test@removeDuplicates');
Route::get('guessNumber', 'test@guessNumber');
Route::get('uniqueOccurrences', 'test@uniqueOccurrences');
Route::get('minDeletionSize', 'test@minDeletionSize');
Route::get('maxIceCream', 'test@maxIceCream');
