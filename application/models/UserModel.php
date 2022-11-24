<?php
/**
 * Created by PhpStorm.
 * User: Vikas
 * Date: 18-11-2022
 * Time: 13:41
 */

class UserModel extends CI_Model
{

    public function save($arr){

       $store= $this->db->insert('user',$arr);
            if($store){
                return  true;
            }else{
                return false;
            }
    }

public function check($email){
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('email', $email);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return "Exist";
    }else{
        return "Not Exist";
    }
    
}

public function isEmailExist($email){

    $this->db->select('id');
    $this->db->from('user');
    $this->db->where('email', $email);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        $result = $query->result_array();
        if (!empty($result)) {
            $userId = !empty($result[0]['id']) ? $result[0]['id'] : '';
            if ($userId != '') {
                return "Exist";
            } else {
                return "Not Exist";
            }
        }
    } else {

        return "Not Exist";
    }
}
    
public function gettotal(){
    $this->db->select("*");
    $this->db->from("user");
    $query=$this->db->get();
    if($query->num_rows() > 0){
        $result = $query->result_array();
		foreach ($result as $key=>$value){
			return $result;
		}
    }else{
        return false;
    }
} 
 public function delete($id){
    $this->db->where('id',$id);
   $query= $this->db->delete('user');
   if($query){
    return true;
   }else{
    return false;
   }
// echo"<pre>";print_r($this->db->last_query());die;
 }
 public function load_data(){
    $this->db->select("*");
    $this->db->from("user");
    $query=$this->db->get();
    if($query->num_rows() > 0){
        $result = $query->result_array();
		foreach ($result as $key=>$value){
			return $result;
		}
    }else{
        return false;
    }
 }
 public function getdetails($id){
    $this->db->select("*");
    $this->db->from("user");
    $this->db->where('id',$id);
    $query=$this->db->get();
    if($query->num_rows() > 0){
        $result = $query->result_array();
		foreach ($result as $key=>$value){
			return $result;
		}
    }else{
        return false;
    }
 }
    public function updaterecod($id,$arr){
        // $id=$arr['id'];
        $this->db->where('id',$id);
        $query=$this->db->update('user',$arr);
        if(!empty($query)){
            return "done";
        }else{
            return false;
        }

    }
   public function getdetailbyid($id){

   }
}
?>