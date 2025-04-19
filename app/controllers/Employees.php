<?php

class Employees extends Controller{
    public function __construct(){
        $this->employeeModel = $this->model('Employee');
        $todaysDate = null;
    }

    public function logmein(){
        $userId = $_SESSION['userid'];  
        // $data = $this->employeeModel->getAssignTaskToUser($userId);
        $data1 = $this->employeeModel->getAssignTaskToUser($userId);
                    $ir = 0;
                    $ia = 0;
                    $im = 0;
                    $in = 0;
                    $rdata = array();
                    $adata = array();
                    $mdata = array();
                    $ndata = array();
                    foreach($data1 as $dataline) {
                        $todays_date = date('Y-m-d');
                        $dueDate = date('Y-m-d', strtotime($dataline->due_date));
                        $reminderDays = "- " . $dataline->reminder_day . " days";
                        $reminderDate = date('Y-m-d', strtotime($dueDate . $reminderDays));
                    
                        if (($todays_date == $reminderDate || $todays_date > $reminderDate) && $todays_date < $dueDate) {
                            $rdata[$ir]['taskId'] = $dataline->task_id;
                            $rdata[$ir]['reminderon'] = $dataline->task_name;
                            $ir++;
                        } else if ($todays_date > $reminderDate && $todays_date == $dueDate) {
                            $adata[$ia]['reminderduetaskId'] = $dataline->task_id;
                            $adata[$ia]['reminderdue'] = $dataline->task_name;
                            $ia++;
                        } else if ($todays_date > $reminderDate && $todays_date > $dueDate) {
                            $mdata[$im]['reminderlatetaskId'] = $dataline->task_id;
                            $mdata[$im]['reminderlate'] = $dataline->task_name;
                            $im++;
                        } else if ($todays_date < $reminderDate && $todays_date < $dueDate) {
                            $ndata[$in]['remindernottaskId'] = $dataline->task_id;
                            $ndata[$in]['remindernot'] = $dataline->task_name;
                            $in++;
                        }
                        else{
                            echo "";
                        } 
                    } 
                    $rdata['rdata'] = $rdata;
                    $adata['adata'] = $adata;
                    $mdata['mdata'] = $mdata;
                    $ndata['ndata'] = $ndata;
        $sdata = $this->employeeModel->getCancelHoldTask($userId);
        $cdata = $this->employeeModel->getCompletedTask($userId);
        $ldata = $this->employeeModel->getSubTaskAssignTo($userId);
        $ddata = $this->employeeModel->getAssignJobToMe($userId);
        $tdata = $this->employeeModel->getAssignJobToMePending($userId);
        $qdata = $this->employeeModel->getAssignJobToMeHoldCancel($userId);
        $rsdata = $this->employeeModel->getAssignJobToMecomplete($userId);
        // print_r($rsdata);
        $this->view('employees/home',$data,$adata,$mdata,$ndata,$rdata,$sdata,$cdata,$ldata,$ddata,$tdata,$qdata,$rsdata);
    }

    public function updatetask(){
        if(isset($_POST['update'])){
        $task_id = trim($_POST['taskId']);
        $status = trim($_POST['status']);
        $lastUpdatedBy = $_SESSION['userid'];
        $lastUpdatedTs = $this->getCurrentTs(); 
        $mdata['message']= null;
        $id = $this->employeeModel->updatedStatus($task_id,$status,$lastUpdatedBy,$lastUpdatedTs);

        if($id != null){
            $mdata['message'] = "Updated job status";
        }
        $user = $_SESSION['userid'];
        $adata = $this->employeeModel->getAllEmplyee($user);
        $data = $this->employeeModel->getTaskDetailToEmployee($task_id); 
        $this->view('employees/taskdetails',$data,$adata,$mdata);
        }
        else if(isset($_POST['hold'])){
            $data = trim($_POST['taskId']);
            $this->view('employees/taskholdpage',$data);
        }
        else if(isset($_POST['cancel'])){
            $data = trim($_POST['taskId']);
            $this->view('employees/taskcancelpage',$data);
        }
    }

    public function cancelreason(){
        if(isset($_POST['submit'])){
            $adata['message']= null;
            $task_id = trim($_POST['taskid']);
            $reason = trim($_POST['reason']);
            $status = '350';
            $lastUpdatedBy = $_SESSION['userid'];
            $lastUpdatedTs = $this->getCurrentTs();
            $id = $this->employeeModel->updateHoldCancelReason($task_id,$reason,$status,$lastUpdatedBy,$lastUpdatedTs);
            if($id != null){
                $adata['message'] = "Reason Updated Successfully !!!! ";
            }
            $data = $task_id;
            $this->view('employees/taskcancelpage',$data,$adata);

        }
        else if(isset($_POST['back'])){
            $task_id = trim($_POST['taskid']);
            $data = $this->employeeModel->getTaskDetailToEmployee($task_id); 
            $user = $_SESSION['userid'];
            $adata = $this->employeeModel->getAllEmplyee($user);
            $this->view('employees/taskdetails',$data,$adata);
        }
    }

