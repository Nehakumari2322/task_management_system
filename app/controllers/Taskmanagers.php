<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of User
 *
 * @author Software Development Wing <Penta Head Private Ltd.>
 */
class taskmanagers extends Controller{
    public function __construct() {
       // echo 'Agents construct';
        $this->taskmanagermodel = $this->model('taskmanager');
        $this->CommonModel = $this->model('common');
        $todaysDate = null;
    }
    public function logmein()
    {
        $data11 = $this->taskmanagermodel->showclientDetailsInTable();
        $data2 = $this->taskmanagermodel->showProjectDetailsInTable();
        $data3 = $this->taskmanagermodel->showTaskDetailsInTable();
        $data4 = $this->taskmanagermodel->showNewTaskDetails();
        $data5 = $this->taskmanagermodel->showInProgressTaskDetails();
        $data6 = $this->taskmanagermodel->showHoldTaskDetails();
        $data7 = $this->taskmanagermodel->showDeletedTaskDetails();
        $data['clientCount'] = count($data11);
        $data['projectCount'] = count($data2);
        $data['taskCount'] = count($data3);
        $data['taskStartedCount'] = count($data4);
        $data['taskprogressCount'] = count($data5);
        $data['taskholdCount'] = count($data6);
        $data['taskcompletedCount'] = count($data7);
        $data['taskname'] = 'In Progress ';
        // print_r($data);
        $sdata=$this->taskmanagermodel->showInProgressTaskDetails(); 
        $data1 = $this->CommonModel->getAssignTaskToExecutive();
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
        $this->view('taskmanagers/home',$data,$adata,$mdata,$ndata,$rdata,$sdata);
    } 

    public function navform(){
        if(isset($_POST['homebtn'])){
         $this->logmein();
        }
        else if(isset($_POST['employeebtn'])){
            $data=$this->taskmanagermodel->showEmployeeDetailsInTable();
            $this->view('taskmanagers/employee',$data);
        }   
    }

    public function reassignttouser(){   
        if(isset($_POST['update'])){
            $reassign = trim($_POST['reassignto']);
            $rdata['message'] = null;
            foreach($_POST['taskid'] as $taskid){
                if($taskid!=''){
                    $lastUpdateTs = $this->getCurrentTs();
                    $lastUpdateBy ='Executive';
                $data1=$this->taskmanagermodel->updatereassignto($taskid,$reassign,$lastUpdateTs,$lastUpdateBy);
                if($data1 != null){
                    $rdata['message'] = 'Task reassigned successfully';
                }
                $adata = $this->taskmanagermodel->getAllEmpolyee();
                $data = $this->taskmanagermodel->getMasterTaskList();
                $mdata = $this->taskmanagermodel->getIncorporationType();
                $ndata = $this->taskmanagermodel->showTaskAssignUser();
                $this->view('taskmanagers/create_task',$data,$adata,$mdata,$ndata,$rdata); 
                }
            }
        }
    }

    public function edittaskdetail(){ 
        $totalcount = trim($_POST['totalcount']);
        for ($count=0; $count<=$totalcount; $count++){ 
            if(isset($_POST['taskdetail'.$count])){
                $task_id = trim($_POST['id1'.$count]);
                $data = $this->taskmanagermodel->getTaskDetailToEmployee($task_id);
                $user = $_SESSION['userid'];
                $adata = $this->taskmanagermodel->getAllEmplyee($user);
                $this->view('taskmanagers/taskdetails',$data,$adata);
            }  
        }
    }

    public function duetoday(){
        $totalcount = trim($_POST['totalcount']);
        for ($count=0; $count<=$totalcount; $count++) {
            if(isset($_POST['reminderdue'.$count])){
                $Id=trim($_POST['id1'.$count]);
                $data = $this->taskmanagermodel->getTaskById($Id);
                $adata = $this->taskmanagermodel->getAllEmployee();
                $this->view('taskmanagers/edittask',$data,$adata);
            }
        }
    }

    public function reminderpassed(){
        $totalcount = trim($_POST['totalcount']);
        for ($count=0; $count<=$totalcount; $count++){  
            if(isset($_POST['reminder'.$count])){
                $task_id2 = trim($_POST['id3'.$count]);
                $data = $this->taskmanagermodel->getTaskDetailToEmployee($task_id2); 
                $user = $_SESSION['userid'];
                $adata = $this->taskmanagermodel->getAllEmplyee($user);
                $this->view('taskmanagers/taskdetails',$data,$adata);
            }
        }
    }

    public function inprogress(){
        $totalcount = trim($_POST['totalcount']);
        for ($count=0; $count<=$totalcount; $count++){  
            if(isset($_POST['inprogress'.$count])){
                $task_id2 = trim($_POST['id4'.$count]);
                $data = $this->taskmanagermodel->getTaskDetailToEmployee($task_id2);
                $user = $_SESSION['userid'];
                $adata = $this->taskmanagermodel->getAllEmplyee($user); 
                $this->view('taskmanagers/taskdetails',$data,$adata);
            }
        }
    }

    public function updatetask(){
        if(isset($_POST['update'])){
        $task_id = trim($_POST['taskId']);
        $status = trim($_POST['status']);
        $lastUpdatedBy = "Executive";
        $lastUpdatedTs = $this->getCurrentTs(); 
        $mdata['message']= null;
        $id = $this->taskmanagermodel->updatedStatus($task_id,$status,$lastUpdatedBy,$lastUpdatedTs);
        if($id != null){
            $mdata['message'] = "Updated job status";
        }
        $user = $_SESSION['userid'];
        $adata = $this->taskmanagermodel->getAllEmplyee($user);
        $data = $this->taskmanagermodel->getTaskDetailToEmployee($task_id); 
        $this->view('taskmanagers/taskdetails',$data,$adata,$mdata);
        }
        else if(isset($_POST['hold'])){
            $data = trim($_POST['taskId']);
            $this->view('taskmanagers/taskholdpage',$data);
        }
        else if(isset($_POST['cancel'])){
            $data = trim($_POST['taskId']);
            $this->view('taskmanagers/taskcancelpage',$data);
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
            $id = $this->taskmanagermodel->updateHoldCancelReason($task_id,$reason,$status,$lastUpdatedBy,$lastUpdatedTs);
            if($id != null){
                $adata['message'] = "Reason Updated Successfully !!!! ";
            }
            $data = $task_id;
            $this->view('taskmanagers/taskholdpage',$data,$adata);
        }
        else if(isset($_POST['back'])){
            $task_id = trim($_POST['taskid']);
            $data = $this->taskmanagermodel->getTaskDetailToEmployee($task_id); 
            $user = $_SESSION['userid'];
            $adata = $this->taskmanagermodel->getAllEmplyee($user);
            $this->view('taskmanagers/taskdetails',$data,$adata);
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
            $id = $this->taskmanagermodel->updateHoldCancelReason($task_id,$reason,$status,$lastUpdatedBy,$lastUpdatedTs);
            if($id != null){
                $adata['message'] = "Reason Updated Successfully !!!! ";
            }
            $data = $task_id;
            $this->view('taskmanagers/taskcancelpage',$data,$adata);
        }
        else if(isset($_POST['back'])){
            $task_id = trim($_POST['taskid']);
            $data = $this->taskmanagermodel->getTaskDetailToEmployee($task_id); 
            $user = $_SESSION['userid'];
            $adata = $this->taskmanagermodel->getAllEmplyee($user);
            $this->view('taskmanagers/taskdetails',$data,$adata);
        }
    }

