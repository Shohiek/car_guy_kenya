<?php if (!defined('BASEPATH'))	exit('No direct script access allowed');

class compare_m extends MY_Model {
	
	function __construct()
	    {
	        parent::__construct();
	    }
	
	public function compare($car1,$car2){
		$sql = "SELECT 	`img`.`upload_group_id`,
					`img`.`img_url`,
			        `lt`.`description`,
			        `lt`.`location`,
			        `lt`.`price`,
			        `lt`.`make`,
			        `lt`.`status`,
			        `lt`.`upload_timestamp`,
			        `lt`.`v_condition`,
			        `lt`.`year`
			FROM 
					`images` AS `img`
			LEFT JOIN 
					`lot` AS `lt`
			ON 
				`lt`.`upload_timestamp` = `img`.`upload_group_id`
			WHERE `lt`.`delete_status`= 0
			AND `lt`.`deal_type` = 0
			AND `lt`.`status` = 0
			AND `img`.`upload_group_id` = '".$car1."'
			AND `img`.`upload_group_id` = '".$car2."'
		";
		echo $sql;die;
		$result = R::getAll($sql);
		return $result;	
	}
}