    public function holdreason(){
        if(isset($_POST['submit'])){
            $adata['message']= null;
            $task_id = trim($_POST['taskid']);
            $reason = trim($_POST['reason']);
            $status = '330';
            $lastUpdatedBy = $_SESSION['userid'];
            $lastUpdatedTs = $this->getCurrentTs();
            $id = $this->employeeModel->updateHoldCancelReason($task_id,$reason,$status,$lastUpdatedBy,$lastUpdatedTs);
            if($id != null){
                $adata['message'] = "Reason Updated Successfully !!!! ";
            }
            $data = $task_id;
            $this->view('employees/taskholdpage',$data,$adata);

        }
        else if(isset($_POST['back'])){
            $task_id = trim($_POST['taskid']);
            $data = $this->employeeModel->getTaskDetailToEmployee($task_id); 
            $user = $_SESSION['userid'];
            $adata = $this->employeeModel->getAllEmplyee($user);
            $this->view('employees/taskdetails',$data,$adata);

        }
    }

    public function insertsubtaskdetails(){
        if(isset($_POST['addtask'])){
            $ndata['message'] = null;
            $task_id = trim($_POST['taskId']);
            echo"wefd".$task_id;
            $task_name = trim($_POST['task_name']);
            $due_date = trim($_POST['due_date']);
            $assignto = trim($_POST['assignto']);
            $status = trim($_POST['status']);
            $assigned_by = trim($_POST['assigned_by']);
            $createdTs = $this->getCurrentTs(); 
            $createdBy = $_SESSION['username'];
            $lastUpdatedBy =$_SESSION['username'];
            $lastUpdatedTs = $this->getCurrentTs();
            $id = $this->employeeModel->insertSubTask($task_id,$task_name,$due_date,$assignto,$status,$assigned_by,$createdTs,$createdBy,$lastUpdatedTs,$lastUpdatedBy);
            if($id != null){
                $ndata['message'] = " sub task is created successfully !!!";
            }
            $data = $this->employeeModel->getTaskDetailToEmployee($task_id); 
            $user = $_SESSION['userid'];
            $adata = $this->employeeModel->getAllEmplyee($user);
            // print_r($adata);
            $this->view('employees/taskdetails',$data,$adata,$ndata);
        }

    }

   public function edittaskdetail()
   { 
        $totalcount = trim($_POST['totalcount']);
        for ($count=0; $count<=$totalcount; $count++)
        { 
            if(isset($_POST['taskdetail'.$count])){
                $task_id = trim($_POST['id1'.$count]);
                $data = $this->employeeModel->getTaskDetailToEmployee($task_id);
                $user = $_SESSION['userid'];
                $adata = $this->employeeModel->getAllEmplyee($user);
                $this->view('employees/taskdetails',$data,$adata,);
            }
          
        }
   }

   public function duetoday(){
    $totalcount = trim($_POST['totalcount']);
    for ($count=0; $count<=$totalcount; $count++)
    {  
        if(isset($_POST['todaydue'.$count])){
            echo"2";
            $task_id = trim($_POST['id2'.$count]);
            $data = $this->employeeModel->getTaskDetailToEmployee($task_id); 
            $user = $_SESSION['userid'];
            $adata = $this->employeeModel->getAllEmplyee($user);
            // print_r($adata);
            $this->view('employees/taskdetails',$data,$adata);
        }

    }
   }

   public function reminderpassed(){
    $totalcount = trim($_POST['totalcount']);
    // echo"ertyfgh";
    for ($count=0; $count<=$totalcount; $count++)
    {  
        // echo"ytgjhgnfg";
        if(isset($_POST['reminder'.$count])){
            // echo"3";
            $task_id2 = trim($_POST['id3'.$count]);
            // echo"fdv".$task_id2;
            $data = $this->employeeModel->getTaskDetailToEmployee($task_id2); 
            $user = $_SESSION['userid'];
            $adata = $this->employeeModel->getAllEmplyee($user);
            $this->view('employees/taskdetails',$data,$adata);
        }

    }
   }

   public function inprogress(){
    $totalcount = trim($_POST['totalcount']);
    // echo"ertyfgh";
    for ($count=0; $count<=$totalcount; $count++)
    {  
        // echo"ytgjhgnfg";
        if(isset($_POST['inprogress'.$count])){
            // echo"3";
            $task_id2 = trim($_POST['id4'.$count]);
            $data = $this->employeeModel->getTaskDetailToEmployee($task_id2);
            $user = $_SESSION['userid'];
            $adata = $this->employeeModel->getAllEmplyee($user); 
            $this->view('employees/taskdetails',$data,$adata);
        }
    }
   }

