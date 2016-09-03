<?php
session_start();
$q = strval($_POST['arg1']);
$d_id = strval($_POST['arg2']);
$_SESSION['p_id'] = $q;

$mysqli =  mysqli_connect("127.9.15.2", "adminDutPG53", "Mg9KGY9Lslrl", "hms");
$query = "SELECT * FROM patient_sugar_readings where p_id='" . $q . "' order by date asc";

$result = mysqli_query($mysqli, $query);


$query134 = "SELECT * FROM monthly_readings where p_id='" . $q . "' order by date asc";

$result134 = mysqli_query($mysqli, $query134);



$i = 0;
$arr = array();
$arr2 = array();
$query166 = "select * from medication where  p_id='" . $q . "'and d_id='" . $d_id . "'";
$result166 = mysqli_query($mysqli, $query166);

$query1234 = "SELECT * FROM patient_sugar_readings where p_id='" . $q . "'";
$result1234 = mysqli_query($mysqli, $query1234);
while ($data1234 = mysqli_fetch_array($result1234)) {
    $p_id = $data1234['p_id'];
    $sugar_level = $data1234['sugar_level'];
    $blood_pressure = $data1234['blood_pressure'];
    $sugar_level_2 = $data1234['sugar_level_2'];
    $weight = $data1234['weight'];
}


$query11111 = "select * from p_clinic_rec where p_id='$q' and doc_id='$d_id'";
//$query1661="select * from medicati where  p_id='" . $q . "'and d_id='".$d_id."'";
$resultwa = mysqli_query($mysqli, $query11111);
while ($dataghochi = mysqli_fetch_array($resultwa)) {
    $image = $dataghochi['p_img'];
    $name = $dataghochi['name'];
    $dob = $dataghochi['dob'];
    $email = $dataghochi['email'];
    $phone1 = $dataghochi['phone1'];
    $phone2 = $dataghochi['phone2'];
}

$query1234 = "SELECT * FROM patient_sugar_readings where p_id='" . $q . "'";
$result1234 = mysqli_query($mysqli, $query1234);
while ($data1234 = mysqli_fetch_array($result1234)) {
    $p_id = $data1234['p_id'];
    $sugar_level = $data1234['sugar_level'];
    $blood_pressure = $data1234['blood_pressure'];
    $sugar_level_2 = $data1234['sugar_level_2'];
    $weight = $data1234['weight'];
}
$count = 0;











while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    $date = new DateTime($row["date"]);
    $format = $date->format('Y-m-d');
    $arr[] = array('date' => $format, 'sugar_level' => intval($row["sugar_level"]),
        'sugar_level_2' => intval($row["sugar_level_2"]),
        'blood_pressure' => intval($row["blood_pressure"]), 'avg_before' => intval($row["avg_before"]),
        'avg_after' => intval($row["avg_after"]), 'avg_total' => intval($row["avg_total"]));
}
$dataSource = json_encode($arr);



while ($row134 = mysqli_fetch_array($result134, MYSQLI_ASSOC)) {

    $dated = new DateTime($row134["date"]);
    $formatd = $dated->format('Y-m-d');
    $arr134[] = array('date' => $formatd, 'hba1c' => intval($row134["hba1c"]), 'totalchol' => intval($row134["totalchol"]),
        'hdlchol' => intval($row134["hdlchol"]), 'ldlchol' => intval($row134["ldlchol"]));
}
$dataSource134 = json_encode($arr134);
?>


