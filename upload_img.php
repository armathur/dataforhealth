
<?php
session_start();
if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
  }
else
  {
  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  echo "Type: " . $_FILES["file"]["type"] . "<br>";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];
  $target_path = "profile_pics/";
  $target_path = $target_path.basename( $_FILES['file']['name'] );
    

 $mysqli =  mysqli_connect("127.9.15.2", "adminDutPG53", "Mg9KGY9Lslrl", "hms");
        $query4 = "UPDATE `doctor_info` set d_img='".$target_path."' WHERE d_id='". $_SESSION["d_id"]."';"  ;
        $result4 = mysqli_query($mysqli, $query4);
        mysqli_close($mysqli);
 
  
  
   if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
       
       echo"<script>javascript:history.go(-1)</script>";
     
       
} else{ 
    echo "There was an error uploading the file, please try again!";
    
}
  }
?>


