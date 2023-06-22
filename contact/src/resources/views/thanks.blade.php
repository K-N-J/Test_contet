@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
    <div class="thanks__content">
        <div class="thanks__heading">
            <h2>ご意見いただきありがとうございました。</h2>
        </div>
        <div class="form__button">
            <a href="/" class="form__button-submit">トップページへ</a>
        </div>
    </div>
@endsection
