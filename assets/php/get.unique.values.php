<?php

  include 'dbconnection.php';

  $column = $_POST['column'];
  $table = $_POST['table'];

  $sql = "SELECT DISTINCT $column FROM $table";
  $result = $conn->query($sql);
 
  $array = array();
  while($row = $result->fetch_array()){
    echo $row[$column].';';   //csv format

  }

  mysqli_close($conn);
?>