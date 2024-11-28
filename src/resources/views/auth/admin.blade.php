@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('button')
<form class="form" action="/logout" method="post">
    @csrf
    <button class="header-nav__button">Logout</button>
</form>
@endsection

@section('content')
<div class="admin-content">
    <div class="admin-ttl">
        <h2>Admin</h2>
    </div>
    <div class="admin-search">
        <form action="/search" class="admin-search__form" method="get">
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
                <button class="admin-search__button-submit" type="submit" formaction="/search">検索</button>
            </div>
            <div class="admin-search__item">
                <button class="admin-search__button-reset" type="submit" formaction="/admin">リセット</button>
            </div>
        </form>
    </div>


    @if(is_null(session('search_results')))

    <div class="export-form">
        <form action="/export" class="export-form__form">
            @csrf
            <button class="admin-export__button" type="submit">エクスポート</button>
        </form>
        <div class="admin-table__page">
            {{ $contents->links('pagination::bootstrap-4') }}
        </div>
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
                    <a href="#{{$content['id']}}" class="table_detail_btn">詳細</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    @foreach($contents as $content)
    <div class="modal" id="{{$content['id']}}">
        <a href="#!" class="modal-overlay"></a>
        <div class="modal__inner">
            <div class="modal__content">
                <form class="modal__detail-form" action="/delete" method="post">
                    @method('delete')
                    @csrf
                    <table class="modal-table">
                        <tr class="modal-table__row">
                            <th class="modal-table__name">
                                お名前
                            </th>
                            <td class="modal-table__item">
                                {{$content['first_name']}}{{$content['last_name']}}
                            </td>
                        </tr>
                        <tr class="modal-table__row">
                            <th class="modal-table__name">
                                性別
                            </th>
                            <td class="modal-table__item">
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
                        </tr>
                        <tr class="modal-table__row">
                            <th class="modal-table__name">
                                メールアドレス
                            <td class="modal-table__item">
                                {{$content['email']}}
                            </td>
                        </tr>
                        <tr class="modal-table__row">
                            <th class="modal-table__name">
                                電話番号
                            </th>
                            <td class="modal-table__item">
                                {{$content['tell']}}
                            </td>
                        </tr>
                        <tr class="modal-table__row">
                            <th class="modal-table__name">
                                住所
                            </th>
                            <td class="modal-table__item">
                                {{$content['address']}}
                            </td>
                        </tr>
                        <tr class="modal-table__row">
                            <th class="modal-table__name">
                                建物名
                            </th>
                            <td class="modal-table__item">
                                {{$content['building']}}
                            </td>
                        </tr>
                        <tr class="modal-table__row">
                            <th class="modal-table__name">
                                お問い合わせの種類
                            </th>
                            <td class="modal-table__item">
                                {{$content->category->content}}
                            </td>
                        </tr>
                        <tr class="modal-table__row">
                            <th class="modal-table__name">
                                お問い合わせ内容
                            </th>
                            <td class="modal-table__item">
                                {{$content['detail']}}
                            </td>
                        </tr>
                    </table>
                    <input type="hidden" class="modal-form__input" value="{{$content['id']}}" name="id">
                    <div class="modal-form__delete">
                        <button class="modal-form__delete-btn" type="submit">
                            削除
                        </button>
                    </div>
                </form>
            </div>

            <a href="/admin" class="modal__close-btn">×</a>
        </div>
    </div>
    @endforeach


    @else
    <div class="export-form">
        <form action="/export" class="export-form__form">
            @csrf
            <button class="admin-export__button" type="submit">エクスポート</button>
        </form>
        <div class="admin-table__page">
            {{ session('search_results')->links('pagination::bootstrap-4') }}
        </div>
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
@endsection