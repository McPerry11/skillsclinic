$(function() {
	$('form').submit(function(e) {
		e.preventDefault();
		$('button').html('<i class="fa-solid fa-spinner fa-spin"></i>').attr('disabled', true);
		$('input').attr('readonly', true);

		let data = $(this).serialize();
		$.ajax({
			type: 'POST',
			url: 'login',
			data: data,
			datatype: 'JSON',
			success: function(response) {
				Swal.fire({
					icon: response.status,
					title: response.msg,
					showConfirmButton: false,
					timer: 2500
				}).then(function() {
					if (response.status == 'success')
						window.location.href = $('#login').data('url');
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
		}).done(function() {
			$('button').empty().text('LOG IN').removeAttr('disabled');
			$('input').removeAttr('readonly');
		});
	});
});