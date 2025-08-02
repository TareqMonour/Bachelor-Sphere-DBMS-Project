<?php
session_start();
include('db_connect.php');

if(isset($_POST['submit'])){
    $first_name = $_POST['first_name'];
    $last_name  = $_POST['last_name'];
    $username      = $_POST['username'];
    $email      = $_POST['email'];
    $password   = $_POST['password'];
    $passwordagain    = $_POST['passwordagain'];
    $md5password      = md5($password);

    // Initialize error messages
    $emptymsg1 = $emptymsg2 = $emptymsg3 = $emptymsg4 = $emptymsg5 = $emptymsg6 = $pasmatchmsg = '';

    // Check for empty fields
    if(empty($first_name)){
        $emptymsg1 = 'Write Firstname';
    }
    if(empty($last_name)){
        $emptymsg2 = 'Write Lastname';
    }
    if(empty($username)){
        $emptymsg3 = 'Write username';
    }
    if(empty($email)){
        $emptymsg4 = 'Write email';
    }
    if(empty($password)){
        $emptymsg5 = 'Write password';
    }
    if(empty($passwordagain)){
        $emptymsg6 = 'Write password Again';
    }

    // Proceed if all fields are filled
    if(!empty($first_name) && !empty($last_name) && !empty($username) && !empty($email) && !empty($password) && !empty($passwordagain)){
        if($password !== $passwordagain){
            $pasmatchmsg = 'Password does not Match!';
        } else {
            $pasmatchmsg = '';

            // Insert query with dynamic username creation
            $sql = "INSERT INTO not_admin (first_name, last_name, username, name, email, password) 
                    VALUES ('$first_name', '$last_name','$username', CONCAT('$first_name', '_', '$last_name'), '$email', '$md5password')";

            if($conn->query($sql) === TRUE){
                $_SESSION['signupmsg'] = 'Sign Up Complete. Please Log in Now.';
                header('location:user_login.php');
                exit();
            } else {
                echo 'Data not Inserted: ' . $conn->error;
            }
        }
    } else {
        $emptymsg = 'Fill up All Fields';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #a2c2e8, #004a8f);
            font-family: 'Arial', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            max-width: 400px; /* Smaller form */
        }

        h3 {
            color: #3498db;
        }

        .bg-light {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            border: 2px solid #dcdcdc;
        }

        label {
            color: #333;
            font-weight: bold;
        }

        .form-control {
            border-radius: 8px;
            padding: 10px;
            font-size: 16px;
            background-color: #f0f8ff;
            border: 2px solid #3498db;
        }

        .form-control:focus {
            border-color: #2980b9;
            box-shadow: 0 0 10px rgba(41, 128, 185, 0.5);
        }

        .btn-success {
            background-color: #2ecc71;
            border-color: #27ae60;
            border-radius: 30px;
            padding: 12px;
            font-size: 18px;
            width: 100%;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-success:hover {
            background-color: #27ae60;
            transform: scale(1.05);
        }

        .text-danger {
            color: #e74c3c;
            font-size: 14px;
        }

        .text-decoration-none {
            color: #3498db;
            font-weight: bold;
        }

        .text-decoration-none:hover {
            color: #2980b9;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3 class="text-center">Sign Up Form</h3>
        <div class="bg-light p-4">
            <form action="" method="POST">
                <div class="mt-2 pb-2">
                    <label for="firstname">First Name:</label>
                    <input type="text" name="first_name" class="form-control" placeholder="Your First Name" value="<?php if(isset($_POST['submit'])){echo $first_name; } ?>">
                    <span class="text-danger"><?php if(isset($_POST['submit'])){ echo $emptymsg1; }?></span>
                </div>
                <div class="mt-2 pb-2">
                    <label for="last_name">Last Name:</label>
                    <input type="text" name="last_name" class="form-control" placeholder="Your Last Name" value="<?php if(isset($_POST['submit'])){echo $last_name; } ?>">
                    <span class="text-danger"><?php if(isset($_POST['submit'])){ echo $emptymsg2; }?></span>
                </div>
                <div class="mt-2 pb-2">
                    <label for="username">UserName:</label>
                    <input type="text" name="username" class="form-control" placeholder="Your UserName" value="<?php if(isset($_POST['submit'])){echo $username; } ?>">
                    <span class="text-danger"><?php if(isset($_POST['submit'])){ echo $emptymsg3; }?></span>
                </div>
                <div class="mt-2 pb-2">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" value="<?php if(isset($_POST['submit'])){echo $email; } ?>">
                    <span class="text-danger"><?php if(isset($_POST['submit'])){ echo $emptymsg4; }?></span>
                </div>
                <div class="mt-1 pb-2">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter New password">
                    <span class="text-danger"><?php if(isset($_POST['submit'])){ echo $emptymsg5; }?></span>
                </div>
                <div class="mt-1 pb-2">
                    <label for="password">Password Again:</label>
                    <input type="password" name="passwordagain" class="form-control" placeholder="Enter password Again">
                    <span class="text-danger"><?php if(isset($_POST['submit'])){ echo $emptymsg6.''.$pasmatchmsg; }?></span>
                </div>
                <div class="mt-1 pb-2">
                    <button name="submit" class="btn btn-success">Sign Up</button>
                </div>
                <div class="mt-1 pb-2">
                    Already have an Account? <a href="user_login.php" class="text-decoration-none">Login</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