   public function editTaskAssignedToMe(){
    $totalcount = trim($_POST['totalcount']);
    for ($count=0; $count<=$totalcount; $count++) {
        if(isset($_POST['editprojectbtn'.$count])){
            $Id = trim($_POST['subtaskid'.$count]);
            // echo"tyhg".$Id;
            $data = $this->employeeModel->getSubtaskById($Id);
            // echo"tyhjgf",$data;
            $this->view('employees/subtask',$data);
        }
    }
    }

    public function makeAttendence(){
        if(isset($_POST['save'])){
            $userId = $_SESSION['userid'];
            $starTime = trim($_POST['start']);  
            // $endTime = trim($_POST['end']);
            $todayDate =$this->getCurrentDate();
            $createdTs =  $this->getCurrentTs();
            $createdBy = $_SESSION['username'];
            $lastUpdatedBy = $_SESSION['username'];
            $lastUpdatedTs = $this->getCurrentTs();
            $data = $this->employeeModel->insertAttendence($userId ,$starTime,$todayDate,$createdTs,$createdBy,$lastUpdatedBy,$lastUpdatedTs);
            }
            else if(isset($_POST['update'])){
                $userId = $_SESSION['userid'];
                $endTime = trim($_POST['end']);
                $lastUpdatedBy = $_SESSION['username'];
                $lastUpdatedTs = $this->getCurrentTs(); 
                $data = $this->employeeModel->updateAttendence($userId,$endTime,$lastUpdatedBy,$lastUpdatedTs);
            }
            $this->logmein();
        }
    
    public function updatesubtask(){
        if(isset($_POST['update'])){
            $adata['message'] = null;
            $Id = trim($_POST['subtask']);
            $status = trim($_POST['status']);
            $lastUpdatedBy = $_SESSION['username'];
            $lastUpdatedTs = $this->getCurrentTs();
            $data1 = $this->employeeModel->updateSubtask($Id,$status,$lastUpdatedBy,$lastUpdatedTs);
            if($data1 != true){
                $adata['message'] = "subtask updated successfully !!";
            }
            $data = $this->employeeModel->getSubtaskById($Id);
            $this->view('employees/subtask',$data,$adata);
        }
    }
 
   public function navform(){
        if(isset($_POST['homebtn'])){
        $this->logmein();
        }
        else if(isset($_POST['userbtn'])){
            $userId = $_SESSION['userid'];
            $data = $this->employeeModel->getempdetails($userId);
            $this->view('employees/employeedetails',$data);
        }
        else if(isset($_POST['logout'])){
            $this->view('commons/login');
        }
    }
    public function profileDetails(){
        if(isset($_POST['updateprofile'])){
            $aData['message'] =null;
            $empId =  trim($_POST['employee_id']);
            $firstName = trim($_POST['first_name']);
            $lastName = trim($_POST['last_name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $lastUpdatedTs = $this->getCurrentTs();
            //----------------------------------for image------------------------------------------
            $targetDir = "uploads/"; 
            $allowTypes = array('jpg','png','jpeg'); 
            $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
            $image = array_filter($_FILES['image']['name']); 
            if(!empty($image)){ 
                foreach($_FILES['image']['name'] as $key=>$val){ 
                     // File upload path 
                     $image = basename($_FILES['image']['name'][$key]); 
                     $targetFilePath = $targetDir . $image; 
                     // Check whether file type is valid 
                     $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                     if(in_array($fileType, $allowTypes)){ 
                         // Upload file to server 
                         if(move_uploaded_file($_FILES["image"]["tmp_name"][$key], $targetFilePath)){ 
                             // Image db insert sql 
                             $insertValuesSQL .= "('".$image."', NOW()),"; 
                             $result= $this->employeeModel->updateEmpDetails($empId,$firstName,$lastName,$email,$lastUpdatedTs,$image);

                            if($result){
                                $aData['message']  = "Profile is Successfully !!" ;
                            }
                            else{
                                $aData['message']="Failed to add data, please try again !!";
                            } 
                        }
                    } 
                }
            }
            else{
                $result= $this->employeeModel->updateEmpDetailwithoutimage($empId,$firstName,$lastName,$email,$lastUpdatedTs);
                if($result){
                    $aData['message']  = "Profile is Successfully !!" ;
                }
                else{
                    $aData['message']="Failed to add data, please try again !!";
                }

            }
            //----------------------------------for image------------------------------------------
            $data = $this->employeeModel->getempdetails($empId);
            $this->view('employees/employeedetails',$data,$aData);
        }
    }

}