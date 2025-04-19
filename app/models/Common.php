<?php 

class Common{
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

    public function getUserName($user){
        $this->db->query(' SELECT employee_id,first_name,image FROM employee_detail WHERE employee_id = :user ');
        $this->db->bind(':user', $user);
        $row = $this->db->single();
        // print_r($row);
        return $row; 
    }


    public function showclientDetailsInTable(){
        $this->db->query(' SELECT cd.client_id,cd.client_name,cd.email,cd.address,s.status_desc FROM client_details cd , status s WHERE s.status_id= cd.status_id  ORDER BY cd.client_name ');
        $row = $this->db->resultSet();
        return $row;    
    }
    public function showProjectDetailsInTable(){
        // echo "showEmployeeDetailsInTable";
        $this->db->query(' SELECT c.client_name,p.project_id, p.project_name, p.client_id, p.category_id, p.start_date, p.end_date, s.status_desc, p.deal_id , p.status_id FROM client_details c,project_details p ,status s WHERE c.client_id = p.client_id 
        AND p.status_id = s.status_id ORDER BY   p.project_name ASC');
        $row = $this->db->resultSet();
        // print_r($row);
        return $row;    
        }
    public function showTaskDetailsInTable(){
            // echo "showEmployeeDetailsInTable";
                $this->db->query(' SELECT p.project_id,p.project_name, t.task_id, t.task_name,t.reminder_day, t.due_date,t.reason, t.status_id,t.assigned_to, t.assigned_by, t.created_by, t.created_ts, t.last_updated_by, t.last_updated_ts,s.status_desc,e.first_name,c.client_name FROM project_details p,task_details t,  status s,employee_detail e,client_details c  WHERE p.project_id = t.project_id AND  t.status_id = s.status_id AND e.employee_id = t.assigned_to AND c.client_id = p.client_id  ORDER BY t.due_date ASC ');
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
        public function getAssignTaskToExecutive(){
            $this->db->query(' SELECT td.task_id,td.task_name,s.status_desc,ed.first_name,td.due_date,td.reminder_day FROM task_details td , employee_detail ed,status s WHERE ed.employee_id= td.assigned_to AND td.status_id=s.status_id AND (td.status_id != "330" OR td.status_id != "340" OR td.status_id != "350") ');
            $row = $this->db->resultSet();
            return $row;
        }

}
?>