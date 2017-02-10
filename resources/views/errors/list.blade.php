
@if($errors->any())

    <ul class="alret alert-danger">

        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

@endif