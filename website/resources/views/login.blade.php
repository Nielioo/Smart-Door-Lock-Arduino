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
            <form>
                <div class="user-box">
                    <input type="text" name="" required="">
                    <label>Username</label>
                </div>
                <div class="user-box">
                    <input type="password" name="" required="">
                    <label>Password</label>
                </div>
                <div>
                    <a class="auth" href="/register">Register Here</a>
                </div>
                <a class="submit" href="/dashboard">
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
