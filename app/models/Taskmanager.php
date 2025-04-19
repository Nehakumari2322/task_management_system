<?php

class taskmanager {
    private $db;

    public function __construct() {
    
        $this->db = new Database;
    }


    public function insertMasterTaskList($task_name,$createdTs,$createdBy){
        $this->db->query(' INSERT INTO mast_task_list(master_task_id, name, created_ts, created_by) '
                    .    ' VALUES (0,:name,:created_ts,:created_by)');
        $this->db->bind(':name',$task_name);
        $this->db->bind(':created_by', $createdBy);
        $this->db->bind(':created_ts',$createdTs);
        if($this->db->execute()){
            $id = $this->db->insertId();
            return  $id;
            // return true;
        }
        else {
            return false;
        }
    }

   
    public function getMasterTaskList(){
        $this->db->query(' SELECT master_task_id, name FROM mast_task_list WHERE 1 = 1 ');
        $row = $this->db->resultSet();
        return $row; 
    }

    public function getCategoryById(){
        $this->db->query(' SELECT c.category_id,c.category_name '
                        .' FROM category c '
                        .' WHERE 1=1 ');
        $row = $this->db->resultSet();
        // print_r($row);
        return $row;   
    }   
    public function getSubcategoryById(){
        $this->db->query(' SELECT c.category_id,c.category_name,s.subcategory_id,s.subcategory_name '
                        .' FROM category c,subcategory s '
                        .' WHERE c.category_id=s.category_id ');
        $row = $this->db->resultSet();
    // print_r($row);
    return $row;    
    }
//---------------------------------------show in dashboard--------------------------------------------------------------
public function showProjectDetails($projectId){
    // echo "showEmployeeDetailsInTable";
    $this->db->query(' SELECT c.client_name,p.project_id, p.project_name, p.client_id, p.category_id,p.description, start_date, end_date, s.status_desc, p.status_id, deal_id ,p.assigned_by  FROM client_details c,project_details p,status s WHERE p.project_id = 
    :project_id And p.status_id =s.status_id AND p.client_id = c.client_id; ');
    $this->db->bind(':project_id',$projectId);
    $row = $this->db->single();
    // print_r($row);
    return $row;    
    }
    public function showProjectDetailsInTable(){
    // echo "showEmployeeDetailsInTable";
    $this->db->query(' SELECT  c.client_id,c.client_name,p.project_id, p.project_name, p.client_id, p.category_id, p.start_date, p.end_date, s.status_desc, p.deal_id , p.status_id FROM client_details c,project_details p ,status s WHERE c.client_id = p.client_id 
    AND p.status_id = s.status_id ORDER BY   p.project_name ASC');
    $row = $this->db->resultSet();
    // print_r($row);
    return $row;    
    }

    public function getSubTaskByTaskId($projectId){
        $this->db->query('SELECT st.subtask_id,st.subtask_name,st.due_date,st.assign_to,st.status_id,s.status_desc,e.first_name FROM sub_task_details st,task_details t,project_details p,status s,employee_detail e WHERE st.task_id = t.task_id AND t.project_id = p.project_id AND t.project_id = :project_id AND st.status_id = s.status_id AND e.employee_id = st.assign_to;');
        $this->db->bind(':project_id',$projectId);
        $row = $this->db->resultSet();
        // print_r($row);
        return $row; 
    }

    public function showStartedProjectDetailsInTable(){
        // echo "showEmployeeDetailsInTable";
        $this->db->query(' SELECT  c.client_id,c.client_name,p.project_id, p.project_name, p.client_id, p.category_id, p.start_date, p.end_date, s.status_desc, p.deal_id , p.status_id FROM client_details c,project_details p ,status s WHERE c.client_id = p.client_id AND p.status_id = "210" AND p.status_id = s.status_id ORDER BY  p.project_name ASC');
        $row = $this->db->resultSet();
        // print_r($row);
        return $row;    
    }
    public function showOnHoldProjectDetailsInTable(){
            // echo "showEmployeeDetailsInTable";
            $this->db->query('  SELECT  c.client_id,c.client_name,p.project_id, p.project_name, p.client_id, p.category_id, p.start_date, p.end_date, s.status_desc, p.deal_id , p.status_id FROM client_details c,project_details p ,status s WHERE c.client_id = p.client_id AND p.status_id = "230" AND p.status_id = s.status_id ORDER BY  p.project_name ASC ');
            $row = $this->db->resultSet();
            // print_r($row);
            return $row;    
    }
    public function showCompletedProjectDetailsInTable(){
        // echo "showEmployeeDetailsInTable";
        $this->db->query('  SELECT  c.client_id,c.client_name,p.project_id, p.project_name, p.client_id, p.category_id, p.start_date, p.end_date, s.status_desc, p.deal_id , p.status_id FROM client_details c,project_details p ,status s WHERE c.client_id = p.client_id AND p.status_id = "240" AND p.status_id = s.status_id ORDER BY  p.project_name ASC ');
        $row = $this->db->resultSet();
        // print_r($row);
        return $row;    
        }
    public function getProjectById(){
            // echo "showEmployeeDetailsInTable";
            $this->db->query(' SELECT project_id,project_name FROM project_details  '
                            .' WHERE 1=1  ');
            $row = $this->db->resultSet();
            // print_r($row);
            return $row;    
    }
    public function getClientById(){
        // echo "showEmployeeDetailsInTable";
        $this->db->query(' SELECT client_id,client_name  FROM client_details '
                        .' WHERE 1=1  ');
        $row = $this->db->resultSet();
        // print_r($row);
        return $row;    
}
//-----------------------------------------------------------------------------------------------------
//-------------------profile start-----
public function getprofileDetails($name,$email,$phone,$address,$pincode,$address_line_1,$address_line_2,$city,$state,$country,$createdBy,$createdTs,$lastUpdatedBy,$lastUpdatedTs){
    // echo ' Inside insertApplicant';
    $this->db->query('INSERT INTO profile(id,name,email,phone,address,pincode,address_line_1, '
                    .' address_line_2,city,state,country,created_by,created_ts,last_updated_by,last_updated_ts) '
                    .' VALUES (0,:name,:email,:phone,:address,:pincode,:address_line_1,:address_line_2,:city, '
                    .' :state,:country,:created_by,:created_ts,:last_updated_by,:last_updated_ts) ');
               
    $this->db->bind(':name',$name);
    $this->db->bind(':email', $email);
    $this->db->bind(':phone',$phone);
    $this->db->bind(':address',$address);
    $this->db->bind(':pincode',$pincode);
    $this->db->bind(':address_line_1',$address_line_1);
    $this->db->bind(':address_line_2',$address_line_2);
    $this->db->bind(':city',$city);
    $this->db->bind(':state',$state);                 
    $this->db->bind(':country',$country);
    $this->db->bind(':created_by', $createdBy);
    $this->db->bind(':created_ts',$createdTs);
    $this->db->bind(':last_updated_by',$lastUpdatedBy);
    $this->db->bind(':last_updated_ts',$lastUpdatedTs);
    // $this->db->bind(':last_update_ts',$last_update_ts);
    // $this->db->bind(':created_by', $created_by);
   
    if($this->db->execute()){
        $id = $this->db->insertId();
        // return  $id;
        return true;
    }
    else {
        return false;
    }
}
//-------------------profile end--------------------------------------------------------------------------------------
//-----------------------------------------for client page------------------------------------------------------------

public function insertclientDetails($categoryId,$clientName,$email,$phone,$status,$address,$pincode,$address_line_1,$address_line_2,
$city,$state,$POCName,$POCPhone,$POCdesignation,$incorporationType,$createdBy,$createdTs,$lastUpdatedBy,$lastUpdatedTs){
        // echo ' Inside insertApplicant';
        $this->db->query('INSERT INTO client_details(client_id,category_id,incorporation_type_id,client_name,email,phone,status_id,address,pincode,address_line_1, '
                        .' address_line_2,city,state,POC_name,POC_phone,POC_designation,created_by,created_ts,last_updated_by,last_updated_ts) '
                        .' VALUES (0,:category_id,:incorporationType,:client_name,:email,:phone,:status,:address,:pincode,:address_line_1,:address_line_2,:city, '
                        .' :state,:POC_name,:POC_phone,:POC_designation,:created_by,:created_ts,:last_updated_by,:last_updated_ts) ');
        $this->db->bind(':category_id',$categoryId);                 
        $this->db->bind(':client_name',$clientName);
        $this->db->bind(':incorporationType',$incorporationType);
        $this->db->bind(':email', $email);
        $this->db->bind(':phone',$phone);
        $this->db->bind(':status', $status);
        $this->db->bind(':address',$address);
        $this->db->bind(':pincode',$pincode);
        $this->db->bind(':address_line_1',$address_line_1);
        $this->db->bind(':address_line_2',$address_line_2);
        $this->db->bind(':city',$city);
        $this->db->bind(':state',$state);                 
        $this->db->bind(':POC_name',$POCName);
        $this->db->bind(':POC_phone', $POCPhone);
        $this->db->bind(':POC_designation',$POCdesignation);
        $this->db->bind(':created_by', $createdBy);
        $this->db->bind(':created_ts',$createdTs);
        $this->db->bind(':last_updated_by',$lastUpdatedBy);
        $this->db->bind(':last_updated_ts',$lastUpdatedTs);
        // $this->db->bind(':last_update_ts',$last_update_ts);
        // $this->db->bind(':created_by', $created_by);
       
        if($this->db->execute()){
            $clientId = $this->db->insertId();
            return $clientId;
        }
        else {
            return false;
        }
    }

    public function getAssignTaskToExecutive(){
        $this->db->query(' SELECT td.task_id,td.task_name,s.status_desc,ed.first_name,td.due_date,td.reminder_day FROM task_details td , employee_detail ed,status s WHERE ed.employee_id= td.assigned_to AND td.status_id=s.status_id  ');
        $row = $this->db->resultSet();
        return $row;
    }

    public function getTaskById($Id){
        $this->db->query(' SELECT t.task_id,t.task_name,t.reminder_day,t.due_date,t.assigned_to,t.status_id,t.assigned_by,e.first_name,s.status_desc, e.employee_id FROM task_details t, employee_detail e,status s WHERE task_id = :id AND e.employee_id = t.assigned_to AND s.status_id = t.status_id ');
        $this->db->bind(':id',$Id);
        $row = $this->db->single();
        return $row;
    }

    public function getClientTask($clientId){
        $this->db->query(' SELECT t.task_id,t.project_id,t.task_name,t.assigned_to,t.status_id,t.due_date,p.project_name,s.status_desc,e.first_name,e.last_name FROM task_details t,project_details p,status s,employee_detail e WHERE t.project_id = p.project_id AND p.client_id = :clientId  AND s.status_id = t.status_id AND e.employee_id = t.assigned_to ORDER BY project_name ASC ');
        $this->db->bind(':clientId',$clientId);
        $row = $this->db->resultSet();
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
    public function getClientProjectTask($clientId,$projectId){
        $this->db->query(' SELECT t.task_id,t.project_id,t.task_name,t.assigned_to,t.status_id,t.due_date,p.project_name,s.status_desc,e.first_name,e.last_name FROM task_details t,project_details p,status s,employee_detail e WHERE t.project_id = p.project_id AND p.client_id = :clientId  AND t.project_id = :projectId AND s.status_id = t.status_id AND e.employee_id = t.assigned_to ORDER BY project_name ASC ');
        $this->db->bind(':clientId',$clientId);
        $this->db->bind(':projectId',$projectId);
        $row = $this->db->resultSet();
        return $row;
    }

    public function getclientNameById($clientId){
        $this->db->query(' SELECT client_id,client_name FROM client_details WHERE client_id = :clientId ');
        $this->db->bind(':clientId',$clientId);
        $row = $this->db->single();
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

    public function insertDefaultProject($clientId,$projectName,$categoryId,$start_date,$end_date,$statusId,$assignedBy,$createdTs,$createdBy, $lastUpdatedTs,$lastUpdatedBy){
        $this->db->query(' INSERT INTO project_details(project_id, project_name, client_id, category_id, '
                .        ' start_date, end_date , assigned_by, status_id,created_by, created_ts, '
                .        ' last_updated_by, last_updated_ts) VALUES (0,:projectName,:clientId,:categoryId, '
                .        ' :start_date,:end_date,:assignedBy,:statusId,:created_by,:created_ts,:last_updated_by,'
                .        ' :last_updated_ts)');
        $this->db->bind(':categoryId',$categoryId);
        $this->db->bind(':projectName', $projectName);
        $this->db->bind(':start_date',$start_date);
        $this->db->bind(':statusId', $statusId);
        $this->db->bind(':end_date',$end_date);
        $this->db->bind(':assignedBy',$assignedBy);                 
        $this->db->bind(':clientId',$clientId);
        $this->db->bind(':created_by', $createdBy);
        $this->db->bind(':created_ts',$createdTs);
        $this->db->bind(':last_updated_by',$lastUpdatedBy);
        $this->db->bind(':last_updated_ts',$lastUpdatedTs);
        if($this->db->execute()){
            $projectId = $this->db->insertId();
            return $projectId;
        }
        else {
            return false;
        }
    }

    public function getRecurringTaskAssignToGivenUser($emp_id){
        $this->db->query(' SELECT t.task_id,t.project_id,t.task_name,t.reminder_day,t.assigned_to,t.incorporation_type_id,t.status_id, p.project_name,p.client_id,c.client_name,e.first_name,e.last_name,s.status_desc,ic.name FROM task_details t,project_details p,client_details c,employee_detail e,status s,incorporation_type ic WHERE assigned_to =:emp_id AND t.project_id = p.project_id AND c.client_id=p.client_id AND e.employee_id= t.assigned_to AND s.status_id = t.status_id AND ic.id = t.incorporation_type_id ');
        $this->db->bind(':emp_id', $emp_id);
        $row = $this->db->resultSet();
        return $row;
    }
  
    public function showTaskAssignUser(){
        $this->db->query(' SELECT t.task_id,t.project_id,t.task_name,t.reminder_day,t.due_date,t.assigned_to,t.incorporation_type_id,t.status_id, p.project_name,p.client_id,c.client_name,e.first_name,e.last_name,s.status_desc,ic.name FROM task_details t,project_details p,client_details c,employee_detail e,status s,incorporation_type ic WHERE t.project_id = p.project_id AND c.client_id=p.client_id AND e.employee_id= t.assigned_to AND s.status_id = t.status_id AND ic.id = t.incorporation_type_id ');
        $row = $this->db->resultSet();
        return $row;
    }
    public function showActiveclientDetailsInTable(){
        $this->db->query(' SELECT cd.client_id,cd.client_name,cd.email,cd.address,s.status_desc FROM client_details cd , status s WHERE s.status_id= cd.status_id AND s.status_id= "20" ORDER BY cd.client_name ');
        $row = $this->db->resultSet();
        return $row;    
    }

    public function showInactiveclientDetailsInTable(){
        $this->db->query(' SELECT cd.client_id,cd.client_name,cd.email,cd.address,s.status_desc FROM client_details cd , status s WHERE s.status_id= cd.status_id AND s.status_id= "30" ORDER BY cd.client_name ');
        $row = $this->db->resultSet();
        return $row;    
    }

    public function showAllclientDetailsInTable(){
        $this->db->query(' SELECT cd.client_id,cd.client_name,cd.email,cd.address,s.status_desc FROM client_details cd , status s WHERE s.status_id= cd.status_id AND (s.status_id= "30" OR s.status_id= "20")  ORDER BY cd.client_name ');
        $row = $this->db->resultSet();
        return $row;    
    }

    public function showclientDetailsInTable(){
        $this->db->query(' SELECT cd.client_id,cd.client_name,cd.email,cd.address,s.status_desc FROM client_details cd , status s WHERE s.status_id= cd.status_id  ORDER BY cd.client_name ');
        $row = $this->db->resultSet();
        return $row;    
    }



    public function getAllEmpolyee(){
        $this->db->query(' SELECT * FROM employee_detail WHERE 1 = 1 ');
        $row = $this->db->resultSet();
        return $row;
    }
  
    
    public function insertRelationWithClient($Id,$clientId,$createdTs,$createdBy){
        $this->db->query(' INSERT INTO recurring_relation(id, task_id, client_id, created_ts, created_by) '
                    .    ' VALUES (0,:Id,:client_id,:created_ts,:created_by)');
        $this->db->bind(':client_id',$clientId);
        $this->db->bind(':Id',$Id);
        $this->db->bind(':created_by', $createdBy);
        $this->db->bind(':created_ts',$createdTs);
        
        if($this->db->execute()){
            $Id = $this->db->insertId();
            return  $Id;
        }
        else {
            return false;
        }               
    }

    public function editClientDetails($clientId){
        // echo "showclientDetailsInTable";
        $this->db->query(' SELECT c.client_id,c.client_name,c.email,c.address,c.address_line_1,c.address_line_2,c.city,c.state,c.pincode,c.phone,c.POC_name,c.POC_phone,c.POC_phone,c.POC_designation,s.status_desc,c.status_id FROM client_details c,status s  WHERE client_id=:client_id AND c.status_id = s.status_id');
         $this->db->bind(':client_id',$clientId);
         $row = $this->db->single();
        // print_r($row);
        return $row;    
    }
    public function delete($clientId){
        $this->db->query(' DELETE FROM client_details '
                        .' WHERE client_id = :client_id ');
        $this->db->bind(':client_id',$clientId);
        if($this->db->execute()){
            return true;
        }
            return false;    
    }
    

    public function updateClientDetails($clientId,$clientName,$email,$phone,$status,$address,$pincode,$address_line_1,$address_line_2,$city,$state,$POCName, $POCPhone,$POCdesignation,$lastUpdatedBy,$lastUpdatedTs){
    $this->db->query(' UPDATE client_details SET client_name=:client_name,email=:email,phone=:phone,status_id=:status,address=:address,pincode=:pincode, '
            .' address_line_1=:address_line_1,address_line_2=:address_line_2,city=:city,state=:state,POC_name=:POC_name,POC_phone=:POC_phone, '
            .' POC_designation=:POC_designation,last_updated_by=:last_updated_by,last_updated_ts=:last_updated_ts '
            .' WHERE client_id=:client_id ');
    $this->db->bind(':client_id',$clientId);
    $this->db->bind(':client_name',$clientName);
    $this->db->bind(':email',$email);
    $this->db->bind(':phone',$phone);
    $this->db->bind(':status',$status);
    $this->db->bind(':address',$address);
    $this->db->bind(':pincode',$pincode);
    $this->db->bind(':address_line_1',$address_line_1);
    $this->db->bind(':address_line_2',$address_line_2);    
    $this->db->bind(':city',$city);
    $this->db->bind(':state',$state);
    $this->db->bind(':POC_name',$POCName);
    $this->db->bind(':POC_phone',$POCPhone);
    $this->db->bind(':POC_designation',$POCdesignation);
    $this->db->bind(':last_updated_by',$lastUpdatedBy);
    $this->db->bind(':last_updated_ts',$lastUpdatedTs);

    if($this->db->execute()){
        return true;
    }
        return false;    
    }

    public function getClientProjectDetails($clientId){
        $this->db->query(' SELECT p.project_id, p.project_name, p.client_id, c.client_name,p.category_id, p.subcategory_id, p.start_date, '
                        .' p.end_date, p.status,p.deal_id, p.created_by, p.created_ts FROM project_details p,client_details c '
                        .' WHERE c.client_id=p.client_id AND p.client_id=:client_id ');
        $this->db->bind(':client_id',$clientId);
        $row = $this->db->resultset();
        // print_r($row);
        return $row;
    }
//----------------------------------------------for client page--------------------------------------------------------------

//----------------------------------------------for employee page start--------------------------------------------------------------
public function putemplyeeDetails($fname,$lname,$image,$email,$phone,$status,$DOJ,$role,$designation,$Ephone,$gender,$bloodGrp,$address,$pincode,$address_line_1,$address_line_2,$city,$state,$createdBy,$createdTs,$lastUpdatedBy,$lastUpdatedTs){
        // echo ' Inside insertApplicant';
        $this->db->query('INSERT INTO employee_detail(employee_id,first_name,last_name,image,email,phone,status,date_of_joining,role,designation, ' 
                        .' emergency_phone,gender,blood_group,address,pincode,address_line_1,address_line_2,city,state,created_by, '
                        .' created_ts,last_updated_by,last_updated_ts) '       
                        .' VALUES (0,:first_name,:last_name,:image,:email,:phone,:status,:date_of_joining,:role,:designation,:emergency_phone, '
                        .' :gender,:blood_group,:address,:pincode,:address_line_1,:address_line_2,:city,:state,:created_by,:created_ts, '
                        .' :last_updated_by,:last_updated_ts) ');
                       
        $this->db->bind(':first_name',$fname);
        $this->db->bind(':last_name',$lname);
        $this->db->bind(':image',$image);
        $this->db->bind(':email',$email);
        $this->db->bind(':phone',$phone);
        $this->db->bind(':status', $status);
        $this->db->bind(':date_of_joining',$DOJ);
        $this->db->bind(':role', $role);
        $this->db->bind(':designation',$designation);
        $this->db->bind(':emergency_phone',$Ephone);
        $this->db->bind(':gender',$gender);
        $this->db->bind(':blood_group',$bloodGrp);
        $this->db->bind(':address',$address);
        $this->db->bind(':pincode',$pincode);
        $this->db->bind(':address_line_1',$address_line_1);
        $this->db->bind(':address_line_2',$address_line_2);
        $this->db->bind(':city',$city);
        $this->db->bind(':state',$state);                 
        $this->db->bind(':created_by', $createdBy);
        $this->db->bind(':created_ts',$createdTs);
        $this->db->bind(':last_updated_by',$lastUpdatedBy);
        $this->db->bind(':last_updated_ts',$lastUpdatedTs);
        // $this->db->bind(':last_update_ts',$last_update_ts);
        // $this->db->bind(':created_by', $created_by);
       
        if($this->db->execute()){
            $employeeId = $this->db->insertId();
            return   $employeeId;
            // return true;
        }
        else {
            return false;
        }
    }

    public function getProjectByIncorporate($incorporationType){
        $this->db->query(' SELECT cd.client_id, pd.project_id,pd.project_name FROM client_details cd , project_details pd WHERE incorporation_type_id = :incorporationType AND pd.client_id = cd.client_id ');
        $this->db->bind(':incorporationType',$incorporationType);
        $row = $this->db->resultSet();
        return $row; 
    }

    public function getIncorporationType(){
        $this->db->query(' SELECT * FROM incorporation_type WHERE 1 = 1 ');
        $row = $this->db->resultSet();
        return $row; 
    }

    public function updatereassignto($taskid,$reassign,$lastUpdatedTs,$lastUpdateBy){
        $this->db->query(' UPDATE task_details SET assigned_to=:reassign,last_updated_by=:lastUpdatedTs,last_updated_ts=:lastUpdateBy '
                    .    ' WHERE task_id =:taskid');
        $this->db->bind(':taskid',$taskid); 
        $this->db->bind(':reassign',$reassign);                
        $this->db->bind(':lastUpdateBy',$lastUpdateBy);
        $this->db->bind(':lastUpdatedTs',$lastUpdatedTs);
        
        if($this->db->execute()){
            return true;
        }
            return false;    
    }
    

    public function showEmployeeDetailsInTable(){
    // echo "showEmployeeDetailsInTable";
    $this->db->query(' SELECT e.employee_id,e.first_name,e.last_name,e.email,e.date_of_joining,e.role,e.designation,e.phone,e.gender,e.emergency_phone,e.blood_group,e.status,e.address,e.address_line_1,e.address_line_2,e.city,e.state,e.pincode,u.password FROM employee_detail e,user u WHERE u.login_id= e.employee_id ');
    $row = $this->db->resultSet();
    // print_r($row);
    return $row;    
    }

    public function updatepassword($employeeId,$password){
        // echo"fdv".$password.$employeeId;
        $this->db->query(' UPDATE user SET password=:password WHERE login_id = :employeeId ');
        $this->db->bind(':employeeId',$employeeId);                
        $this->db->bind(':password',$password);
        if($this->db->execute()){
            return true; 
        }
            return false;
    }

    public function getClientProject($clientId){
        $this->db->query(' SELECT p.client_id ,p.project_id,p.project_name,p.start_date,p.end_date,p.status_id,s.status_desc FROM project_details p,client_details c,status s WHERE p.client_id = c.client_id AND c.client_id =:clientId AND s.status_id = p.status_id ');
        $this->db->bind(':clientId',$clientId);
        $row = $this->db->resultSet();
        // print_r($row);
        return $row; 
    }
    public function editEmployeeDetails($employeeId){
        // echo "showclientDetailsInTable";
        $this->db->query(' SELECT * FROM employee_detail e,user u WHERE employee_id=:employee_id AND e.employee_id = u.login_id; ');
        $this->db->bind(':employee_id',$employeeId);
        $row = $this->db->single();
        // print_r($row);
        return $row;    
    }
    public function deleteEmployeeDetails($employeeId){
        $this->db->query(' DELETE FROM employee_detail '
                        .' WHERE employee_id=:employee_id ');
        $this->db->bind(':employee_id',$employeeId);
        if($this->db->execute()){
            return true;
        }
            return false;    
    }


    public function updateEmployeeDetails($employeeId,$email,$phone,$status,$DOJ,$role,$designation,$Ephone,$gender,$bloodGrp,$address,$pincode,$address_line_1,$address_line_2,$city,$state,$lastUpdatedBy,$lastUpdatedTs){
    $this->db->query(' UPDATE employee_detail SET email=:email,phone=:phone, '
            .' status=:status,date_of_joining=:date_of_joining,role=:role,designation=:designation, ' 
            .' emergency_phone=:emergency_phone,gender=:gender,blood_group=:blood_group,address=:address,pincode=:pincode, '
            .' address_line_1=:address_line_1,address_line_2=:address_line_2,city=:city,state=:state, '
            .' last_updated_by=:last_updated_by,last_updated_ts=:last_updated_ts '
            .' WHERE employee_id=:employee_id ');
            $this->db->bind(':employee_id',$employeeId);
            $this->db->bind(':email',$email);
            $this->db->bind(':phone',$phone);
            $this->db->bind(':status',$status);
            $this->db->bind(':date_of_joining',$DOJ);
            $this->db->bind(':role', $role);
            $this->db->bind(':designation',$designation);
            $this->db->bind(':emergency_phone',$Ephone);
            $this->db->bind(':gender',$gender);
            $this->db->bind(':blood_group',$bloodGrp);
            $this->db->bind(':address',$address);
            $this->db->bind(':pincode',$pincode);
            $this->db->bind(':address_line_1',$address_line_1);
            $this->db->bind(':address_line_2',$address_line_2);
            $this->db->bind(':city',$city);
            $this->db->bind(':state',$state);                 
            $this->db->bind(':last_updated_by',$lastUpdatedBy);
            $this->db->bind(':last_updated_ts',$lastUpdatedTs);

    if($this->db->execute()){
        return true;
    }
        return false;    
    }
//----------------------------------------------for employee page end--------------------------------------------------------------

//-----------------------------------------for project page start------------------------------------------------------------
            


public function insertRecuringTask($taskName,$projectId,$dueDate,$reminderDay,$assignedTo,$assignedBy,$status_id,$incorporationType,$createdBy,$createdTs,$lastUpdatedBy,$lastUpdatedTs){
    // echo ' Inside putProjectDetails';
    $this->db->query('INSERT INTO task_details(task_id, project_id, task_name, due_date, reminder_day, assigned_to, '   
                .    ' assigned_by, incorporation_type_id,status_id, created_by, created_ts, last_updated_by, '
                .    ' last_updated_ts)  VALUES (0,:project_id,:taskName,:dueDate,:reminderDay,:assignedTo, '
                .    ' :assigned_by,:incorporationType,:status,:created_by, :created_ts, :last_updated_by, '
                .    ' :last_updated_ts) ');
                    
    $this->db->bind(':taskName',$taskName);
    $this->db->bind(':project_id',$projectId);
    $this->db->bind(':dueDate',$dueDate);
    $this->db->bind(':reminderDay', $reminderDay);
    $this->db->bind(':assignedTo',$assignedTo);
    $this->db->bind(':assigned_by', $assignedBy);
    $this->db->bind(':incorporationType', $incorporationType);
    $this->db->bind(':status',$status_id);               
    $this->db->bind(':created_by', $createdBy);
    $this->db->bind(':created_ts',$createdTs);
    $this->db->bind(':last_updated_by',$lastUpdatedBy);
    $this->db->bind(':last_updated_ts',$lastUpdatedTs);
   
    if($this->db->execute()){
        $Id = $this->db->insertId();
        return $Id;
    }
    else {
        return false;
    }
}

public function insertEmployeePassword($employeeId,$password,$rol,$createdTs){
    $this->db->query(' INSERT INTO user(id, login_id, password, role, created_ts, last_login_ts) '
                .    ' VALUES (0,:employeeId,:password,:rol,:created_ts,:last_login_ts) ');
    $this->db->bind(':employeeId', $employeeId);
    $this->db->bind(':password',$password);               
    $this->db->bind(':rol', $rol);
    $this->db->bind(':created_ts',$createdTs);
    $this->db->bind(':last_login_ts',$createdTs);  
    if($this->db->execute()){
        $Id = $this->db->insertId();
        return $Id;
    }
    else {
        return false;
    }          
}

public function editProjectDetails($projectId){
// echo "showclientDetailsInTable";
$this->db->query(' SELECT p.project_id,p.project_name,p.start_date,p.end_date,s.status_desc,s.status_id FROM project_details p,status s '
        .        ' WHERE p.project_id=:projectId AND p.status_id= s.status_id');
 $this->db->bind(':projectId',$projectId);
 $row = $this->db->single();
// print_r($row);
return $row;    
}
public function deleteProjectDetails($projectId){
$this->db->query(' DELETE FROM project_details '
                .' WHERE project_id=:project_id ');
$this->db->bind(':project_id',$projectId);
if($this->db->execute()){
    return true;
    }
    return false;  
}

public function updateProjectDetails($projectId,$project_name,$description,$startDate,$endDate,$status,$assignedby,$lastUpdatedTs,$lastUpdatedBy){
$this->db->query(' UPDATE project_details SET start_date=:start_date,end_date=:end_date,status_id=:status, '
            .    ' project_name =:project_name,description=:description,assigned_by=:assignedby,last_updated_ts=:lastupdatedts,'
            .    ' last_updated_by=:lastupdatedby WHERE project_id=:project_id ');
    $this->db->bind(':project_id',$projectId);
    $this->db->bind(':start_date',$startDate);
    $this->db->bind(':end_date',$endDate);
    $this->db->bind(':status',$status);
    $this->db->bind(':project_name',$project_name);
    $this->db->bind(':description',$description);
    $this->db->bind(':assignedby',$assignedby);
    $this->db->bind(':lastupdatedts',$lastUpdatedTs);
    $this->db->bind(':lastupdatedby',$lastUpdatedBy);
    if($this->db->execute()){
    return true;
    }
    return false;    
}
//-----------------------------------------for project page end------------------------------------------------------------
public function getAllTaskOfProject($projectId){
    $this->db->query(' SELECT td.task_id,td.task_name, td.due_date, td.reminder_day,e.first_name,s.status_desc,td.status_id FROM task_details td,employee_detail e,status s WHERE td.project_id = :project_id AND td.assigned_to = e.employee_id AND td.status_id= s.status_id');
    $this->db->bind(':project_id',$projectId);
    $row = $this->db->resultSet();
    // print_r($row);
    return $row;  
}
//-----------------------------------------for task page start------------------------------------------------------------

public function getAllClients(){
    $this->db->query(' SELECT client_id,client_name FROM client_details WHERE 1=1 ');
    $row = $this->db->resultSet();
    // print_r($row);
    return $row;
}
public function putTaskDetails($projectId,$taskName,$dueDate,$reminderDay,$status,$assignedTo,$assignedBy,$createdBy,$createdTs,$lastUpdatedBy,$lastUpdatedTs){
    // echo ' Inside insertApplicant';
    $this->db->query(' INSERT INTO task_details(task_id, project_id, task_name, due_date, reminder_day, assigned_to, assigned_by, '
                .    ' status_id, created_by, created_ts, last_updated_by, last_updated_ts) '       
                .    ' VALUES (0,:project_id,:task_name,:due_date,:reminder_day,:assigned_to, :assigned_by,:status, '
                .    ':created_by,:created_ts,:last_updated_by,:last_updated_ts) ');
                   
    $this->db->bind(':project_id',$projectId);
    $this->db->bind(':task_name',$taskName);
    $this->db->bind(':due_date',$dueDate);
    $this->db->bind(':reminder_day',$reminderDay);
    $this->db->bind(':status', $status);
    $this->db->bind(':assigned_to',$assignedTo);
    $this->db->bind(':assigned_by',$assignedBy);               
    $this->db->bind(':created_by', $createdBy);
    $this->db->bind(':created_ts',$createdTs);
    $this->db->bind(':last_updated_by',$lastUpdatedBy);
    $this->db->bind(':last_updated_ts',$lastUpdatedTs);
    // $this->db->bind(':incorporationTypeId',$incorporationType);
    // $this->db->bind(':created_by', $created_by);
   
    if($this->db->execute()){
        $taskId = $this->db->insertId();
        // return  $id;
        return true;
    }
    else {
        return false;
    }
}

public function putProjectDetails($projectName,$clientId,$categoryId,$startDate,$endDate,$assignedBy,$status,$createdBy,$createdTs,$lastUpdatedBy,$lastUpdatedTs){
    $this->db->query(' INSERT INTO project_details(project_id, project_name, client_id, category_id, start_date, end_date, '
                .    ' assigned_by, status_id, created_by, created_ts, last_updated_by, last_updated_ts) '
                .    ' VALUES (0,:projectName,:clientId,:categoryId,:startDate,:endDate,:assignedBy,:status,:createdBy, '
                .    ' :createdTs,:lastUpdatedBy,:lastUpdatedTs)');
                $this->db->bind(':projectName',$projectName);
                $this->db->bind(':clientId',$clientId);
                $this->db->bind(':categoryId',$categoryId);
                $this->db->bind(':status', $status);
                $this->db->bind(':startDate',$startDate);
                $this->db->bind(':endDate',$endDate);
                $this->db->bind(':assignedBy',$assignedBy);               
                $this->db->bind(':createdBy', $createdBy);
                $this->db->bind(':createdTs',$createdTs);
                $this->db->bind(':lastUpdatedBy',$lastUpdatedBy);
                $this->db->bind(':lastUpdatedTs',$lastUpdatedTs);
                if($this->db->execute()){
                    $taskId = $this->db->insertId();
                    // return  $id;
                    return true;
                }
                else {
                    return false;
                }             
}

public function showTaskDetailsInTable(){
// echo "showEmployeeDetailsInTable";
    $this->db->query(' SELECT p.project_id,p.project_name, t.task_id, t.task_name,t.reminder_day, t.due_date,t.reason, t.status_id,t.assigned_to, t.assigned_by, t.created_by, t.created_ts, t.last_updated_by, t.last_updated_ts,s.status_desc,e.first_name,c.client_name FROM project_details p,task_details t,  status s,employee_detail e,client_details c  WHERE p.project_id = t.project_id AND  t.status_id = s.status_id AND e.employee_id = t.assigned_to AND c.client_id = p.client_id  ORDER BY t.due_date ASC ');
    $row = $this->db->resultSet();
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
public function getAllEmplyee($user){
    $this->db->query(' SELECT employee_id,first_name, last_name FROM employee_detail WHERE employee_id != :user ');
    $this->db->bind(':user', $user);
    $row = $this->db->resultSet();
    // print_r($row);
    return $row;
}

    public function showNewTaskDetails(){
    // echo "showEmployeeDetailsInTable";
        $this->db->query(' SELECT p.project_id,p.project_name, t.task_id, t.task_name,t.reminder_day, t.due_date, '
                    .    ' t.status_id,t.assigned_to, t.assigned_by, t.created_by, t.created_ts, t.last_updated_by, '
                    .    ' t.last_updated_ts,s.status_desc,e.first_name, c.client_name FROM project_details p,task_details t, '
                    .    ' status s,employee_detail e,client_details c WHERE p.project_id = t.project_id AND c.client_id = p.client_id  AND '
                    .    ' t.status_id = s.status_id AND e.employee_id = t.assigned_to AND  t.status_id="300" ORDER BY t.due_date ASC ');
        $row = $this->db->resultSet();
        // print_r($row);
        return $row;    
    }


    public function showInProgressTaskDetails(){
        // echo "showEmployeeDetailsInTable";
            $this->db->query(' SELECT p.project_id,p.project_name, t.task_id, t.task_name,t.reminder_day, t.due_date, '
                        .    ' t.status_id,t.assigned_to, t.assigned_by, t.created_by, t.created_ts, t.last_updated_by, '
                        .    ' t.last_updated_ts,s.status_desc,e.first_name,c.client_name FROM project_details p,task_details t, '
                        .    ' status s,employee_detail e,client_details c  WHERE p.project_id = t.project_id AND  c.client_id = p.client_id'
                        .    ' AND t.status_id = s.status_id AND e.employee_id = t.assigned_to AND  t.status_id="310" ORDER BY t.due_date ASC ');
            $row = $this->db->resultSet();
            // print_r($row);
            return $row;    
    }

    public function showHoldTaskDetails(){
        $this->db->query(' SELECT p.project_id,p.project_name, t.task_id, t.task_name,t.reminder_day, t.due_date, '
        .    ' t.status_id,t.assigned_to, t.assigned_by, t.created_by, t.created_ts, t.last_updated_by, '
        .    ' t.last_updated_ts,s.status_desc,e.first_name,c.client_name FROM project_details p,task_details t, '
        .    ' status s,employee_detail e,client_details c  WHERE p.project_id = t.project_id AND c.client_id = p.client_id AND'
        .    ' t.status_id=s.status_id AND e.employee_id=t.assigned_to AND (t.status_id="330" OR t.status_id="350") ORDER BY t.due_date ASC');
        $row = $this->db->resultSet();
        // print_r($row);
        return $row;
    }

    public function showDeletedTaskDetails(){
        $this->db->query(' SELECT p.project_id,p.project_name, t.task_id, t.task_name,t.reminder_day, t.due_date, '
        .    ' t.status_id,t.assigned_to, t.assigned_by, t.created_by, t.created_ts, t.last_updated_by, '
        .    ' t.last_updated_ts,s.status_desc,e.first_name,c.client_name FROM project_details p,task_details t, '
        .    ' status s,employee_detail e,client_details c  WHERE p.project_id = t.project_id AND c.client_id = p.client_id AND '
        .    ' t.status_id=s.status_id AND e.employee_id=t.assigned_to AND t.status_id="340" ORDER BY t.due_date ASC  ');
        $row = $this->db->resultSet();
        // print_r($row);
        return $row;
    }

    public function getAllEmployee(){
        $this->db->query(' SELECT * FROM employee_detail WHERE 1 = 1');
        $row = $this->db->resultSet();
        // print_r($row);
        return $row;

    }
public function getTaskDetails($taskId){
// echo "showclientDetailsInTable";
    $this->db->query(' SELECT t.task_id,t.task_name,t.due_date,t.reminder_day,t.assigned_by,t.status_id,e.first_name,s.status_desc,e.employee_id,t.reason FROM task_details t,employee_detail e,status s WHERE task_id = :task_id AND t.assigned_to = e.employee_id AND s.status_id = t.status_id');
    $this->db->bind(':task_id',$taskId);
    $row = $this->db->single();
    // print_r($row);
    return $row;    
}
public function deleteTaskDetails($taskId){
    $this->db->query(' DELETE FROM task_details '
                    .' WHERE task_id=:task_id ');
    $this->db->bind(':task_id',$taskId);
    if($this->db->execute()){
        return true;
    }
        return false;    
    }     



public function updateTaskDetails($taskId,$dueDate,$reminderDay,$status,$reason,$assignedTo,$assignedBy,$lastUpdatedBy,$lastUpdatedTs,$taskName){
    $this->db->query(' UPDATE task_details SET task_name=:taskName,due_date=:dueDate,reminder_day=:reminderDay,assigned_to=:assignedTo,assigned_by=:assignedBy,status_id=:status,reason =:reason,last_updated_by=:lastUpdatedBy ,last_updated_ts=:lastUpdatedTs WHERE task_id =:task_id ');
                    
    $this->db->bind(':task_id',$taskId);
    $this->db->bind(':dueDate',$dueDate);
    $this->db->bind(':reminderDay',$reminderDay);
    $this->db->bind(':taskName',$taskName);
    $this->db->bind(':status',$status);
    $this->db->bind(':reason',$reason);
    $this->db->bind(':assignedTo',$assignedTo);
    $this->db->bind(':assignedBy',$assignedBy);
    $this->db->bind(':lastUpdatedBy',$lastUpdatedBy);
    $this->db->bind(':lastUpdatedTs',$lastUpdatedTs);
    if($this->db->execute()){
        return true;
    }
        return false;    
    }     


//----------------------------------------------task page end--------------------------------------------------------------

public function showTaskDetailsInProjectTable($projectId){
    // echo "showEmployeeDetailsInTable";
        $this->db->query(' SELECT p.project_id,p.project_name, t.task_id, t.task_name,t.due_date,  t.reminder_day, '
                        .' t.status_id,t.assigned_to, t.assigned_by, t.created_by, t.created_ts, t.last_updated_by, '
                        .' t.last_updated_ts FROM project_details p,task_details t  '
                        .' WHERE p.project_id=:project_id ');
        $this->db->bind(':project_id',$projectId);
        $row = $this->db->resultSet();
        // print_r($row);
        return $row;    
    }


}

