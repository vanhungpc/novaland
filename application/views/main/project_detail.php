<style>
	.nav-list{padding-right:15px;padding-left:15px;margin-bottom:0;}
	.nav-list-main{padding-left:0px;padding-right:0px;margin-bottom:0;}
	span.nav-toggle-icon{font-size:7px !important;top:-2px !important;color:#888 !important;}
</style>

<div class="content">

	<div class='container Module Module-31'>



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
							                <li><a href="<?php echo site_url('project/detail_project/' . $values['_id_project']);?>"><i class="fa fa-hand-o-right"></i><?php echo $values['name_project']?> </a></li>
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

					<div class="card">
							<div class="info-employer row">
								<div class="row">
									<div class="col-sm-12 col-sm-12 padding-row">
										<h5 class="color-h5"><?php echo $data_project['name_project']?></h5>
										<ul>
											<li>
												<span><?php echo $data_project['address']?></span>
											</li>
											<li>
												<span><?php echo $data_project['price']?>  $</span>
											</li>
										</ul>
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


