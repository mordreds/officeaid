<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Access extends CI_Model 
{
	/***********************************************
		Logging Sign Out
	************************************************/
	public function logout_log($login_id) 
	{
		$tablename = "access_login_success";
		$this->db->set('online',0);
		$this->db->where('login_id',$login_id);
		$query = $this->db->update($tablename);
		$result = $this->db->affected_rows();

		return (($query) ? TRUE : FALSE );
	}

	/***********************************************
			Username dblookup => Login Page
	************************************************/
	public function verify_username($_DB_Resource,$tablename,$username)
	{
		$_DB_Resource->where('username',$username);
		$query = $_DB_Resource->get($tablename);
		if($query->num_rows() == 1) 
		{
			$row = $query->row();
			$data = [
				'id'									=> $row->id,
				'encrypted_password'  => $row->passwd,
				'employee_id'	        => $row->employee_id,
	    	'first_login'			 		=> $row->first_login,
	    	'login_attempt'		 		=> $row->login_attempt,
	    	'account_status'			=> $row->status, 	
	    ];
	    return json_encode($data);
		}
    
    else 
      return json_encode(FALSE) ;
	}

	/***********************************************
		Retrieve User Roles & Privileges
	************************************************/
	public function roles_priviledges_user($_DB_Resource,$tablename,$user_id)
	{
		$where_clause = ['user_id' => $user_id, 'status' => "active"];
		$_DB_Resource->where($where_clause);
		$query = $_DB_Resource->get($tablename);
		
		return(($query->num_rows() == 1) ? json_encode($query->row()) : json_encode(FALSE) );	
	}

	/***********************************************
		Retrieve Group Roles & Privileges
	************************************************/
	public function roles_priviledges_group($_DB_Resource,$tablename,$group_id)
	{
		$where_clause = ['id' => $group_id, 'status' => "active"];
		$_DB_Resource->where($where_clause);
		$query = $_DB_Resource->get($tablename);
		
		return(($query->num_rows() == 1) ? json_encode($query->row()) : json_encode(FALSE) );	
	}

	/***********************************************
            Retrieving Dashboard Tabs
  ************************************************/
  public function dashboard_tabs()
  {
    $tablename = "dashboard_tabs";
    $query = $this->db->get($tablename);
        
    return(($query->num_rows() > 0) ? $query->result() : false );    
  }

	/***********************************************
			Logging Sign In
	************************************************/
	public function login_record($_DB_Resource,$data) 
	{
		$tablename = "successful_logins";
		$query = $_DB_Resource->insert($tablename,$data);
		$login_id['id'] = $_DB_Resource->insert_id();
				
		return (($query) ? json_encode($login_id) : json_encode(false) );
	}

	/***********************************************
			Login Attempt 
	************************************************/
	public function decrease_login_attempt($_DB_Resource,$username,$login_attempt) 
  {
    $tablename = "users";

    if(!empty($login_attempt) && $login_attempt > 0) 
    {
      $attempt_left['attempt_left'] = $login_attempt - 1;

      if($attempt_left['attempt_left'] == 0)
      {
      	$_DB_Resource->set('login_attempt',$attempt_left['attempt_left']);
	     	$_DB_Resource->where('username',$username);
	      $query = $_DB_Resource->update($tablename);
	      # Deactivating Account 
      	if($this->deactivate_account($_DB_Resource,$username))
      		$attempt_left['account_deactivate'] = "Successful";
      	else
      		$attempt_left['account_deactivate'] = "Failed";
      }
      else
      {
      	$_DB_Resource->set('login_attempt',$attempt_left['attempt_left']);
	     	$_DB_Resource->where('username',$username);
	      $query = $_DB_Resource->update($tablename);
      } 
    }
    else
    	$attempt_left['attempt_left'] = 0;

    return json_encode($attempt_left);
	}

	public function revert_login_attempt($_DB_Resource,$user_id) 
  {
    $tablename = "users";

    $_DB_Resource->set('login_attempt',"5");
	  
	  $_DB_Resource->where('id',$user_id);
	  
	  $query = $_DB_Resource->update($tablename);

    return json_encode($attempt_left);
	}

	/***********************************************
			De-activate Account 
	************************************************/
	public function deactivate_account($_DB_Resource,$username)
	{
		$tablename	= "users";
		$_DB_Resource->set('status',"inactive");
	  $_DB_Resource->where('username',$username);
	  $query = $_DB_Resource->update($tablename);
		$result = $_DB_Resource->affected_rows();			
		return (($result) ? TRUE : FALSE );
	}

	/***********************************************
			Reset User Password
	************************************************/
	public function Reset_Password($_DB_Resource,$user_id,$newpassword)
	{
		$tablename	= "users";
		$_DB_Resource->set('passwd',$newpassword);
		$_DB_Resource->where('id',$user_id);
		$_DB_Resource->get_compiled_update($tablename);
		exit;
		/*$_DB_Resource->update($tablename);
		$result = $_DB_Resource->affected_rows();
		return (($result) ? $_DB_Resource->insert_id() : FALSE );*/
	}

	/***********************************************
			Failed Login 
	************************************************/
	public function failed_login_record($_DB_Resource,$data)
	{
		$tablename	= "failed_logins";
		$result['process'] = $_DB_Resource->insert($tablename,$data);
		return ((!empty($result)) ? $result['process'] = "Succesful" : $result['process'] = "Failed" );
	}

	/***********************************************
			Failed Login 
	************************************************/
	public function delete_user($userid)
	{
		$tablename	= "access_users";
		$this->db->where('id',$userid);
    $query = $this->db->delete($tablename);
    $result = $this->db->affected_rows();
    return (($result > 0) ? TRUE : FALSE );
	}

  /***********************************************
          Retrieving Last Group ID
  ************************************************/
  public function ret_last_group_id()
  {
    $tablename = "general_last_ids"; 

    $query = $this->db->get($tablename);
        
    return ( ($query->num_rows() > 0) ? $query->row(0) :false );
  }


	/***********************************************
			Retrieving Dept Name / Group Name
	************************************************/

	public function ret_grp_name($search,$tablename) {
		
		$this->db->select('name');

		$where = array('group_id'=>$search);

		$query = $this->db->get_where($tablename,$where); 
		
		return(($query->num_rows() == 1) ? $query->result() : false );	

	}
    
    /***********************************************
			Retrieving Dept Name / Group Name
	************************************************/

	public function ret_dep_name($search,$tablename) {
		
		$this->db->select('name');

		$where = array('id'=>$search);

		$query = $this->db->get_where($tablename,$where); 
		
		return(($query->num_rows() == 1) ? $query->result() : false );	

	}
    
    /***********************************************
			Retrieving Dept ID / POS ID
	************************************************/

	public function ret_dept_grp_id($search,$tablename) {
		
		$this->db->select('id');

		$where = array('name'=>$search);

		$query = $this->db->get_where($tablename,$where); 
		
		return(($query->num_rows() == 1) ? $query->result() : false );	

	}
    
    /***********************************************
			Retrieving  Roles Details 
	************************************************/
	
	public function ret_roles_details($rowname) {
	   
       $tablename = "dashboard_tabs";
       
       $where = array('name'=>$rowname);
       
       $query = $this->db->get_where($tablename,$where);
       
       return($query->num_rows() > 0 ? $query->result() : false);
	}
    
    /***********************************************
			Retrieving  Users Country 
	************************************************/
	
	public function Country($cou_code) {
	   
       $tablename = "countries";
       
       $where = array('cou_code'=>$cou_code);
       
       $query = $this->db->get('countries');
       
       return($query->num_rows() > 0 ? $query->result() : false);
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
		
		return(($query->num_rows() > 0) ? $query->result() : false );	

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
				
				return(($query->num_rows() == 1) ? $query->result() : false );
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
		
		return($query->num_rows() > 0 ? $query->result() : false);
	}

	/***********************************************
			Retrieving All Pending Users 
	************************************************/
	
	public function pendingusers() {

		$tablename = "users";

		$this->db->where('new_login','0');

		$query = $this->db->get($tablename);
		
		return($query->num_rows() > 0 ? $query->result() : false);
	}

	/***********************************************
			Retrieving  Certificates 
	************************************************/
	
	public function certificate() {

		$this->db->order_by('cert_id','ASC');

		$query = $this->db->get('certificates');
		
		return($query->num_rows() > 0 ? $query->result() : false);
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

    return (($query) ? true : false );			
	}

	/***********************************************
			Registering Employee Info
	************************************************/
	
	public function employee_info_insert($data) {

		$tablename = "employees";
		
		$data['employee_id'] = "PENDING";
		
		//$query = $this->db->insert($tablename,$data);

        //return (($query) ? true : false );	

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

            return (($query) ? true : false );	
			
		}

		else{

			//Updating User Info 
			$this->db->set('username',$data['username']);
			$this->db->set('passwd'   ,$data['passwd']);
			$this->db->set('new_login',1);
			$this->db->where('employee_id',$data['employee_id']);
				
			$query = $this->db->update('users');

			$result = $this->db->affected_rows();
					
			return (($result == 1) ? true : false );
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
				
			//return (($query) ? true : false );

		//return (($result >= 0) ? true : false );

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
				
		return (($result >= 0) ? true : false );

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
        
        return(($result > 0) ?  true :  false);
         
    }
    
    
	
}
