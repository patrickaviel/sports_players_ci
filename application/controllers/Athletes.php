<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Athletes extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// loads the athletes_model
		$this->load->model('athletes_model');
	}
	public function index()
	{
		// loads all the data from the database and displays to the view
		$data['athletes'] = $this->athletes_model->get_all_athletes();
		$data['sports'] = $this->athletes_model->get_all_sports();
		$this->load->view('main',$data);
	}
	public function search(){
		// Check if any of the gender has been selected
		if(!empty($this->input->post('gender'))){
			foreach($this->input->post('gender') as $obj){
				$genders[]= $obj; 
			}
		}else{
			$genders =null;
		}
		// Check if any of the sport has been selected
		if(!empty($this->input->post('sport'))){
			foreach($this->input->post('sport') as $obj){
				$sports[]= $obj; 
			}
		}else{
			$sports=null;
		}
		// Check if any name has been entered
		if(!empty($this->input->post('name'))){
			$player_name = $this->input->post('name');
		}else{
			$player_name =null;
		}
		// store all the sports in to an array
		$data['sports'] = $this->athletes_model->get_all_sports();
		// store all the athletes in to an array
		$data['athletes']=$this->athletes_model->search($genders,$player_name,$sports);
		// load the view with the results
		$this->load->view('main',$data);
	}
}
