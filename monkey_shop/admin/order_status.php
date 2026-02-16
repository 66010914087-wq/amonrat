<?php
include('../condb.php');
$o_id = $_GET['o_id'];
$status = $_GET['status'];

$sql = "UPDATE orders SET o_status = '$status' WHERE o_id = $o_id";
$result = mysqli_query($conn, $sql);

if($result) {
    header("Location: order_admin.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
?>