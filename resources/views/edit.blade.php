@extends('layout')

@section('content')
<link rel="stylesheet" href="{{asset('assets/css/create.css')}}">

<form action="/update/{{$todo['id']}}" class="decor" method="POST">

    @csrf
    <!-- karena attribute method pada tag form cuma bisa get/post sedangkan buat update 
    data itu pake method patch, jadi method="post" di form di timpa sama method patch ini-->
    @method('PATCH')

    <div class="p">
        <div class="form-inner">
            <h1>Todo App</h1>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <!-- attribute value berfungsi untuk menampilkan data di inputnya. 
            data yang di tampilin merupakan data yang di ambil di controller dan 
            dikirim lewat compact tadi  -->
            <input type="text" name="title" placeholder="Masukan Title" value="{{$todo['title']}}">

            <input type="date" name="date" value="{{$todo['date']}}">

            <!-- kenapa textarea tidak punya attribute value? karena textarea bukan 
            termasuk tag input/select dan dia punya penutup tag. jadi buat nampilinnya 
            langsung tanpa attribute value. -->
            <textarea name="description" rows="5" placeholder="Description">{{$todo['description']}}</textarea>

            <button type="submit">Submit</button>
        </div>
    </div>
</form>
@endsection