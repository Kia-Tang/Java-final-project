<?php

$login_error = ''; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_email"] = $user["email"]; 
            
            header("Location: cisc7105-PairAssgn.php");
            exit;
        } else {
            $login_error = 'Incorrect password.';  // 密码错误
        }
    } else {
        $login_error = 'Email does not exist.'; 
        }
    }

?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="../Webcontent/css/bg.css">
</head>
<body>
    
  
    
    <form method="post">
          <h1>Login</h1>
    
          <?php if (!empty($login_error)): ?>
            <div style="color: red;"><?= htmlspecialchars($login_error) ?></div>
        <?php endif; ?>
        <label for="email">Email</label>
        <input type="email" name="email" id="email"
               value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        
        <button>Log in</button>
        <div>Forget your password?<a href="reset.php">click here!</a></div>
        <div>Don't have a account？<a href="signup.php">Register now!</a></div>

    </form>
    
</body>
</html>