    public function insertsubtaskdetails(){
        if(isset($_POST['addtask'])){
            $ndata['message'] = null;
            $task_id = trim($_POST['taskId']);
            $task_name = trim($_POST['task_name']);
            $due_date = trim($_POST['due_date']);
            $assignto = trim($_POST['assignto']);
            $status = trim($_POST['status']);
            $assigned_by = "Executive";
            $createdTs = $this->getCurrentTs(); 
            $createdBy = "Executive";
            $lastUpdatedBy ="Executive";
            $lastUpdatedTs = $this->getCurrentTs();
            $id = $this->taskmanagermodel->insertSubTask($task_id,$task_name,$due_date,$assignto,$status,$assigned_by,$createdTs,$createdBy,$lastUpdatedTs,$lastUpdatedBy);
            if($id != null){
                $ndata['message'] = " Sub task is created successfully !!!";
            }
            $data = $this->taskmanagermodel->getTaskDetailToEmployee($task_id); 
            $user = $_SESSION['userid'];
            $adata = $this->taskmanagermodel->getAllEmplyee($user);
            // print_r($adata);
            $this->view('taskmanagers/taskdetails',$data,$adata,$ndata);
        }
    }
//----------------------------------------------home---------------------------------------------
    public function showDashboard(){
        if (isset($_POST['projectbtn'])){
            $data = $this->taskmanagermodel->showProjectDetailsInTable();
            $adata = $this->taskmanagermodel->getAllClients();
            $data1 = $this->taskmanagermodel->showStartedProjectDetailsInTable();
            $data2 = $this->taskmanagermodel->showOnHoldProjectDetailsInTable();
            $data3 = $this->taskmanagermodel->showCompletedProjectDetailsInTable();
            $mdata['all'] = count($data);
            $mdata['started'] = count($data1);
            $mdata['hold'] = count($data2);
            $mdata['completed'] = count($data3);
            $mdata['name'] ='All Project Details';
            $this->view('taskmanagers/project',$data,$adata,$mdata); 
        }
        if (isset($_POST['projectstartedbtn'])){
            $data=$this->taskmanagermodel->showStartedProjectDetailsInTable();
            $adata = $this->taskmanagermodel->getAllClients();
            $data1 = $this->taskmanagermodel->showProjectDetailsInTable();
            $data2 = $this->taskmanagermodel->showOnHoldProjectDetailsInTable();
            $data3 = $this->taskmanagermodel->showCompletedProjectDetailsInTable();
            $mdata['all'] = count($data1);
            $mdata['started'] = count($data);
            $mdata['hold'] = count($data2);
            $mdata['completed'] = count($data3);
            $mdata['name'] ='Started Project ';
            $this->view('taskmanagers/project',$data,$adata,$mdata);
        }
        if (isset($_POST['projectonholdbtn'])){
            $data=$this->taskmanagermodel->showOnHoldProjectDetailsInTable();
            $adata = $this->taskmanagermodel->getAllClients();
            $data1 = $this->taskmanagermodel->showProjectDetailsInTable();
            $data2 = $this->taskmanagermodel->showStartedProjectDetailsInTable();
            $data3 = $this->taskmanagermodel->showCompletedProjectDetailsInTable();
            $mdata['all'] = count($data1);
            $mdata['started'] = count($data2);
            $mdata['hold'] = count($data);
            $mdata['completed'] = count($data3);
            $mdata['name'] ='Hold Project ';
            $this->view('taskmanagers/project',$data,$adata,$mdata);  
        }
        if (isset($_POST['projectcompletedbtn'])){
            $data=$this->taskmanagermodel->showCompletedProjectDetailsInTable();
            $adata = $this->taskmanagermodel->getAllClients();
            $data1 = $this->taskmanagermodel->showProjectDetailsInTable();
            $data2 = $this->taskmanagermodel->showStartedProjectDetailsInTable();
            $data3 = $this->taskmanagermodel->showOnHoldProjectDetailsInTable();
            $mdata['all'] = count($data1);
            $mdata['started'] = count($data2);
            $mdata['hold'] = count($data3);
            $mdata['completed'] = count($data);
            $mdata['name'] ='Completed Project ';
            $this->view('taskmanagers/project',$data,$adata,$mdata);
        }
        else if(isset($_POST['clientbtn'])){
            $data=$this->taskmanagermodel->showActiveclientDetailsInTable(); //client details in table
            $aData=$this->taskmanagermodel->getCategoryById();
            $mData = $this->taskmanagermodel->getIncorporationType();
            $nData =  $this->taskmanagermodel->showInactiveclientDetailsInTable();
            $sData = $this->taskmanagermodel-> showAllclientDetailsInTable();
            $rdata['active'] = count($data);
            $rdata['inactive'] = count($nData);
            $rdata['all'] = count($sData);
            $rdata['name'] = "All Client Details";
            $this->view('taskmanagers/client',$data,$aData,$mData,$nData,$rdata,$sData);
        }
        else if(isset($_POST['clientall'])){
            $data=$this->taskmanagermodel->showActiveclientDetailsInTable(); //client details in table
            $aData=$this->taskmanagermodel->getCategoryById();
            $mData = $this->taskmanagermodel->getIncorporationType();
            $nData =  $this->taskmanagermodel->showInactiveclientDetailsInTable();
            $sData = $this->taskmanagermodel-> showAllclientDetailsInTable();
            $rdata['active'] = count($data);
            $rdata['inactive'] = count($nData);
            $rdata['all'] = count($sData);
            $rdata['name'] = "All Client Details";
            $this->view('taskmanagers/client',$data,$aData,$mData,$nData,$rdata,$sData);
        }
        else if(isset($_POST['clientactive'])){
            $data=$this->taskmanagermodel->showAllclientDetailsInTable(); //client details in table
            $aData=$this->taskmanagermodel->getCategoryById();
            $mData = $this->taskmanagermodel->getIncorporationType();
            $nData =  $this->taskmanagermodel->showInactiveclientDetailsInTable();
            $sData = $this->taskmanagermodel->showActiveclientDetailsInTable();
            $rdata['active'] = count($sData);
            $rdata['inactive'] = count($nData);
            $rdata['all'] = count($data);
            $rdata['name'] = "Active Client ";
            $this->view('taskmanagers/client',$data,$aData,$mData,$nData,$rdata,$sData);
        }
        else if(isset($_POST['clientinactive'])){
            $data=$this->taskmanagermodel->showActiveclientDetailsInTable(); //client details in table
            $aData=$this->taskmanagermodel->getCategoryById();
            $mData = $this->taskmanagermodel->getIncorporationType();
            $nData =  $this->taskmanagermodel->showAllclientDetailsInTable();
            $sData = $this->taskmanagermodel->showInactiveclientDetailsInTable();
            $rdata['active'] = count($data);
            $rdata['inactive'] = count($sData);
            $rdata['all'] = count($nData);
            $rdata['name'] = "Inactive Client";
            $this->view('taskmanagers/client',$data,$aData,$mData,$nData,$rdata,$sData);
        }
        else if(isset($_POST['taskbtn'])){
            $data11 = $this->taskmanagermodel->showclientDetailsInTable();
            $data2 = $this->taskmanagermodel->showProjectDetailsInTable();
            $data3 = $this->taskmanagermodel->showTaskDetailsInTable();
            $data4 = $this->taskmanagermodel->showNewTaskDetails();
            $data5 = $this->taskmanagermodel->showInProgressTaskDetails();
            $data6 = $this->taskmanagermodel->showHoldTaskDetails();
            $data7 = $this->taskmanagermodel->showDeletedTaskDetails();
            $data['clientCount'] = count($data11);
            $data['projectCount'] = count($data2);
            $data['taskCount'] = count($data3);
            $data['taskStartedCount'] = count($data4);
            $data['taskprogressCount'] = count($data5);
            $data['taskholdCount'] = count($data6);
            $data['taskcompletedCount'] = count($data7);
            $data['taskname'] = ' All ';
            $sdata=$this->taskmanagermodel->showTaskDetailsInTable(); 
            $data1 = $this->taskmanagermodel->getAssignTaskToExecutive();
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
            $this->view('taskmanagers/home',$data,$adata,$mdata,$ndata,$rdata,$sdata);
        }
        else if(isset($_POST['recurringprojectbtn'])){
            $adata = $this->taskmanagermodel->getAllEmpolyee();
            $data = $this->taskmanagermodel->getMasterTaskList();
            $mdata = $this->taskmanagermodel->getIncorporationType();
            $ndata = $this->taskmanagermodel->showTaskAssignUser();
            $this->view('taskmanagers/create_task',$data,$adata,$mdata,$ndata);   
        }
        else if(isset($_POST['taskstartbtn'])){
            $data1 = $this->taskmanagermodel->showclientDetailsInTable();
            $data2 = $this->taskmanagermodel->showProjectDetailsInTable();
            $data3 = $this->taskmanagermodel->showTaskDetailsInTable();
            $data4 = $this->taskmanagermodel->showNewTaskDetails();
            $data5 = $this->taskmanagermodel->showInProgressTaskDetails();
            $data6 = $this->taskmanagermodel->showHoldTaskDetails();
            $data7 = $this->taskmanagermodel->showDeletedTaskDetails();
            $data['clientCount'] = count($data1);
            $data['projectCount'] = count($data2);
            $data['taskCount'] = count($data3);
            $data['taskStartedCount'] = count($data4);
            $data['taskprogressCount'] = count($data5);
            $data['taskholdCount'] = count($data6);
            $data['taskcompletedCount'] = count($data7);
            $data['taskname'] = 'New';
            // print_r($data);
            $sdata=$this->taskmanagermodel->showNewTaskDetails(); 
           
            $data1 = $this->taskmanagermodel->getAssignTaskToExecutive();
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

            $this->view('taskmanagers/home',$data,$adata,$mdata,$ndata,$rdata,$sdata);

        }
        else if(isset($_POST['taskinprogressbtn'])){
            $data1 = $this->taskmanagermodel->showclientDetailsInTable();
            $data2 = $this->taskmanagermodel->showProjectDetailsInTable();
            $data3 = $this->taskmanagermodel->showTaskDetailsInTable();
            $data4 = $this->taskmanagermodel->showNewTaskDetails();
            $data5 = $this->taskmanagermodel->showInProgressTaskDetails();
            $data6 = $this->taskmanagermodel->showHoldTaskDetails();
            $data7 = $this->taskmanagermodel->showDeletedTaskDetails();
            $data['clientCount'] = count($data1);
            $data['projectCount'] = count($data2);
            $data['taskCount'] = count($data3);
            $data['taskStartedCount'] = count($data4);
            $data['taskprogressCount'] = count($data5);
            $data['taskholdCount'] = count($data6);
            $data['taskcompletedCount'] = count($data7);
            $data['taskname'] = 'In Progress ';
            // print_r($data);
            $sdata=$this->taskmanagermodel->showInProgressTaskDetails();
           
            $data1 = $this->taskmanagermodel->getAssignTaskToExecutive();
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

            $this->view('taskmanagers/home',$data,$adata,$mdata,$ndata,$rdata,$sdata);
          
        }
        else if(isset($_POST['taskholdbtn'])){
            $data1 = $this->taskmanagermodel->showclientDetailsInTable();
            $data2 = $this->taskmanagermodel->showProjectDetailsInTable();
            $data3 = $this->taskmanagermodel->showTaskDetailsInTable();
            $data4 = $this->taskmanagermodel->showNewTaskDetails();
            $data5 = $this->taskmanagermodel->showInProgressTaskDetails();
            $data6 = $this->taskmanagermodel->showHoldTaskDetails();
            $data7 = $this->taskmanagermodel->showDeletedTaskDetails();
            $data['clientCount'] = count($data1);
            $data['projectCount'] = count($data2);
            $data['taskCount'] = count($data3);
            $data['taskStartedCount'] = count($data4);
            $data['taskprogressCount'] = count($data5);
            $data['taskholdCount'] = count($data6);
            $data['taskcompletedCount'] = count($data7);
            $data['taskname'] = 'Hold ';
            // print_r($data);
            $sdata=$this->taskmanagermodel->showHoldTaskDetails();
           
            $data1 = $this->taskmanagermodel->getAssignTaskToExecutive();
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

                    $this->view('taskmanagers/home',$data,$adata,$mdata,$ndata,$rdata,$sdata);
            
        }
        else if(isset($_POST['taskcompletebtn'])){
            $data1 = $this->taskmanagermodel->showclientDetailsInTable();
            $data2 = $this->taskmanagermodel->showProjectDetailsInTable();
            $data3 = $this->taskmanagermodel->showTaskDetailsInTable();
            $data4 = $this->taskmanagermodel->showNewTaskDetails();
            $data5 = $this->taskmanagermodel->showInProgressTaskDetails();
            $data6 = $this->taskmanagermodel->showHoldTaskDetails();
            $data7 = $this->taskmanagermodel->showDeletedTaskDetails();
            $data['clientCount'] = count($data1);
            $data['projectCount'] = count($data2);
            $data['taskCount'] = count($data3);
            $data['taskStartedCount'] = count($data4);
            $data['taskprogressCount'] = count($data5);
            $data['taskholdCount'] = count($data6);
            $data['taskcompletedCount'] = count($data7);
            $data['taskname'] = 'Completed ';
            // print_r($data);
            $sdata=$this->taskmanagermodel->showDeletedTaskDetails(); 
           
            $data1 = $this->taskmanagermodel->getAssignTaskToExecutive();
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
            $this->view('taskmanagers/home',$data,$adata,$mdata,$ndata,$rdata,$sdata);
        }
    }

