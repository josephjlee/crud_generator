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
        <h2>City List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>CityID</th>
		<th>CityName</th>
		<th>AreaID</th>
		
            </tr><?php
            foreach ($city_data as $city)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $city->CityID ?></td>
		      <td><?php echo $city->CityName ?></td>
		      <td><?php echo $city->AreaID ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>