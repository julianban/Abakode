<?php
    include 'dbconnection.php';

    $ordBy = $_POST['ordBy'];
    $days = $_POST['dateTo'];
    $keywords = $_POST['keywords'];

    if($keywords == ''){    //no keywords
        $sql = "SELECT searchLogs.date_time, items.name as itemName, brands.name as brandName,
            stores.address_location, stores.city
            FROM searchLogs
            JOIN items ON items.ID=searchLogs.id_item       
            JOIN stores ON stores.ID=items.id_store
            JOIN brands ON brands.ID=stores.id_brand
            WHERE date_time > DATE_SUB(now(),INTERVAL $days DAY)    
            ORDER BY searchLogs.date_time $ordBy
        ";
    }else{
        $sql = "SELECT searchLogs.date_time, items.name as itemName, brands.name as brandName,
            stores.address_location, stores.city 
            FROM searchLogs
            JOIN items ON items.ID=searchLogs.id_item       
            JOIN stores ON stores.ID=items.id_store
            JOIN brands ON brands.ID=stores.id_brand
            WHERE (date_time > DATE_SUB(now(),INTERVAL $days DAY))
            AND (city = '$keywords' OR  items.name='$keywords' OR brands.name ='$keywords')
            ORDER BY searchLogs.date_time $ordBy
        ";
    }
   //
    $result = $conn->query($sql);


    if($result->num_rows>0){
        $array = array();
        while($row = $result->fetch_assoc()){
            array_push($array,$row);
        }
        echo json_encode($array);
    }

    mysqli_close($conn);
?>