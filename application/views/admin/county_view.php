 <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/demo.css" type="text/css" media="screen" />

<div id="titlediv">
    <div class="clearfix container" id="pattern">
        <div class="row">
            <div class="col_12">
                <ul class="breadcrumbs hor-list">
                    <li><a href="<?php echo site_url('county');?>">County</a></li>
                    <li><a href="#">County update</a></li>
                </ul>
                <h1>County update</h1>
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
            <h2>County detail</h2>
            <div class="widget_inside">
                <div class="col_12">
                    <div class="pre_2 col_8 last">
                        <div class="form">
                            <div class="clearfix">
                                    <label>Title</label>
                                    <div class="input">
                                        <input class="xlarge validate[required]" type="text" name="name_county" id="name_county" value="<?php echo $county['name_county']?>" readonly />
                                    </div>
                                </div>






                                <div class="clearfix">
                                    <div class="input" style="margin-left:300px !important;">
                                       <a href="<?php echo site_url('county');?>"><input type="submit" class="button blue" value="Back"></input></a>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col_12"></div>
    </div>
</div>