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
                <input type="text" class="contact-item__first_name" name="first_name" value="{{session('form.first_name',old('first_name'))}}" placeholder="例:山田">
                <input type="text" class="contact-item__last_name" name="last_name" value="{{session('form.last_name',old('last_name'))}}" placeholder="例:太郎">
                @error('first_name')
                <span class="error">{{$message}}</span>
                @enderror
                @error('last_name')
                <span class="error">{{$message}}</span>
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
                {{--
                @if(empty(session('form')))
                <input type="radio" class="contact-item__input-gender" name="gender" value="男性" {{old('gender')=='男性' ? 'checked' :''}} checked>男性
                <input type="radio" class="contact-item__input-gender--girl" name="gender" value="女性" {{old('gender')=='女性' ? 'checked' :''}}>女性
                <input type="radio" class="contact-item__input-gender--other" name="gender" value="その他" {{old('gender')=='その他' ? 'checked' :''}}>その他
                @else
                <input type="radio" class="contact-item__input-gender" name="gender" value="男性" {{session('form')['gender']=='男性' ? 'checked' :''}} checked>男性
                <input type="radio" class="contact-item__input-gender--girl" name="gender" value="女性" {{session('form')['gender']=='女性' ? 'checked' :''}}>女性
                <input type="radio" class="contact-item__input-gender--other" name="gender" value="その他" {{session('form')['gender']=='その他' ? 'checked' :''}}>その他
                @endif
                @error('gender')
                {{$errors->first('gender')}}
                @enderror
                --}}

                <input type="radio" class="contact-item__input-gender" name="gender" value="男性" {{old('gender')=='男性' || old('gender')===null && session('form') && session('form')['gender']=='男性'  ? 'checked' :''}} checked>男性
                <input type="radio" class="contact-item__input-gender--girl" name="gender" value="女性" {{old('gender')=='女性' || old('gender')===null && session('form') && session('form')['gender']=='女性'  ? 'checked' :''}}>女性
                <input type="radio" class="contact-item__input-gender--other" name="gender" value="その他" {{old('gender')=='その他' || old('gender')===null && session('form') && session('form')['gender']=='その他'  ? 'checked' :''}}>その他
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
                <input type="text" class="contact-item__email" name="email" value="{{session('form.email',old('email'))}}" placeholder="例:test@example.com">
                @error('email')
                <span class="error">{{$message}}</span>
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
                @php
                $tel_parts=[
                'tell_first'=>['placeholder'=>'080'],
                'tell_second'=>['placeholder'=>'1234'],
                'tell_third'=>['placeholder'=>'5678'],
                ];
                $tel_values=[
                'tell_first' => old('tell_first') ?? substr(session('form')['tell'] ?? '', 0, 3),
                'tell_second' => old('tell_second') ?? substr(session('form')['tell'] ?? '', 3, 4),
                'tell_third' => old('tell_third') ?? substr(session('form')['tell'] ?? '', 7, 4),
                ];
                @endphp
                @foreach($tel_parts as $name=>$part)
                <input type="tel" class="contact-item__tell" name="{{$name}}" value="{{$tel_values[$name]}}" placeholder="{{$part['placeholder']}}">
                @if(!$loop->last)
                -
                @endif
                @endforeach

                @if($errors->hasAny(['tell_first', 'tell_second', 'tell_third']))
                <ul class="error">
                    @foreach(['tell_first', 'tell_second', 'tell_third'] as $tell_tag)
                    @if($errors->has($tell_tag))
                    <li>{{$errors->first($tell_tag)}}</li>
                    @endif
                    @endforeach
                </ul>
                @endif
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
                <input type="text" class="contact-item__address" name="address" value="{{old('address') ?? session('form')['address'] ?? ''}}" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3">
                @error('address')
                <span class="error">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="contact-item">
            <div class="contact-item__name">
                <span>建物名</span>
            </div>
            <div class="contact-item__input">
                <input type="text" class="contact-item__building" name="building" value="{{old('building') ?? session('form')['building'] ?? ''}}" placeholder="例:駄ヶ谷マンション101">
                @error('building')
                <span class="error">{{$message}}</span>
                @enderror
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
                    <option value="{{ $category['id'] }}"
                        {{ (old('category') == $category['id'] || (old('category') === null && session('form') && session('form')['category_id'] == $category['id'])) ? 'selected' : '' }}>
                        {{ $category['content'] }}
                    </option>
                    @endforeach
                </select>
                @error('category')
                <span class="error">{{ $message }}</span>
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
                <textarea id="" class="contact-item__detail" name="detail" placeholder="お問い合わせ内容をご記載下さい">{{old('detail') ?? session('form')['detail'] ?? ''}}</textarea>
                @error('detail')
                <span class="error">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="contact-item__button">
            <button class="contact-item__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection