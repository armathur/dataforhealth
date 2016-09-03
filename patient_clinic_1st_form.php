<html>
    <head>
        <meta charset="UTF-8">
        
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css"><script src="jquery-1.9.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="jquery-1.9.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    
    <script>
     function patient_clinic_insert()
         {
             
            
             d_id=document.getElementById('d_id').value;
             name=document.getElementById('name').value;
              dob=document.getElementById('dob').value;
               b_grp=document.getElementById('b_grp').value;
                height=document.getElementById('height').value;
                 weight=document.getElementById('weight').value;
                 gender=document.getElementById('gender').value;
              father_name=document.getElementById('father_name').value;
              father_b_grp=document.getElementById('father_b_grp').value;
              mother_name=document.getElementById('mother_name').value;
              mother_b_grp=document.getElementById('mother_b_grp').value;
              email=document.getElementById('email').value;
              phone1=document.getElementById('phone1').value;
              phone2=document.getElementById('phone2').value;
              address=document.getElementById('address').value;
         
              
               if (d_id=="")
  {
  alert("cant do anything");
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("form_body").hidden=false;
    document.getElementById("form_body").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","patient_clinic_1st_form_insert.php?q="+d_id+"&r="+name+"&s="+dob+"&t="+b_grp+"&u="+height+"&v="+weight+"&gen="+gender+"&w="+father_name+"&x="+father_b_grp+"&y="+mother_name+"&z="+mother_b_grp+"&d="+email+"&a="+phone1+"&b="+phone2+"&c="+address,true);

xmlhttp.send();
}    
            
    </script>
    
        <title></title>
    </head>
    <body style="background-color: #222222">
        
        <nav class="navbar navbar-default" role="navigation" style="border-radius: 0px; padding-top: 1%;">
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
                        <li style="left:60%"><a href="javascript:history.go(-1)"><span class="glyphicon glyphicon-home" data-toggle="tooltip" data-placement="top" title="Messages" id="msg"></span></a></li>
                        

                     
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a  href="index.php"> <span class="glyphicon glyphicon-off" data-toggle="tooltip" data-placement="top" title="Logout" id="logout" ></span></a></li>

                    </ul>




                    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group">
                             <input class="form-control"id='dstr' type='hidden' value='<?php echo "$d_id"; ?>'>
                            
                       
                    </form>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        
        
       <div class="panel panel-default">
  <div class="container">
        
        <div class="jumbotron" style="margin-top:10% ;width: 100%">
            
            <legend style="">Patient Login</legend>
  <div class="panel-body" id="form_body">
      <form class="form-horizontal" role="form" action="patient_clinic_1st_form_insert.php" method="post">
         
          <div class="form-group" >
    <label  class="col-sm-2 control-label" style="width:400px">Confirm your id to add a patient</label>
    <div class="col-sm-10" style="width:300px">
      <input type="text" class="form-control" name="d_id" id="d_id" placeholder="doctor id">
    </div>
  </div>
          
             
          
          
          
          
          
          
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label" style="width:400px">Name</label>
    <div class="col-sm-10" style="width:300px">
      <input type="text" class="form-control" name="name"id="name" placeholder="Name">
    </div>
  </div>
  <div class="form-group">
    <label for="dob" class="col-sm-2 control-label" style="width:400px">DOB</label>
    <div class="col-sm-10" style="width:300px">
        <input type="date" class="form-control" name="dob" id="dob" placeholder="DOB">
    </div>
  </div>
 
      <div class="form-group">
    <label for="b_grp" class="col-sm-2 control-label" style="width:400px">Blood Group</label>
    <div class="col-sm-10" style="width:300px">
      <input type="text" class="form-control" name="b_grp"  id="b_grp" placeholder="Blood Group">
    </div>
    </div>
    
    <div class="form-group">
    <label for="name" class="col-sm-2 control-label" style="width:400px">Height(cm)</label>
    <div class="col-sm-10" style="width:300px">
      <input type="text" class="form-control" name="height" id="height" placeholder="Height">
    </div>
  </div>
    
    <div class="form-group">
    <label for="name" class="col-sm-2 control-label" style="width:400px">Weight</label>
    <div class="col-sm-10" style="width:300px">
      <input type="text" class="form-control" name="weight" id="weight" placeholder="Weight">
    </div>
    
    
  
  </div>
          <div class="form-group">
    <label for="name" class="col-sm-2 control-label" style="width:400px">Gender</label>
    <div class="col-sm-10" style="width:300px">
      <input type="text" class="form-control" name="gender" id="gender" placeholder="enter m or f">
    </div>
    
    
  
  </div>
          <div class="form-group">
    <label for="father_name" class="col-sm-2 control-label" style="width:400px">Father name</label>
    <div class="col-sm-10" style="width:300px">
      <input type="text" class="form-control" name="father_name" id="father_name" placeholder="Father Name" >
    </div>
  </div><div class="form-group">
    <label for="f_b_grp" class="col-sm-2 control-label" style="width:400px">Father's Blood Group</label>
    <div class="col-sm-10" style="width:300px">
      <input type="text" class="form-control" name="father_b_grp"  id="father_b_grp" placeholder="Father's Blood Group">
    </div>
  </div><div class="form-group">
    <label for="mother_name" class="col-sm-2 control-label" style="width:400px">Mother's Name</label>
    <div class="col-sm-10" style="width:300px">
      <input type="text" class="form-control" name="mother_name"  id="mother_name" placeholder="Mother Name">
    </div>
  </div><div class="form-group">
    <label for="m_b_grp" class="col-sm-2 control-label" style="width:400px">Mother's Blood Group</label>
    <div class="col-sm-10" style="width:300px">
      <input type="text" class="form-control" name="mother_b_grp" id="mother_b_grp" placeholder="Mother's Blood Group">
    </div>
  </div><div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label" style="width:400px">Email</label>
    <div class="col-sm-10" style="width:300px">
      <input type="email" class="form-control" name="email" id="email" placeholder="Email">
    </div>
  </div>
          
          <div class="form-group">
    <label for="phone_no" class="col-sm-2 control-label" style="width:400px">Phone Number</label>
    <div class="col-sm-10" style="width:300px">
      <input type="text" class="form-control" name="phone1" id="phone1" placeholder="Phone Number">
    </div>
  </div>
          
         
           <div class="form-group">
    <label for="emergency_phone_no" class="col-sm-2 control-label" style="width:400px">Emergency Phone no</label>
    <div class="col-sm-10" style="width:300px">
      <input type="text" class="form-control" name="phone2" id="phone2" placeholder=" Emergency Phone Number">
    </div>
  </div>
          
           <div class="form-group">
    <label for="address" class="col-sm-2 control-label" style="width:400px">Address</label>
    <div class="col-sm-10" style="width:300px">
      <input type="text" class="form-control" name="address" id="address" placeholder=" Address">
    </div>
  </div>

  
  
          

          <a  class="btn btn-primary" style="width:100px; margin-left: 42%" onclick="patient_clinic_insert();" >Sign up</a>
    
  
      </form>
  </div>
        
         </div>
        </div>
    
  </div>
        <div name="succ_div" id="succ_div">
        </div>







</body></html>