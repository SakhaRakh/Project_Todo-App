@extends('layout')

@section('content')
<div style="padding-top: 30px;">
<div class="login-wrap" style="background: url('{{asset('assets/img/6271348.jpg')}}') no-repeat;  background-size: cover;">
    <div class="login-html-regis">
        <h1 class="judul-regis">Create an Account!</h1> <br>
        <div class="login-form">
            <form action="/register" method="POST">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @csrf
                <div class="group-regis">
                    <div class="group">
                        <label for="pass" class="label">Email Address <i class="fa fa-envelope"></i></label>
                        <input placeholder="Email Address" id="email" name="email" type="email" class="input">
                        <!-- @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror -->
                    </div>
                    <div class="group">
                        <label for="user" class="label">FullName <i class="fa fa-user"></i></label>
                        <input placeholder="FullName" id="fullname" name="fullname" type="text" class="input">
                        <!-- @error('fullname')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror -->
                    </div>
                    <div class="group">
                        <label for="user" class="label">Username <i class="fa fa-user"></i></label>
                        <input placeholder="username" id="name" name="username" type="text" class="input">
                        <!-- @error('username')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror -->
                    </div>
                </div>
                <div class="group">
                    <label for="pass" class="label">Password <i class="fa fa-lock"></i></label>
                    <input placeholder="Password" id="password" name="password" type="password" class="input" data-type="password">
                    <!-- @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror -->
                </div>
                <div class="group">
                    <button type="submit" class="button">Sign Up</button>
                </div>
            </form>
            <div class="link">
                <!-- <a href="#" class="text-white" style="text-decoration: none;">
                    <p>Forgot Password?</p>
                </a> -->
                <a href="/" class="text-white" style="text-decoration: none;">
                    <p>Already have an account? Login!</p>
                </a>
            </div>
            <div class="sesion">
                {{ session('berhasil')}}
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection