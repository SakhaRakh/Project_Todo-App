@extends('layout')

@section('content')


<form action="/create">
    <div class="background-img" style="background: url('{{asset('assets/img/2244.jpg')}}') no-repeat;  background-size: cover;">
    @if (session('islogin'))
<div class="alert alert-success">
    {{ session('islogin') }}
</div>
@endif
@if (session('notAllowed'))
<div class="alert alert-success">
    {{ session('notAllowed') }}
</div>
@endif

@if (Session::get('addTodo'))
<div class="alert alert-success">
    {{ Session::get('addTodo') }}
</div>
@endif
        <section class="hero" >

	
            <div class="container">
                <div class="row" >
                    <div class="col-lg-6 d-flex flex-column pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                        <h1>Welcome to Dashboard Page</h1>
                        <h2>Let's make your todo list!</h2>
                        <div class="d-flex justify-content-center justify-content-lg-start">
                            <button type="submit" class="btn-get-started">Make Todo</button>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
</form>
@endsection