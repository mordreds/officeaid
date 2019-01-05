<?php defined('BASEPATH') OR exit('No direct script access allowed');

class DB_transactions extends CI_Model {

  /***********************************************
    Updating Data With Array
  ************************************************/
  public function update_info($dbres,$tablename,$return_dataType="php_object",$update_data,$where_condition) 
  {
    $dbres->set($update_data);

    $dbres->where($where_condition);

    $query = $dbres->update($tablename);

    /*************** Query check ************/
    if($query)
      $return_data = $query;
    else
      $return_data = ['ERR' => $dbres->error()];
    /*************** Query check ************/
            
    if($return_dataType == "json")          
      return json_encode($return_data);
    else 
      return $return_data;
  }	
    
}//End of class
