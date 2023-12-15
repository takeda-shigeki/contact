<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $postal_code = $this->input('postal_code');
        $postal_code = str_replace(['－', '―', '‐', 'ー'], '-', $postal_code);
        $postal_code = mb_convert_kana($postal_code, 'n');
        $this->merge(['postal_code' => $postal_code]);
    }

    public function rules()
    {
        return [
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'postal_code' => ['required', 'string', 'max:8', 'min:8', 'regex:/^[0-9-]+$/'],
            'addr11' => ['required', 'string', 'max:255'],
            'inquiry' => ['required', 'string', 'max:120']
        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => 'お名前(姓)を入力してください',
            'first_name.required' => 'お名前(名)を入力してください',
            'last_name.string' => 'お名前(姓)を文字列で入力してください',
            'first_name.string' => 'お名前(名)を文字列で入力してください',
            'last_name.max' => '姓・名それぞれ255文字以下で入力してください',
            'first_name.max' => '姓・名それぞれ255文字以下で入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスを文字列で入力してください',
            'email.email' => '有効なメールアドレス形式を入力してください',
            'email.max' => 'メールアドレスを255文字以下で入力してください',
            'postal_code.required' => '郵便番号を入力してください',
            'postal_code.string' => '郵便番号を文字列で入力してください',
            'postal_code.max' => '郵便番号を8文字で入力してください',
            'postal_code.min' => '郵便番号を8文字で入力してください',
            'postal_code.regex' => '郵便番号をハイフンを用いて入力してください',
            'addr11.required' => '住所を入力してください',
            'addr11.string' => '住所を文字列で入力してください',
            'addr11.max' => '住所を255文字以下で入力してください',
            'inquiry.required' => 'ご意見を入力してください',
            'inquiry.string' => 'ご意見を文字列で入力してください',
            'inquiry.max' => 'ご意見を120文字以下で入力してください',
        ];
    }
}
