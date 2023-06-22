@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection

@section('content')
    <div class="contact-form__content">
        <div class="contact-form__heading">
            <h2>管理システム</h2>
        </div>

        <form class="form" action="admin/search" method="post">
            @csrf
            <div class="form__group">
                <div class="form__group-namegender">
                    <div class="form_group-title">
                        <span class="form__label--item">お名前</span>
                    </div>
                    <div class="radio--box">
                        <input class="nametext" type="text" id="name" name="fullname"
                            value="{{ old('fullname') }}" />
                        <span class="form__label--item">性別</span>
                        <label class="radio" for="male1">
                            <span class=input_dummy>
                                <input type="radio" class="radio_button" name="gender" value="" checked>
                                全て
                            </span>
                        </label>
                        <label class="radio" for="male1">
                            <span class=input_dummy>
                                <input type="radio" class="radio_button" name="gender" value="男性">
                                男性
                            </span>
                        </label>
                        <label class="radio" for="female1">
                            <span class=input_dummy>
                                <input type="radio" class="radio_button" name="gender" value="女性">
                                女性
                            </span>
                        </label>
                    </div>
                </div>

                <div class="registration_date">
                    <div class="form_group-title">
                        <span class="form__label--item">登録日</span>
                    </div>
                    <div class="registration_input">
                        <input type="date" name="start_date" value="create_at" />〜<input type="date" name="end_date"
                            value="update_at" />
                    </div>
                </div>

                <div class="email">
                    <div class="form_group-title">
                        <span class="form__label--item">メールアドレス</span>
                    </div>
                    <div class="email_input">
                        <input type="email" name="email" value="{{ old('email') }}" />
                    </div>
                </div>

                <div class="form_search_button">
                    <button class="form__button-submit" type="submit">検索</button>
                </div>
                <div class="form_reset_button">
                    <button class="form__button-reset" type="reset" value="リセット">リセット</button>
                </div>
        </form>
    </div>

    <div class="paginate">
        {{ $contacts->links('tailwind') }}
    </div>


    <div class="userdata_table">
        <table class="search_result_table">
            <tr>
                <th>ID</th>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>ご意見</th>
                <th></th>
            </tr>
            @foreach ($contacts as $contact)
                <tr>
                    <div class="table_inner">
                        <td>
                            <div class="table_id">{{ $contact->id }}</div>
                        </td>
                        <td>
                            <div class="table_fullname">{{ $contact->fullname }}</div>
                        </td>
                        <td>
                            <div class="table_gender">{{ $contact->gender }}</div>
                        </td>
                        <td>
                            <div class="table_email">{{ $contact->email }}</div>
                        </td>
                        <td>
                            <div class="table_opinion" title="{{ $contact->opinion }}">
                                {{ mb_strimwidth($contact->opinion, 0, 25, '...') }}
                            </div>

                        </td>

                        <td class="delete_cell">
                            <div class="form_delete_button">
                                <form class="form_table" action="{{ route('delete', ['id' => $contact->id]) }}"
                                    method="post">
                                    @method('DELETE')
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $contact->id }}">
                                    <button class="form__button-delete" type="submit">削除</button>
                                </form>
                            </div>
                        </td>
                    </div>
                </tr>
            @endforeach
        </table>
    </div>



    </div>
@endsection
