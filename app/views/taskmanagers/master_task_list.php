<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar.php';?>
<?php if($data['message']){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $data['message'];?>

          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php } ?>
<br><br><br>
<form action="<?php echo URLROOT; ?>taskmanagers/createmasterlist" method="post">
<div class="container">
  <div class="row position-relative">
    <div class="col-sm-1 position-absolute top-50 start-100 translate-middle" >
      <div class="card">
        <button class="btn" type="submit" name="list" id="list"><img src="<?php echo URLROOT.'/img/add.png';?>" height="20px" alt=""></button>
      </div>
    </div>
  </div>
  <div class="row" >
    <div class="col-sm-8 pt-3" style="border:2px solid black;display:block;margin:auto">
     
        <h1 class="text-center" style="font-family: 'Philosopher', sans-serif;"><b>Master Create Task List </b></u></h1>
          <h6>
            <div class="row ">
              <div class="col px-5">
                Task Name:-
                <input type="text" name="task_name" id="task_name"  Placeholder="Enter Your Task Name">
              </div>
            </div>
            <button type="submit"  id="submitmastertask" name="submitmastertask" class=" mb-3 mx-5 mt-3 form-control btn btn-success" style="width:89%">Submit</button>      
        </h6>
      </form>
    </div><!--col-sm-12-->
    
  </div><!--row-->
</div><!--container-->




<?php require APPROOT . '/views/inc/footer.php';?>

