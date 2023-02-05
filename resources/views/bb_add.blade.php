@extends('layouts.base')
@section('title', 'Добавление объявления :: Мои объявления')
@section('main')
<form action="{{route('bb.store')}}" method='POST'>
    @csrf
    <div class="form-group">
        <label for='txtTitle'>Товар</label>
        <input name='title' id='txtTitle' value="{{old('title')}}" class="form-controll @error('title') is-invalid @enderror">
        @error('title')
        <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
        @enderror
    </div>
    <div class='form-group'>
        <label for='txtContent'>Описание</label>
        <textarea name='content' id='txtContent' class="form-controll @error('content') id-invalid @enderror"
        row='3'>{{old('content')}}</textarea>
        @error('content')
        <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
        @enderror
    </div>
    <div class='form-group'>
        <label for='txtPrice'>Цена</label>
        <input name='price' id='txtPrice' class="form-controll @error('price') is-invalid @enderror" value="{{old('price')}}">
        @error('price')
        <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
        @enderror
    </div>
    <input type='submit' class='btn btn-primary' value='Добавить'>
</form>
@endsection