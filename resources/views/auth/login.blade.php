@extends('frontend.layouts.main')

@section('content')
{{--<div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">--}}
{{--        <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">--}}
{{--          <div class="brand">--}}
{{--            <img class="brand-img" src="{{ asset('admin_assets') }}/assets//images/logo.png" alt="...">--}}
{{--            <h2 class="brand-text">{{ __('Login') }}</h2>--}}
{{--          </div>--}}
{{--          <p>Sign into your pages account</p>--}}
{{--            @if(Session::has('message'))--}}
{{--                <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>--}}
{{--            @endif--}}
{{--            <form method="POST" action="{{ route('login') }}">--}}
{{--                        @csrf--}}
{{--            <div class="form-group">--}}
{{--              <label class="sr-only" for="email">{{ __('E-Mail Address') }}</label>--}}
{{--              <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>--}}

{{--                    @error('username')--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                            <strong>{{ $message }}</strong>--}}
{{--                        </span>--}}
{{--                    @enderror--}}

{{--            </div>--}}

{{--            <div class="form-group">--}}
{{--              <label class="sr-only" for="inputPassword">{{ __('Password') }}</label>--}}
{{--                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--            </div>--}}
{{--            <div class="form-group clearfix">--}}
{{--              <div class="checkbox-custom checkbox-inline checkbox-primary float-left">--}}
{{--                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}
{{--                <label for="remember">Remember me</label>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--            <button type="submit" class="btn btn-primary btn-block">Sign in</button>--}}
{{--          </form>--}}

{{--          <footer class="page-copyright page-copyright-inverse">--}}
{{--            <p></p>--}}
{{--            <p>© {{ date('Y') }}. All RIGHT RESERVED.</p>--}}

{{--          </footer>--}}
{{--        </div>--}}
{{--      </div>--}}


<div id="login-page">
    <div class="custom-container ">
        <div class="inner common-flex">
            <div class="img-container item">
                <img src="{{ asset('client_assets') }}/img/login.png">
            </div>
            <div class="login-form item">
                <div class="inner center-align">
                    <div class="logo-with-text ">
                        <div class="logo-container">
                            <img src="{{ asset('client_assets') }}/img/logo/agni-logo.png" alt="">
                        </div>
{{--                        <div class="section-title">--}}
{{--                            <h2>Covid-19 Management System</h2>--}}
{{--                        </div>--}}
                        <div class="desc">
                            <p>Sign in below. If you’re new to Agni, you can create an account
                                <a href="{{ route('register') }}">here</a>.</p>
                        </div>
                    </div>
                    <div class="form-wrapper">
                        <div class="section-title">
                            <h2>Login Portal</h2>
                        </div>
                        @if(Session::has('message'))
                            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="fields">
                                <div class="form-group">
                                    <label for="email">{{ __('E-Mail Address') }}</label>
                                    <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>{{--                                    id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus--}}
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="action">
                                <button type="submit" class="covid-btn btn-red">
                                    Login
                                </button>

                                <h5><a href="">FORGOT PASSWORD?</a></h5>
                                <p>© {{ date('Y') }}. All RIGHT RESERVED.</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
