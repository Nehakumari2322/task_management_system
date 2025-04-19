<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar.php';?>
<?php if($additionalData['message']){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $additionalData['message'];?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php } ?>
<!-- <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button> -->
<button class="user" onclick="document.getElementById('id01').style.display='block'" style="float:right;width:auto;">Add Employee+</button>

<div class="container mt-5">
 <!--table-->
    <form  action="<?php echo URLROOT; ?>taskmanagers/edemployeedetails" method="post">
    <div class="card">
        <div class="card-body">
            <table class="table table-responsive table-hover table-sm table-striped" style="font-size:10px">
                <thead>
                <tr>
                  <th scope="col">SN</th>
                  <th scope="col">Employee Id</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Desination</th>
                  <th scope="col">Status</th>
                  <th scope="col">Password</th>
                  <th scope="col">Action</th> 
 
                </tr>
                </thead>
                <tbody>
               <?php $count=0; foreach($data as $dataline){
                {  echo '<tr>' ; ?>
               
                  <th scope="row"><?php echo $count+1; ?></th>
                  <th ><?php echo $dataline->employee_id ; ?></th>
                  <td><?php echo $dataline->first_name; ?></td>
                  <td><?php echo $dataline->last_name; ?></td>
                  <td><?php echo $dataline->email; ?></td>
                  <td><?php echo $dataline->designation; ?></td>
                  <td><?php if($dataline->status=='Active')
                  {
                    echo "<span class='badge bg-success'>$dataline->status</span>";
                }
                elseif($dataline->status=='Inactive'){
                   echo "<span class='badge bg-danger'> $dataline->status</span>";
                  }
                  ?></td>
                  <td><?php echo $dataline->password; ?></td>
                  <td>
                  <input type="hidden" value="<?php echo $dataline->employee_id;?>" name="<?php echo 'employee_id'.$count;?>">
                  <button type="submit" name="<?php echo 'editemployeebtn'.$count;?>" id="<?php echo 'editemployeebtn'.$count;?>"  class="btn btn-sm"><img src="<?php echo URLROOT.'/img/icons8-pencil-50.png';?>" alt="se" height="20px"></button> 
                  <button type="submit" onclick="return confirmDelete(this)" name="<?php echo 'deleteemployeebtn'.$count;?>" id="<?php echo 'deleteemployeebtn'.$count;?>" value="Delete" class="btn btn-sm"><img src="<?php echo URLROOT.'/img/delete.png';?>" alt="se" height="20px"></button>
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
        <form class="modal-content animate" action="<?php echo URLROOT; ?>taskmanagers/insertEmployeeDetails" method="post" enctype="multipart/form-data">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>

        <div class="container ">
            <h3 class="title my-3"><b>New Employee</b></h3>
            <hr>
            <div class="row">
                <div class="col-sm-4">
                    <label for="client_name">First Name</label>
                    <input type="text" placeholder="Enter First Name" id="first_name" name="first_name"  required>
                </div>
                <div class="col-sm-4">
                    <label for="client_name">Last Name</label>
                    <input type="text" placeholder="Enter Last Name" id="last_name" name="last_name"  required>
                </div>
                <div class="col-sm-4">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Enter password" id="password" name="password">
                </div>
            </div>
            
           <div class="row">
                <div class="col-sm-6">
                    <label for="email">Email</label>
                    <input type="email" placeholder="Enter Email" id="email" name="email"  required>
                </div>
                <div class="col-sm-6">
                    <label for="image">Update Profile Picture </label><br>
                    <input for="image" class="form-control" type="file" name="image[]" id="image[]" accept="image/*" />
                </div>
           </div>
           
            <div class="row">
                <div class="col">
                    <label for="phone">Phone Number</label>
                    <input type="number" class="form-control" placeholder="Phone Number" id="phone" name="phone" min='1111111111' max="9999999999">
                </div>
                <div class="col">
                    <label for="Status">Status</label>
                    <select class="form-select" id="status" name="status" aria-label="Default select example">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
            </div>
           
            <div class="row">
                <div class="col">
                    <label for="date_of_joining">Date of joining</label>
                    <input type="date" class="form-control" placeholder="Date of joining" id="date_of_joining" name="date_of_joining">   
                </div>
                <div class="col">
                    <label for="role">Role</label>
                    <select class="form-select" name="role" id="role" aria-label="Default select example">
                        <option selected>Select Role</option>
                        <option value="Executive">Executive</option>
                        <option value="Freelancer">Freelancer</option>
                        <option value="Employee">Employee</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="designation">Designation</label>
                    <input type="text" class="form-control" placeholder="Enter Designation" id="designation" name="designation">   
                </div>
                <div class="col">
                    <label for="phone">Emergency Number</label>
                    <input type="number" class="form-control" placeholder="Emergency Number" id="emergency_phone" name="emergency_phone" min='1111111111' max="9999999999">   
                </div>
            </div>
            
            <div class="row">
                <div class="col">
                <label for="designation">Gender</label>
                <select class="form-select" name="gender" id="gender" aria-label="Default select example">
                        <option selected>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>                
                </div>
                <div class="col">
                    <label for="designation">Blood group</label>
                    <select class="form-select" name="blood_group" id="blood_group" aria-label="Default select example">
                        <option selected>Select Blood Group</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>                
                </div>
            </div>
            
            <div class="row">
            <div class="col">
                <label for="Address">Address</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Address" aria-label="Address">
            </div>
            <div class="col">
                <label for="Pincode">Pincode</label>
                <input type="number" class="form-control" name="pincode" id="pincode" placeholder="Pincode" aria-label="Pincode" min='111111' max="999999">
            </div>
            </div>
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
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="city" aria-label="city">
            </div>
            <div class="col">
                <label for="State">State</label>
                <input type="text" class="form-control" id="state" name="state" placeholder="State" aria-label="State">
            </div>
        </div>
 
            <div class="row">
                <div class="col-sm-6"><button id="addemployee" name="addemployee" type="submit" class="savebtn">Submit</button></div>
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
