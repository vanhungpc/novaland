 <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/demo.css" type="text/css" media="screen" />

   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="<?php echo base_url()?>/assets/admin/scripts/jquery.ui.addresspicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/ckfinder/ckfinder.js"></script>

<div id="titlediv">
    <div class="clearfix container" id="pattern">
        <div class="row">
            <div class="col_12">
                <ul class="breadcrumbs hor-list">
                    <li><a href="<?php echo site_url('news');?>">News</a></li>
                    <li><a href="#">News update</a></li>
                </ul>
                <h1>News update</h1>
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
            <h2>News update</h2>
            <div class="widget_inside">
                <div class="col_12">
                    <div class="pre_2 col_8 last">
                        <div class="form">
                            <div class="clearfix">
                                    <label>Title</label>
                                    <div class="input">
                                        <input class="xlarge validate[required]" type="text" name="title" id="title" value="<?php echo $news['title']?>" readonly />
                                    </div>
                                </div>






                                 <div class="clearfix">
                                    <label>Upload</label>
                                    <div class="input">

                                      <!--   <input   id="file_upload" name="file_upload" type="file" /> -->
                                       <div> <span class="fileDiv"> <img src="<?php echo base_url('uploads') . '/' . $news['img_news'];?>" with = "100" height = "100"/></span>
                                            <input class="xlarge validate[required]" type="hidden" name="image_name" id="image_name" value="<?php echo $news['img_news']?>"/>

                                        </div>
                                    </div>
                                    </div>

                                 <div class="clearfix">
                                    <label>Description</label>

                                </div>

                                    <div> <span class="right">
                                    <textarea id="txt_content" readonly="true" name="txt_content"><?php echo $news['content']?></textarea>
                                    </span> </div>
                                <div class="clearfix">
                                    <div class="input" style="margin-left:300px !important;">
                                       <a href="<?php echo site_url('news');?>"><input type="submit" class="button blue" value="Back"></input></a>
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

<script type="text/javascript"> $(function() {    var editor = CKEDITOR.replace('txt_content', { filebrowserBrowseUrl : '<?php echo base_url() . "public/ckfinder/ckfinder.html";?>', filebrowserImageBrowseUrl : '<?php echo base_url() . "public/ckfinder/ckfinder.html?Type=Images";?>', filebrowserFlashBrowseUrl : '<?php echo base_url() . "public/ckfinder/ckfinder.html?Type=Flash"?>', filebrowserUploadUrl : '<?php
echo base_url() . "public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files"?>', filebrowserImageUploadUrl : '<?php
echo base_url() . "public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images";?>', filebrowserFlashUploadUrl : '<?php
echo base_url() . "ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash";?>', filebrowserWindowWidth : '800', filebrowserWindowHeight : '480' }); CKFinder.setupCKEditor( editor, "<?php
echo base_url() . 'public/ckfinder/'?>" ); }) </script>