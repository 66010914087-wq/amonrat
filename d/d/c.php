<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>อมรรัตน์ ทองอินทา(หมิว)</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
    /* สไตล์เพิ่มเติมสำหรับสีที่ชอบ */
    .color-box {
        display: inline-block;
        width: 30px;
        height: 30px;
        border: 1px solid #ccc;
        margin-left: 5px;
        vertical-align: middle;
    }
    /* จัดการช่องแสดงผลลัพธ์ */
    .result-box {
        padding: 15px;
        border-radius: 5px;
        background-color: #f8f9fa; /* Light grey background */
        border: 1px solid #e9ecef;
    }
</style>
</head>

<body>
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h1><i class="bi bi-person-fill-add me-2"></i>ฟอร์มสมัครสมาชิก</h1>
            <p class="mb-0">-- อมรรัตน์ ทองอินทา(หมิว) --</p>
        </div>
        <div class="card-body">
            
            <form method="post" action="">
                
                <div class="mb-3">
                    <label for="fullname" class="form-label">ชื่อ-สกุล <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="fullname" name="fullname" required autofocus>
                </div>
                
                <div class="mb-3">
                    <label for="phone" class="form-label">เบอร์โทร <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
                
                <div class="mb-3">
                    <label for="height" class="form-label">ความสูง (ซม.) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="height" name="height" min="100" max="220" required>
                </div>

                <div class="mb-3">
                    <label for="color" class="form-label">สีที่ชอบ</label>
                    <input type="color" class="form-control form-control-color" id="color" name="color" value="#563d7c" title="เลือกสี">
                </div>
                
                <div class="mb-3">
                    <label for="major" class="form-label">สาขาวิชา</label>
                    <select class="form-select" id="major" name="major">
                        <option value="การบัญชี">การบัญชี</option>
                        <option value="การจัดการ">การจัดการ</option>
                        <option value="การตลาด">การตลาด</option>
                        <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
                    </select>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-center mt-4">
                    <button type="submit" name="submit" class="btn btn-success me-md-2">
                        <i class="bi bi-person-check-fill me-1"></i> สมัครสมาชิก
                    </button>
                    <button type="reset" class="btn btn-outline-danger me-md-2">
                        <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
                    </button>
                    <button type="button" onClick="window.location='https://www.msu.ac.th';" class="btn btn-info text-white me-md-2">
                        <i class="bi bi-globe me-1"></i> go to MSU
                    </button>
                    <button type="button" onClick="window.print();" class="btn btn-secondary">
                        <i class="bi bi-printer-fill me-1"></i> พิมพ์
                    </button>
                </div>

            </form>
        </div>
    </div>

    <hr class="my-5">

    <?php
    if(isset($_POST['submit'])){
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $height = $_POST['height'];
        $color = $_POST['color'];
        $major = $_POST['major'];
        
        echo '<div class="card border-success mb-3">';
        echo '<div class="card-header bg-success text-white"><h4><i class="bi bi-check-circle-fill me-2"></i>ผลลัพธ์การสมัครสมาชิก</h4></div>';
        echo '<div class="card-body">';
        echo '<p><strong>ชื่อ-สกุล:</strong> ' . htmlspecialchars($fullname) . '</p>'; 
        echo '<p><strong>เบอร์โทร:</strong> ' . htmlspecialchars($phone) . '</p>';
        echo '<p><strong>ความสูง:</strong> ' . htmlspecialchars($height) . ' ซม.</p>';
        echo '<p class="d-flex align-items-center"><strong>สีที่ชอบ:</strong> ' . htmlspecialchars($color) . ' <span class="color-box" style="background-color: ' . htmlspecialchars($color) . ';"></span></p>';
        echo '<p><strong>สาขาวิชา:</strong> ' . htmlspecialchars($major) . '</p>';
        echo '</div>';
        echo '</div>';
    }
    ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>