<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Universal_Deletion extends CI_Model 
{
  /***********************************************
      All Data Delete
  ************************************************/
  public function Delete_Row($tablename,$data) 
  {
    $this->db->where($data['IdField'],$data['deleteid']);
        
    $query = $this->db->delete($tablename);
        
    $result = $this->db->affected_rows();
                
    return (($result >= 0) ? true : false );
  }
    
}//End of class
