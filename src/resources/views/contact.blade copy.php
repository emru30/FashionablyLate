@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')
<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>
    <form class="form" action="contacts/confirm" method="post">
    @csrf
    <!-- 名前 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="last_name" placeholder="例:山田" value="{{ old('last_name') }}">
                </div>
                <div class="form__error">
                    @error('last_name')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form__input--text">
                    <input type="text" name="first_name" placeholder="例:太郎" value="{{ old('first_name') }}">
                </div>
                <div class="form__error">
                    @error('first_name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <!-- 性別 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <label><input type="radio" name="gender" value="1">男性</label>
                <label><input type="radio" name="gender" value="2">女性</label>
                <label><input type="radio" name="gender" value="3">その他</label>
                <div class="form__error">
                    @error('gender')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <!-- メールアドレス -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}">
                </div>
                <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <!-- 電話番号 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content tel-inputs">
                <input type="text" name="tel1" maxlength="4" placeholder="080" value="{{ old('tel1') }}">
                <input type="text" name="tel2" maxlength="4" placeholder="1234" value="{{ old('tel2') }}">
                <input type="text" name="tel3" maxlength="4" placeholder="5678" value="{{ old('tel3') }}">
                    @if ($errors->has('tel'))        <p class="form__error">{{ $errors->first('tel') }}</p>
                    @endif
                </div>
            </div>
            <!-- 住所 -->
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">住所</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <input type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                    @if ($errors->has('address'))
                    <p class="form__error">{{ $errors->first('address') }}</p>
                    @endif
                </div>
            </div>
            <!-- 建物名 -->
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">建物名</span>
                </div>
                <div class="form__group-content">
                    <input type="text" name="building" placeholder="例:千駄ヶ谷マンション101" value="{{ old('building') }}">
                </div>
            </div>
            <!-- お問い合わせの種類 -->
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お問い合わせの種類</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <select name="category_id">
                        <option value="">選択してください</option>
                        @foreach ($categories as $id => $name)
                        <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>
                        {{ $name }}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('category_id'))
                    <p class="form__error">{{ $errors->first('category_id') }}</p>
                    @endif
                </div>
            </div>
            <!-- お問い合わせ内容 -->                <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お問い合わせ内容</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                    @if ($errors->has('detail'))                      <p class="form__error">{{ $errors->first('detail') }}</p>
                    @endif
                </div>
            </div>
            <!-- 確認ボタン -->
            <div class="form__button">
                    <button type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection