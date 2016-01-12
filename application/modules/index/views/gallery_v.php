<?php
$pageinationCtrls = "";
$page_indicator = "";

$page_indicator = "Page <b>$pagenum</b> of <b>$last</b>";

//pagination controlls variable


//if result set has more than one page
if($last != 1){//more than one result page
	if($pagenum > 1){
		$previous = $pagenum - 1;
		$pageinationCtrls = "<li class='disabled'><a href='#'><i class='fa fa-angle-double-left'></i> Previous</a></li>";
		//left clickable links
		for($i = $pagenum - 4; $i < $pagenum; $i++){
			if($i > 0){
				//$pageinationCtrls .= "<a href = '".base_url("index/gallery/get_all_cars_pg")."/".$i."/".$page_rows."' class='item'>".$i."</a>&nbsp &nbsp;";
				$pageinationCtrls .= "<li><a href = '".base_url("index/gallery/get_all_cars_pg")."/".$i."/".$page_rows."'>".$i."</a> </li>";				
			}
		}
	}
	//target page number
	$pageinationCtrls .= "<li class='active'><a href='#'>".$pagenum." <span class='sr-only'>(current)</span></a></li>";
	//right clickable links
	for($i = $pagenum+1;$i<=$last;$i++){
		$pageinationCtrls .= "<li><a href = '".base_url("index/gallery/get_all_cars_pg")."/".$i."/".$page_rows."'>".$i."</a></li>";
		if($i >= $pagenum+4){
			break;			
		}		
	}
	
	//next page link
	if($pagenum != $last){
		$next = $pagenum+1;
		$pageinationCtrls .= "<li><a href='#'>Next <i class='fa fa-angle-double-right'></i></a></li>";		
	}	
}

?>

<!-- BREADCRUMBS -->
<section class="page-section breadcrumbs text-right">
	<div style="display: inline-block; padding-top:1em;">
		<div class="caption" id="compareList" style="float: right;">
			<h4>Your Compare List</h4>
			<a class="btn btn-theme ripple-effect" href="#" onclick="clearCompareList()">Reset</a>
		    <i class="fa fa-car" id="car1" style="display: none;"></i>
		    <i class="fa fa-car" id="car2" style="display: none;"></i>
		    <i class="fa fa-car" id="car3" style="display: none;"></i>
		</div>
	</div>
	<div class="container"style="display: inline-block;">
		<div class="page-header">
			<h3>Car Listing</h3>
		</div>
		<ul class="breadcrumb">
			<li>
				<a href="#">Home</a>
			</li>
			<li>
				<a href="#">Pages</a>
			</li>
			<li class="active">
				List Car
			</li>
		</ul>
	</div>
</section>

<!-- /BREADCRUMBS -->

