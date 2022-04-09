@extends('_layout')

@section('body')
<div class="row justify-content-center">
	<div class="col-12 col-sm-9 col-md-7 col-lg-5 col-xxl-4">
		<div class="card mt-5">
			<div class="card-body">
				<div class="row align-items-center">
					<div class="col">
						<h2>Hi, {{ $username }}!</h2>
					</div>
					<div class="col-5 col-sm-4 col-xl-3">
						<div class="d-grid d-flex justify-content-end align-items-center">
							<a href="{{ url('logout') }}" class="btn btn-outline-danger btn-sm" role="button">
								<i class="fa-solid fa-arrow-right-from-bracket"></i>
								Logout
							</a>
						</div>
					</div>
				</div>

				<p class="lead">Here are the things that you need to do:</p>
				<div class="d-grid">
					<button id="add" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#taskmodal">
						<i class="fa-solid fa-add"></i> Add New Task
					</button>
				</div>

				<hr>

				<div id="tasks">
					@if(count($tasks) > 0)
					@foreach($tasks as $task)
					@if($task->completed == 0)
					<div class="row align-items-center mt-3">
						<div class="col">
							<div class="form-check">
								<input type="checkbox" class="form-check-input" id="{{ $task->id }}" data-url="{{ url('update/' . $task->id) }}">
								<label class="form-check-label" for="{{ $task->id }}">{{ $task->name }}</label>
							</div>
							@if($task->duedate != null)
							<span class="ms-4 badge bg-danger">{{ \Carbon\Carbon::parse($task->duedate)->isoFormat('MMMM D, YYYY - h:mma') }}</span>
							@endif
						</div>
						<div class="col-4 col-sm-3 d-flex justify-content-end">
							<button class="edit btn btn-primary btn-sm me-1" title="Edit" data-url="{{ url('edit/' . $task->id) }}" data-id="{{ $task->id }}">
								<i class="fa-solid fa-edit"></i>
							</button>
							<button class="delete btn btn-outline-danger btn-sm" title="Delete" data-url="{{ url('delete/' . $task->id) }}" data-id="{{ $task->id }}" data-name="{{ $task->name }}">
								<i class="fa-solid fa-trash"></i>
							</button>
						</div>
					</div>
					@endif
					@endforeach
					@else
					<p class="text-center mt-3">No tasks available.</p>
					@endif
				</div>

				<hr id="taskdivider">
				<div id="complete">
					@if(count($tasks) > 0)
					@foreach($tasks as $task)
					@if($task->completed == 1)
					<div class="row align-items-center mt-3">
						<div class="col">
							<div class="form-check">
								<input type="checkbox" class="form-check-input" id="{{ $task->id }}" data-url="{{ url('update/' . $task->id) }}" checked>
								<label class="form-check-label " for="{{ $task->id }}"><del>{{ $task->name }}</del></label>
							</div>
							@if($task->duedate != null)
							<span class="ms-4 badge bg-danger">{{ \Carbon\Carbon::parse($task->duedate)->isoFormat('MMMM D, YYYY - h:mma') }}</span>
							@endif
						</div>
						<div class="col-4 col-sm-3 d-flex justify-content-end">
							<button class="edit btn btn-primary btn-sm me-1 invisible" title="Edit" data-url="{{ url('edit/' . $task->id) }}" data-id="{{ $task->id }}">
								<i class="fa-solid fa-edit"></i>
							</button>
							<button class="delete btn btn-outline-danger btn-sm" title="Delete" data-url="{{ url('delete/' . $task->id) }}" data-id="{{ $task->id }}" data-name="{{ $task->name }}">
								<i class="fa-solid fa-trash"></i>
							</button>
						</div>
					</div>
					@endif
					@endforeach
					@endif
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="loading" data-bs-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body text-center">
				<i class="fa-solid fa-spinner fa-spin fa-xl"></i>
			</div>
		</div>
	</div>
</div>

<form class="modal fade" id="taskmodal" data-bs-backdrop="static" data-edit="{{ url('update/') }}" data-add="{{ url('create') }}">
	@csrf
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Task</h5>
				<button class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<div class="form-floating mb-3">
					<input type="text" class="form-control" id="task" name="name" placeholder="Task Title" required>
					<label for="task">Task Title</label>
				</div>
				<div class="form-floating">
					<input type="datetime-local" class="form-control" id="datetime" name="duedate" placeholder="Date & Time">
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