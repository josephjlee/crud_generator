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
        <h2 style="margin-top:0px">Menu_mapping_group <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Group <?php echo form_error('id_group') ?></label>
            <input type="text" class="form-control" name="id_group" id="id_group" placeholder="Id Group" value="<?php echo $id_group; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Id Menu <?php echo form_error('id_menu') ?></label>
            <input type="text" class="form-control" name="id_menu" id="id_menu" placeholder="Id Menu" value="<?php echo $id_menu; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('menu_mapping_group') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>