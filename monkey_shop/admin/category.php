<?php
session_start();
include('../condb.php'); // ย้อนกลับไป 1 Folder เพื่อเรียกไฟล์เชื่อมต่อ

// ตรวจสอบว่าเป็น Admin หรือไม่
if ($_SESSION['m_level'] != 'admin') {
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>จัดการหมวดหมู่ - Admin 🐒</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background: #ecf0f1; }
        .box { background: white; padding: 20px; border-radius: 8px; max-width: 600px; margin: auto; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background: #f1c40f; }
        input[type="text"] { width: 70%; padding: 8px; }
        button { padding: 8px 15px; background: #27ae60; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="box">
        <h2>จัดการหมวดหมู่สินค้า 🍌</h2>
        <form action="category_save.php" method="POST">
            <input type="text" name="cat_name" placeholder="ชื่อหมวดหมู่ใหม่ เช่น Gaming Gear" required>
            <button type="submit" name="add_cat">เพิ่ม</button>
        </form>

        <table>
            <tr>
                <th>รหัส</th>
                <th>ชื่อหมวดหมู่</th>
                <th>จัดการ</th>
            </tr>
            <?php
            $query = mysqli_query($conn, "SELECT * FROM categories");
            while($row = mysqli_fetch_array($query)) {
                echo "<tr>";
                echo "<td>" . $row['cat_id'] . "</td>";
                echo "<td>" . $row['cat_name'] . "</td>";
                echo "<td><a href='category_del.php?id=".$row['cat_id']."' onclick='return confirm(\"ยืนยันการลบ?\")' style='color:red;'>ลบ</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
        <br>
        <a href="../admin/index.php">กลับหน้าหลัก</a>
    </div>
</body>
</html>