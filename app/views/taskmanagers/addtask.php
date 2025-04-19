<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar.php';?>

<?php if($newData['message']){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $newData['message'];?>

          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php } ?>
<div class="container ">
    <div class="card">
        <div class="card-body">

    <form action="<?php echo URLROOT; ?>taskmanagers/showtasklist" method="post">  
    <input type="hidden" name="projectid" id="projectid" value="<?php echo $data['id'];?>">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="title text-center"><b>New Task</b></h3>
                </div>
                <!-- <div class="col-sm-6 d-grid justify-content-md-end">
                   <button class="btn " name="list" id="list" type="submit" ><img src="<?php echo URLROOT.'/img/nav.png';?>" height="40px" alt=""></button>
                </div> -->
            </div>
    </form>
            <form action="<?php echo URLROOT; ?>taskmanagers/inserttaskDetails" method="post">
            <input type="hidden" name="projectid" id="projectid" value="<?php echo $data['id'];?>">
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <label for="Category">Project Name</label>
                    <input type="text"  id="project_name" name="project_name" value="<?php echo $data['name'];?>" readonly>
                </div>
                <div class="col-sm-6">
                    <label for="Task Name">Task Name</label>
                    <input type="text" placeholder="Enter Task Name" id="task_name" name="task_name" required>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="start_date">Due Date</label>
                    <input type="date" placeholder="Enter Start Date" id="due_date" name="due_date"  required>
                </div>
                <div class="col-sm-6">
                    <label for="reminder_date">Reminder Day(Days before due date) :-</label>
                    <input type="number" placeholder="Enter Start Date" id="reminder_day" name="reminder_day"  >
                </div>
            </div>
           
            <div class="row">
                <!-- <div class="col-sm-4">
                Incorporation type :-
                    <select id="incorporation" name="incorporation"  aria-label="Default select example">
                    <option value="">Select  Incorporation type</option> 
                    <?php $count=0; foreach($moreData as $dataline){ ?> 
                    <option value="<?php echo $dataline->id;?>"><?php echo $dataline->name ?></option>
                    <?php $count++;} ?>
                    </select>
                </div> -->
                <div class="col-sm-6">
                    <label for="assignto">Assign to </label>
                    <select id="assignto" name="assignto"  aria-label="Default select example">
                        <option value="">Select Assign to</option>
                        <?php $count=0; foreach($additionalData as $dataline){ ?> 
                        <option value="<?php echo $dataline->employee_id?>"><?php echo $dataline->first_name; echo $dataline->last_name;?></option>
                        <?php $count++;} ?>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="assigned_by">Assigned By</label>
                    <input type="text" placeholder="Enter Assigned By" id="assigned_by" name="assigned_by" value="Executive" > 
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6"><button id="addtask" name="addtask" type="submit" class="savebtn">Save</button></div>
                <div class="col-sm-6"><button type="submit" name="cancel" id="cancel" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn" formnovalidate="formnovalidate">Back</button></div>
            </div>
        </form> <!--form--> 
    <!-- </div> -->
    </div>
    </div>
</div><!--container-->



<?php require APPROOT . '/views/inc/footer.php';?>