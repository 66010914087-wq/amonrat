<?php
include('condb.php'); // เรียกไฟล์เชื่อมต่อ DB มาใช้

// รับค่าจากฟอร์ม
$m_user = $_POST['m_user'];
$m_pass = $_POST['m_pass']; // ในอนาคตแนะนำให้ใช้ password_hash นะครับ
$m_name = $_POST['m_name'];
$m_tel = $_POST['m_tel'];
$m_address = $_POST['m_address'];

// คำสั่ง SQL สำหรับเพิ่มข้อมูล
$sql = "INSERT INTO members (m_user, m_pass, m_name, m_tel, m_address, m_level) 
        VALUES ('$m_user', '$m_pass', '$m_name', '$m_tel', '$m_address', 'member')";

$result = mysqli_query($conn, $sql);

if($result) {
    echo "<script>alert('สมัครสมาชิกสำเร็จ!'); window.location='login.php';</script>";
} else {
    echo "<script>alert('เกิดข้อผิดพลาด!'); window.history.back();</script>";
}
?>