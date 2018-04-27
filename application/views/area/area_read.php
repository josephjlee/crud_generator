<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Area Read</h2>
        <table class="table">
	    <tr><td>AreaID</td><td><?php echo $AreaID; ?></td></tr>
	    <tr><td>AreaGroupID</td><td><?php echo $AreaGroupID; ?></td></tr>
	    <tr><td>AreaCode</td><td><?php echo $AreaCode; ?></td></tr>
	    <tr><td>AreaName</td><td><?php echo $AreaName; ?></td></tr>
	    <tr><td>IsActive</td><td><?php echo $IsActive; ?></td></tr>
	    <tr><td>AreaTargetID</td><td><?php echo $AreaTargetID; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('area') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>