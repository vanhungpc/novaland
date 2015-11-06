
				<div class="container">
					<div class="row top-header">
						<div class="col-sm-6 text-center">

						</div>

						<div class="col-sm-6 text-right change-language-header">   
                                                    <a href="<?php echo base_url(); ?>vn/<?php echo $this->router->class; ?>/<?php echo $this->router->method ?>/<?php if(!empty($idproduct)) echo $idproduct ?>">Tiếng Việt</a> |
							<?php echo anchor(lchange('en'), 'English');?>
						</div>
					</div>
					<div class="row top-header margin-bottom--4">
						<div class="col-sm-6 text-center">

						</div>
						<div class="col-sm-6 text-right">
							<label class="hotlines margin-right-15">
								Email: <span>thienttt.finance@gmail.com</span><br>
								Hotline: <b> (84) 909 288 281</b>
							</label>
						</div>
					</div>
					<a href="<?php echo base_url();?>" title="Jobify Darker" rel="home" class="site-branding">
						<h1 class="site-title">
							<img  src="<?php if (isset($logo)) {
	echo base_url() . 'assets/main/' . $logo;
}
?>" width="<?php if (isset($logoWidth)) {
	echo $logoWidth;
}
?>" height="<?php if (isset($logoHeight)) {
	echo $logoHeight;
}
?>" alt="nonavand">
						</h1>
						<!-- <h2 class="site-description">Job Searching Just Got Easy</h2> -->
					</a>

					<nav id="site-navigation" class="site-primary-navigation slide-left">
						<a href="#" class="primary-menu-toggle navbar-toggle collapsed toggle-menu" id="toggle-menu-close"><i class="fa fa-times-circle"></i></a>
						<!-- <form role="search" method="get" id="searchform" action="https://demo.astoundify.com/jobify-darker/">
	    <div><label class="screen-reader-text" for="s">Search for:</label>
	        <input type="text" value="" name="s" id="s">
	        <button type="submit" id="searchsubmit"><i class="icon-search"></i></button>
	    </div>
	</form>	 -->
	<div class="menu-main-menu-container">
		<ul id="menu-main-menu" class="nav-menu-primary">
			<!-- <li id="menu-item-2075" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children  menu-item-2075"><a href="find-a-job/index.html">Trang chủ</a> -->
			<!-- <ul class="sub-menu">
				<li id="menu-item-2076" class="menu-item menu-item-type-taxonomy menu-item-object-job_listing_region menu-item-2076"><a href="job-region/san-francisco/index.html">San Francisco</a></li>
				<li id="menu-item-2077" class="menu-item menu-item-type-taxonomy menu-item-object-job_listing_region menu-item-2077"><a href="job-region/palo-alto/index.html">Palo Alto</a></li>
				<li id="menu-item-2148" class="menu-item menu-item-type-taxonomy menu-item-object-job_listing_region menu-item-2148"><a href="job-region/san-jose/index.html">San Jose</a></li>
			</ul> -->
			<li class="<?php if (isset($menu) && $menu == 'home') {
	echo 'active-menu';
}
?>  menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children  menu-item-2075">
                            <a href="<?php echo base_url();?>"><?php echo lang("home") ?></a>
			</li>
			<li id=" menu-item-2075" class="  <?php if (isset($menu) && $menu == 'about') {
	echo 'active-menu';
}
?> menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children  menu-item-2075"><a href="<?php echo base_url("about");?>"><?php echo lang("about") ?></a>

			</li>
	<li id="menu-item-1897" class="<?php if (isset($menu) && $menu == 'officetel') {
	echo 'active-menu';
}
?> menu-item menu-item-type-post_type menu-item-object-page menu-item-1897"><a href="<?php echo base_url("officetel");?>"><?php echo lang("office_tel") ?></a></li>
	<li id="menu-item-2075" class="<?php if (isset($menu) && $menu == 'apartment') {
	echo 'active-menu';
}
?> menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children  menu-item-2075"><a href="<?php echo base_url("apartment");?>"><?php echo lang("apartment"); ?></a>

	</li>

	<li  id="register-modal" class="<?php if (isset($menu) && $menu == 'house') {
	echo 'active-menu';
}
?> register menu-item menu-item-type-post_type menu-item-object-page menu-item-1945"><a href="<?php echo base_url('house');?>"><?php echo lang("house") ?></a></li>

<li  id="register-modal" class="<?php if (isset($menu) && $menu == 'villas') {
	echo 'active-menu';
}
?> register menu-item menu-item-type-post_type menu-item-object-page menu-item-1945"><a href="<?php echo base_url('villas');?>"><?php echo lang("villas") ?></a></li>
<li  id="register-modal" class="<?php if (isset($menu) && $menu == 'serviced_apartment') {
	echo 'active-menu';
}
?> register menu-item menu-item-type-post_type menu-item-object-page menu-item-1945"><a href="<?php echo base_url('serviced_apartment');?>"><?php echo lang("service_apartment"); ?></a></li>
<li  id="register-modal" class="<?php if (isset($menu) && $menu == 'contact') {
	echo 'active-menu';
}
?> register menu-item menu-item-type-post_type menu-item-object-page menu-item-1945"><a href="<?php echo base_url('contact');?>"><?php echo lang("contact"); ?></a></li>

	<!-- <li id="login-modal" class="login menu-item menu-item-type-post_type menu-item-object-page menu-item-1900"><a href="login/index.html">Login</a></li> -->
	<li id="menu-item-2075" class=" reponsive-menu menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children  menu-item-2075"><a href="find-a-job/index.html">English<i class="fa fa-chevron-down"></i></a>
			<ul class="sub-menu">
				<li id="menu-item-2076" class="menu-item menu-item-type-taxonomy menu-item-object-job_listing_region menu-item-2076"><?php echo anchor(lchange('en'), 'English');?></li>
				<li id="menu-item-2077" class="menu-item menu-item-type-taxonomy menu-item-object-job_listing_region menu-item-2077"><a href="<?php echo base_url(); ?>vn/<?php echo $this->router->class; ?>/<?php echo $this->router->method ?>">Tiếng Việt</a></li>
			</ul>
	</li>
	</ul></div>				</nav>

									<a href="#" class="primary-menu-toggle in-header toggle-menu" id="toggle-menu-open"><i class="fa fa-bars"></i></a>
								</div>
