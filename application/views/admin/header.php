<html lang="en-us">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge;chrome=1" >
        <link rel="apple-touch-con" href="" />
        <title>Novaland admin</title>
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">

        <!-- The Columnal Grid and mobile stylesheet -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/styles/columnal/columnal.css" type="text/css" media="screen" />

        <!-- Fixes for IE -->

        <!--[if lt IE 9]>
                    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/styles/columnal/ie.css" type="text/css" media="screen" />
                    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/styles/ie8.css" type="text/css" media="screen" />
                    <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
                    <script type="text/javascript" src="<?php echo base_url();?>assets/admin/scripts/flot/excanvas.min.js"></script>
                <![endif]-->

        <!-- Now that all the grids are loaded, we can move on to the actual styles. -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/scripts/jqueryui/jqueryui.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/styles/style.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/styles/global.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/styles/config.css" type="text/css" media="screen" />

<script src="<?php echo base_url()?>/assets/novaland/js/jquery.min.js"></script>



        <!-- Use CDN on production server -->
        <!-- <script src="assets/scripts/jquery-1.6.4.min.js"></script> -->
        <!-- <script src="assets/scripts/jqueryui/jquery-ui-1.8.16.custom.min.js"></script> -->


        <!-- Menu -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/scripts/superfish/superfish.css" type="text/css" media="screen" />
        <script src="<?php echo base_url();?>assets/admin/scripts/superfish/superfish.js"></script>

        <!-- Adds HTML5 placeholder element to those lesser browsers -->
        <script src="<?php echo base_url();?>assets/admin/scripts/jquery.placeholder.1.2.min.shrink.js"></script>

        <!-- Adds charts -->
        <script type="text/javascript" src="<?php echo base_url();?>assets/admin/scripts/flot/jquery.flot.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/admin/scripts/flot/jquery.flot.pie.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/admin/scripts/flot/jquery.flot.stack.min.js"></script>

        <!-- Form Validation Engine -->
        <script src="<?php echo base_url();?>assets/admin/scripts/formvalidator/jquery.validationEngine.js"></script>
        <script src="<?php echo base_url();?>assets/admin/scripts/formvalidator/jquery.validationEngine-en.js"></script>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/scripts/formvalidator/validationEngine.jquery.css" type="text/css" media="screen" />

        <!-- Sortable, searchable DataTable -->
        <script src="<?php echo base_url();?>assets/admin/scripts/jquery.dataTables.min.js"></script>

        <!-- Custom Tooltips -->
        <script src="<?php echo base_url();?>assets/admin/scripts/twipsy.js"></script>

        <!-- WYSIWYG Editor -->
        <script src="<?php echo base_url();?>assets/admin/scripts/cleditor/jquery.cleditor.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/scripts/cleditor/jquery.cleditor.css" type="text/css" media="screen" />

        <!-- Form Validation Engine -->
        <script src="<?php echo base_url();?>assets/admin/scripts/formvalidator/jquery.validationEngine.js"></script>
        <script src="<?php echo base_url();?>assets/admin/scripts/formvalidator/jquery.validationEngine-en.js"></script>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/scripts/formvalidator/validationEngine.jquery.css" type="text/css" media="screen" />

        <!-- Fullsized calendars -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/scripts/fullcalendar/fullcalendar.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/scripts/fullcalendar/fullcalendar.print.css" type="text/css" media="print" />
        <script src="<?php echo base_url();?>assets/admin/scripts/fullcalendar/fullcalendar.min.js"></script>
        <script src="<?php echo base_url();?>assets/admin/scripts/fullcalendar/gcal.js"></script>

        <!-- Colorbox is a lightbox alternative-->
        <script src="<?php echo base_url();?>assets/admin/scripts/colorbox/jquery.colorbox-min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/scripts/colorbox/colorbox.css" type="text/css" media="screen" />

        <!-- Colorpicker -->
        <script src="<?php echo base_url();?>assets/admin/scripts/colorpicker/colorpicker.js"></script>
        <!-- <script src="<?php echo base_url();?>assets/admin/scripts/muse.js"></script> -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/scripts/colorpicker/colorpicker.css" type="text/css" media="screen" />

        <!-- All the js used in the demo -->
      <!--   <script src="<?php echo base_url();?>assets/admin/scripts/demo.js"></script> -->




        <!--<meta charset="UTF-8">-->
        <meta http-equiv='content-Type' content='text/html; charset=UTF-8'/>
    </head>
    <body>
        <div id="wrap">
            <div id="main">
                <header class="container">
                    <div class="row clearfix">
                        <div class="left"> <a href="javascript:;" style="color: #FFFFFF;font-family: arial;font-size: 20px;">Novaland Administrator Panel</a> </div>
                        <?php
$logged_in_status = $this->session->userdata('logged_in_status');
if ($logged_in_status) {
	?>
                            <div class="right">
                                <ul id="toolbar">
                                    <li><span>Logged in as</span> <a class="user" href="#">Administrator</a> <a id="loginarrow" href="#"></a></li>
                                    <!--<li><a id="messages" href="#">Messages</a></li>
                                    <li><a id="settings" href="#">Settings</a></li>
                                    <li><a id="search" href="#">Search</a></li>-->
                                </ul>
                                <div id="logindrop" style="right:18px;">
                                    <ul>
                                        <li id="editprofile"><a href="#">Edit Profile</a></li>
                                        <li id="logoutprofile"><a href="<?php echo site_url('admin/logout');?>">Logout</a></li>
                                    </ul>
                                </div>
                                <div id="searchdrop">
                                    <input type="text" id="searchbox" placeholder="Search...">
                                </div>
                            </div>
                            <?php
}
?>
                    </div>
                </header>
                <script type="text/javascript" >


                    function merchantCategoryChange() {
                        $.ajax({
                            type: "POST",
                            url: "<?php echo site_url('admin/merchant/checkSubcategories');?>",
                            data: {categoryId: $("#merchant_category").val()}
                        }).done(function(dataResponse) {
                            if (dataResponse != "") {
                                $("#subCategories").html(dataResponse);
                                $("#subCategoriesDiv").show();
                            } else {
                                $("#subCategoriesDiv").hide();
                                $("#subCategories").html();
                            }
                        });
                    }






                </script>


