
<!DOCTYPE html>
<html lang="en">

<head>

	<?php $this->load->view('component/header') ?>


</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

	<!-- Sidebar -->

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

				<button class="btn btn-info" onclick="printToday()">Print</button>
				<br/>
				<br/>

				<div class="row" id="cetak">

					<!-- Area Chart -->
					<div class="col-xl-12 col-lg-12">
						<div class="card shadow mb-12">
							<!-- Card Header - Dropdown -->
							<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
								<h6 class="m-0 font-weight-bold text-primary">Informasi Ruangan</h6>
								<div class="dropdown no-arrow">
									<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
									</a>

								</div>
							</div>
							<!-- Card Body -->
							<div class="card-body">


Produk:
								<table class="table table-bordered" style="width:100%">
									<th>Nama User</th>
									<th>Email</th>
									<th>Id Pembelian</th>
									<th>Status Pembayaran</th>


									<?php
									foreach ($produk as $ruangan)
									{
										?>


										<tr>
											<td><?php echo $ruangan->name ?></td>
											<td><?php echo $ruangan->email ?></td>
											<td><?php echo $ruangan->id_pembelian ?></td>
											<td><?php echo $ruangan->status_pembayaran ?></td>

										</tr>


										<?php
									}
									?>
								</table>

								Paket:
								<table class="table table-bordered" style="width:100%">
									<th>Nama User</th>
									<th>Email</th>
									<th>Id Pembelian</th>
									<th>Status Pembayaran</th>


									<?php
									foreach ($paket as $ruangan)
									{
										?>


										<tr>
											<td><?php echo $ruangan->name ?></td>
											<td><?php echo $ruangan->email ?></td>
											<td><?php echo $ruangan->id_pembelian ?></td>
											<td><?php echo $ruangan->status_pembayaran ?></td>

										</tr>


										<?php
									}
									?>
								</table>

								<script>

                                    function printToday() {

                                        let name=makeid(10);
                                        name=name+".pdf";
                                        var element = document.getElementById('cetak');
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

                                    function makeid(length) {
                                        var result           = '';
                                        var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                                        var charactersLength = characters.length;
                                        for ( var i = 0; i < length; i++ ) {
                                            result += characters.charAt(Math.floor(Math.random() * charactersLength));
                                        }
                                        return result;
                                    }
								</script>

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





</body>

</html>
