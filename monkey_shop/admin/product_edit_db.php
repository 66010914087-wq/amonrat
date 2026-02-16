<?php
include('../condb.php');

if(isset($_POST['btn_edit'])) {
    $p_id = $_POST['p_id'];
    $p_name = $_POST['p_name'];
    $cat_id = $_POST['cat_id'];
    $p_price = $_POST['p_price'];
    $p_detail = $_POST['p_detail'];
    $old_img = $_POST['old_img'];
   


    // ตรวจสอบการอัปโหลดรูปภาพใหม่
    $upload = $_FILES['p_img']['name'];
    if($upload != '') {
        // --- กรณีอัปโหลดรูปใหม่ ---
        $path = "../p_img/";
        $type = strrchr($_FILES['p_img']['name'], ".");
        $newname = (mt_rand()).date("Ymd_His").$type;
        $path_copy = $path.$newname;

        // ย้ายไฟล์ใหม่เข้า Folder
        move_uploaded_file($_FILES['p_img']['tmp_name'], $path_copy);
        
        // ลบไฟล์รูปเก่าออกจาก Folder เพื่อไม่ให้เปลืองพื้นที่
        if($old_img != "") {
            unlink("../p_img/".$old_img);
        }
    } else {
        // --- กรณีใช้รูปเดิม ---
        $newname = $old_img;
    }
    $p_qty = $_POST['p_qty'];
    // Update ข้อมูลลง Database
    $sql = "UPDATE products SET 
            p_name = '$p_name', 
            p_qty = '$p_qty',
            cat_id = '$cat_id', 
            p_price = '$p_price', 
            p_detail = '$p_detail', 
            p_img = '$newname' 
            WHERE p_id = '$p_id'";

    $result = mysqli_query($conn, $sql);

    if($result) {
        echo "<script>alert('แก้ไขข้อมูลสำเร็จ!'); window.location='product_list.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด!'); window.history.back();</script>";
    }
}
?>