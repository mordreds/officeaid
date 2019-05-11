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
        $result = $this->model_access->logout_user(self::$_Default_DB,'access_login_successful',$_SESSION['user']['login_id']);
        
        if($result) {
          session_destroy();
          redirect('access');
        } 
        
        else {
          $this->session->set_flashdata('error',"Log Out Failed");
          redirect('access');
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
      # Retrieving Total Count of Requests
      $dbres = self::$_Default_DB;
      $this->load->model('globals/model_retrieval');

      # Getting all count of pending requests
      $tablename = "requests";
      $where_condition = array('status' => "pending", 'type' => "ticket");
      $data['totalRequests'] = $this->model_retrieval->return_count($dbres,$tablename,$where_condition);

      # Getting count of all completed requests
      $tablename = "requests";
      $where_condition = ['email' => @$_SESSION['user']['username']];
      $data['totalRequestsCompleted'] = $this->model_retrieval->return_count($dbres,$tablename,$where_condition);

      # Getting count of all files
      $tablename = "files";
      $where_condition = [];
      $data['totalfiles'] = $this->model_retrieval->return_count($dbres,$tablename,$where_condition);
      
      # Retrieving Company Details
      $tablename = "company_info";
      $where_condition = ['where_condition' => array('id' => 1)];
      $data['companyinfo'] = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$where_condition);
      $title['title'] = "OfficeAid"; 
      $this->load->view('login_header',$title); 
      $this->load->view('login',$data); 
      $this->load->view('modals'); 
      $this->load->view('login_footer'); 
      
    }
     /*******************************
      reception 
    *******************************/
    public function request() 
    {
        # Loading Models
        $this->load->model("globals/model_retrieval");

        # Retrieving All complains
        $dbres = self::$_Default_DB;
        $tablename = "complains";
        $where_condition = ['where_condition' => ['status' => "active"]];
        $data['allcomplains'] = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$where_condition); 

        # Retrieving All complains
        $tablename = "departments";
        $where_condition = ['where_condition' => ['status' => "active", 'type' => 1]];
        $title['alldepartments'] = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$where_condition); 

        # Retrieving All complains
        $tablename = "departments";
        $where_condition = ['where_condition' => ['status' => "active", 'type' => 2]];
        $title['allbranches'] = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$where_condition); 

        # Retrieving Company Details
        $tablename = "company_info";
        $where_condition = ['where_condition' => array('id' => 1)];
        $title['companyinfo'] = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$where_condition);

        # Retrieving Company Details
        $tablename = VIEW_USER_TABLE;
        $where_condition = ['where_condition' => array('status' => "active")];
        $data['allusers'] = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$where_condition);
        
        $title['title'] = "Request | OfficeAid"; 
        $title['pageName'] = "New Request"; 
        $this->load->view('login_header',$title); 
        $this->load->view('nav',$title); 
        $this->load->view('enquire',$data); 
        $this->load->view('login_footer'); 
    }
  /*******************************
      All Requests
  *******************************/
  public function allrequests() 
  {
    if(!isset($_SESSION['user']['username']) && !isset($_SESSION['user']['roles']))
      redirect('access');
    else
    {
      # Loading Models
      $this->load->model("globals/model_retrieval");
      $dbres = self::$_Default_DB;

      # Retrieving Company Details
      $tablename = "company_info";
      $where_condition = ['where_condition' => array('id' => 1)];
      $title['companyinfo'] = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$where_condition);

      $title['title'] = "History | OfficeAid"; 
      $title['pageName'] = "All Tickets"; 
      
      $this->load->view('login_header',$title); 
      $this->load->view('nav',$title); 
      $this->load->view('allrequests'); 
      $this->load->view('modals'); 
      $this->load->view('login_footer'); 
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
        'where_condition' => array('email' => $_SESSION['user']['username'], 'status !=' => "closed"),
        /*'wherein_condition' => [
          'status' => "pending,processing",
        ],*/
        'orderby'=> ['id' => "Desc"]
      );

      $query_result = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition,$return_dataType="json");
      print_r($query_result); 
    }
  }

  /*******************************
      All Files Json
  *******************************/
  public function allfiles_json($deparmtent = 1) 
  {
    # Loading Models
    $this->load->model('globals/model_retrieval');
    $files_icons = [
      'doc' => "fa fa-file-word-o",
      'docx' => "fa fa-file-word-o",
      'pdf' => "fa fa-file-pdf-o",
      'txt' => "fa fa-file-text-o",

      'image' => "fa fa-file-image-o",

      'xls' => "fa fa-file-excel-o",
      'xlsx' => "fa fa-file-excel-o",

      'zip' => "fa fa-file-archive-o",
      'rar' => "fa fa-file-archive-o"
    ];

    $response_data = array();
    $dbres = self::$_Default_DB;
    $tablename = "vw_files";
    $condition = array(
      'where_condition' => array('department_id' => $deparmtent)
    );

    $query_result = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition);
    
    if(!empty($query_result)) {

      foreach ($query_result as $key => $value) {
        # building display array
        if($value->status == "Public") 
          $color = "color: #428c01";
        else
          $color = "color: #ff2d2d";

        $fileicon = $files_icons[$value->filetype];
        if($value->status == "Private")
          $filepath = '<a href="#" class="verify_file" style="'.$color.'" data-id="'.base64_encode($value->id).'" data-stats="'.$value->status.'"><span class="fa '.$fileicon.' fa-2x"></span></a>';
        else
          $filepath = '<a href="'.base_url().$value->filepath.'" style="'. $color .'" data-id="'.base64_encode($value->id).'" data-stats="'.$value->status.'"><span class=" '.$fileicon.' fa-2x"></span></a>';
        //print "<pre>"; print_r($filepath); print "</pre>"; continue;
        $response_data[$key] = [
          'id' => $value->id,
          'subject' => $value->subject,
          'createdby' => $value->fullname,
          'filetype' => $value->filetype,
          'filepath' => $filepath,
          'status' => $value->status
        ];

        # Retrieving group files
        $tablename = "files_additions";
        $condition = ['where_condition' => ['file_id' => $value->id]];
        $query = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition);
        
        if(!empty($query)) {
          foreach ($query as $otherfiles) {
            # code...
            $fileicon = $files_icons[$otherfiles->filetype];
            if($value->status == "Private")
              $filepath = ' <a href="#" class="verify_file" style="'. $color .'" data-id="'.base64_encode($value->id).'" data-stats="'.$value->status.'"><span class="fa '.$fileicon.' fa-2x"></span></a>';
            else
              $filepath = ' <a href="'.base_url().$value->filepath.'" style="'. $color .'" data-id="'.base64_encode($value->id).'" data-stats="'.$value->status.'"><span class=" '.$fileicon.' fa-2x"></span></a>';
            @$response_data[$key]['filepath'] .= $filepath;
          }
        }

      }
    }
    
    print_r(json_encode($response_data));
    
  }
   /*******************************
     confirm 
    *******************************/
    public function ftp() 
    {
      # Loading Models
      $this->load->model('globals/model_retrieval');

      # Retrieving Company Details
      $tablename = "company_info";
      $dbres = self::$_Default_DB;
      $where_condition = ['where_condition' => array('id' => 1)];
      $title['companyinfo'] = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$where_condition);

      # Retrieving All Departments
      $tablename = "departments";
      $where_condition = array('status' => "active");
      $data['departments'] = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$where_condition); 

      # retrieving all departments
      $tablename = "departments";
      $condition = array(
        'where_condition' => ['status' => "active", 'type' => 1],
        'orderby'=> ['id' => "Desc"]
      );
      $query_result = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition);
      if(!empty($query_result)) : 
        foreach($query_result as $key => $val) : 
          # retrieving department's count 
            $tablename = "files";
            $where_condition = [
              'department_id' => $val->id
            ];
            $query_result[$key]->filescount = $this->model_retrieval->return_count($dbres,$tablename,$where_condition);
        endforeach;
      endif;
      $title['alldepartments'] = $query_result;

      # retrieving all branches
      $tablename = "departments";
      $condition = array(
        'where_condition' => ['status' => "active", 'type' => 2],
        'orderby'=> ['id' => "Desc"]
      );
      $query_result = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition);
      if(!empty($query_result)) : 
        foreach($query_result as $key => $val) : 
          # retrieving department's count 
            $tablename = "files";
            $where_condition = [
              'department_id' => $val->id
            ];
            $query_result[$key]->filescount = $this->model_retrieval->return_count($dbres,$tablename,$where_condition);
        endforeach;
      endif;
      $title['allbranches'] = $query_result;

      # Retrieving All Users
      $tablename = "access_users";
      $where_condition = array('status' => "active");
      $data['allusers'] = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$where_condition); 
      
      $title['title'] = "Send | OfficeAid"; 
      $title['pageName'] = "All Files"; 

      $this->load->view('login_header',$title); 
      $this->load->view('nav',$title); 
      $this->load->view('ftp',$data); 
      $this->load->view('modals'); 
      $this->load->view('login_footer'); 
      
    }
  /**************** Interface ********************/

   /*******************************
     confirm 
    *******************************/
    public function files() 
    {
      # Loading Models
      $this->load->model('globals/model_retrieval');

      # Retrieving Company Details
      $tablename = "company_info";
      $dbres = self::$_Default_DB;
      $where_condition = ['where_condition' => array('id' => 1)];
      $title['companyinfo'] = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$where_condition);
      
      # retrieving all departments
      $tablename = "departments";
      $condition = array(
        'where_condition' => ['status' => "active",  'type' => 1],
        'orderby'=> ['id' => "Desc"]
      );
      $query_result = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition);
      if(!empty($query_result)) : 
        foreach($query_result as $key => $val) : 
          # retrieving department's count 
            $tablename = "files";
            $where_condition = [
              'department_id' => $val->id
            ];
            $query_result[$key]->filescount = $this->model_retrieval->return_count($dbres,$tablename,$where_condition);
        endforeach;
      endif;
      $data['alldepartments'] = $query_result;
      $title['alldepartments'] = $query_result;

      # retrieving all branches
      $tablename = "departments";
      $condition = array(
        'where_condition' => ['status' => "active", 'type' => 2],
        'orderby'=> ['id' => "Desc"]
      );
      $query_result = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$condition);
      if(!empty($query_result)) : 
        foreach($query_result as $key => $val) : 
          # retrieving department's count 
            $tablename = "files";
            $where_condition = [
              'department_id' => $val->id
            ];
            $query_result[$key]->filescount = $this->model_retrieval->return_count($dbres,$tablename,$where_condition);
        endforeach;
      endif;
      $title['allbranches'] = $query_result;

      
      $title['title'] = "Send | OfficeAid"; 
      $title['pageName'] = "All Files"; 
      $this->load->view('login_header',$title); 
      $this->load->view('nav',$title); 
      $this->load->view('files',$data); 
      $this->load->view('login_footer'); 
      
    }
  /**************** Interface ********************/

  /**************** Insertions ********************/
    
    public function save_request() {
      $this->form_validation->set_rules('subject','Subject','trim|required');
      $this->form_validation->set_rules('description','Description','trim|required');
      $this->form_validation->set_rules('email','Email','trim|required');
      $this->form_validation->set_rules('creator_contact','Your Contact','trim|required');
      $this->form_validation->set_rules('priority','Priority','trim|required');
      $this->form_validation->set_rules('complain','Complain','trim|required');

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
          'email' => ucwords($this->input->post('email')),
          'sender_contact' => ucwords($this->input->post('creator_contact')),
          'subject' => ucwords($this->input->post('subject')),
          'description' => ucwords($this->input->post('description')),
          'priority' => ucwords($this->input->post('priority')),
          'type' => "ticket",
          'complain_id' => $this->input->post('complain'),
          'file_id' => 0,
          /*'due_date' => ucwords($this->input->post('date')),
          'department_id' => ucwords($this->input->post('department')),*/
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

    public function save_task() {
      $this->form_validation->set_rules('subject','Subject','trim|required');
      $this->form_validation->set_rules('description','Description','trim|required');
      $this->form_validation->set_rules('assignedto','User','trim|required');
      $this->form_validation->set_rules('duedate','Date','trim|required');
      /*$this->form_validation->set_rules('date','Date','trim|required');*/

      if($this->form_validation->run() === FALSE) {
        $errors = str_replace(array("\r","\n","<p>","</p>"),array("<br/>","<br/>","",""),validation_errors());
        $this->session->set_flashdata('error', $errors);
        redirect('dashboard/task');
      }
      else {
        $this->load->model('globals/model_insertion');
        /***** Data Definition *****/
        $dbres = self::$_Default_DB;
        $tablename = "requests";
        $request_data = [
          'email' => $_SESSION['user']['username'],
          'subject' => ucwords($this->input->post('subject')),
          'description' => ucwords($this->input->post('description')),
          'assigned_to' => ucwords($this->input->post('assignedto')),
          'duedate' => date('Y-m-d', strtotime($this->input->post('duedate'))),
          'type' => "task"
        ];
        /***** Data Definition *****/
        /******** Insertion Of New Data ***********/
        $save_data = $this->model_insertion->datainsert($dbres,$tablename,$request_data);
  
        if(is_int($save_data)) 
          $this->session->set_flashdata('success', "Saving Task Successful");
        else 
          $this->session->set_flashdata('error', 'Saving Task Failed');

        redirect('dashboard/task');
        /******** Insertion Of New Data ***********/
      }
    }

    public function savefile() {
      $this->form_validation->set_rules('accesstype','Accesstype','trim|required');
      $this->form_validation->set_rules('filecode','Private Pin','trim');
      $this->form_validation->set_rules('department','Department','trim|required');
      $this->form_validation->set_rules('createdby','Email','trim|required');
      $this->form_validation->set_rules('subject','Your Subject','trim|required');

      if($this->form_validation->run() === FALSE) {
        $errors = str_replace(array("\r","\n","<p>","</p>"),array("<br/>","<br/>","",""),validation_errors());
        $this->session->set_flashdata('error',$errors);
        redirect('access/ftp');
      }
      else {
        /***** Data Definition *****/
        $this->load->model('globals/model_insertion');
        $this->load->model('globals/model_retrieval');
        $this->load->helper('file_restriction');
        /***** Data Definition *****/
        $dbres = self::$_Default_DB;
        $tablename = "files";

        # uploading File
        $fileArray = reArrayFiles($_FILES['file']);
        $counter = $lastinsertid = 0;
        
        # variable defintion
        $request_data = [
          'status' => $this->input->post('accesstype'),
          'filecode' => $this->input->post('filecode'),
          'department_id' => $this->input->post('department'),
          'createdby' => $this->input->post('createdby'),
          'subject' => ucwords($this->input->post('subject'))
        ];

      # Single File Upload
        # Checking for private files
        if($request_data['status'] == "Private") {
          if(empty($request_data['filecode'])) {
            $this->session->set_flashdata('error',"File Code Required");
            redirect('access/ftp');
          }
        }

        $project_name = $request_data['createdby']."-".date('Y-m-d-H-i-s')."-".rand(1111111,9999999);
        $target_dir = "uploads/";
        //print "<pre>"; print_r($file); print "<pre>"; exit;
        $fileresponse = doc_restriction($fileArray[0],$project_name,$target_dir);

        if(@$fileresponse['error']) {
          $this->session->set_flashdata('error', $fileresponse['error']);
          redirect('access/ftp');
        }
        else {
          $request_data['filetype'] = $fileresponse['extension'];
          $request_data['filepath'] = $fileresponse['imgpath'];
        }

        $save_data = $this->model_insertion->datainsert($dbres,$tablename,$request_data);
        
        # Multiple Uploads
        if(sizeof($fileArray) > 1) {
          # Removing first element off the array
          $lastinsertid = $save_data;
          array_shift($fileArray);
          $request_data = array();

          foreach ($fileArray as $key => $file_array) {
            # variable defintion
            $tablename = "files_additions";
            $request_data[$key] = [
              'status' => $this->input->post('accesstype'),
              'filecode' => $this->input->post('filecode'),
              'department_id' => $this->input->post('department'),
              'createdby' => $this->input->post('createdby'),
              'subject' => ucwords($this->input->post('subject')),
              'file_id' => $lastinsertid
            ];

            $project_name = $request_data[$key]['createdby']."-".date('Y-m-d-H-i-s')."-".rand(1111111,9999999);
            $target_dir = "uploads/";
            $fileresponse = doc_restriction($file_array,$project_name,$target_dir);

            if(@$fileresponse['error']) {
              $this->session->set_flashdata('error', $fileresponse['error']);
              redirect('access/ftp');
            }
            else {
              $request_data[$key]['filetype'] = $fileresponse['extension'];
              $request_data[$key]['filepath'] = $fileresponse['imgpath'];
            }
          }

          //print "<pre>"; print_r($request_data); print "<pre>"; exit;
          $save_data = $this->model_insertion->batchinsert($dbres,$tablename,$request_data);
        }
        
        /******** Insertion Of New Data ***********/
        if($save_data) 
          $this->session->set_flashdata('success', 'Saving Data Successful');
        else 
          $this->session->set_flashdata('error', 'Saving Data Failed');

        redirect('access/ftp');
        /******** Insertion Of New Data ***********/
      }
    }

    public function verifycode() {
      $this->form_validation->set_rules('filecode','File Code','trim|required');

      if($this->form_validation->run() === FALSE) {
        $errors = str_replace(array("\r","\n","<p>","</p>"),array("<br/>","<br/>","",""),validation_errors());
        $result = json_encode(array('status' => ERROR,'error' => $errors));
        print_r($result); exit;
      }
      else {
        $this->load->model('globals/model_retrieval');
        /***** Data Definition *****/
        $dbres = self::$_Default_DB;
        $tablename = "files";
        $where_condition = [
          'where_condition' => ['filecode' => $this->input->post('filecode')]
        ];
        /******** Insertion Of New Data ***********/
        $save_data = $this->model_retrieval->retrieve_allinfo($dbres,$tablename,$where_condition);
        
        if(!empty($save_data)) 
          $responseData = [
            'status' => SUCCESSFUL, 
            'message' => '<a href="'.base_url().$save_data[0]->filepath.'" target="_blank" class="btn btn-primary btn--icon btn--icon-stacked btn--anon d-none d-lg-block"><span class="text"></span> Download Now</a>'
          ];

        else
          $responseData = [
            'status' => ERROR, 
            'error' => "Invalid File Code. Try Again"
          ];

        print_r(json_encode($responseData));
        /******** Insertion Of New Data ***********/
        
      }
    }

    public function updaterequest() {
      $this->form_validation->set_rules('id','Record','trim|required');
      $this->form_validation->set_rules('description','Description','trim|required');
      $this->form_validation->set_rules('redirect_url','Redirect Url','trim|required');

      if($this->form_validation->run() === FALSE) {
        $errors = str_replace(array("\r","\n","<p>","</p>"),array("<br/>","<br/>","",""),validation_errors());
        $result = json_encode(array('error' => $errors));
        print_r($result); exit;
      }
      else {
        $this->load->model('globals/model_update');
        /***** Data Definition *****/
        $dbres = self::$_Default_DB;
        $tablename = "requests";
        $update_data = [ 'description' => ucwords($this->input->post('description')) ];
        $where_condition = ['id' => $this->input->post('id')];
        /***** Data Definition *****/
        /******** Insertion Of New Data ***********/
        $save_data = $this->model_update->update_info($dbres,$tablename,$return_dataType="php_object",$update_data,$where_condition);

        if($save_data) 
          $this->session->set_flashdata('success', "Record Update Successful");
        else
          $this->session->set_flashdata('error', "Record Update Failed");

        redirect($this->input->post('redirect_url'));
        /******** Insertion Of New Data ***********/
        
      }
    }
  /**************** Insertions ********************/

  /**************** Other Functions **********************/
    /***********************************************
      Login Validation 
    ************************************************/ 
    public function login_validation() 
    {
      $this->form_validation->set_rules('username', 'Username', 'required|trim');
      $this->form_validation->set_rules('password', 'Password', 'required|trim');

      if($this->form_validation->run() === FALSE) 
      {
        $response_data = [
          'status' => ERROR,
          'error' =>str_replace(array("\r","\n","<p>","</p>"),array("<br/>","<br/>","",""),validation_errors())
        ];
        print_r(json_encode($response_data)); exit;
      }
      else 
        {
          # Loading Helper / Models
          $this->load->model('model_access');
          $this->load->model('globals/model_retrieval');

          # Performing Database Verfication ==> Username
          $username = $this->input->post('username',TRUE);
          $password = $this->input->post('password',TRUE);
          $where_condition = ['username' => $username];
                
          $user = $this->model_retrieval->all_info_return_row(self::$_Default_DB,VIEW_USER_TABLE,$where_condition);
          
          if(empty($user)){
            $response_data = [
              'status' => ERROR,
              'error' =>"Invalid Username / Password Combination"
            ];
            print_r(json_encode($response_data)); 
          }

          # Deleted Accounts
          else if($user->status == "deleted") {
            $response_data = [
              'status' => ERROR,
              'error' =>"Invalid Username / Password Combination"
            ];
            print_r(json_encode($response_data)); 
          }
          # Inactive Accounts
          else if($user->status == "inactive") {
            $response_data = [
              'status' => ERROR,
              'error' =>"<strong>Your Account Has Been Disabled</strong>.<br/> Please Contact Your Administrator"
            ];
            print_r(json_encode($response_data)); 
          }
          # Active Accounts
          else if($user->status == "active") {
            # Login Attempt
            if($user->login_attempt <= 0 ) {
              $response_data = [
                'status' => ERROR,
                'error' =>"Login Attempts Exceeded. Please Contact Your Administrator"
              ];
              print_r(json_encode($response_data)); 
            }
            else {
              # Password Verifications
              $user_password = ($user->passwd) ? $user->passwd : $user->default_passwd;
              
              if(!empty($user_password)) {
                # Calling Helper
                $this->load->helper('encryption');
                # Password Match Found
                if(password_decrypt($password, $user_password)) { 
                  /************************ Retrieving Company Info ********************/
                    $companyinfo = $this->model_retrieval->all_info_return_row(self::$_Default_DB,VIEW_COMPANY_TABLE);
                    
                    if(!empty($companyinfo->name)) {
                      $session_array['companyinfo'] = [  
                        'id'            => $companyinfo->id,
                        'name'          => $companyinfo->name,
                        'telephone_1'   => $companyinfo->telephone_1,
                        'telephone_2'   => $companyinfo->telephone_2,
                        'fax'           => $companyinfo->fax,
                        'email'         => $companyinfo->email,
                        'postal_address'    => $companyinfo->postal_address,
                        'residence_address' => $companyinfo->residence_address,
                        'website'           => $companyinfo->website,
                        'tin_number'    => $companyinfo->tin_number,
                        'date_of_commence' => $companyinfo->date_of_commence,
                        'mission' => $companyinfo->mission,
                        'vision' => $companyinfo->vision,
                        'logo' => $companyinfo->logo_id
                      ];
                    } 
                    else {
                      $redirect = base_url()."settings/company";
                      $session_array['companyinfo']['name'] = "Company Name" ;
                    }
                  /************************ End of Company Info ********************/
                  //print "<pre>"; print_r($user); print "</pre>"; exit;
                  /************************ User Roles & Priviledges ********************/
                    if(!empty($user) && $user->user_roles_status == "active") {
                      $custom_roles = $user->custom_roles;
                      $custom_privileges  = $user->custom_privileges;
                      $group_id         = $user->group_id;
                      $group_roles      = $user->group_roles; 
                      # If user has no roles completely
                      
                      if(empty($custom_roles) && empty($group_roles)) {
                        $response_data = [
                          'status' => ERROR,
                          'error' =>"No Permissions Set For User.<br/>Please Contact Administrator"
                        ];
                        print_r(json_encode($response_data)); 
                      }
                      # If user belongs to a group or has custom roles & priviledges
                      else {
                        if(!empty($user)) {
                          $temp_array['group_roles'] = explode("|",trim($user->group_roles));
                          $temp_array['group_privileges'] = explode("|",trim($user->group_privileges));
                        } else {
                          $temp_array['group_roles'] = $temp_array['group_priviledges'] = array();
                        }
                        # Custom roles and priviledges processing
                        if(!empty($custom_roles) || !empty($custom_privileges)) {
                          $temp_array['custom_roles'] = explode("|",$custom_roles);
                          $temp_array['custom_privileges'] = explode("|",$custom_privileges);
                        } else {
                          $temp_array['custom_roles'] = $temp_array['custom_privileges'] = array();
                        }
                        # assignment into session variable
                        $user_roles['roles'] = array_merge($temp_array['group_roles'],$temp_array['custom_roles']);
                        $user_privileges['privileges'] = array_merge($temp_array['group_privileges'],$temp_array['custom_privileges']);
                      }
                    
                    } else {
                      $response_data = [
                        'status' => ERROR,
                        'error' =>"No Permissions Set For User. Contact Administrator"
                      ];
                      print_r(json_encode($response_data)); 
                    }
                  /************************ End User Roles & Priviledges ****************/
                  
                  /************************ Employee's Personal Info  ********************/
                    # Merging Emploee Data with client
                      unset($user->group_description,$user->group_roles,$user->group_privileges,$user->group_status,$user->passwd);
                      $session_array['user'] = array_merge((array)$user,$user_roles,$user_privileges);

                      $getAllUsers = $this->model_retrieval->all_info_return_result(self::$_Default_DB,VIEW_USER_TABLE);
                      if(!empty($getAllUsers)) { 
                        $session_array['allusers'] = '<option value="" disabled selected>Select One</option>';
                        foreach ($getAllUsers as $key => $value) {
                          # code...
                          $session_array['allusers'] .=  '<option value="'.base64_encode($value->id).'">'.$value->fullname."</option>";
                        }
                      }

                    /*$employee_data = $this->model_retrieval->all_info_return_row(self::$_Default_DB,"",$user->employee_id); 
                    
                    if(!empty($employee_data->id)) 
                    {
                      #Storing in variable
                      $employee = [
                        'fullname' => $employee_data->lastname." ".$employee_data->firstname,
                        'username' => $username,
                      ];
                      
                    }
                    else
                      $this->session->set_flashdata('error',"Employee Personal Data Loading Failed<br>");
                  /************************ Employee's Personal Info  ********************/
                  
                  /************************ Recording Login Information ******************/
                  $client_ip = $this->get_ip_address();
                  # If Local 
                  if($client_ip == "::1" || $client_ip == "127.0.0.1")
                  {
                    $login_data = 
                    [
                      'user_id'     => $user->id,
                      'user_agent'  =>  $_SERVER['HTTP_USER_AGENT'] ,
                      'ipaddress'   => $client_ip,
                      'hostname'    => gethostbyaddr($client_ip),
                    ];
                  }                  
                  else
                  {
                    $ip_API_result = file_get_contents("http://ip-api.com/json/$client_ip");
                    $Ip_Info = json_decode($ip_API_result);
                    
                    $login_data = 
                    [
                      'user_id'     => $user->id,
                      'user_agent'  =>  $_SERVER['HTTP_USER_AGENT'] ,
                      'ipaddress'   => $client_ip,
                      'hostname'    => gethostbyaddr($client_ip),
                      'city_region' => $Ip_Info->city.",".$Ip_Info->regionName,
                      'country'     => $Ip_Info->country
                    ];
                  }
                  
                  # Condition Array
                  $condition = array(
                      'password_check'=> TRUE,
                      'users_dbres' => self::$_Default_DB,
                  );

                  $result = $this->model_access->record_login(self::$_Default_DB,$condition,$login_data);
                  
                  if(!empty($result['login_id'])) 
                  {
                    $session_array['user']['login_id'] = $result['login_id'];
                    $session_array['user']['login_attempt'] = $result['login_attempt'];
                    $session_array['user']['fullname'] = $user->fullname;
                    $session_array['user']['department_id'] = $user->department_id;
                    $this->session->set_userdata($session_array);
                    # Checking for company info
                    if(empty(@$redirect)) {
                      $response_data = [
                          'status' => SUCCESSFUL,
                          'message' => "Login Successful"
                      ];
                      print_r(json_encode($response_data));
                    }
                    else {
                      $this->session->set_flashdata('info', "Please Set Company Info");
                      redirect($redirect);
                    }
                    exit;   
                    //print "<pre>";print_r($_SESSION);print "</pre>";
                  }
                  /************************ Recording Login Success **********************/  
                }
                # Incorrect Password
                else {
                  $client_ip = $this->get_ip_address();
                  # Accessed Locally 
                  if($client_ip == "::1" || $client_ip == "127.0.0.1") {
                    $password = md5($password);
                    $login_data = [
                      'username'    => $username,
                      'user_id'     => $user->id,
                      'password'    => $password,
                      'user_agent'  => $_SERVER['HTTP_USER_AGENT'],
                      'ipaddress'   => $client_ip,
                      'hostname'    => gethostbyaddr($client_ip),
                    ];
                  }  
                  # Accessed from Online                 
                  else {
                    $ip_API_result = file_get_contents("http://ip-api.com/json/$client_ip");
                    $Ip_Info = json_decode($ip_API_result);
                    $login_data = [
                      'username'    => $username,
                      'user_id'     => $user->id,
                      'password'    => $password,
                      'user_agent'  => $_SERVER['HTTP_USER_AGENT'] ,
                      'ipaddress'   => $client_ip,
                      'hostname'    => gethostbyaddr($client_ip),
                      'city_region' => $Ip_Info->city.",".$Ip_Info->regionName,
                      'country'     => $Ip_Info->country
                    ];
                  }

                  $condition = array(
                    'password_check'=> FALSE,
                    'login_attempt' => $user->login_attempt,
                    'users_dbres' => self::$_Default_DB
                  );

                  $result = $this->model_access->record_login(self::$_Default_DB,$condition,$login_data);
                  $response_data = [
                    'status' => ERROR,
                    'error' =>"Invalid Username / Password Combination.<br/>Remaining Login Attempts:<b> ".$result['login_attempt']."</b>"
                  ];
                  print_r(json_encode($response_data)); 
                }
              }
              else {
                $response_data = [
                  'status' => ERROR,
                  'error' =>"Invalid Username / Password"
                ];
                print_r(json_encode($response_data));
              }
            }
          }
        }
      
    }   

  /**************** Other Functions **********************/
    /**
    * Retrieves the best guess of the client's actual IP address.
    * Takes into account numerous HTTP proxy headers due to variations
    * in how different ISPs handle IP addresses in headers between hops.
    */
    public function get_ip_address() 
    {
      // check for shared internet/ISP IP
      if (!empty($_SERVER['HTTP_CLIENT_IP']) && $this->validate_ip($_SERVER['HTTP_CLIENT_IP'])) 
      {
        return $_SERVER['HTTP_CLIENT_IP'];
      }
      // check for IPs passing through proxies
      if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
      {
        // check if multiple ips exist in var
        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== false) {
          $iplist = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
          foreach ($iplist as $ip) {
            if ($this->validate_ip($ip))
              return $ip;
          }
        } else {
          if ($this->validate_ip($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
      }
      if (!empty($_SERVER['HTTP_X_FORWARDED']) && $this->validate_ip($_SERVER['HTTP_X_FORWARDED']))
        return $_SERVER['HTTP_X_FORWARDED'];
      if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && $this->validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
        return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
      if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && $this->validate_ip($_SERVER['HTTP_FORWARDED_FOR']))
        return $_SERVER['HTTP_FORWARDED_FOR'];
      if (!empty($_SERVER['HTTP_FORWARDED']) && $this->validate_ip($_SERVER['HTTP_FORWARDED']))
        return $_SERVER['HTTP_FORWARDED'];
      // return unreliable ip since all else failed
      return $_SERVER['REMOTE_ADDR'];
    }

    /**
     * Ensures an ip address is both a valid IP and does not fall within
     * a private network range.
     */
    public function validate_ip($ip) 
    {
      if (strtolower($ip) === 'unknown')
        return false;
      // generate ipv4 network address
      $ip = ip2long($ip);
      // if the ip is set and not equivalent to 255.255.255.255
      if ($ip !== false && $ip !== -1) {
        // make sure to get unsigned long representation of ip
        // due to discrepancies between 32 and 64 bit OSes and
        // signed numbers (ints default to signed in PHP)
        $ip = sprintf('%u', $ip);
        // do private network range checking
        if ($ip >= 0 && $ip <= 50331647) return false;
        if ($ip >= 167772160 && $ip <= 184549375) return false;
        if ($ip >= 2130706432 && $ip <= 2147483647) return false;
        if ($ip >= 2851995648 && $ip <= 2852061183) return false;
        if ($ip >= 2886729728 && $ip <= 2887778303) return false;
        if ($ip >= 3221225984 && $ip <= 3221226239) return false;
        if ($ip >= 3232235520 && $ip <= 3232301055) return false;
        if ($ip >= 4294967040) return false;
      }
      return true;
    }

  /**************** Other Functions **********************/      

}//End of Class
