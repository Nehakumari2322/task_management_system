<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar.php';?>

<div class="container">
<form action="<?php echo URLROOT; ?>taskmanagers/taketoclient" method="post">
    <div class="row">
        <div class="col-sm-10">
            <h3 class="text-center"><?php echo $data['name'];?> Task Details</h3>
        </div>
        <div class="col-sm-2">
            <button class=" btn-danger" name="back" id="back" style="height:40px;width:100px;"><b>Back </b> </button>
        </div>
     </div>
</form>

<form action="<?php echo URLROOT; ?>taskmanagers/clienttaskdetails" method="post">
    <div class="row">
        <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-responsive table-hover table-sm table-striped" style="font-size:10px;">
                    <thead>
                    <tr>
                        <th scope="col">SN</th>
                        <th scope="col">Project Name</th>
                        <th scope="col">task Name</th>
                        <th scope="col">Assigned_to</th>
                        <th scope="col">DueDate</th>     
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                <?php $count=0; foreach($additionalData as $dataline){
                    {  echo '<tr>' ; ?>
                    <input type="hidden" name="<?php echo 'taskid'.$count;?>" id="<?php echo 'taskid'.$count;?>" value="<?php echo  $dataline->task_id?>">
                    <th scope="row"><?php echo $count+1; ?></th>
                    <td><?php echo $dataline->project_name; ?></td>
                    <td><?php echo $dataline->task_name; ?></td>
                    <td><?php echo $dataline->first_name; ?> <?php echo $dataline->last_name; ?></td>
                    <td><?php echo $dataline->due_date; ?></td>
                    <td><?php echo $dataline->status_desc; ?></td>  
                    <td><button type="submit" name="<?php echo 'view'.$count;?>" id="<?php echo 'view'.$count;?>" class="btn btn-sm"><img src="<?php echo URLROOT.'/img/icons8-sun-glasses.png';?>" alt="se" height="20px"></button></td> 

                    <?php echo '</tr>';}
                        $count++;} ?>
                        <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">           
                       

                    </tbody>
                </table>
            </div><!--card-body-->
        </div>
        </div>
    </div>
 </form>
</div>