<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>อมรรัตน์ ทองอินทา(หมิว)</title>

<!-- Bootstrap 5.3 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background-color: #ffe6f2; /* ชมพูอ่อน */
    }
    .card-header {
        background: linear-gradient(90deg, #ff77a9, #ff9fc5);
    }
    .btn-pink {
        background-color: #ff77a9;
        color: white;
    }
    .btn-pink:hover {
        background-color: #ff5e98;
        color: white;
    }
    .btn-soft {
        background-color: #ffcce0;
        color: #333;
    }
    .btn-soft:hover {
        background-color: #ffb3d1;
        color: #333;
    }
</style>
</head>

<body>

<div class="container mt-5">

    <div class="card shadow-lg border-0">
        <div class="card-header text-white">
            <h3 class="m-0">ฟอร์มสมัครสมาชิก — อมรรัตน์ ทองอินทา (หมิว)</h3>
        </div>

        <div class="card-body bg-white">
            <form method="post" action="" class="row g-3">

                <!-- ชื่อ -->
                <div class="col-md-6">
                    <label class="form-label">ชื่อ - สกุล *</label>
                    <input type="text" name="fullname" required autofocus class="form-control">
                </div>

                <!-- เบอร์โทร -->
                <div class="col-md-6">
                    <label class="form-label">เบอร์โทร *</label>
                    <input type="text" name="phone" required class="form-control">
                </div>

                <!-- ความสูง -->
                <div class="col-md-4">
                    <label class="form-label">ความสูง (ซม.) *</label>
                    <input type="number" name="height" min="100" max="220" required class="form-control">
                </div>

                <!-- สีที่ชอบ -->
                <div class="col-md-4">
                    <label class="form-label">สีที่ชอบ</label>
                    <input type="color" name="color" class="form-control form-control-color">
                </div>

                <!-- สาขาวิชา -->
                <div class="col-md-4">
                    <label class="form-label">สาขาวิชา</label>
                    <select name="major" class="form-select">
                        <option value="การบัญชี">การบัญชี</option>
                        <option value="การจัดการ">การจัดการ</option>
                        <option value="การตลาด">การตลาด</option>
                        <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
                    </select>
                </div>

                <!-- ปุ่ม -->
                <div class="col-12 mt-3">
                    <button type="submit" name="submit" class="btn btn-pink">สมัครสมาชิก</button>
                    <button type="reset" class="btn btn-soft">Reset</button>
                    <button type="button" class="btn btn-soft" onclick="window.location='https://www.msu.ac.th';">Go to MSU</button>
                    <button type="button" class="btn btn-secondary" onclick="window.print();">พิมพ์</button>
                </div>

            </form>
        </div>
    </div>

    <hr class="my-4">

    <!-- PHP แสดงผล -->
    <div class="card shadow-sm border-0">
        <div class="card-body bg-white">
            <?php
            if(isset($_POST['submit'])){
                $fullname = $_POST['fullname'];
                $phone = $_POST['phone'];
                $height = $_POST['height'];
                $color = $_POST['color'];
                $major = $_POST['major'];

                echo "<h4 class='text-pink'>ผลลัพธ์การสมัครสมาชิก</h4>";
                echo "<p><strong>ชื่อ-สกุล:</strong> {$fullname}</p>";
                echo "<p><strong>เบอร์โทร:</strong> {$phone}</p>";
                echo "<p><strong>ความสูง:</strong> {$height} ซม.</p>";
                echo "<p><strong>สีที่ชอบ:</strong> {$color}</p>";
                echo "<div style='width:50px; height:25px; background:{$color}; border:1px solid #333;'></div>";
                echo "<p class='mt-2'><strong>สาขาวิชา:</strong> {$major}</p>";
            }
            ?>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>


