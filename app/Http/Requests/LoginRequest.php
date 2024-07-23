<?php

namespace App\Http\Requests;

use App\ApiTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class LoginRequest extends FormRequest
{
    use ApiTrait;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    // protected function failedValidation(Validator $validator)
    // {
    //     $errors = $validator->errors();

    //     throw new HttpResponseException(response()->json([
    //         'status' => 'error',
    //         'message' => 'Validation errors',
    //         'errors' => $errors,
    //     ], 422));
    // }
    protected function failedValidation(Validator $validator)
    {
        if ($this->is('api/*')) {
            $response = $this->apiResponse($validator->messages()->all(), 'Validation Errors', 422);
            throw new ValidationException($validator, $response);
        }
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'password'=>'required|',
            'email'=>'required|email',
        ];
    }
}
