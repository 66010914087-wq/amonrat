<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>สมัครสมาชิก - Monkey Shop 🐒</title>
    <style>
        body { font-family: sans-serif; background: #f4f4f4; display: flex; justify-content: center; padding: 50px; }
        .reg-card { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 400px; }
        h2 { color: #f1c40f; text-align: center; }
        input, textarea { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #f1c40f; border: none; color: white; font-weight: bold; cursor: pointer; border-radius: 5px; }
        button:hover { background: #d4ac0d; }
    </style>
</head>
<body>
    <div class="reg-card">
        <h2>สมัครสมาชิก Monkey Shop</h2>
        <form action="register_db.php" method="POST">
            <input type="text" name="m_user" placeholder="Username" required>
            <input type="password" name="m_pass" placeholder="Password" required>
            <input type="text" name="m_name" placeholder="ชื่อ-นามสกุล" required>
            <input type="tel" name="m_tel" placeholder="เบอร์โทรศัพท์" required>
            <textarea name="m_address" placeholder="ที่อยู่สำหรับจัดส่งสินค้า" rows="3" required></textarea>
            <button type="submit">สมัครเลย! 🐵</button>
        </form>
        <p style="text-align:center; font-size:12px;">มีบัญชีอยู่แล้ว? <a href="login.php">เข้าสู่ระบบ</a></p>
    </div>
</body>
</html>