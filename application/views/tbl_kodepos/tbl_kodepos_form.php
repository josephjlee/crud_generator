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
        <h2 style="margin-top:0px">Tbl_kodepos <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Kelurahan <?php echo form_error('kelurahan') ?></label>
            <input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan" value="<?php echo $kelurahan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kecamatan <?php echo form_error('kecamatan') ?></label>
            <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?php echo $kecamatan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kabupaten <?php echo form_error('kabupaten') ?></label>
            <input type="text" class="form-control" name="kabupaten" id="kabupaten" placeholder="Kabupaten" value="<?php echo $kabupaten; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Provinsi <?php echo form_error('provinsi') ?></label>
            <input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi" value="<?php echo $provinsi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kodepos <?php echo form_error('kodepos') ?></label>
            <input type="text" class="form-control" name="kodepos" id="kodepos" placeholder="Kodepos" value="<?php echo $kodepos; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tbl_kodepos') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>