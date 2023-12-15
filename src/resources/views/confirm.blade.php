@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')
    <div class="confirm__content">
      <div class="confirm__heading">
        <h2>内容確認</h2>
      </div>
      <form class="form" action="/contacts" method="post">
        @csrf
        <div class="confirm-table">
          <table class="confirm-table__inner">
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お名前</th>
              <td class="confirm-table__text-name">
                <input type="text" name="last_name" value="{{ $contact['last_name'] }}" readonly/><input type="text" name="first_name" value="{{ $contact['first_name'] }}" readonly/>
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">性別</th>
              <td class="confirm-table__text">
                <input type="text" name="sex" value="{{ $contact['sex'] }}" readonly/>
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">メールアドレス</th>
              <td class="confirm-table__text">
                <input type="email" name="email" value="{{ $contact['email'] }}" readonly/>
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">郵便番号</th>
              <td class="confirm-table__text">
                <input type="text" name="postal_code" value="{{ $contact['postal_code'] }}" readonly/>
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">住所</th>
              <td class="confirm-table__text">
                <input type="text" name="addr11" value="{{ $contact['addr11'] }}" readonly/>
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">建物名</th>
              <td class="confirm-table__text">
                <input type="text" name="building" value="{{ $contact['building'] }}" readonly/>
              </td>
            </tr>
            <tr class="confirm-table__row-inquiry">
              <th class="confirm-table__header-inquiry">ご意見</th>
              <td class="confirm-table__text-inquiry">
                <textarea name="inquiry" rows="4" style="font-size: 14px; font-family: sans-serif;" value="{{ $contact['inquiry'] }}" readonly>{{ $contact['inquiry'] }}</textarea>
              </td>
            </tr>
          </table>
        </div>
        <div class="form__button">
          <button class="form__button-submit" type="submit">送信</button>
        </div>
        <div class="form__button">
          <button class="form__button-correct" type="submit" name="back" value="back">修正する</button>
        </div>
      </form>
    </div>
@endsection