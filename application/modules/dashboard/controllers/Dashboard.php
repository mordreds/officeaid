<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller 
{
		/*******************************
      Constructor 
    *******************************/
    public function __construct() 
    {
      parent::__construct();
    }
 /*******************************
      DASHBOAD 
    *******************************/
    public function index() { $this->home();}
  
    public function home() 
    {
      if(isset($_SESSION['user'])) : 
        $title['title'] = "OfficeAid| Admin"; 
        $this->load->view('header',$title); 
        $this->load->view('admin_nav',$title); 
        $this->load->view('dashboard'); 
        $this->load->view('footer');
      else : 
        redirect('access');
      endif;
   } 

    public function report() 
    {
      if(in_array('Report', $_SESSION['user']['roles'])) : 
        # Loading Models
        $this->load->model("globals/model_retrieval");

        # Retrieving All Departments
        $dbres = self::$_Default_DB;
        $tablename = "departments";
        $data['alldepartments'] = $this->model_retrieval->retrieve_allinfo($dbres,$tablename);

        # Retrieving All Users
        $tablename = "vw_user_details";
        $where_condition = ['where_condition' => ['status' => "active"]];
        $data['allusers'] = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$where_condition);

        # Retrieving All Assignees
        $tablename = "vw_user_details";
        $where_condition = ['where_condition' => ['group_id' => 3]];
        $data['allassignees'] = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$where_condition);

        # Retrieving All Issue Types
        $tablename = "complains";
        $where_condition = ['where_condition' => ['status' => "active"]];
        $data['allissues'] = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$where_condition);

        $title['title'] = "OfficeAid| Reports"; 
        $this->load->view('header',$title); 
        $this->load->view('admin_nav',$title);
        $this->load->view('report',$data); 
        $this->load->view('footer'); 
      
      else : 
        redirect('dashboard');
      
      endif;
   }

     public function control()
    {
      if(in_array('Assigned-Tickets',$_SESSION['user']['roles'])) :
        $title['title'] = "OfficeAid| Controls"; 
        $this->load->view('header',$title); 
        $this->load->view('admin_nav',$title);
        $this->load->view('control'); 
        $this->load->view('modals');
          $this->load->view('footer'); 
      else :
        redirect('dashboard');
      endif;
    }
  public function users() 
  {
    if(in_array('Users',$_SESSION['user']['roles'])) :
      # Loading Models
      $this->load->model("globals/model_retrieval");

      # Retrieving All Departments
      $dbres = self::$_Default_DB;
      $tablename = "departments";
      $data['departments'] = $this->model_retrieval->retrieve_allinfo($dbres,$tablename);

      # Retrieving All System Roles
      $dbres = self::$_Default_DB;
      $tablename = "access_roles_privileges_group";
      $where_condition = ['where_condition' => ['id !=' => 1]];
      $data['systemrole'] = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$where_condition);

      $title['title'] = "OfficeAid| Users"; 
      $this->load->view('header',$title); 
      $this->load->view('admin_nav',$title); 
      $this->load->view('users',$data); 
      $this->load->view('footer'); 
    else :
      redirect('dashboard/');
    endif;
}
  public function privillage()
    {
      if(in_array('Privileges',$_SESSION['user']['roles'])) :
        # Loading Models
        $this->load->model("globals/model_retrieval");

        # Retrieving All System Roles
        $dbres = self::$_Default_DB;
        $tablename = "vw_user_details";
        $where_condition = ['where_condition' => ['status' => "active"]];
        $data['allusers'] = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$where_condition);
      
        # Retrieving All System Roles
        $dbres = self::$_Default_DB;
        $tablename = "access_roles_privileges_group";
        $where_condition = ['where_condition' => ['id !=' => 1]];
        $data['systemrole'] = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$where_condition);


        $title['title'] = "OfficeAid| Set Privillages"; 
        $this->load->view('header',$title);
        $this->load->view('admin_nav',$title);  
        $this->load->view('privillage',$data); 
        $this->load->view('footer'); 
      else :
      redirect('dashboard/');
    endif;
    
  /**************** Interface ********************/
}

