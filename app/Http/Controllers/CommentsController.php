<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Invoice;
use App\Http\Requests;
use App\Http\Requests\CommentsRequest;
use App\Http\Controllers\Controller;
use App\AddCommentToInvoice;

class CommentsController extends Controller
{


    /**
     * Store a newly created resource in storage.
     * @param $invoice_id \Illuminate\Http\CommentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store($invoice_id, CommentsRequest $request)
    {

//        return Auth::user()->id;

        $invoice = Invoice::findOrFail($invoice_id);

        $comment = $request->comment;

        (new AddCommentToInvoice($invoice, $comment))->save();

        //Show Flash message
        flash()->success('Success','Your comment was successfully posted!');

        //Redirect
        return redirect()->back();
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


}
