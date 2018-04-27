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
        <h2 style="margin-top:0px">Appuser Read</h2>
        <table class="table">
	    <tr><td>UserGroupID</td><td><?php echo $UserGroupID; ?></td></tr>
	    <tr><td>ParentUserID</td><td><?php echo $ParentUserID; ?></td></tr>
	    <tr><td>UserLoginID</td><td><?php echo $UserLoginID; ?></td></tr>
	    <tr><td>UserName</td><td><?php echo $UserName; ?></td></tr>
	    <tr><td>NPP</td><td><?php echo $NPP; ?></td></tr>
	    <tr><td>Password</td><td><?php echo $Password; ?></td></tr>
	    <tr><td>SRLanguage</td><td><?php echo $SRLanguage; ?></td></tr>
	    <tr><td>EmailAddress</td><td><?php echo $EmailAddress; ?></td></tr>
	    <tr><td>PhoneNumber</td><td><?php echo $PhoneNumber; ?></td></tr>
	    <tr><td>ActiveDate</td><td><?php echo $ActiveDate; ?></td></tr>
	    <tr><td>ExpireDate</td><td><?php echo $ExpireDate; ?></td></tr>
	    <tr><td>IsActive</td><td><?php echo $IsActive; ?></td></tr>
	    <tr><td>AreaGroupID</td><td><?php echo $AreaGroupID; ?></td></tr>
	    <tr><td>AreaID</td><td><?php echo $AreaID; ?></td></tr>
	    <tr><td>AgencyID</td><td><?php echo $AgencyID; ?></td></tr>
	    <tr><td>EmployeeID</td><td><?php echo $EmployeeID; ?></td></tr>
	    <tr><td>PhotoFilePath</td><td><?php echo $PhotoFilePath; ?></td></tr>
	    <tr><td>PhotoFileName</td><td><?php echo $PhotoFileName; ?></td></tr>
	    <tr><td>IconPhotoFilePath</td><td><?php echo $IconPhotoFilePath; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('appuser') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>