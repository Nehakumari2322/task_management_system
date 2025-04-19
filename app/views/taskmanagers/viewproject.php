<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar.php';?>
<?php if($result['message']){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $result['message'];?>

          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php } ?>

<div class="container">
<form action="<?php echo URLROOT; ?>taskmanagers/backtoproject" method="POST">
    <div class="card-header" style="color:white;background:#000080;">
        <div class="row">
            <div class="col-sm-11">
                <div class="text-center fs-5"><b>Project Details</b>&nbsp;&nbsp;</div>
            </div>
            <div class="col-sm-1">
                <button class=" btn btn-sm" name="back" id="back"><img src="<?php echo URLROOT.'/img/download2.png';?>" alt="ses" height="25px"></button>
            </div>
        </div>
    </div>
 
</form>
    <div class="card">
    <form action="<?php echo URLROOT; ?>taskmanagers/showprojectdetails" method="POST">
   <input type="hidden" name="projectid" id="projectid" value="<?php echo $moreData->project_id?>">
        <div class="card-body">
            <div style="float:right">
            <img src="<?php echo URLROOT.'/img/icons8-pencil-50.png';?>" style="background:#dbe6f9;padding:5px" height="30px">
            </div>
            <div class="row">
                <div class="col-sm-5">
                    <b>Project Name</b>
                    <input type="text" name="project_name" id="project_name" value="<?php echo $moreData->project_name;?>" >     
                </div>

                <div class="col-sm-4">
                    <b>Client Name</b>
                    <input type="text" name="client_name" id="client_name" value="<?php echo $moreData->client_name;?>" readonly>
                </div>
                
                <div class="col-sm-3">
                    <b>Start Date</b>
                    <input type="date"name="start_date" id="start_date" value="<?php echo $moreData->start_date;?>">
                </div>
            </div>
            
            <div class="row m-1">
                <div class="col-sm-4">
                    <b>End Date</b>
                    <input type="date"name="end_date" id="end_date" value="<?php echo $moreData->end_date;?>" >
                </div>
                <div class="col-sm-5">
                    <b>Assigned_by</b>
                    <input type="text" name="assignedby" id="assignedby" value="<?php echo $moreData->assigned_by;?>" >
                </div>
                <div class="col-sm-2">
                <p><b>Status</b></p>
                    <select id="status" name="status" class="form-select" aria-label="Default select example">
                        <option value="<?php echo $moreData->status_id ?>"><?php echo $moreData->status_desc?></option>
                        <option value="210">Started</option>
                        <option value="230">On hold</option>
                        <option value="240">Completed</option>         
                    </select>
                </div>

            </div>
            <div class="col-sm-11 mx-3">
                    <p><b>Description</b></p>
                    <textarea class="form-control" name="description" id="description" rows="3" cols="5" ><?php echo $moreData->description;?></textarea>
                </div>
            </div>
            <div class="mt-2 text-center mb-2">
                <button class="btn bg-success text-light" type="submit" name="updateproject" id="updateproject" >Update</button>
            </div>
            

        </div>
    </div>
</form>
   
  
</div>



<?php require APPROOT . '/views/inc/footer.php';?>
