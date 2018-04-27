<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Tbl_kodepos List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kelurahan</th>
		<th>Kecamatan</th>
		<th>Kabupaten</th>
		<th>Provinsi</th>
		<th>Kodepos</th>
		
            </tr><?php
            foreach ($tbl_kodepos_data as $tbl_kodepos)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tbl_kodepos->kelurahan ?></td>
		      <td><?php echo $tbl_kodepos->kecamatan ?></td>
		      <td><?php echo $tbl_kodepos->kabupaten ?></td>
		      <td><?php echo $tbl_kodepos->provinsi ?></td>
		      <td><?php echo $tbl_kodepos->kodepos ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>