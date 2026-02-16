<?php
session_start();
include('condb.php');

$o_id = $_GET['o_id'];
$m_id = $_SESSION['m_id'];

// ดึงหัวบิลมาเช็คว่าเป็นของลูกค้าคนนี้จริงไหม
$sql_head = "SELECT * FROM orders WHERE o_id = $o_id AND m_id = $m_id";
$res_head = mysqli_query($conn, $sql_head);
$row_head = mysqli_fetch_array($res_head);

if(!$row_head) { header("Location: order_history.php"); exit; }
?>

<!DOCTYPE html>
<html>
<head>
    <title>รายละเอียดออเดอร์ #<?php echo $o_id; ?></title>
    <style>
        body { font-family: sans-serif; padding: 40px; background: #f4f4f4; }
        .detail-card { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 8px; }
        table { width: 100%; border-collapse: collapse; }
        td, th { padding: 10px; border-bottom: 1px solid #eee; }
    </style>
</head>
<body>

<div class="detail-card">
    <h3>รายละเอียดออเดอร์ #<?php echo $o_id; ?></h3>
    <p>จัดส่งไปที่: <?php echo $row_head['o_addr_send']; ?></p>
    <hr>
    <table>
        <tr>
            <th>สินค้า</th>
            <th>จำนวน</th>
            <th>รวม</th>
        </tr>
        <?php
        // ดึงรายการสินค้าในออเดอร์นี้มาโชว์ โดย Join กับตารางสินค้าเพื่อเอาชื่อมาโชว์
        $sql_det = "SELECT d.*, p.p_name 
                    FROM order_details d
                    LEFT JOIN products p ON d.p_id = p.p_id
                    WHERE d.o_id = $o_id";
        $res_det = mysqli_query($conn, $sql_det);
        while($d = mysqli_fetch_array($res_det)) {
            echo "<tr>";
            echo "<td>".$d['p_name']."</td>";
            echo "<td align='center'>".$d['d_qty']."</td>";
            echo "<td align='right'>".number_format($d['d_subtotal'], 2)."</td>";
            echo "</tr>";
        }
        ?>
        <tr>
            <td colspan="2" align="right"><strong>ยอดรวมสุทธิ</strong></td>
            <td align="right"><strong><?php echo number_format($row_head['o_total'], 2); ?> ฿</strong></td>
        </tr>
    </table>
    <br>
    <a href="order_history.php">กลับ</a>
</div>

</body>
</html>