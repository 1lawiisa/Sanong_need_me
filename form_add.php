<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form P'</title>
    <style>
        body {
            background-color: #0d0d0d;
            color: #e0e0e0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow: hidden;
            position: relative;
            flex-direction: column;
        }
        body::before {
            content: "";
            background-image: url('https://i.pinimg.com/originals/9e/1d/77/9e1d77b9c9b5c5c5c5c5c5c5c5c5.jpg');
            background-size: cover;
            background-position: center;
            opacity: 0.3;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1;
        }
        /* ส่วนของเมนู */
        nav {
            width: 100%;
            background: rgba(44, 44, 44, 0.85);
            padding: 15px 0;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            z-index: 10;
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
        h3 {
            margin-top: 0px;
            color: #bb86fc;
            text-align: center;
            margin-bottom: 10px;
            font-size: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        form {
            background: rgba(44, 44, 44, 0.85);
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
            width: 90%;
            max-width: 400px;
            backdrop-filter: blur(8px);
            text-align: center;
            margin-top: 20px;
        }
        input[type="text"], textarea {
            width: 85%;
            padding: 12px;
            margin: 15px 0;
            border: none;
            border-radius: 25px;
            background-color: rgba(51, 51, 51, 0.9);
            color: #e0e0e0;
            box-shadow: inset 2px 2px 4px rgba(0, 0, 0, 0.6);
            transition: all 0.3s ease;
            resize: none;
        }
        input[type="text"]:focus, textarea:focus {
            outline: none;
            background-color: rgba(51, 51, 51, 1);
            box-shadow: 0 0 8px #bb86fc;
        }
        input[type="text"]::placeholder, textarea::placeholder {
            color: #888;
        }
        button {
            width: 60%;
            padding: 12px;
            background-color: #bb86fc;
            border: none;
            border-radius: 25px;
            color: #1a1a1a;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }
        button:hover {
            background-color: #9a67ea;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.5);
            transform: translateY(-3px);
        }
        button:active {
            transform: translateY(2px);
        }
        textarea {
            min-height: 60px;
            max-height: 200px;
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <!-- start menu -->
    <nav>
        <ul>
            <li><a href="form_add.php">Home</a></li>
            <li><a href="form_add.php">Form</a></li>
            <li><a href="member_list.php">Member List</a></li>
            <li><a href="contact.php">Contact ME</a></li>
        </ul>
    </nav>
    <!-- end menu -->

    <div>
        <h3>GOOD DAY (?)</h3>
        <form id="addForm">
            <input type="text" name="nickname" placeholder="Nickname" required><br>
            <textarea name="story" placeholder="Story" required></textarea><br>
            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        document.getElementById('addForm').addEventListener('submit', function(event) {
            event.preventDefault(); // ป้องกันการส่งฟอร์มแบบปกติ

            const formData = new FormData(this);

            fetch('form_add_db.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if (data === "success") {
                    window.location.href = 'member_list.php'; // เด้งไปหน้า member_list.php
                } else {
                    alert('เกิดข้อผิดพลาดในการบันทึกข้อมูล');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('เกิดข้อผิดพลาดในการเชื่อมต่อ');
            });
        });
    </script>
</body>
</html>
