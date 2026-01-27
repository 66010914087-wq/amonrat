<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>ฟอร์มสมัครงาน - อมรรัตน์ ทองอินทา(หมิว).</title>

<!-- Bootstrap 5.3 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background-color: #ffe6f2; /* ชมพูอ่อน */
    }
    .card-header {
        background: linear-gradient(90deg, #ff6fa8, #ff9fcf);
        color: white;
    }
    .btn-pink {
        background-color: #ff6fa8;
        color: white;
    }
    .btn-pink:hover {
        background-color: #ff4f95;
        color: white;
    }
    .form-control, .form-select {
        border-radius: 10px;
    }
    .card {
        border-radius: 15px;
    }
</style>
</head>

<body>

<div class="container mt-5">

    <div class="card shadow-lg">
        <div class="card-header text-center">
            <h3 class="m-0">ฟอร์มสมัครงาน - อมรรัตน์ ทองอินทา(หมิว)</h3>
            <small>บริษัท MSU.</small>
        </div>

        <div class="card-body bg-white">

            <form method="post" action="" class="row g-3">

                <!-- ตำแหน่งงาน -->
                <div class="col-md-6">
                    <label class="form-label">ตำแหน่งที่ต้องการสมัคร *</label>
                    <select name="position" required class="form-select">
                        <option value="">-- เลือกตำแหน่งงาน --</option>
                        <option value="Graphic Designer">Graphic Designer</option>
                        <option value="Digital Marketing">Digital Marketing</option>
                        <option value="HR Officer">HR Officer</option>
                        <option value="Accountant">Accountant</option>
                        <option value="Frontend Developer">Frontend Developer</option>
                    </select>
                </div>

                <!-- คำนำหน้า -->
                <div class="col-md-3">
                    <label class="form-label">คำนำหน้า *</label>
                    <select name="prefix" required class="form-select">
                        <option value="นาย">นาย</option>
                        <option value="นาง">นาง</option>
                        <option value="นางสาว">นางสาว</option>
                    </select>
                </div>

                <!-- ชื่อ-สกุล -->
                <div class="col-md-9">
                    <label class="form-label">ชื่อ - สกุล *</label>
                    <input type="text" name="fullname" required class="form-control">
                </div>

                <!-- วันเดือนปีเกิด -->
                <div class="col-md-4">
                    <label class="form-label">วันเดือนปีเกิด *</label>
                    <input type="date" name="birthday" required class="form-control">
                </div>

                <!-- ระดับการศึกษา -->
                <div class="col-md-4">
                    <label class="form-label">ระดับการศึกษา *</label>
                    <select name="education" required class="form-select">
                        <option>มัธยมศึกษา</option>
                        <option>ประกาศนียบัตรวิชาชีพ (ปวช.)</option>
                        <option>ประกาศนียบัตรวิชาชีพชั้นสูง (ปวส.)</option>
                        <option>ปริญญาตรี</option>
                        <option>ปริญญาโท</option>
                        <option>อื่นๆ</option>
                    </select>
                </div>

                <!-- ความสามารถพิเศษ -->
                <div class="col-md-12">
                    <label class="form-label">ความสามารถพิเศษ</label>
                    <textarea name="skills" rows="3" class="form-control" placeholder="ระบุความสามารถพิเศษ เช่น การออกแบบกราฟิก, การตัดต่อวิดีโอ, การพูดต่อหน้าชุมชน"></textarea>
                </div>

                <!-- ประสบการณ์ทำงาน -->
                <div class="col-md-12">
                    <label class="form-label">ประสบการณ์ทำงาน</label>
                    <textarea name="experience" rows="3" class="form-control" placeholder="เช่น เคยทำงานตำแหน่ง Digital Marketing ที่บริษัท..."></textarea>
                </div>

                <!-- อื่น ๆ -->
                <div class="col-md-12">
                    <label class="form-label">ข้อมูลอื่น ๆ เพิ่มเติม</label>
                    <textarea name="other" rows="3" class="form-control" placeholder="เช่น สามารถเริ่มงานได้ทันที / สามารถทำงานต่างจังหวัดได้"></textarea>
                </div>

                <!-- ปุ่ม -->
                <div class="col-12 text-center mt-4">
                    <button type="submit" name="submit" class="btn btn-pink px-4">ส่งใบสมัคร</button>
                    <button type="reset" class="btn btn-secondary px-4">ล้างข้อมูล</button>
                </div>

            </form>
        </div>
    </div>

    <hr class="my-4">

    <!-- PHP แสดงผล -->
    <?php
    if(isset($_POST['submit'])){
        echo '<div class="card shadow-sm mt-4"><div class="card-body">';
        echo "<h4 class='text-center' style='color:#ff4f95;'>ข้อมูลใบสมัครงาน</h4>";

        echo "<p><strong>ตำแหน่งที่สมัคร:</strong> " . $_POST['position'] . "</p>";
        echo "<p><strong>ชื่อ - สกุล:</strong> " . $_POST['prefix']." ".$_POST['fullname'] . "</p>";
        echo "<p><strong>วันเดือนปีเกิด:</strong> " . $_POST['birthday'] . "</p>";
        echo "<p><strong>ระดับการศึกษา:</strong> " . $_POST['education'] . "</p>";
        echo "<p><strong>ความสามารถพิเศษ:</strong> " . nl2br($_POST['skills']) . "</p>";
        echo "<p><strong>ประสบการณ์ทำงาน:</strong> " . nl2br($_POST['experience']) . "</p>";
        echo "<p><strong>ข้อมูลอื่น ๆ:</strong> " . nl2br($_POST['other']) . "</p>";

        echo "</div></div>";
    }
    ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


