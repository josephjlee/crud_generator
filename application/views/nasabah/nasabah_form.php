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
        <h2 style="margin-top:0px">Nasabah <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Nasabah <?php echo form_error('nama_nasabah') ?></label>
            <input type="text" class="form-control" name="nama_nasabah" id="nama_nasabah" placeholder="Nama Nasabah" value="<?php echo $nama_nasabah; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Notelp Nasabah <?php echo form_error('notelp_nasabah') ?></label>
            <input type="text" class="form-control" name="notelp_nasabah" id="notelp_nasabah" placeholder="Notelp Nasabah" value="<?php echo $notelp_nasabah; ?>" />
        </div>
	    <div class="form-group">
            <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
            <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Pic <?php echo form_error('nama_pic') ?></label>
            <input type="text" class="form-control" name="nama_pic" id="nama_pic" placeholder="Nama Pic" value="<?php echo $nama_pic; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Notelp Pic <?php echo form_error('notelp_pic') ?></label>
            <input type="text" class="form-control" name="notelp_pic" id="notelp_pic" placeholder="Notelp Pic" value="<?php echo $notelp_pic; ?>" />
        </div>
	    <input type="hidden" name="idnasabah" value="<?php echo $idnasabah; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('nasabah') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>