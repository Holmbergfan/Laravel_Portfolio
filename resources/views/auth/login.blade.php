@extends('layouts.app')

@section('title', 'Login')

@section('content')
<!-- HERO SECTION -->
<section class="hero" style="background: url('https://source.unsplash.com/1600x900/?office,login') center/cover no-repeat;">
  <div class="hero-content container" data-aos="fade-up">
    <h1>Login</h1>
    <p>Please enter your credentials below.</p>
  </div>
</section>

<!-- LOGIN FORM -->
<div class="container" style="max-width: 400px; margin: 2rem auto;">
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Login</button>
  </form>
</div>
@endsection
