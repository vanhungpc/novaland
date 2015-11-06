<style>
	.nav-list{padding-right:15px;padding-left:15px;margin-bottom:0;}
	.nav-list-main{padding-left:0px;padding-right:0px;margin-bottom:0;}
	span.nav-toggle-icon{font-size:7px !important;top:-2px !important;color:#888 !important;}
</style>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.2/jquery-ui.js" type="text/javascript"></script>
    <link href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.2/themes/blitzer/jquery-ui.css"
        rel="stylesheet" type="text/css" />

<div class="content">

	<div class='container Module Module-31'>
	<!-- slider -->
		<div class="row sl-wrap">
			<div class="col-ms-12">
				<a href="#" class="btn-prev">
			  	</a>
			  	<a href="#" class="btn-next">
			  	</a>

			  	<!-- content slider -->
		  	<div class="at-slider col-ms-12">

		  		<?php foreach ($data_slider as $value) {?>
	<div class="slide-item col-ms-12">
			      <a href="<?php echo site_url('project/detail_project/' . $value->_id_project);?>" title="<?php echo $value->name_project?>">
			        <img src="<?php echo base_url('uploads') . '/' . $value->img_slider;?>" alt="<?php echo $value->name_project?>">
			      </a>
			      <div class="container-s">
			        <div class="sub">
			          <h2><?php echo $value->name_project?></h2>
			          <div class="clear">
			          </div>
			          <div class="bn-desc"><span><?php echo $value->address?></span></div>
						 <div class="clear">
			          </div>
			          <div class="bn-desc"><span><?php echo $value->desc_slider?></span></div>

			        </div>
			      </div>
			    </div>
	<?php }
?>


		</div>


			</div>


		<!-- end slider -->
	</div>

	<div class="row">

			<div class="col-sm-12">
				<div class="card">
					<div class="row-employer-menu  row employer-tools">
						<div id="custom-search-input">
							<div class="input-group col-md-12">
                                <input type="text" class="  search-query form-control" placeholder="Search" />
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
						</div>


					</div>
				</div>
			</div>

	</div>

	<div class="row margin-bottom-15">
		<div class="col-sm-4 col-xs-12">
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<div class="card">
						<div class="row-employer-menu  row employer-tools">
							<div class="col-sm-12 col-sm-12 employer-box-header background-color-3">
								<h5 class="employer-tools-title"><?php echo lang("rental_property"); ?></h5>
								<!-- <div class="border-bottom-title border-color-3"></div> -->
							</div>
							<div class="col-sm-12 col-sm-12 employer-line"></div>
							<?php foreach ($county as $key => $value) {
	?>


							<div class="col-sm-12 employer-tools-item">
								<ul class="nav nav-list-main">
							        <label class="nav-toggle nav-header"><span><i class="fa fa-angle-double-right"></i>&nbsp;<?php echo $value['name_county']?></span></label>
							            <ul class="nav nav-list nav-left-ml menu_left">
							            	<?php foreach ($value['arr_project'] as $key => $values) {?>
							                <li><a href="<?php echo site_url('project/detail_project/' . $values['_id_project']);?>" ><i class="fa fa-hand-o-right"></i><?php echo $values['name_project']?> </a></li>
							            	<?php }
	?>
							            </ul>
								</ul>
							</div>
							<div class="col-sm-12 col-sm-12 employer-line"></div>


							<?php }
?>
						</div>


						<!-- new -->
						<div class="row-employer-menu  row employer-tools">
							<div class="col-sm-12 col-sm-12 employer-box-header background-color-3">
								<h5 class="employer-tools-title"><?php echo lang("news"); ?></h5>
								<!-- <div class="border-bottom-title border-color-3"></div> -->
							</div>
							<div class="col-sm-12 col-sm-12 employer-line"></div>
							<?php foreach ($arr_news as $value) {?>

							<div class="col-sm-12 employer-tools-item">
								<ul class="nav nav-list-main">
									  <li><a href="<?php echo site_url('news/detail_news/' . $value->_id_news);?>" ><i class="fa fa-newspaper-o"></i><?php echo $value->title?> </a></li>

							       <!--  <label class="nav-toggle nav-header"><span>&nbsp;<?php echo $value->title?></span></label> -->
								</ul>
							</div>
							<div class="col-sm-12 col-sm-12 employer-line"></div>


							<?php }
?>
						</div>

						<!-- -->
					</div>
				</div>

			</div>
		</div>
    <div id="dialog" style="display: none">
	        <div id="dvMap" style="height: 380px; width: 580px;">
	        </div>
	    </div>
		<div class="col-sm-8 col-xs-12">
			<div class="row  margin-right-25">
				<div class="col-sm-12 col-sm-12 no-padding">
					<?php foreach ($data_project as $value) {?>

					<div class="col-sm-6 col-md-6 no-padding">
						<div class="card">
							<div class="info-employer row">
								<div class="row ">
									<div class="col-sm-12 col-md-12 text-center">
										 <a href="<?php echo site_url('project/detail_project/' . $value->_id_project);?>" title="<?php echo $value->name_project?>">
										<img class="card-img" src="<?php echo base_url('uploads') . '/' . $value->img_slider;?>" alt="<?php echo $value->name_project?>">
										</a>
									</div>

								</div>
								<div class="row">
									<div class="col-sm-12  col-md-12 text-left">
									 	<ul class="liststyle">
										<a href="<?php echo site_url('project/detail_project/' . $value->_id_project);?>" title="<?php echo $value->name_project?>">
										<li>
											<b><?php echo $value->name_project?></b>
										</li>
										</a>
										<li>
											<span><?php echo $value->address?> </span>
										</li>
										<li>
											<span> <?php echo $value->price?> USD</span>
										</li>
										<li>

										</li>
									</ul>

									</div>
								</div>


								<div class="row ">
									<div class="col-sm-12  col-md-12  text-center margin-buttom-5">

										<button type="button" class="btn btn-primary btn-md" onclick="showMap(<?php echo $value->lat?>, <?php echo $value->lng?>)">View Map</button>
									</div>

								</div>


							</div>

						</div>

					</div>
					<?php }
?>


				</div>

			</div>
		</div>
	</div>
</div>
</div>

<script>
	$('ul.nav-left-ml').toggle();
	$('label.nav-toggle span').click(function () {
	  $(this).parent().parent().children('ul.nav-left-ml').toggle(300);
	  var cs = $(this).attr("class");
	  if(cs == 'nav-toggle-icon glyphicon glyphicon-chevron-right') {
	    $(this).removeClass('glyphicon-chevron-right').addClass('glyphicon-chevron-down');
	  }
	  if(cs == 'nav-toggle-icon glyphicon glyphicon-chevron-down') {
	    $(this).removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-right');
	  }
	});
</script>
	<script type="text/javascript">
	function showMap(t1, t2){
		$("#dialog").dialog({
                    modal: true,
                    title: "Google Map",
                    width: 600,
                    hright: 450,

                    open: function () {
                        var mapOptions = {
                            center: new google.maps.LatLng(t1, t2),
                            zoom: 18,
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        }
                        var map = new google.maps.Map($("#dvMap")[0], mapOptions);
                        var myLatlng = new google.maps.LatLng(t1,t2);
                        var marker = new google.maps.Marker({
						    position: myLatlng,
						    title:"address"
						});

						marker.setMap(map);


                    }
                });
	}

    </script>


