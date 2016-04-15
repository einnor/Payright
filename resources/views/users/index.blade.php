@extends('layout')

@section('content')




    <div class="row">
        <div class="small-12 medium-6 large-4 columns">

            <form method="POST" action="/users" class="new-user-form">

                {!! csrf_field() !!}

                <div class="row column">
                    <h4 class="text-center">New User</h4>
                    <hr />

                    @include('errors')

                    <label>Name
                        <input type="text" id="name" name="name" placeholder="Enter your full name "value="{{ old('name') }}" required>
                    </label>
                    <label>Email
                        <input type="email" id="email" name="email" placeholder="Enter your email "value="{{ old('email') }}" required>
                    </label>
                    <label>Role
                        <select id="role" name="role">
                            <option value="1">Financial Officer</option>
                            <option value="2">Financial Analyst</option>
                            <option value="3">Financial Manager</option>
                            <option value="4">System Administrator</option>
                        </select>
                    <p><button type="submit" class="button expanded">Create User</button></p>
                </div>
            </form>

        </div>





        <div class="small-12 medium-6 large-8 columns">

            <h3 class="text-center">USERS</h3>
            <table class="hover">
                <thead>
                <tr>
                    <th width="200">Name</th>
                    <th>E-Mail</th>
                    <th>Role</th>
                </tr>
                </thead>
                <tbody>

                @foreach($users as $user)

                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role}}</td>
                    </tr>

                @endforeach

                </tbody>
            </table>


        </div>
    </div>







@stop