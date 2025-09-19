<?php
session_start();
if (isset($_SESSION['error'])) {
    echo "<p style='color:red; text-align:center;'>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']);
}
if (isset($_SESSION['success'])) {
    echo "<p style='color:green; text-align:center;'>" . $_SESSION['success'] . "</p>";
    unset($_SESSION['success']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .auth-container {
            width: 100%;
            max-width: 420px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 40px 35px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .auth-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            border-radius: 20px 20px 0 0;
        }

        .auth-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        .auth-header {
            text-align: center;
            margin-bottom: 35px;
        }

        .auth-header h2 {
            color: #2d3748;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .auth-header p {
            color: #718096;
            font-size: 0.95rem;
        }

        /* Form Styles */
        .auth-form {
            display: block;
        }

        .auth-form.hidden {
            display: none;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group input {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 16px;
            background: #f8fafc;
            transition: all 0.3s ease;
            outline: none;
        }

        .form-group input:focus {
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .form-group input::placeholder {
            color: #a0aec0;
            transition: color 0.3s ease;
        }

        .form-group input:focus::placeholder {
            color: #cbd5e0;
        }

        .submit-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
            margin-bottom: 25px;
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.6s ease;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        /* Auth Links */
        .auth-links {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .auth-link {
            color: #667eea;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }

        .auth-link:hover {
            color: #764ba2;
            transform: translateY(-1px);
        }

        .auth-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            transition: width 0.3s ease;
        }

        .auth-link:hover::after {
            width: 100%;
        }

        /* Switch Form Text */
        .switch-form {
            text-align: center;
            color: #718096;
            font-size: 0.95rem;
        }

        .switch-form .switch-link {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            margin-left: 5px;
            transition: all 0.3s ease;
        }

        .switch-form .switch-link:hover {
            color: #764ba2;
            text-decoration: underline;
        }

        /* Loading state for buttons */
        .submit-btn.loading {
            opacity: 0.8;
            pointer-events: none;
        }

        .submit-btn.loading::after {
            content: '';
            position: absolute;
            width: 16px;
            height: 16px;
            border: 2px solid transparent;
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        @keyframes spin {
            to {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        /* Animation for form appearance */
        .auth-container {
            animation: slideInUp 0.6s ease-out;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Form transition animation */
        .auth-form {
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 480px) {
            body {
                padding: 10px;
            }
            
            .auth-container {
                padding: 30px 25px;
            }
            
            .auth-header h2 {
                font-size: 1.6rem;
            }
            
            .form-group input {
                padding: 12px 16px;
                font-size: 15px;
            }
            
            .submit-btn {
                padding: 12px;
                font-size: 15px;
            }

            .auth-links {
                flex-direction: column;
                align-items: center;
                gap: 15px;
            }
        }

        /* Focus ring for accessibility */
        .form-group input:focus,
        .submit-btn:focus,
        .auth-link:focus {
            outline: 2px solid #667eea;
            outline-offset: 2px;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <!-- Login Form -->
        <form id="loginForm" class="auth-form" action="process_login.php" method="POST">
            <div class="auth-header">
                <h2>Đăng Nhập</h2>
                <p>Chào mừng bạn trở lại!</p>
            </div>
            
            <div class="form-group">
                <input type="text" name="username" placeholder="Tên đăng nhập hoặc Email" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Mật khẩu" required>
            </div>
            
            <button type="submit" class="submit-btn">Đăng Nhập</button>
            
            <div class="auth-links">
                <a href="#" class="auth-link" id="forgotPasswordLink">Quên mật khẩu?</a>
            </div>
            
            <div class="switch-form">
                Chưa có tài khoản?
                <a href="#" class="switch-link" id="showRegister">Đăng ký ngay</a>
            </div>
        </form>

        <!-- Register Form -->
        <form id="registerForm" class="auth-form hidden" action="process_register.php" method="POST">
            <div class="auth-header">
                <h2>Đăng Ký</h2>
                <p>Tạo tài khoản mới</p>
            </div>
            
            <div class="form-group">
                <input type="text" name="username" placeholder="Tên đăng nhập" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Địa chỉ Email" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Mật khẩu" required>
            </div>
            <div class="form-group">
                <input type="text" name="fullname" placeholder="Họ và tên">
            </div>
            <div class="form-group">
                <input type="text" name="company" placeholder="Công ty">
            </div>
            
            <button type="submit" class="submit-btn">Tạo Tài Khoản</button>
            
            <div class="switch-form">
                Đã có tài khoản?
                <a href="#" class="switch-link" id="showLogin">Đăng nhập ngay</a>
            </div>
        </form>

        <!-- Forgot Password Form -->
        <form id="forgotPasswordForm" class="auth-form hidden" action="process_forgot_password.php" method="POST">
            <div class="auth-header">
                <h2>Quên Mật Khẩu</h2>
                <p>Nhập email để khôi phục mật khẩu</p>
            </div>
            
            <div class="form-group">
                <input type="email" name="email" placeholder="Địa chỉ Email" required>
            </div>
            
            <button type="submit" class="submit-btn">Gửi Link Khôi Phục</button>
            
            <div class="switch-form">
                Nhớ ra mật khẩu?
                <a href="#" class="switch-link" id="backToLogin">Quay lại đăng nhập</a>
            </div>
        </form>
    </div>

    <script>
        // Form switching functionality
        const loginForm = document.getElementById('loginForm');
        const registerForm = document.getElementById('registerForm');
        const forgotPasswordForm = document.getElementById('forgotPasswordForm');
        
        const showRegisterLink = document.getElementById('showRegister');
        const showLoginLink = document.getElementById('showLogin');
        const forgotPasswordLink = document.getElementById('forgotPasswordLink');
        const backToLoginLink = document.getElementById('backToLogin');

        // Show register form
        showRegisterLink.addEventListener('click', function(e) {
            e.preventDefault();
            loginForm.classList.add('hidden');
            forgotPasswordForm.classList.add('hidden');
            registerForm.classList.remove('hidden');
            registerForm.style.animation = 'fadeIn 0.5s ease-out';
        });

        // Show login form
        showLoginLink.addEventListener('click', function(e) {
            e.preventDefault();
            registerForm.classList.add('hidden');
            forgotPasswordForm.classList.add('hidden');
            loginForm.classList.remove('hidden');
            loginForm.style.animation = 'fadeIn 0.5s ease-out';
        });

        // Show forgot password form
        forgotPasswordLink.addEventListener('click', function(e) {
            e.preventDefault();
            loginForm.classList.add('hidden');
            registerForm.classList.add('hidden');
            forgotPasswordForm.classList.remove('hidden');
            forgotPasswordForm.style.animation = 'fadeIn 0.5s ease-out';
        });

        // Back to login from forgot password
        backToLoginLink.addEventListener('click', function(e) {
            e.preventDefault();
            forgotPasswordForm.classList.add('hidden');
            registerForm.classList.add('hidden');
            loginForm.classList.remove('hidden');
            loginForm.style.animation = 'fadeIn 0.5s ease-out';
        });

        // Add loading state to buttons on form submission
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function() {
                const submitBtn = this.querySelector('.submit-btn');
                submitBtn.classList.add('loading');
            });
        });

        // Keyboard navigation support
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                // Close any modal or go back to login
                forgotPasswordForm.classList.add('hidden');
                registerForm.classList.add('hidden');
                loginForm.classList.remove('hidden');
            }
        });
    </script>
</body>
</html>