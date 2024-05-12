<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="validation.js" defer></script>
    <link rel="stylesheet" href="../Webcontent/css/bg.css">
</head>
<body>
    
    
<div class="signup">
    <form action="process-signup.php" method="post" id="signup" novalidate>
        <h1>Signup</h1>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="error" style="color: red;">
                <?php echo $_SESSION['error']; ?>
                <?php unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
        </div>
        
        <div>
            <label for="email">email</label>
            <input type="email" id="email" name="email">
        </div>
        
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>
        
        <div>
            <label for="password_confirmation">Repeat password</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>
        
        <button>Sign up</button>
        <div>Already have account! <a href="login.php">Login now!</a></div>
    </form>
        </div>
    
</body>

</html>

