@extends('layout')

@section('content')




    <div class="row">
        <div class="small-12 medium-6 large-4 columns">

            <form method="POST" action="/invoices" class="new-user-form">

                {!! csrf_field() !!}

                <div class="row column">
                    <h4 class="text-center">New Invoice</h4>
                    <hr />

                    @include('errors')

                    <label>Client
                        <select id="client_id" name="client_id">

                            @foreach($clients as $client)

                                <option value="{{ $client->id }}">{{ $client->name }}</option>

                            @endforeach

                        </select>
                    </label>
                    <label>Particular
                        <input type="text" id="particular" name="particular" placeholder="Enter particular" value="{{ old('particular') }}" required>
                    </label>
                    <label>Amount
                        <input type="number" min="0" id="amount" name="amount" placeholder="Enter amount" value="{{ old('amount') }}" required>
                    </label>
                    <p><button type="submit" class="button expanded">Create Client</button></p>
                </div>
            </form>

        </div>





        <div class="small-12 medium-6 large-8 columns">

            <h3 class="text-center">INVOICES</h3>
            <table class="hover">
                <thead>
                <tr>
                    <th width="200">Client</th>
                    <th>Particular</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>

                @foreach($invoices as $invoice)

                    <tr>
                        <td><a href="invoices/{{ $invoice->id }}">{{ $invoice->client->name }}</a></td>
                        <td>{{ $invoice->particular }}</td>
                        <td>{{ $invoice->amount }}</td>
                    </tr>

                @endforeach

                </tbody>
            </table>


        </div>
    </div>







@stop