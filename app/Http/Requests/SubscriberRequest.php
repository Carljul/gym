<?php

namespace App\Http\Requests;

use Auth;
use App\Rules\SubscriptionEndDateRule;
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
            'birthdate' => 'nullable|date|before:18 years ago',
            'email' => 'nullable|email|max:255|unique:persons',
            'contact_number' => 'required||numeric|digits_between:10,12',
            'emergency_contact_name' => 'nullable',
            'emergency_contact_number' => 'nullable||numeric|digits_between:10,12',
            'membership_type_id' => 'required|exists:membership_types,id',
            'subscription_start_date' => 'required|date|after_or_equal:today'
        ];
    }
}
