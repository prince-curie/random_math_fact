<?php

use App\Http\Controllers\RandomMathFact;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return response()->json(['message' => 'Welcome to Random Math Fact'] );
});

Route::get('classify-number', RandomMathFact::class);
