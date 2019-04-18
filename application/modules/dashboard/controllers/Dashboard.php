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
      
        $title['title'] = "OfficeAid| Users"; 
        $this->load->view('header',$title); 
        $this->load->view('users'); 
        $this->load->view('footer'); 
      
    
  /**************** Interface ********************/
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
      # Loading Models
      $this->load->model("globals/model_retrieval");

      # Retrieving All Request
      $dbres = self::$_Default_DB;
      $tablename = "requests";
      $where_condition = array(
        'wherein_condition' => array('status' => "Pending,Processing"),
      );
      $data['allrequests'] = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$where_condition);

      $title['title'] = "OfficeAid| Assigned Jobs"; 
      $this->load->view('header',$title); 
      $this->load->view('admin_nav',$title);
      $this->load->view('job',$data); 
      $this->load->view('footer'); 
      
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
        'where_condition' => ['email' => $_SESSION['user']['username']],
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
}//End of Class
