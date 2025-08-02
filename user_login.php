<?php
session_start();
include('db_connect.php');

$unsuccessfulmsg = '';

// Check if user is already logged in
if (isset($_SESSION['username'])) {
  // header("location:user_index.php?page=home");

    header('Location:user_index.php'); // Redirect to user homepage if already logged in
    exit();
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordmd5 = md5($password);

    $usermsg = empty($username) ? 'Enter an username.' : '';
    $passmsg = empty($password) ? 'Enter your password.' : '';

    if (!empty($username) && !empty($password)) {
        $sql = "SELECT * FROM not_admin WHERE username='$username' AND password = '$passwordmd5'";
        $query = $conn->query($sql);

        if ($query->num_rows > 0) {
            $row = $query->fetch_assoc();
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['email'] = $row['email']; // Store user email in session
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['first_name'] . ' ' . $row['last_name']; // Store full name in session
            header('Location: user_index.php');
            exit();
        } else {
            $unsuccessfulmsg = 'Wrong username or Password!';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bachelor Sphere User Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #a8c0ff, #3faffa);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .login-container {
            max-width: 400px;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
        }

        h2 {
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 600;
            color: #555;
            float: left;
        }

        .form-control {
            border-radius: 20px;
            border: 1.5px solid #ddd;
            padding-left: 20px;
            font-size: 16px;
            height: 45px;
            margin-bottom: 15px;
        }

        .form-control:focus {
            border-color: #3faffa;
            box-shadow: 0 0 8px rgba(63, 250, 255, 0.5);
            outline: none;
        }

        .btn-custom {
            background-color: #3faffa;
            border: none;
            border-radius: 20px;
            width: 100%;
            font-size: 16px;
            font-weight: 600;
            padding: 10px;
            transition: 0.3s;
            margin-top: 10px;
        }

        .btn-custom:hover {
            background-color: #5ab4ff;
        }

        .form-footer {
            margin-top: 20px;
            font-size: 14px;
        }

        .form-footer a {
            color: #3faffa;
            font-weight: bold;
            text-decoration: none;
            transition: color 0.3s;
        }

        .form-footer a:hover {
            color: #a8c0ff;
        }

        .text-danger, .text-success {
            margin-bottom: 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Bachelor Sphere User Login</h2>
        <p class="text-success"><?php if(!empty($_SESSION['signupmsg'])){ echo $_SESSION['signupmsg']; } ?></p>
        <p class="text-danger"><?php echo $unsuccessfulmsg ?></p>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">UserName:</label>
                <input type="username" name="username" class="form-control" placeholder="Enter your username" value="<?php if(isset($_POST['submit'])){echo $username; } ?>">
                <span class="text-danger"><?php if(isset($_POST['submit'])){ echo $usermsg; }?></span>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password">
                <span class="text-danger"><?php if(isset($_POST['submit'])){ echo $passmsg; }?></span>
            </div>
            <button type="submit" name="submit" class="btn btn-custom">Login</button>
            <div class="form-footer">
                Don't have an Account Yet? <a href="signup.php">Sign Up</a><br>
                Login as an Admin? <a href="login.php">Admin LogIn</a>
            </div>
        </form>
    </div>


</body>
</html>
