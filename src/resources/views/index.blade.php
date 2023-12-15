@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
  <header class="header">
    <h1 class="header__title">お問い合わせ</h1>
  </header>
  <main>
    <div class="contact-form__content">
      <form class="form" action="/contacts/confirm" method="post">
        @csrf
        <div class="form__group">
          <div class="form__group-title">
            <p class="form__group-title--item">お名前<span class="form__group-title--required">※</span></p>
          </div>
          <div class="form__group-content">
            <div class="form__group-input--name">
              <input class="form__group-input--name---box" type="text" name="last_name" value="{{ old('last_name') }}" />
              <p class="form__group-input--example">&emsp;例）山田</p>
              @if ($errors->has('last_name'))
              <div class="form__error">
                <ul>
                  @foreach ($errors->get('last_name') as $error)
                  <li class="form__error-message">{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
              @if ($errors->has('first_name'))
              <div class="form__error">
                <ul>
                  @foreach ($errors->get('first_name') as $error)
                  <li class="form__error-message">{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
            </div>
            <div class="form__group-input--name">
              <input class="form__group-input--name---box" type="text" name="first_name" value="{{ old('first_name') }}" />
              <p class="form__group-input--example">&emsp;例）太郎</p>
            </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <p class="form__group-title--item">性別<span class="form__group-title--required">※</span></p>
          </div>
          <div class="form__group-input--sex" class="form__group-input">
            <input type="radio" class="form__group-input--sex---male" name="sex" value="男性" {{ old ('sex') == '男性' ? 'checked' : '' }} checked />
            &emsp;男性
            <input type="radio" class="form__group-input--sex---female" name="sex" value="女性" {{ old ('sex') == '女性' ? 'checked' : '' }} />
            &emsp;女性
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <p class="form__group-title--item">メールアドレス
            <span class="form__group-title--required">※</span></p>
          </div>
          <div class="form__group-input--email">
            <input class="form__group-input--email---box" style="width: 100%;" type="email" name="email" value="{{ old('email') }}" />
            <p class="form__group-input--example">&emsp;例）test@example.com</p>
            @if ($errors->has('email'))
              <div class="form__error">
                <ul>
                @foreach ($errors->get('email') as $error)
                <li class="form__error-message">{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <p class="form__group-title--item">郵便番号<span class="form__group-title--required">※</span></p>
          </div>
          <div class="form__group-input--postal_code">
            <div class="form__group-input--postal_code---mark"><span style="font-weight:bold;">〒</span></div>
            <div class="form__group-input--postal_code---block">
              <input class="form__group-input--postal_code---box" type="text" name="postal_code" minlength="8" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','addr11','addr11');" value="{{ old('postal_code') }}">
              <p class="form__group-input--example">&emsp;例）123-4567</p>
              @if ($errors->has('postal_code'))
              <div class="form__error">
                <ul>
                  @foreach ($errors->get('postal_code') as $error)
                  <li class="form__error-message">{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
            </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <p class="form__group-title--item">住所<span class="form__group-title--required">※</span></p>
          </div>
          <div class="form__group-input--address">
            <input class="form__group-input--address---box" type="text" style="width: 100%;" name="addr11" size="60" value="{{ old('addr11') }}" >
            <p class="form__group-input--example">&emsp;例）東京都渋谷区千駄ヶ谷1-2-3</p>
            @if ($errors->has('addr11'))
            <div class="form__error">
              <ul>
                @foreach ($errors->get('addr11') as $error)
                <li class="form__error-message">{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <p class="form__group-title--item">建物名</p>
          </div>
          <div class="form__group-input--building">
            <input type="text" class="form__group-input--building---box" style="width: 100%;" name="building" value="{{ old('building') }}">
            <p class="form__group-input--example">&emsp;例）千駄ヶ谷マンション101</p>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <p class="form__group-title--item">ご意見<span class="form__group-title--required">※</span></p>
          </div>
          <div class="form__group-input--inquiry">
            <textarea  class="form__group-input--inquiry---box" style="width: 100%; font-size: 14px; font-family: sans-serif;" name="inquiry" rows="4" >{{ old('inquiry') }}</textarea>
            @if ($errors->has('inquiry'))
            <div class="form__error">
              <ul>
                @foreach ($errors->get('inquiry') as $error)
                <li class="form__error-message">{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
          </div>
        </div>

        <div class="form__button">
          <button class="form__button-submit" type="submit">確認</button>
        </div>
      </form>
    </div>
  </main>
@endsection
@livewireScripts