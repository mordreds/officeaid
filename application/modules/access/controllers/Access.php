<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends MX_Controller 
{
  /************** Interfaces *****************/
    /*******************************
      Constructor 
    *******************************/
    public function __construct() {
      parent::__construct();
    }

    /*******************************
           Logout
    *******************************/
    public function logout() {
      if(isset($_SESSION['user']['username']) && isset($_SESSION['user']['login_id']) ) 
      {
        $this->load->model('model_access');
        $result = $this->model_access->logout_user(self::$_Audit_DB,'successful_logins',$_SESSION['user']['login_id']);
        
        if($result) {
          session_destroy();
          redirect('access');
        } 
        
        else {
          $this->session->set_flashdata('error',"Log Out Failed");
          redirect('dashboard');
        }
      }
      else
         redirect('access/login');
    }

    /*******************************
      Index Function
    *******************************/
    public function index() 
    {
      $this->login();
    }

    /*******************************
      Login 
    *******************************/
    public function login() 
    {
      if(isset($_SESSION['user']['username']) && isset($_SESSION['user']['roles']))
        redirect('dashboard');
      else
      {
        $title['title'] = "OfficeAid"; 
        $this->load->view('login_header',$title); 
        $this->load->view('login'); 
        $this->load->view('login_footer'); 
      }
    }
     /*******************************
      reception 
    *******************************/
    public function request() 
    {
      if(isset($_SESSION['user']['username']) && isset($_SESSION['user']['roles']))
        redirect('access');
      else
      {
        # Loading Models
        $this->load->model("globals/model_retrieval");

        $dbres = self::$_Default_DB;
        $tablename = "departments";
        $data['departments'] = $this->model_retrieval->retrieve_allinfo($dbres,$tablename); 
        
        $title['title'] = "Request | OfficeAid"; 
        $title['pageName'] = "New Request"; 
        $this->load->view('login_header',$title); 
        $this->load->view('nav',$title); 
        $this->load->view('enquire',$data); 
        $this->load->view('login_footer'); 
      }
    }
  /*******************************
      All Requests
  *******************************/
  public function allrequests() 
  {
    if(isset($_SESSION['user']['username']) && isset($_SESSION['user']['roles']))
      redirect('access');
    else
    {
      $title['title'] = "History | OfficeAid"; 
      $title['pageName'] = "All Tickets"; 
      $this->load->view('login_header',$title); 
      $this->load->view('nav',$title); 
      $this->load->view('allrequests'); 
      $this->load->view('login_footer'); 
    }
  }

  /*******************************
      All requests Json
  *******************************/
  public function allrequests_json() 
  {
    if(isset($_SESSION['user']['username']) && isset($_SESSION['user']['roles']))
      redirect('access');
    else
    {
      # Loading Models
      $this->load->model('globals/model_retrieval');

      $dbres = self::$_Default_DB;
      $tablename = "vw_requests";
      $condition = array(
        'where_condition' => ['status' => "active"],
        'orderby'=> ['id' => "Desc"]
      );

      $query_result = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition,$return_dataType="json");
      print_r($query_result); 
    }
  }

   /*******************************
     confirm 
    *******************************/
    public function confirm() 
    {
      if(isset($_SESSION['user']['username']) && isset($_SESSION['user']['roles']))
        redirect('dashboard');
      else
      {
        $title['title'] = "Send | OfficeAid"; 
        $this->load->view('login_header',$title); 
        $this->load->view('confirm'); 
        $this->load->view('login_footer'); 
      }
    }
  /**************** Interface ********************/

  /**************** Insertions ********************/
    /*******************************
     confirm 
    *******************************/
    public function save_request() {
      $this->form_validation->set_rules('department','Department','trim|required');
      $this->form_validation->set_rules('subject','Subject','trim|required');
      $this->form_validation->set_rules('description','Description','trim|required');
      $this->form_validation->set_rules('creator_name','Your Name','trim|required');
      $this->form_validation->set_rules('creator_contact','Your Contact','trim|required');
      $this->form_validation->set_rules('priority','Priority','trim|required');
      $this->form_validation->set_rules('date','Date','trim|required');

      if($this->form_validation->run() === FALSE) {
        $errors = str_replace(array("\r","\n","<p>","</p>"),array("<br/>","<br/>","",""),validation_errors());
        $result = json_encode(array('error' => $errors));
        print_r($result); exit;
      }
      else {
        $this->load->model('globals/model_insertion');
        /***** Data Definition *****/
        $dbres = self::$_Default_DB;
        $tablename = "requests";
        $request_data = [
          'sender_name' => ucwords($this->input->post('creator_name')),
          'sender_contact' => ucwords($this->input->post('creator_contact')),
          'subject' => ucwords($this->input->post('subject')),
          'description' => ucwords($this->input->post('description')),
          'priority' => ucwords($this->input->post('priority')),
          'file_id' => 0,
          'due_date' => ucwords($this->input->post('date')),
          'department_id' => ucwords($this->input->post('department')),
        ];
        //print_r($request_data); exit;
        /***** Data Definition *****/
        /******** Insertion Of New Data ***********/
        $save_data = $this->model_insertion->datainsert($dbres,$tablename,$request_data);
  
        if(is_int($save_data)) 
          $result = json_encode(array('ticketNo' => str_pad($save_data, 7, 0,STR_PAD_LEFT)));
        
        else 
          $result = json_encode(array('error', 'Saving Data Failed'));

        print_r($result);
        /******** Insertion Of New Data ***********/
        
      }
    }
  /**************** Insertions ********************/

  /**************** Other Functions **********************/

}//End of Class
