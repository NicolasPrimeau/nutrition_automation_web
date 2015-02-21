<?php
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
	if( $_POST["name"] && $_POST["email"] && $_POST['phone']){
	$FormStatus = "";
	$conn = new Mongo();
	
				
 	$db = $conn->Nutrition_Automation;


 	$collection = $db->contacts;
	
	$cursor = $collection->find();
	
	$newdata = array("name"=>$_POST['name'],"email"=>$_POST['email'],"phone"=>$_POST['phone']);
	
	//$info=setContacts($newdata);
	
 	$collection->update($cursor, $newdata);
	header("Location: /user/index.php");
	
	exit;
	}
	else
	{
	$FormStatus="Fail";
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
		
		    <form action="update_profile.php" method="POST">
			Name:<br>
			<input type="text" name="name">
			<br>
			Email:<br>
			<input type="text" name="email">
			<br>
			Phone Number:<br>
			<input type="text" name="phone">
			<br>
			<br>
			<input type="submit" class="btn btn-primary btn"/>
			<?php
			if($FormStatus=="Fail"){
			    echo "Please enter all information";
			}
			?>
			</form>
			
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
