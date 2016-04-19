@extends('layout')

@section('content')




    <div class="row">
        <div class="small-12 medium-6 large-4 columns">

            <h4 class="text-center">INVOICE</h4>

            <hr />

            <h6 class="small-12 medium-6 columns bold">Name</h6><h6 class="small-12 medium-6 columns">{!! $invoice->particular  !!}</h6>

            <h6 class="small-12 medium-6 columns bold">Amount</h6><h6 class="small-12 medium-6 columns">{!! $invoice->amount  !!}</h6>

            <h6 class="small-12 medium-6 columns bold">Client</h6><h6 class="small-12 medium-6 columns">{!! $invoice->client->name  !!}</h6>

            <h6 class="small-12 medium-6 columns bold">Created by</h6><h6 class="small-12 medium-6 columns">{!! $invoice->user->name  !!}</h6>

            <hr />

            <form method="POST" action="{{ route('store_comment_path', [$invoice->id]) }}" class="new-user-form">

                {!! csrf_field() !!}

                <div class="row column">
                    @include('errors')

                    <textarea rows="2" id="comment" name="comment" placeholder="Write a comment" value="{{ old('comment') }}" required></textarea>
                    <p><button type="submit" class="button expanded">Post Comment</button></p>
                </div>
            </form>

            <h4 class="text-center">COMMENTS</h4>


            @foreach($invoice->comments as $comment)

                <div class="row">
                    <div class="medium-12 large-12 columns">
                        <article class="article-card">
                            <div class="card-content">
                                <p class="post-author">By <a href="#">{{ $comment->user->name }}</a> | <span class="text-center">{{ $comment->created_at }}</span></p>
                                <p>{{ $comment->comment }}</p>
                            </div>
                        </article>
                    </div>
                </div>

            @endforeach

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