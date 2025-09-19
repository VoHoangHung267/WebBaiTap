<?php
// process_forgot_password.php - PostgreSQL Version
session_start();
include('../db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    
    if (empty($email)) {
        $_SESSION['error'] = "Vui lòng nhập địa chỉ email!";
        header("Location: index.php");
        exit();
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Email không hợp lệ!";
        header("Location: index.php");
        exit();
    }
    
    try {
        // Check if email exists
        $query = "SELECT id, username, email FROM users WHERE email = :email";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch();
            
            // Generate reset token
            $reset_token = bin2hex(random_bytes(32));
            $reset_expires = date('Y-m-d H:i:s', strtotime('+1 hour'));
            
            // Store reset token in database
            $update_query = "UPDATE users SET 
                            reset_token = :token, 
                            reset_expires = :expires 
                            WHERE email = :email";
            $update_stmt = $pdo->prepare($update_query);
            $update_stmt->bindParam(':token', $reset_token);
            $update_stmt->bindParam(':expires', $reset_expires);
            $update_stmt->bindParam(':email', $email);
            
            if ($update_stmt->execute()) {
                // In a real application, you would send an email here
                // For now, we'll just show the reset link
                $reset_link = "http://localhost/WebBaiTap/auth/reset_password.php?token=" . $reset_token;
                
                $_SESSION['success'] = "Link khôi phục mật khẩu đã được gửi! (Demo: " . $reset_link . ")";
                header("Location: index.php");
            } else {
                $_SESSION['error'] = "Có lỗi xảy ra khi tạo link khôi phục!";
                header("Location: index.php");
            }
        } else {
            // Don't reveal if email exists or not for security
            $_SESSION['success'] = "Nếu email tồn tại, link khôi phục đã được gửi!";
            header("Location: index.php");
        }
        
    } catch (PDOException $e) {
        $_SESSION['error'] = "Lỗi hệ thống: " . $e->getMessage();
        header("Location: auth.php");
    }
}
?>