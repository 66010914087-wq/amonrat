<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบฟอร์มสมัครงาน - Amonrat Group</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        :root { --primary-color: #0f2027; --secondary-color: #203a43; --accent-color: #d4af37; }
        body { font-family: 'Kanit', sans-serif; background: linear-gradient(135deg, #0f2027, #203a43, #2c5364); min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 40px 0; color: #333; }
        .main-card { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.2); border-radius: 20px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5); overflow: hidden; max-width: 900px; width: 100%; position: relative; }
        .card-header-custom { background: linear-gradient(45deg, var(--primary-color), var(--secondary-color)); padding: 40px; text-align: center; color: white; position: relative; }
        .card-header-custom::after { content: ''; position: absolute; bottom: 0; left: 0; width: 100%; height: 5px; background: linear-gradient(90deg, transparent, var(--accent-color), transparent); }
        .company-name { font-family: 'Playfair Display', serif; font-size: 2.5rem; margin-bottom: 5px; letter-spacing: 1px; text-shadow: 2px 2px 4px rgba(0,0,0,0.3); }
        .company-slogan { font-weight: 300; color: #cfcfcf; font-size: 1rem; }
        .form-section-title { color: var(--secondary-color); border-left: 5px solid var(--accent-color); padding-left: 15px; margin: 30px 0 20px 0; font-weight: 600; font-size: 1.2rem; }
        .form-floating > .form-control:focus ~ label, .form-floating > .form-control:not(:placeholder-shown) ~ label { color: var(--accent-color); }
        .form-control:focus, .form-select:focus { border-color: var(--accent-color); box-shadow: 0 0 0 0.25rem rgba(212, 175, 55, 0.25); }
        .btn-submit { background: linear-gradient(45deg, #d4af37, #c5a028); border: none; color: white; padding: 15px 40px; font-size: 1.2rem; border-radius: 50px; transition: all 0.3s ease; box-shadow: 0 10px 20px rgba(212, 175, 55, 0.3); font-weight: 600; }
        .btn-submit:hover { transform: translateY(-3px); box-shadow: 0 15px 25px rgba(212, 175, 55, 0.4); background: linear-gradient(45deg, #c5a028, #d4af37); }
        .decoration { position: absolute; border-radius: 50%; z-index: -1; }
        .circle-1 { width: 300px; height: 300px; background: linear-gradient(45deg, var(--accent-color), transparent); top: -50px; right: -50px; opacity: 0.1; }
        .circle-2 { width: 200px; height: 200px; background: linear-gradient(45deg, #00f260, #0575e6); bottom: -50px; left: -50px; opacity: 0.1; }
    </style>
</head>
<body>
    <div class="main-card animate-on-load">
        <div class="decoration circle-1"></div>
        <div class="decoration circle-2"></div>
        <div class="card-header-custom">
            <h1 class="company-name"><i class="bi bi-buildings-fill me-2"></i> Amonrat Group</h1>
            <p class="company-slogan">Innovation for the Future | ผู้นำนวัตกรรมแห่งอนาคต</p>
        </div>
        <div class="p-5">
                <form action="f.php" method="POST" enctype="multipart/form-data">

                <h4 class="form-section-title">ตำแหน่งที่ต้องการสมัคร</h4>
                <div class="row g-3">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <select class="form-select" id="position" name="position" required>
                                <option selected disabled value="">เลือกตำแหน่งงานที่สนใจ...</option>
                                <option value="ceo_assistant">ผู้ช่วยกรรมการผู้จัดการ (Executive Assistant)</option>
                                <option value="marketing_manager">ผู้จัดการฝ่ายการตลาด (Marketing Manager)</option>
                                <option value="senior_dev">นักพัฒนาซอฟต์แวร์อาวุโส (Senior Software Developer)</option>
                                <option value="ux_ui">นักออกแบบประสบการณ์ผู้ใช้ (UX/UI Designer)</option>
                                <option value="hr_specialist">ผู้เชี่ยวชาญด้านทรัพยากรบุคคล (HR Specialist)</option>
                                <option value="accountant">นักบัญชีอาวุโส (Senior Accountant)</option>
                            </select>
                            <label for="position"><i class="bi bi-briefcase me-1"></i> เลือกตำแหน่งงาน</label>
                        </div>
                    </div>
                </div>

                <h4 class="form-section-title">ข้อมูลส่วนตัว</h4>
                <div class="row g-3">
                    <div class="col-md-2">
                        <div class="form-floating">
                            <select class="form-select" id="prefix" name="prefix" required>
                                <option value="mr">นาย</option>
                                <option value="ms">นางสาว</option>
                                <option value="mrs">นาง</option>
                            </select>
                            <label for="prefix">คำนำหน้า</label>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="ชื่อจริง" required>
                            <label for="firstname">ชื่อ (First Name)</label>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="นามสกุล" required>
                            <label for="lastname">นามสกุล (Last Name)</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="date" class="form-control" id="dob" name="dob" required>
                            <label for="dob">วันเดือนปีเกิด</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select class="form-select" id="education" name="education" required>
                                <option selected disabled value="">เลือกระดับการศึกษา...</option>
                                <option value="highschool">มัธยมศึกษาตอนปลาย / ปวช.</option>
                                <option value="diploma">อนุปริญญา / ปวส.</option>
                                <option value="bachelor">ปริญญาตรี</option>
                                <option value="master">ปริญญาโท</option>
                                <option value="doctorate">ปริญญาเอก</option>
                            </select>
                            <label for="education"><i class="bi bi-mortarboard me-1"></i> ระดับการศึกษาสูงสุด</label>
                        </div>
                    </div>
                </div>

                <h4 class="form-section-title">คุณสมบัติและประสบการณ์</h4>
                <div class="row g-3">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="ระบุความสามารถพิเศษ" id="specialSkills" name="specialSkills" style="height: 100px"></textarea>
                            <label for="specialSkills"><i class="bi bi-stars me-1"></i> ความสามารถพิเศษ (Special Skills)</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="ระบุประสบการณ์ทำงาน" id="experience" name="experience" style="height: 120px"></textarea>
                            <label for="experience"><i class="bi bi-building-check me-1"></i> ประสบการณ์ทำงาน (Work Experience)</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="otherFile" class="form-label text-muted">แนบไฟล์เพิ่มเติม (Resume / Portfolio / อื่นๆ)</label>
                            <input class="form-control form-control-lg" type="file" id="otherFile" name="otherFile">
                        </div>
                        <div class="form-floating">
                             <textarea class="form-control" placeholder="ข้อมูลอื่นๆ" id="otherInfo" name="otherInfo" style="height: 80px"></textarea>
                             <label for="otherInfo">ข้อมูลอื่นๆ เพิ่มเติม (Others)</label>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-submit w-50">
                        <i class="bi bi-send-fill me-2"></i> ส่งใบสมัคร
                    </button>
                    <p class="text-muted mt-3 small">เมื่อกดส่ง ข้อมูลจะถูกบันทึกเข้าสู่ระบบฐานข้อมูลของรพีพงศ์กรุ๊ป</p>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>