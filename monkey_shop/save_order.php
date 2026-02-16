<?php
session_start();
include('condb.php'); // เชื่อมต่อฐานข้อมูล

// 1. รับค่าที่ส่งมาจากฟอร์ม confirm.php
$m_id = $_SESSION['m_id'];         // ไอดีลูกค้าจาก Session
$o_addr_send = $_POST['o_addr_send']; // ที่อยู่จัดส่งที่กรอกมาใหม่
$o_total = $_POST['o_total'];         // ยอดราคารวมทั้งหมด
$o_date = date("Y-m-d H:i:s");     // วันที่ปัจจุบัน

// 2. บันทึกข้อมูลลงตาราง orders (หัวบิล)
$sql_order = "INSERT INTO orders (m_id, o_date, o_status, o_total, o_addr_send) 
              VALUES ('$m_id', '$o_date', 'pending', '$o_total', '$o_addr_send')";

$result_order = mysqli_query($conn, $sql_order);

// 3. เมื่อบันทึกหัวบิลสำเร็จ เราจะได้ o_id (เลขสั่งซื้อ) มาเพื่อใช้บันทึกรายละเอียดสินค้า
if($result_order) {
    $o_id = mysqli_insert_id($conn); // ดึง ID ล่าสุดที่เพิ่ง insert ไป

    // 4. วนลูปสินค้าในตะกร้า ($_SESSION['cart']) เพื่อบันทึกลง order_details
    foreach($_SESSION['cart'] as $p_id => $qty) {
        
        // ดึงราคาปัจจุบันของสินค้าจากฐานข้อมูลอีกครั้งเพื่อความถูกต้อง
        $sql_price = "SELECT p_price FROM products WHERE p_id = $p_id";
        $res_price = mysqli_query($conn, $sql_price);
        $row_p = mysqli_fetch_array($res_price);
        
        $d_subtotal = $row_p['p_price'] * $qty; // คำนวณราคารวมของชิ้นนั้น

        // บันทึกลงตาราง order_details
        $sql_detail = "INSERT INTO order_details (o_id, p_id, d_qty, d_subtotal) 
                       VALUES ('$o_id', '$p_id', '$qty', '$d_subtotal')";
        mysqli_query($conn, $sql_detail);
    }

    // 5. เมื่อบันทึกครบทุกอย่างแล้ว ให้ล้างตะกร้าสินค้า
    unset($_SESSION['cart']);

    // 6. แจ้งเตือนและส่งผู้ใช้ไปหน้าประวัติการสั่งซื้อ
    echo "<script>";
    echo "alert('บันทึกการสั่งซื้อเรียบร้อยแล้ว 🐒');";
    echo "window.location='order_history.php';"; 
    echo "</script>";

} else {
    // กรณีบันทึกหัวบิลไม่สำเร็จ
    echo "<script>";
    echo "alert('เกิดข้อผิดพลาดในการบันทึกข้อมูล กรุณาลองใหม่');";
    echo "window.history.back();";
    echo "</script>";
}

mysqli_close($conn);
?>