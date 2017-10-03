@extends('layouts.myApp')

@section('content')
<div class="container">
    <div class="row">
        <div class="col m8 col offset-m2">
            <br>
            <br>
            <br><br>
            <br>
            <div class="panel panel-default ">
                <div class="panel-heading center-align"><h3 >Login</h3></div>
                <div class="panel-body">
                    <form class="col m10 offset-m1" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="row{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class=" input-field ">
                                <input id="email" type="email" class="" name="email" value="{{ old('email') }}" required autofocus>
                                <label for="email">E-Mail Address</label>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="input-field ">
                                <input id="password" type="password" class="" name="password" required>
                                <label for="password" >Password</label>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
{{--
                        <div class="row">
                            <div class="col s12">
                                <p>
                                    <input type="checkbox"  name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember">Remember me</label>
                                </p>
                            </div>
                        </div>--}}
                        <div class="divider"></div>
                        <br/>

                        <div class="row">
                            <div class="col m8">
                                <div class="row"> <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>

                                    <a href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a></div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br><br>
<br><br>
<br>
@endsection
