<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Admin_Changepassword_Model extends CI_Model {

public function getcurrentpassword($adminid){
$query=$this->db->where(['adminId'=>$adminid])
                    ->get('axadmin');
           if($query->num_rows() > 0)
           {
           	return $query->row();
           }
}

public function updatepassword($adminid,$newpassword){
$data=array('password' =>$newpassword );
return $this->db->where(['adminId'=>$adminid])
                ->update('axadmin',$data);

	}

}
