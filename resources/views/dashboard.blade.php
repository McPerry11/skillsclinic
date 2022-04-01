@extends('_layout')

@section('body')
<div class="row justify-content-center">
	<div class="col-12 col-sm-9 col-md-7 col-lg-5 col-xxl-4">
		<div class="card mt-5">
			<div class="card-body">
				<div class="row">
					<div class="col">
						<h2>Hi, User!</h2>
					</div>
					<div class="col-5 col-sm-4 col-xl-3 d-grid justify-content-end">
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
					<div class="col-4 col-sm-3 d-flex justify-content-end">
						<button class="btn btn-primary btn-sm me-1" title="Edit" data-bs-toggle="modal" data-bs-target="#edittask">
							<i class="fa-solid fa-edit"></i>
						</button>
						<button class="btn btn-outline-danger btn-sm" title="Delete">
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
					<div class="col-4 col-sm-3 d-flex justify-content-end">
						<button class="btn btn-primary btn-sm me-1" title="Edit" data-bs-toggle="modal" data-bs-target="#edittask">
							<i class="fa-solid fa-edit"></i>
						</button>
						<button class="btn btn-outline-danger btn-sm" title="Delete">
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
					<div class="col-4 col-sm-3 d-flex justify-content-end">
						<button class="btn btn-primary btn-sm me-1" title="Edit" data-bs-toggle="modal" data-bs-target="#edittask">
							<i class="fa-solid fa-edit"></i>
						</button>
						<button class="btn btn-outline-danger btn-sm" title="Delete">
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
					<div class="col-4 col-sm-3 d-flex justify-content-end">
						<button class="btn btn-primary btn-sm me-1" title="Edit" data-bs-toggle="modal" data-bs-target="#edittask">
							<i class="fa-solid fa-edit"></i>
						</button>
						<button class="btn btn-outline-danger btn-sm" title="Delete">
							<i class="fa-solid fa-trash"></i>
						</button>
					</div>
				</div>

				<hr>
				<div class="row align-items-center mt-3">
					<div class="col">
						<div class="form-check">
							<input type="checkbox" class="form-check-input" id="task5" checked>
							<label class="form-check-label " for="task5"><del>Task 5</del></label>
						</div>
					</div>
					<div class="col-4 col-sm-3 d-flex justify-content-end">
						<button class="btn btn-primary btn-sm me-1" title="Edit" data-bs-toggle="modal" data-bs-target="#edittask">
							<i class="fa-solid fa-edit"></i>
						</button>
						<button class="btn btn-outline-danger btn-sm" title="Delete">
							<i class="fa-solid fa-trash"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<form class="modal fade" id="addtask">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Task</h5>
				<button class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<div class="form-floating mb-3">
					<input type="text" class="form-control" id="task" placeholder="Task Title" required>
					<label for="task">Task Title</label>
				</div>
				<div class="form-floating">
					<input type="datetime-local" class="form-control" id="datetime" placeholder="Date & Time" required>
					<label for="datetime">Date & Time</label>
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</div>
</form>

<form class="modal fade" id="edittask">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Task</h5>
				<button class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<div class="form-floating mb-3">
					<input type="text" class="form-control" id="task" placeholder="Task Title" required>
					<label for="task">Task Title</label>
				</div>
				<div class="form-floating">
					<input type="datetime-local" class="form-control" id="datetime" placeholder="Date & Time" required>
					<label for="datetime">Date & Time</label>
				</div>
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