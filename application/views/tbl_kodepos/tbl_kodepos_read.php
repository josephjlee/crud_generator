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
        <h2 style="margin-top:0px">Tbl_kodepos Read</h2>
        <table class="table">
	    <tr><td>Kelurahan</td><td><?php echo $kelurahan; ?></td></tr>
	    <tr><td>Kecamatan</td><td><?php echo $kecamatan; ?></td></tr>
	    <tr><td>Kabupaten</td><td><?php echo $kabupaten; ?></td></tr>
	    <tr><td>Provinsi</td><td><?php echo $provinsi; ?></td></tr>
	    <tr><td>Kodepos</td><td><?php echo $kodepos; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tbl_kodepos') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>