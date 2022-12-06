@extends('layout')

@section('content')
<link rel="stylesheet" href="{{asset('assets/css/create.css')}}">
<form action="/store" class="decor" method="POST" style="background: url('{{asset('assets/img/6271348.jpg')}}') no-repeat;  background-size: cover;">

    @csrf
    <div class="p">
        <div class="form-inner">
            <h1>Todo App</h1>
            <input type="text" name="title" placeholder="Enter Title">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <input type="date" name="date">
            @error('date')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <textarea name="description" rows="5" placeholder="Description"></textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit">Submit</button>
        </div>
    </div>
</form>
@endsection