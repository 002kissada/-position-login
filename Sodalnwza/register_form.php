<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="styles.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="background-blur"></div>

    <div class="login-container">
        <h2 class="login-title">Register</h2>
        
        <form class="login-form" action="register_save.php" method="POST">
    
    <div class="input-group">
        <i class="icon fas fa-user"></i>
        <input type="text" id="username" placeholder="Username" name="username" required>
    </div>

    <div class="input-group">
        <i class="icon fas fa-id-card"></i>
        <input type="text" id="fullname" placeholder="FullName" name="fullname" required>
    </div>
    
    <div class="input-group">
        <i class="icon fas fa-lock"></i>
        <input type="password" id="password" placeholder="Password" name="password" required>
    </div>
    <div class="input-group">
        <i class="icon fas fa-lock"></i>
        <input type="password" id="confirm_password"placeholder="Confirm Password" name="confirm_password" required>
    </div>
    
    <button type="submit" class="login-button">Sign Up</button>
    <a href="login.php" class="form-link">Already have an account? Log In</a>
</form>

</body>
</html>