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
        <h2 style="margin-top:0px">Employee_file <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">NoKTP <?php echo form_error('NoKTP') ?></label>
            <input type="text" class="form-control" name="NoKTP" id="NoKTP" placeholder="NoKTP" value="<?php echo $NoKTP; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NamaFile <?php echo form_error('NamaFile') ?></label>
            <input type="text" class="form-control" name="NamaFile" id="NamaFile" placeholder="NamaFile" value="<?php echo $NamaFile; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">JenisFile <?php echo form_error('JenisFile') ?></label>
            <input type="text" class="form-control" name="JenisFile" id="JenisFile" placeholder="JenisFile" value="<?php echo $JenisFile; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('employee_file') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>