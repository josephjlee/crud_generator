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
        <h2 style="margin-top:0px">City <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">CityID <?php echo form_error('CityID') ?></label>
            <input type="text" class="form-control" name="CityID" id="CityID" placeholder="CityID" value="<?php echo $CityID; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">CityName <?php echo form_error('CityName') ?></label>
            <input type="text" class="form-control" name="CityName" id="CityName" placeholder="CityName" value="<?php echo $CityName; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">AreaID <?php echo form_error('AreaID') ?></label>
            <input type="text" class="form-control" name="AreaID" id="AreaID" placeholder="AreaID" value="<?php echo $AreaID; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('city') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>