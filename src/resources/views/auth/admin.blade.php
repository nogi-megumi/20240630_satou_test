@extends('layouts.auth')
@section('css')
<link rel="stylesheet" href="css/admin.css">
@endsection

@section('button')
<div class="header__button">
    <form action="/logout" method="POST">
        @csrf
        <button class="header__button--switch" type="submit">
            logout
        </button>
    </form>
</div>
@endsection
@section('content')
<h1 class="content__title">
    Admin
</h1>
<div class="admin">
    @foreach ($contents as $content)
    <div class="search-form">
        <input type="text" name="" value="{{$input}}">
        <select name="gender">
            <option value="">性別</option>
            <option value="1">男性</option>
            <option value="2">女性</option>
            <option value="3">その他</option>
        </select>
        <select name="category_id">
            <option value="">お問い合わせの種類</option>
            <option value="{{$content['category_id']}}">{{$content->category->content}}</option>
        </select>
        <input type="date">
        <div class="search-form__button"><button class="search-form__button search-form__button--search">検索</button>
        </div>
        <div class="search-form__button"><button class="search-form__button search-form__button--reset">リセット
                </buttoclass=search-form__buttonn>
        </div>
    </div>
    <div class="search-result">
        <table>
            <tr class="search-result__table-row">
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>
            <tr class="search-result__table-row">
                <td>{{$content['first_name'] . $conten['last_name']}}</td>
                <td>
                    @switch($contact['gender'])
                    @case(1)
                    男性
                    @break
                    @case(2)
                    女性
                    @break
                    @case(3)
                    その他
                    @break
                    @endswitch
                </td>
                <td>{{$content['email']}}</td>
                <td>{{$content->category->content}}</td>
                <td><button popovertarget="detail">詳細</button>
                    <div popover id="detail">
                        <form action="">
                            @csrf
                        <table>
                            <tr>
                                <th>お名前</th>
                                <td>{{$content['first_name'] . $conten['last_name']}}</td>
                            </tr>
                            <tr>
                                <th>性別</th>
                                <td>@switch($contact['gender'])
                                @case(1)
                                男性
                                @break
                                @case(2)
                                女性
                                @break
                                @case(3)
                                その他
                                @break
                                @endswitch</td>
                            </tr>
                            <tr>
                                <th>メールアドレス</th>
                                <td>{{$content['email']}}</td>
                            </tr>
                            <tr>
                                <th>電話番号</th>
                                <td>{{$content['tell']}}</td>
                            </tr>
                            <tr>
                                <th>住所</th>
                                <td>{{$content['address']}}</td>
                            </tr>
                            <tr>
                                <th>建物名</th>
                                <td>{{$content['building']}}</td>
                            </tr>
                            <tr>
                                <th>お問い合わせの種類</th>
                                <td>{{$content->category->content}}</td>
                            </tr>
                            <tr>
                                <th>お問い合わせ内容</th>
                                <td>{{content['detail']}}</td>
                            </tr>
                        </table>
                        <div><button>削除</button></div>
                        </form>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    @endforeach
</div>
@endsection