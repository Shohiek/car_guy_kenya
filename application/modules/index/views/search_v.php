<?php
$pageinationCtrls = "";
$page_indicator = "";

$page_indicator = "Page <b>$pagenum</b> of <b>$last</b>";

//pagination controlls variable


//if result set has more than one page
if($last != 1){//more than one result page
	if($pagenum > 1){
		$previous = $pagenum - 1;
		$pageinationCtrls = "<a href= '#' ?pn='".$previous."' class='item'> < </a>&nbsp;&nbsp; ";
		//left clickable links
		for($i = $pagenum - 4; $i < $pagenum; $i++){
			if($i > 0){
				$pageinationCtrls .= "<a href = '".base_url("index/gallery/get_all_cars_pg")."/".$i."/".$page_rows."' class='item'>".$i."</a>&nbsp &nbsp;";				
			}
			
		}
	}
	//target page number
	$pageinationCtrls .= "".$pagenum."&nbsp";
	//right clickable links
	for($i = $pagenum+1;$i<=$last;$i++){
		$pageinationCtrls .= "<a href = '".base_url("index/gallery/get_all_cars_pg")."/".$i."/".$page_rows."' class='item'>".$i."</a>&nbsp;";
		if($i >= $pagenum+4){
			break;			
		}		
	}
	
	//next page link
	if($pagenum != $last){
		$next = $pagenum+1;
		$pageinationCtrls .= "&nbsp; &nbsp; <a href='".base_url("index/gallery/get_all_cars_pg")."/".$next."/".$page_rows."' class='item'> > </a> ";		
	}	
}

?>




<!-- BREADCRUMBS -->
<section class="page-section breadcrumbs text-right">
	<div class="container">
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

				<!-- Car Listing -->
				<?php 
					echo "<pre>";
					print_r($data);
				?>
				<div class="thumbnail no-border no-padding thumbnail-car-card clearfix">
					<div class="media">
						<a class="media-link" data-gal="prettyPhoto" href="<?php echo base_url(); ?>assets/img/preview/cars/car-370x220x5.jpg"> <img src="<?php echo base_url(); ?>assets/img/preview/cars/car-370x220x5.jpg" alt=""/> <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span> </a>
					</div>
					<div class="caption">
						<div class="rating">
							<span class="star"></span><!--
							--><span class="star active"></span><!--
							--><span class="star active"></span><!--
							--><span class="star active"></span><!--
							--><span class="star active"></span>
						</div>
						<h4 class="caption-title"><a href="#">VW POLO TRENDLINE 2.0 TDI</a></h4>
						<h5 class="caption-title-sub">Start from 39$/per a day</h5>
						<div class="caption-text">
							Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia.
						</div>
						<table class="table">
							<tr>
								<td><i class="fa fa-car"></i> 2013</td>
								<td><i class="fa fa-dashboard"></i> Diesel</td>
								<td><i class="fa fa-cog"></i> Auto</td>
								<td><i class="fa fa-road"></i> 25000</td>
								<td class="buttons"><a class="btn btn-theme" href="#">Rent It</a></td>
							</tr>
						</table>
					</div>
				</div>

				<!-- /Car Listing -->

				<!-- Pagination -->
				<div class="pagination-wrapper">
					<ul class="pagination">
						<li class="disabled">
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
						</li>
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
							<form action="#">

								<div class="form-group has-icon has-label">
									<label for="formSearchUpLocation3">Picking Up Location</label>
									<input type="text" class="form-control" id="formSearchUpLocation3" placeholder="Airport or Anywhere">
									<span class="form-control-icon"><i class="fa fa-map-marker"></i></span>
								</div>

								<div class="form-group has-icon has-label">
									<label for="formSearchOffLocation3">Dropping Off Location</label>
									<input type="text" class="form-control" id="formSearchOffLocation3" placeholder="Airport or Anywhere">
									<span class="form-control-icon"><i class="fa fa-map-marker"></i></span>
								</div>

								<div class="form-group has-icon has-label">
									<label for="formSearchUpDate3">Picking Up Date</label>
									<input type="text" class="form-control" id="formSearchUpDate3" placeholder="dd/mm/yyyy">
									<span class="form-control-icon"><i class="fa fa-calendar"></i></span>
								</div>

								<div class="form-group has-icon has-label selectpicker-wrapper">
									<label>Picking Up Hour</label>
									<select
									class="selectpicker input-price" data-live-search="true" data-width="100%"
									data-toggle="tooltip" title="Select">
										<option>20:00 AM</option>
										<option>21:00 AM</option>
										<option>22:00 AM</option>
									</select>
									<span class="form-control-icon"><i class="fa fa-clock-o"></i></span>
								</div>

								<div class="form-group selectpicker-wrapper">
									<label>Select Category</label>
									<select
									class="selectpicker input-price" data-live-search="true" data-width="100%"
									data-toggle="tooltip" title="Select">
										<option>Select Category</option>
										<option>Select Category</option>
										<option>Select Category</option>
									</select>
								</div>

								<div class="form-group selectpicker-wrapper">
									<label>Select Type</label>
									<select
									class="selectpicker input-price" data-live-search="true" data-width="100%"
									data-toggle="tooltip" title="Select">
										<option>Select Type</option>
										<option>Select Type</option>
										<option>Select Type</option>
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
				<!-- widget testimonials -->
				<div class="widget shadow">
					<div class="widget-title">
						Testimonials
					</div>
					<div class="testimonials-carousel">
						<div class="owl-carousel" id="testimonials">
							<div class="testimonial">
								<div class="media">
									<div class="media-body">
										<div class="testimonial-text">
											Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia.
										</div>
										<div class="testimonial-name">
											John Doe <span class="testimonial-position">Co- founder at Rent It</span>
										</div>
									</div>
								</div>
							</div>
							<div class="testimonial">
								<div class="media">
									<div class="media-body">
										<div class="testimonial-text">
											Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia.
										</div>
										<div class="testimonial-name">
											John Doe <span class="testimonial-position">Co- founder at Rent It</span>
										</div>
									</div>
								</div>
							</div>
							<div class="testimonial">
								<div class="media">
									<div class="media-body">
										<div class="testimonial-text">
											Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia.
										</div>
										<div class="testimonial-name">
											John Doe <span class="testimonial-position">Co- founder at Rent It</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /widget testimonials -->
				<!-- widget helping center -->
				<div class="widget shadow widget-helping-center">
					<h4 class="widget-title">Helping Center</h4>
					<div class="widget-content">
						<p>
							Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean nec eros.
						</p>
						<h5 class="widget-title-sub">+90 555 444 66 33</h5>
						<p>
							<a href="mailto:support@supportcenter.com">support@supportcenter.com</a>
						</p>
						<div class="button">
							<a href="#" class="btn btn-block btn-theme btn-theme-dark">Support Center</a>
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
