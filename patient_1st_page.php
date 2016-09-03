<?php
if (!isset($_SESSION['log_on'])) {


    $p_email = $_POST["p_email"];
    $p_id = $_POST["p_id"];

    $mysqli =  mysqli_connect("127.9.15.2", "adminDutPG53", "Mg9KGY9Lslrl", "hms");
    $query101 = "SELECT * FROM p_clinic_rec where email='$p_email' and p_id='$p_id' ";

    $result101 = mysqli_query($mysqli, $query101);
    $query1112 = "select COUNT(medication) from medication where is_read=0 and p_id='$p_id'";
    $query5000 = "select * from medication where p_id='$p_id' and is_read=0";
    $result5000 = mysqli_query($mysqli, $query5000);
    $query1992="select count(date_created) from appointments where isConfirmed=0 and receiver_id='$p_id'";
    
    
    $query1991="select * from appointments where isConfirmed=0 and receiver_id='$p_id'";
    $result1991 = mysqli_query($mysqli, $query1991);
    

session_start();
$_SESSION["p_id"] = $p_id;
    
    
    $query70="select * from patient_sugar_readings where p_id='$p_id'";
    $result70=mysqli_query($mysqli,$query70);





    $result1112 = mysqli_query($mysqli, $query1112);
    $row1112 = mysqli_fetch_row($result1112);
    
    
     $result1992 = mysqli_query($mysqli, $query1992);
    $row1992 = mysqli_fetch_row($result1992);


    $_SESSION['count'] = $query1112;




    if (mysqli_num_rows($result101) <= 0) {
        header('Location: index.php');
    } else {

        $_SESSION['usertype'] = "patient";
        $_SESSION['log_on'] = TRUE;
    }
}
?>



