<!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">

<!-- Old HTML from bootstrap
                          <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
-->


                        <?php
                          $data = getQuantityData();
                          $recent_data = array();
                          foreach($data as $item){
                            if(!in_array($item['bin'],$recent_data)){
                              $recent_data[$item['bin']] = $item;
                              continue;
                            }
                            if($recent_data[$item['bin']]['date'] < $item['bin']){
                              $recent_data[$item['bin']] = $item;
                            }
                          }
              
                          foreach($recent_data as $rd){
                          ?>                  
                            <li>
                              <a href="/fridge/bins/single_bin.php?bin=<?php echo $rd['bin']; ?>">
                                  <div>
                                      <p>
                                          <strong>Bin <?php echo $rd['bin']; ?></strong>
                                          <span class="pull-right text-muted">
                                          <?php echo $rd['quantity'] . "% Full";
                                          ?>
                                          </span>
                                      </p>
                                      <div class="progress progress-striped active">
                                          <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php echo intval($rd['quantity']); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo intval($rd['quantity']); ?>%">
                                              <span class="sr-only"><?php echo $item['quantity'];?>% Ful</span>
                                          </div>
                                      </div>
                                  </div>
                              </a>
                            </li>
                            <li class="divider"></li>
                         <?php 
                         }

                        ?>
                        <li>
                            <a class="text-center" href="/fridge/bins/index.php">
                                <strong>See All Bins</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
