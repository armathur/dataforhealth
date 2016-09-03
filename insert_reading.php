<?php
$sugar_reading1= strval($_GET['q']);

$sugar_reading_2=strval($_GET['r']);

        $sugar_b_lunch=strval($_GET['aa']);
        $sugar_a_lunch=strval($_GET['bb']);
        $sugar_b_dinner=strval($_GET['cc']);
        $sugar_a_dinner=strval($_GET['dd']);
          // avg_b=($sugar_reading1+$sugar_b_lunch+$sugar_b_dinner)/3;
            //$avg_a=($sugar_reading_2+$sugar_a_lunch+$sugar_a_dinner)/3;
               // $avg_total=($sugar_reading1+$sugar_b_lunch+$sugar_b_dinner+$sugar_reading_2+$sugar_a_lunch+$sugar_a_dinner)/6;

        
        
        $_SESSION['avg_b']=($sugar_reading1+$sugar_b_lunch+$sugar_b_dinner)/3;
            $_SESSION['avg_a']=($sugar_reading_2+$sugar_a_lunch+$sugar_a_dinner)/3;
                $_SESSION['avg_total']=($sugar_reading1+$sugar_b_lunch+$sugar_b_dinner+$sugar_reading_2+$sugar_a_lunch+$sugar_a_dinner)/6;
        
        $avg_b= $_SESSION['avg_b'];
        $avg_a= $_SESSION['avg_a'];
        $avg_total=  $_SESSION['avg_total'];
        $weight=strval($_GET['a']);
        

$blood_pressure1= strval($_GET['s']);

$date1=strval($_GET['t']);
$p_id=strval($_GET['w']);

$other_details1=strval($_GET['v']);

$mysqli =  mysqli_connect("127.9.15.2", "adminDutPG53", "Mg9KGY9Lslrl", "hms");
$query225 = "insert into patient_sugar_readings values ('','$p_id','$date1','$sugar_reading1','$blood_pressure1','$sugar_reading_2','$sugar_b_lunch','$sugar_a_lunch','$sugar_b_dinner','$sugar_a_dinner','$avg_b','$avg_a','$avg_total','$weight','','','')";
$result225 = mysqli_query($mysqli, $query225);





if($avg_total>130 or $avg_total<90)
        {
            $queryrisk= "update patient_sugar_readings set high_risk=1 where p_id=$p_id";
            $resultrisk=  mysqli_query($mysqli, $queryrisk);
        }
        else if($avg_total<130 and $avg_total>100)
        {
             $querylowrisk= "update patient_sugar_readings set low_risk=1 where p_id=$p_id";
            $resultlowrisk=  mysqli_query($mysqli, $querylowrisk);
        }


if($result225)
    {
    
    echo"Your Form was Successfully Submitted!";
    
        }
        else
        {
        echo"hiiiijgbkjgkdjagkljgfkljhglksjfhkj";
}
mysqli_close($mysqli);
?>  