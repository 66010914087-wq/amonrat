<?php
session_start();
include('condb.php');

// ตรวจสอบว่าล็อกอินหรือยัง (ถ้ายังให้ไปหน้า login)
if (!isset($_SESSION['m_id'])) {
    echo "<script>alert('กรุณาเข้าสู่ระบบก่อนสั่งซื้อครับ'); window.location='login.php';</script>";
    exit();
}

// ตรวจสอบว่ามีสินค้าในตะกร้าไหม
if (empty($_SESSION['cart'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>ยืนยันการสั่งซื้อ - Monkey Shop 🐒</title>
    <style>
        body { font-family: sans-serif; background: #f4f4f4; padding: 20px; }
        .confirm-box { max-width: 700px; margin: auto; background: white; padding: 30px; border-radius: 10px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { padding: 10px; border-bottom: 1px solid #ddd; text-align: left; }
        .total-row { font-size: 1.2rem; font-weight: bold; color: #e74c3c; }
        textarea { width: 100%; padding: 10px; border-radius: 5px; }
        .btn-save { background: #27ae60; color: white; border: none; padding: 15px 30px; font-size: 1.1rem; cursor: pointer; width: 100%; border-radius: 5px; }
    </style>
</head>
<body>

<div class="confirm-box">
    <h2>สรุปรายการสั่งซื้อ 🍌</h2>
    <form action="save_order.php" method="POST">
        <table>
            <tr>
                <th>สินค้า</th>
                <th style="text-align:right">ราคา/ชิ้น</th>
                <th style="text-align:center">จำนวน</th>
                <th style="text-align:right">รวม</th>
            </tr>
            <?php
            $total = 0;
            foreach($_SESSION['cart'] as $p_id => $qty) {
                $sql = "SELECT * FROM products WHERE p_id = $p_id";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($query);
                $sum = $row['p_price'] * $qty;
                $total += $sum;
                echo "<tr>";
                echo "<td>".$row['p_name']."</td>";
                echo "<td align='right'>".number_format($row['p_price'],2)."</td>";
                echo "<td align='center'>$qty</td>";
                echo "<td align='right'>".number_format($sum,2)."</td>";
                echo "</tr>";
            }
            ?>
            <tr class="total-row">
                <td colspan="3" align="right">ยอดชำระทั้งสิ้น:</td>
                <td align="right"><?php echo number_format($total, 2); ?> ฿</td>
            </tr>
        </table>

        <?php
        // ดึงที่อยู่เดิมของสมาชิกมาโชว์
        $m_id = $_SESSION['m_id'];
        $sql_m = "SELECT * FROM members WHERE m_id = $m_id";
        $res_m = mysqli_query($conn, $sql_m);
        $row_m = mysqli_fetch_array($res_m);
        ?>

        <h3>สถานที่จัดส่งสินค้า</h3>
        <p>ชื่อผู้รับ: <strong><?php echo $row_m['m_name']; ?></strong></p>
        <p>เบอร์โทร: <?php echo $row_m['m_tel']; ?></p>
        <textarea name="o_addr_send" rows="4" required><?php echo $row_m['m_address']; ?></textarea>
        
        <input type="hidden" name="o_total" value="<?php echo $total; ?>">
        <br><br>
        <button type="submit" class="btn-save" onclick="return confirm('ยืนยันการสั่งซื้อสินค้า?')">ยืนยันการสั่งซื้อ ✅</button>
    </form>
</div>

</body>
</html>