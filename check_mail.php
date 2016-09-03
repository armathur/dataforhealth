<?php //  
    
    
//mysql_select_db("database-name",$con);  
$mysqli =  mysqli_connect("127.9.15.2", "adminDutPG53", "Mg9KGY9Lslrl", "hms");
$resultll = mysqli_query($mysqli,"SELECT MAX(message_id) AS maxId,COUNT(message_id) AS totalUnread FROM messages WHERE message_status=0");

//    $max = mysql_result($result,0,'maxId');
//    $total =mysql_result($result,0,'totalUnread');  
while ($row = mysqli_fetch_array($resultll)) {

   $max = $row["maxId"];
   $total =$row['totalUnread']; 
      
    
}

$encodable_arr = array('maxId' => $max, 'totalUnread' => $total);
  echo json_encode($encodable_arr);

     
?>  