<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Navigation</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="menu">
    <div class="menu-container">
        <ul>
            <li><a href="index.php" class="menu-item home" data-icon="🏠">Trang chủ</a></li>
            <li><a href="https://www.w3schools.com/html/" target="_blank" class="menu-item html" data-icon="📄">HTML</a></li>
            <li><a href="https://www.w3schools.com/css/" target="_blank" class="menu-item css" data-icon="🎨">CSS</a></li>
            <li><a href="https://www.w3schools.com/php/" target="_blank" class="menu-item php" data-icon="🐘">PHP</a></li>
            <li><a href="https://www.w3schools.com/js/" target="_blank" class="menu-item js" data-icon="⚡">JavaScript</a></li>
            <li><a href="https://www.w3schools.com/" target="_blank" class="menu-item w3" data-icon="📚">W3Schools</a></li>
            <li><a href="https://hocwebchuan.com/" target="_blank" class="menu-item hwc" data-icon="🎓">Học Web Chuẩn</a></li>
        </ul>
        
        <!-- Mobile menu toggle -->
        <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">
            <span class="hamburger"></span>
            <span class="hamburger"></span>
            <span class="hamburger"></span>
        </button>
    </div>
</div>

<script>
// Mobile menu functionality
function toggleMobileMenu() {
    const menu = document.querySelector('.menu ul');
    const toggle = document.querySelector('.mobile-menu-toggle');
    
    menu.classList.toggle('mobile-open');
    toggle.classList.toggle('active');
}

// Close mobile menu when clicking outside
document.addEventListener('click', function(e) {
    const menu = document.querySelector('.menu ul');
    const toggle = document.querySelector('.mobile-menu-toggle');
    
    if (!e.target.closest('.menu') && menu.classList.contains('mobile-open')) {
        menu.classList.remove('mobile-open');
        toggle.classList.remove('active');
    }
});

// Add active state to current page
document.addEventListener('DOMContentLoaded', function() {
    const currentPage = window.location.pathname.split('/').pop();
    const menuItems = document.querySelectorAll('.menu-item');
    
    menuItems.forEach(item => {
        if (item.getAttribute('href') === currentPage) {
            item.classList.add('active');
        }
    });
});

// Smooth scroll for internal links
document.querySelectorAll('.menu-item:not([target="_blank"])').forEach(link => {
    link.addEventListener('click', function(e) {
        // Add loading effect
        this.classList.add('loading');
        setTimeout(() => {
            this.classList.remove('loading');
        }, 500);
    });
});
</script>

</body>
</html>