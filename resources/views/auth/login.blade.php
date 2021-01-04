@extends('layouts.templates')

@section('content')

<div  class="container">
    <form method="POST" class="login-form" action="{{ route('login') }}">
        @csrf
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_profile"></i></span>
                <input id="email"  type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>Esta credencial no concuerda con nuestros registros</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>Esta credencial no concuerda con nuestros registros</strong>
                        </span>
                    @enderror
            </div>
            {{-- <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> --}}

                {{-- <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label> --}}
                {{-- <span class="pull-right"> <a href="#"> Olviaste tu password?</a></span>
            </div> --}}
            <button type="submit" class="btn btn-primary btn-lg btn-block">
                {{ __('Ingresar') }}
            </button>
            @if (Route::has('password.request'))
                <a class="btn btn-info btn-lg btn-block" href="{{ route('register') }}">
                    {{ __('Regístrate') }}
                </a>
            @endif
        </div>
    </form>
</div>
@endsection
