<?php


session_start();


$d_id= strval($_GET["q"]);
$pname = strval($_GET["r"]);
$dob=strval($_GET["s"]);
$b_grp=strval($_GET["t"]);
$height=strval($_GET["u"]);
$weight=strval($_GET["v"]);
$father_name=strval($_GET["w"]);
$father_b_grp=strval($_GET["x"]);
$mother_name=strval($_GET["y"]);
$mother_b_grp=strval($_GET["z"]);
$email=strval($_GET["d"]);
$phone1=strval($_GET["a"]);
$phone2=strval($_GET["b"]);
$address=strval($_GET["c"]);
$gender = strval($_GET["gen"]);

$mysqli =  mysqli_connect("127.9.15.2", "adminDutPG53", "Mg9KGY9Lslrl", "hms");


$query177="select * from doctor_info where d_id='$d_id'";
$result177=mysqli_query($mysqli,$query177);
$info177=  mysqli_fetch_array($result177);


$query108="insert into p_clinic_rec values('','$info177[d_id]','$pname','$dob','$b_grp','$height','$weight','$father_name','$father_b_grp','$mother_name',"
        . "'$mother_b_grp','$email','$phone1','$phone2','$address','NULL','$gender');";
    

        $result108= mysqli_query($mysqli,$query108);
        
 $querypatientmail = "SELECT * FROM p_clinic_rec
     
ORDER BY p_id DESC
LIMIT 1";
 $resultpatientmail= mysqli_query($mysqli,$querypatientmail);
 $patientid = mysqli_fetch_array($resultpatientmail);
        
       if($result108)
       {
           
           $patid = $patientid['p_id'];
           $patemail = $patientid['email']; 
           
            $jsonData = json_decode(file_get_contents('http://www.mnganesh.com/send_mail_aman.php?to='.$patemail.'&msg='.$patid.'&subj=WELCOME&apikey=d1354206318df4f23431fd944eb6976f'));
       echo"<i class='alert alert-success' style='height:100%'><div style='margin-top:20%;margin-left:15%'><h3>A new patient has been successfully added and notified via email
    </h3></div></div";
       }
        
        


mysqli_close($mysqli);

?>
