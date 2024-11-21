@extends('layouts.user')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="admin-content">
    <div class="admin-ttl">
        <h2>Admin</h2>
    </div>
    <div class="admin-search">
        <form action="/search" class="admin-search__form" method="post">
            @csrf
            <div class="admin-search__item">
                <input type="text" name="name_email" class="admin-search__item-name" placeholder="名前やメールアドレスを入力してください">
            </div>
            <div class="admin-search__item">
                <select name="gender" class="admin-search__item-gender" name="gender">
                    <option value="" selected hidden>性別</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">その他</option>
                    <option value="">全て</option>
                </select>
            </div>
            <div class="admin-search__item">
                <select name="category" class="admin-search__item-category">
                    <option value="" selected hidden>お問い合わせの種類</option>
                    @foreach($categories as $category)
                    <option value="{{$category['id']}}">{{$category['content']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="admin-search__item">
                <input type="date" class="admin-search__item-date" name="date">
            </div>
            <div class="admin-search__item">
                <button class="admin-search__button-submit" type="submit">検索</button>
            </div>
        </form>
        <form action="/admin" type="post" class="admin-search__form-reset">
            @csrf
            <div class="admin-search__button">
                <button class="admin-search__button-reset" type="submit">リセット</button>
            </div>
        </form>
    </div>

    @if(is_null(session('search_results')))
    <div class="admin-table__page">
        {{ $contents->links('pagination::bootstrap-4') }}
    </div>
    <div class="admin-table">
        <table class="admin-table__inner">
            <tr class="table-row">
                <th class="admin-table__name ">
                    お名前
                </th>
                <th class="admin-table__name ">
                    性別
                </th>
                <th class="admin-table__name ">
                    メールアドレス
                </th>
                <th class="admin-table__name ">
                    お問い合わせの種類
                </th>
                <th class="admin-table__name--last">
                </th>
            </tr>
            @foreach($contents as $content)
            <tr class="table-row">
                <td class="table-item">
                    {{$content['first_name'].$content['last_name']}}
                </td>
                <td class="table-item">
                    <?php
                    if ($content['gender'] == '1') {
                        echo '男性';
                    } elseif ($content['gender'] == '2') {
                        echo '女性';
                    } else {
                        echo 'その他';
                    }
                    ?>
                </td>
                <td class="table-item">
                    {{$content['email']}}
                </td>
                <td class="table-item">
                    {{$content->category->content}}
                </td>
                <td class="table-item">
                    @livewire('test')
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    @else
    {{ $contents->links('pagination::bootstrap-4') }}
    <div class="admin-table">
        <table class="admin-table__inner">
            <tr class="table-row">
                <th class="admin-table__name ">
                    お名前
                </th>
                <th class="admin-table__name ">
                    性別
                </th>
                <th class="admin-table__name ">
                    メールアドレス
                </th>
                <th class="admin-table__name ">
                    お問い合わせの種類
                </th>
                <th class="admin-table__name ">
                </th>
            </tr>
            @foreach(session('search_results') as $content)
            <tr class="table-row">
                <td class="table-item">
                    {{$content['first_name'].$content['last_name']}}
                </td>
                <td class="table-item">
                    <?php
                    if ($content['gender'] == '1') {
                        echo '男性';
                    } elseif ($content['gender'] == '2') {
                        echo '女性';
                    } else {
                        echo 'その他';
                    }
                    ?>
                </td>
                <td class="table-item">
                    {{$content['email']}}
                </td>
                <td class="table-item">
                    {{$content->category->content}}
                </td>
                <td class="table-item">
                    @livewire('test')
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    @endif
</div>
@livewire('test')
@endsection