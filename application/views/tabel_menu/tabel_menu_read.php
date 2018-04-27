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
        <h2 style="margin-top:0px">Tabel_menu Read</h2>
        <table class="table">
	    <tr><td>Judul Menu</td><td><?php echo $judul_menu; ?></td></tr>
	    <tr><td>Link</td><td><?php echo $link; ?></td></tr>
	    <tr><td>Icon</td><td><?php echo $icon; ?></td></tr>
	    <tr><td>Is Main Menu</td><td><?php echo $is_main_menu; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tabel_menu') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>