<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>อมรรัตน์ ทองอินทา(หมิว)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-sm mb-4">
        <div class="card-body text-center">
            <h1 class="fw-bold text-primary">อมรรัตน์ ทองอินทา(หมิว)</h1>
            <p class="text-muted">รายงานสรุปยอดขายแยกตามประเทศ</p>
        </div>
    </div>

    <div class="card shadow-sm mb-5">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">ตารางข้อมูลยอดขาย</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-secondary">
                    <tr>
                        <th>ประเทศ</th>
                        <th class="text-end">ยอดขาย (บาท)</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include_once("connectdb.php");
                    
                    // ตัวแปรสำหรับเก็บข้อมูลไปทำกราฟ
                    $labels = []; // เก็บชื่อประเทศ
                    $data_sales = []; // เก็บยอดขาย

                    $sql = "SELECT p_country, SUM(p_amount) AS total FROM popsupermarket GROUP BY p_country";
                    $rs = mysqli_query($conn, $sql);
                    
                    while($data = mysqli_fetch_array($rs)){
                        // เก็บข้อมูลลง Array เพื่อส่งไปให้กราฟ
                        $labels[] = $data['p_country'];
                        $data_sales[] = $data['total'];
                ?>
                    <tr>
                        <td><?php echo $data['p_country'];?></td>
                        <td class="text-end"><?php echo number_format($data['total'], 0);?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fa-solid fa-chart-simple"></i> กราฟแท่ง (Bar Chart)</h5>
                </div>
                <div class="card-body">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fa-solid fa-chart-pie"></i> สัดส่วน (Pie Chart)</h5>
                </div>
                <div class="card-body">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // รับค่าจาก PHP มาเป็น JavaScript (แปลงเป็น JSON)
    const labels = <?php echo json_encode($labels); ?>;
    const datas = <?php echo json_encode($data_sales); ?>;

    // สร้างชุดสีสวยๆ สำหรับกราฟ
    const backgroundColors = [
        'rgba(255, 99, 132, 0.7)',
        'rgba(54, 162, 235, 0.7)',
        'rgba(255, 206, 86, 0.7)',
        'rgba(75, 192, 192, 0.7)',
        'rgba(153, 102, 255, 0.7)',
        'rgba(255, 159, 64, 0.7)',
        'rgba(199, 199, 199, 0.7)',
        'rgba(83, 102, 255, 0.7)',
        'rgba(40, 159, 64, 0.7)',
        'rgba(210, 86, 255, 0.7)'
    ];

    // --- Config สำหรับ Bar Chart ---
    const ctxBar = document.getElementById('barChart').getContext('2d');
    new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'ยอดขายรวม (บาท)',
                data: datas,
                backgroundColor: 'rgba(54, 162, 235, 0.6)', // สีแท่งกราฟ
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // --- Config สำหรับ Pie Chart ---
    const ctxPie = document.getElementById('pieChart').getContext('2d');
    new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: datas,
                backgroundColor: backgroundColors, // ใช้ชุดสีที่เตรียมไว้
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom', // เอาคำอธิบายไว้ด้านล่าง
                }
            }
        }
    });
</script>

</body>
</html>