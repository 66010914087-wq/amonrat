<?php
    include_once("check_login.php"); 
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>หน้าหลักแอดมิน - Dashboard</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background-color: #f5f7fa;
        }
        
        /* Sidebar Styling */
        .sidebar {
            background-color: #ffffff;
            min-height: 100vh;
            box-shadow: 0 0 15px rgba(0,0,0,0.05);
            z-index: 100;
        }
        
        .sidebar .nav-link {
            color: #6c757d;
            font-weight: 500;
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }
        
        .sidebar .nav-link:hover {
            background-color: #f8f9fa;
            color: #0d6efd;
            transform: translateX(5px);
        }
        
        /* เมนูที่กำลังใช้งานอยู่ (Active) */
        .sidebar .nav-link.active {
            background-color: #e7f1ff;
            color: #0d6efd;
            font-weight: 600;
        }
        
        .sidebar .nav-link i {
            font-size: 1.2rem;
            margin-right: 15px;
        }

        /* Stat Cards Styling */
        .stat-card {
            border: none;
            border-radius: 15px;
            transition: transform 0.3s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        }
        .icon-box {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-primary" href="#">
                <i class="bi bi-ui-checks-grid me-2"></i>Admin System
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center text-dark" href="#" role="button" data-bs-toggle="dropdown">
                            <div class="bg-primary text-white rounded-circle me-2 d-flex justify-content-center align-items-center" style="width: 35px; height: 35px;">
                                <i class="bi bi-person"></i>
                            </div>
                            <span>คุณ <?php echo isset($_SESSION['aname']) ? $_SESSION['aname'] : 'Admin'; ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow mt-2">
                            <li><a class="dropdown-item text-danger" href="logout.php"><i class="bi bi-box-arrow-right me-2"></i>ออกจากระบบ</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            
            <div class="col-md-3 col-lg-2 d-md-block sidebar collapse pt-4 px-3">
                <div class="nav flex-column">
                    <small class="text-uppercase text-muted fw-bold mb-2 ms-2" style="font-size: 0.75rem;">Main Menu</small>
                    
                    <a href="index2.php" class="nav-link active">
                        <i class="bi bi-grid-1x2"></i> แดชบอร์ด
                    </a>
                    
                    <a href="product.php" class="nav-link">
                        <i class="bi bi-box-seam"></i> จัดการสินค้า
                    </a>
                    
                    <a href="orders.php" class="nav-link">
                        <i class="bi bi-cart-check"></i> จัดการออเดอร์
                    </a>
                    
                    <a href="customers.php" class="nav-link">
                        <i class="bi bi-people"></i> ข้อมูลลูกค้า
                    </a>
                    
                    <small class="text-uppercase text-muted fw-bold mb-2 ms-2 mt-4" style="font-size: 0.75rem;">System</small>
                    <a href="logout.php" class="nav-link text-danger">
                        <i class="bi bi-power"></i> ออกจากระบบ
                    </a>
                </div>
            </div>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-4 pb-5">
                
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-4 border-bottom">
                    <h1 class="h3 fw-bold text-dark">ภาพรวมระบบ (Dashboard)</h1>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-md-4">
                        <div class="card stat-card shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="text-muted mb-1">ยอดขายวันนี้</p>
                                        <h3 class="fw-bold mb-0">฿12,500</h3>
                                    </div>
                                    <div class="icon-box bg-primary bg-opacity-10 text-primary">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card stat-card shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="text-muted mb-1">ออเดอร์ใหม่</p>
                                        <h3 class="fw-bold mb-0">15 <span class="fs-6 text-muted fw-normal">รายการ</span></h3>
                                    </div>
                                    <div class="icon-box bg-warning bg-opacity-10 text-warning">
                                        <i class="bi bi-basket"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card stat-card shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="text-muted mb-1">ลูกค้าทั้งหมด</p>
                                        <h3 class="fw-bold mb-0">1,204 <span class="fs-6 text-muted fw-normal">คน</span></h3>
                                    </div>
                                    <div class="icon-box bg-success bg-opacity-10 text-success">
                                        <i class="bi bi-people"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 fw-bold"><i class="bi bi-clock-history me-2"></i>รายการล่าสุด</h5>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info" role="alert">
                            ส่วนนี้สามารถใส่ตารางรายการออเดอร์ล่าสุด หรือกราฟสรุปยอดขายได้
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>#Order ID</th>
                                        <th>ลูกค้า</th>
                                        <th>วันที่</th>
                                        <th>ยอดรวม</th>
                                        <th>สถานะ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#ORD-001</td>
                                        <td>คุณสมชาย</td>
                                        <td>20 ต.ค. 66</td>
                                        <td>1,500 บ.</td>
                                        <td><span class="badge bg-success">สำเร็จ</span></td>
                                    </tr>
                                    <tr>
                                        <td>#ORD-002</td>
                                        <td>คุณสมหญิง</td>
                                        <td>20 ต.ค. 66</td>
                                        <td>890 บ.</td>
                                        <td><span class="badge bg-warning text-dark">รอชำระ</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>