<?php
$controller = $this->uri->segment(2);
$function = $this->uri->segment(3);
?>
<nav class="container">
    <select class="mobile-only row clearfix" onchange="window.open(this.options[this.selectedIndex].value, '_top')">
        <option value="<?php echo site_url() . 'project'; ?>">Dashboard</option>
        <option value="<?php echo site_url() . 'project'; ?>">Project</option>
        <option value="<?php echo site_url() . 'project'; ?>">County</option>
    </select>

    <ul class="sf-menu mobile-hide row clearfix">


        <li <?php
if ($controller == 'project') {
	echo 'class="active iconed"';
}
?>>
            <a href="<?php echo site_url() . 'project'; ?>"><span>Project</span></a>
        </li>
        <li <?php
if ($controller == 'county') {
	echo 'class="active iconed"';
}
?>>
            <a href="<?php echo site_url() . 'county'; ?>"><span>County</span></a>
        </li>

        <li <?php
if ($controller == 'news') {
	echo 'class="active iconed"';
}
?>>
            <a href="<?php echo site_url() . 'news'; ?>"><span>News</span></a>
        </li>

        <li <?php
if ($controller == 'video') {
	echo 'class="active iconed"';
}
?>>
            <a href="<?php echo site_url() . 'video'; ?>"><span>Video</span></a>
        </li>

               <li <?php
if ($controller == 'contactus') {
	echo 'class="active iconed"';
}
?>>
            <a href="<?php echo site_url() . 'contactus'; ?>"><span>Contact Us</span></a>
        </li>

               <li <?php
if ($controller == 'aboutus') {
	echo 'class="active iconed"';
}
?>>
            <a href="<?php echo site_url() . 'aboutus'; ?>"><span>About Us</span></a>
        </li>


    </ul>
</nav>


<a class="trigger demo_4" href="#">Customize!</a>

<div id="aurora_option" class="form panel">

    <div class="clearfix">
        <label>Select Preset</label>
        <div class="input">
            <select id="preset" onchange="changePreset()">
                <option value="#292929,#454545,#0774a7,header_blueprint.png,none">Default</option>
                <option value="#16331f,#25781a,#216f47,11.png,none">Green Earth</option>
                <option value="#4d1919,#702929,#662222,7.png,none">Royal Red</option>
                <option value="#2d354d,#3b4966,#606060,2.png,brushed_alu.png">Ice Blue</option>
                <option value="#29231b,#4d3d2c,#5e553d,header_blueprint.png,stucco.png">Chocolate Brown</option>
                <option value="#291325,#322236,#382f38,2.png,diagonal-noise.png">King's Garment</option>
            </select>
        </div>
    </div>

    <span id="aurora_or">or <span>make your own!</span></span>

    <div class="clearfix">
        <label>Header Color</label>
        <div class="input">
            <div id="in-header" class="picker"></div>
        </div>
    </div>
    <div class="clearfix">
        <label>Navigation Color</label>
        <div class="input">
            <div id="in-nav" class="picker"></div>
        </div>
    </div>
    <div class="clearfix">
        <label>Title Color</label>
        <div class="input">
            <div id="in-title" class="picker"></div>
        </div>
    </div>
    <div class="clearfix">
        <label>Title Pattern</label>
        <div class="input">
            <select id="titlepattern" onchange="changeTitlePattern()">
                <option value="none">None</option>
                <option value="header_blueprint.png">Blueprint</option>
                <option value="1.png">Pattern 1</option>
                <option value="2.png">Pattern 2</option>
                <option value="3.png">Pattern 3</option>
                <option value="4.png">Pattern 4</option>
                <option value="5.png">Pattern 5</option>
                <option value="6.png">Pattern 6</option>
                <option value="7.png">Pattern 7</option>
                <option value="8.png">Pattern 8</option>
                <option value="9.png">Pattern 9</option>
                <option value="10.png">Pattern 10</option>
                <option value="11.png">Pattern 11</option>
            </select>
        </div>
    </div>
    <div class="clearfix">
        <label>Background Pattern</label>
        <div class="input">
            <select id="backgroundpattern" onchange="changeBGPattern()">
                <option value="none">None</option>
                <option value="body_blueprint.png">Blueprint</option>
                <option value="stucco.png">Stucco</option>
                <option value="noise.png">Noise</option>
                <option value="brushed_alu.png">Brushed Aluminium</option>
                <option value="beige_paper.png">Beige Paper</option>
                <option value="concrete_wall.png">Concrete Wall</option>
                <option value="diagonal-noise.png">Diagonal Noise</option>
                <option value="noisy.png">Noisy</option>
            </select>
        </div>
    </div>
</div>