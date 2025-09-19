<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 1 - Tính tổng số nguyên tố</title>
    <link rel="stylesheet" href="../css/bai.css">
</head>
<body>

<div class="container">
    <h2>Bài 1: Tính tổng các số nguyên tố từ 1 đến 100</h2>
    
    <?php
    /**
     * Hàm kiểm tra một số có phải là số nguyên tố hay không.
     * @param int $n Số cần kiểm tra.
     * @return bool Trả về true nếu là số nguyên tố, ngược lại là false.
     */
    function isPrime($n) {
        if ($n < 2) {
            return false;
        }
        for ($i = 2; $i <= sqrt($n); $i++) {
            if ($n % $i == 0) {
                return false;
            }
        }
        return true;
    }

    $sum_of_primes = 0;
    $prime_numbers = [];

    // Lặp từ 1 đến 100 để tìm và cộng dồn các số nguyên tố
    for ($i = 1; $i <= 100; $i++) {
        if (isPrime($i)) {
            $prime_numbers[] = $i;
            $sum_of_primes += $i;
        }
    }
    ?>

    <div class="result success">
        <h3>Kết quả:</h3>
        <p>Các số nguyên tố từ 1 đến 100 là:</p>
        <p><strong>[<?php echo implode(", ", $prime_numbers); ?>]</strong></p>
        <p>Tổng của các số nguyên tố này là: <strong><?php echo $sum_of_primes; ?></strong></p>
    </div>
</div>

</body>
</html>