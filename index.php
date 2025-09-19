<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website học tập với các bài tập PHP hiện đại và interactive">
    <meta name="keywords" content="PHP, học tập, bài tập, lập trình, web development">
    <meta name="author" content="Web Bài Tập">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Web Bài Tập - Học PHP Hiện Đại">
    <meta property="og:description" content="Nền tảng học tập PHP với giao diện hiện đại và bài tập interactive">
    <meta property="og:type" content="website">
    
    <title>🚀 Web Bài Tập - Học PHP Hiện Đại</title>
    
    <!-- Preload Critical Resources -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" as="style">
    <link rel="preload" href="css/style.css" as="style">
    
    <!-- CSS Files -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    
    <!-- Favicon -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    
    <!-- Theme Color -->
    <meta name="theme-color" content="#667eea">
    
    <!-- Loading Animation CSS -->
    <style>
        /* Loading Screen */
        #loadingScreen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }
        
        .loader {
            width: 60px;
            height: 60px;
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top: 4px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Content initially hidden */
        .main-content {
            opacity: 0;
            transition: opacity 0.5s ease;
        }
        
        .main-content.loaded {
            opacity: 1;
        }
        
        /* Progress Bar */
        .progress-bar {
            position: fixed;
            top: 0;
            left: 0;
            height: 3px;
            background: linear-gradient(90deg, #4facfe 0%, #00f2fe 100%);
            z-index: 1000;
            transition: width 0.3s ease;
        }
    </style>
</head>
<body>
    <!-- Loading Screen -->
    <div id="loadingScreen">
        <div class="loader"></div>
    </div>
    
    <!-- Progress Bar -->
    <div class="progress-bar" id="progressBar" style="width: 0%"></div>
    
    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Header Section -->
        <?php include("includes/header.php"); ?>
        
        <!-- Navigation Menu -->
        <?php include("includes/menu.php"); ?>
        
        <!-- Content Section -->
        <div class="content">
            <!-- Enhanced Sidebar -->
            <div class="sidebar">
                <div class="sidebar-header">
                    <h3>📚 Danh Sách Bài Tập</h3>
                    <div class="search-box">
                        <input type="text" id="searchInput" placeholder="🔍 Tìm kiếm bài..." onkeyup="searchLessons()">
                    </div>
                </div>
                
                <div class="lesson-stats">
                    <div class="stat-item">
                        <span class="stat-number" id="totalLessons">10</span>
                        <span class="stat-label">Bài học</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number" id="completedLessons">0</span>
                        <span class="stat-label">Hoàn thành</span>
                    </div>
                </div>
                
                <ul id="lessonList" class="lesson-list">
                    <li><a href="#" onclick="loadContent('bai/bai1.php', 1)" data-lesson="1" class="lesson-item">
                        <div class="lesson-icon">📝</div>
                        <div class="lesson-info">
                            <span class="lesson-title">Bài 1: Cơ bản PHP</span>
                            <span class="lesson-desc">Variables & Data Types</span>
                        </div>
                        <div class="lesson-status" id="status-1">🔘</div>
                    </a></li>
                    
                    <li><a href="#" onclick="loadContent('bai/bai2.php', 2)" data-lesson="2" class="lesson-item">
                        <div class="lesson-icon">🔢</div>
                        <div class="lesson-info">
                            <span class="lesson-title">Bài 2: Toán học PHP</span>
                            <span class="lesson-desc">Mathematical Operations</span>
                        </div>
                        <div class="lesson-status" id="status-2">🔘</div>
                    </a></li>
                    
                    <li><a href="#" onclick="loadContent('bai/bai3.php', 3)" data-lesson="3" class="lesson-item">
                        <div class="lesson-icon">🔄</div>
                        <div class="lesson-info">
                            <span class="lesson-title">Bài 3: Vòng lặp</span>
                            <span class="lesson-desc">Loops & Iterations</span>
                        </div>
                        <div class="lesson-status" id="status-3">🔘</div>
                    </a></li>
                    
                    <li><a href="#" onclick="loadContent('bai/bai4.php', 4)" data-lesson="4" class="lesson-item">
                        <div class="lesson-icon">🎯</div>
                        <div class="lesson-info">
                            <span class="lesson-title">Bài 4: Điều kiện</span>
                            <span class="lesson-desc">Conditional Statements</span>
                        </div>
                        <div class="lesson-status" id="status-4">🔘</div>
                    </a></li>
                    
                    <li><a href="#" onclick="loadContent('bai/bai5.php', 5)" data-lesson="5" class="lesson-item">
                        <div class="lesson-icon">📋</div>
                        <div class="lesson-info">
                            <span class="lesson-title">Bài 5: Mảng</span>
                            <span class="lesson-desc">Arrays & Collections</span>
                        </div>
                        <div class="lesson-status" id="status-5">🔘</div>
                    </a></li>
                    
                    <li><a href="#" onclick="loadContent('bai/bai6.php', 6)" data-lesson="6" class="lesson-item">
                        <div class="lesson-icon">⚙️</div>
                        <div class="lesson-info">
                            <span class="lesson-title">Bài 6: Hàm</span>
                            <span class="lesson-desc">Functions & Methods</span>
                        </div>
                        <div class="lesson-status" id="status-6">🔘</div>
                    </a></li>
                    
                    <li><a href="#" onclick="loadContent('bai/bai7.php', 7)" data-lesson="7" class="lesson-item">
                        <div class="lesson-icon">📄</div>
                        <div class="lesson-info">
                            <span class="lesson-title">Bài 7: Forms</span>
                            <span class="lesson-desc">Form Handling</span>
                        </div>
                        <div class="lesson-status" id="status-7">🔘</div>
                    </a></li>
                    
                    <li><a href="#" onclick="loadContent('bai/bai8.php', 8)" data-lesson="8" class="lesson-item">
                        <div class="lesson-icon">🍪</div>
                        <div class="lesson-info">
                            <span class="lesson-title">Bài 8: Sessions</span>
                            <span class="lesson-desc">Session Management</span>
                        </div>
                        <div class="lesson-status" id="status-8">🔘</div>
                    </a></li>
                    
                    <li><a href="#" onclick="loadContent('bai/bai9.php', 9)" data-lesson="9" class="lesson-item">
                        <div class="lesson-icon">🗄️</div>
                        <div class="lesson-info">
                            <span class="lesson-title">Bài 9: Database</span>
                            <span class="lesson-desc">MySQL Integration</span>
                        </div>
                        <div class="lesson-status" id="status-9">🔘</div>
                    </a></li>
                    
                    <li><a href="#" onclick="loadContent('bai/bai10.php', 10)" data-lesson="10" class="lesson-item">
                        <div class="lesson-icon">🚀</div>
                        <div class="lesson-info">
                            <span class="lesson-title">Bài 10: Advanced</span>
                            <span class="lesson-desc">OOP & Best Practices</span>
                        </div>
                        <div class="lesson-status" id="status-10">🔘</div>
                    </a></li>
                </ul>
                
                <!-- Progress Section -->
                <div class="progress-section">
                    <div class="progress-title">📈 Tiến độ học tập</div>
                    <div class="progress-container">
                        <div class="progress-fill" id="progressFill" style="width: 0%"></div>
                        <span class="progress-text" id="progressText">0%</span>
                    </div>
                </div>
            </div>

            <!-- Enhanced Main Content -->
            <div class="main">
                <div class="main-header">
                    <div class="breadcrumb" id="breadcrumb">
                        <span>🏠 Trang chủ</span>
                    </div>
                    
                    <div class="main-controls">
                        <button onclick="refreshContent()" class="control-btn" title="Refresh">
                            <span>🔄</span>
                        </button>
                        <button onclick="toggleFullscreen()" class="control-btn" title="Full Screen">
                            <span>⛶</span>
                        </button>
                        <button onclick="printContent()" class="control-btn" title="Print">
                            <span>🖨️</span>
                        </button>
                    </div>
                </div>
                
                <div class="iframe-container">
                    <div class="iframe-loading" id="iframeLoading">
                        <div class="spinner"></div>
                        <span>Đang tải nội dung...</span>
                    </div>
                    
                    <iframe id="contentFrame" 
                            src="https://codegym.vn/blog/hoc-lap-trinh-php-online/" 
                            title="Nội dung bài học"
                            onload="hideIframeLoading()"
                            sandbox="allow-same-origin allow-scripts allow-forms allow-popups">
                        <p>Trình duyệt của bạn không hỗ trợ iframe. 
                           <a href="https://codegym.vn/blog/hoc-lap-trinh-php-online/" target="_blank">Nhấp vào đây để xem nội dung</a>
                        </p>
                    </iframe>
                </div>
                
                <!-- Floating Action Button -->
                <div class="fab-container">
                    <button class="fab" onclick="scrollToTop()" title="Scroll to top">
                        <span>⬆️</span>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Toast Notification -->
        <div class="toast" id="toast">
            <div class="toast-content">
                <span class="toast-icon">✅</span>
                <span class="toast-message" id="toastMessage">Thông báo</span>
            </div>
            <button class="toast-close" onclick="hideToast()">✖️</button>
        </div>
        
        <!-- Footer Section -->
        <?php include("includes/footer.php"); ?>
    </div>
    
    <!-- Enhanced JavaScript -->
    <script>
        // Global variables
        let completedLessons = JSON.parse(localStorage.getItem('completedLessons')) || [];
        let currentLesson = null;
        
        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            // Hide loading screen after page load
            setTimeout(() => {
                document.getElementById('loadingScreen').style.opacity = '0';
                document.getElementById('loadingScreen').style.visibility = 'hidden';
                document.getElementById('mainContent').classList.add('loaded');
                updateProgress();
            }, 1500);
            
            // Initialize completed lessons
            completedLessons.forEach(lessonId => {
                markLessonComplete(lessonId, false);
            });
        });
        
        // Enhanced load content function
        function loadContent(url, lessonId) {
            currentLesson = lessonId;
            
            // Show loading indicator
            showIframeLoading();
            
            // Update progress bar
            updateProgressBar(30);
            
            // Update iframe src
            const iframe = document.getElementById('contentFrame');
            iframe.src = url;
            
            // Update breadcrumb
            updateBreadcrumb(lessonId);
            
            // Highlight active lesson
            highlightActiveLesson(lessonId);
            
            // Show toast notification
            showToast(`📚 Đang tải bài ${lessonId}...`, 'info');
            
            // Complete progress bar
            setTimeout(() => {
                updateProgressBar(100);
                setTimeout(() => updateProgressBar(0), 500);
            }, 1000);
        }
        
        // Show iframe loading
        function showIframeLoading() {
            document.getElementById('iframeLoading').style.display = 'flex';
        }
        
        // Hide iframe loading
        function hideIframeLoading() {
            document.getElementById('iframeLoading').style.display = 'none';
            
            if (currentLesson) {
                markLessonComplete(currentLesson);
                showToast(`✅ Bài ${currentLesson} đã được tải!`, 'success');
            }
        }
        
        // Mark lesson as complete
        function markLessonComplete(lessonId, save = true) {
            const statusElement = document.getElementById(`status-${lessonId}`);
            if (statusElement) {
                statusElement.textContent = '✅';
                statusElement.style.color = '#10b981';
            }
            
            if (save && !completedLessons.includes(lessonId)) {
                completedLessons.push(lessonId);
                localStorage.setItem('completedLessons', JSON.stringify(completedLessons));
                updateProgress();
            }
        }
        
        // Update progress
        function updateProgress() {
            const total = 10;
            const completed = completedLessons.length;
            const percentage = Math.round((completed / total) * 100);
            
            document.getElementById('completedLessons').textContent = completed;
            document.getElementById('progressFill').style.width = percentage + '%';
            document.getElementById('progressText').textContent = percentage + '%';
        }
        
        // Update progress bar
        function updateProgressBar(percentage) {
            document.getElementById('progressBar').style.width = percentage + '%';
        }
        
        // Update breadcrumb
        function updateBreadcrumb(lessonId) {
            const breadcrumb = document.getElementById('breadcrumb');
            breadcrumb.innerHTML = `
                <span>🏠 Trang chủ</span>
                <span> / </span>
                <span>📚 Bài ${lessonId}</span>
            `;
        }
        
        // Highlight active lesson
        function highlightActiveLesson(lessonId) {
            // Remove previous active
            document.querySelectorAll('.lesson-item').forEach(item => {
                item.classList.remove('active');
            });
            
            // Add active to current
            const currentItem = document.querySelector(`[data-lesson="${lessonId}"]`);
            if (currentItem) {
                currentItem.classList.add('active');
            }
        }
        
        // Search lessons
        function searchLessons() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const lessons = document.querySelectorAll('.lesson-item');
            
            lessons.forEach(lesson => {
                const title = lesson.querySelector('.lesson-title').textContent.toLowerCase();
                const desc = lesson.querySelector('.lesson-desc').textContent.toLowerCase();
                
                if (title.includes(searchTerm) || desc.includes(searchTerm)) {
                    lesson.parentElement.style.display = 'block';
                } else {
                    lesson.parentElement.style.display = 'none';
                }
            });
        }
        
        // Refresh content
        function refreshContent() {
            if (currentLesson) {
                const iframe = document.getElementById('contentFrame');
                showIframeLoading();
                iframe.src = iframe.src;
                showToast('🔄 Đang làm mới nội dung...', 'info');
            }
        }
        
        // Toggle fullscreen
        function toggleFullscreen() {
            const iframe = document.getElementById('contentFrame');
            
            if (!document.fullscreenElement) {
                iframe.requestFullscreen().catch(err => {
                    showToast('❌ Không thể chuyển fullscreen', 'error');
                });
            } else {
                document.exitFullscreen();
            }
        }
        
        // Print content
        function printContent() {
            const iframe = document.getElementById('contentFrame');
            iframe.contentWindow.print();
        }
        
        // Scroll to top
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
        
        // Toast notification system
        function showToast(message, type = 'info') {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toastMessage');
            const toastIcon = toast.querySelector('.toast-icon');
            
            // Set message and icon based on type
            toastMessage.textContent = message;
            
            switch(type) {
                case 'success':
                    toastIcon.textContent = '✅';
                    toast.style.background = 'rgba(16, 185, 129, 0.9)';
                    break;
                case 'error':
                    toastIcon.textContent = '❌';
                    toast.style.background = 'rgba(239, 68, 68, 0.9)';
                    break;
                case 'info':
                default:
                    toastIcon.textContent = 'ℹ️';
                    toast.style.background = 'rgba(59, 130, 246, 0.9)';
                    break;
            }
            
            // Show toast
            toast.classList.add('show');
            
            // Auto hide after 3 seconds
            setTimeout(hideToast, 3000);
        }
        
        function hideToast() {
            document.getElementById('toast').classList.remove('show');
        }
        
        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Ctrl + R: Refresh
            if (e.ctrlKey && e.key === 'r') {
                e.preventDefault();
                refreshContent();
            }
            
            // F11: Fullscreen
            if (e.key === 'F11') {
                e.preventDefault();
                toggleFullscreen();
            }
            
            // Ctrl + F: Focus search
            if (e.ctrlKey && e.key === 'f') {
                e.preventDefault();
                document.getElementById('searchInput').focus();
            }
        });
        
        // Auto-save progress
        window.addEventListener('beforeunload', function() {
            localStorage.setItem('completedLessons', JSON.stringify(completedLessons));
        });
        
        // Service Worker Registration (Progressive Web App)
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/sw.js')
                .then(registration => console.log('SW registered'))
                .catch(error => console.log('SW registration failed'));
        }
    </script>
</body>
</html>