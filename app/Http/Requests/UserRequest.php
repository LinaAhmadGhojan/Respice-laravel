<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UserRequest extends FormRequest
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
            'phone'   => 'required|unique:users,phone',
            'email'   => 'required|email|unique:users,email',
            'image' => 'required|mimes:png,jpg',
            'name' => 'required',
            'password' => 'required',

        ];
    }




     public function failedValidation(Validator $validator)

     {
        return back()->with(['message'=>$validator->errors()]);

     }
}
