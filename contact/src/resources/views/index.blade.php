@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <script src="https://ajaxzip3.github.io/ajaxzip3.js"></script>

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
                        <div class="form__error">
                            @error('last_name')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form__input--nametext">
                        <input class="nametext" type="text" id="first_name" name="first_name"
                            value="{{ old('first_name') }}" />
                        <div class="form__hint">例）太郎</div>
                        <div class="form__error">
                            @error('first_name')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>



            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">性別</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="gender">
                    <div class="form__gendergroup-content">
                        <input type="radio" name="gender" value="男性" checked>
                        <label for="male1">男性</label>
                        <input type="radio" name="gender" value="女性">
                        <label for="female1">女性</label>
                        <div class="form__error">
                            @error('gender')
                                {{ $message }}
                            @enderror
                        </div>
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
                        <div class="form__error">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
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
                        <input type="text" name="postcode" id="postcode-input" maxlength="8"
                            onKeyUp="AjaxZip3.zip2addr(this,'','address','address')" value="{{ old('postcode') }}" />
                        <div class="form__hint">例）123-4567</div>
                        <div class="form__error">
                            @error('postcode')
                                {{ $message }}
                            @enderror
                        </div>
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
                        <input type="text" name="address" id="address-input" value="{{ old('address') }}" />
                        <div class="form__hint">例）東京都渋谷区千駄ヶ谷1-2-3</div>
                        <div class="form__error">
                            @error('address')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">建物名</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="billname" placeholder="" value="{{ old('building_name') }}" />
                        <div class="form__hint">例）千駄ヶ谷マンション101</div>
                        <div class="form__error">
                            @error('building_name')
                                {{ $message }}
                            @enderror
                        </div>
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
                        <div class="form__error">
                            @error('content')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="form__button">
                <button class="form__button-submit" type="submit">確認</button>
            </div>
        </form>
    </div>

    <script src="https://ajaxzip3.github.io/ajaxzip3.js"></script>
@endsection
