@extends('layouts.app')

@section('content')
    <h1>Create post</h1>
    {!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\PostsController@store', 'files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('title', 'Post title') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('content', 'Post content') !!}
        {!! Form::text('content', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('is_admin', 'Is admin?') !!}
        {!! Form::number('is_admin', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('user_id', 'User id') !!}
        {!! Form::number('user_id', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::file('file', ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Create post', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    {{-- <form method="POST" action="/posts">
        <input type="text" name='title' placeholder="Enter title">
        {{ csrf_field() }}
        <input type="text" name='content' placeholder="Enter content">
        <input type="number" name='is_admin'>
        <input type="number" name='user_id'>
        <input type="submit" name="submit">
    </form> --}}

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            {{-- {{dd($errors)}} --}}
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection