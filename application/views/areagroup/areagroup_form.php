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
        <h2 style="margin-top:0px">Areagroup <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">AreaGroupID <?php echo form_error('AreaGroupID') ?></label>
            <input type="text" class="form-control" name="AreaGroupID" id="AreaGroupID" placeholder="AreaGroupID" value="<?php echo $AreaGroupID; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">AreaGroupName <?php echo form_error('AreaGroupName') ?></label>
            <input type="text" class="form-control" name="AreaGroupName" id="AreaGroupName" placeholder="AreaGroupName" value="<?php echo $AreaGroupName; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('areagroup') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>