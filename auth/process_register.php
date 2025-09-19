<?php
// process_register.php - PostgreSQL Version (Improved)
session_start();
include('../db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'] ?? '';
    $fullname = trim($_POST['fullname']);
    $company = trim($_POST['company']);
    
    // Validation
    if (empty($username) || empty($email) || empty($password)) {
        $_SESSION['error'] = "Vui lòng điền đầy đủ thông tin bắt buộc!";
        header("Location: auth.php");
        exit();
    }
    
    // Password confirmation check
    if (!empty($confirm_password) && $password !== $confirm_password) {
        $_SESSION['error'] = "Xác nhận mật khẩu không khớp!";
        header("Location: auth.php");
        exit();
    }
    
    // Username validation
    if (strlen($username) < 3) {
        $_SESSION['error'] = "Tên đăng nhập phải có ít nhất 3 ký tự!";
        header("Location: auth.php");
        exit();
    }
    
    if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
        $_SESSION['error'] = "Tên đăng nhập chỉ được chứa chữ cái, số và dấu gạch dưới!";
        header("Location: auth.php");
        exit();
    }
    
    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Email không hợp lệ!";
        header("Location: auth.php");
        exit();
    }
    
    // Password strength check
    if (strlen($password) < 6) {
        $_SESSION['error'] = "Mật khẩu phải có ít nhất 6 ký tự!";
        header("Location: auth.php");
        exit();
    }
    
    try {
        // Check if username or email exists
        $check_query = "SELECT id FROM users WHERE username = :username OR email = :email";
        $check_stmt = $pdo->prepare($check_query);
        $check_stmt->bindParam(':username', $username);
        $check_stmt->bindParam(':email', $email);
        $check_stmt->execute();
        
        if ($check_stmt->rowCount() > 0) {
            $_SESSION['error'] = "Tên đăng nhập hoặc email đã tồn tại!";
            header("Location: auth.php");
            exit();
        }
        
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert new user
        $insert_query = "INSERT INTO users (username, email, password, fullname, company, created_at) 
                        VALUES (:username, :email, :password, :fullname, :company, CURRENT_TIMESTAMP)";
        $insert_stmt = $pdo->prepare($insert_query);
        $insert_stmt->bindParam(':username', $username);
        $insert_stmt->bindParam(':email', $email);
        $insert_stmt->bindParam(':password', $hashed_password);
        $insert_stmt->bindParam(':fullname', $fullname);
        $insert_stmt->bindParam(':company', $company);
        
        if ($insert_stmt->execute()) {
            $_SESSION['success'] = "Đăng ký thành công! Vui lòng đăng nhập.";
            header("Location: auth.php");
            exit();
        } else {
            $_SESSION['error'] = "Có lỗi xảy ra khi đăng ký!";
            header("Location: auth.php");
            exit();
        }
        
    } catch (PDOException $e) {
        // Log error for debugging (optional)
        error_log("Registration error: " . $e->getMessage());
        
        $_SESSION['error'] = "Có lỗi xảy ra. Vui lòng thử lại sau!";
        header("Location: auth.php");
        exit();
    }
} else {
    // Nếu không phải POST request, chuyển về trang auth
    header("Location: auth.php");
    exit();
}
?>