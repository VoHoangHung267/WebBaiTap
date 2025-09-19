<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 2 - Tính tổng chuỗi số</title>
    <link rel="stylesheet" href="../css/bai.css">
</head>
<body>

<div class="container">
    <h2>Bài 2: Tính tổng chuỗi số</h2>

    <?php
    // Xử lý khi form được gửi
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $n = filter_input(INPUT_POST, 'n', FILTER_VALIDATE_INT);
        
        if ($n === false || $n < 1) {
            echo "<p class='result error'>Vui lòng nhập một số nguyên dương hợp lệ cho n.</p>";
        } else {
            // ====================================================================
            // a. Tính tổng T = 1/2 + 2/3 + 3/4 + … n/(n+1)
            // ====================================================================
            $total_a = 0;
            for ($i = 1; $i <= $n; $i++) {
                $term = $i / ($i + 1);
                $total_a += $term;
            }

            // ====================================================================
            // b. Viết chương trình tính tổng chuỗi sau
            // T = 1/2 + 1/4 + 1/6 + ….
            // Với điều kiện: e = 1/(n+2) > 0.0001
            // ====================================================================
            $total_b = 0;
            $i = 1;
            do {
                $denominator = 2 * $i;
                if ($denominator == 0) {
                    continue; 
                }
                $term = 1 / $denominator;
                $total_b += $term;
                $i++;
            } while ($term > 0.0001);

            echo "<div class='result success'>";
            echo "<h3>Kết quả:</h3>";
            echo "<h4>Bài toán a:</h4>";
            echo "<p>Với n = **$n**, tổng chuỗi T = 1/2 + ... + n/(n+1) là: **" . number_format($total_a, 4) . "**</p>";
            echo "<h4>Bài toán b:</h4>";
            echo "<p>Tổng chuỗi T = 1/2 + 1/4 + ... cho đến khi số hạng < 0.0001 là: **" . number_format($total_b, 4) . "**</p>";
            echo "</div>";
        }
    }
    ?>
    
    <div class="expression">
        <h3>Bài toán a:</h3>
        <p>T = 1/2 + 2/3 + 3/4 + … n/(n+1)</p>
        <h3>Bài toán b:</h3>
        <p>T = 1/2 + 1/4 + 1/6 + … 1/(n+2)</p>
        <p>Với điều kiện: e= 1/(n+2) > 0.0001</p>
    </div>

    <form action="" method="post">
        <label for="n_input">Nhập giá trị n cho bài toán a:</label>
        <input type="number" id="n_input" name="n" min="1" required>
        <button type="submit">Tính toán</button>
    </form>
</div>

</body>
</html>