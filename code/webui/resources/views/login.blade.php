<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  </head>
  <body>
  <section class="section">
    <div class="container">

    <div class="columns is-mobile">
        <div class="column is-half is-offset-one-quarter">
            <form class="box" action="{{ route('login.auth') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if($error)
                    <div class="notification is-danger is-light">
                    {{ $error }}
                    </div>               
                @endif                
                
                <div class="field">
                    <label class="label">Username</label>
                    <div class="control">
                        <input name="username" class="input" type="text" placeholder="Username">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Password</label>
                    <div class="control">
                        <input name="password" class="input" type="password" placeholder="Password">
                    </div>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link">Login</button>
                    </div>
                </div> 
            </form>
        </div>
    </div>    






    </div>
  </section>
  </body>
</html>