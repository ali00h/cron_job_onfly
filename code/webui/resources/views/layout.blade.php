<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  </head>
  <body>
  <section class="section">
    <div class="container">

<nav class="navbar is-link">
  <div id="navbarExampleTransparentExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="{{ route('dashboard.index') }}">
        Dashbord
      </a>
      <a class="navbar-item" href="{{ route('login.signout') }}">
        Sign Out
      </a>        
    </div>
  </div>
</nav>

    @yield('content')


    </div>
  </section>
  </body>
</html>