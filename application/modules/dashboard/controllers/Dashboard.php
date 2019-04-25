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
      //print "<pre>"; print_r($_SESSION['user']); 
        $title['title'] = "OfficeAid| Admin"; 
        $this->load->view('header',$title); 
        $this->load->view('admin_nav',$title); 
        $this->load->view('dashboard'); 
        $this->load->view('footer'); 
      
    
	/**************** Interface ********************/
   } 

      public function report() 
    {
      
        $title['title'] = "OfficeAid| Reports"; 
        $this->load->view('header',$title); 
        $this->load->view('report'); 
        $this->load->view('footer'); 
      
    
  /**************** Interface ********************/
   }

     public function control()
    {
      
        $title['title'] = "OfficeAid| Controls"; 
        $this->load->view('header',$title); 
        $this->load->view('admin_nav',$title);
        $this->load->view('control'); 
        $this->load->view('footer'); 
      
    
  /**************** Interface ********************/
}
  public function users() 
  {
    if(in_array('UserMgmt',$_SESSION['user']['roles'])) :
      # Loading Models
      $this->load->model("globals/model_retrieval");

      # Retrieving All Departments
      $dbres = self::$_Default_DB;
      $tablename = "departments";
      $data['departments'] = $this->model_retrieval->retrieve_allinfo($dbres,$tablename);

      $title['title'] = "OfficeAid| Users"; 
      $this->load->view('header',$title); 
      $this->load->view('users',$data); 
      $this->load->view('footer'); 
    else :
      redirect('dashboard/','refresh');
    endif;
}
  public function privillage()
    {
      
        $title['title'] = "OfficeAid| Set Privillages"; 
        $this->load->view('header',$title); 
        $this->load->view('privillage'); 
        $this->load->view('footer'); 
      
    
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

      $dbres = self::$_Default_DB;
      $tablename = "vw_requests";
      $condition = array(
        'wherein_condition' => [
          'status' => "pending,processing",
        ],
        'orderby'=> ['id' => "Desc"]
      );

      $query_result = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition,$return_dataType="json");
      print_r($query_result); 
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

public function stationary()
    {
      
        $title['title'] = "OfficeAid| Assigned Jobs"; 
        $this->load->view('header',$title); 
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
    if(in_array('UserMgmt',$_SESSION['user']['roles'])) :
      $this->form_validation->set_rules('fullname','Ticket ID','trim|required');
      $this->form_validation->set_rules('email','Email','trim|required');
      $this->form_validation->set_rules('phone_number','Phone Number','trim|required');
      $this->form_validation->set_rules('department','Department','trim|required');
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
          'passwd'  => password_hash($this->input->post('fullname'), PASSWORD_DEFAULT),
          'department_id' => $this->input->post('department'),
          'phone_number' => ucwords($this->input->post('phone_number')),
          'created_by' => $_SESSION['user']['id']
        ];
        /***** Data Definition *****/

        /******** Insertion Of New Data ***********/
        $save_data = $this->model_insertion->datainsert($dbres,$tablename,$request_data);

        if($save_data) 
          $this->session->set_flashdata('success', 'Saving User Successful');
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

  /**************************
    Get All Users => Datatable
  **************************/
  public function getallusers_json() 
    {
      if(!isset($_SESSION['user']['username']) && in_array('UserMgmt',$_SESSION['user']['roles']))
        redirect('access');
      else
      {
        # Loading Models
        $this->load->model('globals/model_retrieval');

        $dbres = self::$_Default_DB;
        $tablename = "vw_user_details";
        $condition = array(
          'orderby'=> ['id' => "Desc"]
        );

        $query_result = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition,$return_dataType="json");
        print_r($query_result); 
      }
    }
  /********** User Management **********/










}//End of Class
