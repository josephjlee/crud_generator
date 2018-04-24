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
        <h2 style="margin-top:0px">Nasabah Read</h2>
        <table class="table">
	    <tr><td>Nama Nasabah</td><td><?php echo $nama_nasabah; ?></td></tr>
	    <tr><td>Notelp Nasabah</td><td><?php echo $notelp_nasabah; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Nama Pic</td><td><?php echo $nama_pic; ?></td></tr>
	    <tr><td>Notelp Pic</td><td><?php echo $notelp_pic; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('nasabah') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>