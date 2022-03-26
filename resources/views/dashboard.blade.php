@extends('_layout')

@section('body')
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-4">
			<div class="card mt-5">
				<div class="card-body">

					<div class="row">
						<div class="col">
							<h2>Hi, User!</h2>
						</div>
						<div class="col-4 d-grid justify-content-end">
							<button class="btn btn-outline-danger btn-sm">
								<i class="fa-solid fa-arrow-right-from-bracket"></i>
								Logout
							</button>
						</div>
					</div>

					<p class="lead">Here are the things that you need to do:</p>
					<div class="d-grid">
						<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addtask">
							<i class="fa-solid fa-add"></i> Add New Task
						</button>
					</div>

					<div class="row align-items-center mt-3">
						<div class="col">
							<div class="form-check">
								<input type="checkbox" class="form-check-input" id="task1">
								<label class="form-check-label" for="task1">Task 1</label>
							</div>
						</div>
						<div class="col-2 d-grid justify-content-end">
							<button class="btn btn-outline-danger btn-sm">
								<i class="fa-solid fa-trash"></i>
							</button>
						</div>
					</div>

					<div class="row align-items-center mt-3">
						<div class="col">
							<div class="form-check">
								<input type="checkbox" class="form-check-input" id="task2">
								<label class="form-check-label" for="task2">Task 2</label>
							</div>
							<span class="ms-4 badge bg-danger">April 1, 2022</span>
						</div>
						<div class="col-2 d-grid justify-content-end">
							<button class="btn btn-outline-danger btn-sm">
								<i class="fa-solid fa-trash"></i>
							</button>
						</div>
					</div>
					
					<div class="row align-items-center mt-3">
						<div class="col">
							<div class="form-check">
								<input type="checkbox" class="form-check-input" id="task3">
								<label class="form-check-label" for="task3">Task 3</label>
							</div>
						</div>
						<div class="col-2 d-grid justify-content-end">
							<button class="btn btn-outline-danger btn-sm">
								<i class="fa-solid fa-trash"></i>
							</button>
						</div>
					</div>
					
					<div class="row align-items-center mt-3">
						<div class="col">
							<div class="form-check">
								<input type="checkbox" class="form-check-input" id="task4">
								<label class="form-check-label" for="task4">Task 4</label>
							</div>
						</div>
						<div class="col-2 d-grid justify-content-end">
							<button class="btn btn-outline-danger btn-sm">
								<i class="fa-solid fa-trash"></i>
							</button>
						</div>
					</div>
					
					<div class="row align-items-center mt-3">
						<div class="col">
							<div class="form-check">
								<input type="checkbox" class="form-check-input" id="task5" checked>
								<label class="form-check-label " for="task5"><del>Task 5</del></label>
							</div>
						</div>
						<div class="col-2 d-grid justify-content-end">
							<button class="btn btn-outline-danger btn-sm">
								<i class="fa-solid fa-trash"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<form class="modal fade" id="addtask">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Task</h5>
				<button class="btn-close" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body">
				<label for="task" class="form-label">Task Title</label>
				<input type="text" class="form-control" id="task" required>

				<label for="datetime" class="form-label mt-3">Date & Time</label>
				<input type="datetime-local" class="form-control" id="datetime" requried>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</div>
</form>
@endsection

@section('scripts')
<script src="{{ asset('js/dashboard.js') }}"></script>
@endsection