               <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
<!--
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
-->
                        <?php
                          $concerns = getConcerns();
                           
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
                                $secs = floor($interval%(60));
                                ?> 
                                <li>
                                  <a href="#">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i>
                                        <?php echo $alert_set[$i]['subject']; ?>
                                        <span class="pull-right text-muted small">
                                        <?php 
                                          if ($days != 0)
                                            echo $days . "d ";
                                          if ($hours != 0)
                                            echo $hours . "h "; 
                                          if ($mins != 0)
                                            echo $mins . "m ";
                                          if ($days == 0 && $hours == 0 && $mins == 0)
                                            echo $secs . "s ";
                                          echo "ago</span>";
                                        ?>
                                    </div>
                                  </a>
                                </li>
                                <li class="divider"></li>
                              <?php
                              } 
                            }
                          }
                        ?>

                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                        </li>
                      </ul>
                    <!-- /.dropdown-alerts -->
                </li>
