<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDesaRequest extends FormRequest
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
            'kecamatan_id' => 'nullable',
            'kecamatan_code' => 'nullable',
            'kecamatan_name' => 'nullable',
            'desa_id' => 'nullable',
            'desa_code' => 'nullable',
            'desa_name' => 'nullable',
            'stat_pem' => 'nullable',
        ];
    }
}