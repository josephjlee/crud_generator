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
        <h2>Agencyfile List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Name</th>
		<th>JenisFile</th>
		<th>Keterangan</th>
		<th>AgencyID</th>
		
            </tr><?php
            foreach ($agencyfile_data as $agencyfile)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $agencyfile->Name ?></td>
		      <td><?php echo $agencyfile->JenisFile ?></td>
		      <td><?php echo $agencyfile->Keterangan ?></td>
		      <td><?php echo $agencyfile->AgencyID ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>