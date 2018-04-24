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
        <h2 style="margin-top:0px">News Read</h2>
        <table class="table">
	    <tr><td>JUDUL</td><td><?php echo $JUDUL; ?></td></tr>
	    <tr><td>ISI</td><td><?php echo $ISI; ?></td></tr>
	    <tr><td>IS ACTIVE</td><td><?php echo $IS_ACTIVE; ?></td></tr>
	    <tr><td>TANGGAL</td><td><?php echo $TANGGAL; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('news') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>