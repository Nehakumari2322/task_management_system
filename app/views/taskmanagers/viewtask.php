<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar.php';?>

<form  action="<?php echo URLROOT; ?>taskmanagers/showdashboard" method="post">
    <div class="card" style="margin:20px;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;">
        <div class="card-body">
            <table class="table table-responsive table-hover">
            <header class="py-2" style="padding-left: 20px;font-size:20px;"><b>COMPLETED</b>&nbsp;<button style="background:none;border:none;font-size:15px;color:grey;" type="submit" name="newprojectbtn" id="newprojectbtn"><b>+New Project</b></button></header>
  </form>
            <form  action="<?php echo URLROOT; ?>taskmanagers/EDProjectDetails" method="post">
                <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Project Name</th>
                  <th scope="col">Start Date</th>
                  <th scope="col">End Date</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                   
 
                </tr>
                </thead>
                <tbody>
               <?php $count=0; foreach($data as $dataline){
                {  echo '<tr>' ; ?>
               
                  <th scope="row"><?php echo $count+1; ?></th>
                  <td><?php echo $dataline->project_name; ?></td>
                  <td><?php echo $dataline->start_date; ?></td>
                  <td><?php echo $dataline->end_date; ?></td>
                  <td><?php if($dataline->status=='Started')
                  {
                    echo "<span class='badge bg-success'>$dataline->status</span>";
                }
                elseif($dataline->status=='On_hold'){
                   echo "<span class='badge bg-danger'> $dataline->status</span>";
                  }
                elseif($dataline->status=='Completed'){
                    echo "<span class='badge bg-info'> $dataline->status</span>";
                   }
                  ?></td>
                  <input type="hidden" value="<?php echo $dataline->project_id;?>" name="<?php echo 'project_id'.$count;?>">
                  <!-- <td><input type="submit" name="<?php echo 'editprojectbtn'.$count;?>" id="<?php echo 'editprojectbtn'.$count;?>" value="Edit" class="btn btn-outline-success btn-sm"></td> 
                  <td><input type="submit" name="<?php echo 'deleteprojectbtn'.$count;?>" id="<?php echo 'deleteprojectbtn'.$count;?>" value="Delete" class="btn btn-outline-danger btn-sm"></td>  -->
                  <td><input type="submit" name="<?php echo 'viewprojectbtn'.$count;?>" id="<?php echo 'viewprojectbtn'.$count;?>" value="View" class="btn btn-outline-danger btn-sm"></td>
                  
                  <?php echo '</tr>';}
                    $count++;} ?>
                    <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">           
                    <!-- <?php echo 'tttotalcount'.$count;?> -->

                </tbody>
            </table>
        </div><!--card-body-->
    </div><!--card-->
  </form>


<?php require APPROOT . '/views/inc/footer.php';?>
