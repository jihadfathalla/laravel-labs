<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => 'required|unique:posts|min:3',
            'descrabtion' => 'required|min:10',        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please enter the title field',
            'title.min' => 'Please the title has minimum of 3 character ',
            'descrabtion.required' => 'Please enter the descrabtion field',
            'descrabtion.min' => 'Please the descrabtion has minimum of 3 character ',
        ];
    }
}