<html>


    <head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/project_css.css">
        <link rel="stylesheet" type="text/css" href="js/themes/base/jquery.ui.all.css">

        <script src="jquery-1.9.1.js"></script>

        <script src="js/bootstrap.js"></script>

        <script src="Lib/js/jquery-1.10.2.js"></script>
        <script src="Lib/js/globalize.js"></script>

        <script src="Lib/js/dx.chartjs.js"></script>
        <script src="Lib/js/dx.chartjs.debug.js"></script>
        <script src="Lib/js/knockout-3.0.0.js"></script>
        <script src="js/ui/jquery.ui.widget.js"></script>
        <script src="js/ui/jquery.ui.accordion.js"></script>
        <script src="js/ui/jquery.ui.datepicker.js"></script>

        <script>


            function medication_insert()
            {
                var medication_text = document.getElementById("medication_text").value;
                var pa_id = document.getElementById("pa_id").value;
                var dr_id = document.getElementById("dr_id").value;

                if (medication_text == "")
                {
                    document.getElementById("display").innerHTML = "";
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
                        document.getElementById("display").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "send_medication.php?q=" + medication_text + "&r=" + pa_id + "&s=" + dr_id, true);
                xmlhttp.send();
            }


            function create_appointment()
            {
                var d = document.getElementById("datepicker").value;
                var pa_id = document.getElementById("pa_id").value;
                var dr_id = document.getElementById("dr_id").value;



                if (d === "")
                {
                    document.getElementById("div_appointment_success").innerHTML = "";
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
                        document.getElementById("div_appointment_success").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "insert_appointment.php?date=" + d + "&r=" + pa_id + "&s=" + dr_id, true);
                xmlhttp.send();
            }

            function monthly_reading_insert()

            {
                var hba1c = document.getElementById("hba1c").value;
                var totalchol = document.getElementById("totalchol").value;
                var hdlchol = document.getElementById("hdlchol").value;
                var ldlchol = document.getElementById("ldlchol").value;
                var pa_id = document.getElementById("pa_id").value;
                var dr_id = document.getElementById("dr_id").value;
                var dated = document.getElementById("date").value;

                if (medication_text == "")
                {
                    document.getElementById("succ").innerHTML = "";
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
                        document.getElementById("succ").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "insert_monthly.php?ll=" + hba1c + "&mm=" + totalchol + "&zz=" + dated + "&nn=" + ldlchol + "&oo=" + hdlchol + "&pp=" + pa_id + "&qq=" + dr_id, true);
                xmlhttp.send();
            }









            $(function() {

                $("#chartContainer").dxChart({
                    dataSource: <?php echo $dataSource ?>,
//                        {day: "Monday", oranges: 3},
//                        {day: "Tuesday", oranges: 2},
//                        {day: "Wednesday", oranges: 3},
//                        {day: "Thursday", oranges: 4},
//                        {day: "Friday", oranges: 6},
//                        {day: "Saturday", oranges: 11},
//                        {day: "Sunday", oranges: 4}

                    commonSeriesSettings: {
                        type: 'line',
                        argumentField: 'date'
                    },
                    palette: '',
                    customizePoint: function() {

                        if (this.value > 150) {
                            return {color: 'red', hoverStyle: {color: '#ff4500'}};
                        } else if (this.value < 150) {
                            return {color: '#00ced1', hoverStyle: {color: '#00ced1'}};
                        }
                    },
                    series: {valueField: 'avg_before', argumentField: 'date'},
                    tooltip: {
                        enabled: true,
                        customizeText: function(e) {
                            return e.valueText + ' mg/dL on ' + e.argumentText;
                        }
                    },
                    title: {
                        text: ' Average Sugar Level before breakfast (in mg/Dl) vs. Date'
                    },
                    legend: {
                        horizontalAlignment: 'center',
                        verticalAlignment: 'bottom'
                    }


                });
            });








            $(function() {

                $("#sugar_reading_2").dxChart({
                    dataSource: <?php echo $dataSource ?>,
                    commonSeriesSettings: {
                        type: 'line',
                        argumentField: 'date'
                    },
                    palette: '',
                    customizePoint: function() {

                        if (this.value > 150) {
                            return {color: 'red', hoverStyle: {color: '#ff4500'}};
                        } else if (this.value < 150) {
                            return {color: '#00ced1', hoverStyle: {color: '#00ced1'}};
                        }
                    },
                    series: {name: 'Avg sugar post lunch', valueField: 'avg_after', argumentField: 'date'},
                    tooltip: {
                        enabled: true,
                        customizeText: function(e) {
                            return e.valueText + ' mg/dL on ' + e.argumentText;
                        }
                    },
                    title: {
                        text: ' Average Sugar Level post lunch in (mg/Dl) vs. Date'
                    },
                    legend: {
                        horizontalAlignment: 'center',
                        verticalAlignment: 'bottom'
                    }


                });
            });








            $(function() {

                $("#BloodPressure").dxChart({
                    dataSource: <?php echo $dataSource ?>,
                    commonSeriesSettings: {
                        type: 'bar',
                        argumentField: 'date'
                    },
                    palette: '',
                    customizePoint: function() {

                        if (this.value > 110) {
                            return {color: 'red', hoverStyle: {color: '#ff4500'}};
                        } else if (this.value < 60) {
                            return {color: '#00ced1', hoverStyle: {color: '#00ced1'}};
                        }
                    },
                    valueAxis: {
                        constantLines: [{
                                label: {
                                    text: 'Low Average'
                                },
                                width: 2,
                                value: 60,
                                color: '#00ced1',
                                dashStyle: 'dash'
                            }, {
                                label: {
                                    text: 'High Average'
                                },
                                width: 2,
                                value: 110,
                                color: '#ff4500',
                                dashStyle: 'dash'
                            }]
                    },
                    series: [{
                            name: 'Blood Pressure',
                            valueField: 'blood_pressure'
                        }],
                    tooltip: {
                        enabled: true,
                        customizeText: function(e) {
                            return e.valueText + ' mmHg on ' + e.argumentText;
                        }
                    },
                    title: {
                        text: 'Blood Pressure Readings (in mmHg) vs. Date'
                    },
                    legend: {
                        horizontalAlignment: 'center',
                        verticalAlignment: 'bottom'
                    }


                });
            });




            $(function() {

                $("#hba1cchart").dxChart({
                    dataSource: <?php echo $dataSource134 ?>,
//                        

                    commonSeriesSettings: {
                        type: 'line',
                        argumentField: 'date'
                    },
                    palette: '',
                    customizePoint: function() {

                        if (this.value > 150) {
                            return {color: 'red', hoverStyle: {color: '#ff4500'}};
                        } else if (this.value < 150) {
                            return {color: '#00ced1', hoverStyle: {color: '#00ced1'}};
                        }
                    },
                    series: {valueField: 'hba1c', argumentField: 'date'},
                    tooltip: {
                        enabled: true,
                        customizeText: function(e) {
                            return e.valueText + ' mg/dL on ' + e.argumentText;
                        }
                    },
                    title: {
                        text: 'Hba1c (%) vs. Date'
                    },
                    legend: {
                        horizontalAlignment: 'center',
                        verticalAlignment: 'bottom'
                    }


                });
            });





            $(function() {

                $("#total_avg").dxChart({
                    dataSource: <?php echo $dataSource ?>,
//                        {day: "Monday", oranges: 3},
//                        {day: "Tuesday", oranges: 2},
//                        {day: "Wednesday", oranges: 3},
//                        {day: "Thursday", oranges: 4},
//                        {day: "Friday", oranges: 6},
//                        {day: "Saturday", oranges: 11},
//                        {day: "Sunday", oranges: 4}

                    commonSeriesSettings: {
                        type: 'line',
                        argumentField: 'date'
                    },
                    palette: '',
                    customizePoint: function() {

                        if (this.value > 150) {
                            return {color: 'red', hoverStyle: {color: '#ff4500'}};
                        } else if (this.value < 150) {
                            return {color: '#00ced1', hoverStyle: {color: '#00ced1'}};
                        }
                    },
                    series: {valueField: 'avg_total', argumentField: 'date'},
                    tooltip: {
                        enabled: true,
                        customizeText: function(e) {
                            return e.valueText + ' mg/dL on ' + e.argumentText;
                        }
                    },
                    title: {
                        text: 'Average sugar level (in mg/Dl) vs. Date'
                    },
                    legend: {
                        horizontalAlignment: 'center',
                        verticalAlignment: 'bottom'
                    }


                });
            });





        </script>
    </head>
    <body style="background-color: #fdfdfd">

        <nav class="navbar navbar-inverse" role="navigation" style="border-radius: 0px; padding-top: 1%;">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#hmsNavBar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">HMS</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="hmsNavBar">

                    <ul class="nav navbar-nav navbar-left">
                        
                        <?php
                        
                        
                        $queryalert="select count(sugar_level_2) from patient_sugar_readings where p_id='$q' and (avg_total>220 OR avg_total<80)";
