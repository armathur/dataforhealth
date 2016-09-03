<html>

    <head>
        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <script src="js/jquery-1.9.1.js"></script>
        <script src="js/bootstrap.js"></script>
    </head><body>
<?php


session_start();


$medication= strval($_GET["q"]);
$dr_id= strval($_GET["s"]);
$pa_id= strval($_GET["r"]);
//$hba1c= strval($_GET["ll"]);
//$totalchol= strval($_GET["mm"]);
//$ldlchol= strval($_GET["nn"]);
//$hdlchol= strval($_GET["oo"]);

$mysqli =  mysqli_connect("127.9.15.2", "adminDutPG53", "Mg9KGY9Lslrl", "hms");





$query1081="insert into medication values('$medication','','','$dr_id','$pa_id','')";
    

        $result1081= mysqli_query($mysqli,$query1081);
        mysqli_close($mysqli);?>
        
      <div class="alert alert-success">Success!!!Your prescription has been sent to the patient <?php echo"$pa_id"; ?></div>
       




    </body>
</html>
