@extends('layouts.app')

@section('content')
    <h1>Create a new Posts</h1>

    {!! Form::open(['url' => 'posts', 'files' => true]) !!}


    @include('posts.form', ['submitButtonText' => 'Upload Foto'])

    {!! Form::close() !!}


    @include('errors.list')

    @stop