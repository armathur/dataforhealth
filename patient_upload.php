
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
        $query400 = "UPDATE `p_clinic_rec` set p_img='".$target_path."' WHERE p_id='". $_SESSION["p_id"]."';"  ;
        $result400 = mysqli_query($mysqli, $query400);
        mysqli_close($mysqli);
 
  
  
   if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
       
     
      
       
} else{ 
    echo "There was an error uploading the file, please try again!";
}
  }
?>


