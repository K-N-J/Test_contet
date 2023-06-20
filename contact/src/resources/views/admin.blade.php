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

                    <input class="nametext" type="text" id="name" name="fullname" value="{{ old('fullname') }}" />

                    <span class="form__label--item">性別</span>
                    <input type="radio" name="gender" value="{{ old('gender') }}" checked>
                    <label for="male1">全て</label>
                    <input type="radio" name="gender" value="{{ old('gender') }}">
                    <label for="male1">男性</label>
                    <input type="radio" name="gender" value="{{ old('gender') }}">
                    <label for="female1">女性</label>
                </div>

                <div class="registration_date">
                    <div class="form_group-title">
                        <span class="form__label--item">登録日</span>
                    </div>
                    <div class="registration_input">
                        <input type="date" name="start_date" value="{{ old('date') }}" />〜<input type="date"
                            name="end_date" value="{{ old('date') }}" />
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
                    <button class="form__button-reset" type="submit">リセット</button>
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
                            <div class="table_opinion">{{ $contact->opinion }}</div>
                        </td>

                        <td class="delete_cell">
                            <div class="form_delete_button">
                                <form class="form_table" action="{{ route('delete', ['id' => $contact->id]) }}" method="post">
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
