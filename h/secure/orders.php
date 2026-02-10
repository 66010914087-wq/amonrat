<?php
    // เรียกใช้ไฟล์ตรวจสอบ Login
    include_once("check_login.php");
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการออเดอร์ - Admin Dashboard</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background-color: #f5f7fa;
        }
        
        /* Sidebar Styling (คงเดิมเพื่อให้เหมือนหน้าอื่น) */
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
        
        /* Active State */
        .sidebar .nav-link.active {
            background-color: #e7f1ff;
            color: #0d6efd;
            font-weight: 600;
        }
        
        .sidebar .nav-link i {
            font-size: 1.2rem;
            margin-right: 15px;
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
                    
                    <a href="index2.php" class="nav-link">
                        <i class="bi bi-grid-1x2"></i> แดชบอร์ด
                    </a>
                    
                    <a href="product.php" class="nav-link">
                        <i class="bi bi-box-seam"></i> จัดการสินค้า
                    </a>
                    
                    <a href="orders.php" class="nav-link active">
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
                    <h1 class="h3 fw-bold text-dark">รายการคำสั่งซื้อ (Orders)</h1>
                </div>

                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body">
                        
                        <div class="row mb-3 g-2">
                            <div class="col-md-3">
                                <select class="form-select bg-light">
                                    <option selected>สถานะทั้งหมด</option>
                                    <option value="1">รอชำระเงิน</option>
                                    <option value="2">ชำระแล้ว/กำลังเตรียมของ</option>
                                    <option value="3">จัดส่งแล้ว</option>
                                    <option value="0">ยกเลิก</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-search"></i></span>
                                    <input type="text" class="form-control border-start-0 bg-light" placeholder="ค้นหาเลขที่ออเดอร์ หรือ ชื่อลูกค้า...">
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#เลขที่คำสั่งซื้อ</th>
                                        <th scope="col">ชื่อลูกค้า</th>
                                        <th scope="col">วันที่สั่งซื้อ</th>
                                        <th scope="col">ยอดรวม</th>
                                        <th scope="col">สถานะ</th>
                                        <th scope="col" class="text-end">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="fw-bold text-primary">ORD-00105</td>
                                        <td>คุณสมหญิง รักดี</td>
                                        <td>25 ต.ค. 66 <small class="text-muted">10:30 น.</small></td>
                                        <td class="fw-bold">1,250 ฿</td>
                                        <td><span class="badge bg-warning text-dark"><i class="bi bi-hourglass-split me-1"></i>รอชำระเงิน</span></td>
                                        <td class="text-end">
                                            <button class="btn btn-sm btn-outline-primary me-1" title="ดูรายละเอียด"><i class="bi bi-eye"></i></button>
                                            <button class="btn btn-sm btn-outline-danger" title="ยกเลิก"><i class="bi bi-x-circle"></i></button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="fw-bold text-primary">ORD-00104</td>
                                        <td>คุณมานะ อดทน</td>
                                        <td>24 ต.ค. 66 <small class="text-muted">14:15 น.</small></td>
                                        <td class="fw-bold">590 ฿</td>
                                        <td><span class="badge bg-info"><i class="bi bi-box-seam me-1"></i>เตรียมจัดส่ง</span></td>
                                        <td class="text-end">
                                            <button class="btn btn-sm btn-outline-primary me-1" title="ดูรายละเอียด"><i class="bi bi-eye"></i></button>
                                            <button class="btn btn-sm btn-success" title="แจ้งเลขพัสดุ"><i class="bi bi-truck"></i></button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="fw-bold text-primary">ORD-00103</td>
                                        <td>คุณวิชัย ใจดี</td>
                                        <td>23 ต.ค. 66 <small class="text-muted">09:00 น.</small></td>
                                        <td class="fw-bold">2,400 ฿</td>
                                        <td><span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>จัดส่งแล้ว</span></td>
                                        <td class="text-end">
                                            <button class="btn btn-sm btn-outline-primary me-1" title="ดูรายละเอียด"><i class="bi bi-eye"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <nav aria-label="Page navigation" class="mt-3">
                            <ul class="pagination justify-content-end">
                                <li class="page-item disabled"><a class="page-link" href="#">ก่อนหน้า</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">ถัดไป</a></li>
                            </ul>
                        </nav>

                    </div>
                </div>

            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>