    public function searchbyemployee(){
        if(isset($_POST['search'])){
            $adata = $this->taskmanagermodel->getAllEmpolyee();
            // $data = $this->taskmanagermodel->showTaskAssignUser();
            $this->view('taskmanagers/search',$data,$adata);
        }
    }

    public function searchempolyee(){
        if(isset($_POST['search'])){
            $emp_id = trim($_POST['emp_id']); 
            $data = $this->taskmanagermodel->getRecurringTaskAssignToGivenUser($emp_id);
            $adata = $this->taskmanagermodel->getAllEmpolyee();
            $this->view('taskmanagers/search',$data,$adata); 
        }
    }
//------------------------------------------recurring project------------------------------
public function recurringProject(){
    // $clientId=trim($_POST['client_id']);
    $rdata['message'] = null;
   if(isset($_POST['submitrecurringproject'])){
        $taskName = trim($_POST['taskname']);
        $dueDate = trim($_POST['due_date']);
        $reminderDay = trim($_POST['reminder_day']);
        $assignedBy = "executive";
        $assignedTo = trim($_POST['assignto']);
        $status_id = "300";
        $incorporationType = trim($_POST['incorporation']);
        $createdBy='admin';
        $createdTs=$this->getCurrentTs();
        $lastUpdatedBy='admin';
        $lastUpdatedTs=$this->getCurrentTs();

        $project = $this->taskmanagermodel->getProjectByIncorporate($incorporationType);
        // print_r($project);
        if($project == null){
            // echo"wesdf";
            $rdata['message']='';  
        }
        foreach($project as $dataline)
        { 
            $Id=$this->taskmanagermodel->insertRecuringTask($taskName,$dataline->project_id,$dueDate,$reminderDay,$assignedTo,$assignedBy,$status_id,$incorporationType,$createdBy,$createdTs,$lastUpdatedBy,$lastUpdatedTs);
        
        if($Id != null){
            // echo"wesdf";
            $rdata['message']='Task is assigned succesfully';   
        }
      
        }
        // echo"WERfd";
        $adata = $this->taskmanagermodel->getAllEmpolyee();
        $data = $this->taskmanagermodel->getMasterTaskList();
        $mdata = $this->taskmanagermodel->getIncorporationType();
        $ndata = $this->taskmanagermodel->showTaskAssignUser();
        $this->view('taskmanagers/create_task',$data,$adata,$mdata,$ndata,$rdata);
      
        }
    }


    
//---------------------------------------------------------------------

public function createmasterlist(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $rdata['message'] = null;
        if(isset($_POST['submitmastertask'])){
            $task_name = trim($_POST['task_name']);
            $createdBy = 'admin';
            $createdTs = $this->getCurrentTs();
            $id = $this->taskmanagermodel->insertMasterTaskList($task_name,$createdTs,$createdBy);
            if($id != null){
                $rdata['message'] = "Master Task is Created !!";
            }
        }
            $adata = $this->taskmanagermodel->getAllEmpolyee();
            $data = $this->taskmanagermodel->getMasterTaskList();
            $mdata = $this->taskmanagermodel->getIncorporationType();
            $ndata = $this->taskmanagermodel->showTaskAssignUser();
            $this->view('taskmanagers/create_task',$data,$adata,$mdata,$ndata,$rdata); 
       
        // else if(isset($_POST['list'])){
        //     $adata = $this->taskmanagermodel->getAllEmpolyee();
        //     $data = $this->taskmanagermodel->getMasterTaskList();
        //     $mdata = $this->taskmanagermodel->getIncorporationType();
        //     $this->view('taskmanagers/create_task',$data,$adata,$mdata);
        // }
    }
}
//----------------------------------------------home_end---------------------------------------------

    public function openCreateProjectPage(){
        // echo "opencreateprojectpage";
        $data=$this->taskmanagermodel->getCategoryById();
        // print_r($data);
        $aData=$this->taskmanagermodel->getSubcategoryById();
        // print_r($aData);
        // $mData=$this->taskmanagermodel->getTaskById();
        $this->view('taskmanagers/createproject',$data,$aData);
    }


    
