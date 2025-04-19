<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar.php';?>
<!-- <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button> -->
<button class="user" onclick="document.getElementById('id01').style.display='block'" style="float:right;width:auto;">Add User+</button>

<div class="container mt-5">
 <!--form-->   
<div id="id01" class="modal">
  
  <form class="modal-content animate" action="/action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      
    </div>

    <div class="container">
        <h3 class="title my-3"><b>New User</b></h3>
        <hr>
      <label for="uname">Username</label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw">Password</label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <div class="row">
        <div class="col">
            <label for="psw">Role</label>
            <input type="text" class="form-control" placeholder="First name" aria-label="First name">
        </div>
        <div class="col">
            <label for="psw">Status</label>
            <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
        </div>
      </div> 

      <div class="row">
        <div class="col">
            <label for="psw">Password</label>
            <input type="password" class="form-control" placeholder="First name" aria-label="First name">
        </div>
        <div class="col">
            <label for="psw">Confirm Password</label>
            <input type="password" class="form-control" placeholder="Last name" aria-label="Last name">
        </div>
      </div>
        
      <button name="userloginbtn" id="userloginbtn" type="submit">Login</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>

    </div>
  </form>
</div>
 <!--form-->   

 <!--table-->
<div class="card">
        <div class="card-body">
              <table class="table table-responsive table-hover">
                <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Designation</th>
                  <th scope="col">Status</th>
                  <th></th> 
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Task 1</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                  <td>@mdo</td>
                  <td><button type="button" class="btn btn-success">Update</button>
                      <button type="button" class="btn btn-danger">Delete</button>
                      <button type="button" class="btn btn-info">View</button></td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Task 2</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                  <td>@mdo</td>
                  <td><button type="button" class="btn btn-success">Update</button>
                      <button type="button" class="btn btn-danger">Delete</button>
                      <button type="button" class="btn btn-info">View</button></td>
                </tr>

              </tbody>
            </table>
            </div><!--table-->
            </div><!--card-body-->
        </div><!--card-->
         <!--table-->

    </div><!--container--->











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
