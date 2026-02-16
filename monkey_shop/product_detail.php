<?php 
session_start(); 
include('condb.php'); 

$p_id = mysqli_real_escape_string($conn, $_GET['id']); 

$sql = "SELECT p.*, c.cat_name 
        FROM products p 
        LEFT JOIN categories c ON p.cat_id = c.cat_id 
        WHERE p.p_id = $p_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if(!$row) { header("Location: index.php"); exit; }
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['p_name']; ?> - Monkey Shop 🐒</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #f1c40f;
            --secondary-color: #2c3e50;
            --text-muted: #7f8c8d;
        }
        body { font-family: 'Kanit', sans-serif; background-color: #f8f9fa; margin: 0; color: var(--secondary-color); }
        
        .container { max-width: 1100px; margin: 40px auto; padding: 0 20px; }
        
        /* Breadcrumb เส้นทางบอกตำแหน่ง */
        .breadcrumb { margin-bottom: 20px; font-size: 0.9rem; color: var(--text-muted); }
        .breadcrumb a { color: var(--text-muted); text-decoration: none; }
        .breadcrumb a:hover { color: var(--primary-color); }

        .product-wrapper { 
            background: white; 
            display: grid; 
            grid-template-columns: 1fr 1fr; 
            gap: 40px; 
            padding: 40px; 
            border-radius: 20px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.05); 
        }

        /* รูปภาพสินค้า */
        .product-image-section { text-align: center; }
        .product-image-section img { 
            width: 100%; 
            max-width: 450px; 
            border-radius: 15px; 
            transition: transform 0.3s ease;
        }
        .product-image-section img:hover { transform: scale(1.02); }

        /* ข้อมูลสินค้า */
        .product-info-section { display: flex; flex-direction: column; }
        .cat-badge { 
            background: #fef9e7; 
            color: #d4ac0d; 
            padding: 5px 15px; 
            border-radius: 50px; 
            font-size: 0.85rem; 
            width: fit-content;
            margin-bottom: 15px;
            font-weight: 600;
        }
        h1 { font-size: 2.2rem; margin: 0 0 15px 0; line-height: 1.2; }
        .price-tag { font-size: 2.5rem; color: #e74c3c; font-weight: 600; margin-bottom: 25px; }
        .price-tag span { font-size: 1.2rem; color: var(--text-muted); }

        .description-box { 
            border-top: 1px solid #eee; 
            padding-top: 20px; 
            margin-bottom: 30px; 
            line-height: 1.8; 
            color: #555;
        }
        .description-title { font-weight: 600; margin-bottom: 10px; display: block; color: var(--secondary-color); }

        /* ปุ่มสั่งซื้อ */
        .action-buttons { display: flex; gap: 15px; }
        .btn-add-cart { 
            flex: 2;
            background: var(--primary-color); 
            color: var(--secondary-color); 
            padding: 18px; 
            text-decoration: none; 
            border-radius: 12px; 
            font-weight: 600; 
            text-align: center; 
            font-size: 1.1rem;
            box-shadow: 0 4px 15px rgba(241, 196, 15, 0.3);
            transition: all 0.3s ease;
        }
        .btn-add-cart:hover { background: #d4ac0d; transform: translateY(-3px); box-shadow: 0 6px 20px rgba(241, 196, 15, 0.4); }
        
        .btn-back { 
            flex: 1;
            background: #fff; 
            color: var(--secondary-color); 
            padding: 18px; 
            text-decoration: none; 
            border-radius: 12px; 
            border: 1px solid #ddd;
            text-align: center;
            transition: all 0.3s;
        }
        .btn-back:hover { background: #f8f8f8; }

        /* Responsive สำหรับมือถือ */
        @media (max-width: 768px) {
            .product-wrapper { grid-template-columns: 1fr; padding: 20px; }
            h1 { font-size: 1.8rem; }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="breadcrumb">
        <a href="index.php">หน้าแรก</a> / 
        <a href="index.php?cat_id=<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></a> / 
        <span><?php echo $row['p_name']; ?></span>
    </div>

    <div class="product-wrapper">
        <div class="product-image-section">
            <img src="p_img/<?php echo $row['p_img']; ?>" alt="<?php echo $row['p_name']; ?>">
        </div>

        <div class="product-info-section">
            <div class="cat-badge">📦 หมวดหมู่: <?php echo $row['cat_name']; ?></div>
            <h1><?php echo $row['p_name']; ?></h1>
            <div class="price-tag"><?php echo number_format($row['p_price'], 2); ?> <span>฿</span></div>
            
            <div class="description-box">
                <span class="description-title">รายละเอียดจาก Monkey Shop:</span>
                <?php echo nl2br($row['p_detail']); ?>
            </div>

            <div class="action-buttons">
                <a href="cart.php?p_id=<?php echo $row['p_id']; ?>&act=add" class="btn-add-cart">
                    🛒 ใส่ตะกร้าเลย!
                </a>
                <a href="index.php" class="btn-back">กลับไปดูของอื่น</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>