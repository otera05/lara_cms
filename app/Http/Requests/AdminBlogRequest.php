<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminBlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
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
            'title'=> 'required|string|max:100',
            'body' => 'required|string|max:10000',
        ];
    }

    /**
     * バリデートエラーメッセージ
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'タイトルは入力必須です',
            'title.string'   => 'タイトルは文字列を入力してください',
            'title.max'      => 'タイトルは:max文字以内で入力してください',
            'body.required'  => '本文は入力必須です',
            'body.string'    => '本文は文字列を入力してください',
            'body.max'       => '本文は:max文字以内で入力してください',
        ];
    }
}
