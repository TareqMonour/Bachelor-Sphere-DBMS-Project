<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');
ob_start();
if(!isset($_SESSION['system'])){
	$system = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	foreach($system as $k => $v){
		$_SESSION['system'][$k] = $v;
	}
}
ob_end_flush();
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $_SESSION['system']['name'] ?></title>
 	

<?php include('./header.php'); ?>
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>

</head>
<style>
	body{
		width: 100%;
	    height: 100vh;
	    display: flex;
	    align-items: center;
	    justify-content: center;
	    background: linear-gradient(135deg, #a8c0ff, #3faffa); /* Gradient background */
	    margin: 0;
	    font-family: Arial, sans-serif;
	}

	#login-form-container {
		width: 100%;
		max-width: 350px; /* Slightly square shape */
		padding: 30px;
		background: white;
		border-radius: 15px; /* Rounded corners */
		box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
		display: flex;
		flex-direction: column;
		align-items: center;
	}

	h4 {
		font-size: 1.7rem;
		color: #333;
		text-align: center;
		margin-bottom: 25px;
	}

	.form-group {
		width: 100%;
		margin-bottom: 20px;
	}

	.form-group label {
		display: block;
		margin-bottom: 5px;
		color: #555;
	}

	.form-control {
		width: 100%;
		padding: 12px;
		border: 1px solid #ccc;
		border-radius: 5px;
		font-size: 1rem;
	}

	.btn-primary {
		width: 100%;
		padding: 12px;
		background-color: #007bff;
		border: none;
		border-radius: 5px;
		color: white;
		font-size: 1rem;
		cursor: pointer;
	}

	.btn-primary:hover {
		background-color: #0056b3;
	}

	.alert-danger {
		color: white;
		background-color: #d9534f;
		border-radius: 5px;
		padding: 10px;
		margin-bottom: 15px;
		text-align: center;
	}

	.form-footer {
		margin-top: 20px;
		text-align: center;
		color: #333;
	}

	.form-footer a {
		color: #007bff;
		text-decoration: none;
		font-weight: bold;
	}

	.form-footer a:hover {
		text-decoration: underline;
	}
</style>

<body>
  
  <div id="login-form-container">
	<h4><?php echo $_SESSION['system']['name'] ?> Admin Login</h4>
	<form id="login-form">
		<div class="form-group">
			<label for="username" class="form-label">UserName:</label>
			<input type="text" id="username" name="username" class="form-control" placeholder="Enter Your username" required>
		</div>
		<div class="form-group">
			<label for="password" class="form-label">Password:</label>
			<input type="password" id="password" name="password" class="form-control" placeholder="Enter Your password" required>
		</div>
		<button type="submit" class="btn-primary">Login</button>

		<div class="form-footer">
                Login as a User? <a href="user_login.php">User LogIn</a>
            </div>
	</form>
  </div>

<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('button[type="submit"]').attr('disabled', true).text('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error: err => {
				console.log(err)
				$('button[type="submit"]').removeAttr('disabled').text('Login');
			},
			success: function(resp) {
				if(resp == 1){
					location.href = 'index.php?page=home';
				} else {
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('button[type="submit"]').removeAttr('disabled').text('Login');
				}
			}
		})
	})
</script>

</body>
</html>
