@extends('layout')

@section('content')

@if (session('successUpdate'))
<div class="alert alert-success">
    {{ session('successUpdate') }}
</div>
@endif
@if (session('successDelete'))
<div class="alert alert-danger">
    {{ session('successDelete') }}
</div>
@endif
@if (session('done'))
<div class="alert alert-success">
    {{ session('done') }}
</div>
@endif
<div class="container" style="margin-top: 30px;">
<table class="table table-warning table-hover">
    <tr>
        <td>No</td>
        <td>Activity</td>
        <td>Description</td>
        <td>Deadline</td>
        <td>Status</td>
        <td>Action</td>
    </tr>
    @php
    $no = 1;
    @endphp
    @foreach ($todos as $todo)
    <tr>
        <td>{{ $no++}}</td>
        <td>{{ $todo['title']}}</td>
        <td>{{ $todo['description']}}</td>
        {{-- Carbon : package date pada laravel, nantinya si date yg 2022-11-22 formatnya menjadi 22 november 2022 --}}

        <td>{{ \Carbon\Carbon::parse($todo['date'])->format('j F, Y') }}</td>

        {{-- konsepnya ternary, if statusnya 1 nampilin teks complated kalo 0 nampilin teks on-process . 
            karena status tuh boolean, jadi cuma ada antara 1 atau 0--}}

        <td>{{ $todo['status'] ? 'Complated' : 'On-Process'}}</td>
        <td class="d-flex">
            <button type="submit" class="btn btn-primary d-flex me-3"><a href="/edit/{{$todo['id']}}" class="text-white" style="text-decoration: none;"><i class="fa fa-pen-to-square"></i></a></button>
            <form action="/destroy/{{$todo['id']}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class=" btn btn-warning me-3 text-white"><i class="fa-solid fa-trash-can"></i></button>
            </form>
            @if ($todo['status'] == 0)
            <form action="/complated/{{$todo['id']}}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class=" btn btn-success"><i class="fa-regular fa-circle-check"></i></button>
            </form>
            @endif
        </td>
    </tr>
    @endforeach




</table>
</div>

@endsection