@extends('layouts.dashboard')

@section('title', $title)

@section('main_content')

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item active">
				<a class="nav-link" href="/dashboard">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				About
			</div>

			<!-- Nav Item - Our Team -->
			<li class="nav-item">
				<a class="nav-link" href="/prism-team">
					<i class="fas fa-fw fa-users"></i>
					<span>Our Team</span></a>
			</li>
		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">
						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
								data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $user->name }}</span>
								<img class="img-profile rounded-circle" src="{{asset('../image/icon.png')}}">
							</a>

							<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
								<li>
									<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
										{{ __('Logout') }}
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
										@csrf
									</form>
								</li>
							</ul>
						</li>
					</ul>

				</nav>
				<!-- End of Topbar -->

				<!-- Table -->
				<!-- DataTables Example -->
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Door</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Door</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</tfoot>
								<tbody>
									<tr>
										<td>1</td>
										<td>Main Door</td>
										<td>Locked</td>
										<td>edit delete</td>
									</tr>
									<tr>
										<td>2</td>
										<td>Living Room Door</td>
										<td>Unlocked</td>
										<td>edit delete</td>
									</tr>
									<tr>
										<td>3</td>
										<td>Dining Room Door</td>
										<td>Unlocked</td>
										<td>edit delete</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- End of Table -->

			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright &copy; Prism 2022</span>
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
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
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
					<a class="btn btn-primary" href="/login">Logout</a>
				</div>
			</div>
		</div>
	</div>

</body>
@endsection