@extends('layouts.app')

@section('content')
    <p>Oi, {{$name}}! Você está na primeira página.</p>
    <a href="/second_page">Link</a>

    @stop

@section('footer')
    <script>alert('Olá!')</script>

    @stop