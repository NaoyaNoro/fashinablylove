@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/thanks.css')}}">
@endsection

@section('content')
<div class="thanks-content">
    <div class="thanks-content__ttl">
        <p>
            お問い合わせありがとうございました
        </p>
    </div>
    <form action="/" class="thanks-form" method="get">
        @csrf
        <div class="thanks-item__button">
            <button class="thanks-item__button-submit" type="submit">Home</button>
        </div>
    </form>
</div>

@endsection