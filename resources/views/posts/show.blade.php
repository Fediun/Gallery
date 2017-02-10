@extends('layouts.app')

@section('content')

    @if((Auth::guest()))
          <h1>Welcome!</h1>
    @elseif(Auth::user()->isAdmin())
        <a href="{{ url('/posts/'.$post->id.'/edit') }}"><div class="btn btn-default"> Edit Post</div></a>

        {!! Form::open(['url' => route('posts.destroy', $post->id), 'method' => 'delete', 'class' => 'pull-left']) !!}
        <button type="submit" class="btn btn-danger">Delete Post</button>
        {!! Form::close() !!}
    @endif

    <article>
        <h1>Description</h1>
        <p>{{$post->description}}</p>

        <div class="body">
            <img alt="img" src={{asset("/images/{$post->image}") }} style="width:auto" class="img-thumbnail">
            <br>

        </div>
    </article>


    <br>



@stop