public function job()
{
  if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles']))
    redirect('access');
  else
  {
    # Loading Models
    $title['title'] = "OfficeAid| Assigned Jobs"; 
    $this->load->view('header',$title); 
    $this->load->view('admin_nav',$title);
    $this->load->view('job'); 
    $this->load->view('modals'); 
    $this->load->view('footer'); 
  }
      
}

  /*******************************
      All requests Json
  *******************************/
  public function allrequests_json() 
  {
    if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles']))
      redirect('access');
    else
    {
      # Loading Models
      $this->load->model('globals/model_retrieval');

      # retrieving all requests
      $dbres = self::$_Default_DB;
      $tablename = "vw_requests";
      $condition = array(
        'where_condition' => ['type' => "ticket"] ,
        'wherein_condition' => [
          'status' => "pending,processing,resolved",
        ],
        'orderby'=> ['id' => "Desc"]
      );
      $query_result = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition);

      # retrieving all users
      $tablename = "vw_user_details";
      $condition = array(
        'where_condition' => [
          'status' => "active",
          'group_id' => ASSIGNEE
        ],
        'orderby'=> ['id' => "Desc"]
      );
      
      
      $dropdown_temp = $allready_selected = "";
      $allusers = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition);

      # creating user dropdown
      foreach ($query_result as $key => $record) {
        # code...
        $users_dropdown = '<select class="custom-select assigntouser" data-id="'.base64_encode($record->id).'">';

        foreach ($allusers as $user) {
          # code...
          if($record->assigned_to == $user->id) {
            $selected = "selected";
            $allready_selected = "Yes";
          }
          else
            $selected = "";

          $dropdown_temp .= "<option value=".base64_encode($user->id)." {$selected}>".$user->fullname."</option>";
          $selected = "";
        }

        # Checking if any user wwas selected
        if($allready_selected == "Yes")
          $option_1 = '<option value="" disabled>Select One</option>';
        else
          $option_1 = '<option value="" disabled selected>Select One</option>';

        $users_dropdown .= $option_1.$dropdown_temp."</select>";
        # resetting variable 
        $allready_selected = $dropdown_temp = "";


        $query_result[$key]->assigned_to = $users_dropdown;
      }
       
      print_r(json_encode($query_result)); 
    }
  }

  public function alldepartmentusers_json() 
  {
    if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles']))
      redirect('access');
    else
    {
      # Loading Models
      $this->load->model('globals/model_retrieval');

      $dbres = self::$_Default_DB;
      $tablename = "vw_user_details";
      $condition = array(
        'where_condition' => ['department_id' => $_SESSION['user']['department_id']],
        'orderby'=> ['id' => "Desc"]
      );

      $query_result = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition,$return_dataType="json");
      foreach ($query_result as $key => $value) {
        # code...
        
      }
      print_r($query_result); 
    }
  }

  /*******************************
      All requests Json
  *******************************/
  public function allassignments_json() 
  {
    if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles']))
      redirect('access');
    else
    {
      # Loading Models
      $this->load->model('globals/model_retrieval');

      $dbres = self::$_Default_DB;
      $tablename = "vw_requests";
      $condition = array(
        'where_condition' => array('assigned_to' => $_SESSION['user']['id'], 'status !=' => "closed"),
        'orderby'=> ['id' => "Desc"]
      );

      $query_result = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition);

      # Formatting Data 
      foreach ($query_result as $key => $value) {
        # code...
        if($value->type == "task")
          $color_code = "warning";
        else
          $color_code = "success";
        $query_result[$key]->type = '<div class="btn btn-outline-'.$color_code.' btn-block disabled btn-sm">'.ucwords($value->type).'</div>';
        $query_result[$key]->duedate = ($value->duedate != "0000-00-00") ? date('Y-m-d', strtotime($value->duedate)) : "<b><em>Not Applicable</em></b>";
        $query_result[$key]->subject = ucwords($value->subject);
        $query_result[$key]->priority = ucwords($value->priority);
      }
      print_r(json_encode($query_result)); 
    }
  }

