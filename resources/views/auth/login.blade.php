@extends('layout')

@section('content')



    <div class="row">
        <div class="medium-6 medium-centered large-4 large-centered columns">

            <form method="POST" action="/auth/login">

                {!! csrf_field() !!}

                <div class="row column log-in-form">
                    <h4 class="text-center">Sign In</h4>
                    <hr />

                    @include('errors')

                    <label>Email
                        <input type="email" id="email" name="email" placeholder="Enter your email "value="{{ old('email') }}" required>
                    </label>
                    <label>Password
                        <input type="password" id="password" name="password" placeholder="Enter password" value="{{ old('password') }}" required>
                    </label>
                    <input type="checkbox" id="remember" name="remember"><label for="remember">Remember me</label>
                    <p><button type="submit" class="button expanded">Log In</button></p>
                </div>
            </form>

        </div>
    </div>



@stop