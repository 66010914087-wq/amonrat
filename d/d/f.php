<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>ผลการสมัครงาน</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background-color: #ffe6f2;
    }
    .card {
        border-radius: 15px;
    }
    .card-header {
        background: linear-gradient(90deg, #ff6fa8, #ff9fcf);
        color: white;
    }
</style>
</head>

<body>

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header text-center">
            <h3 class="m-0">ข้อมูลการสมัครงาน</h3>
        </div>

        <div class="card-body bg-white">

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $position = $_POST['position'];
                $prefix = $_POST['prefix'];
                $fullname = $_POST['fullname'];
                $birthday = $_POST['birthday'];
                $education = $_POST['education'];
                $skills = nl2br($_POST['skills']);
                $experience = nl2br($_POST['experience']);
                $other = nl2br($_POST['other']);

                echo "<p><strong>ตำแหน่งที่สมัคร:</strong> $position</p>";
                echo "<p><strong>ชื่อ - สกุล:</strong> $prefix $fullname</p>";
                echo "<p><strong>วันเดือนปีเกิด:</strong> $birthday</p>";
                echo "<p><strong>ระดับการศึกษา:</strong> $education</p>";
                echo "<p><strong>ความสามารถพิเศษ:</strong><br> $skills</p>";
                echo "<p><strong>ประสบการณ์ทำงาน:</strong><br> $experience</p>";
                echo "<p><strong>ข้อมูลอื่น ๆ เพิ่มเติม:</strong><br> $other</p>";
            }
            ?>

            <div class="text-center mt-4">
                <a href="e.php" class="btn btn-secondary">กลับไปหน้ากรอกฟอร์ม</a>
            </div>

        </div>
    </div>
</div>

</body>
</html>