public function task()
    {
      #loadming model 
      $this->load->model('globals/model_retrieval');

      # Getting All Users
      $dbres = self::$_Default_DB;
      $tablename = "access_users";
      $where_condition = array('status' => "active");
      
      $title['allusers'] = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$where_condition); 
      $title['title'] = "OfficeAid| Assigned Jobs"; 

      $this->load->view('header',$title); 
      $this->load->view('admin_nav',$title);
      $this->load->view('stationary'); 
      $this->load->view('footer'); 
      
    
  /**************** Interface ********************/
}

public function updaterequest() {
  $this->form_validation->set_rules('ticketid','Ticket ID','trim|required');
  $this->form_validation->set_rules('status','Description','trim|required');

  if($this->form_validation->run() === FALSE) {
    $errors = str_replace(array("\r","\n","<p>","</p>"),array("<br/>","<br/>","",""),validation_errors());
    $result = json_encode(array('status' => ERROR,'error' => $errors));
    print_r($result); exit;
  }
  else {
    $this->load->model('globals/model_update');
    /***** Data Definition *****/
    $dbres = self::$_Default_DB;
    $tablename = "requests";
    $update_data = [ 'status' => $this->input->post('status') ];
    $where_condition = ['id' => base64_decode($this->input->post('ticketid'))];
    /***** Data Definition *****/
    /******** Insertion Of New Data ***********/
    $save_data = $this->model_update->update_info($dbres,$tablename,$return_dataType="php_object",$update_data,$where_condition);
    if($save_data) 
      $reponseData = [
        'status' => SUCCESSFUL,
        'message' => "Successful"
      ];
    else
      $reponseData = [
        'status' => ERROR,
        'error' => "Update Failed"
      ];

      print_r(json_encode($reponseData));
    /******** Insertion Of New Data ***********/
    
  }
}

public function assignedto() {
  $this->form_validation->set_rules('ticketid','Ticket ID','trim|required');
  $this->form_validation->set_rules('assignedto','Assigned To','trim|required');

  if($this->form_validation->run() === FALSE) {
    $errors = str_replace(array("\r","\n","<p>","</p>"),array("<br/>","<br/>","",""),validation_errors());
    $result = json_encode(array('status' => ERROR,'error' => $errors));
    print_r($result); exit;
  }
  else {
    $this->load->model('globals/model_update');
    /***** Data Definition *****/
    $dbres = self::$_Default_DB;
    $tablename = "requests";
    $update_data = ['assigned_to' => base64_decode($this->input->post('assignedto')) ];
    $where_condition = ['id' => base64_decode($this->input->post('ticketid'))];
    /***** Data Definition *****/
    /******** Insertion Of New Data ***********/
    $save_data = $this->model_update->update_info($dbres,$tablename,$return_dataType="php_object",$update_data,$where_condition);
    if($save_data) 
      $reponseData = [
        'status' => SUCCESSFUL,
        'message' => "Successful"
      ];
    else
      $reponseData = [
        'status' => ERROR,
        'error' => "Assignment Failed"
      ];

      print_r(json_encode($reponseData));
    /******** Insertion Of New Data ***********/
    
  }
}

