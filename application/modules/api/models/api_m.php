<?php if (!defined('BASEPATH'))	exit('No direct script access allowed');

class api_m extends MY_Model {
	
	function __construct()
	    {
	        parent::__construct();
	    }
		
	// public function get_all_cars(){
		// $sql = "SELECT 	`img`.`upload_group_id`,
					// `img`.`img_url`,
			        // `lt`.`description`,
			        // `lt`.`location`,
			        // `lt`.`price`,
			        // `lt`.`make`,
			        // `lt`.`status`,
			        // `lt`.`upload_timestamp`,
			        // `lt`.`v_condition`,
			        // `lt`.`year`
			// FROM 
					// `images` AS `img`
			// LEFT JOIN 
					// `lot` AS `lt`
			// ON 
				// `lt`.`upload_timestamp` = `img`.`upload_group_id`
			// WHERE `lt`.`delete_status`= 0
			// AND `lt`.`deal_type` = 0
			// AND `lt`.`status` = 0
		// ";
		// $result = R::getAll($sql);
		// return $result;
	// }
	
	public function get_all_cars($upload_group_id){
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
			AND `lt`.`status` = 0
			AND `img`.`upload_group_id` = '".$upload_group_id."'
		";
		$result = R::getAll($sql);

		return $result;
	}
	
	//grouped by upload_group_id
	public function get_all_cars_grouped(){
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
			AND `lt`.`status`= 0
			group by `img`.`upload_group_id`
		";
		$result = R::getAll($sql);
		return $result;
	}
	
	//grouped by upload_group_id PAGINATION
	public function get_all_cars_grouped_pagination($page_num,$page_rows){
		$limit = " LIMIT ". ($page_num - 1)* $page_rows."," .$page_rows;
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
			AND `lt`.`status`= 0
			group by `img`.`upload_group_id`
		".$limit;
		$result = R::getAll($sql);
		return $result;
	}
	
	//group cars sql
	// SELECT 	`img`.`upload_group_id`,
					// `img`.`img_url`,
			        // `lt`.`description`,
			        // `lt`.`location`,
			        // `lt`.`price`,
			        // `lt`.`make`,
			        // `lt`.`status`,
			        // `lt`.`upload_timestamp`,
			        // `lt`.`v_condition`,
			        // `lt`.`year`
			// FROM 
					// `images` AS `img`
			// LEFT JOIN 
					// `lot` AS `lt`
			// ON 
				// `lt`.`upload_timestamp` = `img`.`upload_group_id`
			// WHERE `lt`.`delete_status`= 0
			// AND `lt`.`status`= 0
			// group by `img`.`upload_group_id`
	//group cars sql
	public function get_all_hot_deals(){
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
			AND `lt`.`deal_type` = 1
		";
		$result = R::getAll($sql);
		return $result;
	}
	
	public function download_gallery(){
		$sql = 'SELECT 	
					`lt`.`make`,
					`lt`.`year`,
					`lt`.`price`,
			        `lt`.`description`,
			        
			        `lt`.`make`,
			        `lt`.`year`
			FROM 
					`images` AS `img`
			LEFT JOIN 
					`lot` AS `lt`
			ON 
				`lt`.`upload_timestamp` = `img`.`upload_group_id`
			WHERE `lt`.`delete_status`= 0
			AND `lt`.`status`= 0
			group by `img`.`upload_group_id`
			LIMIT 30
			';
		$result = R::getAll($sql);
		return $result;
	}
	
	public function top_range(){
		$sql = "
			SELECT 	`img`.`upload_group_id`,
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
			AND `lt`.`make` LIKE '%Benz%'
			group by `img`.`upload_group_id`
            UNION
            SELECT 	`img`.`upload_group_id`,
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
            AND `lt`.`make` LIKE '%Prado%'
            group by `img`.`upload_group_id`
            UNION
            SELECT 	`img`.`upload_group_id`,
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
            AND `lt`.`make` LIKE '%BMW%'
            group by `img`.`upload_group_id`
		";
		$result = R::getAll($sql);
		return $result;	
	}
		
	public function get_makes(){
		$sql = "SELECT * FROM v_make";
		$result = R::getAll($sql);
		return $result;	
	}
	
	public function get_locations(){
		$sql = "SELECT * FROM v_location";
		$result = R::getAll($sql);
		return $result;
	}	
	
	public function get_conditions(){
		$sql = "SELECT * FROM v_condition";
		$result = R::getAll($sql);
		return $result;
	}
	
	public function total_cars(){
		$sql = "SELECT COUNT(DISTINCT(upload_group_id)) AS total_cars FROM images";
		$result = R::getAll($sql);
		return $result;
	}
	
}