<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RandomMathFactRequest extends FormRequest
{
    private int $maxNumber = PHP_INT_MAX;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'number' => ['required','integer', 'min:0', 'max:'. PHP_INT_MAX],
        ];
    }

    public function messages(): array
    {
        return [
            'number.min'=> "{$this->number} is uninteresting",
            'number.integer' => "{$this->number} is not an integer",
            'number.max' => "Sorry, we cannot process any number greater than {$this->maxNumber}"
        ] + parent::messages();
    }
}
