<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 6 - Tính n Giai thừa</title>
    <link rel="stylesheet" href="../css/bai.css">
</head>
<body>

<div class="container">
    <h2>Bài 6: Tính n Giai thừa</h2>
    <p>Nhập một số nguyên không âm để tính giá trị giai thừa của nó.</p>

    <form action="" method="post">
        <label for="numberInput">Nhập số n:</label>
        <input type="number" id="numberInput" name="n" required min="0">
        <button type="submit">Tính giai thừa</button>
    </form>

    <?php
    // Hàm tính giai thừa sử dụng vòng lặp
    function factorialLoop($n) {
        if ($n < 0) {
            return null;
        }
        $result = 1;
        for ($i = 2; $i <= $n; $i++) {
            $result *= $i;
        }
        return $result;
    }

    // Hàm tính giai thừa sử dụng đệ quy
    function factorialRecursive($n) {
        if ($n < 0) {
            return null;
        }
        if ($n == 0) {
            return 1;
        } else {
            return $n * factorialRecursive($n - 1);
        }
    }

    // Xử lý khi form được gửi
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $n = filter_input(INPUT_POST, 'n', FILTER_VALIDATE_INT);
        
        if ($n === false || $n < 0) {
            echo "<p class='result error'>Vui lòng nhập một số nguyên không âm hợp lệ.</p>";
        } else {
            $result = factorialLoop($n); 
            
            if ($result !== null) {
                // Kiểm tra giới hạn để tránh tràn số (integer overflow)
                if (PHP_INT_SIZE == 4 && $n > 12 || PHP_INT_SIZE == 8 && $n > 20) {
                    echo "<p class='result error'>Lưu ý: Giá trị giai thừa của $n rất lớn, có thể vượt quá giới hạn của kiểu số nguyên trên hệ thống này. (Kết quả có thể không chính xác).</p>";
                } else {
                    echo "<p class='result success'>Giai thừa của $n ($n!) là: $result</p>";
                }
            }
        }
    }
    ?>
</div>

</body>
</html>