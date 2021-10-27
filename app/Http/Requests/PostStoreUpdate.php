<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreUpdate extends FormRequest
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
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'auxiliary_title' => ['required', 'string', 'min:3', 'max:255'],
            'image' => ['required', 'image'],
            'body' => ['required', 'string', 'min:10', 'max:5000'],
            'user_id' => ['required', 'exists:users,id']
        ];
    }
}
