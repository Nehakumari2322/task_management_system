<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar.php';?>

<?php if($additionalData['message']){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $additionalData['message'];?>

          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php } ?>

<div class="container mt-2">
 

            
    <form  action="<?php echo URLROOT; ?>taskmanagers/updateclient" method="post">
    <input type="hidden" value="<?php echo $data->client_id;?>" name="client_id" id="client_id"> 

    <div class="card">
    <div class="container ">
        <h3 class="title my-3"><b>Update Client Details</b>&nbsp; </h3><img src="<?php echo URLROOT.'/img/icons8-pencil-50.png';?>" alt="se" height="20px" style="float:right" >
        <hr >
        <div class="card p-3" style=" background-color: #dbe6f9;">
            <div class="row">
                <div class="col-sm-4">
                    <label for="client_name">Client Name</label>
                    <input type="text" class="form-control" placeholder="Enter Client Name" id="client_name" name="client_name" value="<?php echo $data->client_name;?>" required>
                </div>
                <div class="col-sm-4">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" placeholder="Enter Email" id="email" name="email" value="<?php echo $data->email;?>" required>
                </div>
                <div class="col-sm-4">
                    <label for="phone">Phone Number</label>
                    <input type="number" class="form-control" placeholder="Phone Number" id="phone" name="phone" min='1111111111' max="9999999999" maxlength="10" value="<?php echo $data->phone;?>">
                </div>
            </div>
        </div>
       
       <div class="card p-3 mt-3"  style=" background-color: #dbe6f9;">
        <div class="row">
            <div class="col">
                <label for="Status">Status</label>
                <select id="status" name="status" class="form-select" aria-label="Default select example">
                    <option value="<?php echo $data->status_id;?>"><?php echo $data->status_desc;?></option>
                    <option value="20">Active</option>
                        <option value="30">Inactive</option>
                </select>
            </div>
            <div class="col">
                <label for="Address Line 1">Address Line 1</label>
                <input type="text" class="form-control" name="address_line_1" id="address_line_1" placeholder="Address Line 1" aria-label="Address Line 1" value="<?php echo $data->address_line_1;?>">
            </div>
            <div class="col">
                <label for="Address Line 2">Address Line 2</label>
                <input type="text" class="form-control" name="address_line_2" id="address_line_2" placeholder="Address Line 2" aria-label="Address Line 2" value="<?php echo $data->address_line_2;?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="city" aria-label="city" value="<?php echo $data->city;?>">
            </div>
            <div class="col">
                <label for="State">State</label>
                <input type="text" class="form-control" id="state" name="state" placeholder="State" aria-label="State" value="<?php echo $data->state;?>">
            </div>
             <div class="col">
                <label for="Pincode">Pincode</label>
                <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pincode" aria-label="Pincode" min='111111' max="999999" maxlength="6" value="<?php echo $data->pincode;?>">
            </div>
        </div>
        </div>
        <div class="card p-3 mt-3"  style=" background-color: #dbe6f9;">
        <div class="row">
            <div class="col">
                <label for="POC Name">POC Name</label>
                <input type="text" class="form-control" id="POC_name" name="POC_name" placeholder="POC name" aria-label="POC Name" value="<?php echo $data->POC_name;?>">
            </div>
            <div class="col">
                <label for="POC Phone Number">Company Contact Number</label>
                <input type="number" class="form-control" id="POC_phone" name="POC_phone" min='1111111111' max="9999999999" maxlength="10" placeholder="POC Phone Number" aria-label="POC Phone Number" value="<?php echo $data->POC_phone;?>">
            </div>
            <div class="col">
                <label for="POC Designation">POC Designation</label>
                <input type="text" class="form-control" name="POC_designation" id="POC_designation" placeholder="POC Designation" aria-label="POC Designation" value="<?php echo $data->POC_designation;?>">
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-sm-6"><button id="updateclientbtn" name="updateclientbtn" type="submit" class="savebtn">Update</button></div>
            <div class="col-sm-6"><button id="clientbackbtn" name="clientbackbtn" type="submit" class="cancelbtn">Back</button></div>

        </div>
    </div><!--container-->
    </div>
    </form>  

  
</div><!--container-->
<?php require APPROOT . '/views/inc/footer.php';?>

