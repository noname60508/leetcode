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

/**************************leetcode******************************/

Route::get('hello', 'leetcode@hello');

Route::prefix('leetcode')->group(function ($router) {
    Route::get('singleNumber', 'leetcode@singleNumber');
    Route::get('romanToInt', 'leetcode@romanToInt');
    Route::get('firstUniqChar', 'leetcode@firstUniqChar');
    Route::get('uniqueMorseRepresentations', 'leetcode@uniqueMorseRepresentations');
    Route::get('minSetSize', 'leetcode@minSetSize');
    Route::get('isPowerOfFour', 'leetcode@isPowerOfFour');
    Route::get('canConstruct', 'leetcode@canConstruct');
    Route::get('rotate', 'leetcode@rotate');
    Route::get('largestPerimeter', 'leetcode@largestPerimeter');
    Route::get('checkIfPangram', 'leetcode@checkIfPangram');
    Route::get('countAndSay', 'leetcode@countAndSay');
    Route::get('topKFrequent', 'leetcode@topKFrequent');
    Route::get('diffArray', 'leetcode@diffArray');
    Route::get('minMutation', 'leetcode@minMutation');
    Route::get('reverseVowels', 'leetcode@reverseVowels');
    Route::get('maximum69Number', 'leetcode@maximum69Number');
    Route::get('makeGood', 'leetcode@makeGood');
    Route::get('removeDuplicates', 'leetcode@removeDuplicates');
    Route::get('guessNumber', 'leetcode@guessNumber');
    Route::get('uniqueOccurrences', 'leetcode@uniqueOccurrences');
    Route::get('minDeletionSize', 'leetcode@minDeletionSize');
    Route::get('maxIceCream', 'leetcode@maxIceCream');
    Route::get('stringMatching', 'leetcode@stringMatching');
    Route::get('addBinary', 'leetcode@addBinary');
    Route::get('setForeach', 'leetcode@setForeach');
    Route::get('findDuplicate', 'leetcode@findDuplicate');
    Route::get('leastInterval', 'leetcode@leastInterval');
    Route::get('findDuplicates', 'leetcode@findDuplicates');
    Route::get('findDuplicatesV2', 'leetcode@findDuplicatesV2');
    Route::get('maxSubarrayLength', 'leetcode@maxSubarrayLength');
    Route::get('minOperations', 'leetcode@minOperations');
    Route::get('numSteps', 'leetcode@numSteps2');
    Route::get('addedInteger', 'leetcode@addedInteger');
    Route::get('minMovesToSeat', 'leetcode@minMovesToSeat');
    Route::get('merge', 'leetcode@merge');
    Route::get('maxSatisfied', 'leetcode@maxSatisfied');
    Route::get('test', 'leetcode@test');
});

/**************************codility******************************/
Route::prefix('codility')->group(function ($router) {
    Route::get('MaxCounters', 'codility@MaxCounters');
});

/**************************interview******************************/
Route::prefix('interview')->group(function ($router) {
    Route::get('test', 'interview@test');
    // kkday
    Route::get('kkday1', 'interview@kkday1');
    Route::get('kkday2', 'interview@kkday2');
    Route::get('kkday3', 'interview@kkday3');
    Route::get('kkday4', 'interview@kkday4');

    Route::get('teamLab1', 'interview@teamLab1');
});
