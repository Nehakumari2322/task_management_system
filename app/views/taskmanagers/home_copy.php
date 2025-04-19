<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar.php';?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2">
            <div class="row mt-3">
                <div class="col-sm-7"> 
                    <!-- style="border:2px solid white;border-right:none;padding:10px;border-top-left-radius:10px;border-bottom-left-radius:10px" -->
                    <button type="submit" style="border:none; background:none;" id="clientbtn" name="clientbtn">

                    <div class="card" style="box-shadow: 0px 6px 28px 0px rgb(18, 55, 42); border-radius: 50%;width:80px;height:80px">
                        <div class="card-body">
                        <img src="<?php echo URLROOT.'/img/client.png';?>" height="20px">
                        <span class="card-text text-info text-center" style="font-size:10px;">Clients</span><br>
                        <span class="card-title text-info"><?php echo $data['clientCount']?></span>
                        </div>
                    </div>
                    </button>
                </div><!--col-->

                <div class="col-sm-5"> 
                    <!-- style="border:2px solid white;border-right:none;padding:10px;border-top-left-radius:10px;border-bottom-left-radius:10px" -->
                    <div class="card" style="box-shadow: 0px 6px 28px 0px rgb(18, 55, 42); border-radius: 50%;width:80px;height:80px">
                    <button type="submit" style="border:none; background:none;" id="clientbtn" name="clientbtn">
                        <div class="card-body">
                        <img src="<?php echo URLROOT.'/img/client.png';?>" height="20px" alt="">
                        <span class="card-text text-dark text-center" style="font-size:10px;margin:0;padding:0;">Clients</span>
                        <span class="card-title text-info"><?php echo $data['clientCount']?></span>
                        </div>
                    </button>
                    </div>
                </div><!--col-->
                
            </div><!--row-->

            <hr>

            <div class="row mt-3">
                <div class="col-sm-7"> 
                    <!-- style="border:2px solid white;border-right:none;padding:10px;border-top-left-radius:10px;border-bottom-left-radius:10px" -->
                    <button type="submit" style="border:none; background:none;" id="clientbtn" name="clientbtn">

                    <div class="card" style="box-shadow: 0px 6px 28px 0px rgb(18, 55, 42); border-radius: 50%;width:80px;height:80px">
                        <div class="card-body">
                        <img src="<?php echo URLROOT.'/img/client.png';?>" height="20px">
                        <span class="card-text text-dark text-center" style="font-size:10px;">Clients</span><br>
                        <span class="card-title text-info"><?php echo $data['clientCount']?></span>
                        </div>
                    </div>
                    </button>
                </div><!--col-->

                <div class="col-sm-5"> 
                    <!-- style="border:2px solid white;border-right:none;padding:10px;border-top-left-radius:10px;border-bottom-left-radius:10px" -->
                    <div class="card" style="box-shadow: 0px 6px 28px 0px rgb(18, 55, 42); border-radius: 50%;width:80px;height:80px">
                    <button type="submit" style="border:none; background:none;" id="clientbtn" name="clientbtn">
                        <div class="card-body">
                        <img src="<?php echo URLROOT.'/img/client.png';?>" height="20px" alt="">
                        <span class="card-text text-dark text-center" style="font-size:10px;margin:0;padding:0;">Clients</span>
                        <span class="card-title text-info"><?php echo $data['clientCount']?></span>
                        </div>
                    </button>
                    </div>
                </div><!--col-->
                
            </div><!--row-->

            <hr>

            <div class="row mt-3">
                <div class="col-sm-7"> 
                    <!-- style="border:2px solid white;border-right:none;padding:10px;border-top-left-radius:10px;border-bottom-left-radius:10px" -->
                    <button type="submit" style="border:none; background:none;" id="clientbtn" name="clientbtn">

                    <div class="card" style="box-shadow: 0px 6px 28px 0px rgb(18, 55, 42); border-radius: 50%;width:80px;height:80px">
                        <div class="card-body">
                        <img src="<?php echo URLROOT.'/img/client.png';?>" height="20px">
                        <span class="card-text text-dark text-center" style="font-size:10px;">Clients</span><br>
                        <span class="card-title text-info"><?php echo $data['clientCount']?></span>
                        </div>
                    </div>
                    </button>
                </div><!--col-->

                <div class="col-sm-5"> 
                    <!-- style="border:2px solid white;border-right:none;padding:10px;border-top-left-radius:10px;border-bottom-left-radius:10px" -->
                    <div class="card" style="box-shadow: 0px 6px 28px 0px rgb(18, 55, 42); border-radius: 50%;width:80px;height:80px">
                    <button type="submit" style="border:none; background:none;" id="clientbtn" name="clientbtn">
                        <div class="card-body">
                        <img src="<?php echo URLROOT.'/img/client.png';?>" height="20px" alt="">
                        <span class="card-text text-dark text-center" style="font-size:10px;margin:0;padding:0;">Clients</span>
                        <span class="card-title text-info"><?php echo $data['clientCount']?></span>
                        </div>
                    </button>
                    </div>
                </div><!--col-->
                
            </div><!--row-->





        </div><!--col-sm-6-->

        <div class="col-sm-10">
            <section class="mt-3">

                <div class="container-fluid">
                    <form action="<?php echo URLROOT ;?>taskmanagers/edittaskdetail" method="post" >

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card h-100" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;">
                                <div class="card-body">
                                    <h1 class="card-title" style="color:red;">
                                    <?php
                                    if (is_countable($moreData['mdata'] ) && count($moreData['mdata'] ) > 0) 
                                    {
                                    echo count($moreData['mdata'] );
                                    }
                                    else{
                                    echo 0;
                                    }
                                    ?>
                                    <span class="badge bg-danger" id="blink" style="font-size:10px; float: right;">OverDue <img src="<?php echo URLROOT.'/img/danger.png';?>" alt="" height="20px"></span></h1>
                                    
                                    <hr>
                                    <div class="table-responsive">
                                        <table class="table table-responsive table-hover table-sm" style="font-size:10px;color:red">
                                            <thead>
                                                <tr>
                                                    <th >Job ID</th>
                                                    <th >Job Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $count=0; foreach($moreData['mdata'] as $dataline){?>
                                                <tr>
                                                    
                                                <td><input type="hidden" name="<?php echo 'id1'.$count?>" id="<?php echo 'id1'.$count?>"  value="<?php echo $moreData[$count]['reminderlatetaskId']?>">
                                                    <?php echo $moreData[$count]['reminderlatetaskId']?></td>
                                                    <td> <button class="btn" type="submit" name="<?php echo 'taskdetail'.$count;?>" id="<?php echo 'taskdetail'.$count;?>" style="font-size:10px;color:red"><?php echo $moreData[$count]['reminderlate'] ?></button></td>        
                                                </tr>
                                            <?php  $count++;} ?>
                                            <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!--card-body-->
                            </div><!--card-->
                        </div><!--col-sm-3-->
                        </form>
                        <div class="col-sm-3">
                            <div class="card h-100 " style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;">
                                <form action="<?php echo URLROOT ;?>taskmanagers/duetoday" method="post" >
                                <div class="card-body">
                                    <h1 class="card-title" style="color:#ED7117">
                                    <?php
                                    if (is_countable($additionalData['adata']) && $count=count($additionalData['adata']) > 0) 
                                    {
                                    echo count($additionalData['adata']);
                                    }
                                    else{
                                    echo 0;
                                    }
                                    ?>
                                    <span class="badge" style="font-size:10px; float: right;background:#ED7117">Due Today's </span></h1>
                    
                                    <hr>
                                    <div class="table-responsive">
                                        <table class="table table-responsive table-hover table-sm " style="font-size:10px;color:#ED7117">
                                            <thead>
                                                <tr>
                                                    <th>Job ID</th>
                                                    <th>Job Name</th>
                                                </tr>
                                            </thead>
                                        
                                            <tbody>
                                            <?php if (is_array($additionalData) || is_object($additionalData)) {?>
                                                    
                                                
                                                    <?php $count=0; foreach($additionalData['adata'] as $dataline){ ?>
                                                    <tr>  
                                                        <td >  <input type="hidden" name="<?php echo 'id2'.$count;?>" id="<?php echo 'id2'.$count;?>"  value="<?php echo $additionalData[$count]['reminderduetaskId'];?>"><?php echo  $additionalData[$count]['reminderduetaskId']?></td>
                                                        <td ><button class="btn" type="submit" name="<?php echo 'todaydue'.$count;?>" id="<?php echo 'todaydue'.$count;?>" style="font-size:10px;color:#ED7117"><?php echo $additionalData[$count]['reminderdue']?></button></td>  
                                                    </tr>
                                                <?php  $count++;} ?>
                                                <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">
                                            </tbody>
                                            <?php } else{
                                        
                                            }?>
                                        </table>
                                    </div><!--table-responsive-->
                                </div><!--card-body-->
                                </form>
                            </div><!--card-->
                        </div><!--col-sm-3-->
                        
                        <div class="col-sm-3">
                            <div class="card h-100" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;">
                                <form action= "<?php echo URLROOT ;?>taskmanagers/reminderpassed" method="post" >
                                    <div class="card-body">
                                        <h1 class="card-title" style="color:blue">
                                        <?php
                                        if (is_countable($result['rdata']) && $count=count($result['rdata']) > 0) 
                                        {
                                        echo count($result['rdata']);
                                        }
                                        else{
                                        echo 0;
                                        }
                                        ?>
                                        <span class="badge" style="font-size:10px; float: right;background:blue">Reminder Passed</span></h1>
                                
                                        <hr>
                                        <div class="table-responsive">
                                            <table class="table table-responsive table-hover table-sm" style="font-size:10px;color:blue">
                                                <thead>
                                                    <tr>
                                                        <th>Job ID</th>
                                                        <th>Job Name</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php if (is_array($result) || is_object($result)) {?>
                                                        <?php $count=0; foreach($result['rdata'] as $dataline){ ?>
                                                        <tr>  
                                                            <td ><input type="hidden" name="<?php echo 'id3'.$count;?>" id="<?php echo 'id3'.$count;?>"  value="<?php echo $result[$count]['taskId'];?>"><?php echo  $result[$count]['taskId']?></td>
                                                            <td ><button class="btn" type="submit" name="<?php echo 'reminder'.$count;?>" id="<?php echo 'reminder'.$count;?>" style="font-size:10px;color:blue"><?php echo $result[$count]['reminderon']?></button></td>  
                                                        </tr>
                                                    <?php  $count++;} ?>
                                                    <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">
                                                </tbody>
                                                <?php } else{
                                                    }?>
                                            </table>
                                        </div><!--table-responsive-->
                                    </div><!--card-body-->
                                </form>
                            </div><!--card-->
                        </div><!--col-sm-3-->
                        
                        <div class="col-sm-3">
                            <div class="card h-100" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;">
                                <form action= "<?php echo URLROOT ;?>taskmanagers/inprogress" method="post" >
                                <div class="card-body">
                                    <h1 class="card-title" style="color:green">
                                    <?php
                                    if (is_countable($newData['ndata']) && $count=count($newData['ndata']) > 0) 
                                    {
                                    echo count($newData['ndata']);
                                    }
                                    else{
                                    echo 0;
                                    }
                                    ?>
                                    <span class="badge" style="font-size:10px; float: right;background:green">In Progress</span></h1>
                                    
                                    <hr>
                                    <div class="table-responsive">
                                        <table class="table table-responsive table-hover table-sm" style="font-size:10px;color:green">
                                            <thead>
                                                <tr>
                                                    <th>Job ID</th>
                                                    <th>Job Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $count=0; foreach($newData['ndata'] as $dataline){?>
                                                <tr>
                                                    
                                                <td><input type="hidden" name="<?php echo 'id1'.$count?>" id="<?php echo 'id1'.$count?>"  value="<?php echo $newData[$count]['remindernottaskId']?>">
                                                    <?php echo $newData[$count]['remindernottaskId']?></td>
                                                    <td> <button class="btn" type="submit" name="<?php echo 'taskdetail'.$count;?>" id="<?php echo 'taskdetail'.$count;?>" style="font-size:10px;color:green"><?php echo $newData[$count]['remindernot'] ?></button></td>        
                                                </tr>
                                            <?php  $count++;} ?>
                                            <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">
                                            </tbody>
                                        </table>
                                    </div><!--table-responsive-->
                                </div><!--card-body-->
                                </form>
                            </div><!--card-->
                        </div><!--col-sm-3-->
                    </div><!--row-->
                </div><!--container-fluid-->
            </section>
        </div><!--col-sm-9-->
    </div><!--row-->
