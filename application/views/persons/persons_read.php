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
        <h2 style="margin-top:0px">Persons Read</h2>
        <table class="table">
	    <tr><td>LastName</td><td><?php echo $LastName; ?></td></tr>
	    <tr><td>FirstName</td><td><?php echo $FirstName; ?></td></tr>
	    <tr><td>Age</td><td><?php echo $Age; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('persons') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>