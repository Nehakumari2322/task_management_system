<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/employee/navbar.php';?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');

.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #fff;
    background-color: white;
}
</style>

 <section>
    <div class="col-sm-12">
        <div class="model-btn text-center mt-3">
                   <!-- Button trigger modal -->
            <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Add Time Sheet  </button>
        </div>
                 
        <form action= "<?php echo URLROOT ;?>employees/makeattendence" method="post" >
            <div id="id01" class="w3-modal" >
                <div class="w3-modal-content">
                    <header class="w3-container w3-teal"> 
                        <span onclick="document.getElementById('id01').style.display='none'" 
                        class="w3-button w3-display-topright">&times;</span>
                        <h2 class="text-center my-2"> <?php  $todays_date = date('Y-m-d');  echo $todays_date; ?></h2>
                    </header>
                    <div class="w3-container">
                        <div class="mb-3">
                            <!-- <label for="recipient-name" class="col-form-label">Start Time:</label> -->
                            <input value="<?php  date_default_timezone_set('Asia/Kolkata'); $current_time = date("h:i:s A");  echo $current_time;?>" name="start" id="start" style="border:none;font-size:2rem;font-family: 'Press Start 2P', system-ui;" class="text-center">
                        </div>
                    </div>
                    <footer class="w3-container w3-white text-center">
                        <div class="row">
                            <div class="d-grid  col  my-2">
                                <button class="btn w3-teal"  type="submit" name="save" id="save">Make attendence</button> 
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </form>
    </div><!--col-sm-12--> 
 <form action="<?php echo URLROOT ;?>employees/edittaskdetail" method="post" >
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <div class="card h-100" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;">
                    <div class="card-body">
                      <div class="card-header" style="color:white;background: red;border-radius:10px;">
                      <h3><b><?php
                    if (is_countable($moreData['mdata'] ) && count($moreData['mdata'] ) > 0) 
                    {
                      echo count($moreData['mdata'] );
                    }
                    else{
                      echo 0;
                    }
                    ?></b>
                      <span class="badge bg-light" id="blink" style="font-size:10px; float: right;color:black">OverDue <img src="<?php echo URLROOT.'/img/danger.png';?>" alt="" height="20px"></span></h3></div>

                      <div class="table-responsive">
                      <table class="table table-responsive table-hover table-sm table-striped" style="font-size:10px;color:red">
                            <thead>
                                <tr>
                                    <th >Job ID</th>
                                    <th >Job Name</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php $count=0; foreach($moreData['mdata'] as $dataline){?>
                              <tr>
                                 
                              <td><input type="hidden" name="<?php echo 'id1'.$count?>" id="<?php echo 'id1'.$count?>"  value="<?php echo $moreData[$count]['reminderlatetaskId']?>">
                                  <?php echo $moreData[$count]['reminderlatetaskId']?></td>
                                  <td> <button class="btn" type="submit" name="<?php echo 'taskdetail'.$count;?>" id="<?php echo 'taskdetail'.$count;?>" style="font-size:10px;color:red"><?php echo $moreData[$count]['reminderlate'] ?></button></td>        
                              </tr>
                          <?php  $count++;} ?>
                          <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">
                          </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
            <div class="col-sm-4">
                <div class="card h-100 " style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;">
                <form action="<?php echo URLROOT ;?>employees/duetoday" method="post" >
                    <div class="card-body ">
                      <div class="card-header" style="color:white;background:#ED7117;border-radius:10px;">
                      <h3><b><?php
                        if (is_countable($additionalData['adata']) && $count=count($additionalData['adata']) > 0) 
                        {
                        echo count($additionalData['adata']);
                        }
                        else{
                        echo 0;
                        }
                        ?></b>
                       <span class="badge bg-warning" style="font-size:10px; float: right;background:#ED7117">Due Today's </span></h3></div>
         
                      <div class="table-responsive">
                      <table class="table table-responsive table-hover table-sm table-striped" style="font-size:10px;color:#ED7117">
                        <thead>
                            <tr>
                                <th>Job ID</th>
                                <th>Job Name</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (is_array($additionalData) || is_object($additionalData)) {?>
                                
                            
                                <?php $count=0; foreach($additionalData['adata'] as $dataline){ ?>
                                <tr>  
                                    <td >  <input type="hidden" name="<?php echo 'id2'.$count;?>" id="<?php echo 'id2'.$count;?>"  value="<?php echo $additionalData[$count]['reminderduetaskId'];?>"><?php echo  $additionalData[$count]['reminderduetaskId']?></td>
                                    <td ><button class="btn" type="submit" name="<?php echo 'todaydue'.$count;?>" id="<?php echo 'todaydue'.$count;?>" style="font-size:10px;color:#ED7117"><?php echo $additionalData[$count]['reminderdue']?></button></td>  
                                </tr>
                            <?php  $count++;} ?>
                            <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">
                        </tbody>
                        <?php } else{
                        
                        }?>
                    
                    </table>
                    </div>
                    </div>
                    </form>
                  </div>
            </div>
            
            <div class="col-sm-4">
            <div class="card h-100" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;">
            <form action= "<?php echo URLROOT ;?>employees/reminderpassed" method="post" >
                    <div class="card-body">
                      <div class="card-header" style="color:white;background:blue;border-radius:10px;">
                      <h3><b><?php
                        if (is_countable($result['rdata']) && $count=count($result['rdata']) > 0) 
                        {
                        echo count($result['rdata']);
                        }
                        else{
                        echo 0;
                        }
                        ?></b>
                       <span class="badge bg-light" style="font-size:10px; float: right;background:blue;color:black">Reminder Passed</span></h3></div>
              
                      <div class="table-responsive">
                      <table class="table table-responsive table-hover table-sm table-striped" style="font-size:10px;color:blue">
                        <thead>
                            <tr>
                                <th>Job ID</th>
                                <th>Job Name</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (is_array($result) || is_object($result)) {?>
                                <?php $count=0; foreach($result['rdata'] as $dataline){ ?>
                                <tr>  
                                    <td ><input type="hidden" name="<?php echo 'id3'.$count;?>" id="<?php echo 'id3'.$count;?>"  value="<?php echo $result[$count]['taskId'];?>"><?php echo  $result[$count]['taskId']?></td>
                                    <td ><button class="btn" type="submit" name="<?php echo 'reminder'.$count;?>" id="<?php echo 'reminder'.$count;?>" style="font-size:10px;color:blue"><?php echo $result[$count]['reminderon']?></button></td>  
                                </tr>
                            <?php  $count++;} ?>
                            <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">
                        </tbody>
                        <?php } else{
                        
                        }?>
                    </table>
                    </div>
                    </div>
                    </form>
                  </div>
            </div>
        </div>

    </div>
 <!-- </form> -->
 </section>
 
    <div class="container-fluid">
        <div class="row">
            <!-- <div class="col-sm-12"> -->
                <div class="card my-3" style="border:none;background:none">
                        <div class="row">
                        <div class="col-sm-4">
                                <div class="card h-100" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;">
                                <form action= "<?php echo URLROOT ;?>employees/inprogress" method="post" >
                                    <div class="card-body">
                                    <div class="card-header" style="color:white;background:green;border-radius:10px;">
                                    <h3><b><?php
                                        if (is_countable($newData['ndata']) && $count=count($newData['ndata']) > 0) 
                                        {
                                        echo count($newData['ndata']);
                                        }
                                        else{
                                        echo 0;
                                        }
                                        ?></b>
                                    <span class="badge bg-light" style="font-size:10px; float: right;background:green;color:black;">In Progress</span></h3></div>
                                    
                                    <div class="table-responsive">
                                    <table class="table table-responsive table-hover table-sm table-striped" style="font-size:10px;color:green">
                                            <thead>
                                                <tr>
                                                    <th>Job ID</th>
                                                    <th>Job Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $count=0; foreach($newData['ndata'] as $dataline){?>
                                            <tr>
                                                
                                            <td><input type="hidden" name="<?php echo 'id1'.$count?>" id="<?php echo 'id1'.$count?>"  value="<?php echo $newData[$count]['remindernottaskId']?>">
                                                <?php echo $newData[$count]['remindernottaskId']?></td>
                                                <td> <button class="btn" type="submit" name="<?php echo 'taskdetail'.$count;?>" id="<?php echo 'taskdetail'.$count;?>" style="font-size:10px;color:green"><?php echo $newData[$count]['remindernot'] ?></button></td>        
                                            </tr>
                                            <?php  $count++;} ?>
                                            <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card h-100" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;">
                                    <div class="card-body">
                                    <div class="card-header" style="color:white;background: red;border-radius:10px;">
                                    <h3><b><?php
                                        if (is_countable($store) && $count=count($store) > 0) 
                                        {
                                        echo count($store);
                                        }
                                        else{
                                        echo 0;
                                        }
                                    ?></b>
                                     <span class="badge bg-light" style="font-size:10px; float: right;background:white;color:black">Cancel/Hold</span></h3></div>
                                    
                                    <table class="table table-responsive table-hover table-sm table-striped" style="font-size:10px;color:red">
                                            <thead>
                                                <tr>
                                                    <th>Job ID</th>
                                                    <th>Job Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <?php $count=0; foreach($store as $dataline){ ?>
                                                    <tr> 
                                                        <td ><?php echo  $dataline->task_id?></td>
                                                        <td > <?php echo  $dataline->task_name?></td> 
                                                    </tr>
                                                <?php  $count++;} ?>
                                                <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card h-100" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;">
                                    <div class="card-body">
                                    <div class="card-header" style="color:white;background: green;border-radius:10px;">
                                    <h3><b><?php
                                        if (is_countable($content) && $count=count($content) > 0) 
                                        {
                                        echo count($content);
                                        }
                                        else{
                                        echo 0;
                                        }
                                    ?></b>
                                    <span class="badge bg-white" style="font-size:10px; float: right;color:black;">Job Completed</span></h3></div>
                                    
                                    <table class="table table-responsive table-hover table-sm  table-striped" style="font-size:10px;color:green">
                                            <thead>
                                                <tr>
                                                    <th>Job ID</th>
                                                    <th>Job Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <?php $count=0; foreach($content as $dataline){ ?>
                                                    <tr> 
                                                        <td ><?php echo  $dataline->task_id?></td>
                                                        <td > <?php echo  $dataline->task_name?></td> 
                                                    </tr>
                                                <?php  $count++;} ?>
                                                <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                    </div>
                    
                </div> <!--card-->
            <!-- </div>col-sm-12  -->
