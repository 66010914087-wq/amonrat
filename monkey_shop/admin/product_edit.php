<?php
session_start();
include('../condb.php');

// ตรวจสอบสิทธิ์ Admin
if (!isset($_SESSION['m_level']) || $_SESSION['m_level'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

// 1. รับค่า ID สินค้าที่ต้องการแก้ไข
$p_id = mysqli_real_escape_string($conn, $_GET['id']);

// 2. ดึงข้อมูลเดิมของสินค้าออกมา
$sql = "SELECT * FROM products WHERE p_id = '$p_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

// ถ้าไม่พบข้อมูลให้กลับหน้าหลัก
if(!$row) { header("Location: product_list.php"); exit; }
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แก้ไขสินค้า - Monkey Shop 🐒</title>
    <style>
        body { font-family: sans-serif; background: #f4f7f6; margin: 0; display: flex; }
        .sidebar { width: 250px; background: #2c3e50; color: white; min-height: 100vh; padding: 20px; }
        .sidebar a { display: block; color: white; text-decoration: none; padding: 12px; margin: 5px 0; border-radius: 5px; }
        .main { flex: 1; padding: 30px; }
        .form-card { background: white; padding: 30px; border-radius: 10px; max-width: 600px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        input, select, textarea { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        .btn-save { background: #f39c12; color: white; border: none; padding: 12px; width: 100%; cursor: pointer; font-size: 16px; border-radius: 5px; }
        .current-img { margin: 10px 0; border: 1px solid #eee; padding: 5px; border-radius: 5px; }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>Monkey Admin 🐵</h2>
    <hr>
    <a href="index.php">🏠 Dashboard</a>
    <a href="product_list.php">📦 กลับหน้าจัดการสินค้า</a>
</div>

<div class="main">
    <h1>แก้ไขข้อมูลสินค้า</h1>
    
    <div class="form-card">
        <form action="product_edit_db.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="p_id" value="<?php echo $row['p_id']; ?>">
            <input type="hidden" name="old_img" value="<?php echo $row['p_img']; ?>">

            <label>ชื่อสินค้า:</label>
            <input type="text" name="p_name" value="<?php echo $row['p_name']; ?>" required>

            <label>หมวดหมู่สินค้า:</label>
            <select name="cat_id" required>
                <?php
                $q_cat = mysqli_query($conn, "SELECT * FROM categories");
                while($row_cat = mysqli_fetch_array($q_cat)) {
                    $selected = ($row_cat['cat_id'] == $row['cat_id']) ? "selected" : "";
                    echo "<option value='".$row_cat['cat_id']."' $selected>".$row_cat['cat_name']."</option>";
                }
                ?>
            </select>

            <label>ราคา (บาท):</label>
            <input type="number" name="p_price" value="<?php echo $row['p_price']; ?>" required>
            <label>จำนวนสินค้าในสต็อก (คงเหลือ):</label>
<input type="number" name="p_qty" value="<?php echo $row['p_qty']; ?>" required min="0">

            <label>รายละเอียดสินค้า:</label>
            <textarea name="p_detail" rows="5"><?php echo $row['p_detail']; ?></textarea>

            <label>รูปภาพปัจจุบัน:</label><br>
            <img src="../p_img/<?php echo $row['p_img']; ?>" width="150" class="current-img"><br>
            
            <label>เปลี่ยนรูปภาพใหม่ (ถ้าไม่เปลี่ยนให้เว้นว่างไว้):</label>
            <input type="file" name="p_img" accept="image/*">
            

            <button type="submit" name="btn_edit" class="btn-save">บันทึกการแก้ไข 🍌</button>
        </form>
    </div>
</div>

</body>
</html>