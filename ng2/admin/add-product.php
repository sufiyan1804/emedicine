<?php

require './class/atclass.php';
$msg = "";

if($_POST)
{
	$name= mysqli_real_escape_string($connection , $_POST ['pname']);
    $price=mysqli_real_escape_string($connection , $_POST ['pprice']);
    $detail=mysqli_real_escape_string($connection , $_POST ['pdetail']);
	$fileupload=$_FILES['pphoto']['name'];
	$stock=mysqli_real_escape_string($connection , $_POST ['pstock']);
	$category_id=mysqli_real_escape_string($connection , $_POST ['c1']);
	$company_id=mysqli_real_escape_string($connection , $_POST ['company1']);
	 
 
	$query = mysqli_query($connection, " insert into tbl_product(prod_name,prod_price,prod_detail,prod_photo,prod_stock,category_id,company_id) 
	values ('{$name}','{$price}','{$detail}','{$fileupload}','{$stock}','{$category_id}','{$company_id}')") or die (mysqli_error($connection));
	if($query)
	{
		$msg = '<div class="alert alert-success" role="alert" >
		record added successfully
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
   	 <?php
   	   include './themepart/sidebar.php';
   	 ?>
		<!--left-fixed -navigation-->
		
		<!-- header-starts -->
		<?php
                include './themepart/header.php'; 

        ?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
						<?php
						echo $msg ;
						?>
					<h2 class="title1">Product form </h2>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 

					
						<div class="form-title">
							<h4>Add Product information:</h4>
						</div>
						<div class="form-body">
							<form method="post" id="myform" enctype="multipart/form-data">
								 <div class="form-group"> 
									<label for="exampleInputEmail1">Product name :</label> 
                            <input type="text" class="form-control" id="exampleInputEmail1" name="pname" placeholder="Enter name "required> 
                             
						</div>
                      
						<div class="form-group">
                             <label for="exampleInputPassword1"> Product price :</label>
                              <input type="text" class="form-control" id="exampleInputPassword1" name="pprice" placeholder="Enter price "required> 
                        </div>
					
						<div class="form-group">
                            <label for="exampleInputPassword1"required> Product Detail :</label>
                             
							  <textarea class="form-control" name="pdetail"></textarea>
                        </div>
						<div class="form-group">
                             <label for="exampleInputPassword1"> Product Photo :</label>
                              <input type="file"  id="exampleInputPassword1" name="pphoto" required> 
                        </div>
						<div class="form-group">
                             <label for="exampleInputPassword1"> Product stock :</label>
                              <input type="text" class="form-control" id="exampleInputPassword1" name="pstock" placeholder="Enter stock "required> 
                        </div>
					
						<div class="form-group">
                             <label for="exampleInputPassword1"  name="cid" required> category :</label>
                            
							 

							  <?php
									$query = mysqli_query($connection,"select * from tbl_category");
									echo "<select name='c1' class='form-control'>";
									while($data = mysqli_fetch_array($query))
									{
										echo "<option value='{$data['category_id']}'>{$data['category_name']}</option>";
									}
									echo"</select>";
								?>
						</div>
					
						<div class="form-group">
                             <label for="exampleInputPassword1" name="company1"required> Company :</label>
							 

								<?php
								$query = mysqli_query($connection,"select * from tbl_company");
								echo "<select name='company1' class='form-control'>";
								while($data = mysqli_fetch_array($query))
								{
									echo "<option value='{$data['company_id']}'>{$data['company_name']}</option>";
								}
								echo"</select>";
								?>

                        </div>

                        <div>
        			        <button type="submit" class="btn btn-default">add product</button>
							<button type="reset" class="btn btn-danger">reset</button>
							<button type="button" onclick="window.location='display-product.php';" class="btn btn-primary">view </button>
                           
						</div>
				
					
						</form>
					</div>
				</div>
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