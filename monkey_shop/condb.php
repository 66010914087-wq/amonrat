<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "monkey_shop";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("เชื่อมต่อล้มเหลว: " . mysqli_connect_error());
}

// ตั้งค่าภาษาไทย
mysqli_query($conn, "SET NAMES 'utf8'");

// ตั้งค่า Timezone ให้เป็นเวลาไทย
date_default_timezone_set('Asia/Bangkok');
?>