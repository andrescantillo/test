<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|unique:posts,title,'.$this->id.'|max:255',
            'body' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Write a title for the publication',
            'body.required'  => 'Write the text of the publication',
            'title.unique'  => 'This title already exists',
        ];
    }
}
