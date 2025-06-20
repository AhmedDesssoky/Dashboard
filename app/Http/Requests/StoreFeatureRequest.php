<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Helpers\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
class StoreFeatureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    protected function failedValidation(Validator $validator)
    {
        if($this->is('api/*'))
        {
            $response = ApiResponse::sendResponse(422, 'Validation Errors ', $validator->errors());
            throw new ValidationException($validator,$response);
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
           'title' => 'required | string',
           'icon' => 'required | string',
           'description' => 'required | string',
        ];
    }
    public function attributes() : array
    {
        return [
           'title' => __('keywords.title'),
           'icon' => __('keywords.icon'),
           'description' => __('keywords.description')
        ];
    }
}
