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
        <h2 style="margin-top:0px">Siswa <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">LastName <?php echo form_error('LastName') ?></label>
            <input type="text" class="form-control" name="LastName" id="LastName" placeholder="LastName" value="<?php echo $LastName; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">FirstName <?php echo form_error('FirstName') ?></label>
            <input type="text" class="form-control" name="FirstName" id="FirstName" placeholder="FirstName" value="<?php echo $FirstName; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Age <?php echo form_error('Age') ?></label>
            <input type="text" class="form-control" name="Age" id="Age" placeholder="Age" value="<?php echo $Age; ?>" />
        </div>
	    <input type="hidden" name="ID" value="<?php echo $ID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('siswa') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>