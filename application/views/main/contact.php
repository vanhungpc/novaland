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


	<div class="row margin-bottom-15">

        <div class="col-sm-8 col-xs-12 col-md-push-4 col-sm-push-4">
            <div class="row form_contact">
                <div class="col-sm-12 col-sx-12 "  >

                                    <div class="row">
                                        <div class="col-sm-12 col-sx-12">
                                            <?php echo $contactus['content_contactus'] ?>
                                        </div>
                                    </div>
                                    <div class="form">
                                        <form id="form0" action="<?php echo site_url("home/addcontact") ?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-3 col-sx-3">
                                            <p style="padding-top:10px;">Your name:</p>
                                        </div>
                                        <div class="col-sm-6 col-sx-6">
                                            <input class="xlarge validate[required]" type="text" name="your_name" id="your_name" />
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-sm-3 col-sx-3">
                                            <p style="padding-top:10px;">Phone number:</p>
                                        </div>
                                        <div class="col-sm-6 col-sx-6">
                                            <input class="xlarge validate[required]" type="text" name="your_name" id="your_name" />
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
                                            <input class="xlarge validate[required]" type="text" name="title" id="title" />
                                        </div>
                                    </div>
                                      <div class="row">
                                        <div class="col-sm-3 col-sx-3">
                                            <p style="padding-top:10px;">Content message:</p>
                                        </div>
                                        <div class="col-sm-6 col-sx-6">
                                            <textarea name="message" id="message"></textarea>
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

		<div class="col-sm-4 col-xs-12  col-md-pull-8 col-sm-pull-8">
			<div class="row">
				<div class="col-sm-12 col-md-12">
                                    <?php $this->load->view('main/leftcontent', array('arr_news' => $arr_news, 'county' => $county, 'data_video' => $data_video));?>
				</div>

			</div>
		</div>
    <div id="dialog" style="display: none">
	        <div id="dvMap" style="height: 380px; width: 580px;">
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

