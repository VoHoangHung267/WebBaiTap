<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 5 - Kiểm tra số hoàn hảo</title>
    <link rel="stylesheet" href="../css/bai.css">
</head>
<body>

<div class="container">
    <h2>Bài 5: Kiểm tra số hoàn hảo</h2>
    <p>Một số hoàn hảo là một số nguyên dương mà tổng các ước số nguyên dương của nó (ngoại trừ chính nó) bằng chính nó.</p>

    <form action="" method="post">
        <label for="numberInput">Nhập một số:</label>
        <input type="number" id="numberInput" name="number" required min="1">
        <button type="submit">Kiểm tra</button>
    </form>

    <?php
    // Định nghĩa hàm kiểm tra số hoàn hảo
    function isPerfectNumber($n) {
        if ($n <= 1) {
            return false;
        }
        $sum_of_divisors = 1;
        for ($i = 2; $i <= sqrt($n); $i++) {
            if ($n % $i == 0) {
                $sum_of_divisors += $i;
                if ($i * $i != $n) {
                    $sum_of_divisors += $n / $i;
                }
            }
        }
        return $sum_of_divisors == $n;
    }

    // Xử lý khi form được gửi
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $number = filter_input(INPUT_POST, 'number', FILTER_VALIDATE_INT);
        
        if ($number === false || $number <= 0) {
            echo "<p class='result error'>Vui lòng nhập một số nguyên dương hợp lệ.</p>";
        } else {
            if (isPerfectNumber($number)) {
                echo "<p class='result success'>$number là SỐ HOÀN HẢO.</p>";
            } else {
                echo "<p class='result error'>$number không phải là số hoàn hảo.</p>";
            }
        }
    }
    ?>
</div>

</body>
</html>