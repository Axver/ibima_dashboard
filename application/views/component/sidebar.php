<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url(); ?>">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-snowflake"></i>
		</div>
		<div class="sidebar-brand-text mx-3">IBIMA <sup>app</sup></div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">



	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Menu IBIMA
	</div>

	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo1" aria-expanded="true" aria-controls="collapseTwo">
			<i class="fas fa-fw fa-book"></i>
			<span>Paket & Topik</span>
		</a>
		<div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Daftar Laporan</h6>
				<!-- <a class="collapse-item" href="<?php echo base_url('paket') ?>">Paket</a> -->
				<a class="collapse-item" href="<?php echo base_url('paket') ?>">Paket</a>
				<a class="collapse-item" href="<?php echo base_url('topik') ?>">Topik</a>
<!--				<a class="collapse-item" href="--><?php //echo base_url('perencanaan_edit_jesi') ?><!--">Info Perencanaan Edit</a>-->


			</div>
		</div>
	</li>



	<!-- Nav Item - Pages Collapse Menu -->
<!--	<li class="nav-item">-->
<!--		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo12" aria-expanded="true" aria-controls="collapseTwo">-->
<!--			<i class="fas fa-fw fa-cog"></i>-->
<!--			<span>Tambah Laporan</span>-->
<!--		</a>-->
<!--		<div id="collapseTwo12" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">-->
<!--			<div class="bg-white py-2 collapse-inner rounded">-->
<!--				<h6 class="collapse-header">Setting</h6>-->
<!--				<a class="collapse-item" href="--><?php //echo base_url('laporan_perencanaan') ?><!--">Laporan Perencanaan</a>-->
<!--				<a class="collapse-item" href="--><?php //echo base_url('laporan_harian') ?><!--">Laporan Harian</a>-->
<!--				<a class="collapse-item" href="--><?php //echo base_url('laporan_pengawasan') ?><!--">Laporan Pengawasan</a>-->
<!--				<a class="collapse-item" href="--><?php //echo base_url('laporan_pelaksanaan') ?><!--">Laporan Pelaksanaan</a>-->
<!---->
<!---->
<!---->
<!--			</div>-->
<!--		</div>-->
<!--	</li>-->

	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo121" aria-expanded="true" aria-controls="collapseTwo">
			<i class="fas fa-fw fa-money-bill"></i>
			<span>Pembelian & Konfirmasi</span>
		</a>
		<div id="collapseTwo121" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Setting</h6>
				<a class="collapse-item" href="<?php echo base_url('pembelian') ?>">Pembelian</a>
				<a class="collapse-item" href="<?php echo base_url('pembelian_produk') ?>">Pembelian Produk</a>
				<a class="collapse-item" href="<?php echo base_url('pembelian_paket') ?>">Pembelian Paket</a>



			</div>
		</div>
	</li>




	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo112" aria-expanded="true" aria-controls="collapseTwo">
			<i class="fas fa-fw fa-question"></i>
			<span>Quiz & Session</span>
		</a>
		<div id="collapseTwo112" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Paket Untuk User</h6>
				<a class="collapse-item" href="<?php echo base_url('quiz') ?>">Quiz</a>
				<a class="collapse-item" href="<?php echo base_url('question') ?>">Question</a>
				<a class="collapse-item" href="<?php echo base_url('quiz_session') ?>">Quiz Session</a>



			</div>
		</div>
	</li>


		<!-- Nav Item - Pages Collapse Menu -->
		<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo11" aria-expanded="true" aria-controls="collapseTwo">
			<i class="fas fa-fw fa-file-video"></i>
			<span>Image & Video</span>
		</a>
		<div id="collapseTwo11" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Setting</h6>
				<a class="collapse-item" href="<?php echo base_url('image') ?>">Image For All</a>
				<a class="collapse-item" href="<?php echo base_url('image_paket') ?>">Image Paket</a>
				<a class="collapse-item" href="<?php echo base_url('question_image') ?>">Image Question</a>
				<a class="collapse-item" href="<?php echo base_url('video') ?>">Video</a>



			</div>
		</div>
	</li>

	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo111" aria-expanded="true" aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span>Modul</span>
		</a>
		<div id="collapseTwo111" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Setting</h6>
				<a class="collapse-item" href="<?php echo base_url('modul') ?>">Modul</a>
				<a class="collapse-item" href="<?php echo base_url('user_modul') ?>">User Modul</a>
				<a class="collapse-item" href="<?php echo base_url('downloadable') ?>">Downloadable File</a>
				<a class="collapse-item" href="<?php echo base_url('exclusive') ?>">Exclusive File</a>



			</div>
		</div>
	</li>

	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo1112" aria-expanded="true" aria-controls="collapseTwo">
			<i class="fas fa-fw fa-user"></i>
			<span>Users</span>
		</a>
		<div id="collapseTwo1112" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Setting</h6>
				<a class="collapse-item" href="<?php echo base_url('users') ?>">Users</a>
				<a class="collapse-item" href="<?php echo base_url('#') ?>">Logout</a>



			</div>
		</div>
	</li>



	<!-- Heading -->
	<!-- <div class="sidebar-heading">
		Force Edit
	</div> -->

	<!-- Nav Item - Pages Collapse Menu -->
<!--	<li class="nav-item">-->
<!--		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo1124" aria-expanded="true" aria-controls="collapseTwo">-->
<!--			<i class="fas fa-fw fa-cog"></i>-->
<!--			<span>Pengeditan Paksa</span>-->
<!--		</a>-->
<!--		<div id="collapseTwo1124" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">-->
<!--			<div class="bg-white py-2 collapse-inner rounded">-->
<!--				<h6 class="collapse-header">Paket Untuk User</h6>-->
<!--				<a class="collapse-item" href="--><?php //echo base_url('force_detail_bahan') ?><!--">Bahan Alat Perencanaan</a>-->
<!--				<a class="collapse-item" href="--><?php //echo base_url('') ?><!--">Bahan Alat Harian</a>-->
<!--				<a class="collapse-item" href="--><?php //echo base_url('') ?><!--">Pekerjaan Perencanaan</a>-->
<!--				<a class="collapse-item" href="--><?php //echo base_url('') ?><!--">Laporan Harian Detail</a>-->
<!--				<a class="collapse-item" href="--><?php //echo base_url('') ?><!--">Pengawasan Detail</a>-->
<!--				<a class="collapse-item" href="--><?php //echo base_url('') ?><!--">Laporan Pengawasan</a>-->
<!--				<a class="collapse-item" href="--><?php //echo base_url('') ?><!--">Laporan Perencanaan</a>-->
<!---->
<!---->
<!---->
<!--			</div>-->
<!--		</div>-->
<!--	</li>-->



		<!-- <li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo12" aria-expanded="true" aria-controls="collapseTwo">
				<i class="fas fa-fw fa-cog"></i>
				<span>Force Edit/All Data</span>
			</a>
			<div id="collapseTwo12" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">Setting</h6>
					<a class="collapse-item" href="<?php echo base_url('ttd_info') ?>">Informasi TTD</a>
					<a class="collapse-item" href="<?php echo base_url('lap_perencanaan_force') ?>">Laporan Perencanaan</a>
					<a class="collapse-item" href="<?php echo base_url('lap_pengawasan_force') ?>">Laporan Pengawasan</a>
					<a class="collapse-item" href="<?php echo base_url('lap_harian_force') ?>">Laporan Harian</a>
					<a class="collapse-item" href="<?php echo base_url('tukang_force') ?>">Tukang Harian Add</a>






				</div>
			</div>
		</li> -->










		<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">



</ul>


