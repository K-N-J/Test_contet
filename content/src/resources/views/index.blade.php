@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="contact-form__content">
        <div class="contact-form__heading">
            <h2>お問い合わせ</h2>
        </div>

        <form class="form" action="contacts/confirm" method="post">
            @csrf
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お名前</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--nametext">
                        <input class="nametext" type="text" id="last_name" name="last_name"
                            value="{{ old('last_name') }}" />
                        <div class="form__hint">例）テスト</div>
                    </div>

                    <div class="form__input--nametext">
                        <input class="nametext" type="text" id="first_name" name="first_name"
                            value="{{ old('first_name') }}" />
                        <div class="form__hint">例）太郎</div>
                    </div>
                </div>
            </div>
            <div class="form__error">
                @error('name')
                    {{ $message }}
                @enderror
            </div>

            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">性別</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="gender">
                    <div class="form__gendergroup-content">
                        <input type="radio" id="male" name="gender" value="男性">
                        <label for="male1">男性</label>
                        <input type="radio" id="female" name="gender" value="女性">
                        <label for="female1">女性</label>
                    </div>
                    <div class="form__error">
                        @error('gender')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">メールアドレス</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="email" name="email" placeholder="" value="{{ old('email') }}" />
                        <div class="form__hint">例）test@example.com</div>
                    </div>
                    <div class="form__error">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">郵便番号</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                  <p>〒</p>
                    <div class="form__input--text">
                        <input type="text" name="postcode" placeholder="" value="{{ old('postcode') }}" />
                        <div class="form__hint">例）123-4567</div>
                    </div>
                    <div class="form__error">
                        @error('postcode')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">住所</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="address" placeholder="" value="{{ old('address') }}" />
                        <div class="form__hint">例）東京都渋谷区千駄ヶ谷1-2-3</div>
                    </div>
                    <div class="form__error">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">建物名</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="billname" placeholder="" value="{{ old('billname') }}" />
                        <div class="form__hint">例）千駄ヶ谷マンション101</div>
                    </div>
                    <div class="form__error">
                        @error('billname')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">ご意見</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--textarea">
                        <textarea name="content">{{ old('content') }}</textarea>
                    </div>
                </div>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">確認</button>
            </div>
        </form>
    </div>
@endsection
