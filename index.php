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
@$cat =$_GET['cat'];
$array_img =array();
$data = array();

$i=0;
if(!isset($_GET['cat'])){
  
  $sql = "SELECT prro.id,prro.name,prro.price,prro.count,prro.des,prro.cover,prro.date, prro.offer, cat.cat, brand.brand  FROM prro , cat, brand WHERE
  prro.cat=cat.id AND prro.brand=brand.id ORDER BY prro.id ASC" ;
  }
     else{
      $sql = "SELECT prro.id,prro.name,prro.price,prro.count,prro.des,prro.cover,prro.date, prro.offer, cat.cat, brand.brand  FROM prro , cat, brand WHERE
      prro.cat=cat.id AND prro.brand=brand.id AND cat.cat='$cat'  ORDER BY prro.id ASC" ;
    }
  $result = $conn -> query($sql);
   while($row =$result -> fetch_assoc()){
       $img=$row['cover'];
       $img_arr = explode(",",$img);
       for ($y=0; $y <count($img_arr) ; $y++) { 
        $img_element = "../Full-Stack/adminstrator/assets/images/" .$img_arr[$y];
$array_img[$y] =   $img_element;
       }
     $data[$i]['id']=$row['id'] ;
     $data[$i]['name']= $row['name'] ;   
     $data[$i]['price']= $row['price'];
     $data[$i]['offer']= $row['offer'];
     $data[$i]['count']= $row['count'];
     $data[$i]['brand']= $row['brand'];
     $data[$i]['cat']= $row['cat'];
     $data[$i]['des']=  $row['des'];
     $data[$i]['date']= $row['date'];
     $data[$i]['cover'] = $array_img;
   $i++;
   }

echo json_encode($data,JSON_PRETTY_PRINT);
?>