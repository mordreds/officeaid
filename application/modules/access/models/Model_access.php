<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Access extends CI_Model 
{
	/***********************************************
		Sysaudit Recording 
	************************************************/
	public function sysaudit_record($dbres,$sysaudit_data)
	{
		$tablename	= "access_sysaudit";
	  $query 			= $dbres->insert($tablename,$sysaudit_data);
		$result 		= $dbres->affected_rows();			
		return (($result) ? TRUE : FALSE );
	}

	/***********************************************
		Username dblookup => Login Page
	************************************************/
	public function verify_username($dbres,$username)
	{
		$tablename = "vw_user_details";
		$dbres->where('username',$username);
		$query = $dbres->get($tablename);
		return $query->row();
	}

	/***********************************************
		Retrieve Company Info
	************************************************/
	public function retrieve_company_info()
	{
		$tablename = "hr_company_info";
		$query = $this->db->get($tablename);
		return $query->row();
	}
	
	/***********************************************
		Logging Sign Out
	************************************************/
	public function logout_user($dbres,$tablename,$login_id) 
	{
		$condition = ['online' => 0,];
		$dbres->set($condition);
		$dbres->where('id',$login_id);
		$query = $dbres->update($tablename);
		$result = $dbres->affected_rows();
		return (($query) ? TRUE : FALSE );
	}

	/***********************************************
		Retrieving  Roles Details 
	************************************************/
	public function retrieve_all_system_types($dbres) 
	{
    $tablename = "dashboard_tabs";
    $dbres->distinct();
    $dbres->select('system_type');
    $query = $dbres->get($tablename);
    return($query->num_rows() > 0 ? $query->result() : FALSE);
	}

	/***********************************************
		Retrieving  Roles Details 
	************************************************/
	public function retrieve_dashboard_tab_details($dbres,$role) 
	{
    $tablename = "dashboard_tabs";
    $where = array('name'=>$role, 'status' => "active");
    $query = $dbres->get_where($tablename,$where);
    return($query->num_rows() > 0 ? $query->row() : FALSE);
	}

	/***********************************************
    Retrieving Dashboard Tabs
  ************************************************/
  public function dashboard_tabs()
  {
    $tablename = "dashboard_tabs";
    $query = $this->db->get($tablename);
    return(($query->num_rows() > 0) ? $query->result() : FALSE );    
  }

	/***********************************************
		Logging Sign In
	***********************************************/
	public function record_login($dbres,$condition,$data) 
	{
		if($condition['password_check']) {
			# code...
			$tablename = "access_login_successful";
			$query = $dbres->insert($tablename,$data);
			$return_id = $dbres->insert_id();
			
			if(!empty($return_id)) {
				$data_returned = $this->revert_login_attempt($condition['users_dbres'],$data['user_id']);
				$data_returned['login_id'] = $return_id;
			}

		} else {
			# code...
			$tablename = "access_login_failed";
			$query = $dbres->insert($tablename,$data);
			$return_id = $dbres->insert_id();

			if(!empty($return_id)) {
				$data_returned = $this->decrease_login_attempt($condition['users_dbres'],$data['user_id'],$condition['login_attempt']);
			}

		}
		return $data_returned;
		
	}

	/***********************************************
		Login Attempt 
	************************************************/
	public function decrease_login_attempt($dbres,$user_id,$login_attempt) 
  {
    $tablename = "access_users";

    if($login_attempt > 0) {
      $attempt_left = $login_attempt - 1;

      if($attempt_left == 0) {
      	$update_data = array('login_attempt' => 0, 'status' => "inactive");
      	$dbres->set($update_data);
	     	$dbres->where('id',$user_id);
	      $query = $dbres->update($tablename);
      }
      else {
      	$update_data = array('login_attempt' => $attempt_left, 'status' => "active");
      	$dbres->set('login_attempt',$attempt_left);
	     	$dbres->where('id',$user_id);
	      $query = $dbres->update($tablename);
      } 
    }
    else
    	$update_data = array('login_attempt' => 0,'status' => "inactive");
    return $update_data;
	}

	public function revert_login_attempt($dbres,$user_id) 
  {
    $tablename = "access_users";
    $dbres->set('login_attempt',"5");
	  $dbres->where('id',$user_id);
	  $query = $dbres->update($tablename);
    return $update_data = array('login_attempt' => 5, 'status' => "active");;
	}

	/***********************************************
		Change Account Status
	************************************************/
	public function change_account_status($dbres,$return_dataType="php_object",$where_condition,$status)
	{
		$tablename		= "access_users";
		$dbres->set('status',$status);
	  $dbres->where($where_condition);
	  $query_result = $dbres->update($tablename); 
	  
	  if($return_dataType == "json")          
      return json_encode($query_result);
    else 
      return ($query_result);
	}

	/***********************************************
			De-activate Account 
	************************************************/
	public function deactivate_account($dbres,$username,$user_id)
	{
		$tablename		= "access_users";
		$dbres->set('status',"inactive");
	  $dbres->where(array('username' => $username, 'id' => $user_id));
	  $query_result = $dbres->update($tablename); 
	  return (($query_result) ? TRUE : FALSE );
	}

	/***********************************************
			Activate Account 
	************************************************/
	public function activate_account($dbres,$username,$user_id)
	{
		$tablename		= "access_users";
		$dbres->set('status',"active");
	  $dbres->where(array('username' => $username, 'id' => $user_id));
	  $query_result = $dbres->update($tablename); 
	  return (($query_result) ? TRUE : FALSE );
	}

	/***********************************************
			Delete Account 
	************************************************/
	public function delete_account($dbres,$username,$user_id)
	{
		$tablename		= "access_users";
		$dbres->set('status',"deleted");
	  $dbres->where(array('username' => $username, 'id' => $user_id));
	  $query_result = $dbres->update($tablename); 
	  return (($query_result) ? TRUE : FALSE );
	}

	/***********************************************
			Reset User Password
	************************************************/
	public function Reset_Password($dbres,$user_id,$newpassword)
	{
		$tablename	= "access_users";
		$dbres->set('passwd',$newpassword);
		$dbres->where('id',$user_id);
		$query_result = $dbres->update($tablename);
		return (($query_result) ? TRUE : FALSE );
	}

	/***********************************************
		Retrieve User Roles & Privileges
	************************************************/
	public function roles_priviledges_user($dbres,$user_id)
	{
		$tablename = 'access_roles_priviledges_user';
		$where_clause = ['user_id' => $user_id, 'status' => "active"];
		$dbres->where($where_clause);
		$query = $dbres->get($tablename);
		return(($query->num_rows() == 1) ? $query->row() : FALSE);	
	}

	/***********************************************
		Retrieve Group Roles & Privileges
	************************************************/
	public function roles_priviledges_group($dbres,$group_id)
	{
		$tablename = 'access_roles_priviledges_group';
		$where_clause = ['id' => $group_id, 'status' => "active"];
		$dbres->where($where_clause);
		$query = $dbres->get($tablename);
		return(($query->num_rows() == 1) ? $query->row() : FALSE );	
	}
















  /***********************************************
          Retrieving Last Group ID
  ************************************************/
  public function ret_last_group_id()
  {
    $tablename = "general_last_ids"; 

    $query = $this->db->get($tablename);
        
    return ( ($query->num_rows() > 0) ? $query->row(0) :FALSE );
  }


	/***********************************************
			Retrieving Dept Name / Group Name
	************************************************/

	public function ret_grp_name($search,$tablename) {
		
		$this->db->select('name');

		$where = array('group_id'=>$search);

		$query = $this->db->get_where($tablename,$where); 
		
		return(($query->num_rows() == 1) ? $query->result() : FALSE );	

	}
    
    /***********************************************
			Retrieving Dept Name / Group Name
	************************************************/

	public function ret_dep_name($search,$tablename) {
		
		$this->db->select('name');

		$where = array('id'=>$search);

		$query = $this->db->get_where($tablename,$where); 
		
		return(($query->num_rows() == 1) ? $query->result() : FALSE );	

	}
    
    /***********************************************
			Retrieving Dept ID / POS ID
	************************************************/

	public function ret_dept_grp_id($search,$tablename) {
		
		$this->db->select('id');

		$where = array('name'=>$search);

		$query = $this->db->get_where($tablename,$where); 
		
		return(($query->num_rows() == 1) ? $query->result() : FALSE );	

	}
    
 
    /***********************************************
			Retrieving  Users Country 
	************************************************/
	
	public function Country($cou_code) {
	   
       $tablename = "countries";
       
       $where = array('cou_code'=>$cou_code);
       
       $query = $this->db->get('countries');
       
       return($query->num_rows() > 0 ? $query->result() : FALSE);
	}

	/***********************************************
			Retrieving department members
	************************************************/

	public function department_members($department){
		
		//Retrieving DEPT and POS ID FROM Name
		$dept_id_ret = $this->ret_dept_pos_id('departments',$department);
		
		foreach ($dept_id_ret as $dept_id_loop) {
			# code...
			$dept_id = $dept_id_loop->id;
		}
		
		$tablename = "employees";

		$this->db->select('employee_id,fullname');
		
		$where = array('department_id'=>$dept_id);
		
		$query = $this->db->get_where($tablename,$where);
		
		return(($query->num_rows() > 0) ? $query->result() : FALSE );	

	}

	/***********************************************
			Retrieving Supervisor Name
	************************************************/

	public function SupervisorName($department){
		
		if(!empty($department)) {
			//Retrieving DEPT and POS ID FROM Name
			$dept_id_ret = $this->ret_dept_pos_id($department,'departments');
			
			if (!empty($dept_id_ret)) {
				# code...
				foreach ($dept_id_ret as $dept_id_loop) {
					# code...
					$dept_id = $dept_id_loop->id;
				}
			}

			$pos_id_ret  = $this->ret_dept_pos_id('Supervisor','position');

			if (!empty($pos_id_ret)) {
				# code...
				foreach ($pos_id_ret as $pos_id_loop) {
					# code...
					$pos_id = $pos_id_loop->id;
				}
			}

			if(!empty($dept_id) && !empty($pos_id)) {
			
				$tablename = "employees";

				$this->db->select('lname,fname');

				$where = array('department_id'=>$dept_id,'position_id'=>$pos_id);

				$query = $this->db->get_where($tablename,$where); 
				
				return(($query->num_rows() == 1) ? $query->result() : FALSE );
			}
		}	

	}

	/***********************************************
			Retrieving Supervisor Name
	************************************************/

	public function Head_Of_Dept($department){
		
		if(!empty($department)) {

			//Retrieving DEPT and POS ID FROM Name
			$dept_id_ret = $this->ret_dept_pos_id($department,'departments');
			
			if (!empty($dept_id_ret)) {
				# code...
				foreach ($dept_id_ret as $dept_id_loop) {
					# code...
					$dept_id = $dept_id_loop->id;
				}
			}

			$pos_id_ret  = $this->ret_dept_pos_id('Head Of Department','position');

			if (!empty($pos_id_ret)) {
				# code...
				foreach ($pos_id_ret as $pos_id_loop) {
					# code...
					$pos_id = $pos_id_loop->id;
				}
			}

			if(!empty($dept_id) && !empty($pos_id)) {
			
				$tablename = "work";

				$this->db->select('employee_id');

				$where = array('dept_id'=>$dept_id,'position_id'=>$pos_id);

				$query = $this->db->get_where($tablename,$where); 
				
				if ($query->num_rows() == 1)
					$employee_id = $query->result();
				else
					$employee_id = "" ;
			}

			print $employee_id;

			
		}	

	}

	/***********************************************
			Retrieving All Employees 
	************************************************/
	
	public function allemployees() {

		$query = $this->db->get('emp_pers_info');
		
		return($query->num_rows() > 0 ? $query->result() : FALSE);
	}

	/***********************************************
			Retrieving All Pending Users 
	************************************************/
	
	public function pendingusers() {

		$tablename = "users";

		$this->db->where('new_login','0');

		$query = $this->db->get($tablename);
		
		return($query->num_rows() > 0 ? $query->result() : FALSE);
	}

	/***********************************************
			Retrieving  Certificates 
	************************************************/
	
	public function certificate() {

		$this->db->order_by('cert_id','ASC');

		$query = $this->db->get('certificates');
		
		return($query->num_rows() > 0 ? $query->result() : FALSE);
	}

	/***********************************************
			Retrieving User Info
	************************************************/

	public function user_info($employee_id){
		
		$tablename = "users";
		
		$where = array('employee_id'=>$employee_id);

		$query = $this->db->get_where($tablename,$where); 
		
		return(($query->num_rows() == 1) ? $query->result() : FALSE );	

	}

	/***********************************************************************************************************************************************
    ****************************************************** Data Insertion **************************************************************************
    ***********************************************************************************************************************************************/

	

	

    
  /***********************************************
			Registering User
	************************************************/
	public function register_user($data) 
	{
		$tablename = "access_users";
		
		$query = $this->db->insert($tablename,$data);

    return (($query) ? true : FALSE );			
	}

	/***********************************************
			Registering Employee Info
	************************************************/
	
	public function employee_info_insert($data) {

		$tablename = "employees";
		
		$data['employee_id'] = "PENDING";
		
		//$query = $this->db->insert($tablename,$data);

        //return (($query) ? true : FALSE );	

        print $this->db->get_compiled_insert();
			
	}

	/***********************************************
			Registering Work Info
	************************************************/
	
	public function work($data) {

		$tablename = "work";
		
		//CHECKING FOR New User
		if (empty($data['employee_id'])) {
			# code...
            //Settings and performing insertion
            $data['new_login'] = 0;

            $query = $this->db->insert($tablename,$data);

            return (($query) ? true : FALSE );	
			
		}

		else{

			//Updating User Info 
			$this->db->set('username',$data['username']);
			$this->db->set('passwd'   ,$data['passwd']);
			$this->db->set('new_login',1);
			$this->db->where('employee_id',$data['employee_id']);
				
			$query = $this->db->update('users');

			$result = $this->db->affected_rows();
					
			return (($result == 1) ? true : FALSE );
		}

	}

	/***********************************************************************************************************************************************
    ****************************************************** Data Update *****************************************************************************
    ***********************************************************************************************************************************************/

	/***********************************************
			Updating Employee Info
	************************************************/
	
	public function update_employee($data) {

		//updating employee data
		$this->db->set('employee_id',$data['employee_id']);
		$this->db->set('fullname'   ,$data['fullname']);
		$this->db->set('department_id' ,$data['department_id']);
		$this->db->set('jobtitle'   ,$data['jobtitle']);
		$this->db->set('position_id'   ,$data['position_id']);
		$this->db->where('employee_id',$data['old_employee_id']);
		//echo $this->db->get_compiled_update('employees'). "<br>";
		$query = $this->db->update('employees');
		$result1 = $this->db->affected_rows();
				
		$this->db->reset_query();

		if (strcasecmp($data['old_employee_id'], $data['employee_id']) == 0) 
			#code
			$employee_id = $data['old_employee_id'];

		else
			#code
			$employee_id = $data['employee_id'];
	
		//updating user data
		$this->db->set('employee_id',$data['employee_id']);
		$this->db->set('username',$data['username']);
		$this->db->set('passwd',$data['passwd']);
		$this->db->where('employee_id',$data['old_employee_id']);
		//echo $this->db->get_compiled_update('users');
		$query = $this->db->update('users');
		$result2 = $this->db->affected_rows();

		echo $result1. " ". $result2;
				
			//return (($query) ? true : FALSE );

		//return (($result >= 0) ? true : FALSE );

	}

	/***********************************************
			Updating User Password
	************************************************/
	
	public function changepwd($newpwd_encrypted,$employee_id) {

		//updating employee data
		$this->db->set('passwd',$newpwd_encrypted);
		$this->db->where('employee_id',$employee_id);
		//echo $this->db->get_compiled_update('employees'). "<br>";
		
		$query = $this->db->update('users');
		$result1 = $this->db->affected_rows();
				
		return (($result >= 0) ? true : FALSE );

	}
    
    
    
	

	/***********************************************************************************************************************************************
    ****************************************************** Data Delete *****************************************************************************
    ***********************************************************************************************************************************************/

    /***********************************************
            Deleting User
    ************************************************/
    
    public function delete_use($employee_id){
        
        $this->db->where('employee_id',$employee_id );
        $query = $this->db->delete('employees');

        $this->db->reset_query();

        $this->db->where('employee_id',$employee_id );
        $query = $this->db->delete('users');

        $result = $this->db->affected_rows();
        
        return(($result > 0) ?  true :  FALSE);
         
    }
    
    
	
}
