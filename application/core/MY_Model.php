<?php 

Class MY_Model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function last_id($table){
		$c_id = "" ;
		$sql = "SELECT MAX(id) FROM ".$table." ";
		$result = R::getAll($sql);
		foreach ($result as $key => $value) {
			$c_id = $value['MAX(id)'];
		}
		return $c_id;
	}
        public function user_info($user_id){
		$sql = "SELECT * FROM consultant WHERE id = ".$user_id." ";
		$result = R::getAll($sql);
		return $result;
	} 
	

}
?>