<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar.php';?>

<div class="container mt-5">
 
    <form action="<?php echo URLROOT; ?>taskmanagers/showprojectdetails" method="post">
    <input type="hidden" value="<?php echo $data->project_id;?>" name="project_id" id="project_id"> 

    <div class="container ">
        <h3 class="title my-3"><b>Update Project Details</b></h3>
        <hr>
        <label for="project_name">Project Name</label>
        <input type="text"  id="project_name" name="project_name" value="<?php echo $data->project_name;?>" required>

        <label for="start_date">Start Date</label>
        <input type="date" id="start_date" name="start_date" value="<?php echo $data->start_date;?>" required>

        <label for="end_date">End Date</label>
        <input type="date" id="end_date" name="end_date" value="<?php echo $data->end_date;?>" required>

        <div class="row">
            <div class="col">
                <label for="Status">Status</label>
                <select id="status" name="status" class="form-select" aria-label="Default select example">
                    <option value="<?php echo $data->status_id?>"><?php echo $data->status_desc?></option>
                    <option value="210">Started</option>
                    <option value="230">On hold</option>
                    <option value="240">Completed</option>         
                </select>
            </div>
        </div>

        

        <div class="row">
            <div class="col-sm-6"><button id="updateprojectbtn" name="updateprojectbtn" type="submit" class="savebtn">Update</button></div>
            <div class="col-sm-6"><button id="projectbackbtn" name="projectbackbtn" type="submit" class="cancelbtn">Back</button></div>
        </div>
    </div><!--container-->
    </form>  

  
</div><!--container-->
<?php require APPROOT . '/views/inc/footer.php';?>

