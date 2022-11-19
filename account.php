<?php 
session_start();

require_once('includes/connection.php');

if (!isset($_SESSION['user_id'])) {
  header('Location:index.php?login=Please_login_and_contune');
} else {
	$query = "SELECT * FROM users WHERE id='{$_SESSION['user_id']}'";
    $login = mysqli_query($connection, $query);
    $login_u = mysqli_fetch_assoc($login);
}

 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>NIBM LMS - <?php echo $login_u['first_name'];?> Profile</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/sticky-footer-navbar/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.1/examples/sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet">
  </head>

  <body>

    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">NIBM LMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="account.php">Home <span class="sr-only">(current)</span></a>
            </li>
          </ul>
          <div class="form-inline mt-2 mt-md-0">
          	<a href="logout.php"><button type="button" class="btn btn-danger">Log Out</button></a>
            
          </div>
        </div>
      </nav>
    </header>


    <main role="main" class="container">
      <h1 class="mt-5">Hello <?php echo $login_u['first_name'];?></h1>
    </main>

    <footer class="footer">
      <div class="container">
        <span class="text-muted"><?php echo $login_u['first_name'];?>All Rights Reserved</span>
      </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>

<?php mysqli_close($connection); ?>