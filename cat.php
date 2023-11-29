<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type:text/html:charset=UTF-8");
header("Access-Control-Max-Age:3600");

 header("Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization,X-Requested-With");
$server_db = "localhost:3308";
$user_db ="root";
$password_db="";
$db_name ="product";
$conn = new mysqli($server_db,$user_db,$password_db,$db_name);
$conn -> set_charset("utf8");
$cat =array();
$i=0;
$sql = "SELECT * FROM cat WHERE  NOT parent  = 0  ORDER BY id ASC" ;
      
   $result = $conn -> query($sql);
    while($row =$result -> fetch_assoc()){
$cat[$i]['id']= $row['id'];
$cat[$i]['cat']= $row['cat'];
$i++;
        
    }
    echo json_encode($cat,JSON_PRETTY_PRINT);
?>