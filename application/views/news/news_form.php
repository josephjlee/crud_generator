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
        <h2 style="margin-top:0px">News <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="char">JUDUL <?php echo form_error('JUDUL') ?></label>
            <input type="text" class="form-control" name="JUDUL" id="JUDUL" placeholder="JUDUL" value="<?php echo $JUDUL; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">ISI <?php echo form_error('ISI') ?></label>
            <input type="text" class="form-control" name="ISI" id="ISI" placeholder="ISI" value="<?php echo $ISI; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">IS ACTIVE <?php echo form_error('IS_ACTIVE') ?></label>
            <input type="text" class="form-control" name="IS_ACTIVE" id="IS_ACTIVE" placeholder="IS ACTIVE" value="<?php echo $IS_ACTIVE; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">TANGGAL <?php echo form_error('TANGGAL') ?></label>
            <input type="text" class="form-control" name="TANGGAL" id="TANGGAL" placeholder="TANGGAL" value="<?php echo $TANGGAL; ?>" />
        </div>
	    <input type="hidden" name="ID" value="<?php echo $ID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('news') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>