@extends('layout')

@section('content')




    <div class="row">
        <div class="small-12 medium-6 large-4 columns">

            <h4 class="text-center">INVOICE</h4>

            <hr />

            <h6 class="small-12 medium-6 columns bold">Name</h6><h6 class="small-12 medium-6 columns">{!! $invoice->particular  !!}</h6>

            <h6 class="small-12 medium-6 columns bold">Amount</h6><h6 class="small-12 medium-6 columns">{!! $invoice->amount  !!}</h6>

            <h6 class="small-12 medium-6 columns bold">Client</h6><h6 class="small-12 medium-6 columns">{!! $invoice->client->name  !!}</h6>

            <h6 class="small-12 medium-6 columns bold">Created by</h6><h6 class="small-12 medium-6 columns">{!! $invoice->user  !!}</h6>

            <hr />

            <h4 class="text-center">COMMENTS</h4>

        </div>





        <div class="small-12 medium-6 large-8 columns">

            <h3 class="text-center">ATTACHMENTS</h3>

            @foreach($invoice->attachments->chunk(3) as $set)

                <div class="row">

                    @foreach($set as $attachment)

                        <div class="small-12 medium-4 columns gallery__image end">

                            <a class="th" href="/{{ $attachment->path }}">
                                <img class="thumbnail" src="/{{ $attachment->thumbnail_path }}" alt="{{ $attachment->name }}" />
                            </a>
                        </div>

                    @endforeach

                </div>

            @endforeach



            <hr />


            <form id="addAttachmentsForm" class="dropzone" method="POST" action="{{ route('store_attachment_path', [$invoice->id]) }}">
                {{ csrf_field() }}
            </form>

        </div>
    </div>



@stop


@section('scripts.footer')

    <script>
        Dropzone.options.addAttachmentsForm = {
            paramName:      'attachment',
            maxFileSize:    8,
            acceptedFiles:  '.jpg, .jpeg, .png, .bmp, .pdf'
        }
    </script>

@stop