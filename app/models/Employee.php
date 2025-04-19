<?php 

class Employee{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function login_verification($data){
        // return true;
        $this->db->query('SELECT * FROM user where login_id = :userid and password = :password and role= :role' );
        $this->db->bind(':userid', $data['userid']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':role', $data['role']);
        if($row = $this->db->single()){
            return true;
        }
        else{
            return false;
        }
               
    }

    public function updateEmpDetailwithoutimage($empId,$firstName,$lastName,$email,$lastUpdatedTs){
        $this->db->query(' UPDATE employee_detail SET first_name=:first_name,last_name=:last_name,email=:email,last_updated_ts=:last_updated_ts WHERE employee_id=:employee_id ');
        $this->db->bind(':employee_id', $empId);
        $this->db->bind(':first_name', $firstName);
        $this->db->bind(':last_name', $lastName);
        $this->db->bind(':email', $email);
    // $this->db->bind(':password', $password);
        $this->db->bind(':last_updated_ts', $lastUpdatedTs);
        if($this->db->execute()){
            $empId = $this->db->insertId();
            return true;
        }
        else {
            return false;
        }
    }

    public function insertAttendence($userId ,$starTime,$todayDate,$createdTs,$createdBy,$lastUpdatedBy,$lastUpdatedTs){
        $this->db->query(' INSERT INTO attendence(id, user_id, start_time, todays_date, create_ts, created_by, last_updated_ts, last_updated_by) VALUES (0,:userId,:starTime,:todayDate,:createdTs,:createdBy,:lastUpdatedTs,:lastUpdatedBy)');
        $this->db->bind(':userId', $userId);
        $this->db->bind(':starTime', $starTime);
        // $this->db->bind(':endTime', $endTime);
        $this->db->bind(':todayDate', $todayDate);
        $this->db->bind(':createdBy', $createdBy);
        $this->db->bind(':createdTs', $createdTs);
        $this->db->bind(':lastUpdatedBy', $lastUpdatedBy);
        $this->db->bind(':lastUpdatedTs', $lastUpdatedTs);
        if($this->db->execute()){
            $Id = $this->db->insertId();
            return $Id;
        }
        else {
            return false;
        }
    }

        public function updateAttendence($userId,$endTime,$lastUpdatedBy,$lastUpdatedTs){
        $this->db->query(' UPDATE attendence SET finish_time=:endTime ,last_updated_ts=:lastUpdatedTs ,last_updated_by=:lastUpdatedBy WHERE user_id = :userId ');
        $this->db->bind(':userId', $userId);
        $this->db->bind(':endTime', $endTime);
        $this->db->bind(':lastUpdatedBy', $lastUpdatedBy);
        $this->db->bind(':lastUpdatedTs', $lastUpdatedTs);
        if($this->db->execute()){
            $Id = $this->db->insertId();
            return $Id;
        }
        else {
            return false;
        }

        }
    
        public function getAssignJobToMe($userId){
        $this->db->query(' SELECT st.subtask_id, st.subtask_name,e.first_name,s.status_desc FROM sub_task_details st,employee_detail e,status s WHERE st.assigned_by = e.employee_id   AND st.status_id = s.status_id AND st.assign_to = :userId AND st.status_id = "300" ');
        $this->db->bind(':userId', $userId);
        $row = $this->db->resultSet();
        // print_r($row);
        return $row; 
        }

    public function getAssignJobToMePending($userId){
        $this->db->query(' SELECT st.subtask_id, st.subtask_name,e.first_name,s.status_desc FROM sub_task_details st,employee_detail e,status s WHERE st.assigned_by = e.employee_id AND st.status_id = s.status_id AND st.assign_to =:userId AND st.status_id = "310" ');
        $this->db->bind(':userId', $userId);
        $row = $this->db->resultSet();
        // print_r($row);
        return $row;
    }

    public function getAssignJobToMeHoldCancel($userId){
        $this->db->query(' SELECT st.subtask_id, st.subtask_name,e.first_name,s.status_desc FROM sub_task_details st,employee_detail e,status s WHERE st.assigned_by = e.employee_id AND st.status_id = s.status_id AND st.assign_to =:userId AND (st.status_id = "330" OR st.status_id = "350")');
        $this->db->bind(':userId', $userId);
        $row = $this->db->resultSet();
        // print_r($row);
        return $row;
    }

