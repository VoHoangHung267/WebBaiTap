<?php
session_start();
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $faculty   = $_POST['faculty'];
    $class     = $_POST['class_name'];
    $course    = $_POST['course'];
    $id        = $_SESSION['user_id'];

    $sql = "UPDATE users SET fullname=?, faculty=?, class_name=?, course=? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$fullname, $faculty, $class, $course, $id]);

    // cập nhật lại session
    $_SESSION['fullname'] = $fullname;
    $_SESSION['faculty']  = $faculty;
    $_SESSION['class']    = $class;
    $_SESSION['course']   = $course;

    $_SESSION['success'] = "Cập nhật thông tin thành công!";
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa thông tin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 450px;
            margin: 60px auto;
            background: #fff;
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }
        label {
            display: block;
            margin: 12px 0 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
            font-size: 14px;
            transition: border 0.3s;
        }
        input[type="text"]:focus {
            border-color: #007bff;
        }
        button {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background: #007bff;
            border: none;
            color: white;
            font-size: 15px;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: #0056b3;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
            color: #007bff;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sửa thông tin sinh viên</h2>
        <form method="post">
            <label>Họ tên:</label>
            <input type="text" name="fullname" value="<?php echo htmlspecialchars($_SESSION['fullname']); ?>">

            <label>Khoa:</label>
            <input type="text" name="faculty" value="<?php echo htmlspecialchars($_SESSION['faculty']); ?>">

            <label>Lớp:</label>
            <input type="text" name="class_name" value="<?php echo htmlspecialchars($_SESSION['class']); ?>">

            <label>Khóa:</label>
            <input type="text" name="course" value="<?php echo htmlspecialchars($_SESSION['course']); ?>">

            <button type="submit">💾 Lưu thay đổi</button>
        </form>
        <a href="index.php" class="back-link">⬅ Quay lại trang chủ</a>
    </div>
</body>
</html>
