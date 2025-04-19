<?php require APPROOT . '/views/inc/header.php';?>
<!-- Section: Design Block -->
<style>
  body{
    background:black;
  }
</style>
<section class="text-center" >
    <!-- Background image -->

    <!-- Background image -->
  <div class="container mt-5" style="display:flex;justify-content:center;">
    <div class="card shadow-5-strong " style="
          width:40%; border-radius:20px;
          background: hsla(0, 0%, 100%, 0.8);
          backdrop-filter: blur(30px);
          ">
      <div class="card-body">

        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <h2 class="fw-bold">Login</h2>
            <form action="<?php echo URLROOT; ?>commons/agentslogin" method="post">
              <!-- 2 column grid layout with text inputs for the first and last names -->

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="text" id="login_id" name="login_id" class="form-control" />
                <label class="form-label" for="form3Example3">Login Id</label>
              </div>
              <?php 
                    if($data == 'password_mismatch'){
                        echo "Invalid Username/Password, Please try again ! ";
                    }
                    else {
                        // echo "logged in";
                    }
                ?>
              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="password" name="password" class="form-control" />
                <label class="form-label" for="form3Example4">Password</label>
              </div>

              <select class="form-select" aria-label="Default select example" id="role" name="role">
                <option selected>Select Login Type</option>
                <option value="Executive">Executive</option>
                <!-- <option value="Supervisor">Supervisor</option> -->
                <option value="Employee">Employee</option>
            </select>
  
              <!-- Submit button -->
              <button type="submit" class="btn btn-dark btn-block my-3 px-5" style="border-radius:10px;" name='loginagent' id="loginagent">
                Login
              </button>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php require APPROOT . '/views/inc/footer.php';?>