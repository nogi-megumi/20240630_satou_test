@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div class="common">
    <h1 class="common__title">Contact</h1>
    <form class="form" action="/confirm" method="POST">
        @csrf
        <div class="form__group flex">
            <div class="form__group-title">
                <label class="form__label">お名前<span> ※</span></label>
            </div>
            <div class="form__group-content flex">
                <input class="form__input-text" type="text" name="first_name" placeholder="例：山田"
                    value="{{old('first_name')}}">
                <input class="form__input-text" type="text" name="last_name" placeholder="例：太郎"
                    value="{{old('last_name')}}">
            </div>
        </div>
        <div class="form--error">
            @error('first_name')
            {{$message}}
            @enderror
            @error('last_name')
            <br>{{$message}}
            @enderror
        </div>
        <div class="form__group form__group--radio">
            <div class="form__group-title">
                <label class="form__label">性別<span> ※</span></label>
            </div>
            <div class="form__group-content form__group-content--radio">
                <div class="form__input-radio">
                    <input type="radio" name="gender" value="1" checked> 男性
                </div>
                <div class="form__input-radio">
                    <input type="radio" name="gender" value="2"> 女性
                </div>
                <div class="form__input-radio">
                    <input type="radio" name="gender" value="3"> その他
                </div>
            </div>
        </div>
        <div class="form--error">
            @error('gender')
            {{$message}}
            @enderror
        </div>
        <div class="form__group flex">
            <div class="form__group-title">
                <label class="form__label">メールアドレス<span>※</span></label>
            </div>
            <div class="form__group-content">
                <input type="email" name="email" placeholder="例：test@example.com" value="{{old('email')}}">
            </div>
        </div>
        <div class="form--error">
            @error('email')
            {{$message}}
            @enderror
        </div>
        <div class="form__group flex">
            <div class="form__group-title">
                <label class="form__label">電話番号<span> ※</span></label>
            </div>
            <div class="form__group-content flex">
                <input class="form__input-number" type="tel" name="phone1" placeholder="080"
                    value="{{old('phone1')}}"><span>-</span>
                <input class="form__input-number" type="tel" name="phone2" placeholder="1234"
                    value="{{old('phone2')}}"><span>-</span>
                <input class="form__input-number" type="tel" name="phone3" placeholder="5678" value="{{old('phone3')}}">
            </div>
        </div>
        <div class="form--error">
            @if($errors->has('phone1'))
            {{$errors->first('phone1')}}
            @elseif($errors->has('phone2'))
            {{$errors->first('phone2')}}
            @elseif($errors->has('phone3'))
            {{$errors->first('phone3')}}
            @endif
        </div>
        <div class="form__group flex">
            <div class="form__group-title">
                <label class="form__label">住所<span> ※</span></label>
            </div>
            <div class="form__group-content">
                <input type="text" name="address" placeholder="例：東京都使無役千駄ヶ谷1-2-3" value="{{old('address')}}">
            </div>
        </div>
        <div class="form--error">
            @error('address')
            {{$message}}
            @enderror
        </div>
        <div class="form__group flex">
            <div class="form__group-title">
                <label>建物名</label>
            </div>
            <div class="form__group-content">
                <input type="text" name="building" placeholder="例：千駄ヶ谷マンション101" value="{{old('building')}}">
            </div>
        </div>
        <div class="form__group flex">
            <div class="form__group-title">
                <label class="form__label">お問い合わせの種類<span> ※</span></label>
            </div>
            <div class="form__group-content">
                <select name="category_id">
                    <option value="">選択してください</option>
                    @foreach ($categories as $category)
                    <option value="{{$category['id']}}">{{$category['content']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form--error">
            @error('category_id')
            {{$message}}
            @enderror
        </div>
        <div class="form__group flex">
            <div class="form__group-title">
                <label class="form__label">お問い合わせ内容<span> ※</span></label>
            </div>
            <div class="form__group-content">
                <textarea name="detail" cols="30" rows="5" placeholder="お問い合わせ内容をご記載ください"
                    aria-valuemax="{{old('detail')}}"></textarea>
            </div>
        </div>
        <div class="form--error">
            @error('detail')
            {{$message}}
            @enderror
        </div>
        <div class="form__bottun">
            <button class="form__bottun-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection