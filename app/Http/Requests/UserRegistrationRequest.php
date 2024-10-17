<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegistrationRequest extends FormRequest
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
            'name'              => 'required|min:3',
            'mobile'            => 'required|min:11|min:11|max:11',
            'email'             => 'required',
            'nid'               => 'required|numeric|min:4|max:6|unique:users',
            'vaccine_center_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => __('Name is Required'),
            'name.min'          => __('Given Name is too Short'),
            'mobile.required'   => __('Mobile Number is Required'),
            'mobile.min'        => __('Mobile Number is NOT Valid, Minimum 11 Digit is Required'),
            'mobile.max'        => __('Mobile Number is NOT Valid, Maximum 14 Digit is Required'),
            'email.required'    => __('Email Address is Required'),
            'nid.required'      => __('National ID is Required'),
            'nid.numeric'       => __('National ID should be Numeric Only'),
            'nid.min'           => __('National ID should be Minimum 4 Digit'),
            'nid.max'           => __('National ID should be Maximum 6 Digit'),
            'nid.unique'        => __('The Given National ID is Already Exist. Try with another National ID or Check Vaccine Status'),
        ];
    }
}