<html>
    <head>
        <meta charset="UTF-8">


        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/project_css.css">
        <script src="jquery-1.9.1.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap.js"></script>
   

        <script src="js/bootstrap.js"></script>

        <script src="js/ui/jquery.ui.widget.js"></script>
        <script src="js/ui/jquery.ui.accordion.js"></script>
        <script>

            function patient_info_insert()
            {


                sugar_reading_1 = document.getElementById('sugar_reading_1').value;

                sugar_reading_2 = document.getElementById('sugar_reading_2').value;
           sugar_b_lunch = document.getElementById('sugar_b_lunch').value;
            sugar_a_lunch = document.getElementById('sugar_a_lunch').value;
             sugar_b_dinner = document.getElementById('sugar_b_dinner').value;
              sugar_a_dinner = document.getElementById('sugar_a_dinner').value;
                weight = document.getElementById('weight').value;
                blood_pressure = document.getElementById('blood_pressure').value;
                date = document.getElementById('date').value;
                p_id = document.getElementById('p_id').value;
              //  avg_b=(sugar_reading_1+sugar_b_lunch+sugar_b_dinner)/3;
                //avg_a=(sugar_reading_2+sugar_a_lunch+sugar_a_dinner)/3;
                //avg_total=(sugar_reading_1+sugar_b_lunch+sugar_b_dinner+sugar_reading_2+sugar_a_lunch+sugar_a_dinner)/6;
//alert(avg_a);
                other_details = document.getElementById('other_details').value;


                if (sugar_reading_1 == "")
                {
                    alert("cant do anything");
                    return;
                }
                if (window.XMLHttpRequest)
                {// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                }
                else
                {// code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        document.getElementById("success_div").hidden = false;
                        document.getElementById("success_div").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "insert_reading.php?q=" + sugar_reading_1 + "&r=" + sugar_reading_2 + "&aa=" + sugar_b_lunch+ "&bb=" + sugar_a_lunch+ "&cc=" + sugar_b_dinner+ "&dd=" + sugar_a_dinner + "&a=" + weight + "&s=" + blood_pressure + "&t=" + date + "&v=" + other_details + "&w=" + p_id, true);

                xmlhttp.send();
            }

        </script>

        <script>
            $(function() {
                $('#sendReadings').accordion({
                    collapsible: true,
                });
            });
        </script>
    <body>


        <?php
        



        $mysqli = mysqli_connect("127.9.15.2", "adminDutPG53", "Mg9KGY9Lslrl", "hms");


        $query300 = "SELECT * FROM p_clinic_rec where  p_id='$p_id'";
        $result300 = mysqli_query($mysqli, $query300);

        $info300 = mysqli_fetch_array($result300);
        if ($info300) {

            $_SESSION['session_PatientProfileImage'] = $info300['p_img'];
        }
        ?>

        <?php
        $mysqli = mysqli_connect("127.9.15.2", "adminDutPG53", "Mg9KGY9Lslrl", "hms");
        

        $query203 = "select * from p_clinic_rec where p_id='" . $p_id . "'";
        $result203 = mysqli_query($mysqli, $query203);
      
        
        
       
        if ($data203 = mysqli_fetch_array($result203)) {
            $_SESSION['session_PatientName'] = $data203['name'];
            $_SESSION['session_PatientDob'] = $data203['dob'];
        }
        ?>

        <?php
        $query204 = "select * from p_clinic_rec where p_id='" . $p_id . "'";
        $result204 = mysqli_query($mysqli, $query204);

        if ($data204 = mysqli_fetch_array($result204)) {
            $_SESSION['session_PatientPhone1'] = $data204['phone1'];
            $_SESSION['session_PatientPhone2'] = $data204['phone2'];
        }
        ?>
























        <nav class="navbar navbar-default" role="navigation" style="border-radius: 0px; padding-top: 1%;">
            
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">HEALTH CARE SERVICE</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-left">
                        <li style="left:60%"><a href="#"><span class="glyphicon glyphicon-envelope" data-toggle="modal" data-target="#patient_all_medication"><span class="badge"><?php echo "$row1112[0]"; ?></span></span></a></li>
                        <li style="left: 70%;"><a href="#"><span class="glyphicon glyphicon-list-alt" data-toggle="modal" data-target="#appointments" data-toggle="tooltip" data-placement="top" title="Appointments"><span class="badge"><?php echo "$row1992[0]"; ?></span></span></a></li>

                        
                        
                        <li style="left: 100%;"><a>Welcome<?php echo " " . $p_id; ?></a></li>
                        

                    </ul>
                   

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><text data-toggle="modal" data-target="#patient_history">View previous records</text></a>
                        <li><a href="index.php" onclick="<?php session_destroy(); ?>">Logout</a></li>

                    </ul>















                </div>
            </div>
        </nav>



        <div class="container">

            <div class="row">
                <div  class="col-md-3" style="background-color: #ccc; height: 40%">
                    <!-- profile image displayed here-->

                    <div style="background-color: #ccc;">

                        <?php echo"<img src='profile_pics/doctor1.jpg' alt='no image'  class='img-circle' style='width:150px; height:150px;'>"; ?>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary" style="width:auto" data-toggle="modal" data-target="#modal_ChangeProfileImage"> Change Profile Picture</button>
                        </div>
                        <div class="modal fade" id="modal_ChangeProfileImage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <label>Change profile picture</label>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                    </div>
                                    <div class="modal-body">
                                        <form action="patient_upload.php" method="post"
                                              accept-charset="  "enctype="multipart/form-data">
                                            <input type="file" name="file" size="50" />
                                            <br />
                                            <input type="submit" value="Upload File" />
                                        </form>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-9" style="background-color: #ccc; height: 40%;">
                    <!-- doctor info displayed here -->

                    <div class="col-sm-12" style="background-color: #ccc;"><h1></h1></div>
                    <div class="col-sm-8" style="background-color: #ccc"> 
                        <h1><?php echo $_SESSION['session_PatientName'] ?> </h1>
                        <h1><?php echo $_SESSION['session_PatientDob'] ?></h1>


                    </div>
                    <div class="col-sm-4" style="background-color: #ccc"> 
                        <legend>Contact</legend>    
                        <h3><?php echo $_SESSION['session_PatientPhone1'] ?> </h3>
                        <h3><?php echo $_SESSION['session_PatientPhone2'] ?></h3>

                    </div>

                </div>

            </div>


























        </div>

        <div class="panel panel-default" style="width:60%;border-style: solid; background-color:lavender;margin-left: 20% " >
            <div class="panel-body" >
                <div id="sendReadings" style=" left:0%; width:100%; height:auto; ">

                    <h2 class="panel-title" align='center' ><label>Send new readings </label></h2>

                    <div class="panel-body" style="border-style: solid;border: #c9302c; border-color: magenta;">

                        <form class="form-horizontal" role="form" >


                            <div class="form-group">
                                <label for="p_id" class="col-sm-2 control-label">Patient id</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="p_id" id="p_id" value="<?php echo $p_id; ?>" style="hidden:'true';">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="p_id" class="col-sm-2 control-label">Sugar readings before breakfast</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="sugar_reading_1" id="sugar_reading_1" placeholder="sugar-readings_1">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="p_id" class="col-sm-2 control-label">Sugar readings after breakfast</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="sugar_reading_2" id="sugar_reading_2" placeholder="sugar-readings_2">
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="p_id" class="col-sm-2 control-label">Sugar readings before lunch</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="sugar_ b_lunch" id="sugar_b_lunch" placeholder="sugar_before_lunch">
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="p_id" class="col-sm-2 control-label">Sugar readings after lunch</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="sugar_a_lunch" id="sugar_a_lunch" placeholder="sugar_after_lunch">
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="p_id" class="col-sm-2 control-label">Sugar readings before dinner</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="sugar_b_dinner" id="sugar_b_dinner" placeholder="sugar_before_dinner">
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="p_id" class="col-sm-2 control-label">Sugar readings after dinner</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="sugar_a_dinner" id="sugar_a_dinner" placeholder="sugar_after_dinner">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="p_id" class="col-sm-2 control-label">Weight</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="weight" id="weight" placeholder="weight">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Blood Pressure</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="blood_pressure" id="blood_pressure" placeholder="BP">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dob" class="col-sm-2 control-label">Date</label>
                                <div class="col-sm-10">
                                    <input type="date" id="date" class="form-control" name="date" placeholder="Date">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="father_name" class="col-sm-2 control-label">Any other details</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="other_details" id="other_details" placeholder="Other details">
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" style="alignment-adjust: central; width: 100%" onclick="patient_info_insert();"> Send</button>


                        </form>

                    </div>
                </div>

                <div style="color: green"  class="alert alert-success" id="success_div" hidden="hidden">

                </div></div></div>

        <div class="modal fade" id="patient_all_medication" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label>Patient Info</label>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    </div>
                    <div class="modal-body" id="med_display">


                        <?php
                        echo'<table class="table table-striped">
         <tr>
          <td>
          
          Medication</td><td>Time</td></tr>';

                        while ($info5000 = mysqli_fetch_array($result5000)) {
                            echo '<tr><td>';
                                        
                            $t = time();

//                            echo($t . "<br>");
//                            echo;
                            echo$info5000['medication'];

                            echo'</td><td>' . (date("h:i:s", $t)) . '</td></tr>';
                        }

                        echo'</table>';
                        $mysqli = mysqli_connect("127.9.15.2", "adminDutPG53", "Mg9KGY9Lslrl", "hms");
                        $query1019 = "update medication set is_read=1 where p_id='$p_id' ";

                        $result1019 = mysqli_query($mysqli, $query1019);
                        ?>


                    </div>

                </div>

            </div>
        </div>
        
        
        
        
        
        
        
        
        
         <div class="modal fade" id="appointments" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label>Next appointment</label>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    </div>
                    <div class="modal-body" id="med_display">


                        <?php
                        echo'<table class="table table-striped">
         <tr>
          <td>
          
          Date and time</td></tr>';

                        while ($info1991 = mysqli_fetch_array($result1991)) {
                            echo '<tr><td>';
                                        
                            $t = time();

//                            echo($t . "<br>");
//                    

                            echo $info1991['date_of_appointment']. '</td></tr>';
                        }

                        echo'</table>';
                        $mysqli = mysqli_connect("127.9.15.2", "adminDutPG53", "Mg9KGY9Lslrl", "hms");
                        $query1020 = "update appointments set isConfirmed=1 where receiver_id='$p_id' ";

                        $result1020 = mysqli_query($mysqli, $query1020);
                        ?>


                    </div>

                </div>

            </div>
        </div>
        
        

        
        
        
        
        
        
        
        
        
        
        
        
        <div class="modal fade" id="patient_history" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  aria-hidden="true">
            <div class="modal-dialog" style="width: 70%">
                <div class="modal-content">
                    <div class="modal-header">
                        <label>History</label>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    </div>
                    <div class="modal-body" id="med_display">


                        <?php
                        echo'<table class="table table-striped">
         <tr>
          <td>
          
          Date</td><td>Sugar level before breakfast</td><td>Sugar level after breakfast</td>
          <td>Sugar level before lunch</td><td>Sugar level after lunch</td>
          <td>Sugar level before dinner</td><td>Sugar level after dinnner</td>
           <td>Sugar level before food</td><td>Sugar level after food</td>
           <td> Average Sugar level of the day</td>
          
<td>Blood Pressure</td></tr>';

                        while ($info70 = mysqli_fetch_array($result70)) {
                            echo '<tr><td>';
                                        
                           

//                            echo($t . "<br>");
//                            echo;
                            echo$info70['date'];

                            echo'</td><td>' . $info70['sugar_level'] . '</td>';
                            
                            echo '<td>';
                                        
                           

//                            echo($t . "<br>");
//                            echo;
                            echo$info70['sugar_level_2'];

                            echo'</td><td>' . $info70['sugar_b_lunch'] . '</td><td>';
                                    echo $info70['sugar_a_lunch'] . '</td><td>';
                                     echo $info70['sugar_b_dinner'] . '</td><td>';
                                      echo $info70['sugar_a_dinner'] . '</td><td>';
                                       echo $info70['avg_before'] . '</td><td>';
                                        echo $info70['avg_after'] . '</td><td>';
                                           echo $info70['avg_total'] . '</td><td>';
                                    
                                    
                                    
                                    
                                    
                                     echo $info70['blood_pressure'] . '</td></tr>';
                        }

                        echo'</table>';
                        $mysqli = mysqli_connect("127.9.15.2", "adminDutPG53", "Mg9KGY9Lslrl", "hms");
                        $query1019 = "update medication set is_read=1 where p_id='$p_id' ";

                        $result1019 = mysqli_query($mysqli, $query1019);
                        ?>


                    </div>

                </div>

            </div>
        </div>

        
        
        
        <div class="well well-lg" style="background-color: #222222; border-radius: 0px;">
            <p style="color: red">
                    Copyright &#169; Manya Sangal &AMP; Aman Mathur
                </p>
                <br>
                <a href="Legal.html">Legal Disclaimer</a>
                


            </div> 
        
        
        
        
        
        
        


    </body>
</html>








