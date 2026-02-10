<?php
    session_start();
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login: อมรรัตน์ ทองอินทา (หมิว)</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background-color: #f0f2f5; /* สีพื้นหลังเทาอ่อนสบายตา */
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .login-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            background-color: white;
        }

        .login-header {
            background: linear-gradient(135deg, #0d6efd, #0dcaf0); /* ไล่สีฟ้า */
            color: white;
            padding: 30px 20px;
            text-align: center;
        }
        
        .icon-circle {
            width: 70px;
            height: 70px;
            background-color: rgba(255,255,255,0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px auto;
            font-size: 2.5rem;
        }

        .btn-login {
            border-radius: 50px;
            padding: 12px;
            font-weight: 500;
            font-size: 1.1rem;
            transition: all 0.3s;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(13, 110, 253, 0.3);
        }
    </style>
</head>

<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            <div class="card login-card">
                
                <div class="login-header">
                    <div class="icon-circle">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    <h4 class="mb-1">เข้าสู่ระบบหลังบ้าน</h4>
                    <p class="mb-0 small opacity-75">อมรรัตน์ ทองอินทา (หมิว)</p>
                </div>

                <div class="card-body p-4 p-md-5">
                    <form method="post" action="">
                        
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="auser" placeholder="Username" autofocus required>
                            <label for="floatingInput"><i class="bi bi-person me-2"></i>ชื่อผู้ใช้งาน</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingPassword" name="apwd" placeholder="Password" required>
                            <label for="floatingPassword"><i class="bi bi-key me-2"></i>รหัสผ่าน</label>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" name="Submit" class="btn btn-primary btn-login">
                                เข้าสู่ระบบ <i class="bi bi-box-arrow-in-right ms-1"></i>
                            </button>
                        </div>

                    </form>
                </div>
                
                <div class="card-footer text-center py-3 bg-light border-0">
                    <small class="text-muted">ระบบจัดการร้านค้าออนไลน์</small>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
if(isset($_POST['Submit'])){
    include_once("connectdb.php");
    
    $sql = "SELECT * FROM admin WHERE a_username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $_POST['auser']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if ($row = mysqli_fetch_assoc($result)) {
            
            // -----------------------------------------------------------
            // เลือกใช้วิธีใดวิธีหนึ่ง ตามข้อมูลใน Database ของคุณ
            // -----------------------------------------------------------

            // แบบ A: ถ้ารหัสใน DB เป็นตัวหนังสือปกติ (Plain Text) ให้ใช้บรรทัดนี้:
            // if ($_POST['apwd'] == $row['a_password']) {

            // แบบ B: ถ้ารหัสใน DB ถูกเข้ารหัส (Hash) แล้ว ให้ใช้บรรทัดนี้:
            if (password_verify($_POST['apwd'], $row['a_password'])) { 
            
            // -----------------------------------------------------------

                $_SESSION['aid'] = $row['a_id'];
                $_SESSION['aname'] = $row['a_name'];
                
                echo "<script>";
                echo "window.location='index2.php';";
                echo "</script>";
                
            } else {
                echo "<script>alert('รหัสผ่านไม่ถูกต้อง');</script>";
            }
            
        } else {
            echo "<script>alert('ไม่พบชื่อผู้ใช้งานนี้');</script>";
        }
        
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>