<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class SubscriberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => 'required|max:250',
            'middlename' => 'nullable',
            'lastname' => 'required|max:250',
            'suffix' => 'nullable',
            'birthdate' => 'date',
            'email' => 'nullable|email|max:255|unique:persons',
            'contact_number' => 'required',
            'emergency_contact_name' => 'nullable',
            'emergency_contact_number' => 'nullable',
            'membership_type_id' => 'required|exists:membership_types,id'
        ];
    }
}
