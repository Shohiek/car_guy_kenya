<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class home extends MX_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model("api/api_m");
		$this->load->model("index/home_m");
	}

	public function index() {
		$data['content_view'] = "index/homePage";	
		$data['carmakes'] = $this->get_makes();	
		$data['allcars'] = $this->api_m->top_range();
		$this->load->view('template/layout',$data);
	}
	
	public function get_makes(){
		$result = $this->api_m->get_makes();
		return $result;
		//echo(json_encode($result));
	}
	
	public function search_func(){
				
		$make = $this -> input -> post("chosen_make_box");
		echo (json_encode($make));die;
		
		$make = "";
		$year = "";
		$price = "";
		if(isset($_POST['chosen_make_box'])){
			$make = $_POST['chosen_make_box'];	
		}
		if($_POST['chosen_year_box']){
			$year = $_POST['chosen_year_box'];	
		}
		if($_POST['chosen_price_tag']){
			$price = $_POST['chosen_price_tag'];	
		}
		echo "<pre>";
		print_r($_POST);die;
		
		$data["result"] = $this->home_m->search_func($make,$year,$price);
		$data['rows'] = COUNT($this->home_m->search_func($make,$year,$price));
		$data['page_rows'] = 12;
		$data['last'] = ceil($data['rows']/$data['page_rows']);
		$data['pagenum'] = 1;//first page of gallery
		print_r($data["result"]);die;
		$data['content_view'] = "index/search_v";
		$data['menu'] = "home";			
		$this->load->view('template/layout',$data);		
		// echo json_encode($result);
	}

	public function get_year_of_manufacture($selected_car){
		$selected_car = str_replace('_', ' ', $selected_car);	
		$dateOfManufacture = $this->home_m->get_year_of_manufacture($selected_car);
		echo(json_encode($dateOfManufacture));
	}

}
?>