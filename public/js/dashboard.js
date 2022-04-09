$.ajaxSetup({
	header: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$(function() {
	var loading = new bootstrap.Modal(document.getElementById('loading'));
	var taskmodal = new bootstrap.Modal(document.getElementById('taskmodal'));
	var editid;

	if ($('#complete').children().length == 0)
		$('#taskdivider').addClass('invisible');
	else if ($('#tasks').children().length == 0)
		$('#tasks').html('<p class="text-center mt-3">No tasks available.</p>');

	$('.edit').click(function() {
		loading.show();
		editid = $(this).data('id');
		$('.modal-title').text('Edit Task');

		let url = $(this).data('url');
		$.ajax({
			type: 'POST',
			url: url,
			data: {'_token':$('meta[name="csrf-token"]').attr('content')},
			datatype: 'JSON',
			success: function(response) {
				console.log(response.task);
				$('#task').val(response.task.name);
				$('#datetime').val(response.task.duedate);
				loading.hide();
				taskmodal.show();
			},
			error: function(err) {
				console.error(err);
				Swal.fire({
					icon: 'error',
					title: 'Unexpected Error',
					text: 'Something went wrong. Please try again later.'
				});
			}
		});
	});

	$('#add').click(function() {
		$('.modal-title').text('Add Task');
		$('#task').val('');
		$('#duedate').val('');
	});

	$('.delete').click(function() {
		let taskname = $(this).data('name');
		let url = $(this).data('url');
		Swal.fire({
			icon: 'question',
			title: 'Delete ' + taskname + '?',
			text: 'This is an irreversible action. Are you sure you want to proceed?',
			confirmButtonText: 'Proceed',
			showCancelButton: true
		}).then((result) => {
			if (result.isConfirmed) {
				loading.show();

				$.ajax({
					type: 'POST',
					url: url,
					data: {'_token':$('meta[name="csrf-token"]').attr('content')},
					datatype: 'JSON',
					success: function(response) {
						Swal.fire({
							icon: response.status,
							title: response.msg,
							showConfirmButton: false,
							timer: 2500
						}).then(function() {
							window.location.reload();
						});
					},
					error: function(err) {
						console.error(err);
						Swal.fire({
							icon: 'error',
							title: 'Unexpected Error',
							text: 'Something went wrong. Please try again later.'
						});
					}
				});
			}
		});
	});

	$('form').submit(function(e) {
		e.preventDefault();
		let data = $(this).serialize();
		$('button[type="submit"]').html('<i class="fa-solid fa-spinner fa-spin"></i>');
		$('button').attr('disabled', true)
		$('input').attr('readonly', true);

		if ($('.modal-title').text() == 'Edit Task') {
			$.ajax({
				type: 'POST',
				url: $('#taskmodal').data('edit') + '/' + editid,
				data: data,
				datatype: 'JSON',
				success: function(response) {
					Swal.fire({
						icon: response.status,
						title: response.msg,
						showConfirmButton: false,
						timer: 2500
					}).then(function() {
						window.location.reload();
					});
				},
				error: function(err) {
					console.error(err);
					Swal.fire({
						icon: 'error',
						title: 'Unexpected Error',
						text: 'Something went wrong. Please try again later.'
					});

					$('button[type="submit"]').empty().text('Submit');
					$('button').removeAttr('disabled');
					$('input').removeAttr('readonly');
				}
			});
		} else {
			$.ajax({
				type: 'POST',
				url: $('#taskmodal').data('add'),
				data: data,
				datatype: 'JSON',
				success: function(response) {
					Swal.fire({
						icon: response.status,
						title: response.msg,
						showConfirmButton: false,
						timer: 2500
					}).then(function() {
						window.location.reload();
					});
				},
				error: function(err) {
					console.error(err);
					Swal.fire({
						icon: 'error',
						title: 'Unexpected Error',
						text: 'Something went wrong. Please try again later.'
					});

					$('button[type="submit"]').empty().text('Submit');
					$('button').removeAttr('disabled');
					$('input').removeAttr('readonly');
				}
			});
		}
	});

	$('input[type="checkbox"]').change(function() {
		let task = $(this).closest('.row');
		let id = $(this).attr('id');
		let url = $(this).data('url');
		if ($(this).prop('checked')) {
			$(this).closest('.row').fadeOut('fast', function() {
				$('#taskdivider').removeClass('invisible');
				$(this).find('.edit').addClass('invisible');

				let label = $(this).find('label').text();
				$(this).find('label').empty().html(`<del>${label}</del>`);
				$(this).prependTo('#complete').fadeIn('fast');
				if ($('#tasks').children().length == 0) {
					$('#tasks').html('<p class="text-center mt-3">No tasks available.</p>');
				}

				$.ajax({
					type: 'POST',
					url: url,
					data: {'_token':$('meta[name="csrf-token"]').attr('content'), 'completed':1},
				});
			});
		} else {
			$(this).closest('.row').fadeOut('fast', function() {
				$('#tasks').find('p').remove();
				$(this).find('.edit').removeClass('invisible');

				let label = $(this).find('del').text();
				$(this).find('label').empty().text(label);
				$(this).prependTo('#tasks').fadeIn('fast');
				if ($('#complete').children().length == 0) {
					$('#taskdivider').addClass('invisible');
				}

				$.ajax({
					type: 'POST',
					url: url,
					data: {'_token':$('meta[name="csrf-token"]').attr('content'), 'completed':0},
				});
			});
		}
	});
});
