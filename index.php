<html>

    <head>
        <!-- Bootstrap -->
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="shortcut icon" href="images/favicon.ico">
        <script src="js/jquery-1.9.1.js"></script>
        <script src="js/bootstrap.js"></script>

        


        <title>Health Monitor System!</title>
    </head>
    <body>
        
        <nav class="navbar navbar-inverse" role="navigation" style="border-radius: 0px;">
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

                   

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>


        <div class="container">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-9">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" align="center">



                                
                                <div class="item active">
                                    <div class="carousel-caption">
                                        
                                    </div>
                                    <img src="images/pic_caro2.jpg">

                                </div>

                                <div class="item">
                                    <img src="images/pic_caro3.jpg">

                                </div>

                            </div>


                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div> 
                    </div>

                    <div class="col-md-3"> 
                        <legend>Doctor Login</legend>
                        <form action="doctor_1st_page.php" method="post">
                          <?php  $_SESSION['count']=0;
?>                          

                            <div class="form-group">

                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="E-mail" name="d_email" id="d_email">
                                </div>
                                <div class="form-group ">
                                    <input type="text" class="form-control" placeholder="Doctor-Id" name="d_id" id="d_id">
                                </div>
                                
                                <button type="submit" class="btn btn-success" onclick="countadd();">Submit</button> 
                          
                                
                                <label>or</label>
                                
                                
                               
                                
                                <!--<button type="button" class="btn btn-info" onclick="window.location.href = 'doctor_sign_up.php'">Sign up</button>-->
                                <button class="btn btn-info" data-toggle="modal" data-target="#Modal_DoctorSignUp">Sign up</button>
                            </div>
                            <label><h4>Patient login? <a href="Page_PatientLogin.php"><small>Click here.</small></a></h4></label>

                        </form>

                    </div>

                </div>

            </div>
        </div>

        
        <div class="well well-lg" style="background-color: #419641; border-radius: 0px;">
            <p>
                Copyright &#169; Manya Sangal &AMP; Aman Mathur
            </p>

            

        </div>  











    </div>




    <div class="modal fade" id="Modal_DoctorSignUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <label>Doctor SignUp</label>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                </div>
                <div class="modal-body">
                    <div >
                        <form class="form-horizontal" role="form" action="doctor_info_insert.php" method="post">


                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="d_name" id="d_name" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dob" class="col-sm-2 control-label">DOB</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="d_dob" id="dob" placeholder="DOB">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="qual" class="col-sm-2 control-label">Qualifications</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="d_qual" id="d_qual" placeholder="Qualification">
                                </div>
                            </div><div class="form-group">
                                <label for="Special" class="col-sm-2 control-label">Specialization</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="special" id="special" placeholder="Specialization">
                                </div>
                            </div><div class="form-group">
                                <label for="email" class="col-sm-2 control-label">E-mail</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="d_email" id="d_email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone_no" class="col-sm-2 control-label">Phone Number</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="d_phone1" id="d_phone1" placeholder="Phone Number">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="emergency_phone_no" class="col-sm-2 control-label">Emergency Phone no</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="d_phone2" id="d_phone2" placeholder=" Emergency Phone Number">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="address" class="col-sm-2 control-label">Clinic Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="d_address" id="d_address" placeholder=" Address">
                                </div>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success">Sign up</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>
</body>


</html>



