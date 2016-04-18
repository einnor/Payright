<?php

namespace App;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class AddAttachmentToInvoice {

    protected $invoice_id;

    protected $file;


    public function __construct(Invoice $invoice, UploadedFile $file, Thumbnail $thumbnail = null)
    {
        $this->invoice = $invoice;
        $this->file = $file;
        $this->thumbnail = $thumbnail ?: new Thumbnail;
    }


    public function save(){

        $attachment = $this->invoice->addAttachment($this->makeAttachment());

        $this->file->move($attachment->baseDir(), $attachment->name);

        $this->thumbnail->make($attachment->path, $attachment->thumbnail_path);

    }


    protected function makeAttachment(){

        return new Attachment(['name' => $this->makeFileName()]);


    }


    protected function makeFileName(){


        $name = sha1(
            time() . $this->file->getClientOriginalName()
        );

        $extension = $this->file->getClientOriginalExtension();

        return "{$name}.{$extension}";

    }


}