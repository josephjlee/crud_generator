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
        <h2 style="margin-top:0px">Employee_file Read</h2>
        <table class="table">
	    <tr><td>NoKTP</td><td><?php echo $NoKTP; ?></td></tr>
	    <tr><td>NamaFile</td><td><?php echo $NamaFile; ?></td></tr>
	    <tr><td>JenisFile</td><td><?php echo $JenisFile; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('employee_file') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>