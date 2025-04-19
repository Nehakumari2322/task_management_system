<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar.php';?>
<!-- <?php print_r($newData)?> -->
<section>
<div class="container-fluid">

  <form action="<?php echo URLROOT; ?>taskmanagers/showDashboard" method="post">
  <div class="row mb-4 ms-auto"> 
    <div class="col">
      <button  type="submit" class="btn btn-outline-dark" style="border-style: solid; background-color: #6895D2; float:right" id="recurringprojectbtn" name="recurringprojectbtn">
        <b> Automated Task +</b> 
      </button>
    </div>
  </div> 
    <div class="row text-center mt-3" style="margin:20px;"> 
   
    <div class="col"> 
        <!-- style="border:2px solid white;border-right:none;padding:10px;border-top-left-radius:10px;border-bottom-left-radius:10px" -->
        <div class="card " style="box-shadow: 0px 6px 28px 0px rgb(18, 55, 42); border-radius: 50%;width:85px;height:85px">
          <button type="submit" style="border:none; background:none;" id="clientbtn" name="clientbtn">
            <div class="card-body">
              <img src="<?php echo URLROOT.'/img/client.png';?>" height="25px" alt="">
              <span class="card-text text-dark text-center" style="font-size:10px;">Clients</span>
              <span class="card-title text-info"><b><?php echo $data['clientCount']?></b></span>
            </div>
            
          </button>
        </div>
      </div><!--col-->
      <div class="col">
         <!-- style="border:2px solid white;border-left:none;padding:10px;border-top-right-radius:10px;border-bottom-right-radius:10px"> -->
        <div class="card" style="box-shadow: 0px 6px 28px 0px rgb(18, 55, 42); border-radius: 50%;width:85px;height:85px">
          <button type="submit" style="border:none; background:none;" id="projectbtn" name="projectbtn">
            <div class="card-body" >
              <img src="<?php echo URLROOT.'/img/project2.png';?>" height="25px" alt="">
              <span class="card-text text-dark text-center" style="font-size:10px;">Projects</span>
              <span class="card-title"><b><?php echo $data['projectCount']?></b></span>
            </div>
          </button>
        </div>
      </div>
      
    </div><!--row-->
  </form>
  </section>

  <hr class="my-5">

<section class="m-3">

<div class="container-fluid">
<form action="<?php echo URLROOT ;?>taskmanagers/edittaskdetail" method="post" >

      <div class="row">
          <div class="col-sm-3">
              <div class="card h-100" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;">
                  <div class="card-body">
                    <h1 class="card-title" style="color:red;">
                    <?php
                    if (is_countable($moreData['mdata'] ) && count($moreData['mdata'] ) > 0) 
                    {
                      echo count($moreData['mdata'] );
                    }
                    else{
                      echo 0;
                    }
                    ?>
                     <span class="badge bg-danger" id="blink" style="font-size:10px; float: right;">OverDue <img src="<?php echo URLROOT.'/img/danger.png';?>" alt="" height="20px"></span></h1>
                    
                    <hr>
                    <div class="table-responsive">
                    <table class="table table-responsive table-hover table-sm" style="font-size:10px;color:red">
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
          <div class="col-sm-3">
          <div class="card h-100 " style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;">
          <form action="<?php echo URLROOT ;?>taskmanagers/duetoday" method="post" >
                  <div class="card-body ">
                    <h1 class="card-title" style="color:#ED7117">
                    <?php
                    if (is_countable($additionalData['adata']) && $count=count($additionalData['adata']) > 0) 
                    {
                      echo count($additionalData['adata']);
                    }
                    else{
                      echo 0;
                    }
                    ?>
                     <span class="badge" style="font-size:10px; float: right;background:#ED7117">Due Today's </span></h1>
       
                    <hr>
                    <div class="table-responsive">
                    <table class="table table-responsive table-hover table-sm " style="font-size:10px;color:#ED7117">
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
          
          <div class="col-sm-3">
          <div class="card h-100" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;">
          <form action= "<?php echo URLROOT ;?>taskmanagers/reminderpassed" method="post" >
                  <div class="card-body">
                    <h1 class="card-title" style="color:blue">
                    <?php
                    if (is_countable($result['rdata']) && $count=count($result['rdata']) > 0) 
                    {
                      echo count($result['rdata']);
                    }
                    else{
                      echo 0;
                    }
                    ?>
                     <span class="badge" style="font-size:10px; float: right;background:blue">Reminder Passed</span></h1>
            
                    <hr>
                    <div class="table-responsive">
                    <table class="table table-responsive table-hover table-sm" style="font-size:10px;color:blue">
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
         
          <div class="col-sm-3">
              <div class="card h-100" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;">
              <form action= "<?php echo URLROOT ;?>taskmanagers/inprogress" method="post" >
                  <div class="card-body">
                    <h1 class="card-title" style="color:green">
                    <?php
                    if (is_countable($newData['ndata']) && $count=count($newData['ndata']) > 0) 
                    {
                      echo count($newData['ndata']);
                    }
                    else{
                      echo 0;
                    }
                    ?>
                     <span class="badge" style="font-size:10px; float: right;background:green">In Progress</span></h1>
                    
                    <hr>
                    <div class="table-responsive">
                    <table class="table table-responsive table-hover table-sm" style="font-size:10px;color:green">
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

      </div>

  </div>
</section>

