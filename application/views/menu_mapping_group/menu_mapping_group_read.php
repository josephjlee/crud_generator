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
        <h2 style="margin-top:0px">Menu_mapping_group Read</h2>
        <table class="table">
	    <tr><td>Id Group</td><td><?php echo $id_group; ?></td></tr>
	    <tr><td>Id Menu</td><td><?php echo $id_menu; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('menu_mapping_group') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>