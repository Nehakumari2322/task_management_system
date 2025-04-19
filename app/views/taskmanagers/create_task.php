<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar.php';?>
<?php if($result['message']){ ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $result['message'];?>

          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php } ?>
<div class="row " style="float:right">
    <button class="user" onclick="document.getElementById('id01').style.display='block'" style="float:right;width:auto;"><img src="<?php echo URLROOT.'/img/dd.png';?>" height="20px" alt=""> Master Task List</button>
  </div>
<form action="<?php echo URLROOT; ?>taskmanagers/recurringproject" method="post">
<div class="container">

  <div class="row mt-5 pt-4" >
    <div class="col">
     <div class="card px-4" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;font-size:13px;">
        <h1 class="text-center" style="font-family: 'Philosopher', sans-serif;"><b>Create Automated Task  </b></u></h1>
          
            <div class="row">
              <div class="col-md-5">
                <label for="Status">Task Name :-</label>
                <select id="taskname" name="taskname"  aria-label="Default select example" required>
                  <option value="" >Select task name </option>
                  <?php $count=0; foreach($data as $dataline){ ?> 
                  <option value="<?php echo $dataline->name;?>"><?php echo $dataline->name;?></option>
                  <?php $count++;} ?>
                   
                </select>
               
              </div>
              <div class="col-md-3">
                Due Date:-
                <input type="Date" name="due_date" id="due_date"  Placeholder="Enter Due Date" required>
              </div>
              <div class="col-md-4" >
              Reminder Day(Days before due date):-
              <input type="number" name="reminder_day" id="reminder_day" min='1' max="365" Placeholder="Enter Days" required>
            </div>
            </div>
          
          <div class="row">
            <div class="col-md-4">
              Applied to :-
                <input type="text" name="applied_to" id="applied_to" Placeholder="All Client" value="All Client" readonly >
            </div>
            <div class="col-md-3">
              Incorporation type :-
                <select id="incorporation" name="incorporation"  aria-label="Default select example" required> 
                  <?php $count=0; foreach($moreData as $dataline){ ?> 
                  <option value="<?php echo $dataline->id;?>"><?php echo $dataline->name ?></option>
                  <?php $count++;} ?>
                </select>
            </div>
           
         
          
         
            <div class="col-sm-5">
                <label for="assignto">Assign to </label>
                <select id="assignto" name="assignto"  aria-label="Default select example" required>
                  <?php $count=0; foreach($additionalData as $dataline){ ?> 
                  <option value="<?php echo $dataline->employee_id?>"><?php echo $dataline->first_name; echo $dataline->last_name;?></option>
                  <?php $count++;} ?>
                </select>
            </div>
           
          </div>

          
            <div class="col-md-12 my-3">
              <button type="submit"  id="submitrecurringproject" name="submitrecurringproject" class="form-control btn btn-success btn-sm" style="width:20%;margin-left:40%">Submit</button>
            </div> 
     
      </form>
    </div><!--col-sm-12-->
    
  </div><!--row-->
</div>
<!-- another row -->
</div>
<form action="<?php echo URLROOT; ?>taskmanagers/searchbyemployee"  method="post">
<div class="row " style="float:right">
    <button class="user" name="search" id="search"  style="float:right;width:auto;">Search BY Employee</button>
   
</div>
</form>
  <div class="container">
<div class="row mt-2">


  <h2 class="text-center mt-2" style="font-family: 'Philosopher', sans-serif;">Automated Task List</h2>
 
        <div class=" mt-3" >
            <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px">
              <div class="table-responsive">
                <table class="pt-1 table table-sm table-hover table-striped" style="font-size:10px;">
                    <thead>
                        <tr>
                        <th scope="col">Sn</th>
                        <th scope="col">Client Name</th>
                        <th scope="col">Project Name</th>
                        <th scope="col">Task Name</th>
                        <th scope="col">Due Date</th>
                        <th scope="col">Reminder Date</th>
                        <th scope="col">Assign To</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count=0; foreach($newData as $dataline){ ?>
                            <tr>
                                <td ><?php echo  $count+1?></td> 
                                <td ><?php echo $dataline->client_name;?></td>      
                                <td ><?php echo $dataline->project_name;?></td>
                                <td ><?php echo $dataline->task_name;?></td>
                                <td > <?php echo $dataline->due_date;?></td>
                                <td >
                                <?php 
                                     $todays_date = date('Y-m-d');
                                     $dueDate = date('Y-m-d', strtotime($dataline->due_date));
                                     $reminderDays = "- " . $dataline->reminder_day . " days";
                                     $reminderDate = date('Y-m-d', strtotime($dueDate . $reminderDays));
                                     echo $reminderDate;
                                ?>
                                </td>
                                <td ><?php echo $dataline->first_name;?> </td>
                            </tr>
                        <?php  $count++;} ?>
                        <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">

                    </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>

</div><!--container-->



<!-- model -->

<div class="container mt-5">
  <!--form-->   
    <div id="id01" class="modal">
       
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>
           
        <form class="modal-content animate" action="<?php echo URLROOT; ?>taskmanagers/createmasterlist" method="post">
        <div class="container ">
            <h3 class="title my-3"><b>Add Master Task List</b></h3>
            <hr>
            <div class="row ">
              <div class="col px-5">
                Task Name:-
                <input type="text" name="task_name" id="task_name"  Placeholder="Enter Your Task Name">
              </div>
            </div>
            <div class="row">
                <div class="col-sm-6"><button class="savebtn" id="submitmastertask" name="submitmastertask" type="submit">Save</button></div>
                <div class="col-sm-6"><button type="submit" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button></div>
            </div>
        </div><!--container-->
        </form> <!--form--> 
    </div><!--model-->

  

 
  </div>

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
<?php require APPROOT . '/views/inc/footer.php';?>

