
<!doctype html>
<?php
include("db_connect.php");

?>
<?php 
		if(isset($_POST['add']))
		{
										
			$dpt=$_POST['d_name'];
			$f=0;
			
		}
		if(empty($dpt))
			 {
			 $dpt_err="Please Enter A Valid Department";
			 $f=1;
			 }
			 if($f==0)
			 {
			$sql= "insert into department(DepName) values('$dpt')";
					 if ($conn->query($sql))
					{ 
						 $log_err="Registration success";
						
					}	
				   else{
					   $log_err="Registration Failed";
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
                                <h4 class="title">Department Details</h4><br>
								
                            </div>
                            <div class="content">
                              
                                    <div class="row">
									<form method="POST">
                                    Depatrment Name:
									<input type="text" name="d_name"/>
									<input type="submit" name="add" value="ADD DEPARTMENT"/>





                                    <button type="button" onclick="sortdepartment()">sort</button></td>

									</form>
									
		  
					<?php  
						
							$sqls= "select * from department";

						//	echo $sql;
							// exit;
							   $results=$conn->query($sqls);
								if ($results->num_rows>0)
								{ 
							?>
							<table class="table table-hover table-striped">
                                    <thead>
                                        <th>Id</th>
                                    	<th>Name</th>
                                    	
                                    	
                                    </thead>
									
								    <tbody>
									<?php
									while($ffetch=$results->fetch_assoc())
									{
										$d_id=$ffetch['d_id'];
										$d_name=$ffetch['DepName'];
									
										
										?>
                                
                                        <tr>
                                        	
                                        	<td><?php echo $d_id; ?></td>
                                        	<td><?php echo $d_name; ?></td>
                                        	<td><a href="del_dep.php?did=<?php echo $d_id; ?>">Delete</a></td>
                                        	
                                        	
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


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                
                </nav>
                <p class="copyright pull-right">
     
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
    <script type="text/javascript">
        function sortdepartment(){
window.location.href="Sort_dep.php";        }
    </script>

</html>
