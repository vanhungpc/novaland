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

					<div class="card">
							<div class="info-employer row">
								<div class="row">
									<div class="col-sm-12 col-sm-12 padding-row">
										<h5 class="color-h5"><?php echo $data_project['name_project']?></h5>

									</div>

									<div class="col-sm-12 padding-row">
										<div class="col-sm-6 padding-row" >
											<span>Địa chỉ:</span> <label class="hotlines"> <span class="hotlines"> <?php echo $data_project['address']?></span></label>
										</div>
										<div class="col-sm-6 padding-row">
											<span>Giá bán: </span><label class="hotlines"> <span> <?php echo $data_project['price']?>  $</span> </label>
										</div>
									</div>

									<div class="col-sm-12 padding-row">
										<button type="button" class="btn btn-primary btn-md" onclick="showMap(<?php echo $data_project['lat']?>, <?php echo $data_project['lng']?>)">View Map</button>
									</div>

									<div class="col-sm-12 col-sm-12 padding-row">
										<?php echo $data_project['description']?>
									</div>


								</div>
							</div>
						</div>
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