<!-- PAGE WITH SIDEBAR -->
<section class="page-section with-sidebar sub-page">
	<div class="container">
		<div class="row">
			<!-- CONTENT -->
			<div class="col-md-9 content car-listing" id="content">

				<div class="pagination-wrapper">
					<ul class="pagination">
					Page indicator
					<?php //echo  $page_indicator; ?>
					</ul>
				</div>
				<!-- Car Listing -->	
				
				<?php
					foreach ($all_cars as $key => $value) {
						$make = $value['make'];
						$img = $value['img_url']; 
						$id = $value['upload_group_id'];
						$price = $value['price']; 
				?>
								
					<div class="thumbnail no-border no-padding thumbnail-car-card clearfix">
						<div class="media" style="width: 30%;">							
							<a class="media-link" data-gal="prettyPhoto" href="<?php echo base_url($img); ?>"> <img src="<?php echo base_url($img); ?>" alt=""/> <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span> </a>
						</div>
						<div class="caption">
							<div class="rating">
								<span class="star"></span><!--
								--><span class="star active"></span><!--
								--><span class="star active"></span><!--
								--><span class="star active"></span><!--
								--><span class="star active"></span>
							</div>
							<h4 class="caption-title"><a href="#"><?php echo $make ?></a></h4>
							<h5 class="caption-title-sub">Price: <?php echo "Ksh. ".$price ?></h5>
							<div class="caption-text">
								
							</div>
							<table class="table">
								<tr>
									<td><i class="fa fa-car"></i>Year: 2013</td>
									<td class="buttons"><a class="btn btn-theme" href="#" onclick="addCompare('123456')">Add to Compare List</a></td>
								</tr>
							</table>
						</div>
					</div>
					
				<?php
					}
				?>
				<!-- /Car Listing -->

				<!-- Pagination -->
				<div class="pagination-wrapper">
					<ul class="pagination">
						<?php
							echo $pageinationCtrls;
						?>
						<!-- <li class="disabled">
							<a href="#"><i class="fa fa-angle-double-left"></i> Previous</a>
						</li>
						<li class="active">
							<a href="#">1 <span class="sr-only">(current)</span></a>
						</li>
						<li>
							<a href="#">2</a>
						</li>
						<li>
							<a href="#">3</a>
						</li>
						<li>
							<a href="#">4</a>
						</li>
						<li>
							<a href="#">Next <i class="fa fa-angle-double-right"></i></a>
						</li> -->
					</ul>
				</div>
				<!-- /Pagination -->

			</div>
			<!-- /CONTENT -->

			<!-- SIDEBAR -->
			<aside class="col-md-3 sidebar" id="sidebar">
				<!-- widget -->
				<div class="widget shadow widget-find-car">
					<h4 class="widget-title">Find Best Rental Car</h4>
					<div class="widget-content">
						<!-- Search form -->
						<div class="form-search light">
							<form action="<?php echo base_url("index/home/search_func"); ?>" method="POST">
								<div class="form-group selectpicker-wrapper">
									<label>Select Make/Model</label>
									<select id="chosen_make_box"
									class="selectpicker input-price" data-live-search="true" data-width="100%"
									data-toggle="tooltip" title="Select" name="chosen_make_box">
										<?php
											$carmodel = '<option>Make/Model</option>';
											for($i=0;$i<sizeof($carmakes);$i++){
												$carmodel .= "<option value=".$carmakes[$i]['make'].">".$carmakes[$i]['make']."</option>";																					
											}
											echo $carmodel;
										?>
									</select>
								</div>

								<div class="form-group selectpicker-wrapper">
									<label>Select Year</label>
									<select
									class="selectpicker input-price" data-live-search="true" data-width="100%"
									data-toggle="tooltip" title="Select" id="chosen_year_box" name="chosen_year_box">
										<?php
											$first = '1995';
											$options = $first;
											$this_year = date('Y');
											$diff = $this_year - $first; 
											for($i=0;$i<$diff;$i++){
												if($first != date('Y')){
													$options .= "<option>".$first."</option>";
												}
												$first++;
											}
											$options .= "<option>".$this_year."</option>";
											echo $options;
										?>
									</select>
								</div>
								
								<div class="form-group selectpicker-wrapper">
									<label>Select Price Range</label>
									<select	class="selectpicker input-price" data-live-search="true" data-width="100%"
									data-toggle="tooltip" title="Select" id="chosen_price_box" name="chosen_price_box">
										<option>300 000 - 500 000</option>
										<option>500 000 - 700 000</option>
										<option>700 000 - 1000 000</option>
										<option>1 000 000+ </option>
									</select>
								</div>

								<button type="submit" id="formSearchSubmit3" class="btn btn-submit btn-theme btn-theme-dark btn-block">
									Find Car
								</button>

							</form>
						</div>
						<!-- /Search form -->
					</div>
				</div>
				<!-- /widget -->
				<!-- widget price filter -->
				<div class="widget shadow widget-filter-price">
					<h4 class="widget-title">Price</h4>
					<div class="widget-content">
						<div id="slider-range"></div>
						<input type="text" id="amount" readonly />
						<button class="btn btn-theme btn-theme-dark">
							Filter
						</button>
					</div>
				</div>
				<!-- /widget price filter -->
				<!-- widget helping center -->
				<div class="widget shadow widget-helping-center">
					<h4 class="widget-title">Contact Us</h4>
					<div class="widget-content">
						<p>
							For your view needs:
						</p>
						<h5 class="widget-title-sub">0702255600 (Robert)</h5>
						<h5 class="widget-title-sub">0736844590 (Steve)</h5>
						<h5 class="widget-title-sub">0718715998 (Oscar)</h5>
						<p>
							<a href="mailto:carguykenya@gmail.com">Email: carguykenya@gmail.com</a>
						</p>
						<div class="button">
							<a href="https://www.facebook.com/pages/The-Car-Guy-Kenya/598489186840797" class="btn btn-block btn-theme btn-theme-dark">Facebook</a>
						</div>
					</div>
				</div>
				<!-- /widget helping center -->
			</aside>
			<!-- /SIDEBAR -->

		</div>
	</div>
</section>
<!-- /PAGE WITH SIDEBAR -->

<?php $this->load->view('index/contactUs_v'); ?>

<script>
	window.addCompare = function($upload_group_id){
		$carGroupID = $upload_group_id
		if(typeof sessionStorage.car1 == 'undefined' || sessionStorage.car1 == null){
				sessionStorage.car1 = $carGroupID;
				timeoutsuccess("You added one vehicle to the compare list.");
				$("#compareList").show();	
				$("#car1").show();
				// console.log("added " +sessionStorage.car1 );	
		}else if(typeof sessionStorage.car2 == 'undefined' || sessionStorage.car2 == null){
			
			if($upload_group_id == sessionStorage.car1){
				timeouterror("You have already added this to your compare list.");	
				// console.log("Select a different car to compare");
			}else{
				sessionStorage.car2 = $carGroupID;
				timeoutsuccess("You have 2 vehicles in your compare list.");
				$("#car2").show();
				// console.log("added " + sessionStorage.car2);	
			}
		}else if(typeof sessionStorage.car3 == 'undefined' || sessionStorage.car3 == null){
			if($upload_group_id == sessionStorage.car1 || $upload_group_id == sessionStorage.car2){
				timeouterror("You have already added this to your compare list.");	
				// console.log("Select a different car to compare");
			}else{
				sessionStorage.car3 = $carGroupID;
				timeoutsuccess("Your compare list is now full.  Proceed to compare");
				$("#car3").show();
				// console.log("added " + sessionStorage.car2);	
			}
		}else{
			//redirect to compare
			//window.location.href = "<?php echo base_url('index/compare/cars'); ?>/"+sessionStorage.car1+"/"+sessionStorage.car2+"/"+sessionStorage.car3;
			
			timeoutsuccess("You have 3 vehicles in your compare list.");
			//console.log("YOU CAN COMPARE CARS NOW"+sessionStorage.car1+sessionStorage.car2);
		}
	}
	
	window.clearCompareList = function (){
		sessionStorage.removeItem("car1");
		sessionStorage.removeItem("car2");
		sessionStorage.removeItem("car3");
		$("#car1").hide();
		$("#car2").hide();
		$("#car3").hide();
		timeoutsuccess("Your compare list has been reset.");				
	}
</script>
