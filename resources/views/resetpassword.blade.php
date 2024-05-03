<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System - Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/resetpassword.css') }}" rel="stylesheet">
</head>
<body>

<div class = "reset container-sm">
    <div class = "reset-header">
        <h5>WELCOME!</h5>
        <p>You sign in as: Student Name</p>
        <p>Student ID: 196060157</p>
    </div>
    <form>
        <div class = "reset-item">
            <label for = "password">Please set your newpassword:</label>
            <input type = "password" name = "password" class="form-control"/>
        </div>
        <div class = "reset-item">
            <label for = "confirmpassword">Re-enter your new password:</label>
            <input type = "password" name = "confirmpassword" class="form-control"/>
        </div>
        <div class = "for-btn">
            <button type = "button" class = "btn">SAVE</button>
        </div>
    </form>
</div>
</body>
</html>