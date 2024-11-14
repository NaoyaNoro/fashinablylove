@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/confirm.css')}}">
@endsection


@section('content')
<div class="confirm-content">
    <div class="confirm-ttl">
        <h2>confirm</h2>
    </div>
    <form action="/thanks" class="confirm-form" method="post">
        @csrf
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__name">
                        お名前
                    </th>
                    <td class="confirm-table__item">
                        <input type="text" name="first_name" class="confirm__input" value="{{$contents['first_name']}}" readonly>
                        <input type="text" name="last_name" class="confirm__input confirm__input--last_name" value="{{$contents['last_name']}}" readonly>
                    </td>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__name">
                        性別
                    </th>
                    <td class="confirm-table__item">
                        <input type="text" name="gender" class="confirm__input" value="{{$contents['gender']}}" readonly>

                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__name">
                        メールアドレス
                    </th>
                    <td class="confirm-table__item">
                        <input type="text" name="email" class="confirm__input" value="{{$contents['email']}}" readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__name">
                        電話番号
                    </th>
                    <td class="confirm-table__item">
                        <input type="text" name="tell" class="confirm__input" value="{{$contents['tell_first'].$contents['tell_second'].$contents['tell_third']}}" readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__name">
                        住所
                    </th>
                    <td class="confirm-table__item">
                        <input type="text" name="address" class="confirm__input" value="{{$contents['address']}}" readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__name">
                        建物名
                    </th>
                    <td class="confirm-table__item">
                        <input type="text" name="building" class="confirm__input" value="{{$contents['building']}}" readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__name">
                        お問い合わせの種類
                    </th>
                    <td class="confirm-table__item">
                        <input type="text" name="category_id" class="confirm__input" value="{{$contents['category']}}" readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__name">
                        お問い合わせ内容
                    </th>
                    <td class="confirm-table__item">
                        <input type="text" name="detail" class="confirm__input" value="{{$contents['detail']}}" readonly>
                    </td>
                </tr>
            </table>
        </div>
        <div class="confirm-item__button">
            <button class="confirm-item__button-submit" type="submit">送信</button>
        </div>
    </form>
    <form action="/" class="confirm-correct" method="get">
        @csrf
        <div class="correct-item__button">
            <button class="correct-item__button-submit" type="submit">修正</button>
        </div>
    </form>
</div>



@endsection