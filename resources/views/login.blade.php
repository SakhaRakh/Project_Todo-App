@extends('layout')

@section('content')
<div style="padding-top: 30px;">
<div class="login-wrap" style="background: url('{{asset('assets/img/6271348.jpg')}}') no-repeat;  background-size: cover; min-height:570px;">
    <div class="login-html">
        @if (session('success'))
        <div class="alert alert-success" style="transform: translateY(75px);">
            {{ session('success') }}
        </div>
        @endif
        @if (session('failed'))
        <div class="alert alert-danger" style="transform: translateY(75px);">
            {{ session('failed')}}
        </div>
        @endif
        @if (session('notAllowed'))
        <div class="alert alert-danger" style="transform: translateY(75px);">
            {{ session('notAllowed') }}
        </div>
        @endif
        <h1 class="judul">Login Page</h1> <br>
        <div class="login-form">
            <form method="POST" action="{{route('login.post') }}" style="transform: translateY(-20px);">
                @csrf
                <div class="group">
                    <label for="user" class="label">Email <i class="fa fa-envelope"></i></label>
                    <input placeholder="Enter Email Address..." id="email" name="email" type="email" class="input">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="group">
                    <label for="pass" class="label">Password <i class="fa fa-lock"></i></label>
                    <input placeholder="Password" id="pass" name="password" type="password" class="input" data-type="password">
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="group">
                    <button type="submit" class="button">Sign In</button>
                </div>
            </form>
            <br>
            <div class="link">
                <a href="#" class="text-white" style="text-decoration: none;">
                    <p>Forgot Password?</p>
                </a>
                <a href="/register" class="text-white" style="text-decoration: none;">
                    <p>Create an Account!</p>
                </a>
            </div>
        </div>
    </div>
</div>
</div>
@endsection