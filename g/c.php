<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pop Supermarket | Luxurious Dashboard</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #FF9A9E 0%, #FECFEF 99%, #FECFEF 100%);
            --header-gradient: linear-gradient(to right, #ff758c, #ff7eb3);
            --glass-bg: rgba(255, 255, 255, 0.85);
            --shadow-soft: 0 10px 40px rgba(255, 117, 140, 0.2);
        }

        body {
            font-family: 'Kanit', sans-serif;
            background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%); /* Fallback */
            background: linear-gradient(-45deg, #ff9a9e, #fad0c4, #fad0c4, #a18cd1);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite; /* พื้นหลังเคลื่อนไหว */
            min-height: 100vh;
            color: #555;
            padding-bottom: 50px;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .glass-container {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 25px;
            border: 1px solid rgba(255, 255, 255, 0.9);
            box-shadow: var(--shadow-soft);
            overflow: hidden;
            padding: 30px;
            margin-top: 50px;
        }

        h2.title-text {
            background: -webkit-linear-gradient(#ff758c, #ff7eb3);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* ตกแต่งตาราง */
        #supermarketTable {
            border-collapse: separate;
            border-spacing: 0 10px; /* เว้นระยะห่างระหว่างแถว */
        }

        #supermarketTable thead th {
            background: var(--header-gradient);
            color: white;
            border: none;
            padding: 15px;
            font-weight: 500;
            font-size: 1rem;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }
        
        #supermarketTable thead th:first-child { border-radius: 15px 0 0 15px; }
        #supermarketTable thead th:last-child { border-radius: 0 15px 15px 0; }

        #supermarketTable tbody tr {
            background-color: #fff;
            box-shadow: 0 5px 10px rgba(0,0,0,0.03);
            transition: all 0.3s ease;
            border-radius: 10px;
        }

        #supermarketTable tbody tr:hover {
            transform: translateY(-5px) scale(1.01); /* ลอยขึ้นเมื่อ Hover */
            box-shadow: 0 10px 20px rgba(255, 117, 140, 0.15);
            z-index: 10;
            position: relative;
        }

        #supermarketTable td {
            border: none;
            padding: 15px;
            vertical-align: middle;
            color: #666;
        }
        
        #supermarketTable td:first-child { border-radius: 10px 0 0 10px; }
        #supermarketTable td:last-child { border-radius: 0 10px 10px 0; }

        /* Badge ตกแต่งหมวดหมู่ */
        .cat-badge {
            background-color: #fff0f3;
            color: #ff477e;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            border: 1px solid #ffccd5;
            font-weight: 500;
        }

        /* Custom Search Box */
        .dataTables_filter input {
            border: 2px solid #ffccd5;
            border-radius: 20px;
            padding: 5px 15px;
            outline: none;
            transition: all 0.3s;
        }
        .dataTables_filter input:focus {
            border-color: #ff758c;
            box-shadow: 0 0 10px rgba(255, 117, 140, 0.2);
        }

        /* Pagination Buttons */
        .page-item.active .page-link {
            background-color: #ff758c;
            border-color: #ff758c;
            border-radius: 50%;
            color: white;
        }
        .page-link {
            color: #ff758c;
            border: none;
            margin: 0 2px;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .page-link:hover {
            background-color: #ffe5ec;
            color: #ff477e;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="glass-container">
        <div class="row mb-4 align-items-center">
            <div class="col-md-8">
                <h2 class="title-text"><i class="fas fa-shopping-basket me-2"></i> Pop Supermarket</h2>
                <p class="text-muted mb-0">ระบบจัดการข้อมูลยอดขายสุดปัง</p>
            </div>
            <div class="col-md-4 text-end">
                <button class="btn btn-light text-danger fw-bold rounded-pill px-4 shadow-sm">
                    <i class="fas fa-plus me-1"></i> เพิ่มข้อมูล
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table id="supermarketTable" class="table w-100">
                <thead>
                    <tr>
                        <th><i class="fas fa-hashtag"></i> ID</th>
                        <th><i class="fas fa-box-open"></i> ชื่อสินค้า</th>
                        <th><i class="fas fa-tags"></i> หมวดหมู่</th>
                        <th><i class="fas fa-calendar-alt"></i> วันที่</th>
                        <th><i class="fas fa-globe-asia"></i> ประเทศ</th>
                        <th class="text-end"><i class="fas fa-coins"></i> ยอดขาย (บาท)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // ตั้งค่าการเชื่อมต่อฐานข้อมูล (เปลี่ยนตรงนี้ให้ตรงกับเครื่องคุณ)
                    $conn = new mysqli("localhost", "root", "", "4087db"); 
                    $conn->set_charset("utf8mb4");

                    if ($conn->connect_error) {
                        echo "<tr><td colspan='6' class='text-center text-danger p-5'>❌ เชื่อมต่อฐานข้อมูลไม่สำเร็จ: ".$conn->connect_error."</td></tr>";
                    } else {
                        $sql = "SELECT * FROM popsupermarket ORDER BY p_date DESC";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td class='fw-bold text-secondary'>#" . $row["p_order_id"] . "</td>";
                                echo "<td class='fw-bold text-dark'>" . $row["p_product_name"] . "</td>";
                                echo "<td><span class='cat-badge'>" . $row["p_category"] . "</span></td>";
                                echo "<td>" . date('d M Y', strtotime($row["p_date"])) . "</td>";
                                echo "<td>" . $row["p_country"] . "</td>";
                                echo "<td class='text-end fw-bold' style='color:#ff477e;'>" . number_format($row["p_amount"], 2) . "</td>";
                                echo "</tr>";
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#supermarketTable').DataTable({
            "language": {
                "sProcessing":   "กำลังดำเนินการ...",
                "sLengthMenu":   "แสดง _MENU_ รายการ",
                "sZeroRecords":  "ไม่พบข้อมูล",
                "sInfo":         "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
                "sInfoEmpty":    "แสดง 0 ถึง 0 จาก 0 รายการ",
                "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกรายการ)",
                "sInfoPostFix":  "",
                "sSearch":       "<i class='fas fa-search text-secondary'></i> ค้นหา:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "หน้าแรก",
                    "sPrevious": "<",
                    "sNext":     ">",
                    "sLast":     "หน้าสุดท้าย"
                }
            },
            "pageLength": 10,
            "dom": '<"d-flex justify-content-between align-items-center mb-3"f>rt<"d-flex justify-content-between align-items-center mt-4"ip>'
        });
    });
</script>

</body>
</html>