    public function getAssignJobToMecomplete($userId){
        $this->db->query(' SELECT st.subtask_id, st.subtask_name,e.first_name,s.status_desc FROM sub_task_details st,employee_detail e,status s WHERE st.assigned_by = e.employee_id AND st.status_id = s.status_id AND st.assign_to =:userId AND st.status_id = "340" ');
        $this->db->bind(':userId', $userId);
        $row = $this->db->resultSet();
        // print_r($row);
        return $row;
    }
    public function getAssignTaskToUser($userId){
        $this->db->query(' SELECT td.task_id,td.task_name,s.status_desc,ed.first_name,td.due_date,td.reminder_day FROM task_details td , employee_detail ed,status s WHERE ed.employee_id = td.assigned_to AND td.status_id=s.status_id AND ed.employee_id =:userId AND (td.status_id = "300" OR td.status_id = "310" ) ');
        $this->db->bind(':userId', $userId);
        $row = $this->db->resultSet();
        // print_r($row);
        return $row; 
    }

    public function insertSubTask($task_id,$task_name,$due_date,$assignto,$status,$assigned_by,$createdTs,$createdBy,$lastUpdatedTs,$lastUpdatedBy){
        $this->db->query(' INSERT INTO sub_task_details(subtask_id, subtask_name, assigned_by, assign_to, status_id,'
                .        ' task_id, due_date, created_ts, created_by, last_updated_ts, last_updated_by) '
                .        ' VALUES (0,:task_name,:assigned_by,:assignto,:status,:task_id,:due_date,:createdTs, '
                .        ' :createdBy,:lastUpdatedTs,:lastUpdatedBy)');
        $this->db->bind(':task_id', $task_id);
        $this->db->bind(':task_name', $task_name);
        $this->db->bind(':due_date', $due_date);
        $this->db->bind(':assignto', $assignto);
        $this->db->bind(':status', $status);
        $this->db->bind(':assigned_by', $assigned_by);
        $this->db->bind(':createdBy', $createdBy);
        $this->db->bind(':createdTs', $createdTs);
        $this->db->bind(':lastUpdatedBy', $lastUpdatedBy);
        $this->db->bind(':lastUpdatedTs', $lastUpdatedTs);
        if($this->db->execute()){
            $Id = $this->db->insertId();
            return $Id;
        }
        else {
            return false;
        }
    }

    public function getSubtaskById($Id){
        $this->db->query(' SELECT st.subtask_id,st.subtask_name, st.assigned_by,st.status_id,s.status_desc FROM sub_task_details st,status s WHERE st.subtask_id = :id AND st.status_id= s.status_id ');
        $this->db->bind(':id', $Id);
        $row = $this->db->single();
        // print_r($row);
        return $row;
    }

    public function getTaskDetailToEmployee($task_id){
        $this->db->query(' SELECT td.task_id,td.task_name,td.due_date,s.status_desc,td.status_id,p.project_name,c.client_name,td.created_ts FROM task_details td,status s,project_details p,client_details c WHERE td.task_id = :task_id AND s.status_id = td.status_id AND td.project_id = p.project_id AND p.client_id = c.client_id');
        $this->db->bind(':task_id', $task_id);
        $row = $this->db->single();
        // print_r($row);
        return $row;  
    }

    public function updateSubtask($Id,$status,$lastUpdatedBy,$lastUpdatedTs){
        $this->db->query(' UPDATE sub_task_details SET status_id=:status,last_updated_ts=:lastUpdatedTs,last_updated_by=:lastUpdatedBy WHERE subtask_id = :id ');
        $this->db->bind(':id', $Id);
        $this->db->bind(':status', $status);
        $this->db->bind(':lastUpdatedBy', $lastUpdatedBy);
        $this->db->bind(':lastUpdatedTs', $lastUpdatedTs);
        if($this->db->execute()){
            $Id = $this->db->insertId();
            return $Id;
        }
        else {
            return false;
        }
    }

