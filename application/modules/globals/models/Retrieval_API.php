<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Retrieval extends CI_Model 
{
	/*******************************
		Index Function
	*******************************/
	public function index() 
  {
		#Redirect to Dashboard Where Roles Are Defined
		redirect('Access');
	}

  /*******************************
    Return All Information
  *******************************/
  public function All_Info($_DB_Resource,$tablename) 
  {
    $query = $_DB_Resource->get($tablename);            
    
    return (($query->num_rows() > 0) ? json_encode($query->result()) : json_encode(FALSE));
  }

  public function All_Info_API($_DB_Resource,$tablename) 
  {
    $query = $_DB_Resource->get($tablename);            
    
    return (($query->num_rows() > 0) ? json_encode($query->result()) : json_encode(FALSE));
  }

  /***********************************************
    Retreieve Table Fields 
  ************************************************/
  public function All_Info_With_Condition($_DB_Resource,$tablename,$where_condition) 
  { 
    $_DB_Resource->where($where_condition);
        
    $query = $_DB_Resource->get($tablename); 
        
    return ( ($query->num_rows() > 0) ? json_encode($query->result()) : json_encode(FALSE) );
  }

  public function All_Info_With_Condition_API($_DB_Resource,$tablename,$where_condition) 
  { 
    $_DB_Resource->where($where_condition);
        
    $query = $_DB_Resource->get($tablename); 
        
    return ( ($query->num_rows() > 0) ? json_encode($query->result()) : json_encode(FALSE) );
  }

  /***********************************************
    Retreieve Table Fields From Default Database
  ************************************************/
  public function All_Info_With_Condition_DefaultDB($tablename,$where_condition) 
  { 
    $this->db->where($where_condition);
        
    $query = $this->db->get($tablename); 
        
    return ( ($query->num_rows() > 0) ?$query->result() : FALSE );
  }

  public function All_Info_With_Condition_DefaultDB_API($tablename,$where_condition) 
  { 
    $this->db->where($where_condition);
        
    $query = $this->db->get($tablename); 
        
    return ( ($query->num_rows() > 0) ? json_encode($query->result()) : json_encode(FALSE) );
  }
    
  ############################### Generating ID ################################
    
    /***********************************************
			Generating New ID
    ************************************************/
    public function LastID($TableName,$FieldName) 
    {
      $this->db->select($FieldName);

      $query = $this->db->get($TableName);
        
      return ( ($query->num_rows() > 0) ? $query->row(0) : FALSE );
	  }
  ############################### Generating ID ################################
    
  ############################### All Data Info ################################
  	public function All_Info_Row($tablename) 
      {
          $query = $this->db->get($tablename);
              
          return ( ($query->num_rows() > 0) ? $query->row() :false );
  	}

    
  ############################### All Data Info ################################
    
    ############################### Retrieval Table Fields ########################
    /***********************************************
            Retreieve Table Fields 
    ************************************************/
    
    public function ret_table_fields($tablename) 
    { 
        $result = $this->db->list_fields($tablename); 
        
        return(($result) ? $result : false);  
    }
    
    ############################### Retrieval With Single Condition ########################
    

    /***********************************************
            Retreieve Table Fields 
    ************************************************/
    public function ret_data_with_s_cond_boolean($tablename,$IdField,$data) 
    { 
      $tablename = $tablename;
        
      $this->db->where($IdField,$data[$IdField]);
        
      $query = $this->db->get_where($tablename); 
        
      return ( ($query->num_rows() > 0) ? TRUE : FALSE );
    }
    
}//End of class
