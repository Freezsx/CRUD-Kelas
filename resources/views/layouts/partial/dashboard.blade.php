<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <script class="u-script" type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/dashboard.css">
</head>
<body>

<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .navbar-custom .navbar-brand {
        color: #ffffff; 
      }

      .navbar-custom .navbar-nav .nav-link {
        color: #ffffff; 
      }

      .navbar-custom .navbar-nav .nav-link.active {
        color: #ffffff; 
      }

      .navbar-custom .navbar-toggler {
        border-color: #ffffff; 
      }

      .navbar-custom .navbar-toggler-icon {
        background-color: #ffffff; 
      }

      .nav-link {
        color: #200E3A;
      }

      .nav-item .active, .nav-link:hover {
        color: white;
        background-color: #200E3A;
      }

      .content {
        background-color: #ffffff; 
        color: #212529;
      }
    </style>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow navbar-custom">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">STUDENT SMK RADEN UMAR SAID</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link @if(request()->is('/dashboard/all/all')) active @endif" aria-current="page" href="/dashboard/all/all">
              <svg class="bi"><use xlink:href="#house-fill"/></svg>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if(request()->is('/dashboard/student/all')) active @endif" href="/dashboard/student/all">
              <svg class="bi"><use xlink:href="#people"/></svg>
              Students
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/dashboard/kelas/all">
              <svg class="bi"><use xlink:href="#grid"/></svg>
              Class
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/student/all">
              <svg class="bi"><use xlink:href="#home"/></svg>
              Home
            </a>
          </li>
          <li class="nav-item">
            <form action="/logout" method="POST">
              @csrf
              <button type="submit" class="nav-link">
                <svg class="bi"><use xlink:href="#door-closed"/></svg>
                Sign out
              </button>
            </form>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content">
        @yield('container')
    </main>
  </div> 
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>

$(document).ready(function(){
    $('.nav-link').click(function(){
        $('.nav-link').removeClass("active"); 
        $(this).addClass("active"); 
    });
});
</script>
</body>
</html>
