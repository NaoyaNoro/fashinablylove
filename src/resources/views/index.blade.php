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
                {{--
                @if(empty(session('form')))
                <input type="text" class="contact-item__first_name" name="first_name" value="{{old('first_name')}}" placeholder="例:山田">
                @else
                <input type="text" class="contact-item__first_name" name="first_name" value="{{session('form')['first_name']}}">
                @endif
                @error('first_name')
                {{$errors->first('first_name')}}
                @enderror

                @if(empty(session('form')))
                <input type=" text" class="contact-item__last_name" name="last_name" value="{{old('last_name')}}" placeholder="例:太郎">
                @else
                <input type="text" class="contact-item__last_name" name="last_name" value="{{session('form')['last_name']}}">
                @endif
                @error('last_name')
                {{$errors->first('last_name')}}
                @enderror
                --}}
                <input type="text" class="contact-item__first_name" name="first_name" value="{{session('form.first_name',old('first_name'))}}" placeholder="例:山田">
                @error('first_name')
                {{$errors->first('first_name')}}
                @enderror
                <input type="text" class="contact-item__last_name" name="last_name" value="{{session('form.last_name',old('first_name'))}}" placeholder="例:太郎">
                @error('first_name')
                {{$errors->first('first_name')}}
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
                @if(empty(session('form')))
                <input type="radio" class="contact-item__input-gender" name="gender" value="男性" {{old('gender')=='男性' ? 'checked' :''}} checked>男性
                <input type="radio" class="contact-item__input-gender--girl" name="gender" value="女性" {{old('gender')=='女性' ? 'checked' :''}}>女性
                <input type="radio" class="contact-item__input-gender--other" name="gender" value="その他" {{old('gender')=='その他' ? 'checked' :''}}>その他
                @else
                <input type="radio" class="contact-item__input-gender" name="gender" value="男性" {{session('form')['gender']=='男性' ? 'checked' :''}} checked>男性
                <input type="radio" class="contact-item__input-gender--girl" name="gender" value="女性" {{session('form')['gender']=='女性' ? 'checked' :''}}>女性
                <input type="radio" class="contact-item__input-gender--other" name="gender" value="その他" {{session('form')['gender']=='その他' ? 'checked' :''}}>その他
                @endif
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
                @if(empty(session('form')))
                <input type="email" class="contact-item__email" name="email" value="{{old('email')}}" placeholder="例:test@example.com">
                @else
                <input type="text" class="contact-item__email" name="email" value="{{session('form')['email']}}">
                @endif
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
                @if(empty(session('form')))
                <input type="tel" class="contact-item__tell" name="tell_first" value="{{old('tell_first')}}" placeholder="080">
                @else
                <input type="text" class="contact-item__tell" name="tell_first" value="{{substr(session('form')['tell'],0,3)}}">
                @endif
                -
                @error('tell_first')
                {{$errors->first('tell_first')}}
                @enderror

                @if(empty(session('form')))
                <input type="tel" class="contact-item__tell" name="tell_second" value="{{old('tell_second')}}" placeholder="1234">
                @else
                <input type="text" class="contact-item__tell" name="tell_second" value="{{substr(session('form')['tell'],3,4)}}">
                @endif
                -
                @error('tell_second')
                {{$errors->first('tell_second')}}
                @enderror

                @if(empty(session('form')))
                <input type="tel" class="contact-item__tell" name="tell_third" value="{{old('tell_third')}}" placeholder="5678">
                @else
                <input type="text" class="contact-item__tell" name="tell_third" value="{{substr(session('form')['tell'],7,4)}}">
                @endif
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
                @if(empty(session('form')))
                <input type="text" class="contact-item__address" name="address" value="{{old('address')}}" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3">
                @else
                <input type="text" class="contact-item__address" name="address" value="{{session('form')['address']}}">
                @endif
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
                @if(empty(session('form')))
                <input type="text" class="contact-item__building" name="building" value="{{old('building')}}" placeholder="例:駄ヶ谷マンション101">
                @else
                <input type="text" class="contact-item__building" name="building" value="{{session('form')['building']}}">
                @endif
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
                @if(empty(session('form')))
                <select name="category" class="contact-item__input-category">
                    <option value="" selected hidden>選択してください</option>
                    @foreach($categories as $category)
                    <option value="{{$category['id']}}">{{$category['content']}}</option>
                    @endforeach
                </select>
                @else
                <select name="category" class="contact-item__category">
                    @foreach($categories as $category)
                    @if(session('form')['category_id']==$category['id'])
                    <option value="{{$category['id']}}" selected>{{$category['content']}}</option>
                    @else
                    <option value="{{$category['id']}}">{{$category['content']}}</option>
                    @endif
                    @endforeach
                </select>
                @endif
                @error('category_id')
                {{$errors->first('category_id')}}
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
                @if(empty(session('form')))
                <textarea id="" class="contact-item__detail" name="detail" value="detail" placeholder="お問い合わせ内容をご記載下さい">{{old('detail')}}</textarea>
                @else
                <textarea class="contact-item__detail" name="detail">{{session('form')['detail']}}</textarea>
                @endif
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