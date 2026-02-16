<?php
session_start();
include('../condb.php'); // เชื่อมต่อฐานข้อมูล

// ตรวจสอบสิทธิ์: ถ้าไม่ล็อกอิน หรือไม่ใช่ admin ให้กระโดดกลับไปหน้า login
if (!isset($_SESSION['m_level']) || $_SESSION['m_level'] != 'admin') {
    echo "<script>alert('เฉพาะผู้ดูแลระบบเท่านั้น!'); window.location='../login.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Monkey Shop 🐒</title>
    <style>
        body { font-family: sans-serif; margin: 0; display: flex; background: #f4f7f6; }
        .sidebar { width: 250px; background: #2c3e50; color: white; min-height: 100vh; padding: 20px; }
        .sidebar h2 { color: #f1c40f; text-align: center; }
        .sidebar a { display: block; color: white; text-decoration: none; padding: 12px; margin: 5px 0; border-radius: 5px; }
        .sidebar a:hover { background: #34495e; color: #f1c40f; }
        .main { flex: 1; padding: 30px; }
        .card-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-top: 20px; }
        .card { background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); text-align: center; }
        .logout { background: #e74c3c !important; text-align: center; margin-top: 50px !important; }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>Monkey Admin 🐵</h2>
    <p>ยินดีต้อนรับ: <?php echo $_SESSION['m_name']; ?></p>
    <hr>
    <a href="index.php">🏠 Dashboard</a>
    <a href="category.php">📂 จัดการหมวดหมู่</a>
    <a href="product_list.php">📦 จัดการสินค้า</a>
    <a href="order_admin.php">🛒 รายการสั่งซื้อ</a>
    <a href="../index.php" target="_blank">🌐 ดูหน้าร้าน</a>
    <a href="../logout.php" class="logout">ออกจากระบบ</a>
</div>

<div class="main">
    <h1>แผงควบคุมระบบหลังบ้าน</h1>
    <div class="card-grid">
        <div class="card">
            <h3>ออเดอร์ใหม่</h3>
            <p style="font-size: 24px; font-weight: bold; color: #e67e22;">
                <?php 
                $q_ord = mysqli_query($conn, "SELECT COUNT(o_id) as total FROM orders WHERE o_status='pending'");
                $f_ord = mysqli_fetch_array($q_ord);
                echo $f_ord['total'];
                ?>
            </p>
        </div>
        <div class="card">
            <h3>สินค้าทั้งหมด</h3>
            <p style="font-size: 24px; font-weight: bold; color: #2980b9;">
                <?php 
                $q_pd = mysqli_query($conn, "SELECT COUNT(p_id) as total FROM products");
                $f_pd = mysqli_fetch_array($q_pd);
                echo $f_pd['total'];
                ?>
            </p>
        </div>
        <div class="card">
            <h3>สมาชิกทั้งหมด</h3>
            <p style="font-size: 24px; font-weight: bold; color: #27ae60;">
                <?php 
                $q_mem = mysqli_query($conn, "SELECT COUNT(m_id) as total FROM members");
                $f_mem = mysqli_fetch_array($q_mem);
                echo $f_mem['total'];
                ?>
            </p>
        </div>
    </div>
</div>

</body>
</html>