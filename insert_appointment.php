<?php

$date = strtotime($_GET['date']);
$p_id= $_GET['r'];
$d_id = $_GET['s'];

//$date1 = date("Y-m-d H:i:s",$date);
$dateInfo = date("Y-m-d H:i:s", $date);


echo$dateInfo;
$mysqli =  mysqli_connect("127.9.15.2", "adminDutPG53", "Mg9KGY9Lslrl", "hms");

$sql = "INSERT INTO appointments VALUES ('', '$d_id', '$p_id','$dateInfo', '2014-04-01 00:00:00','');";
$result226 = mysqli_query($mysqli, $sql);
if($result226)
{
    echo 'success';
}

?>