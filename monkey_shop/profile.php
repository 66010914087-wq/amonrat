<?php
session_start();
include('condb.php');
$m_id = $_SESSION['m_id'];
$sql = "SELECT * FROM members WHERE m_id = $m_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>แก้ไขข้อมูลส่วนตัว 🐒</title>
    <style>
        body { font-family: sans-serif; background: #f4f4f4; display: flex; justify-content: center; padding: 50px; }
        .card { background: white; padding: 30px; border-radius: 10px; width: 400px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        input, textarea { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; }
        button { width: 100%; padding: 10px; background: #f1c40f; border: none; font-weight: bold; cursor: pointer; }
    </style>
</head>
<body>
<div class="card">
    <h2>แก้ไขข้อมูลสมาชิก</h2>
    <form action="profile_update.php" method="POST">
        <label>ชื่อ-นามสกุล:</label>
        <input type="text" name="m_name" value="<?php echo $row['m_name']; ?>" required>
        <label>เบอร์โทรศัพท์:</label>
        <input type="text" name="m_tel" value="<?php echo $row['m_tel']; ?>" required>
        <label>ที่อยู่จัดส่ง:</label>
        <textarea name="m_address" rows="4" required><?php echo $row['m_address']; ?></textarea>
        <button type="submit">บันทึกการเปลี่ยนแปลง 🍌</button>
    </form>
    <br><a href="index.php">กลับหน้าหลัก</a>
</div>
</body>
</html>