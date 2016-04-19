<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AddCommentToInvoice {

    protected $invoice_id;

    protected $comment;

    protected $user_id;


    public function __construct(Invoice $invoice, $comment)
    {
        $this->invoice = $invoice;
        $this->comment = $comment;
        $this->user_id = Auth::user()->id;
    }


    public function save(){

        $this->invoice->addComment(new Comment(['comment' => $this->comment, 'user_id' => $this->user_id]));

    }


}