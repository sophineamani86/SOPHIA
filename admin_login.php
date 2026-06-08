<?php
/**
 * Admin Login - BARCO MILY COMPANY
 */

session_start();

$error = '';

$admin_user = 'admin';
$admin_pass = 'ufugaji123';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if ($username === $admin_user && $password === $admin_pass) {
        $_SESSION['admin'] = true;
        $_SESSION['admin_user'] = $username;
        header('Location: admin.php');
        exit;
    } else {
        $error = 'Jina la mtumaji au neno la siri sio sahihi!';
    }
}
?>
<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Ingia | BARCO MILY</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .login-container {
            max-width: 400px;
            margin: 80px auto;
            padding: 40px;
            background: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .login-container h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #555;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }
        .form-group input:focus {
            outline: none;
            border-color: #ff9800;
            box-shadow: 0 0 5px rgba(255,152,0,0.3);
        }
        .btn-login {
            width: 100%;
            padding: 12px;
            background: #ff9800;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }
        .btn-login:hover {
            background: #f57c00;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 12px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .back-link {
            text-align: center;
            margin-top: 20px;
        }
        .back-link a {
            color: #ff9800;
            text-decoration: none;
        }
        .back-link a:hover {
            text-decoration: underline;
        }
        .credentials {
            margin-top: 30px;
            padding: 15px;
            background: #e3f2fd;
            border-radius: 4px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>🔐 Admin Ingia</h1>
        
        <?php if ($error): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="form-group">
                <label for="username">Jina la Mtumaji:</label>
                <input type="text" id="username" name="username" required autofocus>
            </div>
            
            <div class="form-group">
                <label for="password">Neno la Siri:</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit" class="btn-login">Ingia</button>
        </form>
        
        <div class="back-link">
            <a href="index.html">← Kurudi kwenye home</a>
        </div>
        
        <div class="credentials">
            <strong>Demo Credentials:</strong><br>
            Username: <code>admin</code><br>
            Password: <code>ufugaji123</code>
        </div>
    </div>
</body>
</html>
