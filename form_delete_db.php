<?php
include 'condb.php';

// ตรวจสอบว่ามีการส่ง id มาหรือไม่
if (isset($_POST['id'])) {
    $id = mysqli_real_escape_string($condb, $_POST['id']);

    // ลบข้อมูลจากฐานข้อมูล
    $sql = "DELETE FROM tbl_member WHERE id = '$id'";
    $result = mysqli_query($condb, $sql);

    if ($result) {
        echo "<script>alert('ลบข้อมูลสำเร็จ'); window.location.href = 'member_list.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการลบข้อมูล'); window.location.href = 'member_list.php';</script>";
    }
} else {
    echo "<script>alert('ไม่พบข้อมูลที่ส่งมา'); window.location.href = 'member_list.php';</script>";
}

mysqli_close($condb);
?>