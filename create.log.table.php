<?php
    include 'dbconnection.php';

    $ordBy = $_POST['ordBy'];
    $days = $_POST['dateTo'];
    $keywords = $_POST['keywords'];

    if($keywords == ''){
        $sql = "SELECT * FROM searchLogs
        JOIN items ON items.ID=searchLogs.id_item       
        JOIN stores ON stores.ID=items.id_store
        JOIN brands ON brands.ID=stores.id_brand
        WHERE date_time > DATE_SUB(now(),INTERVAL $days DAY)    
        ORDER BY searchLogs.date_time $ordBy";
    }else{
        $sql = "SELECT * FROM searchLogs
        JOIN items ON items.ID=searchLogs.id_item       
        JOIN stores ON stores.ID=items.id_store
        JOIN brands ON brands.ID=stores.id_brand
        WHERE date_time > DATE_SUB(now(),INTERVAL $days DAY)
        || city = $keywords
        ORDER BY searchLogs.date_time $ordBy";
    }
   
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