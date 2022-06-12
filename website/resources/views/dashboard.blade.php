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
									<a class="dropdown-item" href="#" data-bs-toggle="modal"
										data-bs-target="#logoutModal">Logout</a>
								</li>
							</ul>
						</li>
					</ul>

				</nav>
				<!-- End of Topbar -->

				<!-- Table -->
				<!-- Doors DataTable -->
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<div class="d-flex flex-row justify-content-between align-items-center">
							<h6 class="m-0 font-weight-bold text-primary">List of Doors</h6>
							<a href="{{ route('doors.create') }}" class="btn btn-primary">
								+ Add Door
							</a>
						</div>
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
									@foreach ($user->doors as $door)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $door->name }}</td>
										<td class="{{ $door->is_locked == false ? 'unlocked' : 'locked' }}">
											{{ $door->is_locked == false ? 'Unlocked' : 'Locked' }}
										</td>
										<td>
											<div class="d-flex justify-content-end">
												<button type="button" class="btn btn-primary col-2"
													data-bs-toggle="modal" data-bs-target="#changeStatusModal"
													data-bs-door-id="{{ $door->id }}"
													data-bs-door-name="{{ $door->name }}"
													data-bs-door-status="{{ $door->is_locked }}">
													<div class="d-flex justify-content-start align-items-center">
														@if ($door->is_locked == false)
														<i class="fas fa-lock"></i>
														<span class="flex-grow-1">Lock</span>
														@else
														<i class="fas fa-lock-open"></i>
														<span class="flex-grow-1">Unlock</span>
														@endif
													</div>
												</button>

												<a href="{{ route('doors.edit', $door->id) }}"
													class="btn btn-info px-3 mx-2">
													<i class="far fa-edit"></i>
													<span>Edit</span>
												</a>

												<a href="#" class="btn btn-danger px-3" onclick="event.preventDefault();
														 document.getElementById('delete-form-{{ $loop->iteration }}').submit();">
													<i class="far fa-trash-alt"></i>
													<span>Delete</span>
												</a>
												<form id="status-form-{{ $door->id }}"
													action="{{ route('doors.update', $door->id) }}" method="POST">
													@csrf
													@method('PATCH')
													<input type="hidden" name="is_locked"
														value="{{ $door->is_locked == false ? 1 : 0}}">
													<input id="status-form-password-{{ $door->id }}" type="hidden" name="password">
												</form>
												<form id="delete-form-{{ $loop->iteration }}"
													action="{{ route('doors.destroy', $door->id) }}" method="POST">
													@csrf
													@method('DELETE')
												</form>
												</span>
											</div>
										</td>
									</tr>
									@endforeach
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
	<div class="modal fade" id="logoutModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
		aria-labelledby="logoutModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="logoutModalLabel">Logout from Account</h5>
					<button type="button" class="close btn-close" data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					Are you sure you want to logout?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
					document.getElementById('logout-form').submit();">Logout</a>
				</div>
			</div>
		</div>
	</div>
	<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
		@csrf
	</form>

	<!-- Door Modal -->
	<div class="modal fade" id="changeStatusModal" tabindex="-1" aria-labelledby="changeStatusModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="changeStatusModalLabel">Change Status Door Name</h5>
					<button type="button" class="close btn-close" data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="door-password-form" method="POST">
						@csrf
						<div class="mb-3">
							<label for="door-password" class="col-form-label">Password:</label>
							<input type="password" class="form-control" id="door-password" required>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
					<a id="changeStatusButton" href="#" class="btn btn-primary col-2">Change Status</a>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function () {
			$('#dataTable').DataTable();
		});

		var changeStatusModal = document.getElementById('changeStatusModal')
		changeStatusModal.addEventListener('show.bs.modal', function (event) {
  			// Button that triggered the modal
  			var button = event.relatedTarget
  			// Extract info from data-bs-* attributes
  			var doorId = button.getAttribute('data-bs-door-id')
			var doorName = button.getAttribute('data-bs-door-name')
			var doorStatus = button.getAttribute('data-bs-door-status')
  			// If necessary, you could initiate an AJAX request here
 		 	// and then do the updating in a callback.
  			//
  			// Update the modal's content.
			var changeStatus = doorStatus == false ? 'Lock' : 'Unlock'
			console.log(doorStatus)

			var changeStatusTitle = changeStatusModal.querySelector('#changeStatusModalLabel')
 		 	var changeStatusButton = changeStatusModal.querySelector('#changeStatusButton')
			var doorPasswordForm = changeStatusModal.querySelector('#door-password-form')

			changeStatusTitle.textContent = `${changeStatus} ${doorName}`
			changeStatusButton.textContent = changeStatus

			changeStatusButton.onclick = function(event) {
				var statusForm = document.getElementById(`status-form-${doorId}`)
				var statusFormPassword = statusForm.querySelector(`#status-form-password-${doorId}`)
				statusFormPassword.value = doorPasswordForm.querySelector('#door-password').value
				event.preventDefault();
				document.getElementById(`status-form-${doorId}`).submit();
			}
		})
	</script>
</body>

@endsection