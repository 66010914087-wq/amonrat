<?php
include('../condb.php');

if (isset($_POST['add_cat'])) {
    $cat_name = $_POST['cat_name'];
    $sql = "INSERT INTO categories (cat_name) VALUES ('$cat_name')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: category.php");
    } else {
        echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
    }
}
?>