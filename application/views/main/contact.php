<style>
	.nav-list{padding-right:15px;padding-left:15px;margin-bottom:0;}
	.nav-list-main{padding-left:0px;padding-right:0px;margin-bottom:0;}
	span.nav-toggle-icon{font-size:7px !important;top:-2px !important;color:#888 !important;}
</style>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.2/jquery-ui.js" type="text/javascript"></script>
    <link href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.2/themes/blitzer/jquery-ui.css"
        rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/main/css/contact.css">
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
			      <a href="thesunavenue/chuong-trinh-ban-hang.html" title="The Sun Avenue">
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
                                    <?php $this->load->view('main/leftcontent', array('arr_news'=>$arr_news, 'county'=>$county, 'data_video'=>$data_video)); ?>
				</div>

			</div>
		</div>
    <div id="dialog" style="display: none">
	        <div id="dvMap" style="height: 380px; width: 580px;">
	        </div>
	    </div>
		<div class="col-sm-8 col-xs-12">
			<div class="row form_contact">
				<div class="col-sm-12 col-sx-12 "  >
                                    <div class="row">
                                        <div class="col-sm-12 col-sx-12">
                                            <h2 style="color:#014876">Contact us</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-sx-12">
                                            Thank you very much for saving your time to visit our website.<br>
                                            Citihouse has many house, villas, office, apartment for rent in HCMC.<br>
                                            If you have any futher requirement, please be free to contact us at anytime.<br>
                                            <h4 style="color: #ff0000">CITIHOUSE GROUP</h4>
                                            Address: The 16th floor - Saigon Tower, 29 Le Duan Boulevard, District 1, HCM City, Vietnam.<br>
                                            Email: citihousegroup@gmail.com<br>
                                            Hotline: (84) 909 288 281 - (84) 905 263 773<br>
                                            Tel: (84.8) 3520 7646 – Fax: (84.8) 3520 7604.<br>
                                            Tax code: 0312901440
                                        </div>
                                    </div>
                                    <div class="form">
                                        <form id="form0" action="<?php echo site_url("home/contact") ?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-3 col-sx-3">
                                            <p style="padding-top:10px;">Your name:</p>
                                        </div>
                                        <div class="col-sm-6 col-sx-6">
                                            <input class="xlarge validate[required]" type="text" name="name" id="name" />
                                        </div>                                        
                                    </div>
                                     <div class="row">
                                        <div class="col-sm-3 col-sx-3">
                                            <p style="padding-top:10px;">Phone number:</p>
                                        </div>
                                        <div class="col-sm-6 col-sx-6">
                                            <input class="xlarge validate[required]" type="text" name="phone" id="phone" />
                                        </div>                                        
                                    </div>  
                                     <div class="row">
                                        <div class="col-sm-3 col-sx-3">
                                            <p style="padding-top:10px;">Email:</p>
                                        </div>
                                        <div class="col-sm-6 col-sx-6">
                                            <input class="xlarge validate[required]" type="text" name="email" id="email" />
                                        </div>                                        
                                    </div>   
                                     <div class="row">
                                        <div class="col-sm-3 col-sx-3">
                                            <p style="padding-top:10px;">Subject:</p>
                                        </div>
                                        <div class="col-sm-6 col-sx-6">
                                            <input class="xlarge validate[required]" type="text" name="subject" id="subject" />
                                        </div>                                        
                                    </div>    
                                      <div class="row">
                                        <div class="col-sm-3 col-sx-3">
                                            <p style="padding-top:10px;">Content message:</p>
                                        </div>
                                        <div class="col-sm-6 col-sx-6">
                                            <textarea name="content" id="content"></textarea>
                                        </div>                                        
                                    </div>
                                            <div class="row" style="margin-bottom:20px;margin-top: 20px;">
                                        <div class="col-sm-3 col-sx-3">
                                          
                                        </div>
                                        <div class="col-sm-6 col-sx-6">
                                            <input type="submit" class="btn btn-primary custom_btn_send_message" value="send message">
                                        </div>                                        
                                    </div>
                                        </form>
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

