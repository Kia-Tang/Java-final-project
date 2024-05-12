<?php
require_once 'database.php'; // 包含数据库连接

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 获取表单提交的所有用户信息
    $email = $_POST['email'] ?? '';
    $name = $_POST['name'] ?? '';
    $age = $_POST['age'] ?? NULL;
    $region = $_POST['region'] ?? NULL;
    $gender = $_POST['gender'] ?? NULL;
    $shipping_address = $_POST['shipping_address'] ?? NULL; // 新增
    $bio = $_POST['bio'] ?? NULL; // 新增
    $birthday = $_POST['birthday'] ?? NULL; // 新增
    $signature = $_POST['signature'] ?? NULL; // 新增

    // 更新语句中使用邮箱作为条件
    $update_stmt = $mysqli->prepare("UPDATE user SET name = ?, age = ?, region = ?, gender = ?, shipping_address = ?, bio = ?, birthday = ?, signature = ? WHERE email = ?");
    $update_stmt->bind_param("sssssssss", $name, $age, $region, $gender, $shipping_address, $bio, $birthday, $signature, $email);
    $update_stmt->execute();

    echo " "; // 提供反馈

    // 更新用户名的 session
    $_SESSION['user_name'] = $name;
}

// 获取用户邮箱和用户名（通过 session）
$email = $_SESSION['user_email'] ?? '';
$name = $_SESSION['user_name'] ?? '';

// 根据用户邮箱查询用户信息
$stmt = $mysqli->prepare("SELECT * FROM user WHERE email = ?");
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo 'No user found with the given email.';
    exit;
}

// 用于下面的表单
$shipping_address = $user['shipping_address'] ?? '';
$bio = $user['bio'] ?? '';
$birthday = $user['birthday'] ?? '';
$signature = $user['signature'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="../Webcontent/css/profile.css">
    

</head>
<body>
    <form action="profile.php" method="post">
        <h1>Edit My Profile</h1>

        <div class="form-row">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" readonly>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($name) ?>">
        </div>

        <div class="form-row">
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" value="<?= htmlspecialchars($user['age'] ?? '') ?>">

            <label for="region">Region:</label>
            <input type="text" id="region" name="region" value="<?= htmlspecialchars($user['region'] ?? '') ?>">
        </div>

        <div class="form-row">
            <label for="gender">Gender:</label>
            <select id="gender" name="gender">
                <option value="male" <?= (isset($user['gender']) && $user['gender'] === 'male') ? 'selected' : '' ?>>Male</option>
                <option value="female" <?= (isset($user['gender']) && $user['gender'] === 'female') ? 'selected' : '' ?>>Female</option>
                <option value="other" <?= (isset($user['gender']) && $user['gender'] === 'other') ? 'selected' : '' ?>>Other</option>
            </select>

            <label for="shipping_address">Shipping Address:</label>
            <input type="text" id="shipping_address" name="shipping_address" value="<?= htmlspecialchars($user['shipping_address'] ?? '') ?>">
        </div>

        <div class="form-row">
            <label for="bio">Bio:</label>
            <textarea id="bio" name="bio"><?= htmlspecialchars($user['bio'] ?? '') ?></textarea>
        </div>

        <div class="form-row">
        <label for="birthday">Birthday:</label>
        <input type="date" id="birthday" name="birthday" value="<?= htmlspecialchars($user['birthday'] ?? '') ?>">
        </div>


            <label for="signature">Signature:</label>
            <input type="text" id="signature" name="signature" value="<?= htmlspecialchars($user['signature'] ?? '') ?>">
        </div>

        <button type="submit">Update Profile</button>
        <a href="cisc7105-PairAssgn.php" class="button">Back to Homepage</a>
    </form>
</body>
</html>
