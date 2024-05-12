<?php
session_start(); // 必须位于文件的最开始

$mysqli = require __DIR__ . "/database.php";
if (empty($_POST["name"])) {
    $_SESSION['error'] = "Name is required";
    header("Location: signup.php");
    exit;
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    if (empty($_POST["email"])) {
        $_SESSION['error'] = "Email is required";
        header("Location: signup.php");
        exit;
    }
}

if (strlen($_POST["password"]) < 8) {

$_SESSION['error'] = 'Password must be at least 8 characters.';
    header("Location: signup.php");
    exit;
}
if (!preg_match("/[a-z]/i", $_POST["password"])) {
$_SESSION['error'] = 'Password must contain at least one letter.';
    header("Location: signup.php");
    exit;
}
if (!preg_match("/[0-9]/", $_POST["password"])) {
    $_SESSION['error'] = 'Password must contain at least one number.';
    header("Location: signup.php");
    exit;
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    $_SESSION['error'] = 'Passwords must match.';
    header("Location: signup.php");
    exit;
}


// 检查名字是否已经存在于数据库中
$name_sql = "SELECT * FROM user WHERE name = ?";
$name_stmt = $mysqli->prepare($name_sql);
$name_stmt->bind_param("s", $_POST["name"]);
$name_stmt->execute();
$name_result = $name_stmt->get_result();

if ($name_result->num_rows > 0) {
    $_SESSION['error'] = 'Name already taken.';
    header("Location: signup.php"); // 重定向回注册表单
    exit;
}
// 检查邮箱是否已经存在于数据库中
$email_sql = "SELECT * FROM user WHERE email = ?";
$email_stmt = $mysqli->prepare($email_sql);
$email_stmt->bind_param("s", $_POST["email"]);
$email_stmt->execute();
$email_result = $email_stmt->get_result();

if ($email_result->num_rows > 0) {
    $_SESSION['error'] = 'Email already taken.';
    header("Location: signup.php");
    exit;
}



$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);


$sql = "CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) UNIQUE,
    email VARCHAR(255),
    password_hash VARCHAR(255)
)";

// 执行创建表的 SQL 语句
if (!$mysqli->query($sql)) {
    die("SQL error: " . $mysqli->error);
}

$sql = "INSERT INTO user (name, email, password_hash)
        VALUES (?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss",
                  $_POST["name"],
                  $_POST["email"],
                  $password_hash);
                  
if ($stmt->execute()) {

    header("Location:signup-success.html");
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("email already taken");
        header("Location: signup.php");
        exit;
    } else {
        die("Database error: " . $mysqli->error);
    }
}



// 检查邮箱是否已经存在于数据库中
$sql = "SELECT * FROM user WHERE email = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_POST["email"]);
$stmt->execute();
$result = $stmt->get_result();

// 开始或恢复会话

if ($result->num_rows > 0) {
    // 邮箱已经存在，设置会话错误消息
    $_SESSION['error'] = 'Email already taken.';
    header("Location: signup.php"); // 重定向回注册页面
    exit; // 退出脚本
} else {
    // 邮箱不存在，可以添加新用户到数据库
    // ...插入用户的代码...
}
