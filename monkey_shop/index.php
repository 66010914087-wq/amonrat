<?php 
session_start(); 
include('condb.php'); // ไฟล์เชื่อมต่อฐานข้อมูล
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Monkey Shop - แหล่งรวมไอเทมชาวลิง 🐒</title>
    <link rel="stylesheet" href="style.css"> <style>
        /* สไตล์คร่าวๆ */
        body { font-family: 'Kanit', sans-serif; margin: 0; background: #f8f9fa; }
        .navbar { background: #333; color: white; padding: 1rem; display: flex; justify-content: space-between; align-items: center; }
        .navbar a { color: white; text-decoration: none; margin: 0 10px; }
        .container { display: flex; padding: 20px; }
        .menu-left { width: 20%; background: white; padding: 15px; border-radius: 10px; height: fit-content; }
        .main-content { width: 80%; padding-left: 20px; }
        .product-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 20px; }
        .product-card { background: white; padding: 15px; border-radius: 10px; text-align: center; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .product-card img { width: 100%; height: 180px; object-fit: cover; border-radius: 5px; }
        .price { color: #e74c3c; font-size: 1.2rem; font-weight: bold; }
        .btn-detail { background: #f1c40f; color: black; padding: 8px 15px; border-radius: 5px; text-decoration: none; display: block; margin-top: 10px; }
    </style>
</head>
<body>

<nav class="navbar">
    <a href="index.php" style="font-size: 1.5rem; font-weight: bold;">Monkey Shop 🍌</a>
    <form action="index.php" method="GET">
        <input type="text" name="search" placeholder="ค้นหาสินค้า..." style="padding: 5px; border-radius: 3px; border: none;">
        <button type="submit">🔍</button>
    </form>
    <div>
        <?php if(isset($_SESSION['m_id'])) { ?>
            <a href="profile.php">สวัสดี, <?php echo $_SESSION['m_name']; ?></a>
            <a href="order_history.php">ประวัติสั่งซื้อ</a>
            <a href="logout.php" style="color: #ff7675;">ออกจากระบบ</a>
        <?php } else { ?>
            <a href="login.php">เข้าสู่ระบบ</a>
            <a href="register.php">สมัครสมาชิก</a>
        <?php } ?>
        <a href="cart.php">ตะกร้า (🛒)</a>
    </div>
</nav>

<div class="container">
    <aside class="menu-left">
        <h3>ประเภทสินค้า</h3>
        <ul style="list-style: none; padding: 0;">
            <li><a href="index.php" style="text-decoration:none; color:#333;">ทั้งหมด</a></li>
            <?php
            $q_type = mysqli_query($conn, "SELECT * FROM categories");
            while($t = mysqli_fetch_array($q_type)) {
                echo "<li style='margin-top:10px;'><a href='index.php?cat_id=".$t['cat_id']."' style='text-decoration:none; color:#555;'>- ".$t['cat_name']."</a></li>";
            }
            ?>
        </ul>
    </aside>

    <main class="main-content">
        <?php
        // เงื่อนไขการค้นหาและการแยกประเภท
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $cat_id = isset($_GET['cat_id']) ? $_GET['cat_id'] : '';

        $sql = "SELECT * FROM products WHERE p_name LIKE '%$search%' ";
        if($cat_id != '') { $sql .= " AND cat_id = '$cat_id' "; }
        $sql .= " ORDER BY p_id DESC";
        
        $res = mysqli_query($conn, $sql);
        ?>
        
        <h2><?php echo ($search != '') ? "ผลการค้นหา: $search" : "สินค้าแนะนำ"; ?></h2>
        <div class="product-grid">
            <?php while($p = mysqli_fetch_array($res)) { ?>
            <div class="product-card">
                <img src="p_img/<?php echo $p['p_img']; ?>" alt="">
                <h4><?php echo $p['p_name']; ?></h4>
                <p class="price"><?php echo number_format($p['p_price'], 2); ?> ฿</p>
                <a href="product_detail.php?id=<?php echo $p['p_id']; ?>" class="btn-detail">ดูรายละเอียด</a>
            </div>
            <?php } ?>
        </div>
    </main>
</div>

</body>
</html>