 <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/demo.css" type="text/css" media="screen" />

<div id="titlediv">
    <div class="clearfix container" id="pattern">
        <div class="row">
            <div class="col_12">
                <ul class="breadcrumbs hor-list">
                    <li><a href="<?php echo site_url('video');?>">Video</a></li>
                    <li><a href="#">Video detail</a></li>
                </ul>
                <h1>Video detail</h1>
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
            <h2>Video detail</h2>
            <div class="widget_inside">
                <div class="col_12">
                    <div class="pre_2 col_8 last">
                        <div class="form">
                            <div class="clearfix">
                                    <label>Title</label>
                                    <div class="input">
                                        <input class="xlarge validate[required]" type="text" name="title_video" id="title" value="<?php echo $video['title_video']?>" readonly />
                                    </div>
                                </div>
                                  <div class="clearfix">
                                    <label>URL Video</label>
                                    <div class="input">
                                        <input class="xlarge validate[required]" type="text" name="title_video" id="title" value="<?php echo $video['url_video']?>" readonly />
                                    </div>
                                </div>



                                <div class="clearfix">
                                    <div class="input" style="margin-left:300px !important;">
                                       <a href="<?php echo site_url('video');?>"><input type="submit" class="button blue" value="Back"></input></a>
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