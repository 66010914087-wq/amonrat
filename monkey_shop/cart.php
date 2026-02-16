<?php
session_start();
include('condb.php');

$p_id = isset($_GET['p_id']) ? $_GET['p_id'] : ''; 
$act = isset($_GET['act']) ? $_GET['act'] : 'view';

// --- ส่วนของการจัดการข้อมูล (Logic) ---

// 1. เพิ่มสินค้าลงตะกร้า
if($act=='add' && !empty($p_id)) {
    if(isset($_SESSION['cart'][$p_id])) {
        $_SESSION['cart'][$p_id]++; 
    } else {
        $_SESSION['cart'][$p_id] = 1; 
    }
    header("Location: cart.php"); 
    exit();
}

// 2. ลบสินค้าออกจากตะกร้า
if($act=='remove' && !empty($p_id)) {
    unset($_SESSION['cart'][$p_id]);
    header("Location: cart.php");
    exit();
}

// 3. ปรับปรุงจำนวนสินค้า (Update)
if($act=='update') {
    $amount_array = $_POST['amount'];
    foreach($amount_array as $p_id => $amount) {
        $sql_stock = "SELECT p_qty, p_name FROM products WHERE p_id = $p_id";
        $res_stock = mysqli_query($conn, $sql_stock);
        $row_stock = mysqli_fetch_array($res_stock);

        if($amount > $row_stock['p_qty']) {
            $_SESSION['cart'][$p_id] = $row_stock['p_qty'];
            echo "<script>alert('สินค้า " . $row_stock['p_name'] . " มีไม่พอในสต็อก (เหลือ " . $row_stock['p_qty'] . " ชิ้น)');</script>";
        } else {
            $_SESSION['cart'][$p_id] = $amount;
        }
    }
    echo "<script>window.location='cart.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>ตะกร้าสินค้า - Monkey Shop 🛒</title>
    <style>
        body { font-family: sans-serif; background: #f9f9f9; padding: 20px; }
        .cart-container { max-width: 850px; margin: auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px; border-bottom: 1px solid #ddd; text-align: center; }
        th { background: #eee; }
        .btn-update { background: #3498db; color: white; border: none; padding: 10px 15px; cursor: pointer; border-radius: 5px; }
        .btn-confirm { background: #27ae60; color: white; text-decoration: none; padding: 10px 20px; border-radius: 5px; font-weight: bold; display: inline-block; }
        .btn-disabled { background: #95a5a6; color: white; padding: 10px 20px; border-radius: 5px; font-weight: bold; border: none; cursor: not-allowed; }
        .btn-remove { color: red; text-decoration: none; font-size: 13px; border: 1px solid red; padding: 2px 5px; border-radius: 3px; }
        input[type=number] { width: 60px; text-align: center; padding: 5px; }
    </style>
</head>
<body>

<div class="cart-container">
    <h2>ตะกร้าสินค้าของฉัน 🛒</h2>
    <form action="?act=update" method="post">
    <table>
        <tr>
            <th>สินค้า</th>
            <th>ราคา</th>
            <th>จำนวน (ชิ้น)</th>
            <th>รวม</th>
            <th>ลบ</th>
        </tr>
        <?php
        $total = 0;
        $can_checkout = true; // ตัวแปรเช็คว่าเปิดปุ่มยืนยันได้ไหม
        
        if(!empty($_SESSION['cart'])) {
            foreach($_SESSION['cart'] as $p_id => $qty) {
                $sql = "SELECT * FROM products WHERE p_id = $p_id";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($query);
                $sum = $row['p_price'] * $qty;
                $total += $sum;

                // ตรวจสอบสต็อกรายชิ้น
                if($row['p_qty'] <= 0 || $qty > $row['p_qty']) {
                    $can_checkout = false; // ถ้ามีชิ้นไหนหมด หรือสั่งเกินสต็อก ให้ปิดปุ่มยืนยัน
                }

                echo "<tr>";
                echo "<td align='left'>" . $row['p_name'] . " <br>";
                if($row['p_qty'] <= 0) {
                    echo "<small style='color:red'>** สินค้าหมดสต็อก **</small>";
                } else {
                    echo "<small style='color:gray'>(คงเหลือ: ".$row['p_qty'].")</small>";
                }
                echo "</td>";
                echo "<td>" . number_format($row['p_price'], 2) . "</td>";
                echo "<td><input type='number' name='amount[$p_id]' value='$qty' min='1' max='".$row['p_qty']."'></td>";
                echo "<td>" . number_format($sum, 2) . "</td>";
                echo "<td><a href='?act=remove&p_id=$p_id' class='btn-remove' onclick=\"return confirm('ลบรายการนี้?')\">ลบ</a></td>";
                echo "</tr>";
            }
            echo "<tr><td colspan='3' align='right'><strong>ราคารวมทั้งหมด</strong></td><td><strong style='color:red'>".number_format($total, 2)."</strong></td><td>บาท</td></tr>";
        } else {
            echo "<tr><td colspan='5' style='padding:40px;'>ไม่มีสินค้าในตะกร้า</td></tr>";
        }
        ?>
    </table>
    
    <div style="margin-top: 20px; overflow: hidden;">
        <a href="index.php" style="color: #3498db; text-decoration: none;">← เลือกสินค้าต่อ</a>
        
        <?php if(!empty($_SESSION['cart'])) { ?>
            <div style="float: right;">
                <button type="submit" class="btn-update">🔄 คำนวณใหม่</button>
                
                <?php 
                // ส่วนของปุ่มยืนยันที่คุณขอมาครับ
                if($can_checkout) { 
                    echo "<a href='confirm.php' class='btn-confirm'>ไปหน้ายืนยันสั่งซื้อ ✅</a>";
                } else {
                    echo "<button type='button' class='btn-disabled' onclick=\"alert('มีสินค้าบางรายการหมด หรือสั่งเกินจำนวนที่มี โปรดลบออกหรือกดคำนวณใหม่')\">⚠️ สินค้าไม่เพียงพอ</button>";
                }
                ?>
            </div>
        <?php } ?>
    </div>
    </form>
</div>

</body>
</html>