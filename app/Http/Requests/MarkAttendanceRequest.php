<?php

namespace App\Http\Requests;

use App\Traits\ApiResponseTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class MarkAttendanceRequest extends FormRequest
{
    use ApiResponseTrait;

    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'attended' => 'required|boolean',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new \Illuminate\Http\Exceptions\HttpResponseException(
            $this->errorResponse('Validation errors', $validator->errors(), 422)
        );
    }
}
