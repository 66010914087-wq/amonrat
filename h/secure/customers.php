<?php
    // เรียกใช้ไฟล์ตรวจสอบ Login
    include_once("check_login.php");
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการลูกค้า - Admin Dashboard</title>
    
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
        
        .sidebar .nav-link.active {
            background-color: #e7f1ff;
            color: #0d6efd;
            font-weight: 600;
        }
        
        .sidebar .nav-link i {
            font-size: 1.2rem;
            margin-right: 15px;
        }

        /* Customer Avatar */
        .avatar-circle {
            width: 45px;
            height: 45px;
            background-color: #e9ecef;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #495057;
            margin-right: 10px;
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
                    
                    <a href="orders.php" class="nav-link">
                        <i class="bi bi-cart-check"></i> จัดการออเดอร์
                    </a>
                    
                    <a href="customers.php" class="nav-link active">
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
                    <h1 class="h3 fw-bold text-dark">ข้อมูลลูกค้า (Customers)</h1>
                    </div>

                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body">
                        
                        <div class="row mb-3 justify-content-end">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-search"></i></span>
                                    <input type="text" class="form-control border-start-0 bg-light" placeholder="ค้นหาชื่อ, เบอร์โทร หรือ Email...">
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">ชื่อ-นามสกุล</th>
                                        <th scope="col">ข้อมูลติดต่อ</th>
                                        <th scope="col">ที่อยู่จัดส่ง</th>
                                        <th scope="col">วันที่สมัคร</th>
                                        <th scope="col" class="text-end">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-circle bg-primary text-white">ส</div>
                                                <div>
                                                    <div class="fw-bold">คุณสมชาย ใจดี</div>
                                                    <small class="text-muted">Username: somchai01</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div><i class="bi bi-phone me-1 text-muted"></i> 081-234-5678</div>
                                            <small class="text-muted"><i class="bi bi-envelope me-1"></i> somchai@email.com</small>
                                        </td>
                                        <td>
                                            <span class="d-inline-block text-truncate" style="max-width: 200px;">
                                                123 ถ.สุขุมวิท แขวงคลองตัน เขตคลองเตย กทม. 10110
                                            </span>
                                        </td>
                                        <td>15 ต.ค. 66</td>
                                        <td class="text-end">
                                            <button class="btn btn-sm btn-outline-info me-1" title="ดูประวัติการสั่งซื้อ">
                                                <i class="bi bi-clock-history"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-warning me-1" title="แก้ไข">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" title="ลบ/แบน" onclick="return confirm('ต้องการลบข้อมูลลูกค้านี้ใช่หรือไม่?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://ui-avatars.com/api/?name=Wipa+Rat&background=random" class="rounded-circle me-2" width="45" height="45">
                                                <div>
                                                    <div class="fw-bold">คุณวิภา รัตนากร</div>
                                                    <small class="text-muted">Username: wipa.rat</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div><i class="bi bi-phone me-1 text-muted"></i> 099-888-7777</div>
                                            <small class="text-muted"><i class="bi bi-envelope me-1"></i> wipa@email.com</small>
                                        </td>
                                        <td>
                                            <span class="d-inline-block text-truncate" style="max-width: 200px;">
                                                55/8 หมู่บ้านจัดสรร ต.ในเมือง อ.เมือง จ.ขอนแก่น
                                            </span>
                                        </td>
                                        <td>20 ต.ค. 66</td>
                                        <td class="text-end">
                                            <button class="btn btn-sm btn-outline-info me-1" title="ดูประวัติการสั่งซื้อ">
                                                <i class="bi bi-clock-history"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-warning me-1" title="แก้ไข">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" title="ลบ/แบน" onclick="return confirm('ต้องการลบข้อมูลลูกค้านี้ใช่หรือไม่?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
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