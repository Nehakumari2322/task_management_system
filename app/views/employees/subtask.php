<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/employee/navbar.php';?>
<?php if($additionalData['message']){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $additionalData['message'];?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php } ?>
<div class="container">
<form action="<?php echo URLROOT ;?>employees/updatesubtask" method="post" >

<div class="row">
    <div class="col-sm-8" style=";display:block;margin:auto">
        <div class="card h-100" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px">
         
        <input type="hidden" class="form-control" id="subtask" name="subtask" aria-describedby="emailHelp" value="<?php echo $data->subtask_id;?>" >
            <div class="card-body">
                <h1 class="card-title text-center" style="color:blue;"><b>Subjob Details</b></h1>
                <hr>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Job Name</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $data->subtask_name;?>" readonly>
                    
                </div>
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="exampleInputEmail1" class="form-label">Assigned By</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $data->assigned_by;?>" readonly>
                    </div>
                    
                    <div class="col-sm-6">
                        <label for="exampleInputEmail1" class="form-label">Status</label>
                        <select id="status" name="status" class="form-select" aria-label="Default select example">
                            <option value="<?php echo $data->status_id;?>"><?php echo $data->status_desc;?></option>
                            <option value="300">New Task</option>
                            <option value="310">Task Started</option>
                            <option value="330">Task hold/cancel</option>
                            <option value="340">Task Completed</option>
                        </select>
                    </div>
                </div>
               <div style="float:right">
                <button class="btn" type="submit" name="update" id="update"><span class="badge rounded-pill bg-success">Update
                    <img src="<?php echo URLROOT.'/img/upload.png';?>" height="30px" alt=""></span>
                </button>
               
               
               </div>
            </div>
            
        </div>
    </div>
</div>
</div>
