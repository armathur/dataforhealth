<?php
$q = strval($_GET['q']);
$r=strval($_GET['r']);

$mysqli =  mysqli_connect("127.9.15.2", "adminDutPG53", "Mg9KGY9Lslrl", "hms");
$query25 = "select * from p_clinic_rec where p_id like '".$q."%'and doc_id='".$r."'";
$result25 = mysqli_query($mysqli, $query25);






echo"<div class='list-group'>";
     



while($data25 = mysqli_fetch_array($result25))
  {
  echo"<a onclick='show(this.innerHTML)' id='aman' href='#' class='list-group-item'>".$data25['p_id']."</a>";
    }
  echo"</div>";
  
  
mysqli_close($mysqli);
?>  