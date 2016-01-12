<section class="page-section dark">
    <div class="container">
        <div class="row">
            <div class="col-md-6 wow fadeInLeft" data-wow-offset="200" data-wow-delay="100ms">
                <h2 class="section-title text-left">
                    <small>What Do You Know About Us</small>
                    <span>Who We Are ?</span>
                </h2>
                <!-- Search form -->
				<div class="row">
					<div class="col-sm-12 col-md-10 col-md-offset-1">

						<div class="form-search dark">
							<form id="searchForm" method="post">
								<div class="form-title">
									<i class="fa fa-globe"></i>
									<h2>Search for Affordable Cars Wherever Your Are</h2>
								</div>
								
								<div class="row row-inputs">
									<div class="container-fluid">
										<div class="col-sm-6">
											<div class="form-group has-icon has-label selectpicker-wrapper">
												<label>Make/Model</label>
												<select
												class="selectpicker input-price" data-live-search="true" data-width="100%"
												data-toggle="tooltip" title="Select" id="chosen_make_box" name="chosen_make_box">
													<?php
														$carmodel = '<option>Make/Model</option>';
														for($i=0;$i<sizeof($carmakes);$i++){
															$carmodel .= "<option value=".$carmakes[$i]['make'].">".$carmakes[$i]['make']."</option>";																					
														}
														echo $carmodel;
													?>
												</select>
											</div>
										</div>
										
										<div class="col-sm-3">
											<div class="form-group has-icon has-label selectpicker-wrapper">
												<label>Year</label>
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
										</div>
										<div class="col-sm-3">
											<div class="form-group has-icon has-label selectpicker-wrapper">
												<label>Price Range</label>
												<select
												class="selectpicker input-price" data-live-search="true" data-width="100%"
												data-toggle="tooltip" title="Select" id="chosen_price_tag" name="chosen_price_tag">
													<option>300 000 - 500 000</option>
													<option>500 000 - 700 000</option>
													<option>700 000 - 1000 000</option>
													<option>1 000 000+ </option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="row row-submit">
									
									<div class="container-fluid">
										<div class="inner">
											<i class="fa fa-plus-circle"></i> <a href="<?php echo base_url('index/gallery'); ?>">See All Vehicles</a>
											<button type="submit" id="formSearchSubmit" class="btn btn-submit btn-theme pull-right">
												Find Car
											</button>
										</div>
									</div>
								</div>
							</form>
						</div>

					</div>
				</div>
				<!-- /Search form -->
            </div>
            <div class="col-md-6 wow fadeInRight" data-wow-offset="200" data-wow-delay="300ms">
                <div class="owl-carousel img-carousel">
                	<?php
                		$img_url = '';
						for($i=0;$i<sizeof($allcars);$i++){
							$img_url = $allcars[$i]['img_url'];
                	?>
                    	<div class="item"><a href=" <?php echo base_url($img_url); ?>" data-gal="prettyPhoto"><img class="img-responsive" src="<?php echo base_url($img_url); ?>" alt=""/></a></div>
                    <?php
                   	 }                    
                    ?>
                </div>
            </div>
        </div>

    </div>
</section>



<!-- PAGE -->
<section class="page-section">
	<div class="container">

		<h2 class="section-title wow fadeInUp" data-wow-offset="70" data-wow-delay="100ms"><small>What Kind of Car Do You Want</small><span>Find our Great Selection Below</span></h2>

		<div class="tabs wow fadeInUp" data-wow-offset="70" data-wow-delay="300ms">
			<ul id="tabs" class="nav">
				<li class="active">
					<a href="#tab-1" data-toggle="tab">Best Offers</a>
				</li>
				<li class="">
					<a href="#tab-3" data-toggle="tab">Recently Added</a>
				</li>
			</ul>
		</div>

	</div>
</section>
<!-- /PAGE -->

<?php $this->load->view('index/contactUs_v'); ?>
<script>
$(document).ready(function(){
	$('#chosen_make_box').on('change', function(){
	    $selected_car = $(this).find("option:selected").text();
	    $selected_car = $selected_car.replace(' ','_');
	    console.log($selected_car);
	    $('#chosen_year_box').selectpicker();
	    $('#chosen_price_tag').selectpicker();
	    $post_url = base_url+"index/home/get_year_of_manufacture/"+$selected_car;
	    $.ajax({
			    url: $post_url,
			    type: "POST",
			    data:"",
			    success:function(data){
			    	$yearNprice = jQuery.parseJSON(data);
			    	$options_list = '';
			    	$price_range = '';
			    	
			    	
			    	for($i=0;$i<$yearNprice.length;$i++){
			    		$options_list += "<option>"+$yearNprice[0]['year']+"</option>";
			    		
			    		
			    		if($yearNprice[0]['price']>=300000 && $yearNprice[0]['price'] <=500000){
			    			$price_range += "<option>300 000 - 500 000</option>";
			    			console.log($yearNprice[0]['price']);
			    		}else if($yearNprice[0]['price']>=500000 && $yearNprice[0]['price'] <=700000){
			    			$price_range += "<option>500 000 - 700 000</option>";
			    		}else if($yearNprice[0]['price']>=700000 && $yearNprice[0]['price'] <=1000000){
			    			$price_range += "<option>700 000 - 1000 000</option>";
			    		}else if($yearNprice[0]['price']> 1000000){
			    			$price_range += "<option>1 000 000+</option>";
			    		}
			    	}
			    	
			    	if($yearNprice == ''){
			    		$options_list = "<option>Not Avaliable</option>";
			    		$price_range = "<option>Not Avaliable</options>";
			    	}
			    	
			    	console.log($options_list);
			    	console.log($price_range);
			    	$('#chosen_year_box').html($options_list);
			    	$('#chosen_year_box').selectpicker('refresh');
			    	$('#chosen_price_tag').html($price_range);
			    	$('#chosen_price_tag').selectpicker('refresh');
			   }
		    });
	  });
	  
	  
	  $("#searchForm").submit(function(e){
	  	e.preventDefault();
	  	$yearOption = $('#chosen_year_box').selectpicker();
	  	$makeOption = $('#chosen_make_box').selectpicker();
	  	$priceOption = $('#chosen_price_tag').selectpicker();
	  	
	  	$year = $yearOption.find("option:selected").text();
	  	$make = $makeOption.find("option:selected").text();
	  	$price = $priceOption.find("option:selected").text();
	  	
	  	var form_data  = $("#searchForm").serializeArray();
	  	console.log(form_data);
	  	$formData = array( array('car','rav'),array('people','simone'));
	  	console.log($formData);
	  	$post_url = base_url+"index/home/search_func";
	  	$.ajax({
			    url: $post_url,
			    type: "POST",
			    data: form_data,
			    success:function(data){
			    	$yearNprice = jQuery.parseJSON(data);
			    }
		 });
	  	
	  	
	  });
});
</script>
