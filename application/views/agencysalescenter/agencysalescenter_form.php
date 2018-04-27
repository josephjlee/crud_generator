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
        <h2 style="margin-top:0px">Agencysalescenter <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">AgencyID <?php echo form_error('AgencyID') ?></label>
            <input type="text" class="form-control" name="AgencyID" id="AgencyID" placeholder="AgencyID" value="<?php echo $AgencyID; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">AreaID <?php echo form_error('AreaID') ?></label>
            <input type="text" class="form-control" name="AreaID" id="AreaID" placeholder="AreaID" value="<?php echo $AreaID; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">CityID <?php echo form_error('CityID') ?></label>
            <input type="text" class="form-control" name="CityID" id="CityID" placeholder="CityID" value="<?php echo $CityID; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">AsuradurID <?php echo form_error('AsuradurID') ?></label>
            <input type="text" class="form-control" name="AsuradurID" id="AsuradurID" placeholder="AsuradurID" value="<?php echo $AsuradurID; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">SourceData <?php echo form_error('SourceData') ?></label>
            <input type="text" class="form-control" name="SourceData" id="SourceData" placeholder="SourceData" value="<?php echo $SourceData; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">SalesCenterCode <?php echo form_error('SalesCenterCode') ?></label>
            <input type="text" class="form-control" name="SalesCenterCode" id="SalesCenterCode" placeholder="SalesCenterCode" value="<?php echo $SalesCenterCode; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">SalesCenterName <?php echo form_error('SalesCenterName') ?></label>
            <input type="text" class="form-control" name="SalesCenterName" id="SalesCenterName" placeholder="SalesCenterName" value="<?php echo $SalesCenterName; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">StreetAddress <?php echo form_error('StreetAddress') ?></label>
            <input type="text" class="form-control" name="StreetAddress" id="StreetAddress" placeholder="StreetAddress" value="<?php echo $StreetAddress; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">VillageAddress <?php echo form_error('VillageAddress') ?></label>
            <input type="text" class="form-control" name="VillageAddress" id="VillageAddress" placeholder="VillageAddress" value="<?php echo $VillageAddress; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">SubDistrictAddress <?php echo form_error('SubDistrictAddress') ?></label>
            <input type="text" class="form-control" name="SubDistrictAddress" id="SubDistrictAddress" placeholder="SubDistrictAddress" value="<?php echo $SubDistrictAddress; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">CityAddress <?php echo form_error('CityAddress') ?></label>
            <input type="text" class="form-control" name="CityAddress" id="CityAddress" placeholder="CityAddress" value="<?php echo $CityAddress; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">PostalCode <?php echo form_error('PostalCode') ?></label>
            <input type="text" class="form-control" name="PostalCode" id="PostalCode" placeholder="PostalCode" value="<?php echo $PostalCode; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">PhoneNumber <?php echo form_error('PhoneNumber') ?></label>
            <input type="text" class="form-control" name="PhoneNumber" id="PhoneNumber" placeholder="PhoneNumber" value="<?php echo $PhoneNumber; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">FaxNumber <?php echo form_error('FaxNumber') ?></label>
            <input type="text" class="form-control" name="FaxNumber" id="FaxNumber" placeholder="FaxNumber" value="<?php echo $FaxNumber; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">EmailAddress <?php echo form_error('EmailAddress') ?></label>
            <input type="text" class="form-control" name="EmailAddress" id="EmailAddress" placeholder="EmailAddress" value="<?php echo $EmailAddress; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">IsActive <?php echo form_error('IsActive') ?></label>
            <input type="text" class="form-control" name="IsActive" id="IsActive" placeholder="IsActive" value="<?php echo $IsActive; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">ActiveDate <?php echo form_error('ActiveDate') ?></label>
            <input type="text" class="form-control" name="ActiveDate" id="ActiveDate" placeholder="ActiveDate" value="<?php echo $ActiveDate; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">EndDate <?php echo form_error('EndDate') ?></label>
            <input type="text" class="form-control" name="EndDate" id="EndDate" placeholder="EndDate" value="<?php echo $EndDate; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">ReasonEnd <?php echo form_error('ReasonEnd') ?></label>
            <input type="text" class="form-control" name="ReasonEnd" id="ReasonEnd" placeholder="ReasonEnd" value="<?php echo $ReasonEnd; ?>" />
        </div>
	    <input type="hidden" name="SalesCenterID" value="<?php echo $SalesCenterID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('agencysalescenter') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>