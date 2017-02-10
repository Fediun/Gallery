@extends('layouts.app')

@section('content')

    <h1>Edit image and Description</h1>


    {!! Form::model($post, ['method' => 'PATCH','enctype' => 'multipart/form-data', 'action' => ['PostsController@update', $post->id,'files' => true]]) !!}

    @include('posts.form', ['submitButtonText' => 'Update'])

    {!! Form::close() !!}

    {!! Form::open(['url' => route('posts.destroy', $post->id), 'method' => 'delete', 'class' => 'pull-right']) !!}
    <button type="submit" class="btn btn-danger">Delete</button>
    {!! Form::close() !!}



    @include('errors.list')

@stop