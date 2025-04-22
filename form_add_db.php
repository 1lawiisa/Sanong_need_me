<?php
include 'condb.php';

if (isset($_POST['nickname']) && isset($_POST['story'])) {
    $nickname = mysqli_real_escape_string($condb, $_POST['nickname']);
    $story = mysqli_real_escape_string($condb, $_POST['story']);

    // ไม่ต้องใส่ค่า id หากเป็น AUTO_INCREMENT
    $sql = "INSERT INTO tbl_member (nickname, story) VALUES ('$nickname', '$story')";
    $result = mysqli_query($condb, $sql) or die("error : $sql " . mysqli_error($condb));

    if ($result) {
        echo "success"; // ส่งคำว่า "success" กลับไปยัง JavaScript
    } else {
        echo "error"; // ส่งคำว่า "error" กลับไปยัง JavaScript
    }
} else {
    echo "Please fill in all fields in the form.";
}
?>