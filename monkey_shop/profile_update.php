<?php
session_start();
include('condb.php');

$m_id = $_SESSION['m_id'];
$m_name = $_POST['m_name'];
$m_tel = $_POST['m_tel'];
$m_address = $_POST['m_address'];

$sql = "UPDATE members SET m_name='$m_name', m_tel='$m_tel', m_address='$m_address' WHERE m_id=$m_id";
$result = mysqli_query($conn, $sql);

if($result) {
    $_SESSION['m_name'] = $m_name; // อัปเดตชื่อใน Session ด้วย
    echo "<script>alert('แก้ไขข้อมูลเรียบร้อย!'); window.location='profile.php';</script>";
} else {
    echo "<script>alert('เกิดข้อผิดพลาด!'); window.history.back();</script>";
}
?>