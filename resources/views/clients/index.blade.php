@extends('layout')

@section('content')




    <div class="row">
        <div class="small-12 medium-6 large-4 columns">

            <form method="POST" action="/clients" class="new-user-form">

                {!! csrf_field() !!}

                <div class="row column">
                    <h4 class="text-center">New Client</h4>
                    <hr />

                    @include('errors')

                    <label>Name
                        <input type="text" id="name" name="name" placeholder="Enter your full name" value="{{ old('name') }}" required>
                    </label>
                    <label>Service
                        <textarea rows="4" id="service" name="service" placeholder="Enter your email" value="{{ old('email') }}" required></textarea>
                    </label>
                    <p><button type="submit" class="button expanded">Create Client</button></p>
                </div>
            </form>

        </div>





        <div class="small-12 medium-6 large-8 columns">

            <h3 class="text-center">CLIENTS</h3>
            <table class="hover">
                <thead>
                <tr>
                    <th width="200">Name</th>
                    <th>Service</th>
                </tr>
                </thead>
                <tbody>

                @foreach($clients as $client)

                    <tr>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->service }}</td>
                    </tr>

                @endforeach

                </tbody>
            </table>


        </div>
    </div>







@stop