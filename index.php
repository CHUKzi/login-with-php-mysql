<?php 
session_start();
require_once('includes/connection.php');
$warnings = '';
if (isset($_POST['login'])) {
  
  $email             =  $_POST['email'];
  $hashed_password   =  sha1($_POST['password']);

  $query = "SELECT * FROM users WHERE email = '{$email}' AND password = '{$hashed_password}' LIMIT 1";
  $result_set = mysqli_query($connection, $query);

  if ($result_set) {
    if (mysqli_num_rows($result_set) == 1) {
      $user = mysqli_fetch_assoc($result_set);
      $_SESSION['user_id'] = $user['id'];
      $query = "UPDATE users SET last_login = NOW() ";
      $query .= "WHERE id = {$_SESSION['user_id']} LIMIT 1";
      $result_set = mysqli_query($connection, $query);
      header('Location: account.php');
    } else {

      $warnings =  "Invalid Username / Password";
    }
  } else {
	$warnings ="Somethin is wrong";
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>NIBM USER LOGIn SYSTEM</title>
	<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.container {
  padding: 16px;
  background-color: white;
}

input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

a {
  color: dodgerblue;
}

.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form method="post">
  <div class="container">
    <h1>NIBM USER LOGIN</h1>
    <p style="color: #FF2D00;"><?php echo $warnings; ?></p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="psw" required>

    <button type="submit" class="registerbtn" name="login">LOGIN</button>
  </div>
  

  <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div>
</form>

	
</body>
</html>
<?php mysqli_close($connection); ?>