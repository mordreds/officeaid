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
    public function home() 
    {
      
        $title['title'] = "OfficeAid| Admin"; 
        $this->load->view('header',$title); 
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
      
        $title['title'] = "OfficeAid| Assigned Jobs"; 
        $this->load->view('header',$title); 
        $this->load->view('job'); 
        $this->load->view('footer'); 
      
    
  /**************** Interface ********************/
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
