@extends('layouts.base')
@section ('title', 'Главная')
@section ('main')
    <h2>{{$bb->title}}</h2>
    <p>{{$bb->content}}</p>
    <p>{{$bb->price}} руб.</p>
    <p>Автор: {{$bb->user->name}}</p>
    <p><a href="{{route('index')}}">На главную страницу</a></p>
@endsection('main')