<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar.php';?>
<form action="<?php echo URLROOT ;?>taskmanagers/holdreason" method="post" >
<?php if($additionalData['message']){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $additionalData['message'];?>

          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php } ?>
<div class="container">
    <div class="row">
        <div class="col-sm-6 mt-5" style=";display:block;margin:auto">
            <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px">
            <input type="hidden" name="taskid" id="taskid" value="<?php echo $data;?>">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><b> Write Reason </b></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="reason" id="reason" aria-describedby="emailHelp" >            
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                        <button class="btn bg-success text-light" style="width:100%" name="submit" id="submit" type="submit">Confirm</button>
                        </div>
                        <div class="col-sm-6">
                        <button class="btn bg-danger text-light" style="width:100%" name="back" id="back" type="submit">Back</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<?php require APPROOT . '/views/inc/footer.php';?>