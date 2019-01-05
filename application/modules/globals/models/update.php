<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_update extends CI_Model 
{
  /***********************************************
          Supplier
  ************************************************/
  public function supplier($data) 
  {

        $tablename = "suppliers";
        
        $this->db->set('name',$data['name']);
        
        $this->db->set('tel1',$data['tel1']);
        
        $this->db->set('tel2',$data['tel2']);
        
        $this->db->set('addr',$data['addr']);
        
        $this->db->set('email',$data['email']);
        
        $this->db->set('fax',$data['fax']);
        
        $this->db->where('sup_id',$data['sup_id']);
        
        $query = $this->db->update($tablename);
        
        $result = $this->db->affected_rows();
                
        return (($result >= 0) ? true : false );

    }

    /***********************************************
            Category
    ************************************************/
    public function OneFieldUpdate($tablename,$IdField,$FieldUpdate,$data) {
      $this->db->set($FieldUpdate,$data[$FieldUpdate]);
      
      $this->db->where($IdField,$data[$IdField]);
      
      $query = $this->db->update($tablename);
      
      $result = $this->db->affected_rows();
              
      return (($result >= 0) ? true : false );
    }

    /***********************************************
      Single Field Update
    ************************************************/
    public function one_field_update($dbres,$tablename,$setdata,$condition) 
    {
      $dbres->set($setdata);
        
      $dbres->where($condition);
        
      $query = $dbres->update($tablename);
        
      $result = $dbres->affected_rows();
                
      return (($result >= 0) ? TRUE : FALSE );
    }

    
}//End of class
