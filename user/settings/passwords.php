<?php


	

 if(!isset($_SESSION)){ session_start(); }

	if($_POST['password']){
	
	$conn = new Mongo();
				
 	$db = $conn->security;
	

 	$collection = $db->web_security;
	
	$cursor = $collection->find();
	
	$newdata = array('$set'=>(array("password"=>$_POST['password'])));
	
	foreach($cursor as $obj){
	
		
		if($obj['username'] == $_SESSION['user']){
			
			$collection->update(array("password"=>$obj['password']),$newdata);
		
		}
		header("Location: /user/settings/passwords.php");
	}
	$submissionStatus == "True";
	
	}
	else
	{
	$submissionStatus == "False";
	}

?>



<?php include($_SERVER['DOCUMENT_ROOT'] . "/assets/php_includes.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nutrition Automation</title>

    <?php require($_SERVER['DOCUMENT_ROOT'] . "/assets/css_includes.html"); ?>

</head>

<body>

    <div id="wrapper">
      <?php require($_SERVER['DOCUMENT_ROOT'] . "/assets/navigation_menu.php"); ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                    <!-- Add content here -->
                    <!--<p> Here be dragons</p>-->
		    <h1 class="page-header">Change Password</h1>
		    </div>
		</div>
			
		    <div class="row">
			<div class="col-lg-6">
			    <div class="panel panel-default">
				<div class="panel-heading">
				</div>
			    <div class="panel-body">
				<div class="row">
				    <div class="col-lg-8">
					<form action="passwords.php" method=POST role="form">
					
					  <div class="form-group">
					     <label>New Password</label>
					     <input name="password" class="form-control" type="password">
					  </div>

					 <!-- <div class="form-group">
                                    	<input class="form-control" placeholder="Password" name="password" type="password" value="">
                                	</div>-->
					  
					  <input type="submit" class="btn btn-primary btn"/>
					 <?php
					echo "<br>";
					if ($submissionStatus == "True"){
						echo "Password have been changed sucessfully";
					}
					if($submissionStatus == "False")
					{
						echo "Please enter all information";
					}
					
    				 	 ?>
					</form>
				   </div>
			     </div>
			</div>

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
		
	

	
		
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php require($_SERVER['DOCUMENT_ROOT'] . "/assets/js_includes.html"); ?>

</body>

</html>
