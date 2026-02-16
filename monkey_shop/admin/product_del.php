<?php
include('../condb.php');
$p_id = $_GET['id'];

// ดึงชื่อรูปภาพมาเพื่อลบไฟล์ออกจาก Folder ด้วย
$sql_img = "SELECT p_img FROM products WHERE p_id = $p_id";
$res_img = mysqli_query($conn, $sql_img);
$row_img = mysqli_fetch_array($res_img);
unlink("../p_img/".$row_img['p_img']); // ลบไฟล์รูป

$sql = "DELETE FROM products WHERE p_id = $p_id";
if(mysqli_query($conn, $sql)) {
    header("Location: product_list.php");
}
?>