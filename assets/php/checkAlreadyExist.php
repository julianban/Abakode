<?php
  include 'dbconnection.php';

  global $item; 
  global $brand; 
  global $address_location; 
  global $city; 


  $sql = "SELECT count(*) AS numOccurences FROM items 
    JOIN stores ON stores.ID = items.id_store
    JOIN brands ON brands.ID = stores.id_brand
    WHERE items.name = '$item' 
    AND brands.name = '$brand' 
    AND address_location = '$address_location'
    AND city = '$city'
  ";

  $result = $conn->query($sql);  

  if($result->fetch_array()[0] > 0){
    $already_exist = 'true';
  }else{
    $already_exist = 'false';
  }
  echo $already_exist;
    
?>