<?php
if (!isset($_SESSION['log_on'])) {

    $msg = " ";
    $d_email = $_POST["d_email"];
    $d_id = $_POST["d_id"];
    $_SESSION['d_email'] = $d_email;
    $_SESSION['d_id'] = $d_id;








    $mysqli = mysqli_connect("127.9.15.2", "adminDutPG53", "Mg9KGY9Lslrl", "hms");
    $query1 = "SELECT * FROM doctor_info where d_email='$d_email' and d_id='$d_id' AND d_id like 'D%'";

    $result1 = mysqli_query($mysqli, $query1);

    $query203 = "select * from appointments where creator_id='$d_id'";
    $result203 = mysqli_query($mysqli, $query203);








    if (mysqli_num_rows($result1) <= 0) {

        $_SESSION['count'] ++;
        header('Location: index.php');
    } else {

        //$_SESSION['usertype'] = "doctor";
        $_SESSION['log_on'] = 1;
    }
}
?>



<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/project_css.css">
        <script src="jquery-1.9.1.js"></script>

        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.redirect.min.js"></script>
        <script src="Lib/js/globalize.js"></script>

        <script src="Lib/js/dx.chartjs.js"></script>
        <script src="Lib/js/dx.chartjs.debug.js"></script>
        <script src="Lib/js/knockout-3.0.0.js"></script>


        <script>

            $(function()
            {
                var highCount = parseInt(document.getElementById("highRisk").innerHTML, 10);
                var lowCount = parseInt(document.getElementById("normalcount").innerHTML, 10);
                var pat = document.getElementById("totlal").innerHTML;

                var dataSource = [{name: "High Risk", highrisk: highCount}, {name: "Low Risk", lowrisk: lowCount}];
                $("#div_riskPatient").dxChart({
                    dataSource: dataSource,
//                        {day: "Monday", oranges: 3},
//                        {day: "Tuesday", oranges: 2},
//                        {day: "Wednesday", oranges: 3},
//                        {day: "Thursday", oranges: 4},
//                        {day: "Friday", oranges: 6},
//                        {day: "Saturday", oranges: 11},
//                        {day: "Sunday", oranges: 4}

                    commonSeriesSettings: {
                        argumentField: "name",
                        type: "bar"
                    },
                    series: [{valueField: 'highrisk', color: "red", name: "High risk"}, {valueField: 'lowrisk', color: "orange", name: "Low risk"}],
                    tooltip: {
                        enabled: true,
                        customizeText: function(e) {
                            if (e.argumentText == "High Risk") {
                                if(document.getElementById("totlal").innerHTML.split(" ").length<2)
                                {
                                var stringwa = "";

                                stringwa += document.getElementById("totlal").innerHTML.split(" ")
                                        + "is at" + " " + e.argumentText + "\n";


                                return stringwa;
                            }
                            else
                                var stringwa = "";

                                stringwa += document.getElementById("totlal").innerHTML.split(" ")
                                        + "are at" + " " + e.argumentText + "\n";


                                return stringwa;
                            }
                            else
                                return e.valueText+" patients "+e.argumentText;
                        }
                    },
                    title: {
                        text: ' Number of Patients under Risk'
                    },
                    legend: {
                        horizontalAlignment: 'center',
                        verticalAlignment: 'bottom'
                    }

                })


            });




            $(function() {

                var dataSource = [
                    {state: "Male Patients", maleyoung: 29, malemiddle: 90, maleolder: 14},
                    {state: "Female Patients", femaleyoung: 24, femalemiddle: 57, femaleolder: 5},
                ];

                $("#div_gender").dxChart({
                    dataSource: dataSource,
                    commonSeriesSettings: {
                        argumentField: "state",
                        type: "stackedBar"
                    },
                    series: [
                        {valueField: "maleyoung", name: "Male: 0-14", stack: "male"},
                        {valueField: "malemiddle", name: "Male: 15-64", stack: "male"},
                        {valueField: "maleolder", name: "Male: 65 and older", stack: "male"},
                        {valueField: "femaleyoung", name: "Female: 0-14", stack: "female"},
                        {valueField: "femalemiddle", name: "Female: 15-64", stack: "female"},
                        {valueField: "femaleolder", name: "Female: 65 and older", stack: "female"}
                    ],
                    legend: {
                        horizontalAlignment: "center",
                        position: "outside",
                        border: {visible: true}
                    },
                    valueAxis: {
                        title: {
                            text: "Populations"
                        }
                    },
                    title: "No. of Patients: Age Structure",
                    tooltip: {
                        enabled: true
                    }
                });
            });
            $(function() {

                $('#div_gauge').dxCircularGauge({
                    scale: {
                        startValue: 0, endValue: 100,
                        majorTick: {
                            color: '#536878',
                            tickInterval: 10
                        },
                        label: {
                            indentFromTick: 3
                        }
                    },
                    rangeContainer: {
                        offset: 10,
                        ranges: [
                            {startValue: 0, endValue: 30, color: 'green'},
                            {startValue: 30, endValue: 70, color: 'yellow'},
                            {startValue: 70, endValue: 100, color: 'red'}
                        ]
                    },
                    valueIndicator: {
                        offset: 50
                    },
                    subvalueIndicator: {
                        offset: -25
                    },
                    title: 'Amount of Tickets Sold (with Min and Max Expected)',
                    value: 85,
                    subvalues: [40, 90]
                });
            });
            $(function() {
                var dataSource = [
                    {country: "Russia", area: 12},
                    {country: "Canada", area: 7},
                    {country: "USA", area: 7},
                    {country: "China", area: 7},
                    {country: "Brazil", area: 6},
                    {country: "Australia", area: 5},
                    {country: "India", area: 2},
                    {country: "Others", area: 55}
                ];

                $("#div_piechart").dxPieChart({
                    size: {
                        width: 500
                    },
                    dataSource: dataSource,
                    series: [
                        {
                            argumentField: "country",
                            valueField: "area",
                            label: {
                                visible: true,
                                connector: {
                                    visible: true,
                                    width: 1
                                }
                            }
                        }
                    ],
                    legend: {
                        horizontalAlignment: "left",
                        border: {visible: true}
                    },
                    title: "No. of patients"
                });
            });

            function get_patient_data()
            {
                p_id = document.getElementById("str").value;

                if (p_id == "")
                {
                    document.getElementById("patient_display_info").innerHTML = "";
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
                        document.getElementById("patient_display_info").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "getData.php?q=" + p_id, true);
                xmlhttp.send();
            }


            function fetchPatientData(q)
            {
                dstr = document.getElementById("dstr").value;

                //$().redirect('getPatientData.php?arg1='+q+'&arg2=value2');
                $().redirect('getPatientData.php', {'arg1': q, 'arg2': dstr});


            }


            function show(str)
            {
                document.getElementById("str").value = str;
                document.getElementById("patient_info_display").hidden = true;

            }

            function showUser()
            {
                str = document.getElementById("str").value;
                dstr = document.getElementById("dstr").value;
                if (str == "")
                {
                    document.getElementById("patient_info_display").innerHTML = "";
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
                        document.getElementById("patient_info_display").innerHTML = xmlhttp.responseText;
                        document.getElementById("patient_info_display").hidden = false;

                    }
                }
                xmlhttp.open("GET", "getUser.php?q=" + str + "&r=" + dstr, true);
                xmlhttp.send();
            }

            function clinic_form_submit()
            {
                doc_id = document.getElementById("d_id").value;

                name = document.getElementById("name").value;
                dob = document.getElementById("dob").value;
                b_grp = document.getElementById("b_grp").value;
                f_name = document.getElementById("father_name").value;
                f_b_grp = document.getElementById("father_b_grp").value;
                m_name = document.getElementById("mother_name").value;
                m_b_grp = document.getElementById("mother_b_grp").value;
                email = document.getElementById("email").value;
                phone_1 = document.getElementById("phone1").value;
                phone_2 = document.getElementById("phone2").value;

                address = document.getElementById("address").value;



                if (doc_id == "")
                {
                    document.getElementById("success_div").innerHTML = "";
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
                        document.getElementById("success_div").innerHTML = xmlhttp.responseText;
                        document.getElementById("success_div").hidden = false;

                    }
                }
                xmlhttp.open("GET", "patient_clinic_1st_form_insert.php?d_id=" + doc_id + "&name=" + name + "&dob=" + dob + "&b_grp=" + b_grp + "&father_name=" + f_name + "&father_b_grp=" +
                        f_b_grp + "&mother_name=" + m_name + "&mother_b_grp=" + m_b_grp + "&email=" + email + "&phone1=" + phone_1 + "&phone2=" + phone_2 + "&address=" + address, true);
                xmlhttp.send();
            }



        </script>

        <script type = "text/javascript" >
            var id;
            var last_id = 0;
            var last_count = 0;
            function push_check(last_id) {

                $.ajax({
                    url: 'check_mail.php',
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        if (data.totalUnread > 0) {
                            document.getElementById('message').value = '<span class="badge" style="color:white">' + data.totalUnread + '</span>';
                        } else {
                            document.getElementById('message').value = 'Message(0)';
                        }
                        //alert(data);  
                        //console.log(data.maxId);  
                        if (last_id == data.maxId && last_count == data.totalUnread) {
                            window.clearInterval(id);
                            console.log('same');
                            id = window.setInterval(function() {
                                push_check(last_id)
                            }, 10000);
                        } else {
                            last_id = data.maxId;
                            last_count = data.totalUnread
                            window.clearInterval(id);
                            //alert(data.maxId);  
                            console.log('new_id');
                            if (data.totalUnread > 0) {
                                document.getElementById('message').innerHTML = '<span class="badge  " style="color:white">' + data.totalUnread + '</span>';
                            } else {
                                document.getElementById('message').innerHTML = 'Message(0)';
                            }
                            id = window.setInterval(function() {
                                push_check(last_id)
                            }, 100);
                        }
                    }
                });
            }
