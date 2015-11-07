<div class="card">
						<div class="row-employer-menu  row employer-tools">
							<div class="col-sm-12 col-sm-12 employer-box-header background-color-3">
								<h5 class="employer-tools-title"><?php echo lang("rental_property");?></h5>
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
                                                                        <?php if($this->lang->mci_segment =='vn') { ?>
							                <li><a href="<?php echo site_url('vn/detail_project/' . $values['_id_project']);?>" ><i class="fa fa-hand-o-right"></i><?php echo $values['name_project']?> </a></li>
                                                                        <?php } else { ?>
                                                                        <li><a href="<?php echo site_url('detail_project/' . $values['_id_project']);?>" ><i class="fa fa-hand-o-right"></i><?php echo $values['name_project']?> </a></li>                 
                                                                                <?php    } ?>
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
								<h5 class="employer-tools-title"><?php echo lang("news");?></h5>
								<!-- <div class="border-bottom-title border-color-3"></div> -->
							</div>
							<div class="col-sm-12 col-sm-12 employer-line"></div>
							<?php foreach ($arr_news as $value) {?>

							<div class="col-sm-12 employer-tools-item">
								<ul class="nav nav-list-main">
                                                                    <?php if($this->lang->mci_segment == 'vn'){ ?>
									  <li><a href="<?php echo site_url('vn/detail_news/' . $value->_id_news);?>" ><i class="fa fa-newspaper-o"></i><?php echo $value->title?> </a></li>
                                                                    <?php } else { ?>
                                                                           <li><a href="<?php echo site_url('detail_news/' . $value->_id_news);?>" ><i class="fa fa-newspaper-o"></i><?php echo $value->title?> </a></li>
                                                                    <?php } ?>
							       <!--  <label class="nav-toggle nav-header"><span>&nbsp;<?php echo $value->title?></span></label> -->
								</ul>
							</div>
							<div class="col-sm-12 col-sm-12 employer-line"></div>


							<?php }
?>
						</div>

						<!-- -->
					</div>