/********** User Management **********/
  /**************************
    Saving New User
  **************************/
  public function save_user() {
    if(in_array('Users',$_SESSION['user']['roles'])) :
      $this->form_validation->set_rules('fullname','Ticket ID','trim|required');
      $this->form_validation->set_rules('email','Email','trim|required');
      $this->form_validation->set_rules('phone_number','Phone Number','trim|required');
      $this->form_validation->set_rules('department','Department','trim|required');
      $this->form_validation->set_rules('systemrole','System Role','trim|required');
      $this->form_validation->set_rules('password','Password','trim|required');

      if($this->form_validation->run() === FALSE) {
        $errors = str_replace(array("\r","\n","<p>","</p>"),array("<br/>","<br/>","",""),validation_errors());
        $this->session->set_flashdata('error', $errors);
        redirect('dashboard/users');
      }
      else {
        # Loading Models 
        $this->load->model('globals/model_insertion');

        /***** Data Definition *****/
        $dbres = self::$_Default_DB;
        $tablename = "access_users";
        $request_data = [
          'fullname'  => ucwords($this->input->post('fullname')),
          'username'  => $this->input->post('email'),
          'passwd'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
          'department_id' => $this->input->post('department'),
          'phone_number' => ucwords($this->input->post('phone_number')),
          'created_by' => $_SESSION['user']['id']
        ];
        /***** Data Definition *****/

        /******** Insertion Of New Data ***********/
        $save_data = $this->model_insertion->datainsert($dbres,$tablename,$request_data);

        if($save_data) {
          # inserting permissions
          $tablename = "access_roles_privileges_user";
          $insert_data = ['user_id' => $save_data, 'group_id' => $this->input->post('systemrole')];
          $save_data = $this->model_insertion->datainsert($dbres,$tablename,$insert_data);

          $this->session->set_flashdata('success', 'Saving User Successful');
        }
        else 
          $this->session->set_flashdata('error', 'Saving User Failed');

        redirect('dashboard/users');
        /******** Insertion Of New Data ***********/
      }
      else :
        $this->session->set_flashdata('error', 'Saving User Failed');
        redirect('dashboard/');

      endif;
  }

   public function changerole() {
    if(in_array('Privileges',$_SESSION['user']['roles'])) :
      $this->form_validation->set_rules('user','User','trim|required');
      $this->form_validation->set_rules('systemrole','System Role','trim|required');

      if($this->form_validation->run() === FALSE) {
        $errors = str_replace(array("\r","\n","<p>","</p>"),array("<br/>","<br/>","",""),validation_errors());
        $this->session->set_flashdata('error', $errors);
        redirect('dashboard/privillage');
      }
      else {
        # Loading Models 
        $this->load->model('globals/model_update');

        /***** Data Definition *****/
        $dbres = self::$_Default_DB;
        $tablename = "access_roles_privileges_user";
        $request_data = ['group_id'  => $this->input->post('systemrole')];
        $where_condition = ['user_id' => $this->input->post('user')];
        /***** Data Definition *****/

        /******** Insertion Of New Data ***********/
        $save_data = $this->model_update->update_info($dbres,$tablename,$return_dataType="php_object",$request_data,$where_condition);
        
        if($save_data) 
          $this->session->set_flashdata('success', "Role Successful Changed");
        else
          $this->session->set_flashdata('error', "Changing Role Failed");

        redirect('dashboard/privillage');
        /******** Insertion Of New Data ***********/
      }
      else :
        $this->session->set_flashdata('error', 'Changing Role Failed');
        redirect('dashboard/');

      endif;
  }

  /**************************
    Saving New User
  **************************/
  public function userstatus($status,$userid) {
    if(in_array('Users',$_SESSION['user']['roles'])) :
        # Loading Models 
        $this->load->model('globals/model_update');

        /***** Data Definition *****/
        $dbres = self::$_Default_DB;
        $tablename = "access_users";
        $where_condition = ['id' => $userid];
        $update_data = [ 'status'  => $status ];
        /***** Data Definition *****/

        /******** Insertion Of New Data ***********/
        $save_data = $this->model_update->update_info($dbres,$tablename,$return_dataType="php_object",$update_data,$where_condition);

        if($save_data) 
          $this->session->set_flashdata('success', "Status Change Successful");
        else
          $this->session->set_flashdata('error', "Status Change Failed");

        redirect('dashboard/users');
        /******** Insertion Of New Data ***********/
      
      else :
        $this->session->set_flashdata('error', 'Updating User Failed');
        redirect('dashboard/');

      endif;
  }

  /**************************
    Get All Users => Datatable
  **************************/
  public function getallusers_json() 
  {
    if(!isset($_SESSION['user']['username']) && in_array('Users',$_SESSION['user']['roles']))
      redirect('access');
    else
    {
      # Loading Models
      $this->load->model('globals/model_retrieval');

      $dbres = self::$_Default_DB;
      $tablename = "vw_user_details";
      $condition = array(
        'where_condition' => ['status !=' => "deleted"],
        'orderby'=> ['id' => "Desc"]
      );

      $query_result = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition,$return_dataType="json");
      print_r($query_result); 
    }
  }
  /********** User Management **********/



  # Generating Invoice
  public function generatereport() 
  {
    if(in_array('Report',$_SESSION['user']['roles']))
    {
      $this->form_validation->set_rules('department','Department','trim');
      $this->form_validation->set_rules('createdby','Created By','trim');
      $this->form_validation->set_rules('assignee','Assigned To','trim');
      $this->form_validation->set_rules('issue_type','Issue Type','trim');
      $this->form_validation->set_rules('complain_type','Complain Type','trim');
      $this->form_validation->set_rules('starttime','Start Time','trim');
      $this->form_validation->set_rules('endtime','EndTime','trim');

      if($this->form_validation->run() === FALSE) {
        $errors = str_replace(array("\r","\n","<p>","</p>"),array("<br/>","<br/>","",""),validation_errors());
        print_r(json_encode(['status' => ERROR, 'error' => $errors]));
      }
      else {
        # Loading Models 
        $this->load->model('globals/model_retrieval');

        /***** Data Definition *****/
        $dbres = self::$_Default_DB;
        $tablename = "vw_requests";

        $department_id = ($this->input->post('department')) ? ['department_id' => $this->input->post('department')] : array();
        $complain_id = ($this->input->post('complain_type')) ? ['complain_id' => $this->input->post('complain_type')] : array();
        $issue_type = ($this->input->post('issue_type')) ? ['type' => $this->input->post('issue_type')] : array();
        $createdby = ($this->input->post('createdby')) ? ['email' => $this->input->post('createdby')] : array();
        $assignee = ($this->input->post('assignee')) ? ['assigned_to' => $this->input->post('assignee')] : array();
        $starttime = ($this->input->post('starttime')) ? ['DATE(date_created) >=' => date('Y-m-d', strtotime($this->input->post('starttime')))] : array();
        $endtime = ($this->input->post('endtime')) ? ['DATE(date_created) <=' => date('Y-m-d', strtotime($this->input->post('endtime')))] : array();
        
        $where_condition = ['where_condition' => array_merge($department_id, $complain_id, $issue_type, $starttime, $endtime, $createdby, $assignee)];
        /***** Data Definition *****/

        /******** Insertion Of New Data ***********/
        $save_data = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$where_condition);

        if($save_data) {
          foreach ($save_data as $key => $value) {
            # code...
            $save_data[$key]->date_created = date('D d M, Y', strtotime($value->date_created));
            $date_resolved = date('D d M, Y', strtotime($value->date_solved));
            $save_data[$key]->date_solved = ($date_resolved == "Thu 01 Jan, 1970") ? "" : $date_resolved ;
          }
          $reponseData = $save_data;
        }
        else
          $reponseData = "";

        print_r(json_encode($reponseData));
        /******** Insertion Of New Data ***********/
      }
    }
    else 
      print_r(json_encode($returndata = ['status' => ERROR, 'error' => "Permission Denied"]));
  }






}//End of Class
