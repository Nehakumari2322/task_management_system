<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar.php';?>
<?php if($moreData['message']){ ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $moreData['message'];?>

          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php } ?>
<div class="container">
<div class="card border border-primary" style="width:80%;display:block;margin:auto;border-radius:10px;">
    <form  action="<?php echo URLROOT; ?>taskmanagers/showtaskdetails" method="post">
    <input type="hidden" value="<?php echo $data->task_id;?>" name="task_id" id="task_id"> 

    <div class="container">
        <div class="card-header" style="color: White;background:#000080;border-radius:10px;">
            <div class="row">
                <div class="col-sm-11">
                    <div class="text-center fs-5" style="background:#000080;"><b>Update Task Details</b>&nbsp;&nbsp;</div>
                </div>
                <div class="col-sm-1">
                    <button id="taskbackbtn" name="taskbackbtn" type="submit" class="btn btn-sm"><img src="<?php echo URLROOT.'/img/download2.png';?>" alt="ses" height="25px"></button>
                </div>
            </div>
        </div>


        <div class="row mt-3">
            <div class="col-sm-4">
                <label for="task_name">Task Name</label>
                <input type="text"  id="task_name" name="task_name" class="form-select" value="<?php echo $data->task_name;?>" required>

            </div>
            <div class="col-sm-4">
            <label for="start_date">Due Date</label>
        <input type="date" id="due_date" name="due_date" class="form-select" value="<?php echo $data->due_date;?>" required>

            </div>

            <div class="col-sm-4">
            <label for="reminder_date">Reminder Days</label>
        <input type="number" id="reminder_day" name="reminder_day" class="form-select" min='1' max="366" value="<?php echo $data->reminder_day;?>">


            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="Status">Status</label>
                <select id="status" name="status" class="form-select" aria-label="Default select example">
                    <option value="<?php echo $data->status_id;?>"><?php echo $data->status_desc;?></option>
                    <option value="310">Started</option>
                    <option value="330">On-hold</option>
                    <option value="350">Cancel</option>
                    <option value="340">Completed</option>
                </select>
            </div>

            <div class="col-sm-4">
            <label for="Status">Assigned To</label>
            <select name="assignedto" id="assignedto" class="form-select">
                <option value="<?php echo $data->employee_id;?>"><?php echo $data->first_name;?></option> 
                <?php $count=0; foreach($additionalData as $dataline){ ?>
                
                <option value="<?php echo $dataline->employee_id;?>"><?php echo $dataline->first_name;?></option>
                <?php } ?>
            </select>
         </div>

         <div class="col-sm-4">
         <label for="assigned_by">Assigned By</label>
            <input type="text" id="assigned_by" name="assigned_by" class="form-select" value="<?php echo $data->assigned_by;?>" readonly>
                </div>
        </div>

            <label for="assigned_by">Reason</label>
            <input type="text" id="reason" name="reason" class="form-select" value="<?php echo $data->reason;?>">
        

        <div class="row" style="margin-left: 40%;width: 20%;">
            <button id="updatetaskbtn" name="updatetaskbtn" type="submit" class="btn btn-success" style="border-radius:10px;">Update</button></div>

        </div>
    </div><!--container-->
    
    </form>  
    </div>
</div><!--container-->
<?php require APPROOT . '/views/inc/footer.php';?>