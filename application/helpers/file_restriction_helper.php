<?php
  
  /***********************************************
    Picture Restriction Function
  ************************************************/
  function pic_restriction($file_array,$mall_name,$img_type) 
  {
    if($_SESSION['username'])
    {
      if(!empty($file_array))
      {
        # File Upload Restrictions
        $supported_images = array('gif','jpg','jpeg','png');
        
        $extension = strtolower(pathinfo($file_array['name'], PATHINFO_EXTENSION));

        if( in_array($extension,$supported_images) ) 
        {
          if( $file_array['size'] > 0 && $file_array['size'] < 20000000 ) 
          {
            # Taret Directory
            if( $img_type == "logo" )
              $target_dir = "uploads/malls/logos/";
              
            elseif( $img_type == "banner" )
              $target_dir = "uploads/malls/banners/";

            $mall_name = str_replace(' ', '', $mall_name);

            $full_img_name = $target_dir. $mall_name. ".". $extension;

            $full_img_path = strtolower($full_img_name);

            if( !file_exists($target_dir) )
              mkdir($target_dir,0755,TRUE);

            $this->session->set_flashdata('full_img_path',$full_img_path);
              
            return TRUE;
          } 
          else 
          {
            $this->session->set_flashdata('error',"File Size Too Large.<br>Please Check File Again");
            return FALSE;
          }                    
        } 
        else 
        {
          $this->session->set_flashdata('error',"File Type Not Supported.<br>Please Upload a Picture File");
          return FALSE;
        }
      }
      else
      {
        return  FALSE;
      }
    }
    else
    {
      redirect('Access');
    }                    
  }

  /***********************************************
    Document Restriction Function
  ************************************************/
  function doc_restriction($file_array,$project_name,$target_dir) 
  {
    if(!empty($file_array))
    {
      # File Upload Restrictions
      $supported_extension = array('doc','docx','pdf','xls','xlsx','txt','zip','.exe');
      $extension = strtolower(pathinfo($file_array['name'], PATHINFO_EXTENSION));

      if( in_array($extension,$supported_extension) ) 
      {
        if( $file_array['size'] > 0 && $file_array['size'] < 20000000 ) 
        {
          $project_name = str_replace(' ', '', $project_name);

          $full_img_name = $target_dir. $project_name. ".". $extension;

          $full_img_path = strtolower($full_img_name);

          if( !file_exists($target_dir) )
            mkdir($target_dir,0755,TRUE);
          
          if(!move_uploaded_file($file_array['tmp_name'], $full_img_path))
            $response['error'] = "Error uploading file - check destination directory is writeable OR created.";
          else 
            $response = [
              'imgpath' => $full_img_path,
              'extension' => $extension
            ];
        } 
        else 
          $response['error'] = "File Size - ".$file_array['name']." - Too Large.<br>Please Check File Again";
      } 
      else 
        $response['error'] = "File Type of - ".$file_array['name']." -  Not Supported.<br>Please Upload a Document File";
      
    }
    else
      $response['error'] = "File Array Empty";       
      
      return $response;
  }

  /***********************************************
    Multiple File Array Restructure
  ************************************************/
  function reArrayFiles(&$file_post) 
  {
    $file_ary = array();

    $file_count = count($file_post['name']);

    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) 
    {
      foreach ($file_keys as $key) 
      {
        $file_ary[$i][$key] = $file_post[$key][$i];
      }
    }

    return $file_ary;
  }
?>