//push_check(last_id);  
            id = window.setInterval(function() {

                push_check(last_id)
            }, 10000);
        </script>



        <title>HMS</title>
    </head>

    <body> 

        <!--        
                
        <?php
        session_start();
// code for bringing stuff from db
        $mysqli =  mysqli_connect("127.9.15.2", "adminDutPG53", "Mg9KGY9Lslrl", "hms");
        


        $query3 = "SELECT * FROM doctor_info where  d_id='$d_id'";
        $result3 = mysqli_query($mysqli, $query3);
        $data = mysqli_query($mysqli, "SELECT * FROM doctor_info where d_id='$d_id'");

        while ($info = mysqli_fetch_array($data)) {

            $_SESSION['session_ProfileImage'] = $info['d_img'];

            echo"<img src='" . $info['d_img'] . "' alt='no image'  class='img-thumbnail'>";
        }
        ?>
               
        <?php
        $query23 = "select * from doctor_info where d_id='" . $d_id . "'";
        $result23 = mysqli_query($mysqli, $query23);

        if ($data23 = mysqli_fetch_array($result23)) {
//            echo '<div id=doc_info> ' . $data23['d_name'];
            session_start();
            $_SESSION['session_LoginName'] = $data23['d_name'];
            $_SESSION['session_Qualification'] = $data23['d_qual'];
//            echo '<p id=qual1>' . $data23['d_qual'] . '<br>';
//            echo $data23['special'] . '</p>';
        }
        ?>
                
                
                
                         
                
        <?php
        $query24 = "select * from doctor_info where d_id='" . $d_id . "'";
        $result24 = mysqli_query($mysqli, $query24);

        if ($data24 = mysqli_fetch_array($result24)) {
            $_SESSION['session_Phone1'] = $data24['d_phone1'];
            $_SESSION['session_Phone2'] = $data24['d_phone2'];
//            echo '<p id=qual2>' . $data24['d_phone1'] . '<br>';
//            echo $data24['d_phone2'] . '</p>  </div>';
        }
        ?>
                            
                        
              </script>-->
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
                    <a class="navbar-brand " href="#">HMS</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="hmsNavBar">

                    <ul class="nav navbar-nav navbar-left">



                        <?php
                        //$queryalert="select count(sugar_level_2) from patient_sugar_readings where p_id='$q' and avg_total>130";
