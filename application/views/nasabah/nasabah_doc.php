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
        <h2>Nasabah List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Nasabah</th>
		<th>Notelp Nasabah</th>
		<th>Alamat</th>
		<th>Nama Pic</th>
		<th>Notelp Pic</th>
		
            </tr><?php
            foreach ($nasabah_data as $nasabah)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $nasabah->nama_nasabah ?></td>
		      <td><?php echo $nasabah->notelp_nasabah ?></td>
		      <td><?php echo $nasabah->alamat ?></td>
		      <td><?php echo $nasabah->nama_pic ?></td>
		      <td><?php echo $nasabah->notelp_pic ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>