<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>สมัครสมาชิก - อมรรัตน์ ทองอินทา (หมิว)</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 0;
        }
        .main-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            overflow: hidden;
        }
        .card-header-custom {
            background: linear-gradient(45deg, #1e3c72, #2a5298);
            color: white;
            padding: 30px 20px;
            text-align: center;
        }
        .form-floating > label {
            padding-left: 20px;
        }
        .form-control:focus, .form-select:focus {
            border-color: #764ba2;
            box-shadow: 0 0 0 0.25rem rgba(118, 75, 162, 0.25);
        }
        .btn-custom-primary {
            background: linear-gradient(45deg, #11998e, #38ef7d);
            border: none;
            color: white;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-custom-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(56, 239, 125, 0.4);
            color: white;
        }
        .result-box {
            background-color: #f8f9fa;
            border-left: 5px solid #764ba2;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
            animation: fadeIn 0.5s ease-in-out;
        }
        .color-preview {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: inline-block;
            vertical-align: middle;
            border: 2px solid #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            margin-left: 10px;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card main-card">
                
                <div class="card-header-custom">
                    <h2 class="mb-0"><i class="fa-solid fa-user-plus me-2"></i>ฟอร์มสมัครสมาชิก</h2>
                    <p class="mb-0 opacity-75 mt-2"> อมรรัตน์ ทองอินทา (หมิว)</p>
                </div>

                <div class="card-body p-4 p-md-5">
                    <form method="post" action="">
                        
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-pill ps-4" id="fullname" name="fullname" placeholder="ชื่อ-สกุล" required autofocus>
                            <label for="fullname"><i class="fa-solid fa-user me-2 text-muted"></i>ชื่อ-นามสกุล</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control rounded-pill ps-4" id="phone" name="phone" placeholder="เบอร์โทรศัพท์" required>
                            <label for="phone"><i class="fa-solid fa-phone me-2 text-muted"></i>เบอร์โทรศัพท์</label>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control rounded-pill ps-4" id="height" name="height" min="100" max="220" placeholder="ความสูง" required>
                                    <label for="height"><i class="fa-solid fa-ruler-vertical me-2 text-muted"></i>ความสูง (ซม.)</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center border rounded-pill p-1 ps-3 h-100" style="background-color: #fff;">
                                    <label for="color" class="text-muted me-3 mb-0"><i class="fa-solid fa-palette me-2"></i>สีที่ชอบ</label>
                                    <input type="color" class="form-control form-control-color border-0 bg-transparent" id="color" name="color" value="#563d7c" title="เลือกสีที่ชอบ">
                                </div>
                            </div>
                        </div>

                        <div class="form-floating mb-4">
                            <select class="form-select rounded-pill ps-4" id="major" name="major">
                                <option value="การบัญชี">การบัญชี</option>
                                <option value="การจัดการ">การจัดการ</option>
                                <option value="การตลาด">การตลาด</option>
                                <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
                            </select>
                            <label for="major"><i class="fa-solid fa-graduation-cap me-2 text-muted"></i>สาขาวิชา</label>
                        </div>

                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" name="Submit" class="btn btn-custom-primary btn-lg rounded-pill shadow-sm">
                                <i class="fa-solid fa-check-circle me-2"></i>สมัครสมาชิก
                            </button>
                        </div>

                        <div class="row g-2">
                            <div class="col-4">
                                <button type="reset" class="btn btn-outline-secondary w-100 rounded-pill">
                                    <i class="fa-solid fa-rotate-left me-1"></i> รีเซ็ต
                                </button>
                            </div>
                            <div class="col-4">
                                <button type="button" class="btn btn-outline-info w-100 rounded-pill" onClick="window.location='https://www.msu.ac.th';">
                                    <i class="fa-solid fa-globe me-1"></i> เว็บ MSU
                                </button>
                            </div>
                            <div class="col-4">
                                <button type="button" class="btn btn-outline-dark w-100 rounded-pill" onClick="window.print();">
                                    <i class="fa-solid fa-print me-1"></i> พิมพ์
                                </button>
                            </div>
                        </div>

                    </form>

                    <?php
                    if(isset($_POST['Submit'])){
                      
    				include_once "connectdb.php";

    					$fullname = htmlspecialchars($_POST['fullname']);
  					    $phone    = htmlspecialchars($_POST['phone']);
   					    $height   = htmlspecialchars($_POST['height']);
    					$color    = htmlspecialchars($_POST['color']);
    					$major    = htmlspecialchars($_POST['major']);

    					$sql = "INSERT INTO register (r_name, r_phone, r_height, r_color, r_major)
            			VALUES ('$fullname', '$phone', '$height', '$color', '$major')";

    					mysqli_query($conn, $sql) or die(mysqli_error($conn));

   						 echo "<script>alert('เพิ่มข้อมูลสำเร็จ');</script>";

                        
                        echo "<div class='result-box shadow-sm'>";
                        echo "<h5 class='text-primary mb-3'><i class='fa-solid fa-file-invoice me-2'></i>ข้อมูลการสมัคร</h5>";
                        echo "<p class='mb-1'><strong>ชื่อ-นามสกุล:</strong> " .$fullname. "</p>";
                        echo "<p class='mb-1'><strong>เบอร์โทร:</strong> " .$phone. "</p>";
                        echo "<p class='mb-1'><strong>ความสูง:</strong> " .$height. " ซม.</p>";
                        echo "<p class='mb-1 d-flex align-items-center'><strong>สีที่ชอบ:</strong> <span class='color-preview' style='background-color:{$color};'></span> <span class='ms-2 text-muted small'>($color)</span></p>";
                        echo "<p class='mb-0'><strong>สาขาวิชา:</strong> <span class='badge bg-info text-dark'>" .$major. "</span></p>";
                        echo "</div>";
						
						
                    }
                    ?>

                </div>
            </div>
            
            <div class="text-center mt-4 text-white opacity-75 small">
                &copy; 2024 Design by Rapeepong
            </div>
            
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>