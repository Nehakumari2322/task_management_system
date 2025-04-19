<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar.php';?>
<!-- <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button> -->
<?php if($moreData['message']){ ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $moreData['message'];?>

          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php } ?>
<section>

<div class="col">
  <button class="user" onclick="document.getElementById('id01').style.display='block'" style="float:right;width:auto;"><img src="<?php echo URLROOT.'/img/dd.png';?>" height="20px" alt="">  Project</button>
</div>
<form action="<?php echo URLROOT; ?>taskmanagers/showDashboard" method="post">
 
    <div class="row" style="margin:15px;">
   
    <h3 class="text-center" style="font-family:'Domine', serif;">Projects Details</h3>
    
    <div class="col-sm-2"></div>
      <div class="col-sm-2">
        <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;">
          <button type="submit" style="border:none; background:none;" id="projectbtn" name="projectbtn">
            <div class="card-body" style="text-align:left;">
              <h3 class="card-title"><?php echo $moreData['all']?></h3>
              <p class="card-text">ALL</p>
            </div>
          </button>
        </div>
      </div>
      <div class="col-sm-2" style="display:block;margin:auto">
        <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;">
          <button type="submit" style="border:none; background:none;" id="projectstartedbtn" name="projectstartedbtn">
            <div class="card-body" style="text-align:left;">
              <h3 class="card-title" style="color:#0492c2;"><?php echo $moreData['started']?></h3>
              <p class="card-text" style="color:#0492c2;">Started</p>
            </div>
          </button>
        </div>
      </div><!--col-->
      <div class="col-sm-2" style="display:block;margin:auto">
        <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;">
          <button type="submit" style="border:none; background:none;" id="projectonholdbtn" name="projectonholdbtn">
            <div class="card-body" style="text-align:left;">
              <h3 class="card-title" style="color:red;"><?php echo $moreData['hold']?></h3>
              <p class="card-text" style="color:red;">On Hold</p>
            </div>
          </button>
        </div>
      </div><!--col-->
      <div class="col-sm-2" style="display:block;margin:auto">
        <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;">
          <button type="submit" style="border:none; background:none;" id="projectcompletedbtn" name="projectcompletedbtn">
            <div class="card-body" style="text-align:left;">
              <h3 class="card-title" style="color:green;"><?php echo $moreData['completed']?></h3>
              <p class="card-text" style="color:green;">Completed</p>
            </div>
          </button>
        </div>
      </div><!--col-->
      <div class="col-sm-2"></div>
      </div><!--row-->
      </form>
  </section>


<div class="container">
    <div class="row">
            <h4 class="text-center" style="font-family:'Domine', serif;">
            <?php echo $moreData['name']?>
        </h4>
