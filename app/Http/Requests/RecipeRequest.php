<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class RecipeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {

        return [
            'list_ingredients'   => 'required',
            'list_instructions'   => 'required',
            'photo' => 'required|mimes:png,jpg,jfif',
            'name' => 'required',

        ];
    }




    public function failedValidation(Validator $validator)

    {
        throw new HttpResponseException(response()->json([

            'code'=>401,
            'success'=> false,
            'message'=> $validator->errors()

        ]));

    }
}
