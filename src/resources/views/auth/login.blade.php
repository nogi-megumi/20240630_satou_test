@extends('layouts.auth')
@section('css')
<link rel="stylesheet" href="css/login.css">
@endsection

@section('button')
<div class="header__button">
    <button class="header__button--switch" type="submit">
        register
    </button>
</div>
@endsection

@section('content')

<h1 class="content__title">
    Login
</h1>
<div class="content__form">
    <form action="/login" method="POST">
        @csrf
        <div class="content__form-item">
            <label>メールアドレス</label>
            <input type="email" name="email" value="{{old('email')}}" placeholder="例：text@example.com">
            <div class="form--error">
                @error('email')
                {{$message('email')}}
                @enderror
        </div>
        <div class="content__form-item">
            <label>パスワード</label>
            <input type="password" name="password" value="{{old('password')}}" placeholder="例：coachtech1106">
            <div class="form--error">
                @error('password')
                {{$message('password')}}
                @enderror
        </div>
        <div class="content__button">
            <button class="content__bottun-submit">
                ログイン
            </button>
        </div>
    </form>
</div>
@endsection