    public function getAllEmplyee($user){
        $this->db->query(' SELECT employee_id,first_name, last_name FROM employee_detail WHERE employee_id != :user ');
        $this->db->bind(':user', $user);
        $row = $this->db->resultSet();
        // print_r($row);
        return $row; 
    }

    public function getSubTaskAssignTo($userId){
        $this->db->query(' SELECT std.subtask_id,std.subtask_name,std.due_date,ed.first_name,std.created_ts,s.status_desc FROM sub_task_details std,employee_detail ed,status s WHERE std.assigned_by =:userId AND  std.assign_to =ed.employee_id AND std.status_id = s.status_id ');
        $this->db->bind(':userId', $userId);
        $row = $this->db->resultSet();
        // print_r($row);
        return $row;
    }

    public function getCancelHoldTask($userId){
        $this->db->query('SELECT td.task_id,td.task_name FROM task_details td,employee_detail ed WHERE ed.employee_id =:userId AND td.assigned_to = ed.employee_id AND (status_id = "350" OR status_id = "330")  ');
        $this->db->bind(':userId', $userId);
        $row = $this->db->resultSet();
        // print_r($row);
        return $row; 
    }

    public function getCompletedTask($userId){
        $this->db->query(' SELECT td.task_id,td.task_name FROM task_details td,employee_detail ed WHERE  ed.employee_id =:userId AND td.assigned_to = ed.employee_id AND status_id ="340"');
        $this->db->bind(':userId', $userId);
        $row = $this->db->resultSet();
        // print_r($row);
        return $row; 
    }

    public function updatedStatus($task_id,$status,$lastUpdatedBy,$lastUpdatedTs){
        $this->db->query(' UPDATE task_details SET status_id=:status,last_updated_by=:lastUpdatedBy,last_updated_ts=:lastUpdatedTs WHERE task_id =:taskId');
        $this->db->bind(':taskId', $task_id);
        $this->db->bind(':status', $status);
        $this->db->bind(':lastUpdatedBy', $lastUpdatedBy);
        $this->db->bind(':lastUpdatedTs', $lastUpdatedTs);
        if($this->db->execute()){
            $Id = $this->db->insertId();
            return $Id;
        }
        else {
            return false;
        }
    }

    public function updateHoldCancelReason($task_id,$reason,$status,$lastUpdatedBy,$lastUpdatedTs){
        $this->db->query(' UPDATE task_details SET 	reason=:reason,status_id=:status,last_updated_by=:lastUpdatedBy,last_updated_ts=:lastUpdatedTs WHERE task_id =:taskId ');
        $this->db->bind(':taskId', $task_id);
        $this->db->bind(':reason', $reason);
        $this->db->bind(':status', $status);
        $this->db->bind(':lastUpdatedBy', $lastUpdatedBy);
        $this->db->bind(':lastUpdatedTs', $lastUpdatedTs);
        if($this->db->execute()){
            $Id = $this->db->insertId();
            return $Id;
        }
        else {
            return false;
        }
    }
    public function getempdetails($userId){
        $this->db->query(' SELECT ed.employee_id, ed.first_name, ed.last_name, ed.email,ed.image, u.login_id,u.password FROM employee_detail ed,user u WHERE ed.employee_id=u.login_id and employee_id=:employee_id ');
        $this->db->bind(':employee_id', $userId);
        $row = $this->db->single();
        // print_r($row);
        return $row; 
    }
    public function updateEmpDetails($empId,$firstName,$lastName,$email,$lastUpdatedTs,$image){
        $this->db->query(' UPDATE employee_detail ed,user u SET ed.first_name=:first_name,ed.last_name=:last_name,ed.email=:email,ed.last_updated_ts=:last_updated_ts,image=:image WHERE ed.employee_id=u.login_id and ed.employee_id=:employee_id ');
        $this->db->bind(':employee_id', $empId);
        $this->db->bind(':first_name', $firstName);
        $this->db->bind(':last_name', $lastName);
        $this->db->bind(':email', $email);
        // $this->db->bind(':password', $password);
        $this->db->bind(':last_updated_ts', $lastUpdatedTs);
        $this->db->bind(':image', $image);
        if($this->db->execute()){
            $empId = $this->db->insertId();
            return true;
        }
        else {
            return false;
        }
    }
}
?>

