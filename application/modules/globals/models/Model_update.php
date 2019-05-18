<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_update extends CI_Model {

  /***********************************************
    Updating Data With Array
  ************************************************/
  public function update_info($dbres,$tablename,$return_dataType="php_object",$update_data,$where_condition) 
  {
    $dbres->set($update_data);

    $dbres->where($where_condition);

    //return $dbres->get_compiled_update($tablename);
    $query = $dbres->update($tablename);

    /*************** Query check ************/
    if($query)
      $return_data = $dbres->affected_rows();
    else
      $return_data = ['DB_ERR' => $dbres->error()];
    /*************** Query check ************/
            
    if($return_dataType == "JSON")          
      return json_encode($return_data);
    else 
      return $return_data;
  }

  /***********************************************
    Return Single Record
  ************************************************/
  public function allinfo_return_row($dbres,$tablename,$return_dataType="php_object",$condition=array()) 
  { 
    $dbres->where($condition); 
    
    $query = $dbres->get($tablename); 
        
    return ( ($query->num_rows() > 0) ? $query->row() : FALSE );
  }	
    
}//End of class
