<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar.php';?>

<style>
/* Style the tab */
.tab {
  overflow: hidden;
  /* border: 1px solid #ccc; */
  /* background-color: #f1f1f1; */
  display:block;
  margin:auto;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  /* border: 1px solid #ccc; */
  border-top: none;
}
</style>

<?php if($content['message']){ ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $content['message'];?>

          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php } ?>
<!-- <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button> -->
<button class="user" onclick="document.getElementById('id01').style.display='block'" style="float:right;width:auto;"><img src="<?php echo URLROOT.'/img/dd.png';?>" height="20px" alt=""> Client</button>


<section  >
<form action="<?php echo URLROOT; ?>taskmanagers/showDashboard" method="post">
 
    <div class="row" style="margin:20px;">
    <h2 class="text-center">Client Details</h2>
    <div class="col-sm-3"></div>
      <div class="col-sm-2">
        <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;">
          <button type="submit" style="border:none; background:none;" id="clientall" name="clientall">
            <div class="card-body" style="text-align:left;">
              <h3 class="card-title"><?php echo $result['all']?></h3>
              <p class="card-text">ALL</p>
            </div>
          </button>
        </div>
      </div>
      <div class="col-sm-2" style="display:block;margin:auto">
        <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;">
          <button type="submit" style="border:none; background:none;" id="clientactive" name="clientactive">
            <div class="card-body" style="text-align:left;">
              <h3 class="card-title" style="color:#0492c2;"><?php echo $result['active']?></h3>
              <p class="card-text" style="color:#0492c2;">Active</p>
            </div>
          </button>
        </div>
      </div><!--col-->
      <div class="col-sm-2" style="display:block;margin:auto">
        <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;">
          <button type="submit" style="border:none; background:none;" id="clientinactive" name="clientinactive">
            <div class="card-body" style="text-align:left;">
              <h3 class="card-title" style="color:red;"><?php echo $result['inactive']?></h3>
              <p class="card-text" style="color:red;">Inactive</p>
            </div>
          </button>
        </div>
      </div><!--col-->
  
      <div class="col-sm-3"></div>
      </div><!--row-->
      </form>
     
   
 
  </section>


  <section>
  <form action="<?php echo URLROOT; ?>taskmanagers/showclientdetails" method="post" id="deleteForm">
    <div class="container">
        <div class="row">
            <h4 class="text-center">
                <?php echo $result['name']?>
            </h4>
            <div class="card">
                <div class="card-body">
                    <table class="table table-responsive table-hover table-sm" style="font-size:10px;">
                        <thead>
                            <tr>
                                <th scope="col">SN</th>
                                <th scope="col">Name</th> 
                                <th scope="col">Email</th>
                                <th scope="col">Address</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count=0; foreach($store as $dataline) { ?>
                                <tr>
                                    <th scope="row"><?php echo $count+1; ?></th>
                                    <td><?php echo $dataline->client_name; ?></td>
                                    <input type="hidden" value="<?php echo $dataline->client_name;?>" name="<?php echo 'client_name'.$count;?>">
                                    <td><?php echo $dataline->email; ?></td>
                                    <td><?php echo $dataline->address; ?></td>
                                    <td><?php 
                                        if($dataline->status_desc =='ACTIVE') {
                                            echo "<span class='badge bg-success'>$dataline->status_desc</span>";
                                        } elseif($dataline->status_desc=='INACTIVE'){
                                            echo "<span class='badge bg-danger'> $dataline->status_desc</span>";
                                        }
                                    ?></td>
                                    <td>
                                        <input type="hidden" value="<?php echo $dataline->client_id;?>" name="<?php echo 'client_id'.$count;?>"> 
                                        <button type="submit" name="<?php echo 'editbtn'.$count;?>" id="<?php echo 'editbtn'.$count;?>" class="btn btn-sm"><img src="<?php echo URLROOT.'/img/icons8-sun-glasses.png';?>" alt="Edit" height="30px"></button>
                                        <button type="submit" name="<?php echo 'project'.$count;?>" id="<?php echo 'project'.$count;?>" class="btn btn-sm"><img src="<?php echo URLROOT.'/img/pro.png';?>" alt="Project" height="20px"></button>
                                        <button type="submit" name="<?php echo 'task'.$count;?>" id="<?php echo 'task'.$count;?>" class="btn btn-sm"><img src="<?php echo URLROOT.'/img/tas.png';?>" alt="Task" height="20px"></button>
                                        <button type="submit" name="<?php echo 'deletebtn'.$count;?>" id="<?php echo 'deletebtn'.$count;?>" class="btn btn-sm" onclick="return confirmDelete(this)"><img src="<?php echo URLROOT.'/img/delete.png';?>" alt="Delete" height="20px"></button>
                                    </td> 
                                </tr>
                            <?php $count++; } ?>
                            <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">        
                        </tbody>
                    </table>
                </div><!--card-body-->
            </div> 
        </div>
    </div>
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

  </section>


 <!--model form 1 start-->   
    <div id="id01" class="modal">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>
            
    <form class="modal-content animate" action="<?php echo URLROOT; ?>taskmanagers/clientdetails" method="post">
    <div class="container ">
        <h3 class="title my-3"><b>New Client</b></h3>
        <hr>
        <div class="card p-3" style=" background-color: #dbe6f9;">
            <div class="row">
                <div class="col-sm-4">
                    <label for="client_name">Client Name</label>
                    <input type="text" placeholder="Enter Client Name" id="client_name" name="client_name" class="form-control"  required>
                </div>
                <div class="col-md-4">
                    <label for="Category">Client Category</label>
                        <select id="category_id" name="category_id" class="form-control" required>
                        <option value="Category">All Category</option>
                        <?php $count=0; foreach($additionalData as $dataline){ ?> 
                            <option value="<?php echo $dataline->category_id;?>"><?php echo $dataline->category_name;?></option>
                        <?php } ?>
                        </select>
                </div>
                <div class="col-md-4">
                    <label for="incorporation">Incorporation Type</label>
                        <select id="incorporation" name="incorporation" class="form-control" required>
                        <option value="incorporation">All Category</option>
                        <?php $count=0; foreach($moreData as $dataline){ ?> 
                            <option value="<?php echo $dataline->id;?>"><?php echo $dataline->name;?></option>
                        <?php } ?>
                        </select>
                </div>
            </div>
           
        </div>
       
        <div class="card p-3 mt-3" style=" background-color: #dbe6f9;">
        <div class="row">
            <div class="col">
                <label for="Address Line 1">Address Line 1</label>
                <input type="text" class="form-control" name="address_line_1" id="address_line_1" placeholder="Address Line 1" aria-label="Address Line 1">
            </div>
            <div class="col">
                <label for="Address Line 2">Address Line 2</label>
                <input type="text" class="form-control" name="address_line_2" id="address_line_2" placeholder="Address Line 2" aria-label="Address Line 2">
            </div>
           
        </div>
        <div class="row">
           
            <div class="col">
                <label for="State">State</label>
                <input type="text" class="form-control" id="state" name="state" placeholder="State" aria-label="State">
            </div>
            <div class="col">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="city" aria-label="city">
            </div>
            <div class="col">
                <label for="Pincode">Pincode</label>
                <input type="number" class="form-control" name="pincode" id="pincode"  min='111111' max="999999" maxlength="6" placeholder="Pincode" aria-label="Pincode" required>
            </div>
        </div>
        </div>
        <div class="card p-3 mt-3" style=" background-color: #dbe6f9;">
        <div class="row">
            <div class="col">
                <label for="POC Name">POC Name</label>
                <input type="text" class="form-control" id="POC_Name" name="POC_Name" placeholder="POC name" aria-label="POC Name" required>
            </div>
            <div class="col">
                <label for="POC Phone Number">Company Contact Number</label>
                <input type="number" class="form-control" id="POC_phone" name="POC_phone" placeholder="POC Phone Number" min='1111111111' max="9999999999" maxlength="10" aria-label="POC Phone Number" required>
            </div>
            <div class="col">
                <label for="POC Designation">POC Designation</label>
                <input type="text" class="form-control" name="POC_designation" id="POC_designation" placeholder="POC Designation" aria-label="POC Designation">
            </div>
        </div>
       
        <div class="row">
        <div class="col-sm-6">
                <label for="email">Email</label>
                <input type="email" placeholder="Enter Email" id="email" name="email" class="form-control"  required>
            </div>
            <div class="col-sm-6">
                <label for="phone">Phone Number</label>
                <input type="number"  placeholder="Phone Number" id="phone" name="phone" min='1111111111' max="9999999999" maxlength="10" class="form-control">
            </div>
           
           
        </div>
        </div>
        <div class="row">
            <div class="col-sm-6"><button id="addclient" name="addclient" type="submit" class="savebtn">Save</button></div>
            <div class="col-sm-6"><button  onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button></div>
        </div>
    </div><!--container-->
    </form>
    </div><!--model-->
 <!--model form 1 end-->   



 <!-- model alter -->

 <script>
function myFunction() {
  alert("I am an alert box!");
}
</script>

<!-- model alter -->
  
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



<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
   
<?php require APPROOT . '/views/inc/footer.php';?>

