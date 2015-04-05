<?php include($_SERVER['DOCUMENT_ROOT'] . "/assets/php_includes.php"); ?>

<?php
  /*// Check active session
  if(!isset($_SESSION)){ session_start(); }
  //Check for user details/authenticate that the page is being visited by an authenticated user
  if(empty($_SESSION['user']))
  {
   // if not redirect to login page
    header("Location: login.php");
    exit;
  }
*/
?>

<!DOCTYPE html>
<html lang="en">

		 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nutrition Automation - Home</title>

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
                   <!-- <p> Here be dragons</p> -->
		   <h1> Dashboard <h1/>
			
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

	        <div class="row">
		   <div class="col-lg-3 col-md-6">
		      <div class="panel panel-primary">
			  <div class="panel-heading">
		             <div class="row">
				<div class="col-xs-3">
				   <i class="fa fa-comments fa-5x"></i>
				</div>
			     	<div class="col-xs-9 text-right">
				   <div class="huge"> </div>
				   <div>Messages</div>
				</div>
			     </div>
			  </div>
			  <a href="#">
			     <div class="panel-footer">
				<a href="/messages.php"><span class="pull-left">Add Messages</span></a>
				<span class="pull-right">
				  <i class="fa fa-arrow-circle-right"></i>
				</span>
				<div class="clearfix"></div>
			     </div>
			  </a>
		       </div>
		    </div>
		</div>

		  <div class="row">
                    <div class="col-lg-12">

                    <!-- Add content here -->
                    <!-- <p> Here be dragons</p> -->
                       <div class="panel panel-default">
                           <div class="panel-heading">
                                    Food in Fridge
                                </div>
                           <!-- /.panel-heading -->
                          <div class="panel-body">
				
                             <div class="table-responsive">

				<?php
				
 				$conn = new Mongo();

				
 				$db = $conn->Nutrition_Automation;


 				$collection1 = $db->food_data;

				
 				$cursor1 = $collection1->find();

				$collection2 = $db->bins;
				$cursor2 = $collection2->find();

				
 				
				
				echo '<table class="table table-striped">';
					
				/*foreach($cursor as $obj){
				echo "<tr><td>" . $obj['date'] . "</td><td>" . $obj['quantity'] . "</td></tr>"; 
				}*/			
				echo "<thead>";
				
				
				//echo "<tr>";
				
				//echo "<tr><th>".Bin."</th>";
				echo "<tr><th>".Food."</th>";
				echo "<th>".Quantity."</th>";
				echo "<th>".Date."</th></tr>";				
                                /*echo '<th>'Quantity'</th>';
                                echo '<th>'Expiration Date'</th>';*/
				//echo "</tr>";
				echo "</thead>";
				echo "<tbody>";
				
				//foreach($cursor2 as $obj2){
				  // echo "<tr><td>".$obj2['name']."</td></tr>";
				   //echo "<br>";
				//}
				$i=1;
 				/*foreach ($cursor1 as $obj1) {
			          
				  //echo "<tr><td>".$obj1['bin']."</td>";
				if($obj1['bin'] == $i){
				  foreach($cursor2 as $obj2){
				    if($obj2['bin'] == $i){
				    echo "<tr><td>".$obj2['name']."</td>";
			            }
				  }
				}
 				  echo "<td>".$obj1['quantity']."</td>";
				  echo "<td>".date('Y-m-d',$obj1['date']->sec)."</td></tr>";
				  //echo "<td>".date('Y-m-d H:i:s', strtotime(date($obj['date'])))."</td></tr>";
				  //echo "<td>".$obj1['date']."</td></tr>";
				 // $i=$i+1;*/
				while($i < 5){
				 foreach($cursor1 as $obj1){
					
					
					if($obj1['bin'] == $i){
					    foreach($cursor2 as $obj2){
						if($obj2['bin'] == $i){
						echo "<tr><td>".$obj2['name']."</td>";
						}
					    }
					    echo "<td>".$obj1['quantity']."</td>";
					    echo "<td>".date('H:m Y-m-d',$obj1['date']->sec)."</td></tr>";
					}
				    }
 				    
 			            $i = $i + 1;
				}

				echo "</tbody>";
				echo '</table>';
				?>
                                
                             </div>
                        </div>
                     </div>
		   </div>

	 	   <!-- <div class="col-lg-4">
		       <div class="panel panel-default">
			  <div class="panel-heading">
			     <i class="fa fa-bell fa-fw"></i>
				Notification Panel
			  </div>
			
		       <div class="panel-body">
			  <div class="list-group">
			     <a href="/messages.php" class="list-group-item">
				<i class="fa fa-comment fa-fw"></i>
				New Messages
			       <span class="pull-right text-muted small">
				    
					<?php 
					echo "<em>";
                                          if ($days != 0)
                                            echo $days . "d ";
                                          if ($hours != 0)
                                            echo $hours . "h "; 
                                          if ($mins != 0)
                                            echo $mins . "m ";
                                          if ($days == 0 && $hours == 0 && $mins == 0)
                                            echo $secs . "s ";
                                          echo "ago</em>";
                                        ?>
				</span>
			     </a>
			     <a href="alerts/index.php" class="list-group-item">
                                
				<?php
                          /*$concerns = getConcerns();
                           
                         foreach($concerns as $concern){
                            foreach($concern['info'] as $alert_set){ 
                              for($i=0;$i<count($alert_set) && $i < 8;$i++){
       
                                // WARNING, proper coding would be to set PHP to figure out how many hours differ from ISO date at local location, but lazyness and futility
                               $date1 = $concerns[0]['date']->sec + (5*60*60);// WARNING, MongoDate assumes the date given is in ISO format
                                                                               // When php converts this ISO format back into a unix timestring, it adds to 5h
                                                                               //  The fix is to add 5h (Or the current timezone time) to this time. 
                                $date2 = time();
                                $interval = $date2 - $date1;
                                $days = floor($interval/(3600*24));
                                $hours = floor(($interval%(3600*24))/(3600));
                                $mins = floor(($interval%3600)/(60));
                                $secs = floor($interval%(60));*/
                                ?> 
				<i class="fa fa-envelope fa-fw"></i>
				New Alerts
				<span class="pull-right text-muted small">
				
				<?php 
				echo "<em>";
                                          if ($days != 0)
                                            echo $days . "d ";
                                          if ($hours != 0)
                                            echo $hours . "h "; 
                                          if ($mins != 0)
                                            echo $mins . "m ";
                                          if ($days == 0 && $hours == 0 && $mins == 0)
                                            echo $secs . "s ";
                                          echo "ago</em>";
                                        ?>
			         
				</span>
			     </a>
			
			     <a href="#" class="list-group-item">
                                <i class="fa fa-tasks fa-fw"></i>
                                Bins' Info Updated
                                <span class="pull-right text-muted small">
                                    <em>10 minutes ago</em>
                                </span>
                             </a>
			  </div>
		          <a href="#" class="btn btn-default btn-block">View All Alerts</a>
		       </div>
		    </div>	
                  </div>
		</div>-->

		
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php require($_SERVER['DOCUMENT_ROOT'] . "/assets/js_includes.html"); ?>

</body>

</html>
