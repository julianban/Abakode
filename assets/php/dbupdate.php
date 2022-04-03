<?php
  
  include 'dbconnection.php';

  
  $item = $_POST['item'];
  $newbrand = $_POST['newbrand'];
  $brand = $_POST['brand'];
  $address_location = $_POST['address_location'];
  $city = $_POST['city'];
  $link = $_POST['link'];
  
  if($newbrand != '') $brand = $newbrand;
  include 'checkAlreadyExist.php';

  if($already_exist == 'false'){

    if($newbrand != ''){
      $sql = "INSERT INTO brands (name) VALUES ('$newbrand');";
      $conn->query($sql);
      $id_brand = $conn->insert_id;
    }else{
      $sql = "SELECT brands.ID FROM brands WHERE brands.name = '$brand'";
      $id_brand = $conn->query($sql)->fetch_array()[0];
    }

    
    $sql = "INSERT INTO stores (address_location, city, id_brand) VALUES ('$address_location','$city',$id_brand)";
    $conn->query($sql);

    $id_store = $conn->insert_id;
    $sql = "INSERT INTO items (name,id_store,link) VALUES ('$item', $id_store,'$link');";
    $conn->query($sql);

    echo 'success';
  }else{
    echo 'already exist';
  }
  
?>