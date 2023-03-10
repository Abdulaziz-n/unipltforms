<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkerRequest extends FormRequest
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
            'passport_series' => 'required|string',
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'surname' => 'required|string',
            'position' => 'required|string',
            'phone' => 'required|integer',
            'address' => 'required|string',
            'company_id' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'string' => 'The :attribute must be a string',
            'integer' => 'The :attribute must be a an integer',
        ];
    }
}

