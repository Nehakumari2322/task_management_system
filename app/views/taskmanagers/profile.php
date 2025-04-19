<?php require APPROOT . '/views/inc/header.php';?>
<form  action="<?php echo URLROOT; ?>taskmanagers/profiledetails" method="post">
<div class="container ">
    
       <label for="name">Name</label>
       <input type="text" placeholder="Enter Name" id="name" name="name"  required>

       <label for="email">Email</label>
       <input type="text" placeholder="Enter Email" id="email" name="email"  required>

       <div class="row">
           <div class="col">
               <label for="phone">Phone Number</label>
               <input type="number" class="form-control" placeholder="Phone Number" id="phone" name="phone">
           </div>

       </div>

       <div class="row">
           <div class="col">
               <label for="Address">Address</label>
               <input type="text" class="form-control" name="address" id="address" placeholder="Address" aria-label="Address">
           </div>
           <div class="col">
               <label for="Pincode">Pincode</label>
               <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pincode" aria-label="Pincode">
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
           <div class="col">
               <label for="POC Name">Country</label>
               <input type="text" class="form-control" id="country" name="country" placeholder="Country" aria-label="Country">
           </div>
       </div>
       <div class="row">
           <div class="col-sm-6"><button id="addbtn" name="addbtn" type="submit" class="savebtn">Save</button></div>
           <div class="col-sm-6"><button type="submit" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button></div>
       </div>
   </div><!--container-->
</form>