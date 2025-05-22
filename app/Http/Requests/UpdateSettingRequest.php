<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
{
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
            'address' => 'required | string',
            'phone' => 'required | string',
            'email' => 'required | string',
            'facebook' => 'nullable | url',
            'linkedin' => 'nullable | url',
            'twitter' => 'nullable | url',
            'instagram' => 'nullable | url',
            'youtube' => 'nullable | url',

        ];
    }
    public function attributes() : array
    {
        return [
           'address' => __('keywords.address'),
           'email' => __('keywords.email'),
           'phone' => __('keywords.phone'),
           'facebook' => __('keywords.facebook'),
           'twitter' => __('keywords.twitter'),
           'instagram' => __('keywords.instagram'),
           'linkedin' => __('keywords.linkedin'),
           'youtube' => __('keywords.youtube'),

        ];
    }
}
