<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequestCustomer extends FormRequest
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
            'id_cliente' => 'nullable',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:cliente',
            'github' => 'required|max:45',
            'profile_photo_path' => 'required|max:45'
        ];
    }
}
