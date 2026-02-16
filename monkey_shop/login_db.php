<?php
session_start(); // สำคัญมาก: ต้องมีเพื่อใช้จำค่าคนล็อกอิน
include('condb.php');

$m_user = $_POST['m_user'];
$m_pass = $_POST['m_pass'];

// ค้นหาในฐานข้อมูล
$sql = "SELECT * FROM members WHERE m_user = '$m_user' AND m_pass = '$m_pass'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);

    // เก็บค่าลง Session
    $_SESSION['m_id'] = $row['m_id'];
    $_SESSION['m_name'] = $row['m_name'];
    $_SESSION['m_level'] = $row['m_level'];

    if($_SESSION['m_level'] == 'admin') {
        header("Location: admin/index.php"); // ไปหน้าหลังบ้าน
    } else {
        header("Location: index.php"); // ไปหน้าแรกของร้าน
    }
} else {
    echo "<script>alert('User หรือ Password ไม่ถูกต้อง!'); window.history.back();</script>";
}
?>