//------------------------------------------for profile start--------
public function profileDetails(){
    
    if (isset($_POST['addbtn'])){
        // echo "submitbtn";
        // $categoryId='2';
        $name=trim($_POST['name']);
        $email =trim($_POST['email']);
        $phone =trim($_POST['phone']);
        $address=trim($_POST['address']);
        $pincode=trim($_POST['pincode']);
        $address_line_1=trim($_POST['address_line_1']);
        $address_line_2=trim($_POST['address_line_2']);
        $city=trim($_POST['city']);
        $state=trim($_POST['state']);
        $country=trim($_POST['country']);
        $createdBy='admin';
        $createdTs=$this->getCurrentTs();
        $lastUpdatedBy='admin';
        $lastUpdatedTs=$this->getCurrentTs();
        
        
        $id=$this->taskmanagermodel->getprofileDetails($name,$email,$phone,$address,$pincode,$address_line_1,$address_line_2,$city,$state,$country,$createdBy,$createdTs,$lastUpdatedBy,$lastUpdatedTs); 
    }

    $this->view('taskmanagers/message');
}
//------------------------------------------for profile start--------

// -----------------------------------------for client page start-------------------------------------------------------------------
    public function clientDetails(){
        // $categoryId=trim($_POST['category_id']);
        $cdata['message'] = null; 
        if (isset($_POST['addclient'])){
            // echo "submitbtn";
            $categoryId=trim($_POST['category_id']);
            $clientName=trim($_POST['client_name']);
            $email =trim($_POST['email']);
            $phone =trim($_POST['phone']);
            $status ="20";
            $address=trim($_POST['address']);
            $pincode=trim($_POST['pincode']);
            $address_line_1=trim($_POST['address_line_1']);
            $address_line_2=trim($_POST['address_line_2']);
            $city=trim($_POST['city']);
            $state=trim($_POST['state']);
            $POCName=trim($_POST['POC_Name']);
            $POCPhone=trim($_POST['POC_phone']);
            $POCdesignation=trim($_POST['POC_designation']);
            $incorporationType = trim($_POST['incorporation']);
            $createdBy='admin';
            $createdTs=$this->getCurrentTs();
            $lastUpdatedBy ='admin';
            $lastUpdatedTs =$this->getCurrentTs();
        
            $clientId=$this->taskmanagermodel->insertclientDetails($categoryId,$clientName,$email,$phone,$status,$address,$pincode,
            $address_line_1,$address_line_2,$city,$state,$POCName,$POCPhone,$POCdesignation,$incorporationType,$createdBy,$createdTs,$lastUpdatedBy,
            $lastUpdatedTs); 
            // echo "clientId".$clientId;
            $projectName = $clientName."_default";
            $statusId = "200";
            $start_date = $this->getCurrentDate();
            date_default_timezone_set('Asia/Kolkata');
            $end_date = date('Y-m-d', strtotime('+20 years'));
            $assignedBy ="executive";
            $projectId = $this->taskmanagermodel->insertDefaultProject($clientId,$projectName,$categoryId,$start_date,$end_date,$statusId,$assignedBy,$createdTs,$createdBy, $lastUpdatedTs,$lastUpdatedBy);
            if($projectId != null){
                $cdata['message'] = "Client has been created Successfully !!!";
            }
        }
        $data=$this->taskmanagermodel->showAllclientDetailsInTable(); //client details in table
        $aData=$this->taskmanagermodel->getCategoryById();
        $mData = $this->taskmanagermodel->getIncorporationType();
        $nData =  $this->taskmanagermodel->showInactiveclientDetailsInTable();
        $sData = $this->taskmanagermodel->showActiveclientDetailsInTable();
        $rdata['active'] = count($sData);
        $rdata['inactive'] = count($nData);
        $rdata['all'] = count($data);
        $rdata['name'] = "Active Client ";
        $this->view('taskmanagers/client',$data,$aData,$mData,$nData,$rdata,$sData,$cdata);
    }
    
    public function showclientdetails(){
        // echo "showclientDetails";
        $totalcount = trim($_POST['totalcount']);
        for ($count=0; $count<=$totalcount; $count++) {
            if(isset($_POST['editbtn'.$count])){
                $clientId=trim($_POST['client_id'.$count]);
                $data=$this->taskmanagermodel->editClientDetails($clientId); //client details in table
                // print_r($data);
                $this->view('taskmanagers/editclient',$data); 
            }
            else if(isset($_POST['deletebtn'.$count])){
                // echo"dfgv";
                $cdata['message'] = null;
                // echo "showclientDetailsdeletebtn";
                $clientId=trim($_POST['client_id'.$count]);
                // echo "site".$clientId;
                $adata=$this->taskmanagermodel->delete($clientId);
                if($adata == true){
                    $cdata['message'] ="deleted Client Successfully !!!!!!";
                }
                $data=$this->taskmanagermodel->showActiveclientDetailsInTable(); //client details in table
                $aData=$this->taskmanagermodel->getCategoryById();
                $mData = $this->taskmanagermodel->getIncorporationType();
                $nData =  $this->taskmanagermodel->showInactiveclientDetailsInTable();
                $sData = $this->taskmanagermodel-> showAllclientDetailsInTable();
                $rdata['active'] = count($data);
                $rdata['inactive'] = count($nData);
                $rdata['all'] = count($sData);
                $rdata['name'] = "All Client Details";
                $this->view('taskmanagers/client',$data,$aData,$mData,$nData,$rdata,$sData,$cdata);
            }
            else if(isset($_POST['project'.$count])){
                $clientId=trim($_POST['client_id'.$count]);
                $clientName = trim($_POST['client_name'.$count]);
                $data['name'] = $clientName;
                $adata = $this->taskmanagermodel->getClientProject($clientId);
                $this->view('taskmanagers/clientproject',$data,$adata);
            }
            else if(isset($_POST['task'.$count])){
                $clientId=trim($_POST['client_id'.$count]);
                $clientName = trim($_POST['client_name'.$count]);
                $data['name'] = $clientName;
                $adata = $this->taskmanagermodel->getClientTask($clientId);
                $this->view('taskmanagers/clienttask',$data,$adata);
            }
        }
    }


    public function clienttask(){
        $totalcount = trim($_POST['totalcount']);
        for ($count=0; $count<=$totalcount; $count++) {
            if(isset($_POST['task'.$count])){
                $clientId=trim($_POST['clientid'.$count]);
                $name = $this->taskmanagermodel->getclientNameById($clientId);
                $projectId=trim($_POST['projectid'.$count]);
                $adata = $this->taskmanagermodel->getClientProjectTask($clientId,$projectId);
                $data['name'] = $name->client_name;
                $this->view('taskmanagers/clienttask',$data,$adata);
            }
        }
    }


    public function clienttaskdetails(){
        $totalcount = trim($_POST['totalcount']);
        for($count=0; $count<=$totalcount; $count++){
            if(isset($_POST['view'.$count])){
                $taskId=trim($_POST['taskid'.$count]);
                $data=$this->taskmanagermodel->getTaskDetails($taskId); //client details in table
                $adata = $this->taskmanagermodel->getAllEmployee();
                $this->view('taskmanagers/edittask',$data,$adata);
            }
        }
    }

    public function viewClientDetails(){
        // echo "showclientDetails";
        $totalcount = trim($_POST['totalcount']);
        for ($count=0; $count<=$totalcount; $count++) {
            if(isset($_POST['editbtn'.$count])){
                $clientId=trim($_POST['client_id'.$count]);
                $data=$this->taskmanagermodel->editClientDetails($clientId); //client details in table
                // print_r($data);
                $this->view('taskmanagers/editclient',$data); 
            }
            else if(isset($_POST['deletebtn'.$count])){
                $cdata['message'] = null;
                // echo "showclientDetailsdeletebtn";
                $clientId=trim($_POST['client_id'.$count]);
                // echo "site".$clientId;
                $adata=$this->taskmanagermodel->delete($clientId);
                if($adata == true){
                    $cdata['message'] ="deleted Client Successfully !!!!!!";
                }
                $data=$this->taskmanagermodel->showActiveclientDetailsInTable(); //client details in table
                $aData=$this->taskmanagermodel->getCategoryById();
                $mData = $this->taskmanagermodel->getIncorporationType();
                $nData =  $this->taskmanagermodel->showInactiveclientDetailsInTable();
                $sData = $this->taskmanagermodel-> showAllclientDetailsInTable();
                $rdata['active'] = count($data);
                $rdata['inactive'] = count($nData);
                $rdata['all'] = count($sData);
                $rdata['name'] = "All Client Details";
                $this->view('taskmanagers/client',$data,$aData,$mData,$nData,$rdata,$sdata,$cdata);
            }
            else if(isset($_POST['project'.$count])){
                $clientId=trim($_POST['client_id'.$count]);
                $clientName = trim($_POST['client_name'.$count]);
                $data['name'] = $clientName;
                $adata = $this->taskmanagermodel->getClientProject($clientId);
                $this->view('taskmanagers/clientproject',$data,$adata);
            }
            else if(isset($_POST['task'.$count])){
                $clientId=trim($_POST['client_id'.$count]);
                $clientName = trim($_POST['client_name'.$count]);
                $data['name'] = $clientName;
                $adata = $this->taskmanagermodel->getClientTask($clientId);
                $this->view('taskmanagers/clienttask',$data,$adata);
            }
        }
    }

    public function taketoclient(){
        if(isset($_POST['back'])){
            $data=$this->taskmanagermodel->showActiveclientDetailsInTable(); //client details in table
            $aData=$this->taskmanagermodel->getCategoryById();
            $mData = $this->taskmanagermodel->getIncorporationType();
            $nData =  $this->taskmanagermodel->showInactiveclientDetailsInTable();
            $sData = $this->taskmanagermodel-> showAllclientDetailsInTable();
            $rdata['active'] = count($data);
            $rdata['inactive'] = count($nData);
            $rdata['all'] = count($sData);
            $rdata['name'] = "All Client Details";
            $this->view('taskmanagers/client',$data,$aData,$mData,$nData,$rdata,$sData);
        }
    }

    public function updateclient(){
    //   echo "updateclient";
      if(isset($_POST['updateclientbtn'])){
        $adata['message']= null;
        $clientId=trim($_POST['client_id']);
        $clientName=trim($_POST['client_name']);
        $email =trim($_POST['email']);
        $phone =trim($_POST['phone']);
        $status =trim($_POST['status']);
        $address=trim($_POST['address']);
        $pincode=trim($_POST['pincode']);
        $address_line_1=trim($_POST['address_line_1']);
        $address_line_2=trim($_POST['address_line_2']);
        $city=trim($_POST['city']);
        $state=trim($_POST['state']);
        $POCName=trim($_POST['POC_name']);
        $POCPhone=trim($_POST['POC_phone']);
        $POCdesignation=trim($_POST['POC_designation']);
        $lastUpdatedBy='admin';
        $lastUpdatedTs=$this->getCurrentTs();
        $result = $this->taskmanagermodel->updateClientDetails($clientId,$clientName,$email,$phone,$status,$address,$pincode,$address_line_1,$address_line_2,$city,$state,$POCName,$POCPhone,$POCdesignation,$lastUpdatedBy,$lastUpdatedTs);
        $data = $this->taskmanagermodel->editClientDetails($clientId); //client details in table
        // print_r($data);
        if($data == true){
            $adata['message'] = "Updated Successfully";
        }
        $this->view('taskmanagers/editclient',$data,$adata); 
      }
      else if(isset($_POST['clientbackbtn'])){
        $data=$this->taskmanagermodel->showActiveclientDetailsInTable(); //client details in table
        $aData=$this->taskmanagermodel->getCategoryById();
        $mData = $this->taskmanagermodel->getIncorporationType();
        $nData =  $this->taskmanagermodel->showInactiveclientDetailsInTable();
        $sData = $this->taskmanagermodel-> showAllclientDetailsInTable();
        $rdata['active'] = count($data);
        $rdata['inactive'] = count($nData);
        $rdata['all'] = count($sData);
        $rdata['name'] = "All Client Details";
        $this->view('taskmanagers/client',$data,$aData,$mData,$nData,$rdata,$sData);
        
      }
    }
