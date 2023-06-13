<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnggotaPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama_anggota' => 'required|max:100',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'kontak' => 'required|max:12',
        ];
    }
}
