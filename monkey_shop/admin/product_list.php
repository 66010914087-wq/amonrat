<?php
session_start();
include('../condb.php');

// ตรวจสอบสิทธิ์ Admin
if (!isset($_SESSION['m_level']) || $_SESSION['m_level'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

// ดึงข้อมูลสินค้าทั้งหมด โดย Join กับตารางหมวดหมู่ และดึง p_qty ออกมาโชว์ด้วย
$sql = "SELECT p.*, c.cat_name 
        FROM products p 
        LEFT JOIN categories c ON p.cat_id = c.cat_id 
        ORDER BY p.p_id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>จัดการสินค้า - Monkey Shop 🐒</title>
    <style>
        body { font-family: sans-serif; background: #f4f7f6; margin: 0; display: flex; }
        .sidebar { width: 250px; background: #2c3e50; color: white; min-height: 100vh; padding: 20px; }
        .sidebar a { display: block; color: white; text-decoration: none; padding: 12px; margin: 5px 0; border-radius: 5px; }
        .sidebar a:hover { background: #34495e; }
        .main { flex: 1; padding: 30px; }
        .header-flex { display: flex; justify-content: space-between; align-items: center; }
        .btn-add { background: #27ae60; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; }
        table { width: 100%; border-collapse: collapse; background: white; margin-top: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: center; }
        th { background: #f1c40f; color: #333; }
        img { border-radius: 5px; object-fit: cover; }
        .btn-edit { color: #3498db; text-decoration: none; margin-right: 10px; }
        .btn-del { color: #e74c3c; text-decoration: none; }
        /* ตกแต่งสีตัวเลขสต็อก */
        .out-of-stock { color: red; font-weight: bold; }
        .low-stock { color: orange; font-weight: bold; }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>Monkey Admin 🐵</h2>
    <hr>
    <a href="index.php">🏠 Dashboard</a>
    <a href="category.php">📂 จัดการหมวดหมู่</a>
    <a href="product_list.php" style="background: #34495e;">📦 จัดการสินค้า</a>
    <a href="order_admin.php">🛒 รายการสั่งซื้อ</a>
    <a href="../index.php" target="_blank">🌐 ดูหน้าร้าน</a>
    <a href="../logout.php">ออกจากระบบ</a>
</div>

<div class="main">
    <div class="header-flex">
        <h1>รายการสินค้าทั้งหมด</h1>
        <a href="product_add.php" class="btn-add">+ เพิ่มสินค้าใหม่</a>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">ID</th>
                <th width="10%">รูปภาพ</th>
                <th width="20%">ชื่อสินค้า</th>
                <th width="15%">หมวดหมู่</th>
                <th width="10%">ราคา (฿)</th>
                <th width="10%">สต็อก (ชิ้น)</th> <th width="20%">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_array($result)) { 
                // กำหนด Class ตามจำนวนสินค้า
                $stock_class = "";
                if($row['p_qty'] <= 0) {
                    $stock_class = "out-of-stock";
                } elseif($row['p_qty'] <= 5) {
                    $stock_class = "low-stock";
                }
            ?>
            <tr>
                <td><?php echo $row['p_id']; ?></td>
                <td>
                    <img src="../p_img/<?php echo $row['p_img']; ?>" width="60" height="60">
                </td>
                <td align="left"><?php echo $row['p_name']; ?></td>
                <td><?php echo $row['cat_name']; ?></td>
                <td><?php echo number_format($row['p_price'], 2); ?></td>
                
                <td class="<?php echo $stock_class; ?>">
                    <?php echo ($row['p_qty'] <= 0) ? "หมด" : $row['p_qty']; ?>
                </td>

                <td>
                    <a href="product_edit.php?id=<?php echo $row['p_id']; ?>" class="btn-edit">✏️ แก้ไข</a>
                    <a href="product_del.php?id=<?php echo $row['p_id']; ?>" 
                       class="btn-del" 
                       onclick="return confirm('ยืนยันการลบสินค้าชิ้นนี้?')">🗑️ ลบ</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>