// -----------------------------------------------client page end-------------------------------------------------------

// -----------------------------------------------employee page start-------------------------------------------------------

public function insertEmployeeDetails(){
    // $categoryId=trim($_POST['category_id']); 
    if (isset($_POST['addemployee'])){
        // echo "submitbtn";
        $adata['message'] = null;
        $fname=trim($_POST['first_name']);
        $lname=trim($_POST['last_name']);
        $email =trim($_POST['email']);
        $password = trim($_POST['password']);
        $phone =trim($_POST['phone']);
        $status =trim($_POST['status']);
        $DOJ=trim($_POST['date_of_joining']);
        $role=trim($_POST['role']);
        $designation=trim($_POST['designation']);
        $Ephone =trim($_POST['emergency_phone']);
        $gender =trim($_POST['gender']);
        $bloodGrp =trim($_POST['blood_group']);
        $address=trim($_POST['address']);
        $pincode=trim($_POST['pincode']);
        $address_line_1=trim($_POST['address_line_1']);
        $address_line_2=trim($_POST['address_line_2']);
        $city=trim($_POST['city']);
        $state=trim($_POST['state']);
        $createdBy='admin';
        $createdTs=$this->getCurrentTs();
        $lastUpdatedBy='admin';
        $lastUpdatedTs=$this->getCurrentTs();
        //--------------------------------------------------------------------------------------
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
                         $employeeId=$this->taskmanagermodel->putemplyeeDetails($fname,$lname,$image,$email,$phone,$status,$DOJ,$role,$designation,$Ephone,$gender,$bloodGrp,$address,$pincode,$address_line_1,$address_line_2,$city,$state,$createdBy,$createdTs,$lastUpdatedBy,$lastUpdatedTs);
                         $id = $this->taskmanagermodel->insertEmployeePassword($employeeId,$password,$role,$createdTs);
                        if($id != null){
                            $aData['message']  = "Employee added successfully and Employee Id is $employeeId !!" ;
                        }
                    }
                } 
            }
        }


        $data=$this->taskmanagermodel->showEmployeeDetailsInTable();
        $this->view('taskmanagers/employee',$data,$adata);
    }
  
  
}

