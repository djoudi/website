<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ListRequest extends Request
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
            'title' => 'required|string|min:6|unique:awesomes',
            'content' => 'required|string|min:6',
            'url' => 'required|url|',
            'topic' => 'required|string|min:2',
            'author' => 'required|string|min:2',
            'image' => 'image',
        ];
    }
}
