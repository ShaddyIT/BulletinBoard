@extends('layouts.base')
@section('title', 'Правка объявления :: Мои объявления')
@section('main')
<form action="{{route('bb.update', ['bb'=>$bb->id])}}" method='POST'>
    @csrf
    @method('PATCH') 
    <div class="form-group">
        <label for='txtTitle'>Товар</label>
        <input name='title' id='txtTitle' value="{{old('title', $bb->title)}}"  class="form-controll @error('title') is-invalid @enderror">
        @error('title')
        <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
        @enderror
    </div>
    <div class='form-group'>
        <label for='txtContent'>Описание</label>
        <textarea name='content' id='txtContent' class="form-controll @error('content') is-invalid @enderror"
        row='3'>{{ old('content', $bb->content)}}</textarea>
        @error('content')
        <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
        @enderror
    </div>
    <div class='form-group'>
        <label for='txtPrice'>Цена</label>
        <input name='price' id='txtPrice' value="{{old('price', $bb->price)}}" class="form-controll @error('price') is-invalid @enderror">
        @error('price')
        <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
        @enderror
    </div>
    <input type='submit' class='btn btn-primary' value='Сохранить'>
</form>
@endsection