//$resultalert=mysqli_query($mysqli, $queryalert);






                        $queryhicount = "select count(distinct(p_id))  from atrisk where d_id='$d_id'";
                        $resulthicount = mysqli_query($mysqli, $queryhicount);
                        $infohicount = mysqli_fetch_row($resulthicount);





                        $queryhipat = "select count(distinct(p_id)) from atrisk where d_id='$d_id' and at_risk=1";
                        $resulthipat = mysqli_query($mysqli, $queryhipat);
                        while ($infohipat = mysqli_fetch_array($resulthipat)) {
                            $highRiskCount = $infohicount[0];
                            echo "<p id='highRisk' style='visibility:hidden; display:none'>$highRiskCount</p>";

                            //echo $infohipat[0];
                        }

                        $queryhipatwa = "select distinct(p_id) from atrisk where d_id='$d_id' and at_risk=1";
                        $resulthipatwa = mysqli_query($mysqli, $queryhipatwa);
                        $totlal = "";
                        while ($infohipatwa = mysqli_fetch_array($resulthipatwa)) {
                            $totlal .= $infohipatwa['p_id'] . " ";
                        }

                        echo "<p id='totlal' style='visibility:hidden; dsiplay:none'>$totlal</p>";


                        $querycount = "select count(distinct(p_id))from p_clinic_rec WHERE doc_id='$d_id'";
                        $resultcount = mysqli_query($mysqli, $querycount);
                        $infocount = mysqli_fetch_row($resultcount);
                        $totalCount = $infocount[0];
                        $counatlow = $totalCount - $infohicount[0];
                        echo "<p id='normalcount' style='visibility:hidden; display:none'>$counatlow</p>";

                        // $querylowpat="select distinct(p_id) from atrisk where d_id='$d_id' and at_risk=0";
                        //$resultlowpoat=  mysqli_query($mysqli, $querylowpat);
                        //while($infolowpat=  mysqli_fetch_array($resultlowpat))
                        //{
                        //  echo $infolowpat[0];
                        //}
                        ?> 

                        <li style="left: 70%;"><a href="patient_clinic_1st_form.php"><span class="glyphicon glyphicon-user"  data-toggle="tooltip" data-placement="top" title="Add patient" id="add"></span></a></li>
                        <li><a href="#" data-toggle="modal" data-target="#confirmed_appointments"> Confirmed Appointments &nbsp &nbsp &nbsp</a></li>

                        <li style="left: 100%;"><a>Welcome<?php echo " " . $d_id; ?></a></li>

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a  href="index.php">Logout</a></li>

                    </ul>




                    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group">
                            <input class="form-control"id='dstr' style="display:none" type='hidden' value='<?php echo "$d_id"; ?>'>
                            <input id="str" class="form-control" type="text" placeholder="Search patient" onkeyup="showUser();" autocomplete="off">
                            <div  id="patient_info_display" style="z-index:1; position:absolute ;width: auto; height: auto; background-color: white"></div>
                        </div>
                        <a type="submit" class="btn btn-warning" onclick="get_patient_data();" data-toggle="modal" data-target="#patient_display_info1" >Go!</a>
                    </form>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div style="margin-left: 2%; margin-right: 2%;" >



            <div class="row">

                <div class="col-xs-2" style="border-right:#ccc 1px solid; ">
                    <!-- profile image displayed here-->
                    <div >
                        <div class="row" style="height: 30%">

                            <?php // echo"<img src='" . $_SESSION['session_ProfileImage'] . "' alt='no image'  class='img-circle' style='width:250px; height:250px;'>";     ?>
                            <div class="col-lg-12"><?php echo"<img src='profile_pics/doc_1.jpg' alt='no image'  class='img-circle' style='width:100%; height:90%;'>"; ?>
                            </div>
                        </div>
                        <div class="row" style="margin-top: -20%; margin-bottom: 20% " >
                            <div class="col-lg-12">
                                <button class="btn btn-default" style="width:100%" data-toggle="modal" data-target="#modal_ChangeProfileImage"> Change Profile Picture</button>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-12"> 

                                <legend>About</legend>
                                <h5><?php echo $_SESSION['session_LoginName'] ?> </h5>
                                <h5><?php echo$d_id ?></h5>
                                <h5> <?php echo $_SESSION['session_Qualification'] ?></h5>


                            </div>

                        </div>
                        <label></label>
                        <div class="row">
                            <div class="col-lg-12"> 
                                <legend>Contact</legend>    
                                <?php echo $_SESSION['session_Phone1'] ?> <br>
                                <?php echo $_SESSION['session_Phone2'] ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-10" style=" ">
                    <!-- *********************************************  DASHBOARD **************************************************************-->
                    <legend>Dashboard</legend>
                    <div class="row">
                        <div class="col-lg-11" id="div_riskPatient" style=" height:80%; box-shadow:1px 1px 3px 2px #ccc; background-color: white; margin-left: 3%"></div>
                    </div>
                    <br>
                    <br>
                    <br><div class="row">
                        <div class="col-lg-11" id="div_gender" style=" height:80%; box-shadow:1px 1px 3px 2px #ccc; background-color: white; margin-left: 3%"> </div>


                    </div>
                    <br>
                    <div class="row">

                        <div class="col-lg-1"></div>

                    </div>


                    <br>
                    <div class="row">

                    </div>


                </div>



            </div>
        </div>


        <!--            <div class="row">
                        <div class="col-lg-12" id="patient_display_info"></div>
                        
                    </div>-->








        <div class="modal fade" id="patient_display_info1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label>Patient Info</label>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    </div>
                    <div class="modal-body" id="patient_display_info">

                    </div>

                </div>

            </div>
        </div>




        <div class="modal fade" id="modal_ChangeProfileImage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label>Change profile picture</label>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    </div>
                    <div class="modal-body">
                        <form action="upload_img.php" method="post"
                              accept-charset="  "enctype="multipart/form-data">
                            <input type="file" name="file" size="50" />
                            <br />
                            <input type="submit" value="Upload File" />
                        </form>
                    </div>

                </div>

            </div>
        </div>





        <div class="modal fade" id="confirmed_appointments" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label>Appointments given</label>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    </div>
                    <div class="modal-body" id="med_display">


                        <?php
                        echo'<table class="table table-striped">
         <tr>
          <td>
          
          Date and time</td><td>
          
          Patient_id</td></tr>';

                        while ($info203 = mysqli_fetch_array($result203)) {
                            echo '<tr><td>';

                            $t = time();

//                            echo($t . "<br>");
//                    

                            echo $info203['date_of_appointment'] . '</td><td>';
                            echo $info203['receiver_id'] . '</td></tr>';
                        }

                        echo'</table>';
                        ?>


                    </div>

                </div>

            </div>
        </div>


    </body>
</html>