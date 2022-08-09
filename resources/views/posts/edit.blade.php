@extends('layouts.app')

@section('content')
    <h1>Edit post</h1>
    {!! Form::model($post, ['method'=>'PATCH', 'action'=>['App\Http\Controllers\PostsController@update', $post->id]]) !!}
    <div class="form-control">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-control">
        {!! Form::label('content', 'Content') !!}
        {!! Form::text('content', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-control">
        {!! Form::label('is_admin', 'Is admin?') !!}
        {!! Form::number('is_admin', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-control">
        {!! Form::label('user_id', 'User id') !!}
        {!! Form::number('user_id', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-control">
        {!! Form::submit('Update post', ['class'=>'btn btn-info']) !!}
    </div>
    {!! Form::close() !!}

    {!! Form::open(['method'=>'DELETE', 'action'=>['App\Http\Controllers\PostsController@destroy', $post->id]]) !!}
        {!! Form::submit('Delete post', ['class'=>'btn btn-danger']) !!}
    {!! Form::close() !!}
    {{-- <form method="POST" action="/posts/{{$post->id}}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <input type="text" name='title' placeholder="Enter title" value="{{$post->title}}">
        <input type="text" name='content' placeholder="Enter content" value="{{$post->content}}">
        <input type="number" name='is_admin' value="{{$post->is_admin}}">
        <input type="number" name='user_id' value="{{$post->user_id}}">
        <input type="submit" name="submit" value="Edit">
    </form>

    <form method="POST" action="/posts/{{$post->id}}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" name="submit" value="Delete">
    </form> --}}


@endsection