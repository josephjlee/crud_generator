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
        <h2 style="margin-top:0px">City Read</h2>
        <table class="table">
	    <tr><td>CityID</td><td><?php echo $CityID; ?></td></tr>
	    <tr><td>CityName</td><td><?php echo $CityName; ?></td></tr>
	    <tr><td>AreaID</td><td><?php echo $AreaID; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('city') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>