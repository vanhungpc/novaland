<?php
$logged_in_status = $this->session->userdata('logged_in_status');
if ($logged_in_status) {
	?>
    <div id="titlediv">
        <div class="clearfix container" id="pattern">
            <div class="row">
                <div class="col_12">
                    <ul class="breadcrumbs hor-list">
                        <li><a href="./index.php.html">Dashboard</a></li>
                        <li><a href="./forms.php.html">Forms</a></li>
                    </ul>
                    <h1>Forms</h1>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>

<?php
$err_msg = $this->session->flashdata('err_msg');
if (!empty($err_msg)) {
	?>
    <span class="notification undone"><?php echo $err_msg;?></span>
    <?php
}
?>

    <div class="container" id="actualbody">
    <div class="row">
        <div class="widget clearfix">
            <div align="center">
               <!--  <div align="center">
                   <img src="<?php echo base_url('uploads') . '/' . $company['ImagePath'];?>" width="200" align="middle"/>
               </div> -->
               <!--  <div align="center">
                   <h1 style="margin-top: 15px; margin-bottom: 15px"> <label align="middle"><?php echo $company['company_name'];?></label> </h1>
               </div> -->
            </div>
            <!--<h2>Login Form</h2>-->
            <div class="widget_inside" align="center">
                <div class="col_12">
                    <div class="pre_3 col_5">
                        <form class="form" id="form0" action="<?php echo site_url('admin/validateUserCredentials');?>" method="post">

                            <div class="clearfix">
                                <label>Username</label>
                                <div class="input">
                                    <input id="username" name="username" class="large validate[required]" type="text" />
                                </div>
                            </div>

                            <div class="clearfix">
                                <label>Password</label>
                                <div class="input">
                                    <input id="password" name="password" class="large validate[required]" type="password" />
                                </div>
                            </div>

                            <div class="clearfix grey-highlight">
                                <div class="input no-label" style="float:right; margin-right: 53px;">
                                    <input type="submit" class="button blue" value="Submit">
                                    </input>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
