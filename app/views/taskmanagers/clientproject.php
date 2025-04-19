<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar.php';?>

<div class="container">

    <form action="<?php echo URLROOT; ?>taskmanagers/taketoclient" method="post">
    <div class="row">
        <div class="col-sm-10">
            <h3 class="text-center"><?php echo $data['name'];?> Project Details</h3>
        </div>
        <div class="col-sm-2">
            <button class=" btn-danger" name="back" id="back" style="height:40px;width:100px;"><b>Back </b> </button>
        </div>
    </div>
    </form>
    <form action="<?php echo URLROOT; ?>taskmanagers/clienttask" method="post">

    <div class="row">
        <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-responsive table-hover table-sm table-striped" style="font-size:10px;">
                    <thead>
                    <tr>
                        <th scope="col">SN</th>
                        <th scope="col">Project Name</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                <?php $count=0; foreach($additionalData as $dataline){
                    {  echo '<tr>' ; ?>
                    <input type="hidden" name="<?php echo 'projectid'.$count;?>" id="<?php echo 'projectid'.$count;?>" value="<?php echo  $dataline->project_id?>">
                    <input type="hidden" name="<?php echo 'clientid'.$count;?>" id="<?php echo 'clientid'.$count;?>" value="<?php echo  $dataline->client_id?>">
                    <th scope="row"><?php echo $count+1; ?></th>
                    <td><?php echo $dataline->project_name; ?></td>
                    <td><?php echo $dataline->start_date; ?></td>
                    <td><?php echo $dataline->end_date; ?></td>
                    <td><?php if($dataline->status_id =='210')
                    {
                        echo "<span class='badge bg-info'>$dataline->status_desc</span>";
                    }
                    else if($dataline->status_id=='240'){
                        echo "<span class='badge bg-success'> $dataline->status_desc</span>";
                    }
                    else if($dataline->status_id=='230'){
                        echo "<span class='badge bg-danger'> $dataline->status_desc</span>";
                    }
                    else if($dataline->status_id=='200'){
                        echo "<span class='badge bg-warning'> $dataline->status_desc</span>";
                    }
                    
                    ?></td> 
                    <td><button type="submit" name="<?php echo 'task'.$count;?>" id="<?php echo 'task'.$count;?>" class="btn btn-sm"><img src="<?php echo URLROOT.'/img/tas.png';?>" alt="se" height="20px"></button></td> 
                    <?php echo '</tr>';}
                        $count++;} ?>
                        <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">           
                        <!-- <?php echo 'tttotalcount'.$count;?> -->

                    </tbody>
                </table>
            </div><!--card-body-->
        </div>
        </div>
    </div>
</div>
</form>