<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePetugasRequest extends FormRequest
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
        $rules = [
            // 'id' => ['integer'],
            'name' => ['string', 'required', 'regex:/^[\pL\s,\.]+$/u'],
            'nip' => ['string', 'required', 'size:18', 'regex:/^(\d{4})(\d{2})(\d{2})(\d{4})(\d{2})([12])\d{3}$/'],
            'jabatan' => ['string', 'required'],
        ];

        // If the request is for updating a record
        if ($this->isMethod('PUT')) {
            // Make the fields optional
            $rules = array_map(function ($rule) {
                return array_merge(['sometimes'], $rule);
            }, $rules);
        }

        return $rules;
    }
}
