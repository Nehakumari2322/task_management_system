<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/employee/navbar.php';?>

<?php if($additionalData['message']){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $additionalData['message'];?>

          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
       <?php } ?>


<div class="container justify-content-center" style="display:flex;">

    <div class="card " style="border-radius:10px;width:70%;">
<form action="<?php echo URLROOT ;?>employees/profiledetails" method="POST" enctype="multipart/form-data">
    
        <div class="card-body">
            <div class="card-header text-center h3" style="background:#000080;color:white;border-radius:10px;"><b>Profile</b></div>

            <input type="hidden" name="employee_id" id="employee_id" value="<?php echo $data->employee_id;?>"> 
            <div class="imgcontainer my-3" style="display:flex;justify-content:center;">
                <img src="<?php echo URLROOT."/uploads/".$data->image;?>" alt="Avatar" class="avatar" height="100px;" width="100px;" style="border-radius:50%;">
            </div>
            <div class="mb-3 px-4">
                        <label for="image" class="form-label">Update Profile Picture :</label><br>
                        <input for="image"  type="file" name="image[]" id="image[]" accept="image/*"  />
                    </div>
            <div class="row">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $data->first_name;?>">
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $data->last_name;?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $data->email;?>">
                </div>
                <!-- <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo $data->password;?>">
                </div> -->
            </div> 
            <div class="row justify-content-center my-2">
                <button type ="submit" id="updateprofile" name="updateprofile" class="btn btn-success" style="width:30%;">Update</button>
            </div>
        </div><!--card-body-->
    </div><!--card-->
    </form>
</div><!--container-->
<?php require APPROOT . '/views/inc/employee/footer.php';?>