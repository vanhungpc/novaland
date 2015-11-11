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
            <h2>County update</h2>
            <div class="widget_inside">
                <div class="col_12">
                    <div class="pre_2 col_8 last">
                        <div class="form">
                            <form id="form0" action="<?php echo site_url('county/editCountyFormSubmission/' . $county['_id_county'])?>"  method="post"  enctype="multipart/form-data">
                                <div class="clearfix">
                                    <label>Name County EN</label>
                                    <div class="input">
                                        <input class="xlarge validate[required]" type="text" name="name_county" id="name_county" value="<?php echo $county['name_county']?>" />
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <label>Name County VI</label>
                                    <div class="input">
                                        <input class="xlarge validate[required]" type="text" name="name_county_vi" id="name_county_vi" value="<?php echo $county['name_county_vi']?>" />
                                    </div>
                                </div>


                                <div class="clearfix">
                                    <div class="input" style="margin-left:300px !important;">
                                        <input type="submit" class="button blue" value="Update county" />
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

<script type="text/javascript"> $(function() {    var editor = CKEDITOR.replace('txt_content', { filebrowserBrowseUrl : '<?php echo base_url() . "public/ckfinder/ckfinder.html";?>', filebrowserImageBrowseUrl : '<?php echo base_url() . "public/ckfinder/ckfinder.html?Type=Images";?>', filebrowserFlashBrowseUrl : '<?php echo base_url() . "public/ckfinder/ckfinder.html?Type=Flash"?>', filebrowserUploadUrl : '<?php
echo base_url() . "public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files"?>', filebrowserImageUploadUrl : '<?php
echo base_url() . "public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images";?>', filebrowserFlashUploadUrl : '<?php
echo base_url() . "ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash";?>', filebrowserWindowWidth : '800', filebrowserWindowHeight : '480' }); CKFinder.setupCKEditor( editor, "<?php
echo base_url() . 'public/ckfinder/'?>" ); }) </script>