$resultalert=mysqli_query($mysqli, $queryalert);

 $infoalert=  mysqli_fetch_row($resultalert);
 
 
 


                        
                        if($infoalert[0]>5)
                        {
                            
                            echo $infoalert[0];
                        
                         echo "<script>alert('patient is at high risk')</script>";
                          $queryhighrisk= "insert into atrisk values('$q','1','','$d_id','')";
                          $resulthighrisk=  mysqli_query($mysqli, $queryhighrisk);
                         
                           
                        }
                        else
                        {
                        $querylowrisk= "insert into atrisk values($q,'','1','$d_id','')";
                          $resultlowrisk=  mysqli_query($mysqli, $querylowrisk);
                        }
                        ?>
                        
                        

                        <li style="left:40%"><a href="javascript:history.back()"><span class="glyphicon glyphicon-home"></span></a></li>
                        <li style="left:60%"><a href="#"><span class="glyphicon glyphicon-envelope"></span></a></li>
                        <li style="left: 70%;"><a href="#"><span class="glyphicon glyphicon-user"></span></a></li>

                        <li style="left: 100%;"><a>Welcome<?php echo " " . $d_id; ?></a></li>

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a  href="index.php">Logout</a></li>

                    </ul>




                    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group">
                            <input class="form-control"id='dstr' type='hidden' value='<?php echo "$d_id"; ?>'>
                            <input id="str" class="form-control" type="text" placeholder="Search patient" onkeydown="showUser();" autocomplete="off">
                            <div  id="patient_info_display" style="z-index:1; position:absolute ;width: auto; height: auto; background-color: white"></div>
                        </div>
                        <a type="submit" class="btn btn-warning" onclick="get_patient_data();" data-toggle="modal" data-target="#patient_display_info1" >Go!</a>
                    </form>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>





        <!--        <div>
        <?php
