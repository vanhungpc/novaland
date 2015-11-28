 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/demo.css" type="text/css" media="screen" />

<script src="<?php echo base_url() ?>/assets/admin/scripts/jquery.ui.addresspicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/ckfinder/ckfinder.js"></script>
<div id="titlediv">
    <div class="clearfix container" id="pattern">
        <div class="row">
            <div class="col_12">
                <ul class="breadcrumbs hor-list">
                    <li><a href="<?php echo site_url('contactus'); ?>">Contact us</a></li>
                    <li><a href="#">Contact Us update</a></li>
                </ul>
                <h1>Contact us update</h1>
            </div>
        </div>
    </div>
</div>

<?php
$error_msg = $this->session->flashdata('error_msg');
if (!empty($error_msg)) {
	?>
    <div class="notification undone"><?php echo $error_msg; ?></div>
    <?php
}
?>

<div class="container" id="actualbody">
    <div class="row">
        <div class="widget clearfix">
            <h2>Contact Us update</h2>
            <div class="widget_inside">
                <div class="col_12">
                    <div class="pre_2 col_8 last">
                        <div class="form">
                            <form id="form0" action="<?php echo site_url('contactus/editContactUsFormSubmission/' . $contactus['_id_contactus']) ?>"  method="post"  enctype="multipart/form-data">


                                 <div class="clearfix">
                                    <label>Description</label>

                                </div>

                                    <div> <span class="right">
                                    <textarea id="txt_content" name="txt_content"><?php echo $contactus['content_contactus'] ?></textarea>
                                    </span> </div>
                                <div class="clearfix">
                                    <div class="input" style="margin-left:300px !important;">
                                        <input type="submit" class="button blue" value="Update contact us" />
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

<script type="text/javascript"> $(function() {    var editor = CKEDITOR.replace('txt_content', { filebrowserBrowseUrl : '<?php echo base_url() . "public/ckfinder/ckfinder.html"; ?>', filebrowserImageBrowseUrl : '<?php echo base_url() . "public/ckfinder/ckfinder.html?Type=Images"; ?>', filebrowserFlashBrowseUrl : '<?php echo base_url() . "public/ckfinder/ckfinder.html?Type=Flash" ?>', filebrowserUploadUrl : '<?php
echo base_url() . "public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files" ?>', filebrowserImageUploadUrl : '<?php
echo base_url() . "public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images"; ?>', filebrowserFlashUploadUrl : '<?php
echo base_url() . "ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash"; ?>', filebrowserWindowWidth : '800', filebrowserWindowHeight : '480' }); CKFinder.setupCKEditor( editor, "<?php
echo base_url() . 'public/ckfinder/' ?>" ); }) </script>