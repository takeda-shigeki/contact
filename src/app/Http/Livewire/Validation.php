<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Validation extends Component
{
    public $email;
    public $postal_code;
    public $inquiry;
    protected $rules = [
        'email' => 'email',
        'postal_code' => 'min:8|max:8|regex:/^[0-9-]+$/',
        'inquiry' => 'max:120',
    ];
    protected $messages = [
        'email.email' => '有効なメールアドレス形式を入力してください',
        'postal_code.min' => '郵便番号は８文字で入力してください',
        'postal_code.max' => '郵便番号は８文字で入力してください',
        'postal_code.regex' => '郵便番号はハイフンを用いて入力してください',
        'inquiry.max' => 'ご意見は120文字以下で入力してください',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.validation');
    }
    public function saveValidation()
    {
        $validatedData = $this->validate();
        Validation::create($validatedData);
    }
}
