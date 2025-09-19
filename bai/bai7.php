<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 7 - Liệt kê ước số</title>
    <link rel="stylesheet" href="../css/bai.css">
</head>
<body>

<div class="container">
    <h2>Bài 7: Liệt kê các ước số của một số nguyên dương</h2>
    <p>Nhập một số nguyên dương để tìm tất cả các ước số của nó.</p>

    <form action="" method="post">
        <label for="numberInput">Nhập số n:</label>
        <input type="number" id="numberInput" name="n" required min="1">
        <button type="submit">Tìm ước số</button>
    </form>

    <?php
    // Hàm tìm và liệt kê các ước số của một số nguyên dương n
    function getDivisors($n) {
        $divisors = [];
        // Lặp từ 1 đến căn bậc hai của n để tối ưu
        for ($i = 1; $i * $i <= $n; $i++) {
            if ($n % $i == 0) {
                // Thêm ước số i
                $divisors[] = $i;
                // Nếu i không bằng n/i, thêm cả n/i vào mảng
                if ($i * $i != $n) {
                    $divisors[] = $n / $i;
                }
            }
        }
        // Sắp xếp mảng các ước số theo thứ tự tăng dần
        sort($divisors);
        return $divisors;
    }

    // Xử lý khi form được gửi
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $n = filter_input(INPUT_POST, 'n', FILTER_VALIDATE_INT);
        
        if ($n === false || $n <= 0) {
            echo "<p class='result error'>Vui lòng nhập một số nguyên dương hợp lệ.</p>";
        } else {
            $divisors = getDivisors($n);
            if (!empty($divisors)) {
                echo "<p class='result success'>Các ước số của $n là: " . implode(", ", $divisors) . "</p>";
            } else {
                echo "<p class='result error'>Không tìm thấy ước số nào (lỗi logic).</p>";
            }
        }
    }
    ?>
</div>

</body>
</html>