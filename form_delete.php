<?php include 'menu.html'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Member</title>
    <style>
        body {
            background-color: #1a1a1a;
            color: #e0e0e0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        h1 {
            color: #bb86fc;
            text-align: center;
            margin-bottom: 20px;
        }
        .confirmation-box {
            background-color: #2c2c2c;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            width: 300px;
            text-align: center;
        }
        .confirmation-box p {
            margin: 10px 0;
        }
        .confirmation-box button {
            padding: 10px 20px;
            margin: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .confirmation-box button.delete {
            background-color: #ff4444;
            color: #fff;
        }
        .confirmation-box button.delete:hover {
            background-color: #cc0000;
        }
        .confirmation-box button.cancel {
            background-color: #bb86fc;
            color: #1a1a1a;
        }
        .confirmation-box button.cancel:hover {
            background-color: #9a67ea;
        }
    </style>
</head>
<body>
    <?php
    include 'condb.php';

    // ตรวจสอบว่ามีการส่ง id มาหรือไม่
    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($condb, $_GET['id']);

        // ดึงข้อมูลสมาชิกจากฐานข้อมูล
        $query = "SELECT * FROM tbl_member WHERE id = '$id'";
        $result = mysqli_query($condb, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "<script>alert('ไม่พบข้อมูลสมาชิก'); window.location.href = 'member_list.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('ไม่พบ ID สมาชิก'); window.location.href = 'member_list.php';</script>";
        exit();
    }
    ?>

    <div class="confirmation-box">
        <h1>Delete Member</h1>
        <p>คุณแน่ใจหรือไม่ว่าต้องการลบสมาชิกนี้?</p>
        <p><strong>ID:</strong> <?php echo $row['id']; ?></p>
        <p><strong>Nickname:</strong> <?php echo $row['nickname']; ?></p>
        <p><strong>Story:</strong> <?php echo $row['story']; ?></p>
        <form action="form_delete_db.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <button type="submit" class="delete">Delete</button>
            <button type="button" class="cancel" onclick="window.location.href='member_list.php'">Cancel</button>
        </form>
    </div>
</body>
</html>