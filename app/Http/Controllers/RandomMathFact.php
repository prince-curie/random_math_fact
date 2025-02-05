<?php

namespace App\Http\Controllers;

use App\Http\Requests\RandomMathFactRequest;
use App\Http\Services\RandomMathFact as ServicesRandomMathFact;

class RandomMathFact extends Controller
{
    public function __construct(private ServicesRandomMathFact $randomMathFactService)
    {}

    public function __invoke(RandomMathFactRequest $request)
    {   $this->randomMathFactService->setNumber($request->number);

        $response = [
            'number' => $request->number,
            'is_prime' => $this->randomMathFactService->isPrime(),
            'is_perfect' => $this->randomMathFactService->isPerfect(),
            'properties' => $this->randomMathFactService->getProperties(),
            'digit_sum' => $this->randomMathFactService->sumOfDigits(),
            'fun_fact' => $this->randomMathFactService->fetchFunFact(),
        ];

        return response()->json($response);
    }
}
