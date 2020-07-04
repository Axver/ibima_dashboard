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
        <h2 style="margin-top:0px">Pembelian_paket <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id <?php echo form_error('id') ?></label>
            <input type="text" class="form-control" name="id" id="id" placeholder="Id" value="<?php echo $id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">List Email <?php echo form_error('list_email') ?></label>
            <input type="text" class="form-control" name="list_email" id="list_email" placeholder="List Email" value="<?php echo $list_email; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pembelian Id Pembelian <?php echo form_error('pembelian_id_pembelian') ?></label>
            <input type="text" class="form-control" name="pembelian_id_pembelian" id="pembelian_id_pembelian" placeholder="Pembelian Id Pembelian" value="<?php echo $pembelian_id_pembelian; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Created At <?php echo form_error('created_at') ?></label>
            <input type="text" class="form-control" name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Bukti Pembayaran <?php echo form_error('bukti_pembayaran') ?></label>
            <input type="text" class="form-control" name="bukti_pembayaran" id="bukti_pembayaran" placeholder="Bukti Pembayaran" value="<?php echo $bukti_pembayaran; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status Pembayaran <?php echo form_error('status_pembayaran') ?></label>
            <input type="text" class="form-control" name="status_pembayaran" id="status_pembayaran" placeholder="Status Pembayaran" value="<?php echo $status_pembayaran; ?>" />
        </div>
	    <input type="hidden" name="id_pembelian" value="<?php echo $id_pembelian; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pembelian_paket') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>