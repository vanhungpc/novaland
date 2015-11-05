<div id="titlediv">
    <div class="clearfix container" id="pattern">
        <div class="row">
            <div class="col_12">
                <ul class="breadcrumbs hor-list">
                    <li><a href="<?php echo site_url() . '/county';?>">County</a></li>

                </ul>

                <h1>County</h1>
            </div>
        </div>
    </div>
</div>
<?php
$success_msg = $this->session->flashdata('success_msg');
if (!empty($success_msg)) {
	?>
    <div class="notification done"><?php echo $success_msg;?></div>
    <?php
}
?>
<div class="container" id="actualbody">

    <div class="row clearfix">
        <div class="widget clearfix">
            <h2>County</h2>
            <div class="widget_inside">
                <div style="margin-bottom: 15px;" class="productbtn">
                    <div class="productbtn-left">
                         <a class="blue button" href="<?php echo site_url('county/addCounty');?>"><span>Add County</span></a>
                    </div>
                </div>
                <div class="col_12">
                    <table class='dataTable'>
                        <thead>
                            <tr>
                                <th class="align-left">County name</th>
                                <th class="align-left" style="width: 250px !important;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($county)) {
	foreach ($county as $c): ?>
                                <tr class="gradeX">
                                    <td><?php echo $c->name_county;?></td>
                                    <td class="center">
                                        <a class="small blue button" href="<?php echo site_url('county/viewCounty/' . $c->_id_county);?>"><span>Details</span></a>
                                        <a class="small blue button" href="<?php echo site_url('county/editCounty/' . $c->_id_county);?>"><span>Update</span></a>
                                      <a class="small blue button" href="<?php echo site_url('county/deleteCounty/' . $c->_id_county);?>" onClick="return confirm('Are you sure to delete this project ?');"><span>Delete</span></a>

                                    </td>
                                </tr>
                            <?php endforeach;}
?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>