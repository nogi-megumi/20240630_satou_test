@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/confirm.css')}}">
@endsection

@section('content')
<div class="common">
    <h1 class="common__title">Confirm</h1>
    <form class="form" action="/thanks" method="POST">
        @csrf
        <table class="confirm__table">
            <tr class="confirm__table-row">
                <th class="confirm__table-heading">お名前</th>
                <td class="confirm__table-discription">
                    <input type="hidden" name="first_name" value="{{$contact['first_name']}}" readonly>
                    <input type="hidden" name="last_name" value="{{$contact['last_name']}}" readonly>
                    {{$contact['first_name'] . "　" . $contact['last_name']}}
                </td>
            </tr>
            <tr class="confirm__table-row">
                <th class="confirm__table-heading">性別</th>
                <td class="confirm__table-discription">
                    <input type="hidden" name="gender" value="{{$contact['gender']}}" readonly>
                    <div>
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
                    </div>
                </td>
            </tr>
            <tr class="confirm__table-row">
                <th class="confirm__table-heading">メールアドレス</th>
                <td class="confirm__table-discription">
                    <input type="text" name="email" value="{{$contact['email']}}" readonly>
                </td>
            </tr>
            <tr class="confirm__table-row">
                <th class="confirm__table-heading">電話番号</th>
                <td class="confirm__table-discription">
                    <input type="tel" name="tell"
                        value="{{$contact['phone1'] . $contact['phone2'] . $contact['phone3']}}" readonly>
                </td>
            </tr>
            <tr class="confirm__table-row">
                <th class="confirm__table-heading">住所</th>
                <td class="confirm__table-discription">
                    <input type="text" name="address" value="{{$contact['address']}}" readonly>
                </td>
            </tr>
            <tr class="confirm__table-row">
                <th class="confirm__table-heading">建物名</th>
                <td class="confirm__table-discription">
                    <input type="text" name="building" value="{{$contact['building']}}" readonly>
                </td>
            </tr>
            <tr class="confirm__table-row">
                <th class="confirm__table-heading">お問い合わせの種類</th>
                <td class="confirm__table-discription">
                    <input type="hidden" name="category_id" value="{{$contact['category_id']}}" readonly>
                    @foreach ($categories as $category)
                    @if ($contact['category_id'] == $category['id'])
                        {{$category['content']}}
                    @endif
                    @endforeach
                </td>
            </tr>
            <tr class="confirm__table-row">
                <th class="confirm__table-heading">お問い合わせ内容</th>
                <td class="confirm__table-discription">
                    <input type="hidden" name="detail" value="{{$contact['detail']}}" readonly> 
                    <div class="confirm__table-item">{{$contact['detail']}}</div>
                </td>
            </tr>
        </table>
        <div class="confirm__button-group">
            <div class="confirm__bottun">
                <button class="confirm__button-submit" type="submit">送信</button>
            </div>
            <div class="confirm__bottun--link">
                <a href="/">修正</a>
            </div>
        </div>
    </form>
</div>
@endsection