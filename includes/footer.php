<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="footer">
    <div class="footer-content">
        <div class="footer-section">
            <h4>Web Bài Tập PHP</h4>
            <p>Nền tảng học tập lập trình web với PHP, HTML, CSS và JavaScript. Được thiết kế để giúp sinh viên nắm vững kiến thức cơ bản đến nâng cao.</p>
        </div>
        
        <div class="footer-section">
            <h4>Liên kết hữu ích</h4>
            <ul>
                <li><a href="https://www.w3schools.com/" target="_blank">W3Schools</a></li>
                <li><a href="https://hocwebchuan.com/" target="_blank">Học Web Chuẩn</a></li>
                <li><a href="https://php.net/" target="_blank">PHP Official</a></li>
                <li><a href="https://developer.mozilla.org/" target="_blank">MDN Docs</a></li>
            </ul>
        </div>
        
        <div class="footer-section">
            <h4>Thông tin sinh viên</h4>
            <div class="student-info">
                <p><span class="info-icon">👨‍🎓</span><?php echo htmlspecialchars($_SESSION['fullname']); ?></p>
                <p><span class="info-icon">🏫</span><?php echo htmlspecialchars($_SESSION['faculty']); ?></p>
                <p><span class="info-icon">📚</span><?php echo htmlspecialchars($_SESSION['class']); ?></p>
                <p><span class="info-icon">📅</span><?php echo htmlspecialchars($_SESSION['course']); ?></p>
            </div>
        </div>
        
        <div class="footer-section">
            <h4>Kỹ thuật sử dụng</h4>
            <div class="tech-stack">
                <span class="tech-badge php">PHP</span>
                <span class="tech-badge html">HTML5</span>
                <span class="tech-badge css">CSS3</span>
                <span class="tech-badge js">JavaScript</span>
                <span class="tech-badge mysql">Postgres</span>
            </div>
        </div>
    </div>
    
    <div class="footer-bottom">
        <div class="footer-bottom-content">
            <p>&copy; 2024 Web Bài Tập - Võ Hoàng Hưng. Chào mừng bạn đến với website tìm hiểu về lập trình web.</p>
            <div class="footer-actions">
                <button onclick="scrollToTop()" class="scroll-top-btn" title="Lên đầu trang">
                    ⬆️ Top
                </button>
                <span class="last-updated" id="lastUpdated">Cập nhật: Loading...</span>
            </div>
        </div>
    </div>
</div>

<script>
// Scroll to top functionality
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Show/hide scroll to top button based on scroll position
window.addEventListener('scroll', function() {
    const scrollTopBtn = document.querySelector('.scroll-top-btn');
    if (window.pageYOffset > 300) {
        scrollTopBtn.style.opacity = '1';
        scrollTopBtn.style.pointerEvents = 'auto';
    } else {
        scrollTopBtn.style.opacity = '0.5';
        scrollTopBtn.style.pointerEvents = 'none';
    }
});

// Update last modified date
document.addEventListener('DOMContentLoaded', function() {
    const lastUpdatedElement = document.getElementById('lastUpdated');
    const now = new Date();
    const options = { 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    };
    lastUpdatedElement.textContent = 'Cập nhật: ' + now.toLocaleDateString('vi-VN', options);
});

// Add fade-in animation when footer comes into view
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
};

const footerObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('footer-visible');
        }
    });
}, observerOptions);

// Observe footer
const footer = document.querySelector('.footer');
if (footer) {
    footerObserver.observe(footer);
}
</script>

</body>
</html>