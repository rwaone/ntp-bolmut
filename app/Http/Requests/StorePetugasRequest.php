<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePetugasRequest extends FormRequest
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
            'id' => ['integer'],
            'name' => ['string', 'required', 'regex:/^[\pL\s,\.]+$/u'],
            'nip' => ['string', 'required', 'size:18', 'regex:/^(\d{4})(\d{2})(\d{2})(\d{4})(\d{2})([12])\d{3}$/'],
            'jabatan' => ['string', 'required'],
        ];
    }
}
