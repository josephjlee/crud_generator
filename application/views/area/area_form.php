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
        <h2 style="margin-top:0px">Area <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">AreaID <?php echo form_error('AreaID') ?></label>
            <input type="text" class="form-control" name="AreaID" id="AreaID" placeholder="AreaID" value="<?php echo $AreaID; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">AreaGroupID <?php echo form_error('AreaGroupID') ?></label>
            <input type="text" class="form-control" name="AreaGroupID" id="AreaGroupID" placeholder="AreaGroupID" value="<?php echo $AreaGroupID; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">AreaCode <?php echo form_error('AreaCode') ?></label>
            <input type="text" class="form-control" name="AreaCode" id="AreaCode" placeholder="AreaCode" value="<?php echo $AreaCode; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">AreaName <?php echo form_error('AreaName') ?></label>
            <input type="text" class="form-control" name="AreaName" id="AreaName" placeholder="AreaName" value="<?php echo $AreaName; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">IsActive <?php echo form_error('IsActive') ?></label>
            <input type="text" class="form-control" name="IsActive" id="IsActive" placeholder="IsActive" value="<?php echo $IsActive; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">AreaTargetID <?php echo form_error('AreaTargetID') ?></label>
            <input type="text" class="form-control" name="AreaTargetID" id="AreaTargetID" placeholder="AreaTargetID" value="<?php echo $AreaTargetID; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('area') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>