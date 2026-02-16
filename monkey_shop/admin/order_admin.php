<?php
session_start();
include('../condb.php');
if ($_SESSION['m_level'] != 'admin') { header("Location: ../login.php"); exit(); }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin - จัดการออเดอร์ 🐵</title>
    <style>
        body { font-family: sans-serif; background: #2c3e50; color: white; padding: 20px; }
        .container { background: white; color: #333; padding: 20px; border-radius: 10px; max-width: 1000px; margin: auto; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: center; }
        th { background: #f1c40f; }
        .btn-status { padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 12px; color: white; }
    </style>
</head>
<body>
<div class="container">
    <h2>รายการสั่งซื้อจากลูกค้า 🍌</h2>
    <table>
        <tr>
            <th>ออเดอร์ #</th>
            <th>ลูกค้า</th>
            <th>วันที่</th>
            <th>ยอดรวม</th>
            <th>สถานะ</th>
            <th>จัดการ</th>
        </tr>
        <?php
        $sql = "SELECT o.*, m.m_name FROM orders o 
                LEFT JOIN members m ON o.m_id = m.m_id 
                ORDER BY o.o_id DESC";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?php echo $row['o_id']; ?></td>
            <td><?php echo $row['m_name']; ?></td>
            <td><?php echo $row['o_date']; ?></td>
            <td><?php echo number_format($row['o_total'], 2); ?></td>
            <td><strong><?php echo $row['o_status']; ?></strong></td>
            <td>
                <a href="order_status.php?o_id=<?php echo $row['o_id']; ?>&status=paid" class="btn-status" style="background:#27ae60;">ชำระแล้ว</a>
                <a href="order_status.php?o_id=<?php echo $row['o_id']; ?>&status=shipped" class="btn-status" style="background:#3498db;">ส่งแล้ว</a>
                <a href="order_status.php?o_id=<?php echo $row['o_id']; ?>&status=cancelled" class="btn-status" style="background:#e74c3c;">ยกเลิก</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>