<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar.php';?>


<div class="container">
<h2 class="text-center mt-2" style="font-family: 'Philosopher', sans-serif;">Automated Task List</h2>
<form action="<?php echo URLROOT; ?>taskmanagers/taketoback" method="post">
    <div class="row mb-3 ms-auto" >
        <div class="col">
            <button class=" btn-danger" name="back" id="back" style="height:40px;width:150px;float:right"><b>Back </b> </button>
        </div>
     </div>
</form>
     <div class="row mt-2">
        <div class="col">
            <div class="card">
                <table class="table table-sm table-responsive">
                    <thead>
                        <tr>
                        <th scope="col">Sn</th>
                        <th scope="col">Task Name</th>
                        <th scope="col">Due Date</th>
                        <th scope="col">Reminder Date</th>
                        <th scope="col">Assign To</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count=0; foreach($data as $dataline){ ?>
                            <tr>
                                <td ><?php echo  $count+1?></td>       
                                <td ><?php echo $dataline->task_name;?></td>
                                <td > <?php echo $dataline->due_date;?></td>
                                <td >
                                <?php 
                                     $todays_date = date('Y-m-d');
                                     $dueDate = date('Y-m-d', strtotime($dataline->due_date));
                                     $reminderDays = "- " . $dataline->reminder_day . " days";
                                     $reminderDate = date('Y-m-d', strtotime($dueDate . $reminderDays));
                                     echo $reminderDate;
                                ?>
                                </td>
                                <td ><?php echo $dataline->first_name;?> </td>
                            </tr>
                        <?php  $count++;} ?>
                        <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>