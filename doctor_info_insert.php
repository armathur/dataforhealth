<html>
<body>
<head>
      
        <meta charset="UTF-8">
        
        
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="css/project_css.css">
      <script src="jquery-1.9.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="jquery-1.9.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
</head>
</body></html>




<?php



if(!isset($_SESSION['log_on']))
{
session_start();
$d_name = $_POST["d_name"];
$d_dob=$_POST["d_dob"];
$d_qual=$_POST["d_qual"];
$special=$_POST["special"];

$d_email=$_POST["d_email"];
$d_phone1=$_POST["d_phone1"];
$d_phone2=$_POST["d_phone2"];
$d_address=$_POST["d_address"];



$subject="generated id";










$mysqli =  mysqli_connect("127.9.15.2", "adminDutPG53", "Mg9KGY9Lslrl", "hms");





$from="From: manyasangal7@gmail.com" . "\r\n" .
"CC: amanmathur19@sify.com";








$query11="INSERT INTO `doctor_info`(d_id,d_name,d_dob,d_qual,special,d_email,d_phone1,d_phone2,d_address)"
   ." VALUES ('','$d_name','$d_dob','$d_qual','$special','$d_email','$d_phone1','$d_phone2','$d_address')";

        $result11= mysqli_query($mysqli,$query11);
    
 $query122="select * from doctor_info where d_email='$d_email'";
 $result122=  mysqli_query($mysqli, $query122);
  $data122 = mysqli_fetch_array($result122);
 
            
            


if($result11)
{
    
    
      $docID = $data122['d_id'];
               
      
         
        
        $jsonData = json_decode(file_get_contents('http://www.mnganesh.com/send_mail_aman.php?to='.$d_email.'&msg='.$docID.'&subj=WELCOME&apikey=d1354206318df4f23431fd944eb6976f'));
	 echo"<div class='alert alert-success' style='height:100%'><div style='margin-top:20%;margin-left:15%'><h3>You have successfully signed up....<br><br>"
    . "An autogenerated id has been sent to your registered e-mail id.<br><br>"
               . "Using the Doctor-ID you can <a href=index.php>login</a></h3></div></div>";
}
else
{
    echo"<div class='alert alert-warning'>There is a problem....</div>";
}
mysqli_close($mysqli);
}
?>