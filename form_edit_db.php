<?php
include 'condb.php';

// ตรวจสอบว่ามีข้อมูลถูกส่งมาผ่าน POST หรือไม่
if (isset($_POST['id']) && isset($_POST['nickname']) && isset($_POST['story'])) {
    $id = mysqli_real_escape_string($condb, $_POST['id']);
    $nickname = mysqli_real_escape_string($condb, $_POST['nickname']);
    $story = mysqli_real_escape_string($condb, $_POST['story']);

    // อัปเดตข้อมูลในฐานข้อมูล
    $sql = "UPDATE tbl_member SET nickname = '$nickname', story = '$story' WHERE id = '$id'";
    $result = mysqli_query($condb, $sql);

    if ($result) {
        echo "<script>alert('อัปเดตข้อมูลสำเร็จ'); window.location.href = 'member_list.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการอัปเดตข้อมูล'); window.location.href = 'member_list.php';</script>";
    }
} else {
    echo "<script>alert('ไม่พบข้อมูลที่ส่งมา'); window.location.href = 'member_list.php';</script>";
}

mysqli_close($condb);
?>