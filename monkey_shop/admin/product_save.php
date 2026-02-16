<?php
include('../condb.php');

if(isset($_POST['save_product'])) {
    $p_name = $_POST['p_name'];
    $cat_id = $_POST['cat_id'];
    $p_price = $_POST['p_price'];
    $p_qty = $_POST['p_qty']; // 1. รับค่าจำนวนสต็อกเพิ่มจากฟอร์ม
    $p_detail = $_POST['p_detail'];

    // จัดการเรื่องรูปภาพ
    $date1 = date("Ymd_His"); 
    $numrand = (mt_rand());
    $upload = $_FILES['p_img']['name'];

    if($upload != '') {
        $path = "../p_img/"; 
        $type = strrchr($_FILES['p_img']['name'], ".");
        $newname = $numrand.$date1.$type;
        $path_copy = $path.$newname;
        move_uploaded_file($_FILES['p_img']['tmp_name'], $path_copy);
    }

    // 2. เพิ่มคอลัมน์ p_qty เข้าไปในคำสั่ง INSERT
    $sql = "INSERT INTO products (p_name, cat_id, p_price, p_qty, p_detail, p_img) 
            VALUES ('$p_name', '$cat_id', '$p_price', '$p_qty', '$p_detail', '$newname')";
    
    $result = mysqli_query($conn, $sql);

    if($result) {
        echo "<script>alert('เพิ่มสินค้าสำเร็จ!'); window.location='product_list.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด!'); window.history.back();</script>";
    }
}
?>