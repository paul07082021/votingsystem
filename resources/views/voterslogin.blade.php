<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="resources/css/login.css" rel="stylesheet">
</head>
<body>
    <div class = "login-container container-sm">
        <div class="login-left">

     @if(session('message'))
    <div class="alert alert-primary">
        Thank you for voting!!!
    </div>
    @endif

            <h2>LOGIN AS VOTER</h2>
            <p>Cyber Balot</p>
            @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
            <form method="POST" action="loginvoters">
                @csrf
                <div class = "login-item">
                    <label for = "username" style = "margin-right:3px;">StudentID:</label>
                    <input type = "text" name = "username" class="form-control" required/>
                </div>
                <div class = "login-item">
                    <label for = "password">Password:&nbsp;</label>
                    <input type = "password" name = "password" class="form-control" required/>
                </div>
                <div class = "for-btn">
                    <button type = "submit" class = "btn">SIGN IN</button>
                </div>
            </form>
        </div>
        <div class = "login-right">
        <img src="resources/images/school-logo.png" alt="Voting System">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>