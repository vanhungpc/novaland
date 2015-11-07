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
			      <a href="<?php echo site_url('detail_project/' . $value->_id_project);?>" title="<?php echo $value->name_project?>">
			        <img src="<?php echo base_url('uploads') . '/' . $value->img_slider;?>" alt="<?php echo $value->name_project?>">
			      </a>
			      <div class="container-s">
			        <div class="sub">
			          <h2><?php echo $value->name_project?></h2>
			          <div class="clear">
			          </div>
			          <!-- <div class="bn-desc"><span><?php echo $value->address?></span></div>
			          						 <div class="clear">
			          </div> -->
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
					<div class="col-sm-7">
						<h5 class="color-h5 margin-top-10"><?php if (!empty($data_project)) {?>Có tất cả <?php echo count($data_project)?> dự án <?php } else {?> Không có dự án <?php }
?>
</h5>
					</div>
					<form id="form0" action="<?php echo site_url('home/seach_project/')?>"  method="post"  enctype="multipart/form-data">
					<div class="col-sm-5">
							<div id="custom-search-input">
							<div class="input-group col-sm-12">

	                                <input type="text" name= "name_project" class="  search-query form-control" placeholder="Search" />
	                                <span class="input-group-btn">
	                                    <button class="btn btn-danger" type="submit">
	                                        <span class=" glyphicon glyphicon-search"></span>
	                                    </button>
	                                </span>


                            </div>
						</div>

					</div>

					</form>


					</div>
				</div>
			</div>

	</div>

	<div class="row margin-bottom-15">
		<div class="col-sm-4 col-xs-12">
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<?php $this->load->view('main/leftcontent', array('arr_news'=>$arr_news, 'county'=>$county)); ?>
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
				<?php if (!empty($data_project)) {
	?>
					<?php foreach ($data_project as $value) {?>

					<div class="col-sm-6 col-md-6 no-padding">
						<div class="card">
							<div class="info-employer row padding-2">
								<div class="row padding-left-15">
									<div class="col-sm-5 col-md-5 no-padding">
										 <a href="<?php echo site_url('project/detail_project/' . $value->_id_project);?>" title="<?php echo $value->name_project?>">
										<img class="card-img" src="<?php echo base_url('uploads') . '/' . $value->img_slider;?>" alt="<?php echo $value->name_project?>">
										</a>
									</div>

									<div class="col-sm-7 col-md-7  no-padding">
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

								</div>
								<!-- <div class="row">

								</div> -->


								<div class="row ">
									<div class="col-sm-12  col-md-12  text-right">

										<button type="button" class="btn btn-primary btn-md" onclick="showMap(<?php echo $value->lat?>, <?php echo $value->lng?>)">View Map</button>
									</div>

								</div>


							</div>

						</div>

					</div>
					<?php }
	?>
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


