@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div class="contact-content">
    <form action="/confirm" class="contact-form" method="post">
        @csrf
        <div class="contact-ttl">
            <h2>
                Contact
            </h2>
        </div>
        <div class="contact-item">
            <div class="contact-item__name">
                <span>
                    お名前
                    <span class="contact-item__name--red">
                        ※
                    </span>
                </span>
            </div>
            <div class="contact-item__input">
                <input type="text" class="contact-item__first_name" name="first_name" value="{{old('first_name')}}" placeholder="例:山田">
                @error('first_name')
                {{$errors->first('first_name')}}
                @enderror
                <input type=" text" class="contact-item__input-last_name" name="last_name" value="{{old('last_name')}}" placeholder="例:太郎">
                @error('last_name')
                {{$errors->first('last_name')}}
                @enderror
            </div>
        </div>
        <div class="contact-item">
            <div class="contact-item__name">
                <span>
                    性別
                    <span class="contact-item__name--red">
                        ※
                    </span>
                </span>
            </div>
            <div class="contact-item__input">
                <input type="radio" class="contact-item__input-gender" name="gender" value="男性" {{old('gender')=='男性' ? 'checked' :''}} checked>男性
                <input type="radio" class="contact-item__input-gender--girl" name="gender" value="女性" {{old('gender')=='女性' ? 'checked' :''}}>女性
                <input type="radio" class="contact-item__input-gender--other" name="gender" value="その他" {{old('gender')=='その他' ? 'checked' :''}}>その他
                @error('first_name')
                {{$errors->first('gender')}}
                @enderror
            </div>
        </div>
        <div class="contact-item">
            <div class="contact-item__name">
                <span>
                    メールアドレス
                    <span class="contact-item__name--red">
                        ※
                    </span>
                </span>
            </div>
            <div class="contact-item__input">
                <input type="email" class="contact-item__input-email" name="email" value="{{old('email')}}" placeholder="例:test@example.com">
                @error('email')
                {{$errors->first('email')}}
                @enderror
            </div>
        </div>
        <div class="contact-item">
            <div class="contact-item__name">
                <span>
                    電話番号
                    <span class="contact-item__name--red">
                        ※
                    </span>
                </span>
            </div>
            <div class="contact-item__input">
                <input type="tel" class="contact-item__input-tell" name="tell_first" value="{{old('tell_first')}}" placeholder="080">-
                @error('tell_first')
                {{$errors->first('tell_first')}}
                @enderror
                <input type="tel" class="contact-item__input-tell" name="tell_second" value="{{old('tell_second')}}" placeholder="1234">-
                @error('tell_second')
                {{$errors->first('tell_second')}}
                @enderror
                <input type="tel" class="contact-item__input-tell" name="tell_third" value="{{old('tell_third')}}" placeholder="5678">
                @error('tell_third')
                {{$errors->first('tell_third')}}
                @enderror
            </div>
        </div>
        <div class="contact-item">
            <div class="contact-item__name">
                <span>
                    住所
                    <span class="contact-item__name--red">
                        ※
                    </span>
                </span>
            </div>
            <div class="contact-item__input">
                <input type="text" class="contact-item__input-address" name="address" value="{{old('address')}}" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3">
                @error('address')
                {{$errors->first('address')}}
                @enderror
            </div>
        </div>
        <div class="contact-item">
            <div class="contact-item__name">
                <span>建物名</span>
            </div>
            <div class="contact-item__input">
                <input type="text" class="contact-item__input-building" name="building" value="{{old('building')}}" placeholder="例:駄ヶ谷マンション101">
            </div>
        </div>
        <div class="contact-item">
            <div class="contact-item__name">
                <span>
                    お問い合わせの種類
                    <span class="contact-item__name--red">
                        ※
                    </span>
                </span>
            </div>
            <div class="contact-item__input">
                <select name="category" class="contact-item__input-category">
                    <option value="" selected hidden>選択してください</option>
                    @foreach($categories as $category)
                    <option value="{{$category['id']}}">{{$category['content']}}</option>
                    @endforeach
                </select>
                @error(' category')
                {{$errors->first('category')}}
                @enderror
            </div>
        </div>
        <div class="contact-item">
            <div class="contact-item__name">
                <span>
                    お問い合わせの内容
                    <span class="contact-item__name--red">
                        ※
                    </span>
                </span>
            </div>
            <div class="contact-item__input">
                <textarea id="" class="contact-item__input-detail" name="detail" value="detail" placeholder="お問い合わせ内容をご記載下さい"></textarea>
                @error('detail')
                {{$errors->first('detail')}}
                @enderror
            </div>
        </div>
        <div class="contact-item__button">
            <button class="contact-item__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection