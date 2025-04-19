<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar.php';?>

<div class="container-fluid">
    <div class="card-body">
        <div class="card">
            <div class="card-header font-weight-bold h5 text-center bg-info">
                    Search Task by Empolyee Name
            </div>
            <div class="card-body">
            <form class="row gy-2 gx-3 align-items-center" action="<?php echo URLROOT; ?>taskmanagers/searchempolyee" method="post">
                <div class="row"><!--row1--->
                    <label for="Invoice" class="text-center">Employee Id</label>
                    <div class="col text-center">
                        <input type="number"   name="emp_id" id="emp_id" style="width:40%;height:30px">&nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary btn-sm rounded text-center" name="search" id="search"><img src="https://uxwing.com/wp-content/themes/uxwing/download/user-interface/search-icon.png" alt="se" height="20px" ></button>
                    </div>
                </div><!--row1--->
            </form>
            </div>
        </div>
    </div>

    <div class="card-body">
    <form action="<?php echo URLROOT; ?>taskmanagers/reassignttouser" method="post">
        <div class="card mt-3">
            <div class="card-header font-weight-bold h5 text-center">
                Automated Task List 
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-borderless">
                        <thead>
                            <tr class="bg-info text-white text-center">
                                <th scope="col"></th>
                                <th scope="col">Project Name</th>
                                <th scope="col">Client Name</th>
                                <th scope="col">Task name</th>
                                <th scope="col">Assigned To</th>
                                <th scope="col">Remainder Date</th>
                                <th scope="col">Client Type</th>
                                <th scope="col">Status</th>
                              
                            </tr>
                        </thead>
                        <?php $count = 0; foreach($data as $dataline):?>
                        <tbody>
                            <tr class="text-center">
                            <td><input type='checkbox' name='taskid[]' value=<?php echo $dataline->task_id;?>></td>
                                <td><?php echo $dataline->project_name;?></td>
                                <td><?php echo $dataline->client_name;?></td>
                                <td><?php echo $dataline->task_name;?></td>
                                <td><?php echo $dataline->first_name;?>&nbsp; <?php echo $dataline->last_name;?></td>
                                <td><?php echo $dataline->reminder_day;?></td>
                                <td><?php echo $dataline->name;?></td>
                                <td><?php echo $dataline->status_desc;?></td> 
                               
                            </tr>

                        </tbody>
                        <?php $count++; endforeach; ?>
                        
                        <input type="hidden" name="totalcount1" value="<?php echo $count;?>">
                    </table>
                    </div>
                    <hr>
                    <div class="row text-center">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-2">
                            <p style="font-size:20px">Reassign to :</p>
                        </div>
                        <div class="col-sm-3">
                            <select id="reassignto" name="reassignto" aria-label="Default select example" required>
                            <?php $count=0; foreach($additionalData as $dataline){ ?> 
                            <option value="<?php echo $dataline->employee_id?>"><?php echo $dataline->first_name; echo $dataline->last_name;?></option>
                            <?php $count++;} ?>
                            </select>
                        </div>
                        <div class="col-sm-3 p-2">
                            <button class="btn bg-warning" name="update" id="update" type="submit" style="width:80%">Reassigned</button>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    
                
            </div>
        </div>
    </form>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
