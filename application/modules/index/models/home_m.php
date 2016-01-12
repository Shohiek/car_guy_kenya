<?php if (!defined('BASEPATH'))	exit('No direct script access allowed');

class home_m extends MY_Model {
	
	function __construct()
	    {
	        parent::__construct();
	    }
	public function car_search($make,$year,$condition,$location){
		
	}
	
	public function recently_added(){
		$sql = "SELECT 	
					`img`.`upload_group_id`,
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
			WHERE `lt`.`deal_type` = 0
			ORDER BY upload_timestamp DESC LIMIT 20
				";
		$results = R::getAll($sql);
		return $results;
	}	
	
	public function search_func($make,$year,$price){
				
		$column = '';
		if($make != '' && $year != '' && $price != ''){
			$Nprice = explode("-", $price);
			$Nprice[0] = preg_replace('/\s+/', '', $Nprice[0]);
			$Nprice[1] = preg_replace('/\s+/', '', $Nprice[1]);
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
				WHERE `lt`.`delete_status`= 0 AND
		        `lt`.`make` = '".$make."' AND
		        `lt`.`year` = '".$year."' AND
		        `lt`.`price` BETWEEN '".$Nprice[0]."' AND '".$Nprice[1]."'
		        group by `img`.`upload_group_id`
			";	
		}else{
			if($make != ''){
				if($column != ''){
					$column = "AND `lt`.`make` = '".$make."' ";	
				}else{
					$column = "`lt`.`make` = '".$make."' ";
				}
			}
			if($year != ''){
				if($column != ''){
					$column .= "AND `lt`.`year` = '".$year."'";	
				}else{
					$column .= "`lt`.`year` = '".$year."'";
				}
			}
			if($price != ''){
				if($price == "1 000 000+"){
					$price = preg_replace('/\s+/', '', $price);
					$price = rtrim($price, '+');
					if($column != ''){
						$column .= "AND `lt`.`price` >= '".$price."' ";	
					}else{
						$column .= "`lt`.`price` >= '".$price."' ";
					}	
				}else{
					$Nprice = explode("-", $price);
					$Nprice[0] = preg_replace('/\s+/', '', $Nprice[0]);
					$Nprice[1] = preg_replace('/\s+/', '', $Nprice[1]);
					if($column != ''){
						$column .= "AND `lt`.`price` BETWEEN '".$Nprice[0]."' AND '".$Nprice[1]."'";	
					}else{
						$column .= "`lt`.`price` BETWEEN '".$Nprice[0]."' AND '".$Nprice[1]."'";
					}	
				}
			}
			
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
				WHERE `lt`.`delete_status`= 0 AND".$column."group by `img`.`upload_group_id`";
			
			
		}	
		$result = R::getAll($sql);
		return $sql;
	}
	
	public function get_year_of_manufacture($selected_car){
		$sql = "SELECT DISTINCT year,price FROM `lot` WHERE make = '".$selected_car."' ORDER BY upload_timestamp ASC";
		$result = R::getAll($sql);
		return $result;
	}






}


