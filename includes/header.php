<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Bài Tập - Võ Hoàng Hưng</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="header">
    <div class="banner">
        <img src="images/banner.jpg" alt="Banner Website Học Lập Trình">
    </div>

    <div class="info">
    <div class="info-title">👨‍💻 Thông tin sinh viên</div>
    <p><span class="info-label">Họ tên:</span> <?php echo htmlspecialchars($_SESSION['fullname']); ?></p>
    <p><span class="info-label">Khoa:</span> <?php echo htmlspecialchars($_SESSION['faculty']); ?></p>
    <p><span class="info-label">Lớp:</span> <?php echo htmlspecialchars($_SESSION['class']); ?></p>
    <p><span class="info-label">Khóa:</span> <?php echo htmlspecialchars($_SESSION['course']); ?></p>
    <a href="edit_profile.php" class="btn-edit">✏️ Sửa thông tin</a>
    </div>

    <div class="search">
        <input type="text" placeholder="🔍 Tìm kiếm bài học..." id="headerSearch">
        <button type="button" onclick="performSearch()">Tìm</button>
    </div>

    <!-- User Authentication Box -->
    <div class="user-box">
        <?php if (isset($_SESSION['username'])): ?>
    <div class="user-info">
        <span class="user-icon">👤</span>
        <span class="user-greeting">Xin chào, 
            <strong><?php echo htmlspecialchars($_SESSION['fullname']); ?></strong>
        </span>
        <a href="auth/logout.php" class="logout-btn" onclick="return confirm('Bạn có chắc muốn đăng xuất?')">
            <span>🚪</span> Đăng xuất
        </a>
    </div>
<?php else: ?>
    <div class="auth-links">
        <a href="auth/auth.php" class="auth-btn">
            <span>🔐</span> Đăng nhập / Đăng ký
        </a>
    </div>
<?php endif; ?>

    </div>
</div>

<script>
// Search functionality
function performSearch() {
    const searchTerm = document.getElementById('headerSearch').value.trim();
    if (searchTerm) {
        // You can implement search logic here
        alert('Tìm kiếm: ' + searchTerm);
        // Example: window.location.href = 'search.php?q=' + encodeURIComponent(searchTerm);
    } else {
        alert('Vui lòng nhập từ khóa tìm kiếm');
    }
}

// Enter key search
document.getElementById('headerSearch').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        performSearch();
    }
});
</script>

</body>
</html>