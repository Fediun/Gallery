@extends('layouts.app')


@section('content')
    @if((Auth::guest()))
        <h2>Welcome!</h2>
    @elseif(Auth::user()->isAdmin())

        <h1 align="center">Welcome to admin panel!</h1>

    @endif

@foreach($posts as $post)

        <a href="{{url('/posts', $post->id)}}">
            <img alt="{{$post->thumbnail}}" src={{asset("/images/{$post->thumbnail}") }} style="width:150px" class="img-thumbnail">
        </a>

@endforeach

        <div class="paginations col-lg-12">
            {!! $posts->render() !!}
        </div>
@stop