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
        <h2 style="margin-top:0px">Appuser <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="smallint">UserGroupID <?php echo form_error('UserGroupID') ?></label>
            <input type="text" class="form-control" name="UserGroupID" id="UserGroupID" placeholder="UserGroupID" value="<?php echo $UserGroupID; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">ParentUserID <?php echo form_error('ParentUserID') ?></label>
            <input type="text" class="form-control" name="ParentUserID" id="ParentUserID" placeholder="ParentUserID" value="<?php echo $ParentUserID; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">UserLoginID <?php echo form_error('UserLoginID') ?></label>
            <input type="text" class="form-control" name="UserLoginID" id="UserLoginID" placeholder="UserLoginID" value="<?php echo $UserLoginID; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">UserName <?php echo form_error('UserName') ?></label>
            <input type="text" class="form-control" name="UserName" id="UserName" placeholder="UserName" value="<?php echo $UserName; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NPP <?php echo form_error('NPP') ?></label>
            <input type="text" class="form-control" name="NPP" id="NPP" placeholder="NPP" value="<?php echo $NPP; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Password <?php echo form_error('Password') ?></label>
            <input type="text" class="form-control" name="Password" id="Password" placeholder="Password" value="<?php echo $Password; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">SRLanguage <?php echo form_error('SRLanguage') ?></label>
            <input type="text" class="form-control" name="SRLanguage" id="SRLanguage" placeholder="SRLanguage" value="<?php echo $SRLanguage; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">EmailAddress <?php echo form_error('EmailAddress') ?></label>
            <input type="text" class="form-control" name="EmailAddress" id="EmailAddress" placeholder="EmailAddress" value="<?php echo $EmailAddress; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">PhoneNumber <?php echo form_error('PhoneNumber') ?></label>
            <input type="text" class="form-control" name="PhoneNumber" id="PhoneNumber" placeholder="PhoneNumber" value="<?php echo $PhoneNumber; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">ActiveDate <?php echo form_error('ActiveDate') ?></label>
            <input type="text" class="form-control" name="ActiveDate" id="ActiveDate" placeholder="ActiveDate" value="<?php echo $ActiveDate; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">ExpireDate <?php echo form_error('ExpireDate') ?></label>
            <input type="text" class="form-control" name="ExpireDate" id="ExpireDate" placeholder="ExpireDate" value="<?php echo $ExpireDate; ?>" />
        </div>
	    <div class="form-group">
            <label for="bit">IsActive <?php echo form_error('IsActive') ?></label>
            <input type="text" class="form-control" name="IsActive" id="IsActive" placeholder="IsActive" value="<?php echo $IsActive; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">AreaGroupID <?php echo form_error('AreaGroupID') ?></label>
            <input type="text" class="form-control" name="AreaGroupID" id="AreaGroupID" placeholder="AreaGroupID" value="<?php echo $AreaGroupID; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">AreaID <?php echo form_error('AreaID') ?></label>
            <input type="text" class="form-control" name="AreaID" id="AreaID" placeholder="AreaID" value="<?php echo $AreaID; ?>" />
        </div>
	    <div class="form-group">
            <label for="smallint">AgencyID <?php echo form_error('AgencyID') ?></label>
            <input type="text" class="form-control" name="AgencyID" id="AgencyID" placeholder="AgencyID" value="<?php echo $AgencyID; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">EmployeeID <?php echo form_error('EmployeeID') ?></label>
            <input type="text" class="form-control" name="EmployeeID" id="EmployeeID" placeholder="EmployeeID" value="<?php echo $EmployeeID; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">PhotoFilePath <?php echo form_error('PhotoFilePath') ?></label>
            <input type="text" class="form-control" name="PhotoFilePath" id="PhotoFilePath" placeholder="PhotoFilePath" value="<?php echo $PhotoFilePath; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">PhotoFileName <?php echo form_error('PhotoFileName') ?></label>
            <input type="text" class="form-control" name="PhotoFileName" id="PhotoFileName" placeholder="PhotoFileName" value="<?php echo $PhotoFileName; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">IconPhotoFilePath <?php echo form_error('IconPhotoFilePath') ?></label>
            <input type="text" class="form-control" name="IconPhotoFilePath" id="IconPhotoFilePath" placeholder="IconPhotoFilePath" value="<?php echo $IconPhotoFilePath; ?>" />
        </div>
	    <input type="hidden" name="UserID" value="<?php echo $UserID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('appuser') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>