public function EDEmployeeDetails(){
// echo "EDEmployeeDetails";
$totalcount = trim($_POST['totalcount']);
for ($count=0; $count<=$totalcount; $count++) {
    if(isset($_POST['editemployeebtn'.$count])){
        $employeeId=trim($_POST['employee_id'.$count]);
        $data=$this->taskmanagermodel->editEmployeeDetails($employeeId); //client details in table
        $this->view('taskmanagers/editemployee',$data); 
  
    }
    else if($_POST['deleteemployeebtn'.$count]){
        $employeeId=trim($_POST['employee_id'.$count]);
       
        $adata=$this->taskmanagermodel->deleteEmployeeDetails($employeeId);
        $data=$this->taskmanagermodel->showEmployeeDetailsInTable(); //client details in table
        $this->view('taskmanagers/employee',$data,$adata);
    }
}
}

public function showEmployeeDetails(){
//   echo "updateEmployeeDetails";
  if(isset($_POST['updateEmployeebtn'])){
    $employeeId=trim($_POST['employee_id']);
    $email =trim($_POST['email']);
    $password =trim($_POST['password']);
    // echo"tghj".$password;
    $phone =trim($_POST['phone']);
    $status =trim($_POST['status']);
    $DOJ=trim($_POST['date_of_joining']);
    $role=trim($_POST['role']);
    $designation=trim($_POST['designation']);
    $Ephone =trim($_POST['emergency_phone']);
    $gender =trim($_POST['gender']);
    $bloodGrp =trim($_POST['blood_group']);
    $address=trim($_POST['address']);
    $pincode=trim($_POST['pincode']);
    $address_line_1=trim($_POST['address_line_1']);
    $address_line_2=trim($_POST['address_line_2']);
    $city=trim($_POST['city']);
    $state=trim($_POST['state']);
    $lastUpdatedBy='Executive';
    $lastUpdatedTs=$this->getCurrentTs();
    $adata['message']  = null;
    $result = $this->taskmanagermodel->updateEmployeeDetails($employeeId,$email,$phone,$status,$DOJ,$role,$designation,$Ephone,$gender,$bloodGrp,$address,$pincode,$address_line_1,$address_line_2,$city,$state,$lastUpdatedBy,$lastUpdatedTs);
    $data1 = $this->taskmanagermodel->updatepassword($employeeId,$password);
    // echo"fghj";
    $adata['message'] = 'Empolyee Details Updated Successfully';
    $data=$this->taskmanagermodel->editEmployeeDetails($employeeId); //client details in table
    // print_r($data);
    $this->view('taskmanagers/editemployee',$data,$adata); 
  }
  else if(isset($_POST['employeebackbtn'])){
    $data=$this->taskmanagermodel->showEmployeeDetailsInTable();
    $this->view('taskmanagers/employee',$data);
  }
}

