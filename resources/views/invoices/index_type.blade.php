@extends('layout')

@section('content')




    <div class="row">

        <div class="small-12 medium-12 large-10 large-offset-1 columns">

            <h3 class="text-center">INVOICES</h3>
            <table class="hover">
                <thead>
                <tr>
                    <th width="200">Client</th>
                    <th>Particular</th>
                    <th>Amount</th>
                    <th>Created On</th>
                    <th>Created By</th>
                </tr>
                </thead>
                <tbody>

                @foreach($invoices as $invoice)

                    <tr>
                        <td><a href="/invoices/{{ $invoice->id }}">{{ $invoice->client->name }}</a></td>
                        <td>{{ $invoice->particular }}</td>
                        <td>{{ $invoice->amount }}</td>
                        <td>{{ $invoice->created_at }}</td>
                        <td>{{ $invoice->user->name }}</td>
                    </tr>

                @endforeach

                </tbody>
            </table>


        </div>
    </div>







@stop