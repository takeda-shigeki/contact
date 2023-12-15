<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>test</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
</head>

<body>
    <header class="header">
        <h1 class="header__title">管理システム</h1>
    </header>

    <main>
        <div class="search__content">
            <form class="form" action="/admin/search" method="get">
                @csrf
                <div class="name_and_sex">
                    <div class="form__group">
                        <div class="form__group-title">
                            <p class="form__group-title--item">お名前</p>
                        </div>
                        <div class="form__group-input--name">
                            <input class="form__group-input--name---box" type="text" name="keyword_fullname" />
                        </div>
                    </div>

                    <div class="form__group-sex">
                        <div class="form__group-title">
                            <p class="form__group-title--item">性別</p>
                        </div>
                        <div class="form__group-input--sex" >
                            <input type="radio" class="form__group-input--sex---both" name="category_sex" value="" checked />
                            &ensp;全て
                            <input type="radio" class="form__group-input--sex---male" name="category_sex" value="1" />
                            &ensp;男性
                            <input type="radio" class="form__group-input--sex---female" name="category_sex" value="2" />
                            &ensp;女性
                        </div>
                    </div>
                </div>

                <div class="form__group-date">
                    <div class="form__group-title">
                        <p class="form__group-title--item">登録日</p>
                    </div>
                    <div class="form__group-input--date">
                        <input class="form__group-input--date---box" type="date" name="from" />
                        <p>&emsp;～&emsp;</p>
                        <input class="form__group-input--date---box" type="date" name="until" />
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <p class="form__group-title--item">メールアドレス</p>
                    </div>
                    <div class="form__group-input--email">
                        <input class="form__group-input--email---box" type="email" name="keyword_email" value="{{ old('keyword_email') }}" />
                    </div>
                </div>

                <div class="form__button">
                    <button class="form__button-submit" type="submit">検索</button>
                </div>
                <div class="form__button">
                    <button class="form__button-reset" type="button" onclick="location.href='/admin'">リセット</button>
                </div>
            </form>

            @if(isset($results))
            <table>
                <tr>
                    <th>id</th>
                    <th>お名前</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>ご意見</th>
                    <th></th>
                </tr>
                @foreach ($results as $result)
                <tr>
                    <td width="20px">{{$result['id']}}</td>
                    <td width="90px">{{$result['fullname']}}</td>
                    <td width="25px">{{$result['sex']}}</td>
                    <td width="140px">{{$result['email']}}</td>
                    <td width="150px"><p class="ellipsis">{{$result['inquiry']}}</p></td>
                    <td width="80px">
                        <form action="/admin/search" method="POST">
                            @method('DELETE')
                            @csrf
                            <div class="delete-form__button">
                                <input type="hidden" name="id" value="{{ $result['id'] }}">
                                <button class="delete-form__button-submit" type="submit">削除</button>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            @endif
        </div>
    </main>
</body>