<!----------------------------------------------------------------------table 1 ends------------------------------------------------------------------------------------------->
    <div class="row">
        <div class="col-sm-6">
            <div class="card my-3" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;">
                <form action= "<?php echo URLROOT ;?>employees/edittaskassignedtome" method="post" >
                    <div class="card-body">
                    <header style="font-size:15px;"><b>Sub Job assigned to : <?php echo $_SESSION['username'];?></b>&nbsp;<button style="background:none;border:none;font-size:15px;color:grey;" type="submit" name="newprojectbtn" id="newprojectbtn"><b></b></button></header>

                        <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active btn btn-outline-primary" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true" style="color:blue;" ><b>New</b></button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link btn btn-outline-warning" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false" style="color:orange;"><b>Pending</b></button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link btn btn-outline-danger" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false" style="color:red;"><b>Hold/Cancel</b></button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link btn btn-outline-success" id="pills-completed-tab" data-bs-toggle="pill" data-bs-target="#pills-completed" type="button" role="tab" aria-controls="pills-completed" aria-selected="false" style="color:green;"><b>Completed</b></button>
                        </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <table class="table table-responsive table-hover table-striped" style="font-size:10px;">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Sub Job</th>
                              <th scope="col">Status</th>
                              <th scope="col">Assigned By</th>
                              <th scope="col">Action</th>
                               
             
                            </tr>
                            </thead>
                            <tbody>
                                <?php $count=0; foreach($double as $dataline){ ?>
                                    <tr> 
                                        <!-- <td > <?php echo  $dataline->subtask_id?></td> -->
                                        <td><?php echo $count+1?></td>
                                        <input type="hidden" name="<?php echo 'subtaskid'.$count;?>" id="<?php echo 'subtaskid'.$count;?>"  value=" <?php echo  $dataline->subtask_id?>">
                                        <td > <?php echo  $dataline->subtask_name?></td>
                                        <td > <?php echo  $dataline->status_desc?></td>
                                        <td > <?php echo  $dataline->first_name?></td> 
                                        <td > <button type="submit" name="<?php echo 'editprojectbtn'.$count;?>" id="<?php echo 'editprojectbtn'.$count;?>" class="btn"><img src="<?php echo URLROOT.'/img/edit.png';?>" height="20px" alt=""></button> </td>

                                </tr>
                                <?php  $count++;} ?>
                                <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">
                            </tbody>
                            </tbody>
                    
                          </table>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <table class="table table-responsive table-hover table-striped" style="font-size:10px;">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Sub Job</th>
                              <th scope="col">Status</th>
                              <th scope="col">Assigned By</th>
                              <th scope="col">Action</th>
                               
             
                            </tr>
                            </thead>
                            <tbody>
                                <?php $count=0; foreach($triple as $dataline){ ?>
                                    <tr> 
                                        <!-- <td > <?php echo  $dataline->subtask_id?></td> -->
                                        <td><?php echo $count+1?></td>
                                        <input type="hidden" name="<?php echo 'subtaskid'.$count;?>" id="<?php echo 'subtaskid'.$count;?>"  value=" <?php echo  $dataline->subtask_id?>">
                                        <td > <?php echo  $dataline->subtask_name?></td>
                                        <td > <?php echo  $dataline->status_desc?></td>
                                        <td > <?php echo  $dataline->first_name?></td> 
                                        <td > <button type="submit" name="<?php echo 'editprojectbtn'.$count;?>" id="<?php echo 'editprojectbtn'.$count;?>" class="btn"><img src="<?php echo URLROOT.'/img/edit.png';?>" height="20px" alt=""></button> </td>

                                </tr>
                                <?php  $count++;} ?>
                                <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">
                            </tbody>
                            </tbody>
                    
                          </table>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <table class="table table-responsive table-hover table-striped" style="font-size:10px;">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Sub Job</th>
                              <th scope="col">Status</th>
                              <th scope="col">Assigned By</th>
                              <th scope="col">Action</th>
                               
             
                            </tr>
                            </thead>
                            <tbody>
                                <?php $count=0; foreach($quard as $dataline){ ?>
                                    <tr> 
                                        <td><?php echo $count+1?></td>
                                        <!-- <td > <?php echo  $dataline->subtask_id?></td> -->
                                        <input type="hidden" name="<?php echo 'subtaskid'.$count;?>" id="<?php echo 'subtaskid'.$count;?>"  value=" <?php echo  $dataline->subtask_id?>">
                                        <td > <?php echo  $dataline->subtask_name?></td>
                                        <td > <?php echo  $dataline->status_desc?></td>
                                        <td > <?php echo  $dataline->first_name?></td> 
                                        <td > <button type="submit" name="<?php echo 'editprojectbtn'.$count;?>" id="<?php echo 'editprojectbtn'.$count;?>" class="btn"><img src="<?php echo URLROOT.'/img/edit.png';?>" height="20px" alt=""></button> </td>

                                </tr>
                                <?php  $count++;} ?>
                                <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">
                            </tbody>
                            </tbody>
                    
                          </table>

                        </div>

                        <div class="tab-pane fade" id="pills-completed" role="tabpanel" aria-labelledby="pills-completed-tab">
                        <table class="table table-responsive table-hover table-striped" style="font-size:10px;">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Sub Job</th>
                              <th scope="col">Status</th>
                              <th scope="col">Assigned By</th>
                              <th scope="col">Action</th>
                               
             
                            </tr>
                            </thead>
                            <tbody>
                               
                                <?php $count=0; foreach($resultset as $dataline){ ?>
                                    <tr> 
                                        <td><?php echo $count+1?></td>
                                        <!-- <td > <?php echo  $dataline->subtask_id?></td> -->
                                        <input type="hidden" name="<?php echo 'subtaskid'.$count;?>" id="<?php echo 'subtaskid'.$count;?>"  value=" <?php echo  $dataline->subtask_id?>">
                                        <td > <?php echo  $dataline->subtask_name?></td>
                                        <td > <?php echo  $dataline->status_desc?></td>
                                        <td > <?php echo  $dataline->first_name?></td> 
                                        <td > <button type="submit" name="<?php echo 'editprojectbtn'.$count;?>" id="<?php echo 'editprojectbtn'.$count;?>" class="btn"><img src="<?php echo URLROOT.'/img/edit.png';?>" height="20px" alt=""></button> </td>

                                </tr>
                                <?php  $count++;} ?>
                                <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">
                            </tbody>
                            </tbody>
                    
                          </table>

                        </div>
                        </div>

                       
                    </div><!--card-body-->
                   </form>
            </div><!--card-->
        </div><!--col-sm-6-->
        <div class="col-sm-6">
            <div class="card my-3" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:10px;">
                <div class="card-body">
                    <table class="table table-responsive table-hover table-striped" style="font-size:10px;">
                        <header style="font-size:15px;"><b>Sub Job Created  by : <?php echo $_SESSION['username'];?></b>&nbsp;</header>
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Subjob Name</th>
                              <th scope="col">Assigned to </th>
                              <th scope="col">Start Date</th>
                              <th scope="col">Due Date</th>
                              <th scope="col">Status</th>
             
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count=0; foreach($line as $dataline){ ?>
                                <tr> 
                                    <td><?php echo $count+1?></td>
                                    <!-- <td ><?php echo  $dataline->subtask_id?></td> -->
                                    <td > <?php echo  $dataline->subtask_name?></td>
                                    <td > <?php echo  $dataline->first_name?></td>
                                    <td > <?php echo  $dataline->created_ts?></td> 
                                    <td > <?php echo  $dataline->due_date?></td>
                                    <td > <?php echo  $dataline->status_desc?></td>     
                                </tr>
                                <?php  $count++;} ?>
                                <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">
                            </tbody>
                    
                    </table>
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-sm-6-->
    </div>
          
          
        </div><!--row-->
    </div>

<!-----------------------------------------------------model to add timesheet---------------------------------------------------------------------------------------->

<script type="text/javascript"> 
        var blink = 
            document.getElementById('blink'); 
 
        setInterval(function () { 
            blink.style.opacity = 
            (blink.style.opacity == 0 ? 1 : 0); 
        }, 500); 
 </script> 

    <?php require APPROOT . '/views/inc/footer.php';?>
