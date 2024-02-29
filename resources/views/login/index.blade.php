@extends('layouts.main')

@section('container')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Template</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-signin {
            max-width: 400px;
            padding: 15px;
            margin: auto;
            margin-top: 100px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }
        .form-signin h1 {
            margin-bottom: 30px;
        }
        .form-floating {
            margin-bottom: 20px;
        }
        .checkbox {
            margin-bottom: 20px;
        }
        .mt-5 {
            margin-top: 50px;
        }
    </style>
</head>
<body>

<main class="form-signin">
    <form method="POST" action="{{ route('login.submit') }}">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Please Sign In</h1>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
        </div>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <p class="mt-5 mb-3">Don't have an account? <a href="{{ route('register.index') }}">Sign up here!</a></p>
    </form>
</main>

</body>
</html>
@endsection
