<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body>
    <div class = "login-container container-sm">
        <div class="login-left">
            <h2>LOGIN AS VOTER</h2>
            <p>Cyber Balot</p>
            <form>
                <div class = "login-item">
                    <label for = "username" style = "margin-right:3px;">Username:</label>
                    <input type = "text" name = "username" class="form-control"/>
                </div>
                <div class = "login-item">
                    <label for = "password">Password:&nbsp;</label>
                    <input type = "password" name = "password" class="form-control"/>
                </div>
                <div class = "for-btn">
                    <button type = "button" class = "btn">SIGN IN</button>
                </div>
            </form>
        </div>
        <div class = "login-right">
        <img src="{{ asset('images/school-logo.png') }}" alt="Voting System">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>