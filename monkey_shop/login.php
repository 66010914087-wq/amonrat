<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เข้าสู่ระบบ - Monkey Shop 🐒</title>
    <style>
        body { font-family: sans-serif; background: #f4f4f4; display: flex; justify-content: center; padding: 100px; }
        .login-card { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 350px; }
        h2 { color: #2c3e50; text-align: center; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #2ecc71; border: none; color: white; font-weight: bold; cursor: pointer; border-radius: 5px; }
        button:hover { background: #27ae60; }
    </style>
</head>
<body>
    <div class="login-card">
        <h2>Login Monkey Shop</h2>
        <form action="login_db.php" method="POST">
            <input type="text" name="m_user" placeholder="Username" required>
            <input type="password" name="m_pass" placeholder="Password" required>
            <button type="submit">เข้าสู่ระบบ 🍌</button>
        </form>
        <p style="text-align:center; font-size:12px;">ยังไม่เป็นสมาชิก? <a href="register.php">สมัครที่นี่</a></p>
    </div>
</body>
</html>