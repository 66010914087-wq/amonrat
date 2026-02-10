<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>อมรรัตน์ ทองอินทา(หมิว)</title>
</head>

<body>

<h1>งาน i</h1>
<h1>ข้อมูลภาค--อมรรัตน์ ทองอินทา(หมิว)</h1>

<table border="1">
    <tr>
        <th>รหัสภาค</th>
        <th>ชื่อภาค</th>     
    </tr>
    

<?php 
    include_once("connectdb.php");
    $sql ="SELECT * FROM regions ORDER BY r_id ASC";
    $rs = mysqli_query($conn,$sql);
    
    while($data= mysqli_fetch_array($rs)){        
?>

    <tr>
        <td><?php echo $data['r_id']; ?></td>
        <td><?php echo $data['r_name']; ?></td>      
    </tr>

<?php }?>
</table>
</body>
</html>