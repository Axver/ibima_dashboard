
<!DOCTYPE html>
<html lang="en">

<head>

	<?php $this->load->view('component/header') ?>


</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

	<!-- Sidebar -->
	<?php $this->load->view('component/sidebar'); ?>
	<!-- End of Sidebar -->

	<!-- Content Wrapper -->
	<div id="content-wrapper" class="d-flex flex-column">

		<!-- Main Content -->
		<div id="content">

			<!-- Topbar -->
			<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

				<!-- Sidebar Toggle (Topbar) -->
				<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
					<i class="fa fa-bars"></i>
				</button>



				<!-- Topbar Navbar -->
				<ul class="navbar-nav ml-auto">

					<!-- Nav Item - Search Dropdown (Visible Only XS) -->
					<li class="nav-item dropdown no-arrow d-sm-none">
						<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-search fa-fw"></i>
						</a>
						<!-- Dropdown - Messages -->
						<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
							<form class="form-inline mr-auto w-100 navbar-search">
								<div class="input-group">
									<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
									<div class="input-group-append">
										<button class="btn btn-primary" type="button">
											<i class="fas fa-search fa-sm"></i>
										</button>
									</div>
								</div>
							</form>
						</div>
					</li>





					<div class="topbar-divider d-none d-sm-block"></div>

					<!-- Nav Item - User Information -->


				</ul>

			</nav>
			<!-- End of Topbar -->

			<!-- Begin Page Content -->
			<div class="container-fluid">

				<!-- Page Heading -->
				<div class="d-sm-flex align-items-center justify-content-between mb-4">
				</div>



				<!-- Content Row -->

				<br/>
				<br/>

				<div class="row">

					<!-- Area Chart -->
					<div class="col-xl-12 col-lg-12">
						<div class="card shadow mb-12">
							<!-- Card Header - Dropdown -->
							<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background-color: #4066D5; color:white">
								<h6>Daftar Pembelian Produk</h6>
								<div class="dropdown no-arrow">
									<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
									</a>

								</div>
							</div>
							<!-- Card Body -->
							<div class="card-body">


								<div class="row" style="margin-bottom: 10px">
									<div class="col-md-4">
