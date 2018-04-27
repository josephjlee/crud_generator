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
        <h2 style="margin-top:0px">Appusergroup <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="smallint">ParentUserGroupID <?php echo form_error('ParentUserGroupID') ?></label>
            <input type="text" class="form-control" name="ParentUserGroupID" id="ParentUserGroupID" placeholder="ParentUserGroupID" value="<?php echo $ParentUserGroupID; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">UserGroupName <?php echo form_error('UserGroupName') ?></label>
            <input type="text" class="form-control" name="UserGroupName" id="UserGroupName" placeholder="UserGroupName" value="<?php echo $UserGroupName; ?>" />
        </div>
	    <div class="form-group">
            <label for="bit">IsActive <?php echo form_error('IsActive') ?></label>
            <input type="text" class="form-control" name="IsActive" id="IsActive" placeholder="IsActive" value="<?php echo $IsActive; ?>" />
        </div>
	    <div class="form-group">
            <label for="bit">IsInternal <?php echo form_error('IsInternal') ?></label>
            <input type="text" class="form-control" name="IsInternal" id="IsInternal" placeholder="IsInternal" value="<?php echo $IsInternal; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">UserType <?php echo form_error('UserType') ?></label>
            <input type="text" class="form-control" name="UserType" id="UserType" placeholder="UserType" value="<?php echo $UserType; ?>" />
        </div>
	    <input type="hidden" name="UserGroupID" value="<?php echo $UserGroupID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('appusergroup') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>