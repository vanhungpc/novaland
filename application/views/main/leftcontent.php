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
							        <label class="nav-toggle nav-header"><span><i class="fa fa-angle-double-right"></i>&nbsp;<?php echo $value['name_county'] ?></span></label>
							            <ul class="nav nav-list nav-left-ml menu_left">
							            	<?php foreach ($value['arr_project'] as $key => $values) {
		$lang = $this->lang->mci_segment . "";
		?>
                                                                        <?php if ($lang == "vn") {?>
							                <li><a href="<?php echo site_url('vn/project/detail_project/' . $values['_id_project']); ?>" ><i class="fa fa-hand-o-right"></i><?php echo $values['name_project'] ?> </a></li>
                                                        <?php } else {
			?>
                                                              <li><a href="<?php echo site_url('project/detail_project/' . $values['_id_project']); ?>" ><i class="fa fa-hand-o-right"></i><?php echo $values['name_project'] ?> </a></li>
                                                                        <?php
}}
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
							<?php foreach ($arr_news as $value) {
	?>

							<div class="col-sm-12 employer-tools-item">
								<ul class="nav nav-list-main">
                                                                    <?php if ($lang == "vn") {?>
									  <li><a href="<?php echo site_url('vn/news/detail_news/' . $value->_id_news); ?>" ><i class="fa fa-newspaper-o"></i><?php echo $value->title ?> </a></li>
                                                                    <?php } else {
		?>
                                                                          <li><a href="<?php echo site_url('news/detail_news/' . $value->_id_news); ?>" ><i class="fa fa-newspaper-o"></i><?php echo $value->title ?> </a></li>
                                                                          <?php
}
	?>
							       <!--  <label class="nav-toggle nav-header"><span>&nbsp;<?php echo $value->title ?></span></label> -->
								</ul>

							</div>
							<div class="col-sm-12 col-sm-12 employer-line"></div>


							<?php }

?>

<?php if (sizeof($arr_news) >= 6) {?>

							<div class="col-sm-12 employer-tools-item">
								<ul class="nav nav-list-main">
									  <li><a href="<?php echo site_url('news/detail_news/' . $value->_id_news); ?>" ><?php echo lang('show_more_video') ?></a></li>

							       <!--  <label class="nav-toggle nav-header"><span>&nbsp;<?php echo $value->title ?></span></label> -->
								</ul>

							</div>

	<?php }
?>


						</div>

						<!-- -->

						<!-- video news -->

						<div class="row-employer-menu  row employer-tools">
							<div class="col-sm-12 col-sm-12 employer-box-header background-color-3">
								<h5 class="employer-tools-title">VIDEO</h5>
								<!-- <div class="border-bottom-title border-color-3"></div> -->
							</div>
							<div class="col-sm-12 col-sm-12 employer-line"></div>

							<?php if (!empty($data_video)) {
	foreach ($data_video as $value) {?>

							<div class="col-sm-12 employer-tools-item">
								<label class="nav-toggle nav-header"><span><i class="fa fa-video-camera"></i><?php echo $value->title_video ?></span></label>
								<iframe class="col-lg-12 col-md-12 col-sm-12" src="<?php echo $value->url_video ?>" frameborder="0" allowfullscreen></iframe>
							</div>
							<div class="col-sm-12 col-sm-12 employer-line"></div>

<?php }
}

?>

<?php if (sizeof($data_video) >= 3) {
	?>

							<div class="col-sm-12 employer-tools-item">
								<ul class="nav nav-list-main">
                                                                    <?php if ($lang == "vn") {?>
									  <li><a href="<?php echo site_url('vn/video/all_video/'); ?>" ><?php echo lang('show_more_video'); ?></a></li>
                                                                    <?php } else {
		?>
                                                                          <li><a href="<?php echo site_url('video/all_video/'); ?>" ><?php echo lang('show_more_video'); ?></a></li>
                                                                          <?php
}
	?>
							       <!--  <label class="nav-toggle nav-header"><span>&nbsp;<?php echo $value->title ?></span></label> -->
								</ul>

							</div>

	<?php }
?>



						</div>
					</div>