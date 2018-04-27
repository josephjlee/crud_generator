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
        <h2 style="margin-top:0px">Appuserusergroup <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">UserID <?php echo form_error('UserID') ?></label>
            <input type="text" class="form-control" name="UserID" id="UserID" placeholder="UserID" value="<?php echo $UserID; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">UserGroupID <?php echo form_error('UserGroupID') ?></label>
            <input type="text" class="form-control" name="UserGroupID" id="UserGroupID" placeholder="UserGroupID" value="<?php echo $UserGroupID; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('appuserusergroup') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>