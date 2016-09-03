<?php
$q = strval($_GET['q']);

$mysqli =  mysqli_connect("127.9.15.2", "adminDutPG53", "Mg9KGY9Lslrl", "hms");
$query25 = "select * from p_clinic_rec where p_id like '".$q."%'";
$result25 = mysqli_query($mysqli, $query25);



echo "<table class='table table-striped' border='1' >
<tr>
<th>patient id</th>
<th>name</th>
<th>B_grp</th>

</tr>";

while($row = mysqli_fetch_array($result25))
  {
  echo "<tr>";
  echo "  <td> <a id='patientId' onclick='fetchPatientData(this.innerHTML);'>" . $row['p_id'] . "</a></td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['b_grp'] . "</td>";
  
  echo "</tr>";
  }
echo "</table>";

     




  echo"</div>";
  
  
mysqli_close($mysqli);
?>  