
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

				<div class="row">

					<!-- Area Chart -->
					<div class="col-xl-12 col-lg-12">
						<div class="card shadow mb-12">
							<!-- Card Header - Dropdown -->
							<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
								<h6 class="m-0 font-weight-bold text-primary">Question <?php echo $button ?></h6>
								<div class="dropdown no-arrow">
									<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
									</a>

								</div>
							</div>
							<!-- Card Body -->
							<div class="card-body">


								<form action="<?php echo $action; ?>" method="post">

									<div class="form-group">

										<div class="form-group">
											<label for="varchar">Quiz Id <?php echo form_error('quiz_id') ?></label>
											<select class="form-control" name="quiz_id" id="quiz_id">
												<?php
												$row=$this->db->query("SELECT * FROM quiz")->result();

												?>

												<?php
												$length=count($row);
												$i=0;
												while($i<$length)
												{
													echo "<option value='".$row[$i]->id."'>".$row[$i]->soal."</option>";
													$i++;
												}
												?>
											</select>
											<!--										<input type="text" class="form-control" name="quiz_id" id="quiz_id" placeholder="Quiz Id" value="--><?php //echo $quiz_id; ?><!--" />-->
										</div>
										<!--
<input type="text" class="form-control" name="quiz_id" id="quiz_id" placeholder="Quiz Id" value="--><?php //echo $quiz_id; ?><!--" />-->
									</div>
									<div class="form-group">
										<label for="varchar">Question <?php echo form_error('question') ?></label>
										<input type="text" class="form-control" name="question" id="question" placeholder="Question" value="<?php echo $question; ?>" />
									</div>
									<div class="form-group">
										<label for="varchar">Option <?php echo form_error('option') ?></label>
										<input type="text" class="form-control" name="option" id="option" placeholder="[Jawaban Satu,Jawaban Dua,Jawaban Tiga,Jawaban Empat]" value="<?php echo $option; ?>" />
									</div>
									<div class="form-group">
										<label for="varchar">Answer <?php echo form_error('answer') ?></label>
										<input type="text" class="form-control" name="answer" id="answer" placeholder="Jawaban Dua" value="<?php echo $answer; ?>" />
									</div>
									<?php
									if($id=='')
									{
										$d=strtotime("tomorrow");
										$new_id=date("Y-m-d h:i:sa", $d);
										$new_id=md5($new_id);

										$id=$new_id;
									}
									?>
									<input type="hidden" name="id" value="<?php echo $id; ?>" />
									<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
									<a href="<?php echo site_url('question') ?>" class="btn btn-default">Cancel</a>
								</form>

							</div>
						</div>
					</div>
					<script>
                        let sp='<?php echo $quiz_id ?>';
                        $("#quiz_id").val(sp).change();
					</script>


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
