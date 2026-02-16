<?php
session_start();
include('condb.php');

// ตรวจสอบว่าล็อกอินหรือยัง
if (!isset($_SESSION['m_id'])) {
    header("Location: login.php");
    exit();
}

$m_id = $_SESSION['m_id'];
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ประวัติการสั่งซื้อ - Monkey Shop 🐒</title>
    <style>
        body { font-family: 'Kanit', sans-serif; background: #f4f4f4; padding: 20px; }
        .container { max-width: 900px; margin: auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { color: #2c3e50; border-bottom: 2px solid #f1c40f; padding-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border-bottom: 1px solid #ddd; text-align: center; }
        th { background: #f8f9fa; }
        .status-pending { color: #f39c12; font-weight: bold; }
        .status-paid { color: #27ae60; font-weight: bold; }
        .status-shipped { color: #3498db; font-weight: bold; }
        .btn-view { background: #eee; padding: 5px 10px; text-decoration: none; color: #333; border-radius: 4px; font-size: 14px; }
        .btn-view:hover { background: #ddd; }
    </style>
</head>
<body>

<div class="container">
    <h2>ประวัติการสั่งซื้อของฉัน 🍌</h2>
    <table>
        <thead>
            <tr>
                <th>เลขที่ออเดอร์</th>
                <th>วันที่สั่งซื้อ</th>
                <th>ราคารวม</th>
                <th>สถานะ</th>
                <th>รายละเอียด</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // ดึงข้อมูลออเดอร์ของสมาชิกที่ Login อยู่
            $sql = "SELECT * FROM orders WHERE m_id = $m_id ORDER BY o_id DESC";
            $query = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($query) > 0) {
                while($row = mysqli_fetch_array($query)) {
                    // กำหนดสีของสถานะ
                    $status_class = "status-" . $row['o_status'];
                    $status_text = "";
                    if($row['o_status'] == 'pending') $status_text = "รอชำระเงิน";
                    if($row['o_status'] == 'paid') $status_text = "ชำระเงินแล้ว";
                    if($row['o_status'] == 'shipped') $status_text = "จัดส่งแล้ว";
                    if($row['o_status'] == 'cancelled') $status_text = "ยกเลิก";
            ?>
                <tr>
                    <td>#<?php echo $row['o_id']; ?></td>
                    <td><?php echo date('d/m/Y H:i', strtotime($row['o_date'])); ?></td>
                    <td><?php echo number_format($row['o_total'], 2); ?> ฿</td>
                    <td class="<?php echo $status_class; ?>"><?php echo $status_text; ?></td>
                    <td>
                        <a href="order_detail_view.php?o_id=<?php echo $row['o_id']; ?>" class="btn-view">🔍 ดูรายการ</a>
                    </td>
                </tr>
            <?php 
                } 
            } else {
                echo "<tr><td colspan='5'>ยังไม่มีประวัติการสั่งซื้อ</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <br>
    <a href="index.php" style="color: #666; text-decoration: none;">← กลับไปหน้าหลัก</a>
</div>

</body>
</html>