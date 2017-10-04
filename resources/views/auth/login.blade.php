@extends('layouts.authentikasi')
@section('content')


<div>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="{{route('login')}}" method="POST">
                    {!! csrf_field() !!}
                    <h1>Login To Nomina</h1>
                    <div>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder ="email" required autofocus/>
                        @if ($errors->has('email'))
                            <span style="color:red">
                               *{{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>
                    <div>
                        <input id="password" type="password" placeholder="password" class="form-control" name="password" required/>
                        @if ($errors->has('password'))
                            <span style="color:red">
                               *{{ $errors->first('password') }}
                            </span>
                        @endif
                        @if(session()->get('failed_login'))
                            {{session()->get('failed_login')}}
                        @endif
                    </div>
                    {{--<div class="captcha-wrap">--}}
                        {{--{!! app('captcha')->display() !!}--}}
                        {{--@if ($errors->has('g-recaptcha-response'))--}}
                            {{--<span style="color:red">*{{ $errors->first('g-recaptcha-response') }}</span>--}}
                        {{--@endif--}}
                    {{--</div><!-- .captcha-wrap -->--}}

                    <div style="margin-top:10%">
                        <button class="btn btn-default submit" type="submit">Log in</button>
                        {{--<a class="reset_pass to_forgot" href="{{ route('password.request') }}">Forgot your password?</a>--}}
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-money"></i> Nomina</h1>
                            <p>©2017 All Rights Reserved. PT. Nomina VIP Indonesia Privacy and Terms</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
@endsection
