


<div class="form-group">

    {!! Form::label('description', 'Description:') !!}

    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::label('fileName', 'Upload:') !!}

    {!! Form::file('image' ) !!}

</div>

<div class="form-group">

    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control',]) !!}

</div>

@section('footer')



@endsection

