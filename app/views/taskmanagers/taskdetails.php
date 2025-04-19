<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar.php';?>
<?php if($moreData['message']){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $moreData['message'];?>

          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php } ?>
<div class="container">
<form action="<?php echo URLROOT ;?>taskmanagers/updatetask" method="post" >

<div class="row">
    <div class="col-sm-8" style=";display:block;margin:auto">
        <div class="card h-100" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px">
         
        <input type="hidden" class="form-control" id="taskId" name="taskId" aria-describedby="emailHelp" value="<?php echo $data->task_id;?>" >
            <div class="card-body">
            <button  onclick="document.getElementById('id01').style.display='block'" type="button" class="btn btn-sm" style="float:right"><span class="badge rounded-pill bg-dark ">Sub Task
            <img src="<?php echo URLROOT.'/img/sub.png';?>" height="25px" alt=""></span>
            </button>
                <h2 class="card-title text-center" style="color:blue;"><b>Job Details</b></h2>
                <hr>
                <div class="mb-3 row">
                    <div class="col-sm-4">
                        <label for="exampleInputEmail1" class="form-label"> Job Name</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $data->task_name;?>" readonly>
                    </div>
                   <div class="col-sm-4">
                        <label for="exampleInputEmail1" class="form-label">Project Name</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $data->project_name;?>" readonly>
                   </div>
                   <div class="col-sm-4">
                        <label for="exampleInputEmail1" class="form-label">Client Name</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $data->client_name;?>" readonly>
                   </div>
                    
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <?php 
                        $datetime = new DateTime($data->created_ts);

                        $date = $datetime->format('Y-m-d');
                        ?>
                        <label for="exampleInputEmail1" class="form-label">Assigned Date</label>
                        <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $date;?>" readonly>
                    </div>
                    <div class="col-sm-4">
                        <label for="exampleInputEmail1" class="form-label">Due Date</label>
                        <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $data->due_date;?>" readonly>
                    </div>
                    
                    <div class="col-sm-4">
                        <label for="exampleInputEmail1" class="form-label">Status</label>
                        <select id="status" name="status" class="form-select" aria-label="Default select example">
                            <option value="<?php echo $data->status_id;?>"><?php echo $data->status_desc;?></option>
                            <option value="310">Task Started</option>
                            <option value="330">Task hold/cancel</option>
                            <option value="340">Task Completed</option>
                        </select>
                    </div>
                </div>
               <div style="float:right">
                <button class="btn" type="submit" name="update" id="update"><span class="badge rounded-pill bg-success">Update
                    <img src="<?php echo URLROOT.'/img/upload.png';?>" height="25px" alt=""></span>
                </button>
                <button class="btn" type="submit" name="hold" id="hold"><span class="badge rounded-pill bg-warning px-2"><b> Hold </b>
                    <img src="<?php echo URLROOT.'/img/hold1.png';?>" height="25px" alt=""></span>
                </button>
                <button class="btn" type="submit" name="cancel" id="cancel"><span class="badge rounded-pill bg-danger">Cancel 
                    <img src="<?php echo URLROOT.'/img/cancel.png';?>" height="25px" alt=""></span>
                </button>
               
               </div>
            </div>
            
        </div>
    </div>
</div>
</div>

</form>
<!-- adding model of sub task -->
<div id="id01" class="modal">
        <form class="modal-content animate" action="<?php echo URLROOT; ?>taskmanagers/insertsubtaskdetails" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>
            <input type="hidden" class="form-control" id="taskId" name="taskId" aria-describedby="emailHelp" value="<?php echo $data->task_id;?>" > 
        <div class="container ">
            <h3 class="title my-3"><b>Sub Task</b></h3>
            <hr>
            <div class="row">
                <div class="col">
                    <label for="Task Name">Task Name</label>
                    <input type="text" placeholder="Enter Task Name" id="task_name" name="task_name" required>
                </div>
                <div class="col">
                    <label for="end_date">Due Date</label>
                    <input type="date" placeholder="Enter End Date" id="due_date" name="due_date" required>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="Status">Status</label>
                    <input type="hidden" name="status" id="status" value="<?php echo $data->status_id;?>">
                    <input type="text"  value="<?php echo $data->status_desc;?>" readonly>
                </div>
                <div class="col">
                    <label for="assigned_by">Assigned By</label>
                    <input type="text" placeholder="Enter Assigned By" id="assigned_by" name="assigned_by" value="<?php echo $_SESSION['username'];?>" readonly>
                </div>
                <div class="col">
                <label for="assigned_to">Assigned To</label>
                <select id="assignto" name="assignto"  aria-label="Default select example">
                <option value="select">Select Assign to</option>
                  <?php $count=0; foreach($additionalData as $dataline){ ?> 
                  <option value="<?php echo $dataline->employee_id?>"><?php echo $dataline->first_name;?>&nbsp;<?php echo $dataline->last_name;?></option>
                  <?php $count++;} ?>
                </select>
                </div>
            </div>
 
            <div class="row">
                <div class="col-sm-6"><button id="addtask" name="addtask" type="submit" class="savebtn">Save</button></div>
                <div class="col-sm-6"><button type="submit" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button></div>
            </div>
        </div><!--container-->
        </form> <!--form--> 
    </div><!--model-->

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

<!-- model for hold -->
<?php require APPROOT . '/views/inc/footer.php';?>
