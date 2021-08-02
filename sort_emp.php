

<!doctype html>
<?php include("db_connect.php"); ?>
<?php 
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
            $sql= "insert into employee(emp_name,emp_age,emp_designation,d_id) values('$empname','$empage','$designation',$department)";
                     if ($conn->query($sql))
                    { 
                         $log_err="Registration success";
                        
                    }   
                   else{
                       $log_err="Registration Failed";
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

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Employee Details</h4><br>
                                
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
                                                <input type="text" placeholder="Employee Name" class="form-control" name="empname"  value="" required>
                                               
                                            </div>
                                        </div>

                                        <div class="col-md-12">

                                            <div class="form-group">
                                                  <div class="form-group">
                                                <label>Employee Age</label>
                                                <input type="number" placeholder="Age" class="form-control" name="empage"  value="" required>
                                               
                                            </div>
                                        </div>
                                         <div class="form-group">
                                                  <div class="form-group">
                                                <label>Designation</label>
                                                <input type="text" placeholder="Designation" class="form-control" name="designation"  value="" required>
                                               
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
                                   
                                        <button type="submit" class="btn btn-info btn-fill pull-right" value="submit" name="submit" >Add Employee</button>
                                       
                                    <div class="clearfix"></div>
                                </form> 
                                <?php  
                        
                            $sqls= "select * from employee as t1 
                                    inner join department as t2 on t1.d_id=t2.d_id
                                    order by t1.emp_name ASC";

        

                        //  echo $sql;
                            // exit;
                               $results=$conn->query($sqls);
                                if ($results->num_rows>0)
                                { 
                            ?>
                            <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Id</th>
                                        <th>Employee Name</th>
                                        <th>Age</th>
                                        <th>Department</th>
                                        <th>Designation</th>
                                        
                                        
                                        
                                    </thead>
                                    
                                    <tbody>
                                    <?php
                                    while($allocation=$results->fetch_assoc())
                                    {
                                        $emp_id=$allocation['emp_id'];
                                        $emp_name=$allocation['emp_name'];
                                        $emp_age=$allocation['emp_age'];
                                        $emp_designation=$allocation['emp_designation'];
                                        $DepName=$allocation['DepName'];
                                        

                                    
                                        
                                        ?>
                                
                                        <tr>
                                            
                                            <td><?php echo $emp_id; ?></td>
                                            <td><?php echo $emp_name; ?></td>
                                            <td><?php echo $emp_age; ?></td>
                                            <td><?php echo $emp_designation; ?></td>
                                            <td><?php echo $DepName; ?></td>
                                          
                                            <td>    

                                             <button type="button" onclick="deleteemployee(<?php echo $emp_id; ?>)">Delete</button></td>
                                              <td>    

                                            
                                            
                                            
                                        </tr>
                                    <?php  }?>
                                    </tbody>
                             </table>
                                <?php } ?>

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
 

    //change employee function

    function changeemployee(id){
        window.location.href="change_emp.php?empid="+id;
    }
    </script>

</html>