</div><!--container-->

<div class="container">
    <div class="container mt-5">
      <div class="row ">
        <div class="col-sm-8">
          <div class="card h-100">
            <div class="card-header" style="color:rgb(111, 111, 234);">
              <b>Sales Report Chart</b>
            </div>
            <canvas id="barChart"></canvas>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card h-100">
            <div class="card-header" style="color:rgb(111, 111, 234);">
              <b>Operators Sales Chart</b>
            </div>
            <canvas class="mt-5" id="doughnutChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php
 
$dataPoints = array();
//Best practice is to create a separate file for handling connection to database
try{
     // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database
    $link = new \PDO(   'mysql:host=localhost;dbname=taskmanager;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
                        'root', //'root',
                        '', //'',
                        array(
                            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                    );
	
    $handle = $link->prepare('select x, y from datapoints'); 
    $handle->execute(); 
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
		
    foreach($result as $row){
        array_push($dataPoints, array("x"=> $row->x, "y"=> $row->y));
    }
	$link = null;
}
catch(\PDOException $ex){
    print($ex->getMessage());
}
	
?>
  <div id="chartContainer" style="height: 370px; width: 100%;"></div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
  <script>
    //bar
    var ctxB = document.getElementById("barChart").getContext('2d');
    var myBarChart = new Chart(ctxB, {
      type: 'bar',
      data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
          label: 'Sales',
          data: [65, 59, 80, 81, 56, 55, 40],
          fill: false,
          borderColor: 'rgb(255, 162, 235)',
          backgroundColor: 'rgb(55, 162, 235)',
          tension: 0.2
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });

    //doughnut
    var ctxD = document.getElementById("doughnutChart").getContext('2d');
    var myLineChart = new Chart(ctxD, {
      type: 'doughnut',
      data: {
        labels: ['Airtel', 'Vodafone', 'Jio', 'BSNL', 'Idea'],
        datasets: [{
          label: 'Sales',
          data: [12, 19, 3, 5, 2],
          backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(153, 102, 255)'
          ]
        }]
      },
      options: {
        responsive: true,
        legend: {
          position: 'right',
        }
      }
    });
  </script>


<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "PHP Column Chart from Database"
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc  
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
<?php require APPROOT . '/views/inc/footer.php';?>