<hr class="my-5">
<form action="<?php echo URLROOT; ?>taskmanagers/showDashboard" method="post">
<div class="row">
  <div class="col"></div>
     <div class="col">
         <!-- style="border-top:2px solid white;border-bottom:2px solid white;padding:10px"> -->
        <div class="card" style="box-shadow: 0px 6px 28px 0px rgb(18, 55, 42); border-radius: 50%;width:130px;height:130px">
        <button type="submit" style="border:none; background:none;" id="taskinprogressbtn" name="taskinprogressbtn">
          <div class="card-body">
              <img src="<?php echo URLROOT.'/img/task-new.png';?>" height="35px" alt="">
              <p class="card-text" style="color:#AC0E9A;">In Progress</p>
              <h3 class="card-title" style="color:#AC0E9A"><?php echo $data['taskprogressCount']?></h3>
            </div>
        </button>
        </div>
      </div>
  <div class="col">
        <!-- style="border:2px solid white;border-right:none;padding:10px;border-top-left-radius:10px;border-bottom-left-radius:10px"> -->
        <div class="card" style="box-shadow: 0px 6px 28px 0px rgb(18, 55, 42); border-radius: 50%;width:130px;height:130px">
        <button type="submit" style="border:none; background:none;" id="taskbtn" name="taskbtn">
          <div class="card-body">
          <img src="<?php echo URLROOT.'/img/task1.png';?>" height="35px" alt="">
            <p class="card-text " style="color:orange">Tasks</p>
            <h3 class="card-title" style="color:orange"><?php echo $data['taskCount']?></h3>
          </div>
        </button>
        </div>
      </div>

      <div class="col">
         <!-- style="border-top:2px solid white;border-bottom:2px solid white;padding:10px"> -->
        <div class="card" style="box-shadow: 0px 6px 28px 0px rgb(18, 55, 42); border-radius: 50%;width:130px;height:130px">
          <button type="submit" style="border:none; background:none;" id="taskstartbtn" name="taskstartbtn">
            <div class="card-body">
              <img src="<?php echo URLROOT.'/img/task-started.png';?>" height="35px" alt="">
              <p class="card-text" style="color:blue;">New</p>
              <h3 class="card-title" style="color:blue;"><?php echo $data['taskStartedCount']?></h3>
            </div> 
          </button>
        </div>
      </div>

     

      <div class="col">
         <!-- style="border-top:2px solid white;border-bottom:2px solid white;padding:10px"> -->
      <div class="card" style="box-shadow: 0px 6px 28px 0px rgb(18, 55, 42); border-radius: 50%;width:130px;height:130px">
        <button type="submit" style="border:none; background:none;" id="taskholdbtn" name="taskholdbtn">
          <div class="card-body">
              <img src="<?php echo URLROOT.'/img/task-hold.png';?>" height="35px" alt="">
              <p class="card-text" style="color:red;font-size:15px;">Hold/Cancel</p>
              <h3 class="card-title" style="color:red;"><?php echo $data['taskholdCount']?></h3>
            </div>
        </button>
      </div>
      </div>

      <div class="col">
         <!-- style="border:2px solid white;border-left:none;padding:10px;border-top-right-radius:10px;border-bottom-right-radius:10px"> -->
      <div class="card" style="box-shadow: 0px 6px 28px 0px rgb(18, 55, 42); border-radius: 50%;width:130px;height:130px">
        <button type="submit" style="border:none; background:none;" id="taskcompletebtn" name="taskcompletebtn">
          <div class="card-body">
            <img src="<?php echo URLROOT.'/img/task-complete.png';?>" height="35px" alt="">
            <p class="card-text" style="color:green;">Completed</p>
            <h3 class="card-title" style="color:green;"><?php echo $data['taskcompletedCount']?></h3>
          </div>
        </button>
      </div>
    </div>
    <div class="col"></div>

</div><!--row-->
</form>

<!-- <?php print_r($newData)?> -->
<div class="container mt-2">
 <!--table-->
 <h1 class="text-center" style="font-family:'Domine', serif;"><?php echo $data['taskname']?> Task List</h1>
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
                  <th scope="col"></th>
                  <th scope="col"></th> 
 
                </tr>
                </thead>
                <tbody>
               <?php $count=0; foreach($store as $dataline){
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
                  <td><button type="submit" name="<?php echo 'edittaskbtn'.$count;?>" id="<?php echo 'edittaskbtn'.$count;?>" value="Edit" class="btn btn-sm "><img src="<?php echo URLROOT.'/img/icons8-sun-glasses.png';?>" height="20px" alt=""></button></td> 
                  <!-- <td><button type="submit" name="<?php echo 'deletetaskbtn'.$count;?>" id="<?php echo 'deletetaskbtn'.$count;?>" value="Delete" class="btn btn-sm"><img src="<?php echo URLROOT.'/img/delete.png';?>" height="20px" alt=""></button></td>  -->

                  
                  <?php echo '</tr>';}
                    $count++;} ?>
                    <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">           
                    <!-- <?php echo 'tttotalcount'.$count;?> -->

                </tbody>
            </table>
        </div><!--card-body-->
    </div><!--card-->
    </form>


</div><!--container-->
</body>
<script type="text/javascript"> 
        var blink = 
            document.getElementById('blink'); 
 
        setInterval(function () { 
            blink.style.opacity = 
            (blink.style.opacity == 0 ? 1 : 0); 
        }, 500); 
 </script> 

<?php require APPROOT . '/views/inc/footer.php';?>




