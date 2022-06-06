<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prism</title>
    <link rel="stylesheet" href="{{asset('../css/main.css')}}">
    <link rel="icon" type="image/png" href="{{asset('../image/icon.png')}}"/>
</head>

<body>
    <section>
        <div class="login-box">
            <h2>Login</h2>
            <form id="formLogin" method="POST" action="{{ route('login') }}">
				@csrf

                <div class="user-box">
                    <input id="email" type="email" name="" required="">
                    <label>Email</label>
                </div>
                <div class="user-box">
                    <input id="password" type="password" name="" required="">
                    <label>Password</label>
                </div>
                <div>
                    <a class="auth" href="{{ route('login') }}">Login Here</a>
                </div>
                <a class="submit" onclick="document.getElementById('formLogin').submit()">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Login
                </a>
            </form>
        </div>
    </section>
</body>

</html>
