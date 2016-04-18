<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Invoice;
use App\Http\Requests;
use App\Http\Requests\AttachmentsRequest;
use App\Http\Controllers\Controller;
use App\AddAttachmentToInvoice;
use Illuminate\Support\Facades\Auth;

class AttachmentsController extends Controller
{


    /**
     * Store a newly created resource in storage.
     * @param $invoice_id \Illuminate\Http\AttachmentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store($invoice_id, AttachmentsRequest $request)
    {
        $invoice = Invoice::findOrFail($invoice_id);

        $attachment = $request->file('attachment');

        (new AddAttachmentToInvoice($invoice, $attachment))->save();
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
