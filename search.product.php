<?php
    //connect to database
    include 'dbconnection.php';

    $brand = $_POST['brand'];
    $item = $_POST['item'];
    $city = $_POST['city'];
    
    //search product-item on db matching the name and city-location
    $sql = "SELECT * FROM items
    JOIN stores ON stores.ID=items.id_store
    WHERE MATCH(name) AGAINST('$item')
    AND MATCH(city) AGAINST('$city')";    

    $result = $conn->query($sql);

    if($result->num_rows>0){ //if there's any result then
        $row=$result->fetch_assoc();
        
        /*
        echo 'item:'.$row['name'];
        echo 'location:'.$row['address_location'];
        echo 'ID_item:'.$row['ID'];
        */



        //UPDATE TABLE LOG
        //get date time 
        $currentDateTime = new DateTime();
        //$currentDateTime->setTimezone(new DateTimeZone('Europe/Rome'));
        $result=$currentDateTime->format('y-m-d H:i:s');   
        //get item ID
        $id_item = $row['ID'];
        //update table log
        $sql = "INSERT INTO searchLogs (date_time,id_item)  VALUES ('$result','$id_item')";
        $conn->query($sql);

        //redirect to associeted link
        echo $row['link'];

    }else{
        echo 'nessun risultato';
    }
    
    mysqli_close($conn);
?>