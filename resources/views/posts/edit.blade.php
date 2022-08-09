@extends('layouts.app')

@section('content')
    <h1>Edit post</h1>
    <form method="POST" action="/posts/{{$post->id}}">
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
    </form>


@endsection