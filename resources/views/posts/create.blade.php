@extends('layouts.app')

@section('content')
    <form method="POST" action="/posts">
        <input type="text" name='title' placeholder="Enter title">
        {{ csrf_field() }}
        <input type="text" name='content' placeholder="Enter content">
        <input type="number" name='is_admin'>
        <input type="number" name='user_id'>
        <input type="submit" name="submit">
    </form>


@endsection