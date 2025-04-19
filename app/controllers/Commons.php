<?php

class Commons extends Controller{
    public function __construct(){
        $this->CommonModel = $this->model('Common');
        $this->employeeModel = $this->model('Employee');
        $this->taskModel = $this->model('Taskmanager');
        // $this->taskmanagermodel = $this->model('taskmanager');
        $todaysDate = null;
    }

 
    public function logmein(){
       
        $this->view('commons/login');
        
    }

    public function agentsLogin(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data['message'] = null;
            if(isset($_POST['loginagent'])){
                $data = [
                    'userid' => trim($_POST['login_id']),
                    'password' => trim($_POST['password']),
                    'role' => trim($_POST['role'])
                ];
                $matched = $this->CommonModel->login_verification($data);
                // echo "efsdv".$matched;
                if($matched == true && $data['userid'] =='executive' && $data['role']=='Executive'){

                    $data11 = $this->taskModel->showclientDetailsInTable();
                    $data2 = $this->taskModel->showProjectDetailsInTable();
                    $data3 = $this->taskModel->showTaskDetailsInTable();
                    $data4 = $this->taskModel->showNewTaskDetails();
                    $data5 = $this->taskModel->showInProgressTaskDetails();
                    $data6 = $this->taskModel->showHoldTaskDetails();
                    $data7 = $this->taskModel->showDeletedTaskDetails();
                    $data['clientCount'] = count($data11);
                    $data['projectCount'] = count($data2);
                    $data['taskCount'] = count($data3);
                    $data['taskStartedCount'] = count($data4);
                    $data['taskprogressCount'] = count($data5);
                    $data['taskholdCount'] = count($data6);
                    $data['taskcompletedCount'] = count($data7);
                    // echo"regfbvcdWE";
                    $data['taskname'] = 'In Progress';
                    $sdata=$this->taskModel->showInProgressTaskDetails(); 

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
                else if($matched == true && $data['userid'] =='supervisor' && $data['role']=='Executive'){
                        // $this->createUserSession($data['userid']);
                        $this->view('commons/dashboard');
                }
                else if($matched == true &&  $data['role']=='Employee'){
                    $this->createUserSession($data['userid']);
                    $userId = $_SESSION['userid'];  
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
                    $this->view('employees/home',$data,$adata,$mdata,$ndata,$rdata,$sdata,$cdata,$ldata,$ddata,$tdata,$qdata,$rsdata);  
                 
                }
                else{
                  
                    $data['message']= " Invalid Password  !! ";
                    $this->view('commons/login', $data);
                }
            }
        }
    }
    public function getreminderDate($data){
        $count = count($data);
        // echo"count".$count."<br>";
        $ir = 0;
        $ia = 0;
        $im = 0;
        $in = 0;
        foreach($data as $dataline){
            $todays_date = date('Y-m-d ');
            // echo"today".$todays_date."<br>";
            $dueDate = date('Y-m-d', strtotime($dataline->due_date));
            // $dueDate = date($dataline->due_date);
            // 
            // echo"duedate".$dueDate."<br>";
            $reminderDays = "- ". $dataline->reminder_day . " days" ;
            // echo"reminder days".$reminderDays;
            $reminderDate = date('Y-m-d', strtotime($dueDate . $reminderDays));
          
                if($todays_date == $reminderDate )
                {
                //   echo"reminder today"."<br>";
                  $adata['reminderon'.$ia] = $dataline->task_name;
                  $adata['taskId'.$ia] = $dataline->task_id;
                //   print_r( $adata['reminderon'.$i] );
                  $ia++;
                }
                else if($todays_date > $reminderDate && $todays_date <= $dueDate ){
                    // echo"<br>";
                    // echo"reminder".$reminderDate;
                    // echo"due".$dueDate;
                    // echo"due today"."<br>";
                    $mdata['reminderdue'.$im] = $dataline->task_name;
                    $mdata['reminderduetaskId'.$im] = $dataline->task_id;
                    // print_r( $adata['reminderdue'.$i] );
                    $im++;
                } 
                else if($todays_date > $reminderDate && $todays_date > $dueDate ){
                    // echo"<br>";
                    // echo"reminder".$reminderDate;
                    // echo"due".$dueDate;
                    // echo"both pass"."<br>";
                    $adata['reminderlate'.$i] = $dataline->task_name;
                    $adata['reminderlatetaskId'.$i] = $dataline->task_id;
                    // print_r( $adata['reminderlate'.$i] );
                    $i++;
                }
                // else if($todays_date > $reminderDate && $todays_date < $dueDate ){
                //     echo"<br>";
                //     echo"reminder".$reminderDate;
                //     echo"due".$dueDate;
                //     echo"no due come"."<br>";
                //     $adata['remindernodue'.$i] = $dataline->task_name;
                //     print_r( $adata['remindernodue'.$i] );
                //     $i++;
                // } 
                elseif($todays_date < $reminderDate && $todays_date < $dueDate ){
                    // echo"both pending"."<br>";
                    $adata['remindernot'.$i] = $dataline->task_name;
                    $adata['remindernottaskId'.$i] = $dataline->task_id;
                    // print_r( $adata['remindernot'.$i] );
                    $i++;
                }  
            // }     
        }
        return $adata;
    }

    public function userRegisteration(){
        $data['message'] = null;
        if(isset($_POST['register']))
        {
            date_default_timezone_set('Asia/Kolkata');
            $user =  trim($_POST['username']);
            $phone_no =  trim($_POST['no']);
            $email =  trim($_POST['email']);
            $pasword =  trim($_POST['pasword2']);
            $memberId = trim($_POST['member']);
            $createTs = $this->getCurrentTs();
            $created_by = 'user';
            $match = $this->CommonModel->userExits($phone_no);

        
        if($match == true)
        {
            $data['message']= " User already Registered please Login  !! ";
              
        }
        else{
            $userId = $this->CommonModel->insertUserData($user,$phone_no,$email, $pasword, $memberId ,$createTs,$created_by);
            $data['message']= " User Register Successfully !! ";
        }
    }
       
        $this->view('commons/login', $data);
    }

    public function navbar(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if(isset($_POST['home'])){
                $userId=$_SESSION['userid'];
                $this->view('commons/dashboard');
            }
            if(isset($_POST['network'])){
                $userId=$_SESSION['userid'];
                $this->view('commons/my_network');
            }
        }
    }


    public function createUserSession($user){
        session_start();
         // Taking current system Time
        $_SESSION['start'] = time(); 
  
         // Destroying session after 1 minute
        $_SESSION['expire'] = $_SESSION['start'] + (1 * 240) ; 
        // echo "start:".$_SESSION['start'].' End:'.$_SESSION['expire'];
    //    echo " in session: userid is ". $user;
       $_SESSION['loggedin'] = "YES";
       $_SESSION['userid'] = $user;
       $data = $this->CommonModel->getUserName($user);
       $_SESSION['username'] = $data->first_name;
       $_SESSION['img'] = $data->image;
    //    echo"sessionend".$_SESSION['userid'];
     

    }
    
    public function logout(){

        unset($_SESSION['userid']);
        unset($_SESSION['username']);
        unset($_SESSION['img']);
        // echo"fsdv";
        unset($_SESSION['loggedin']);
        session_destroy();
        // redirect('users/login');
    }


   
    
}
?>
