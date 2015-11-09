 <style>#cke_description {
    width: auto !important;
}
</style>
 <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/demo.css" type="text/css" media="screen" />
 <script src="http://maps.google.com/maps/api/js?sensor=false"></script>

   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="<?php echo base_url()?>/assets/admin/scripts/jquery.ui.addresspicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/ckfinder/ckfinder.js"></script>
 <script>
  $(function() {
    var addresspicker = $( "#addresspicker" ).addresspicker({
      componentsFilter: 'country:FR'
    });
    var addresspickerMap = $( "#addresspicker_map" ).addresspicker({
      regionBias: "fr",
      language: "fr",
      updateCallback: showCallback,
      mapOptions: {
        zoom: 4,
        center: new google.maps.LatLng(46, 2),
        scrollwheel: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      },
      elements: {
        map:      "#map",
        lat:      "#lat",
        lng:      "#lng",
        street_number: '#street_number',
        route: '#route',
        locality: '#locality',
        sublocality: '#sublocality',
        administrative_area_level_3: '#administrative_area_level_3',
        administrative_area_level_2: '#administrative_area_level_2',
        administrative_area_level_1: '#administrative_area_level_1',
        country:  '#country',
        postal_code: '#postal_code',
        type:    '#type'
      }
    });

    var gmarker = addresspickerMap.addresspicker( "marker");
    gmarker.setVisible(true);
    addresspickerMap.addresspicker( "updatePosition");

    $('#reverseGeocode').change(function(){
      $("#addresspicker_map").addresspicker("option", "reverseGeocode", ($(this).val() === 'true'));
    });

    function showCallback(geocodeResult, parsedGeocodeResult){
      $('#callback_result').text(JSON.stringify(parsedGeocodeResult, null, 4));
    }
    // Update zoom field
    var map = $("#addresspicker_map").addresspicker("map");
    google.maps.event.addListener(map, 'idle', function(){
      $('#zoom').val(map.getZoom());
    });

  });
  </script>

<div id="titlediv">
    <div class="clearfix container" id="pattern">
        <div class="row">
            <div class="col_12">
                <ul class="breadcrumbs hor-list">
                    <li><a href="<?php echo site_url('project');?>">Project</a></li>
                    <li><a href="#">Project update</a></li>
                </ul>
                <h1>Project update</h1>
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
            <h2>Project update</h2>
            <div class="widget_inside">
                <div class="col_12">
                    <div class="pre_2 col_8 last">
                        <div class="form">
                            <form id="form0" action="<?php echo site_url('project/editProjectFormSubmission/' . $project['_id_project'])?>"  method="post"  enctype="multipart/form-data">
                                <div class="clearfix">
                                    <label>Name Project</label>
                                    <div class="input">
                                        <input class="xlarge validate[required]" type="text" name="name_project" id="nameproject" value="<?php echo $project['name_project']?>" />
                                    </div>
                                </div>

                                <div class="clearfix">
                                    <label>Address</label>
                                    <div class="input">
                                        <input class="xlarge validate[required]" type="text" id="address"  name="address" value="<?php echo $project['address']?>"/>
                                    </div>
                                </div>


                                <div class="clearfix">
                                    <label>Location</label>
                                    <div class="input">
                                        <input class="xlarge" type="text" id="addresspicker_map"  value="<?php echo $project['address']?>"/>
                                    </div>
                                </div>

                                <div class="clearfix">
                                    <label>Map</label>
                                    <div class="input">
                                         <div class='map-wrapper'>
                                   <label id="geo_label" for="reverseGeocode">Reverse Geocode after Marker Drag?</label>
                                      <select id="reverseGeocode">
                                        <option value="false" selected>No</option>
                                        <option value="true">Yes</option>
                                      </select><br/>



                                    </div>
                                    </div>

                                </div>
                                <div id="map"></div>

                                <input id="lat" name="lat" hidden value="<?php echo $project['lat']?>">
                                <input id="lng" name="lng" hidden value="<?php echo $project['lng']?>">


                                 <div class="clearfix">
                                    <label>Price</label>
                                    <div class="input">
                                        <input class="xlarge validate[required]" type="text" name="price" id="price" value="<?php echo $project['price']?>"/>
                                    </div>
                                </div>
                                 <div class="clearfix">
                                    <label>Category</label>
                                    <div class="input">
                                        <select class="xlarge validate[required]" name="category" id="category">
                                             <?php foreach ($category as $value) {
	?>
                                                <?php if ($value->_id_category == $project['_id_category']) {?>
                                                    <option  value="<?php echo $value->_id_category?>" selected><?php echo $value->name_category_eng?></option>
                                                <?php } else {?>
                                                    <option  value="<?php echo $value->_id_category?>"><?php echo $value->name_category_eng?></option>
                                                <?php }
	?>
                                            <?php }
?>

                                        </select>
                                    </div>
                                </div>

                                <div class="clearfix">
                                    <label>County</label>
                                    <div class="input">
                                        <select class="xlarge validate[required]" name="county" id="county">
                                              <?php foreach ($county as $value) {
	?>
                                                <?php if ($value->_id_county == $project['_id_county']) {?>
                                                    <option  value="<?php echo $value->_id_county?>" selected><?php echo $value->name_county?></option>
                                                <?php } else {?>
                                                    <option  value="<?php echo $value->_id_county?>"><?php echo $value->name_county?></option>
                                                <?php }
	?>
                                                                                            <?php }
?>

                                        </select>
                                    </div>
                                </div>

                                 <div class="clearfix">
                                    <label>Slider</label>
                                    <div class="input">
                                        <select class="xlarge validate[required]" name="slider" id="slider">
                                            <option value="1"  <?php if ($project['slider'] == 1) {?> selected="selected"<?php }
?> >none</option>
                                            <option value="2"  <?php if ($project['slider'] == 2) {?> selected="selected"<?php }
?> >slider</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <label>Description Slider</label>
                                    <div class="input">
                                        <input class="xlarge validate[required]" type="text" name="desc_slider" id="desc_slider" value="<?php echo $project['desc_slider']?>"/>

                                    </div>
                                </div>

                                 <div class="clearfix">
                                    <label>Upload</label>
                                    <div class="input">

                                        <input   id="file_upload" name="file_upload" type="file" />
                                       <div> <span class="fileDiv"> <img src="<?php echo base_url('uploads') . '/' . $project['img_slider'];?>" with = "100" height = "100"/></span>
                                            <input class="xlarge validate[required]" type="hidden" name="image_name" id="image_name" value="<?php echo $project['img_slider']?>"/>

                                        </div>
                                    </div>
                                    </div>

                                 <div class="clearfix">
                                    <label>Description</label>

                                </div>

                                    <div> <span class="right">
                                    <textarea id="txt_content" name="txt_content"><?php echo $project['description']?></textarea>
                                    </span> </div>
                                <div class="clearfix">
                                    <div class="input" style="margin-left:300px !important;">
                                        <input type="submit" class="button blue" value="Add produce" />
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