<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentsRequest extends FormRequest
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
            'title' => 'required',
            'detail' => 'required'
        ];
    }

    /**
     * バリデーションエラーのカスタム属性の取得
     * @return array
     */
    public function attributes() 
    {
        return [
            'title' => 'タイトル',
            'detail' => '詳細'
        ];
    }

     /**
      * バリデーションルールのエラーメッセージ取得
      * @return array
      */
      public function messages() 
      {
        return [
            'required' => ':attribute は必須です。'
        ];
      }


}
