<?php
include_once "connectdb.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $position        = $_POST['position'];
    $prefix          = $_POST['prefix'];
    $first_name      = $_POST['firstname'];
    $last_name       = $_POST['lastname'];
    $birth_date      = $_POST['dob'];
    $education_level = $_POST['education'];
    $special_skills  = $_POST['specialSkills'];
    $work_experience = $_POST['experience'];
    $others          = $_POST['otherInfo'];

    $stmt = $conn->prepare("INSERT INTO application (position, prefix, firstname, lastname, birthdate, educationlevel, specialskills, workexperience, others) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $position, $prefix, $first_name, $last_name, $birth_date, $education_level, $special_skills, $work_experience, $others);

    if ($stmt->execute()) {
        echo "<script>alert('เพิ่มข้อมูลสำเร็จ'); window.location.href='your_form_page.php';</script>";
    } else {
        echo "เกิดข้อผิดพลาด: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

