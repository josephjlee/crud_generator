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
        <h2 style="margin-top:0px">Sales Read</h2>
        <table class="table">
	    <tr><td>Npp</td><td><?php echo $npp; ?></td></tr>
	    <tr><td>Nama Sales</td><td><?php echo $nama_sales; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Notelp</td><td><?php echo $notelp; ?></td></tr>
	    <tr><td>Password</td><td><?php echo $password; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('sales') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>