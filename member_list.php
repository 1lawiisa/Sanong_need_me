<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member List</title>
    <style>
        /* เมนูด้านบนสุด */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(44, 44, 44, 0.9);
            padding: 15px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            display: flex;
            justify-content: center;
        }
        nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
        }
        nav ul li {
            display: inline;
        }
        nav ul li a {
            text-decoration: none;
            color:rgb(156, 156, 156);
            font-weight: bold;
            transition: color 0.3s;
        }
        nav ul li a:hover {
            color:rgb(255, 255, 255);
        }

        body {
            background-color: #121212;
            color: #e0e0e0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            padding-top: 60px; /* ลดช่องว่างระหว่างเมนูกับเนื้อหา */
            display: flex;
            justify-content: center;
            align-items: flex-start; /* ปรับเนื้อหาให้อยู่ด้านบน */
            min-height: 100vh;
            text-align: center;
        }

        table {
            width: 90%;
            max-width: 1000px;
            border-collapse: collapse;
            margin-top: 10px; /* ลดช่องว่างด้านบนของตาราง */
            background: rgba(44, 44, 44, 0.95);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
            animation: fadeIn 0.5s ease;
        }

        caption {
            font-size: 25px;
            font-weight: bold;
            color: #bb86fc;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
            padding-top: 30px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #444;
            transition: background 0.3s;
        }

        th {
            background-color: #292929;
            color: #bb86fc;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        tr {
            transition: background 0.3s;
        }

        tr:hover {
            background-color: rgba(68, 68, 68, 0.8);
            transform: scale(1.02);
        }

        td {
            color: #d3d3d3;
        }

        td a {
            color: #bb86fc;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background 0.3s, color 0.3s;
        }

        td a:hover {
            background: #bb86fc;
            color: #292929;
        }

        td a.delete {
            color: #e57373;
        }

        td a.delete:hover {
            background: #e57373;
            color: #292929;
        }

        /* เอฟเฟกต์ Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <!-- เริ่มส่วนของเมนู -->
    <nav>
        <ul>
            <li><a href="form_add.php">Home</a></li>
            <li><a href="form_add.php">Form</a></li>
            <li><a href="member_list.php">Member List</a></li>
            <li><a href="contact.php">Contact ME</a></li>
        </ul>
    </nav>
    <!-- จบส่วนของเมนู -->

    <?php
    include 'condb.php';
    $query = "SELECT * FROM tbl_member";
    $result = mysqli_query($condb, $query) or die("error : $query" . mysqli_error($condb));
    ?>

    <table>
        <caption>Member List</caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nickname</th>
                <th>Story</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nickname']; ?></td>
                <td><?php echo $row['story']; ?></td>
                <td>
                    <a href="form_edit.php?id=<?php echo $row['id']; ?>">Edit</a> | 
                    <a href="form_delete.php?id=<?php echo $row['id']; ?>" class="delete">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php mysqli_close($condb); ?>
</body>
</html>
