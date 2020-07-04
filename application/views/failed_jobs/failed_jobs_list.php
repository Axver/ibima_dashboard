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
        <h2 style="margin-top:0px">Failed_jobs List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('failed_jobs/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('failed_jobs/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('failed_jobs'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Connection</th>
		<th>Queue</th>
		<th>Payload</th>
		<th>Exception</th>
		<th>Failed At</th>
		<th>Action</th>
            </tr><?php
            foreach ($failed_jobs_data as $failed_jobs)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $failed_jobs->connection ?></td>
			<td><?php echo $failed_jobs->queue ?></td>
			<td><?php echo $failed_jobs->payload ?></td>
			<td><?php echo $failed_jobs->exception ?></td>
			<td><?php echo $failed_jobs->failed_at ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('failed_jobs/read/'.$failed_jobs->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('failed_jobs/update/'.$failed_jobs->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('failed_jobs/delete/'.$failed_jobs->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>