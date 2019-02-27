<?php
  //Create Coinnection
  $conn = mysqli_connect('localhost', 'root', 'caf', 'crunch');

  //Check connection_aborted
  if(mysqli_connect_errno()){
    //Connection Failed
    echo 'Failed to connect to MySQL ' . mysqli_connect_errno;
  }
