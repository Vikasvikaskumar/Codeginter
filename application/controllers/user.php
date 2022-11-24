<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

    public function __construct(){

		parent::__construct();
		$this->load->model('UserModel');
    }
    public function index(){

    }
    
    
    
    public function register()
	{

        $arr['name']=$this->input->post('name');
        $arr['email']=$this->input->post('email');
        $arr['psw']=$this->input->post('psw');
        $arr['number']=$this->input->post('number');
        

        if(!empty($_POST['submit'])){
           
             $email = $arr['email'];
            $exists = $this->UserModel->check($email);
            if($exists=="Not Exist"){
                $response=$this->UserModel->save($arr);
                if(!empty($response)){
                    redirect('user/dashboard');
                    // echo "<pre>";print_r($arr);die;
                }else{
                  
                    $TempData["Message"] = "This is my Error";
                    redirect('user/register',$TempData);
                }
            }else{
                $TempData["Message"] = "This is my Error";
                   
                redirect('user/register',$TempData);
            }
          
            
                    
        }

                // echo"<pre>";print_r($data);die;
   
		$this->load->view('register');
	}

    public function isEmailExist()
	{
		$email = !empty($_POST['email']) ? $_POST['email'] : '';
		$exists = $this->UserModel->isEmailExist($email);
		print_r($exists);
	}

    public function dashboard(){



       $list=$this->UserModel->gettotal();
       $data['list']=$list;


      
    //    $data['idvalue']=$value;
   
    //    echo"<pre>";print_r($data);die;
       $this->load->view('view_page',$data);
        // echo"test";
    }

   public function delete(){
    $id=!empty($_POST['id']) ? $_POST['id'] : '';

    $delete=$this->UserModel->delete($id);

    if(!empty($delete)){
        print_r('delete');
    }else{
        print_r('failed');
    }
   }
  public function load_data()
 {
  $data = $this->UserModel->load_data();
  echo json_encode($data);
 }

public function getdetailbyid(){
    $id=!empty($_POST['id']) ? $_POST['id'] : '';
    $value= $this->UserModel->getdetails($id);

    print_r($value);



}
public function update(){
    $id=!empty($_POST['id']) ? $_POST['id'] : '';
    $arr = array(
        $this->input->post('table_column') => $this->input->post('value')
       );
       
    //    $this->livetable_model->update($id,$arr );
    // $arr['name']=!empty($_POST['table_column']) ? $_POST['table_column'] : '';
    // $arr['email']=!empty($_POST['table_column']) ? $_POST['table_column'] : '';
    // $arr['number']=!empty($_POST['number']) ? $_POST['number'] : '';
    //  echo"<pre>";print_r($arr);die;
    $delete=$this->UserModel->updaterecod($id,$arr);
    if(!empty($delete)){
        print_r('update');
    }else{
        print_r('failed');
    }

}
public function insert(){

    $arr = array(
        'name' => $this->input->post('name'),
        'email'  => $this->input->post('email'),
        'number'   => $this->input->post('number')
       );
        //  echo"<pre>";print_r($arr);die;
   
       $response=$this->UserModel->save($arr);
            if($response){
                print_r("insert");
            }else{
                print_r("try agian");
            }
              
}
}