<html>

    <head>
        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <script src="js/jquery-1.9.1.js"></script>
        <script src="js/bootstrap.js"></script>
    </head><body>
<?php


session_start();



$dr_id= strval($_GET["qq"]);
$pa_id= strval($_GET["pp"]);
$hba1c= strval($_GET["ll"]);
$totalchol= strval($_GET["mm"]);
$ldlchol= strval($_GET["nn"]);
$hdlchol= strval($_GET["oo"]);
$dated= strval($_GET["zz"]);


$mysqli =  mysqli_connect("127.9.15.2", "adminDutPG53", "Mg9KGY9Lslrl", "hms");





$query8899="insert into monthly_readings values('$dr_id','$pa_id','$hba1c','$totalchol','$hdlchol','$ldlchol','$dated')";
    

        $result8899= mysqli_query($mysqli,$query8899);
        mysqli_close($mysqli);?>
        
      <div class="alert alert-success">Success!!!Your prescription has been sent to the patient <?php echo"$pa_id"; ?></div>
       




    </body>
</html>
