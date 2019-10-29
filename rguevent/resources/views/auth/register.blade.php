@extends('layouts.header')

@section('content')

<div class="login_screen" style="background-image: url('{{ asset('img/background.png') }}')">

    <div class="login_card">

        <div class="login_element">
            <div class="login_header">{{ __('Register') }}</div>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="login_element">
            <input placeholder="name" id="name" type="text" class="textbox @error('name') input_error @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            </div>

            <div class="login_element">
                <input placeholder="email" id="email" type="email" class="textbox @error('email') input_error @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            </div>

            <div class="login_element">
                <input placeholder="password" id="password" type="password" class="textbox @error('password') input_error @enderror" name="password" required autocomplete="current-password">
            </div>

            <div class="login_element">
                <input placeholder="confirm password" id="password-confirm" type="password" class="textbox" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="login_element">
                <button type="submit" class="button">{{ __('Register') }}</button>
            </div>
            
        </form>
    </div>

</div>
@endsection