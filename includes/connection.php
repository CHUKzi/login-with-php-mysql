<?php

  $connection = mysqli_connect('localhost', 'root', '', 'nibm');

  if (mysqli_connect_errno()) {
    die('Database connection failed ' . mysqli_connect_error());
  } else {
    echo "";
  }

?>