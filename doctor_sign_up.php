<html>
    <head>
        <meta charset="UTF-8">
        
        
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css"><script src="jquery-1.9.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="jquery-1.9.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    
        <title></title>
    </head>
    <body>
       <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title" align='center'>Doctor information</h3>
  </div>
  <div class="panel-body">
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
      <button type="submit" class="btn btn-default">Sign up</button>
    </div>
  </div>
</form>
    
  </div>
</div>




</body></html>