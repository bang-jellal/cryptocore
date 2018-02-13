@extends('layouts.app_auth')

@section('content')
    <p class="login-box-msg">Sign in to start your session</p>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <input type="email" id="email" class="form-control"
                   placeholder="E-Mail Address" name="email" value="{{ old('email') }}">
            @if ($errors->has('email'))
                <span class="help-block">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <input type="password" id="password" class="form-control"
                   placeholder="Password" name="password" value="{{ old('password') }}">
            @if ($errors->has('password'))
                <span class="help-block">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    <a href="{{ route('password.request') }}">I forgot my password</a><br>
    <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
@endsection