// -----------------------------------------------employee page end-------------------------------------------------------

// -----------------------------------------------project page start-------------------------------------------------------

public function insertProjectDetails(){
    
    if (isset($_POST['addproject'])){
        // echo "submitbtn";
        $projectName=trim($_POST['project_name']);
        $clientId= trim($_POST['client']);
        $startDate=trim($_POST['start_date']);
        $endDate =trim($_POST['end_date']);
        // $description = trim($_POST['description']);
        $assignedBy='Executive';
        $status ='200';
        $categoryId=trim($_POST['categoryid']); 
        $createdBy='admin';
        $createdTs=$this->getCurrentTs();
        $lastUpdatedBy='admin';
        $lastUpdatedTs=$this->getCurrentTs();
        
        $projectId=$this->taskmanagermodel->putProjectDetails($projectName,$clientId,$categoryId,$startDate,$endDate,$assignedBy,$status,$createdBy,$createdTs,$lastUpdatedBy,$lastUpdatedTs); 
    }
   // $this->view('taskmanagers/client',$clientId); 
    // $data=$this->taskmanagermodel->showEmployeeDetailsInTable(); //client details in table
    // $this->view('taskmanagers/employee',$data);
 
    $data = $this->taskmanagermodel->showProjectDetailsInTable();
    $adata = $this->taskmanagermodel->getAllClients();
    $data1 = $this->taskmanagermodel->showStartedProjectDetailsInTable();
    $data2 = $this->taskmanagermodel->showOnHoldProjectDetailsInTable();
    $data3 = $this->taskmanagermodel->showCompletedProjectDetailsInTable();
    $mdata['all'] = count($data);
    $mdata['started'] = count($data1);
    $mdata['hold'] = count($data2);
    $mdata['completed'] = count($data3);
    $mdata['name'] ='All Project Details';
    $this->view('taskmanagers/project',$data,$adata,$mdata); 
    
}

public function EDProjectDetails(){

    $totalcount = trim($_POST['totalcount']);
    for ($count=0; $count<=$totalcount; $count++) {
        if(isset($_POST['deleteprojectbtn'.$count])){
            $projectId=trim($_POST['project_id'.$count]);
            $data = $this->taskmanagermodel->showProjectDetailsInTable();
            $adata1 = $this->taskmanagermodel->deleteProjectDetails($projectId);
            $data1 = $this->taskmanagermodel->showStartedProjectDetailsInTable();
            $data2 = $this->taskmanagermodel->showOnHoldProjectDetailsInTable();
            $data3 = $this->taskmanagermodel->showCompletedProjectDetailsInTable();
            $adata = $this->taskmanagermodel->getAllClients();
            $mdata['all'] = count($data);
            $mdata['started'] = count($data1);
            $mdata['hold'] = count($data2);
            $mdata['completed'] = count($data3);
            $mdata['name'] ='All Project Details';
            if($adata1 == true){
                $mdata['message'] = "Project Deleted Successfully ";
            }
            $this->view('taskmanagers/project',$data,$adata,$mdata); 
        }
        else if(isset($_POST['viewprojectbtn'.$count])){
            $projectId=trim($_POST['project_id'.$count]);
            // echo "project".$projectId; 
            $mdata=$this->taskmanagermodel->showProjectDetails($projectId); //client details in table
            $data= $this->taskmanagermodel->getAllTaskOfProject($projectId);
            $aData=$this->taskmanagermodel->getProjectById();
            $ndata = $this->taskmanagermodel->getSubTaskByTaskId($projectId);
            $this->view('taskmanagers/viewproject',$data,$aData,$mdata,$ndata);
        }
        else if(isset($_POST['addtaskbtn'.$count])){
            $projectId=trim($_POST['project_id'.$count]);
            $projectName=trim($_POST['project_name'.$count]);
            // echo "project".$projectId.$projectName;
            $data['id'] = $projectId;
            $data['name'] = $projectName;
            $mdata = $this->taskmanagermodel->getIncorporationType();
            $adata = $this->taskmanagermodel->getAllEmpolyee();
            $this->view('taskmanagers/addtask',$data,$adata,$mdata);
        }
        else if(isset($_POST['tasklistbtn'.$count])){
            $projectId=trim($_POST['project_id'.$count]);
            $data= $this->taskmanagermodel->getAllTaskOfProject($projectId);
            $aData=$this->taskmanagermodel->getProjectById();
            $ndata = $this->taskmanagermodel->getSubTaskByTaskId($projectId);
            $this->view('taskmanagers/projecttask',$data,$aData,$mdata,$ndata);
        }
    }
}


public function backtoproject(){
    $data = $this->taskmanagermodel->showProjectDetailsInTable();
    $adata = $this->taskmanagermodel->getAllClients();
    $data1 = $this->taskmanagermodel->showStartedProjectDetailsInTable();
    $data2 = $this->taskmanagermodel->showOnHoldProjectDetailsInTable();
    $data3 = $this->taskmanagermodel->showCompletedProjectDetailsInTable();
    $mdata['all'] = count($data);
    $mdata['started'] = count($data1);
    $mdata['hold'] = count($data2);
    $mdata['completed'] = count($data3);
    $mdata['name'] ='All Project Details';
    $this->view('taskmanagers/project',$data,$adata,$mdata); 
}

