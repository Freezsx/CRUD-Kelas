@extends('layouts.main')

@section('container')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Template</title>
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
    <form method="POST" action="{{ route('register.store') }}">  
        @csrf
        <h1 class="h3 mb-3 fw-normal">Please register</h1>
        <div class="form-floating">
            <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Name" required>
            <label for="name">Name</label>
        </div>
        <div class="form-floating mb-3"> 
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
            <label for="email">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            <label for="password">Password</label>
        </div>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
        <p class="mt-5 mb-3">Already have an account? <a href="{{ route('login.index') }}">Sign in here!</a></p>
    </form>
</main>

</body>
</html>

@endsection
