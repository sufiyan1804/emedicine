<?php
require './class/atclass.php';
$msg = "";
if($_POST)
{
	
	$paamount=mysqli_real_escape_string($connection,$_POST['paamount']);
	$padate=mysqli_real_escape_string($connection,$_POST['padate']);
	$pamethod=mysqli_real_escape_string($connection,$_POST['pmethod']);
	$oid=mysqli_real_escape_string($connection,$_POST['txt1']);
    
$query=mysqli_query($connection,"insert into tbl_payment(payment_amount,payment_date,payment_method,order_id) values('{$paamount}','{$padate}','{$pamethod}','{$oid}')") or die(mysqli_error($connection));

if($query)
{
	$msg = '<div class="alert alert-success" role="alert">
	Records inserted successfully
	</div>';

}
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>ESSENCIAL E-MEDICAL STORE</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS -->

 <!-- side nav css file -->
 <link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
 <!-- side nav css file -->
 
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 

<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
<script src="java/jquery-3.7.1.min.js"> </script>
    <script src="java/jquery.validate.js"> </script>

    <script>
        $(document).ready(function () {
            $("#myform").validate();
        });
    </script>
	
    <style>
        .error {
            color: red;
        }
    </style>



</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">

		<!--left-fixed -navigation-->
		<?php
		include './themepart/sidebar.php';
		?>
		<!-- header-starts -->
        <?php
                include './themepart/header.php';

        ?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h2 class="title1">payment Form</h2>
					
					<?php
						echo $msg;
						?>
					
					<div class=" form-grids row form-grids-right">
						<div class="widget-shadow " data-example-id="basic-forms"> 

							<div class="form-title">
								<h4>Add payment Information :</h4>
							</div>
							<div class="form-body">
								<form class="form-horizontal" method="post" id="myform" enctype="multipart/form-data">
									 <div class="form-group">
									 <label for="inputEmail3" class="col-sm-2 control-label">Payment amount</label> 
									 <div class="col-sm-9"> <input type="text" class="form-control" id="inputEmail2" name="paamount" placeholder="Enter payment amount" required> 
									</div>
									</div>
                                    <div class="form-group">
									 <label for="inputEmail4" class="col-sm-2 control-label">Payment method</label> 
									 <div class="col-sm-9"> 
                                     
									 <div>
										<select id="method"name="pmethod">
										<option value= "cod">COD</option>
										<option value= "upi/paytm/rupayee">UPI/PAYTM/RUPAYEE</option>
										<option value= "net banking">Net Banking</option>
										<option value= "Credit/Debit/ATM Card">Credit/Debit/ATM Card</option>
										</select>
									 </div>
									</div>
                                    </div>
									
									 <div class="form-group">
									 <label for="inputEmail3" class="col-sm-2 control-label">Date</label> 
									 <div class="col-sm-9"> <input type="date" class="form-control" id="inputEmail9" name="padate" placeholder="Enter Birthdate" required> 
									</div> 
									 </div>
									 
									 <div class="form-group">
									 <label for="inputEmail3" class="col-sm-2 control-label">Order id</label> 
									 <div class="col-sm-9"> 
										
									 <?php
								 $query = mysqli_query($connection, "select * from tbl_ordermaster");
								 echo "<select name='txt1' class='form-control'>";
								 while($data=mysqli_fetch_array($query))
								 {
									echo "<option value='{$data['order_id']}'></option>";
								 }
								 echo "</select>";
								 ?>
									 
									</div>
									 </div>													
									  <div class="col-sm-offset-2"> <button type="submit" 
									  class="btn btn-info">Submit</button> 
									  <button type="reset" class="btn btn-danger">Reset</button>
									  <button type="button" onclick="window.location='display-payment.php';" class="btn btn-primary">View</button>
									</div>
							

								 </form> 

							</div>
						</div>
					</div>
						</div>
							</form>
						</div>
					</div>
					
		<!--footer-->
		<?php
		include './themepart/footer.php';
		?>
        <!--//footer-->
	</div>
	
	<!-- side nav js -->
	<script src='js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
	
	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->
	
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
   
</body>
</html>