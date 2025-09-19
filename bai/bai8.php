<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 8 - Đếm số âm, số dương</title>
    <link rel="stylesheet" href="../css/bai.css">
</head>
<body>

<div class="container">
    <h2>Bài 8: Đếm số âm và số dương trong mảng</h2>

    <!-- Form nhập mảng -->
    <form method="post">
        <label>Nhập mảng số nguyên (cách nhau bởi dấu phẩy):</label><br>
        <input type="text" name="numbers" size="50" placeholder="Ví dụ: 1, -2, 3, -4, 5">
        <button type="submit">Xử lý</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['numbers'])) {
        // Lấy chuỗi nhập vào và tách thành mảng
        $input = $_POST['numbers'];
        $numbers = array_map('trim', explode(',', $input)); // tách và loại bỏ khoảng trắng
        $numbers = array_map('intval', $numbers); // ép về số nguyên

        // Khởi tạo các biến đếm
        $positive_count = 0;
        $negative_count = 0;
        $positive_numbers = [];
        $negative_numbers = [];

        // Duyệt qua mảng để đếm và lưu các phần tử
        foreach ($numbers as $number) {
            if ($number > 0) {
                $positive_count++;
                $positive_numbers[] = $number;
            } elseif ($number < 0) {
                $negative_count++;
                $negative_numbers[] = $number;
            }
        }
    ?>
        <p>Mảng số nguyên bạn nhập là: [<?php echo implode(", ", $numbers); ?>]</p>

        <div class="result success">
            <h3>Kết quả:</h3>
            <ul>
                <li>Số lượng các phần tử dương: <?php echo $positive_count; ?></li>
                <li>Các phần tử dương: [<?php echo implode(", ", $positive_numbers); ?>]</li>
                <li>Số lượng các phần tử âm: <?php echo $negative_count; ?></li>
                <li>Các phần tử âm: [<?php echo implode(", ", $negative_numbers); ?>]</li>
            </ul>
        </div>
    <?php
    }
    ?>
</div>

</body>
</html>
