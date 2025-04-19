<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar.php';?>

<div class="container mt-3">
 <!--table-->
 <h1 class="text-center" style="font-family:'Domine', serif;">Task List</h1>
    <form  action="<?php echo URLROOT; ?>taskmanagers/edtaskdetails" method="post">
    <div class="card">
        <div class="card-body">
            <table class="table table-responsive table-hover table-sm">
                <thead>
                <tr>
                  <th scope="col">SN</th>     
                  <th scope="col">Task Name</th>
                  <th scope="col">Project Name</th>
                  <th scope="col">Client Name</th>
                  <th scope="col">Due Date</th>
                  <th scope="col">Reminder Date</th>
                  <th scope="col">Status</th>
                  <th scope="col">Assigned To</th>
                  <th  scope="col"></th>
 
                </tr>
                </thead>
                <tbody>
               <?php $count=0; foreach($data as $dataline){
                {  echo '<tr>' ; ?>
               
                  <th scope="row"><?php echo $count+1; ?></th>
                  <td><?php echo $dataline->task_name; ?></td>
                  <td><?php echo $dataline->project_name; ?></td>
                  <td><?php echo $dataline->client_name; ?></td>
                  <td>
                  <?php
                    $todays_date = date('Y-m-d');
                    if($todays_date >= $dataline->due_date && $dataline->status_id!='340'){
                    echo "<span class='badge bg-danger'>  $dataline->due_date</span>";
                    }
                    else{
                      echo $dataline->due_date;
                    }
                  ?>
                   </td>
                  <td>
                  <?php 
                    $todays_date = date('Y-m-d');
                    $dueDate = date('Y-m-d', strtotime($dataline->due_date));
                    $reminderDays = "- " . $dataline->reminder_day . " days";
                    $reminderDate = date('Y-m-d', strtotime($dueDate . $reminderDays));
                    if($todays_date >= $reminderDate && $dataline->status_id !='340'){
                      echo "<span class='badge bg-danger'> $reminderDate</span>";
                    }
                    else{
                      echo $reminderDate;
                    }
                    
                  ?></td>
                  <td><?php if($dataline->status_id=='310')
                  {
                    echo "<span class='badge bg-info'>$dataline->status_desc</span>";
                    }
                    elseif($dataline->status_id=='330' || $dataline->status_id=='350'){
                    echo "<span class='badge bg-danger'> $dataline->status_desc</span>";
                    }
                    elseif($dataline->status_id=='300' ){
                        echo "<span class='badge bg-warning'> $dataline->status_desc</span>";
                        }
                    elseif($dataline->status_id=='340'){
                        echo "<span class='badge bg-success'> $dataline->status_desc</span>";
                    } ?></td>
                  <td><?php echo $dataline->first_name; ?></td>
                  <input type="hidden" value="<?php echo $dataline->task_id;?>" name="<?php echo 'task_id'.$count;?>"> 
                  <td><button type="submit" name="<?php echo 'edittaskbtn'.$count;?>" id="<?php echo 'edittaskbtn'.$count;?>" value="Edit" class="btn btn-sm "><img src="<?php echo URLROOT.'/img/icons8-sun-glasses.png';?>" height="20px" alt=""></button>
                  </td>

                  
                  <?php echo '</tr>';}
                    $count++;} ?>
                    <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">           
                    <!-- <?php echo 'tttotalcount'.$count;?> -->

                </tbody>
            </table>
        </div><!--card-body-->
    </div><!--card-->
    </form>


<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<?php require APPROOT . '/views/inc/footer.php';?>
