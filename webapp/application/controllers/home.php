<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
	 $this->load->view('file/header');
	  $this->load->view('file/menu');
	$this->load->view('home');
	 $this->load->view('file/footer');
	}
	public function insertstudent()
	{
		
		$this->load->view('file/header');
	  $this->load->view('file/menu');
	if (isset($_POST['submit']))
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('id', 'id', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('form');
		}
		else {
			
	
		$id=$_POST['id'];
		$name=$_POST['name'];
		$address=$_POST['address'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		
	$result=$this->student->insertstudent($id, $name, $address, $phone, $email);
	if($result)
	{
			echo "<div class='success'>";
		echo "Successfully Data Inserted";
		echo "</div>";
	}
	else {
		echo "<div class='success'>";
		echo "Somthins Is Missing";
		echo "</div>";
	}
	
	
		}
	
	
	
	}
	else {
		$this->load->view('form');
	}
	 $this->load->view('file/footer');
		
	}
	public function DeleteStudent($id)
	{
			
		
		 $this->load->view('file/header');
	  $this->load->view('file/menu');
	  
	  echo "<script>
	 x = confirm ('You want to proceed deleting?')";
	 
	  $r=$this->student->deletestudent($id);
	  if($r){
	  echo "Successfully Deleted Data";
	  }
	  else {
		  echo "Can Not Delete Data";
	  }
	  
	   
	  
	  $result['query']=$this->student->showstudent();
	  $this->load->view('demoview',$result);
	  $this->load->view('file/footer');
	 
	}
 public function ShowData()
 {
     $result['query']=$this->student->showstudent();
	 $this->load->view('file/header');
	  $this->load->view('file/menu');
	$this->load->view('demoview',$result);
	 $this->load->view('file/footer');
 }
 public function editstudent($id)
 {
 	$query['data']=$this->student->showstudentCon($id);
	if (isset($_POST['submit']))
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('id', 'id', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('file/header');
	  		$this->load->view('file/menu');
			$this->load->view('form', $query);
			$this->load->view('file/footer');
		}
		else {
			
	
		$id=$_POST['id'];
		$name=$_POST['name'];
		$address=$_POST['address'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		
	$result=$this->student->updatestudent($id, $name, $address, $phone, $email);
	if($result)
	{
		$this->load->view('file/header');
	  		$this->load->view('file/menu');
			echo "<div class='success'>";
		echo "Successfully Updated";
		echo "</div>";
			$this->load->view('file/footer');
		
		
	}
	else {
			
			$this->load->view('file/header');
	  		$this->load->view('file/menu');
			echo "<div class='error'>";
		echo "Somthins Is Missing";
		echo "</div>";
			$this->load->view('file/footer');
		
	}
	
	
		}
	
	
	
	}
	else {
		$this->load->view('file/header');
	  	$this->load->view('file/menu');
		$this->load->view('form', $query);
		 $this->load->view('file/footer');
	}
	
		 
 }
	
}
