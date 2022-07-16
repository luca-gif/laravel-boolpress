@extends('layouts.app')

<!-- Styles -->
<style>
    main {
        background-color: rgba(245, 245, 245, 0.449);
    }

    .lm-container {
        margin: 0 auto;
        padding: 30px;
        width: 650px;
        height: 550px;
        border-radius: 10px;
        border: 8px solid #accded;
        border-top: 35px solid #accded;
        background-image: linear-gradient(to bottom, #54c0e8, #fff 30%);
        display: flex;
        flex-wrap: wrap;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
    }

    .welcome {
        height: 100px;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .aside {
        width: 200px;
        height: 350px;
    }

    .login {
        width: 350px;
        height: 350px;
        display: flex;
        flex-direction: column;
        padding-top: 30px;
        margin-left: 10px
    }

    .text {
        font-size: 28px
    }

    .mb-2 {
        margin-bottom: 10px
    }

    .access {
        background-color: transparent;
        border-radius: 5px;
        margin-bottom: 10px;
        width: 250px;

    }

    .logo {
        text-align: right;
    }

    .logo img {
        border-radius: 15px;
        border: 1px solid grey;
        margin-top: 25px;
        margin-right: 15px;

    }

    a {
        text-decoration: none;
        color: rgba(0, 0, 231, 0.682);
    }

    .lm-btn button {
        width: 80px;
        height: 25px;
        margin-top: 15px;
        border: 1px solid black;
        border-radius: 3px;
    }
</style>

@section('content')
    <div class="lm-container">
        <div class="welcome">
            <div class="text">
                <div class="mb-2">Sign in to</div>
                <div>Windows Live <strong>Messenger</strong></divclass=>
                </div>
            </div>
        </div>

        <div class="aside">
            <div class="logo"><img src="{{ asset('js/assets/msn-logo.png') }}" alt=""></div>
        </div>


        <div class="login">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <div>
                        <input id="email" type="email" class=" access @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            placeholder="example555@hotmail.com">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        {{-- <label for="password">{{ __('Password') }}</label> --}}

                        <div>
                            <input id="password" type="password" class="access @error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <a href="#">
                    <p>Forgot your password?</p>
                </a>
                <p>Sign in as:
                    <select name="status" id="status">
                        <option value="0">Available</option>
                        <option value="1">Busy</option>
                    </select>
                </p>
                <div>
                    <input id="remember" type="checkbox">
                    <label for="remember">Remember my ID and password</label>
                </div>
                <div>
                    <input id="auto" type="checkbox">
                    <label for="auto">Sign me in automatically</label>
                </div>
                <div class="lm-btn">
                    <button type="submit">
                        {{ __('Sign in') }}
                    </button>
                    <button type="submit">Cancel</button>
                </div>
                <p>Don't have a Windows Live Id? <a href="{{ route('register') }}">Sign up</a></p>
        </div>
    </div>
@endsection
