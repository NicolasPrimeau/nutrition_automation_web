<?php

    // Check active session
  if(!isset($_SESSION)){ session_start(); }
  //Check for user details/authenticate that the page is being visited by an authenticated user
  if(empty($_SESSION['user']))
  {
   // if not redirect to login page
    header("Location: http://nutri_auto.com/login.php");
    exit;
  }
	/*$name = "";
	if( $_POST['name']){
		$name = $_POST['name'];
	}*/
	//if($name != "" && email != ""){

	//$user = array();
	//$user['name'] = $name;
	//update_profile($user);
	//refresh();
	//}
 
	$FormStatus = "";
	//if($_SESSION['user'] == $_POST['email']){
	
	if($_POST['name'] && $_POST['phone']){
	$FormStatus = "";
	$conn = new Mongo();
	
				
 	$db1 = $conn->Nutrition_Automation;


 	$collection1 = $db1->contacts;
	
	$cursor1 = $collection1->find();
	
	$newdata1 = array('$set'=>(array("name"=>$_POST['name'],"phone"=>$_POST['phone'])));
	
	//$info=setContacts($newdata);
	//echo "<tr>".$_SESSION['user']."</tr>";
	foreach($cursor1 as $obj1){
	
	
		if($obj1['email'] == $_SESSION['user']){
			//echo "<tr>".$_SESSION['user']."</tr>";
			//echo "<tr>".$_POST['email']."</tr>";
 			$collection1->update(array("name"=>$obj1['name'],"phone"=>$obj1['phone']), $newdata1);
		}
	}
	

	/*$db2 = $conn->security;


 	$collection2 = $db2->web_security;
	
	$cursor2 = $collection2->find();
	
	$newdata2 = array("name"=>$_POST['name'],"email"=>$_POST['email'],"phone"=>$_POST['phone']);*/

	header("Location: /user/index.php");
	
	exit;
	}
	else
	{
	$FormStatus="Fail";
	}
	//}

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
			
		    <h1 class="page-header">Update Profile</h1>
		    </div>
		</div>
			
		    <div class="row">
			<div class="col-lg-6">
			    <div class="panel panel-default">
				<div class="panel-heading">
				</div>
			    <div class="panel-body">
				<div class="row">
				    <div class="col-lg-5">
		    <form action="update_profile.php" method="POST">
			
			
			<!--Name:<br>
			<input type="text" name="name">
			<br>
		
			Phone Number:<br>
			<input type="text" name="phone">
			<br>
			<br>
			<input type="submit" class="btn btn-primary btn"/>
			<?php
			//echo "<tr>".$_SESSION['user']."</tr>";
			if($FormStatus=="Fail"){
			    echo "Please enter all information";
			}
			?>-->

			<div class="form-group">
				<label>Name</label>
				<input name="name" class="form-control">
			</div>
			<div class="form-group">
				<label>Phone Number</label>
				<input name="phone" class="form-control">
			</div>
			<input type="submit" class="btn btn-primary btn"/>
			</form>
			</div>
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
