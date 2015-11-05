 <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/demo.css" type="text/css" media="screen" />

<div id="titlediv">
    <div class="clearfix container" id="pattern">
        <div class="row">
            <div class="col_12">
                <ul class="breadcrumbs hor-list">
                    <li><a href="<?php echo site_url('county');?>">County</a></li>
                    <li><a href="#">County create</a></li>
                </ul>
                <h1>County create</h1>
            </div>
        </div>
    </div>
</div>

<?php
$error_msg = $this->session->flashdata('error_msg');
if (!empty($error_msg)) {
	?>
    <div class="notification undone"><?php echo $error_msg;?></div>
    <?php
}
?>

<div class="container" id="actualbody">
    <div class="row">
        <div class="widget clearfix">
            <h2>County create</h2>
            <div class="widget_inside">
                <div class="col_12">
                    <div class="pre_2 col_8 last">
                        <div class="form">
                            <form id="form0" action="<?php echo site_url('county/addCountyFormSubmission/')?>"  method="post"  enctype="multipart/form-data">
                                <div class="clearfix">
                                    <label>Name County</label>
                                    <div class="input">
                                        <input class="xlarge validate[required]" type="text" name="name_county" id="name_county" />
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <div class="input" style="margin-left:300px !important;">
                                        <input type="submit" class="button blue" value="Add county" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col_12"></div>
    </div>
</div>