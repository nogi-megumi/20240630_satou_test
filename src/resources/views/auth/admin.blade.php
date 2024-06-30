@extends('layouts.auth')
@section('css')
<link rel="stylesheet" href="css/admin.css">
@endsection

@section('button')
<div class="header__button">
    {{-- @if (Auth:check()) --}}
    <form action="/logout" method="POST">
        @csrf
        <button class="header__button--switch" type="submit">
            logout
        </button>
    </form>
    {{-- @endif --}}
</div>
@endsection
@section('content')
<h1 class="content__title">
    Admin
</h1>
<div class="admin">
    <div class="search--flex">
        <form class="search-group search--flex" action="/admin/search" method="POST">
            <div class="search-form search--flex">
                @csrf
                <input type="text" name="keyword" value="{{old('keyword')}}" placeholder="名前やメールアドレスを入力してください">
                <select name="gender">
                    <option value="">性別</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">その他</option>
                </select>
                <select name="category_id">
                    <option value="">お問い合わせの種類</option>
                    @foreach ($categories as $category)
                    <option value="{{$category['id']}}">{{$category['content']}}</option>
                    @endforeach
                </select>
                <input type="date" value="">
                <div class="search-form__button">
                    <button class="search-form__button search-form__button--search" type="submit">検索</button>
                </div>
            </div>
        </form>
        <form action="/admin" method="GET">
            @csrf
            <div class="search-form__button"><button class="search-form__button search-form__button--reset">リセット
                </button>
            </div>
        </form>
    </div>
    {{$contents->links()}}
    <style>
        svg.w-5.h-5 {
            width: 30px;
            height: 30px;
        }
    </style>
    <div class="search-result">
        <table>
            <tr class="search-result__table-row">
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>
            @foreach ($contents as $content)
            <tr class="search-result__table-row">
                <td>{{$content['last_name'] ."　". $content['first_name']}}</td>
                <td>
                    @switch($content['gender'])
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
                <td><button popovertarget="detail" popovertargetaction="show">詳細</button>
                    <div popover id="detail">
                        <button class="popover__close-button" popovertarget=detail poovertargetaction="hide">×</button>
                        <form action="/auth/delete" method="POST">
                            @method('delete')
                            @csrf
                            <table class="popover__table">
                                <tr>
                                    <th>お名前</th>
                                    <td>{{$content['last_name']."　".$content['first_name']}}</td>
                                </tr>
                                <tr>
                                    <th>性別</th>
                                    <td>@switch($content['gender'])
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
                                    <td>{{$content['detail']}}</td>
                                </tr>
                            </table>
                            <div>
                                <input type="hidden" name="id" value="{{$content['id']}}">
                                <button class="popover__delete-button">削除</button>
                            </div>
                        </form>
                    </div>
                </td>
                @endforeach
            </tr>
        </table>
    </div>
</div>
@endsection