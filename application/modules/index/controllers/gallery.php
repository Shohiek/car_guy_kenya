<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class gallery extends MX_Controller {
	
	function __construct() {
		$this->load->model('api/api_m');
		parent::__construct();
	}

	public function index() {
		$data['content_view'] = "index/gallery_v";	
		$data['rows'] = count($this->api_m->get_all_cars_grouped());//number of items
		$data['page_rows'] = 5;
		$data['last'] = ceil($data['rows']/$data['page_rows']);
		$data['pagenum'] = 1;//first page of gallery
		$data['all_cars'] = $this->api_m->get_all_cars_grouped_pagination($data['pagenum'],$data['page_rows']); 
		$data['carmakes'] = $this->api_m->get_makes();
		
		$this->load->view('template/layout',$data);
	}
	
	public function drilldown(){
		$data['content_view'] = "index/galleryDrilldown_v";		
		$this->load->view('template/layout',$data);
	}
	

}
?>