<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Invoice;
use App\Client;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;


class InvoicesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::orderBy('id', 'DESC')->get();

        $clients = Client::orderBy('name', 'ASC')->get();

        return view('invoices.index', compact(['invoices', 'clients']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Persist the data
        Invoice::create([
            'user_id'       =>      Auth::user()->id,
            'client_id'     =>      $request->client_id,
            'particular'    =>      $request->particular,
            'amount'        =>      $request->amount,
        ]);

        //Show Flash message
        flash()->success('Success','Invoice was successfully created!');

        //Redirect
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function getAllInvoices(){

        return Invoice::orderBy('id', 'DESC')->get();

    }


    public function getUncommittedInvoices(){

        return Invoice::where('state', '=', 0)->orderBy('id', 'DESC')->get();

    }



    public function getCommittedInvoices(){

        return Invoice::where('state', '=', 1)->orderBy('id', 'DESC')->get();

    }



    public function getReviewedInvoices(){

        return Invoice::where('state', '=', 2)->orderBy('id', 'DESC')->get();

    }


    public function getApprovedInvoices(){

        return Invoice::where('state', '=', 3)->orderBy('id', 'DESC')->get();

    }



    public function getSettledInvoices(){

        return Invoice::where('state', '=', 4)->orderBy('id', 'DESC')->get();

    }

}
