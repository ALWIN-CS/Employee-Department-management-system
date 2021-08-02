

<!doctype html>
<?php include("db_connect.php"); ?>
<?php 
        if(isset($_GET['empid']))
            $empid=$_GET['empid'];

        {
        if(isset($_POST['submit']))
        {
                                        
            $empname=$_POST['empname'];
            $empage=$_POST['empage'];
            $designation=$_POST['designation'];
            $department=$_POST['department'];
           
            $f=0;
            if(empty($empname))
             {
             $empname_err="Please Enter A Valid employee name";
             $f=1;
             }
            if(empty($empage))
             {
             $empage_err="Please Enter A Valid employee age";
             $f=1;
             }
        
        if(empty($designation))
             {
             $designation_err="Please Enter A Valid Designation";
             $f=1;
             }
             if(empty($department))
             {
             $department_err="Please Enter A Valid Department";
             $f=1;
             }
                          if($f==0)
             {
            $sql= "update employee set d_id=$department where emp_id=".$empid."";
          
                     if ($conn->query($sql))
                    { 
                         $log_err="Department Updation successfull";
                        
                    }   
                   else{
                       $log_err="Updation Failed";
                   }
         }
        }
    }
        
        ?>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>EMS</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


        <div class="sidebar-wrapper">
            <?php include("sidebar.php"); ?>
        </div>
    </div>

    <div class="main-panel">
    
      <?php include("nav.php"); ?>
      <?php
include("db_connect.php");
if(isset($_GET['empid']))
{
    $empid=$_GET['empid'];
    $sql= "select * from employee where emp_id=$empid";
    
   $result=$conn->query($sql);
    if ($result->num_rows>0)
    { 
        $user=$result->fetch_assoc();
        $emp_id=$user['emp_id'];
        $emp_name=$user['emp_name'];
        $emp_age=$user['emp_age'];
        $emp_designation=$user['emp_designation'];
    }


        
}
?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Change Employee Details</h4><br>
                            
                            </div>
                            <div class="content">
                                <div class="container-fluid">
                                    <form method="POST">
                                    <div class="row">
                                       
                                    <form method="POST"> 
                                     
                                      
                                    <div class="col-md-12">

                                            <div class="form-group">
                                                  <div class="form-group">
                                                <label>Employee Name</label>
                                                <input type="text" placeholder="<?php echo $emp_name; ?>" class="form-control" name="empname"  value="<?php echo $emp_name; ?>" required>
                                               
                                            </div>
                                        </div>

                                        <div class="col-md-12">

                                            <div class="form-group">
                                                  <div class="form-group">
                                                <label>Employee Age</label>
                                                <input type="number" placeholder="Age" class="form-control" name="empage"  value="<?php echo $emp_age; ?>" required>
                                               
                                            </div>
                                        </div>
                                         <div class="form-group">
                                                  <div class="form-group">
                                                <label>Designation</label>
                                                <input type="text" placeholder="Designation" class="form-control" name="designation"  value="<?php echo $emp_designation; ?>" required>
                                               
                                            </div>
                                               
                                        
                                        
                                    </div>
                                           <div class="col-md-12">
                                            <div class="form-group">
                                                <?php  
                                                
                                                    $sqld= "select * from department";
   
                                                       $resultd=$conn->query($sqld);
                                                        if ($resultd->num_rows>0)
                                                        { 
                                                    ?>
                                                    <label>Department</label>
                                                    <select name="department" class="form-control" required>
                                                    <option value ="">Select Department</option>
                                                    <?php
                                                            while($dept=$resultd->fetch_assoc())
                                                            {
                                                                $d_id=$dept['d_id'];
                                                                $DepName=$dept['DepName'];
                                                                ?>
                                                                <option value ="<?php echo $d_id; ?>"><?php echo $DepName; ?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                        </select>
                                                        <?php
                                                        }
                                                        ?>
                                               <?php echo (isset( $dpt_err))?$dpt_err:""; ?>
                                                
                                            </div>
                                        
                                        
                                    </div>
                                   
                                        <button type="submit" class="btn btn-info btn-fill pull-right" value="submit" name="submit" >change Employee</button>
                                        
                                    <div class="clearfix"></div>
                                </form> 
                                
                           
                             

                                </div>
                            </div>
                        </div>
                    </div>
                

                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                   
                </nav>
                <p> Copyright All rights reserved
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>

    <script>
        function deleteemployee(id){

           
            var txt;
  if (confirm("Are you sure to delete this employee?")) {
    window.location.href="delete_employee.php?empid="+id;
  } else {
    
  }
        }
 function sortemployee(){
    window.location.href="sort_emp.php";
 }

    //change employee function

    function changeemployee(id){
        window.location.href="change_emp.php?empid="+id;
    }
    </script>

</html>
