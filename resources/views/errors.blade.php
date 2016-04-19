@if($errors->any())
    <ul class="callout alert" style="list-style-type: none;">
        @foreach($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
        @endforeach
    </ul>
@endif