<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar.php';?>
<?php if($additionalData['message']){ ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $additionalData['message'];?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php } ?>
<div class="container mt-3">
<div class="card border border-success" style="width:90%;display:block;margin:auto;border-radius: 25px;">
<form  action="<?php echo URLROOT; ?>taskmanagers/showemployeedetails" method="post">
    <input type="hidden" value="<?php echo $data->employee_id;?>" name="employee_id" id="employee_id"> 

    <div class="container ">
        <h3 class="card-text text-center fs-1 fw-bold" style="color: #294B29;"><b>Update Employee Details</b></h3>
        <hr>
        <div class="row">
            <div class="col-sm-4">
                <label for="client_name">First Name</label>
                <input class="form-control" type="text" placeholder="Enter First Namee" id="first_name" name="first_name" value="<?php echo $data->first_name;?>" readonly>
            </div>

            <div class="col-sm-4">
                <label for="client_name">Last Name</label>
                <input class="form-control" type="text" placeholder="Enter Last Name" id="last_name" name="last_name" value="<?php echo $data->last_name;?>" readonly>
            </div>

            <div class="col-sm-4">
                <label for="client_name">Password</label>
                <input class="form-control" type="text" placeholder="Enter your Password" id="password" name="password" value="<?php echo $data->password;?>" required>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <label for="email">Email</label>
                <input type="text" class="form-control" placeholder="Enter Email" id="email" name="email" value="<?php echo $data->email;?>" required>
            </div>

            <div class="col-sm-4">
                <label for="phone">Phone Number</label>
                <input type="number" class="form-control" placeholder="Phone Number" id="phone" name="phone" min='1111111111' max="9999999999" value="<?php echo $data->phone;?>">
            </div>

            <div class="col-sm-4">
            <label for="Status">Status</label>
                <select id="status" name="status" class="form-select" aria-label="Default select example">
                    <option value="<?php echo $data->status;?>"><?php echo $data->status;?></option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>
        </div>



        <div class="row">
                <div class="col-sm-4">
                    <label for="date_of_joining">Date of joining</label>
                    <input type="date" class="form-control" placeholder="Date of joining" id="date_of_joining" name="date_of_joining" value="<?php echo $data->date_of_joining;?>">   
                </div>
                <div class="col-sm-4">
                    <label for="role">Role</label>
                    <select class="form-select" name="role" id="role" aria-label="Default select example">
                    <option value="<?php echo $data->role;?>"><?php echo $data->role;?></option>
                    <option value="Employee">Employee</option>
                    <option value="Executive">Executive</option>
                    <option value="Freelancer">Freelancer</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label for="designation">Designation</label>
                    <input type="text" class="form-control" placeholder="Enter Designation" id="designation" name="designation" value="<?php echo $data->designation;?>">   
                </div>
            </div>

            <div class="row">

                <div class="col-sm-4">
                    <label for="phone">Emergency Number</label>
                    <input type="number" class="form-control" placeholder="Emergency Number" id="emergency_phone" name="emergency_phone" min='1111111111' max="9999999999" value="<?php echo $data->emergency_phone;?>">   
                </div>
                <div class="col-sm-4">
                <label for="designation">Gender</label>
                <select class="form-select" name="gender" id="gender" aria-label="Default select example">
                <option value="<?php echo $data->gender;?>"><?php echo $data->gender;?></option>
                    </select>                
                </div>
                <div class="col-sm-4">
                    <label for="designation">Blood group</label>
                    <select class="form-select" name="blood_group" id="blood_group" aria-label="Default select example">
                        <<option value="<?php echo $data->blood_group;?>"><?php echo $data->blood_group;?></option>
                    </select>                
                </div>
            </div>
           

        <div class="row">
            <div class="col-sm-4">
                <label for="Address">Address</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Address" aria-label="Address" value="<?php echo $data->address;?>">
            </div>
            <div class="col-sm-4">
                <label for="Address Line 1">Address Line 1</label>
                <input type="text" class="form-control" name="address_line_1" id="address_line_1" placeholder="Address Line 1" aria-label="Address Line 1" value="<?php echo $data->address_line_1;?>">
            </div>
            <div class="col-sm-4">
                <label for="Address Line 2">Address Line 2</label>
                <input type="text" class="form-control" name="address_line_2" id="address_line_2" placeholder="Address Line 2" aria-label="Address Line 2" value="<?php echo $data->address_line_2;?>">
            </div>
        </div>
       
        <div class="row">
        <div class="col-sm-4">
                <label for="Pincode">Pincode</label>
                <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pincode" aria-label="Pincode" min='111111' max="999999" value="<?php echo $data->pincode;?>">
            </div>
            <div class="col-sm-4">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="city" aria-label="city" value="<?php echo $data->city;?>">
            </div>
            <div class="col-sm-4">
                <label for="State">State</label>
                <input type="text" class="form-control" id="state" name="state" placeholder="State" aria-label="State" value="<?php echo $data->state;?>">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6"><button id="updateEmployeebtn" name="updateEmployeebtn" type="submit" class="savebtn rounded-3">Update</button></div>
            <div class="col-sm-6"><button id="employeebackbtn" name="employeebackbtn" type="submit" class="cancelbtn rounded-3">Back</button></div>

        </div>
    </div><!--container-->
    </form>  
</div>

  
</div><!--container-->
<?php require APPROOT . '/views/inc/footer.php';?>

