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
        <h2 style="margin-top:0px">Appusergroup Read</h2>
        <table class="table">
	    <tr><td>ParentUserGroupID</td><td><?php echo $ParentUserGroupID; ?></td></tr>
	    <tr><td>UserGroupName</td><td><?php echo $UserGroupName; ?></td></tr>
	    <tr><td>IsActive</td><td><?php echo $IsActive; ?></td></tr>
	    <tr><td>IsInternal</td><td><?php echo $IsInternal; ?></td></tr>
	    <tr><td>UserType</td><td><?php echo $UserType; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('appusergroup') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>