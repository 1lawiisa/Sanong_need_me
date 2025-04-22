<?php include 'menu.html'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member</title>
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
        form {
            background-color: #2c2c2c;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            width: 300px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #444;
            border-radius: 5px;
            background-color: #333;
            color: #e0e0e0;
        }
        input[type="text"]::placeholder {
            color: #888;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #bb86fc;
            border: none;
            border-radius: 5px;
            color: #1a1a1a;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
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
            echo "ไม่พบข้อมูลสมาชิก";
            exit();
        }
    } else {
        echo "ไม่พบ ID สมาชิก";
        exit();
    }
    ?>

    <div>
        <h1>Edit Member</h1>
        <form action="form_edit_db.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            NICKNAME : <input type="text" name="nickname" value="<?php echo $row['nickname']; ?>"><br>
            STORY : <input type="text" name="story" value="<?php echo $row['story']; ?>"><br>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>