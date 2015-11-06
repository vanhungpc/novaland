<div id="titlediv">
    <div class="clearfix container" id="pattern">
        <div class="row">
            <div class="col_12">
                <ul class="breadcrumbs hor-list">
                    <li><a href="<?php echo site_url() . '/news';?>">News</a></li>

                </ul>

                <h1>News</h1>
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
            <h2>News</h2>
            <div class="widget_inside">
                <div style="margin-bottom: 15px;" class="productbtn">
                    <div class="productbtn-left">
                         <a class="blue button" href="<?php echo site_url('news/addNews');?>"><span>Add News</span></a>
                    </div>
                </div>
                <div class="col_12">
                    <table class='dataTable'>
                        <thead>
                            <tr>
                                <th class="align-left">Title</th>
                                <th class="align-left" style="width: 250px !important;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($news)) {
	foreach ($news as $c): ?>
                                <tr class="gradeX">
                                    <td><?php echo $c->title;?></td>
                                    <td class="center">
                                        <a class="small blue button" href="<?php echo site_url('news/viewNews/' . $c->_id_news);?>"><span>Details</span></a>
                                        <a class="small blue button" href="<?php echo site_url('news/editNews/' . $c->_id_news);?>"><span>Update</span></a>
                                      <a class="small blue button" href="<?php echo site_url('news/deleteNews/' . $c->_id_news);?>" onClick="return confirm('Are you sure to delete this news ?');"><span>Delete</span></a>

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