<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar.php';?>
<div class="container">
<div class="card my-5">
    <form action="<?php echo URLROOT; ?>taskmanagers/backtoproject" method="POST">
        <div class="card-header text-center" style="background:#000080;color:white;">
            <div class="row">
                <div class="col-sm-11 fs-5">
                    <b>Task List<button style="background:none;border:none;font-size:18px;color:grey;" type="submit" name="newtaskbtn" id="newtaskbtn"><b></b></button></b>
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-sm" name="back" id="back" ><img src="<?php echo URLROOT.'/img/download2.png';?>" alt="ses" height="25px"></button>
                </div>
            </div>
        </div>
    </form>

        <div class="row">    
            <div class="col-sm-12">
                <div class="card-body"> 
                    <form  action="<?php echo URLROOT; ?>taskmanagers/edtaskdetails" method="post" id="deleteForm">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-responsive table-hover table-sm table-striped" style="font-size:10px;">
                                <thead>
                                <tr>
                                <th scope="col">SN</th>
                                <!-- <th scope="col">Project Name</th> -->
                                <th scope="col">Task Name</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Reminder Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Assigned To</th>
                                <th scope="col">Assigned By</th>
                                <th scope="col"></th>
                                
                
                                </tr>
                                </thead>
                                <tbody>
                            <?php $count=0; foreach($data as $dataline){
                                {  echo '<tr>' ; ?>
                            
                                <th scope="row"><?php echo $count+1; ?></th>
                                <!-- <td><?php echo $dataline->project_name; ?></td> -->
                                <td><?php echo $dataline->task_name; ?></td>
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
                                        if($todays_date >= $reminderDate && $dataline->status_id!='340'){
                                        echo "<span class='badge bg-danger'> $reminderDate</span>";
                                        }
                                        else{
                                        echo $reminderDate;
                                        }
                                        
                                    ?>
                                </td>
                                <td><?php if($dataline->status_id=='310')
                                {
                                    echo "<span class='badge bg-info'>$dataline->status_desc</span>";
                                    }
                                    else if($dataline->status_id=='330' || $dataline->status_id=='350'){
                                    echo "<span class='badge bg-danger'> $dataline->status_desc</span>";
                                    }
                                    else if($dataline->status_id=='300'){
                                        echo "<span class='badge bg-warning'> $dataline->status_desc</span>";
                                        }
                                    else if($dataline->status_id=='340'){
                                        echo "<span class='badge bg-success'> $dataline->status_desc</span>";
                                    } ?></td>
                                
                                <td><?php echo $dataline->first_name; ?></td>
                                <td>Executive</td>
                            
                                <input type="hidden" value="<?php echo $dataline->task_id;?>" name="<?php echo 'task_id'.$count;?>">
                                <td>
                                <button type="submit"name="<?php echo 'edittaskbtn'.$count;?>" id="<?php echo 'edittaskbtn'.$count;?>" value="Edit"  class="btn btn-sm"><img src="<?php echo URLROOT.'/img/icons8-pencil-50.png';?>" alt="see" height="20px"></button>
                                <button type="submit" onclick="return confirmDelete(this)" name="<?php echo 'deletetaskbtn'.$count;?>" id="<?php echo 'deletetaskbtn'.$count;?>" class="btn btn-sm"><img src="<?php echo URLROOT.'/img/delete.png';?>" alt="see" height="20px"></button>
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
                </div>  
        </div>    
    </div>

    <div class="card mx-2" style="border:none">
        <div class="row" >
            <div class="col-sm-12" >
                <div class="card-body" >
                    <div class="card-header text-center" style="background:#000080;color:white;">
                        <b>Subtask List <button style="background:none;border:none;font-size:15px;color:grey;" type="submit" name="newtaskbtn" id="newtaskbtn"><b></b></button></b>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <table class="table table-responsive table-hover table-sm table-striped" style="font-size:10px;">
                                <thead>
                                <tr>
                                <th scope="col">SN</th>
                                <th scope="col">Subtask Name</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Assigned To</th>    
                                </tr>
                                </thead>
                                <tbody>
                            <?php $count=0; foreach($newData as $dataline){
                                {  echo '<tr>' ; ?>
                            
                                <th scope="row"><?php echo $count+1; ?></th>
                                <td><?php echo $dataline->subtask_name; ?></td>
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
                                <td><?php if($dataline->status_id=='310')
                                {
                                    echo "<span class='badge bg-info'>$dataline->status_desc</span>";
                                    }
                                    else if($dataline->status_id=='330' || $dataline->status_id=='350'){
                                    echo "<span class='badge bg-danger'> $dataline->status_desc</span>";
                                    }
                                    else if($dataline->status_id=='300'){
                                        echo "<span class='badge bg-warning'> $dataline->status_desc</span>";
                                        }
                                    else if($dataline->status_id=='340'){
                                        echo "<span class='badge bg-success'> $dataline->status_desc</span>";
                                    } ?></td>
                                
                                <td><?php echo $dataline->first_name; ?></td>
                            
                                <input type="hidden" value="<?php echo $dataline->task_id;?>" name="<?php echo 'task_id'.$count;?>">
                                <!-- <td>
                                <button type="submit"name="<?php echo 'edittaskbtn'.$count;?>" id="<?php echo 'edittaskbtn'.$count;?>" value="Edit"  class="btn btn-sm"><img src="<?php echo URLROOT.'/img/icons8-pencil-50.png';?>" alt="see" height="20px"></button>
                                <button type="submit" name="<?php echo 'deletetaskbtn'.$count;?>" id="<?php echo 'deletetaskbtn'.$count;?>" class="btn btn-sm"><img src="<?php echo URLROOT.'/img/delete.png';?>" alt="see" height="20px"></button>
                                </td> -->

                                <?php echo '</tr>';}
                                    $count++;} ?>
                                    <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">           
                                    <!-- <?php echo 'tttotalcount'.$count;?> -->

                                </tbody>
                            </table>
                        </div><!--card-body-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    
<script>
function confirmDelete(form) {
    if (confirm("Are you sure you want to delete this item?")) {
        // If the user clicks "OK", submit the form
        // document.getElementById('deleteForm').submit();
        return true;
    } else {
        // If the user clicks "Cancel", do nothing
        return false;
    }
}
</script>