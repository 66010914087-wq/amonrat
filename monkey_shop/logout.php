<?php
session_start();
session_destroy(); // ล้างค่าทั้งหมด
header("Location: index.php");
?>