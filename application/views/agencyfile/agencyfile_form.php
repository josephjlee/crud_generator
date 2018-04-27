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
        <h2 style="margin-top:0px">Agencyfile <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Name <?php echo form_error('Name') ?></label>
            <input type="text" class="form-control" name="Name" id="Name" placeholder="Name" value="<?php echo $Name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">JenisFile <?php echo form_error('JenisFile') ?></label>
            <input type="text" class="form-control" name="JenisFile" id="JenisFile" placeholder="JenisFile" value="<?php echo $JenisFile; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Keterangan <?php echo form_error('Keterangan') ?></label>
            <input type="text" class="form-control" name="Keterangan" id="Keterangan" placeholder="Keterangan" value="<?php echo $Keterangan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">AgencyID <?php echo form_error('AgencyID') ?></label>
            <input type="text" class="form-control" name="AgencyID" id="AgencyID" placeholder="AgencyID" value="<?php echo $AgencyID; ?>" />
        </div>
	    <input type="hidden" name="ID" value="<?php echo $ID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('agencyfile') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>