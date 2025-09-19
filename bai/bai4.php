<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 4 - Nhập số cho đến khi gặp số 0</title>
    <link rel="stylesheet" href="../css/bai.css">
</head>
<body>

<div class="container">
    <h2>Bài 4: Nhập số cho đến khi gặp số 0</h2>
    <p>Nhập các số nguyên vào ô bên dưới. Chương trình sẽ dừng lại khi bạn nhập số 0.</p>

    <form action="" method="post">
        <label for="numberInput">Nhập một số:</label>
        <input type="number" id="numberInput" name="number" required>
        <button type="submit">Gửi</button>
    </form>

    <?php
    session_start();

    if (!isset($_SESSION['numbers'])) {
        $_SESSION['numbers'] = [];
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $input_number = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_NUMBER_INT);
        $input_number = (int)$input_number;

        if ($input_number !== 0) {
            $_SESSION['numbers'][] = $input_number;
            echo "<p class='result success'>Đã nhập số: $input_number. Vui lòng tiếp tục nhập.</p>";
        } else {
            echo "<div class='result success'>";
            echo "<p>Bạn đã nhập số 0. Chương trình đã dừng lại.</p>";
            echo "<p>Các số bạn đã nhập là: " . implode(", ", $_SESSION['numbers']) . "</p>";
            echo "</div>";
            unset($_SESSION['numbers']);
        }
    }
    ?>
</div>

</body>
</html>