public function showProjectDetails(){
//   echo "showProjectDetails";
  if(isset($_POST['updateproject'])){
    $rdata['message'] = null;
    $projectId=trim($_POST['projectid']);
    $project_name=trim($_POST['project_name']);
    $description=trim($_POST['description']);
    $startDate=trim($_POST['start_date']);
    $endDate =trim($_POST['end_date']);
    $status =trim($_POST['status']);
    $assignedby =trim($_POST['assignedby']);
    $lastUpdatedBy='admin';
    $lastUpdatedTs=$this->getCurrentTs();
    $result = $this->taskmanagermodel->updateProjectDetails($projectId,$project_name,$description,$startDate,$endDate,$status,$assignedby,$lastUpdatedTs,$lastUpdatedBy);
    if($result == true){
        $rdata['message'] = "Project updated successfully";
    }
    $mdata=$this->taskmanagermodel->showProjectDetails($projectId); //client details in table
    $data= $this->taskmanagermodel->getAllTaskOfProject($projectId);
    $aData=$this->taskmanagermodel->getProjectById();
    $ndata = $this->taskmanagermodel->getSubTaskByTaskId($projectId);
    $this->view('taskmanagers/viewproject',$data,$aData,$mdata,$ndata,$rdata);
  }
 
}

// -----------------------------------------------project page end-------------------------------------------------------

// -----------------------------------------------task page start-------------------------------------------------------

public function insertTaskDetails(){
    // $categoryId=trim($_POST['category_id']); 
    if (isset($_POST['addtask'])){
        $projectId = trim($_POST['projectid']);
        $projectName = trim($_POST['project_name']);
        $taskName = trim($_POST['task_name']);
        $dueDate = trim($_POST['due_date']);
        $reminderDay = trim($_POST['reminder_day']);
        $status = '300';
        $assignedTo = trim($_POST['assignto']);
        $assignedBy = trim($_POST['assigned_by']);
        // $incorporationType = trim($_POST['incorporation']);
        $createdBy='admin';
        $createdTs=$this->getCurrentTs();
        $lastUpdatedBy='admin';
        $lastUpdatedTs=$this->getCurrentTs();
        
        $taskId = $this->taskmanagermodel->putTaskDetails($projectId,$taskName,$dueDate,$reminderDay,$status,$assignedTo,$assignedBy,$createdBy,$createdTs,$lastUpdatedBy,$lastUpdatedTs); 
        if($taskId == true){
            $ndata['message'] = "Task is added !!";
        }
    
    $data['id']=$projectId;
    $data['name'] = $projectName;
    $mdata = $this->taskmanagermodel->getIncorporationType();
    $adata = $this->taskmanagermodel->getAllEmpolyee();
    $this->view('taskmanagers/addtask',$data,$adata,$mdata,$ndata);
    }
    else if(isset($_POST['cancel'])){
        $data = $this->taskmanagermodel->showProjectDetailsInTable();
        $adata = $this->taskmanagermodel->getAllClients();
        $data1 = $this->taskmanagermodel->showStartedProjectDetailsInTable();
        $data2 = $this->taskmanagermodel->showOnHoldProjectDetailsInTable();
        $data3 = $this->taskmanagermodel->showCompletedProjectDetailsInTable();
        $mdata['all'] = count($data);
        $mdata['started'] = count($data1);
        $mdata['hold'] = count($data2);
        $mdata['completed'] = count($data3);
        $mdata['name'] ='All Project Details';
        $this->view('taskmanagers/project',$data,$adata,$mdata);
       
    }

}

public function showtasklist(){
    if(isset($_POST['list'])){
        $projectId=trim($_POST['projectid']);
        $data= $this->taskmanagermodel->getAllTaskOfProject($projectId);
        $this->view('taskmanagers/task_assign_list',$data);
    }
}

public function remindDate($reminderDate){
    // echo "remindDate";
    // echo "guhbjhb".$reminderDate;
    date_default_timezone_set('Asia/Kolkata');
    $aData['message']=null;
    $currentTS=date('Y-m-d H:i:s');
    
    if($reminderDate==$currentTS){
      $data['message']='task pending';   
    }
    return $aData['message'];
}

    public function EDTaskDetails(){
    // echo "EDTaskDetails";
    $totalcount = trim($_POST['totalcount']);
    for ($count=0; $count<=$totalcount; $count++) {
        if(isset($_POST['edittaskbtn'.$count])){
            $taskId=trim($_POST['task_id'.$count]);
            $data=$this->taskmanagermodel->getTaskDetails($taskId); //client details in table
            $adata = $this->taskmanagermodel->getAllEmployee();
            $this->view('taskmanagers/edittask',$data,$adata); 
        }
        else if($_POST['deletetaskbtn'.$count]){
            $adata['message'] = null;
            $taskId=trim($_POST['task_id'.$count]);
            $data1=$this->taskmanagermodel->deleteTaskDetails($taskId);
            if($data1 == true)
            {
                $adata['message'] ="Deleted Successfully !!!";
            }
            $data=$this->taskmanagermodel->showTaskDetailsInTable(); //client details in table
            $this->view('taskmanagers/task',$data,$adata);
        }
    }
    }

    public function showTaskDetails(){
    // echo "updateTaskDetails";
    if(isset($_POST['updatetaskbtn'])){
        $mdata['message']= null;
        $taskId=trim($_POST['task_id']);
        $taskName=trim($_POST['task_name']);
        $dueDate =trim($_POST['due_date']);
        $status=trim($_POST['status']);
        $reason=trim($_POST['reason']);
        $reminderDay = trim($_POST['reminder_day']);
        $assignedTo=trim($_POST['assignedto']);
        $assignedBy=trim($_POST['assigned_by']);
        $lastUpdatedBy= 'admin';
        $lastUpdatedTs=$this->getCurrentTs();
        $result = $this->taskmanagermodel->updateTaskDetails($taskId,$dueDate,$reminderDay,$status,$reason,$assignedTo,$assignedBy,$lastUpdatedBy,$lastUpdatedTs,$taskName);
        if($result == true){
            $mdata['message'] = " Task Updated Successfully !!!" ;
        }
        $data=$this->taskmanagermodel->getTaskDetails($taskId); //client details in table
        $adata = $this->taskmanagermodel->getAllEmployee();
        $this->view('taskmanagers/edittask',$data,$adata,$mdata); 
    }
    else if(isset($_POST['taskbackbtn'])){
        $data=$this->taskmanagermodel->showTaskDetailsInTable();
        $this->logmein(); 
    }
    }

// -----------------------------------------------task page end-------------------------------------------------------
//------------------------------------------------------Project Details page----------------------------------------------------------
   
//------------------------------------------------------Project Details page----------------------------------------------------------

    public function createUserSession($user){
//        echo " in session: userid is ". $user['userid'] ;
//        print_r($user);
        $_SESSION['userid'] = $user['userid'];
       
        
    }
    
    public function logout(){
        unset($_SESSION['userid']);
       
        session_destroy();
        redirect('users/login');
    }
    
    public function registerUserFirstTime($data){
        $regData = [
            'user_id' => $data['userid'],
            'password' => $data['password'],
           
        ];
        $this->userModel->registerUser($regData);
    }
    
}
