<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>อมรรัตน์ ทองอินทา(หมิว)</title>
</head>

<body>

<h1>ข้อมูลจังหวัด--อมรรัตน์ ทองอินทา(หมิว)</h1>

<form method="post" action="">
    ชื่อจังหวัด <input type="text" name="rname" autofocus required>
    <select>
    รูปภาพ <input type="file" name="pimage"><br>
    ชื่อภาค
    <select>
<?php
     include_once("connectdb.php");
     $sql3 = "SELECT * FROM regions ORDER BY r_name ASC";
     $rs3 = mysqli_query($conn,$sql3);
     while($data3 = mysqli_fetch_array($rs3)){
?>
    <option value="<?php echo $data3['r_id'];?>"><?php echo $data3['r_name'];?></option>
<?php }?>
    </select>
    <button type="submit" name="Submit">บันทึก</button>
</form>
<br>
<br>
<table border="1">
    <tr>
        <th>รหัสจังหวัด</th>
        <th>ชื่อจังหวัด</th>     
        <th>รูปภาพ</th>
        <th>ภาค</th>     
    </tr>
    

<?php 
    include_once("connectdb.php");
    $sql ="SELECT * FROM provinces AS p 
     INNER JOIN regions AS r
     ON p.r_id =  r.r_id
     ORDER BY p.p_name ASC";
    $rs = mysqli_query($conn,$sql);
    
    while($data= mysqli_fetch_array($rs)){        
?>

    <tr>
        <td><?php echo $data['p_id']; ?></td>
        <td><?php echo $data['p_name']; ?></td>
               <td><img src="img/<?php echo  $data['p_id']; ?>.<?php echo  $data['p_ext']; ?>" width="120"></td>
        <td><?php echo $data['r_name']; ?></td>        
    </tr>

<?php }?>
</table>
</body>
</html>