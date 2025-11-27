<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form - Glassmorphism</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="background-blur"></div>

    <div class="login-container">
        <h2 class="login-title">Login</h2>
        
        <form class="login-form" action="check_login.php" method="POST">
            <div class="input-group">
                <i class="icon fas fa-user"></i>
                <input type="text" id="text" placeholder="Username" name = "username" >
            </div>
            
            <div class="input-group">
                <i class="icon fas fa-lock"></i>
                <input type="password" id="password" placeholder="Password" name="password" >
            </div>
            
            <div class="options-row">
                <label class="remember-me">
                    <input type="checkbox" name="remember" value="yes">
                    Remember Me
                </label>
                <a href="#" class="forgot-password">Forgot Password?</a>
            </div>
            <div class="register-row" style="text-align: center; margin-bottom: 15px;">
                ยังไม่มีบัญชี? <a href="register_form.php" class="register-link">สมัครสมาชิก</a>
            </div>
            <button type="submit" class="login-button">
                Log In
            </button>
            
        </form>
    </div>

</body>
</html>