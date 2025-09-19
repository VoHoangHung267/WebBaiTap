<?php
// process_login.php - PostgreSQL Version (Improved)
session_start();
include('../db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    
    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Vui lòng điền đầy đủ thông tin!";
        header("Location: auth.php");
        exit();
    }
    
    try {
        // Check user exists (username or email)
        $query = "SELECT id, username, email, password, fullname, company, faculty, class_name, course 
                  FROM users 
                  WHERE username = :username OR email = :username";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        
        if ($stmt->rowCount() === 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (password_verify($password, $user['password'])) {
                // Regenerate session ID for security
                session_regenerate_id(true);
                
                $_SESSION['user_id']   = $user['id'];
                $_SESSION['username']  = $user['username'];
                $_SESSION['email']     = $user['email'];
                $_SESSION['fullname']  = $user['fullname'];
                $_SESSION['company']   = $user['company'];
                $_SESSION['faculty']   = $user['faculty'];
                $_SESSION['class']     = $user['class_name'];
                $_SESSION['course']    = $user['course'];
                $_SESSION['success']   = "Đăng nhập thành công!";
                
                // Update last login time (optional)
                $update_query = "UPDATE users SET last_login = CURRENT_TIMESTAMP WHERE id = :id";
                $update_stmt  = $pdo->prepare($update_query);
                $update_stmt->bindParam(':id', $user['id']);
                $update_stmt->execute();
                
                // ✅ Redirect về trang chủ - sử dụng đường dẫn tương đối
                header("Location: /webbaitap/index.php");
                exit();
            } else {
                $_SESSION['error'] = "Mật khẩu không đúng!";
                header("Location: /webbaitap/auth/auth.php");
                exit();

            }
        } else {
            $_SESSION['error'] = "Tài khoản không tồn tại!";
            header("Location: /webbaitap/auth/auth.php");
            exit();

        }
        
    } catch (PDOException $e) {
        $_SESSION['error'] = "Lỗi đăng nhập: " . $e->getMessage();
        header("Location: /webbaitap/auth/auth.php");
        exit();

    }
} else {
    // Nếu không phải POST request, chuyển về trang auth
    header("Location: /webbaitap/auth/auth.php");
    exit();

}
?>