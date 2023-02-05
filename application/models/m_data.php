<?php
class m_data extends CI_Model{
 
  function show(){
    $query =$this->db->query("SELECT * FROM user WHERE id=''");
  }
   
}