<!--										--><?php //echo anchor(site_url('pembelian_produk/create'),'Create', 'class="btn btn-primary"'); ?>
									</div>
									<div class="col-md-4 text-center">
										<div style="margin-top: 8px" id="message">
											<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
										</div>
									</div>
									<div class="col-md-1 text-right">
									</div>
									<div class="col-md-3 text-right">
										<form action="<?php echo site_url('pembelian_produk/index'); ?>" class="form-inline" method="get">
											<div class="input-group">
												<input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
												<span class="input-group-btn">
                            <?php
							if ($q <> '')
							{
								?>
								<a href="<?php echo site_url('pembelian_produk'); ?>" class="btn btn-default">Reset</a>
								<?php
							}
							?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
											</div>
										</form>
									</div>
								</div>
								<table id="example1" class="table table-striped table-bordered" style="margin-bottom: 10px">
									<thead>
									<tr>
										<th>No</th>
										<th>Id Pembelian</th>
										<th>Id Produk</th>
										<th>Created At</th>
										<th>Pembelian Id Pembelian</th>
										<th>Bukti Pembayaran</th>
										<th>Status Pembayaran</th>
										<th>Action</th>
									</tr>
									</thead><?php
									foreach ($pembelian_produk_data as $pembelian_produk)
									{
										?>
										<tr>
											<td width="80px"><?php echo ++$start ?></td>

											<td><?php echo $pembelian_produk->id_pembelian?></td>
											<td><?php echo $pembelian_produk->id_produk ?></td>
											<td><?php echo $pembelian_produk->created_at ?></td>
											<td><?php echo $pembelian_produk->pembelian_id_pembelian ?></td>
											<td><?php echo $pembelian_produk->bukti_pembayaran ?></td>
											<td><?php echo $pembelian_produk->status_pembayaran ?></td>
											<td style="text-align:center" width="200px">
												<?php
												echo anchor(site_url('pembelian_produk/read/'.$pembelian_produk->id_pembelian),'Read');
												echo ' | ';
												echo anchor(site_url('pembelian_produk/update/'.$pembelian_produk->id_pembelian),'Update');
												echo ' | ';
												echo anchor(site_url('pembelian_produk/delete/'.$pembelian_produk->id_pembelian),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
												?>
											</td>
										</tr>
										<?php
									}
									?>
								</table>
								<div class="row">


								</div>

							</div>
						</div>
					</div>


				</div>

<!--				Yang Belum Di Konfirmasi-->
				<br/>
				<br/>

				<div class="row">

					<!-- Area Chart -->
					<div class="col-xl-12 col-lg-12">
						<div class="card shadow mb-12">
							<!-- Card Header - Dropdown -->
							<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background-color: red; color:white;">
								<h6 >Belum Di Konfirmasi</h6>
								<div class="dropdown no-arrow">
									<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
									</a>

								</div>
							</div>
							<!-- Card Body -->
							<div class="card-body">


								<div class="row" style="margin-bottom: 10px">
									<div class="col-md-4">
										<!--										--><?php //echo anchor(site_url('pembelian_produk/create'),'Create', 'class="btn btn-primary"'); ?>
									</div>
									<div class="col-md-4 text-center">
										<div style="margin-top: 8px" id="message">
											<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
										</div>
									</div>
									<div class="col-md-1 text-right">
									</div>
									<div class="col-md-3 text-right">
										<form action="<?php echo site_url('pembelian_produk/index'); ?>" class="form-inline" method="get">
											<div class="input-group">
												<input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
												<span class="input-group-btn">
                            <?php
							if ($q <> '')
							{
								?>
								<a href="<?php echo site_url('pembelian_produk'); ?>" class="btn btn-default">Reset</a>
								<?php
							}
							?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
											</div>
										</form>
									</div>
								</div>
								<table id="example" class="table table-striped table-bordered" style="margin-bottom: 10px">
									<thead>
									<tr>
										<th>No</th>
										<th>Id Pembelian</th>
										<th>Id Produk</th>
										<th>Created At</th>
										<th>Pembelian Id Pembelian</th>
										<th>Bukti Pembayaran</th>
										<th>Status Pembayaran</th>
										<th>Action</th>
									</tr>
									</thead><?php
									$start=0;
									foreach ($pembelian_produk_data1 as $pembelian_produk)
									{
										?>
										<tr>
											<td width="80px"><?php echo ++$start ?></td>

											<td><?php echo $pembelian_produk->id_pembelian?></td>
											<td><?php echo $pembelian_produk->id_produk ?></td>
											<td><?php echo $pembelian_produk->created_at ?></td>
											<td><?php echo $pembelian_produk->pembelian_id_pembelian ?></td>
											<td><?php echo $pembelian_produk->bukti_pembayaran ?></td>
											<td><?php echo $pembelian_produk->status_pembayaran ?></td>
											<td style="text-align:center" width="200px">
												<?php
												echo anchor(site_url('pembelian_produk/read/'.$pembelian_produk->id_pembelian),'Read');
												echo ' | ';
												echo anchor(site_url('pembelian_produk/update/'.$pembelian_produk->id_pembelian),'Update');
												echo ' | ';
												echo anchor(site_url('pembelian_produk/delete/'.$pembelian_produk->id_pembelian),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
												?>
											</td>
										</tr>
										<?php
									}
									?>
								</table>
								<div class="row">

								</div>

							</div>
						</div>
					</div>


				</div>


				<div class="row" >

					<!-- Area Chart -->
					<div class="col-xl-12 col-lg-12">
						<div class="card shadow mb-12">
							<!-- Card Header - Dropdown -->
							<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background-color: green;color:white;">
								<h6  >Pembelian Hari Ini</h6>
								<div class="dropdown no-arrow">
									<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
										<button class="btn btn-info" onclick="printToday()">Print</button>
									</a>

								</div>
							</div>
							<!-- Card Body -->
							<div class="card-body">


								<div class="row" style="margin-bottom: 10px">
									<div class="col-md-4">
										<!--										--><?php //echo anchor(site_url('pembelian_produk/create'),'Create', 'class="btn btn-primary"'); ?>
									</div>
									<div class="col-md-4 text-center">
										<div style="margin-top: 8px" id="message">
											<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
										</div>
									</div>
									<div class="col-md-1 text-right">
									</div>
									<div class="col-md-3 text-right">
										<form action="<?php echo site_url('pembelian_produk/index'); ?>" class="form-inline" method="get">
											<div class="input-group">
												<input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
												<span class="input-group-btn">
                            <?php
							if ($q <> '')
							{
								?>
								<a href="<?php echo site_url('pembelian_produk'); ?>" class="btn btn-default">Reset</a>
								<?php
							}
							?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
											</div>
										</form>
									</div>
								</div>
								<table  id="today" class="table table-striped table-bordered" style="margin-bottom: 10px">
									<thead>
									<tr>

										<th>Id Pembelian</th>



										<th>Bukti Pembayaran</th>
										<th>Status Pembayaran</th>
										<th>Action</th>
									</tr>
									</thead><?php
									$start=0;
									foreach ($pembelian_produk_data2 as $pembelian_produk)
									{
										?>
										<tr>


											<td><?php echo $pembelian_produk->id_pembelian?></td>



											<td><?php echo $pembelian_produk->bukti_pembayaran ?></td>
											<td><?php echo $pembelian_produk->status_pembayaran ?></td>
											<td style="text-align:center" width="200px">
												<?php
												echo anchor(site_url('pembelian_produk/read/'.$pembelian_produk->id_pembelian),'Read');
												echo ' | ';
												echo anchor(site_url('pembelian_produk/update/'.$pembelian_produk->id_pembelian),'Update');
												echo ' | ';
												echo anchor(site_url('pembelian_produk/delete/'.$pembelian_produk->id_pembelian),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
												?>
											</td>
										</tr>
										<?php
									}
									?>
								</table>
								<div class="row">

								</div>

							</div>
						</div>
					</div>


				</div>



			</div>
			<!-- /.container-fluid -->

		</div>
		<!-- End of Main Content -->

		<!-- Footer -->
		<footer class="sticky-footer bg-white">
			<div class="container my-auto">
				<div class="copyright text-center my-auto">
					<span>Copyright &copy; IBIMA 2020</span>
				</div>
			</div>
		</footer>
		<!-- End of Footer -->

	</div>
	<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="login.html">Logout</a>
			</div>
		</div>
	</div>
</div>

<script>

    function makeid(length) {
        var result           = '';
        var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for ( var i = 0; i < length; i++ ) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
    }

	function printToday() {

        let name=makeid(10);
        name=name+".pdf";
        var element = document.getElementById('today');
        var opt = {
            margin:       0.7,
            filename:     name,
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
        };

// New Promise-based usage:
        html2pdf().set(opt).from(element).save();



    }
</script>




</body>

</html>
