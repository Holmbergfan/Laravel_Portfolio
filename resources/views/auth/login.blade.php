@extends('layouts.app')

@section('title', 'Login')

@section('content')
@if(Auth::check())
    <script>window.location = "{{ route('home') }}";</script>
@endif
<!-- HERO SECTION -->
<section class="hero" style="background: url('https://source.unsplash.com/1600x900/?office,login;background-color: rgba(36, 33, 172, 0.36);') center/cover no-repeat;">
    <div class="hero-content container" data-aos="fade-up">
        <h1>Login</h1>
<!-- LOGIN FORM -->
<div class="container" style="max-width: 400px; margin: -50px auto 2rem auto; position: relative; z-index: 10;">
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
        <div class="wrapper">
        <form class="form" action="{{ route('login') }}" method="POST">
          @csrf
          <p class="form-login">Admin Login</p>
          <div class="input-box">
            <input type="email" 
                   name="email" 
                   value="{{ old('email') }}" 
                   required 
                   autocomplete="email" 
                   autofocus 
                   placeholder="Email">
          </div>
          <div class="input-box">
            <input type="password" 
                   name="password" 
                   required 
                   autocomplete="current-password" 
                   placeholder="Password">
          </div>
          <button type="submit" class="btn">Login</button>
        </form>
      </div>
    </div>
</section>

</div>
@endsection
