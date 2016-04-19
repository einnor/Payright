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
        $state = array_keys($invoice->state)[0];
        return view('invoices.show', compact(['invoice', 'state']));
    }



    public function forwardState($id){

        $invoice = Invoice::findOrFail($id);
        $state = array_keys($invoice->state)[0];

        $invoice->state = $state + 1;

        $invoice->save();

        switch($state){
            case 0:
                //Show Flash message
                flash()->success('Payment Request','Invoice has been submitted for review!');
                break;
            case 1:
                //Show Flash message
                flash()->success('Reviewed','Invoice has been submitted for approval!');
                break;
            case 2:
                //Show Flash message
                flash()->success('Approved','Invoice has been submitted for settling!');
                break;
            case 3:
                //Show Flash message
                flash()->success('Settled','Invoice has been settled!');
                break;
        }

        //Redirect
        return redirect()->back();

    }


    public function backwardState($id){

        $invoice = Invoice::findOrFail($id);
        $state = array_keys($invoice->state)[0];

        $invoice->state = $state - 1;

        $invoice->save();

        //Show Flash message
        flash()->info('Backtracked','Invoice has been backtracked!');

        //Redirect
        return redirect()->back();

    }



    public function indexBasedOnType($type){

        $state = 0;

        switch($type){
            case "uncommitted":
                $state = 0;
                break;
            case "committed":
                $state = 1;
                break;
            case "reviewed":
                $state = 2;
                break;
            case "approved":
                $state = 3;
                break;
            case "settled":
                $state = 4;
                break;
        }

        $invoices =  Invoice::where('state', '=', $state)->orderBy('id', 'DESC')->get();

        return view('invoices.index_type', compact('invoices'));
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
