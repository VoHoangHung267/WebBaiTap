<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 9 - Chuyển đổi giây sang giờ:phút:giây</title>
    <link rel="stylesheet" href="../css/bai.css">
</head>
<body>

<div class="container">
    <h2>Bài 9: Chuyển đổi giây sang giờ:phút:giây</h2>
    <p>Nhập số giây để chuyển đổi sang định dạng giờ:phút:giây. Ví dụ nhập vào 3769 giây thì in ra màn hình dưới dạng: 01:02:49.</p>

    <form action="" method="post">
        <label for="secondsInput">Nhập số giây:</label>
        <input type="number" id="secondsInput" name="seconds" required min="0">
        <button type="submit">Chuyển đổi</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $total_seconds = filter_input(INPUT_POST, 'seconds', FILTER_VALIDATE_INT);

        if ($total_seconds === false || $total_seconds < 0) {
            echo "<p class='result error'>Vui lòng nhập một số giây hợp lệ (số nguyên không âm).</p>";
        } else {
            // Tính toán giờ, phút, giây
            $hours = floor($total_seconds / 3600);
            $remaining_seconds_after_hours = $total_seconds % 3600;
            $minutes = floor($remaining_seconds_after_hours / 60);
            $seconds = $remaining_seconds_after_hours % 60;
            
            // Định dạng chuỗi kết quả
            // Sử dụng sprintf để thêm số 0 vào trước nếu cần
            $formatted_time = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
            
            echo "<div class='result success'>";
            echo "<p>Thời gian bạn nhập là: $total_seconds giây.</p>";
            echo "<p>Kết quả chuyển đổi: $formatted_time</p>";
            echo "</div>";
        }
    }
    ?>
</div>

</body>
</html>