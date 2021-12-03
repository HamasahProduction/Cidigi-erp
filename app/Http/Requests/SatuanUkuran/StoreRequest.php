<?php

namespace App\Http\Requests\SatuanUkuran;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nama =>required|string'
        ];
    }

    public function message()
    {
        return [
            'nama.string' => 'Satuan Ukuran yang diinputkan tidak boleh angka',
            // 'nama.string' => 'Satuan Ukuran yang diinputkan maksimal 2 karakter',
        ];

    }
}
