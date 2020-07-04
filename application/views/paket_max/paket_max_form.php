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
        <h2 style="margin-top:0px">Paket_max <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Paket Id <?php echo form_error('paket_id') ?></label>
            <input type="text" class="form-control" name="paket_id" id="paket_id" placeholder="Paket Id" value="<?php echo $paket_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Max <?php echo form_error('max') ?></label>
            <input type="text" class="form-control" name="max" id="max" placeholder="Max" value="<?php echo $max; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Harga <?php echo form_error('harga') ?></label>
            <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('paket_max') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>