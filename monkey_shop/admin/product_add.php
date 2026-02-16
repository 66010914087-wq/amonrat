<?php
session_start();
include('../condb.php');

// ตรวจสอบสิทธิ์ Admin
if ($_SESSION['m_level'] != 'admin') { header("Location: ../login.php"); exit(); }
?>
<!DOCTYPE html>
<html>
<head>
    <title>เพิ่มสินค้า - Monkey Shop 🐒</title>
    <style>
        body { font-family: sans-serif; background: #f4f4f4; padding: 20px; }
        .form-box { background: white; padding: 30px; border-radius: 10px; max-width: 500px; margin: auto; }
        input, select, textarea { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background: #f39c12; border: none; color: white; font-weight: bold; cursor: pointer; }
    </style>
</head>
<body>
    <div class="form-box">
        <h2>เพิ่มสินค้าใหม่ 🍌</h2>
        <form action="product_save.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="p_name" placeholder="ชื่อสินค้า" required>
            
            <select name="cat_id" required>
                <option value="">-- เลือกหมวดหมู่ --</option>
                <?php
                $q_cat = mysqli_query($conn, "SELECT * FROM categories");
                while($row_cat = mysqli_fetch_array($q_cat)) {
                    echo "<option value='".$row_cat['cat_id']."'>".$row_cat['cat_name']."</option>";
                }
                ?>
            </select>

            <input type="number" name="p_price" placeholder="ราคาสินค้า" required>
            <textarea name="p_detail" placeholder="รายละเอียดสินค้า" rows="4"></textarea>
            
            <label>รูปภาพสินค้า:</label>
            <input type="file" name="p_img" accept="image/*" required>
            
            <button type="submit" name="save_product">บันทึกสินค้า</button>
        </form>
        <br><a href="product_list.php">กลับหน้าจัดการสินค้า</a>
    </div>
</body>
</html>