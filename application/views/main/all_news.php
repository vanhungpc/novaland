<style>
	.nav-list{padding-right:15px;padding-left:15px;margin-bottom:0;}
	.nav-list-main{padding-left:0px;padding-right:0px;margin-bottom:0;}
	span.nav-toggle-icon{font-size:7px !important;top:-2px !important;color:#888 !important;}
</style>


<div class="content">

	<div class='container Module Module-31'>



	<div class="row margin-bottom-15">
	<div class="col-sm-8 col-xs-12 col-md-push-4 col-sm-push-4">
			<div class="row  margin-right-25">
				<div class="col-sm-12 col-sm-12 no-padding">
				<?php if (!empty($data_all_news)) {
	?>
					<?php foreach ($data_all_news as $value) {?>

					<div class="col-xs-12 col-sm-6 col-md-6  no-padding">
						<div class="card">
							<div class="info-employer row padding-2">
								<div class="row padding-left-15">
									<div class="col-sm-5 col-md-5 col-xs-5 no-padding">
										 <a href="<?php echo site_url('news/detail_news/' . $value->_id_news);?>" title="<?php echo $value->title?>">
										<img class="card-img img_height" src="<?php echo base_url('uploads') . '/' . $value->img_news;?>" alt="<?php echo $value->title?>">
										</a>
									</div>

									<div class="col-sm-7 col-md-7 col-xs-7 no-padding">
										 	<div class="col-sm-12  col-md-12 text-left">
										 	<ul class="liststyle">
											<a href="<?php echo site_url('news/detail_news/' . $value->_id_news);?>" title="<?php echo $value->title?>">
											<li>
												<b><?php echo $value->date_create?></b>
											</li>
											</a>
											<li>
												<span><?php echo $value->title?> </span>
											</li>
									<!-- 		<li>
										<span> <?php echo $value->price?> USD</span>
									</li> -->
											<li>

											</li>
										</ul>

										</div>
									</div>

								</div>
								<!-- <div class="row">

								</div> -->


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

		<div class="col-sm-4 col-xs-12 col-md-pull-8 col-sm-pull-8">
			<div class="row padding-10">
				<div class="col-sm-12 col-md-12">
 <?php $this->load->view('main/leftcontent', array('arr_news' => $arr_news, 'county' => $county, 'data_video' => $data_video));?>

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



