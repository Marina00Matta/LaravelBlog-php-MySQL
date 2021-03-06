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
            'title'=>"required|min:3|unique:posts,title,{$this->post}", 
            'description' =>'required|min:10',
          
        ];
    }

    public function messages()
    {
        return [
            'title.min' => 'please the title has minimum of 3 chars',
            'title.required' => 'please enter title field',
            'title.unique'=> 'This title already exists'
        ];
    }
}
