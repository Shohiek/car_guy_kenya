<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* The MX_Controller class is autoloaded as required */

/*
* @package		core
* @author		Oscar Gichohi 
* @email 		shohiek@gmail.com
* @usage 		
*/

class  MY_Controller  extends  MX_Controller {
	var $data;
	function __construct() {
		parent::__construct();
		date_default_timezone_set('Africa/Nairobi');
		$this->is_loggedin();
	}
	
	public function is_loggedin() {
        if ( $this->aauth->is_loggedin() ){
        	// echo "your are logged in";
        }else{
        	header("Location:".base_url('login'));
        	 // echo "you are not logged in";
        }
		// echo "my controller";
		// die;
		
    }		
	
}