<!--table-->
<form  action="<?php echo URLROOT; ?>taskmanagers/EDProjectDetails" method="post" id="deleteForm">
    <div class="card">
        <div class="card-body">
            <table class="table table-responsive table-hover table-sm table-striped" style="font-size:10px;">
                <thead>
                <tr>
                  <th scope="col">SN</th>
                  <th scope="col">Project Name</th>
                  <th scope="col">Client Name</th> 
                  <th scope="col">Start Date</th>
                  <th scope="col">End Date</th>
                  <th scope="col">Status</th>
                  <th scope="col"></th>
                   
 
                </tr>
                </thead>
                <tbody>
               <?php $count=0; foreach($data as $dataline){
                {  echo '<tr>' ; ?>
               
                  <th scope="row"><?php echo $count+1; ?></th> 
                  <td><?php echo $dataline->project_name; ?></td>
                  <td><?php echo $dataline->client_name; ?></td>
                  <td><?php echo $dataline->start_date; ?></td>
                  <td><?php echo $dataline->end_date; ?></td>
                  <td><?php if($dataline->status_id =='200')
                  {
                    echo "<span class='badge bg-warning'>$dataline->status_desc</span>";
                }
                elseif($dataline->status_id=='210'){
                  echo "<span class='badge bg-info'> $dataline->status_desc</span>";
                 }
                elseif($dataline->status_id=='230'){
                   echo "<span class='badge bg-danger'> $dataline->status_desc</span>";
                  }
                elseif($dataline->status_id=='240'){
                    echo "<span class='badge bg-success'> $dataline->status_desc</span>";
                   }
                  ?></td>
                  <input type="hidden" value="<?php echo $dataline->project_id;?>" name="<?php echo 'project_id'.$count;?>">
                  <input type="hidden" value="<?php echo $dataline->project_name;?>" name="<?php echo 'project_name'.$count;?>">
                  <input type="hidden" value="<?php echo $dataline->client_id;?>" name="<?php echo 'client_id'.$count;?>">
                  <input type="hidden" value="<?php echo $dataline->client_name;?>" name="<?php echo 'client_name'.$count;?>">
                  <td>
                  <button type="submit" name="<?php echo 'viewprojectbtn'.$count;?>" id="<?php echo 'viewprojectbtn'.$count;?>" class="btn btn-sm"><img src="<?php echo URLROOT.'/img/icons8-sun-glasses.png';?>" alt="ses" height="20px"></button>
                  <button type="submit" name="<?php echo 'tasklistbtn'.$count;?>" id="<?php echo 'tasklistbtn'.$count;?>" class="btn btn-sm"><img src="<?php echo URLROOT.'/img/tas.png';?>" alt="ses" height="20px"></button>
                  <button type="submit" name="<?php echo 'addtaskbtn'.$count;?>" id="<?php echo 'addtaskbtn'.$count;?>" class="btn btn-sm"><span style="font-size:1.2rem;font-weight:700">+</span><img src="<?php echo URLROOT.'/img/tas.png';?>" alt="ses" height="20px"></button>
                  <button type="submit" onclick="return confirmDelete(this)" name="<?php echo 'deleteprojectbtn'.$count;?>" id="<?php echo 'deleteprojectbtn'.$count;?>" class="btn btn-sm"><img src="<?php echo URLROOT.'/img/delete.png';?>" alt="see" height="20px"></button>
                </td>

                  
                  <?php echo '</tr>';}
                    $count++;} ?>
                    <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">           
                    <!-- <?php echo 'tttotalcount'.$count;?> -->

                </tbody>
            </table>
        </div><!--card-body-->
    </div><!--card-->
  </form>

  <script>
function confirmDelete(form) {
    if (confirm("Are you sure you want to delete this item?")) {
        // If the user clicks "OK", submit the form
        // document.getElementById('deleteForm').submit();
        return true;
    } else {
        // If the user clicks "Cancel", do nothing
        return false;
    }
}
</script>



  <div class="container mt-5">
  <!--form-->   
    <div id="id01" class="modal">
        
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>
            <form class="modal-content animate" action="<?php echo URLROOT; ?>taskmanagers/insertProjectDetails" method="post">
        <div class="container">
            <h3 class="title text-center my-3"><b>New Project</b></h3>
            <hr>
            <div class="row">
                <div class="col">
                    <label for="Status">Client Name</label>
                    <select class="form-select" id="client" name="client" aria-label="Default select example">
                      <option value="">Select Client</option>
                      <?php $count=0; foreach($additionalData as $dataline){ ?> 
                      <option value="<?php echo $dataline->client_id;?>"><?php echo $dataline->client_name;?></option>
                      <?php } ?>
                    </select>
                </div>
                <div class="col">
                  <label for="Project Name">Project Name</label>
                  <input type="text" class="form-select" placeholder="Enter Project Name" id="project_name" name="project_name" required>
                </div>
                <div class="col">
                  <label for="end_date">Select Client Category</label>
                  <select name="categoryid" id="categoryid" class="form-select">
                    <option value="Finance">Finance</option>
                    <option value="IT">IT</option>
                    <option value="Complaint">Complaint</option> 
                  </select>
                </div>
            </div>
          

            <div class="row">
                <div class="col-sm-6">
                  <label for="start_date">Start Date</label>
                  <input type="date" class="form-select" placeholder="Enter Start Date" id="start_date" name="start_date"  required>
                </div>
                <div class="col-sm-6">
                  <label for="end_date">End Date</label>
                  <input type="date" class="form-select" placeholder="Enter End Date" id="end_date" name="end_date"  required>
                </div>
            </div>
           
            <div class="row">
                <div class="col-sm-6"><button class="savebtn" id="addproject" name="addproject" type="submit">Save</button></div>
                <div class="col-sm-6"><button type="submit" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button></div>
            </div>
        </div><!--container-->
        </form> <!--form--> 
    </div><!--model-->

  

 
  </div><!--container-->
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
