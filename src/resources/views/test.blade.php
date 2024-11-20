@extends('user.app')

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

                <input type=" text" class="contact-item__last_name" name="last_name" value="{{old('last_name')}}" placeholder="例:太郎">
                @error('last_name')
                {{$errors->first('last_name')}}
                @enderror
            </div>
        </div>
        <div class="contact-item__button">
            <button class="contact-item__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection