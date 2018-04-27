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
        <h2 style="margin-top:0px">Agencyfile Read</h2>
        <table class="table">
	    <tr><td>Name</td><td><?php echo $Name; ?></td></tr>
	    <tr><td>JenisFile</td><td><?php echo $JenisFile; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $Keterangan; ?></td></tr>
	    <tr><td>AgencyID</td><td><?php echo $AgencyID; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('agencyfile') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>