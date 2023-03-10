<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'director' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email',
            'website' => 'required|string',
            'phone' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'string' => 'The :attribute must be a string',
            'integer' => 'The :attribute must be a an integer',
            'email' => 'The :attribute must be a email format',
        ];
    }
}
