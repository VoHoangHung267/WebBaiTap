<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 3 - Tính giá trị biểu thức S(x, n)</title>
    <link rel="stylesheet" href="../css/bai.css">
</head>
<body>

<div class="container">
    <h2>Bài 3: Tính giá trị biểu thức S(x, n)</h2>
    <div class="expression">
         S(x,n) = x + x²/2! + x³/3! + ... + xⁿ/n!
    </div>

    <form action="" method="post">
        <label for="x_input">Nhập giá trị x:</label>
        <input type="number" id="x_input" name="x" step="any" required>
        
        <label for="n_input">Nhập giá trị n:</label>
        <input type="number" id="n_input" name="n" min="1" required>
        
        <button type="submit">Tính S(x, n)</button>
    </form>

    <?php
    // Hàm tính giai thừa (sử dụng vòng lặp)
    function factorial($num) {
        if ($num < 0) return null;
        $result = 1;
        for ($i = 2; $i <= $num; $i++) {
            $result *= $i;
        }
        return $result;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $x = filter_input(INPUT_POST, 'x', FILTER_VALIDATE_FLOAT);
        $n = filter_input(INPUT_POST, 'n', FILTER_VALIDATE_INT);

        if ($x === false || $n === false || $n < 1) {
            echo "<p class='result error'>Vui lòng nhập giá trị x hợp lệ và n là một số nguyên dương.</p>";
        } else {
            $sum = 0;
            for ($i = 1; $i <= $n; $i++) {
                $numerator = pow($x, $i);
                $denominator = factorial($i);
                
                if ($denominator == 0) {
                    continue; 
                }
                
                $term = $numerator / $denominator;
                $sum += $term;
            }

            echo "<p class='result success'>Với x = **$x** và n = **$n**, giá trị của biểu thức S(x, n) là: **" . number_format($sum, 4) . "**</p>";
        }
    }
    ?>
</div>

</body>
</html>