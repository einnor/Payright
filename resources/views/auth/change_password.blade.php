@extends('layout')

@section('content')



    <div class="row">
        <div class="medium-6 medium-centered large-4 large-centered columns">

            <form method="POST" action="/auth/password/update" class="log-in-form">

                {!! csrf_field() !!}

                <div class="row column">
                    <h4 class="text-center">Change Password</h4>
                    <hr />

                    @include('errors')


                    <label>Old Password
                        <input type="password" id="old_password" name="old_password" placeholder="Enter old password" value="{{ old('old_password') }}" required>
                    </label>
                    <label>New Password
                        <input type="password" id="new_password" name="new_password" placeholder="Enter new password" value="{{ old('new_password') }}" required>
                    </label>
                    <label>Confirm New Password
                        <input type="password" id="confirm_new_password" name="confirm_new_password" placeholder="Confirm new password" value="{{ old('confirm_new_password') }}" required>
                    </label>
                    <p><button type="submit" class="button expanded">Change Password</button></p>
                </div>
            </form>

        </div>
    </div>



@stop