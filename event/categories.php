<?php include "../Admin/connection.php";?>
                  <?php
                  if(isset($_GET['C_id'])){
                    $cat_id = $_GET['C_id'];

                    $sql = "SELECT C_Name FROM category WHERE C_id = $cat_id";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $C_Name= $row['C_Name'];
                  }
                  else{
                    header('eventhomepage (1)'.SITEURL);
                  }

                  ?>
                  <h2 class="page-heading"><a href="#" >"<?php echo $C_Name;?>"</a></h2>
                        <div class="row">
                            <div class="col-md-4">
                              <?php 
                               $sql2="SELECT * FROM events WHERE C_id=$cat_id";
                               $res2=mysqli_query($con,$sql2);
                               $count2=mysqli_num_rows($res2);
                               if($count2>0){
                                 while($row2=mysqli_fetch_assoc($res2))
                                 {
                                  
                                    echo "<a href = 'event.php?E_id={$row2['E_id']}'>{$row2['title']}</a>";
                                    ?>
                                     
                                    <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row2['Image']).'" width="400px;"height="300px;"/>'?>
                                    <?php
                                 }
                               }
                               else
                               {
                                 echo "Events Not available";
                               }
                               ?>
                            
                              </div>
                              </div>
