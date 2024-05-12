<?php
require_once 'database.php'; // 包含数据库连接

$email = '';
$msg = '';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // 验证输入
    if (empty($email)) {
        $_SESSION['error'] = 'Email is required.';
    } else {
        // 检查数据库中是否存在该邮箱
        $stmt = $mysqli->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if (!$user) {
            $_SESSION['error'] = 'Email does not exist.';
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = 'Valid email is required.';
            } else if (strlen($password) < 8) {
                $_SESSION['error'] = 'Password must be at least 8 characters.';
            } else if (!preg_match("/[a-z]/i", $password)) {
                $_SESSION['error'] = 'Password must contain at least one letter.';
            } else if (!preg_match("/[0-9]/", $password)) {
                $_SESSION['error'] = 'Password must contain at least one number.';
            } else if ($password !== $confirm_password) {
                $_SESSION['error'] = 'Passwords must match.';
            } else {
                // 更新用户密码
                $password_hash = password_hash($password, PASSWORD_DEFAULT);
                $update_stmt = $mysqli->prepare("UPDATE user SET password_hash = ? WHERE email = ?");
                $update_stmt->bind_param('ss', $password_hash, $email);
                if ($update_stmt->execute()) {
                    $_SESSION['success'] = '密码已成功更新。';
                    header("Location: login.php"); // 用户密码更新后，跳转到登录页
                    exit;
                } else {
                    $_SESSION['error'] = '发生错误。';
                }
            }
        }
    }

    // 如果发生错误，则不立即重定向，等到显示错误消息后再重定向
    if (!empty($_SESSION['error'])) {
        $msg = $_SESSION['error'];
        unset($_SESSION['error']);
    }
}

// 如果没有错误消息或成功消息，则清除会话中的消息
unset($_SESSION['success']);
?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <!-- 加载样式文件 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="../Webcontent/css/bg.css">
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>

    <form method="post" action="reset.php">
        <h1>Reset Password</h1>

        <?php if (!empty($msg)): ?>
            <div class="error">
                <?= $msg ?>
            </div>
        <?php endif; ?>
        
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required value="<?= htmlspecialchars($email) ?>">

        <label for="password">New password</label>
        <input type="password" name="password" id="password" required>
        
        <label for="confirm_password">Confirm new password</label>
        <input type="password" name="confirm_password" id="confirm_password" required>
        
        <button type="submit">Reset</button>
        <div>Creat a  <a href="signup.php">new account!</a></div>
        <div>Back to  <a href="cisc7105-PairAssgn-home.html">homepage!</a></div>
    </form>
</body>
</html>