// $query11111 = "select * from p_clinic_rec where p_id='$q' and doc_id='$d_id'";
//$query1661="select * from medicati where  p_id='" . $q . "'and d_id='".$d_id."'";
//$resultwa = mysqli_query($mysqli, $query11111);
        ?>
        
                  
                    
        
                   </div>-->
        <div style="margin-left: 1%; margin-right: 1%">
            <div class="row">
                <div class="col-lg-2" style="">
                    <legend>Doctor's Action</legend>

                    <ul class="nav nav-stacked">
                        <li><a href="#" data-toggle="modal" data-target="#medication" >Medication to <?php echo $q ?></a></li>
                        <li><a href="#" data-toggle="modal" data-target="#monthly_entries">New Monthly readings of <?php echo $q ?></a></li>
                        <li><a href="#" data-toggle="modal" data-target="#modal_prev_readings">Previous readings of <?php echo $q ?></a></li>
                        <li><a href="#" data-toggle="modal" data-target="#confirmed appointments"> <?php echo $q ?></a></li>
                    </ul>


                    <!-- CODE FOR APPOINTMENT CALENDAR-->
                    <lable></lable>
                    <br>    
                    <legend>Create appointment</legend>
                    <p>Date:<div id="datepicker"></div></p>
                    <a id="btn_create_appointment" style="margin-left: 45px;" class="btn btn-info" onclick="create_appointment();"> Notify! <?php echo $q ?> </a>
                    <div id="div_appointment_success"></div>
                </div>

                <div class="col-lg-10" style="border-left: #ccc solid thin "> 

                    <div class="row">

                        <div class="col-md-4" style="height: 30%;">
                            <!-- doctor info displayed here -->

                            <legend>Patient :</legend>

                            <div class="col-sm-4"> 
                                <h3><?php
                                    echo $name;
                                    ?> </h3>
                                <h3><?php
                                    echo $q;
                                    ?> </h3>

                            </div>

                        </div>
                        <div class="col-md-8" style="height: 30%;">

                            <legend>Contact Card:</legend>
                            <div class="row">
                                <div class="col-lg-9">
                                    <?php
                                    echo "<p>" . $_SESSION['email'] = $email . "</p>";
                                    echo $_SESSION['phone1'] = $phone1;
                                    ?>
                                </div>
                                <div class="col-lg-3">
                                    <?php
                                    if (isset($_SESSION['name'])) {

                                        echo '<img style="widht:70%;height:70%"src="QRTest.php">';
                                    } else {

                                        $_SESSION['name'] = $name;
                                        $_SESSION['dob'] = $dob;
                                        $_SESSION['email'] = $email;
                                        $_SESSION['phone1'] = $phone1;
                                        echo '<img style="widht:70%;height:70%" src="QRTest.php">';
                                    }
                                    ?>
                                </div>


                            </div>


                        </div>




                    </div>










                    <hr>

                    <!-- ******************************************Here the graphs are rendered *********************************************************-->

                    <div class="row">
                        <div class="col-lg-5" id="chartContainer" style=" margin-left: 3%;height:50%; box-shadow:1px 1px 3px 2px #ccc; background-color: white" ></div>
                        <div class="col-lg-1"></div>
                        <div  class="col-lg-5" id="sugar_reading_2" style=" height:50%; box-shadow:1px 1px 3px 2px #ccc; background-color: white" ></div>
                    </div><br>

                    <div class="row">

                        <div class="col-lg-11" id="total_avg" style=" height:50%; box-shadow:1px 1px 3px 2px #ccc; background-color: white; margin-left: 3%"> </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-5" id="BloodPressure" style=" margin-left: 3%;height:47%; height:500px;box-shadow:1px 1px 3px 2px #ccc; background-color: white" ></div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-5" id="hba1cchart" style="height:47%; height:500px;box-shadow:1px 1px 3px 2px #ccc; background-color: white""></div>
                    </div>
















                    <div class="modal fade" id="monthly_entries" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="width: 40%;height: 60%">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <label>Enter the readings</label>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                </div>
                                <div class="modal-body">

                                    <form class="form-horizontal" role="form" >



                                        <div class="form-group">
                                            <label for="date" class="col-sm-2 control-label">Date</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="date" id="date" style="width: 40%" >
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label for="HBA1c" class="col-sm-2 control-label">HBA1c</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="hba1c" id="hba1c" style="width: 40%" >
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label for="totalchol" class="col-sm-2 control-label">S.Total Cholesterol</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="totalchol" id="totalchol" style="width: 40%" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="totalchol" class="col-sm-2 control-label">S.HDL Cholesterol</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="hdlchol" id="hdlchol"  style="width: 40%">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="totalchol" class="col-sm-2 control-label">S.LDL Cholesterol</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="ldlchol" id="ldlchol" style="width: 40%" >
                                            </div>
                                        </div>






                                        <input type="text" id="pa_id" value="<?php echo $q; ?>" hidden="true">

                                        <input type="text" id="dr_id" value="<?php echo $d_id; ?>" hidden="true">






                                        <a class="btn btn-warning"  style="margin-left:40% "onclick="monthly_reading_insert();" type="submit" >Submit</a>




                                        <div id="succ"></div>



                                    </form>

                                </div>

                            </div>

                        </div>
                    </div>






                    <div class="modal fade" id="modal_prev_readings" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="width: 70%;height: auto">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <label>Patient's pervious readings </label>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                </div>
                                <div class="modal-body">


                                    <?php
                                    $_SESSION["p_id"] = $p_id;


                                    $query70 = "select * from patient_sugar_readings where p_id='$p_id'";
                                    $result70 = mysqli_query($mysqli, $query70);
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
                                    ?>

                                </div>

                            </div>

                        </div>
                    </div>






                    <div class="modal fade" id="medication" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="width: 60%;height: 60%">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <label>Medication</label>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                </div>
                                <div class="modal-body">

                                    <form>


                                        <textarea id="medication_text">
                                            
                                        </textarea>
                                        <select>
                                            <?php ?>
                                        </select>

                                        <input type="text" id="pa_id" value="<?php echo $q; ?>" hidden="true">

                                        <input type="text" id="dr_id" value="<?php echo $d_id; ?>" hidden="true">






                                        <a class="btn btn-warning" onclick="medication_insert();"type="submit" >Send!</a>

                                        <div id="display"></div>



                                    </form>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script>
            $(function() {
                $("#datepicker").datepicker();
            });


        </script>

    </body>
</html>