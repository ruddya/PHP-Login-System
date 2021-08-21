$(document)
	.on("submit", "form.js-register", function(event){
		event.preventDefault();

		// Get the form, input elements, and error div
		var $form = $(this);
		var $error = $(".js-error", $form);
		var $email_box = $("input[type='email']", $form);
		var $password_box = $("input[type='password']", $form);
		var $password2_box = $('#password-repeat-input', $form);

		// Clear any previous errors upon form submission
		clearErrors();

		var data = {
			email: $email_box.val(),
			password: $password_box.val(),
			password2: $password2_box.val()
		}

		if(data.email.length < 6) {
			$email_box.css("background-color", "#fff0f3");
			$error
				.text("Please enter a valid email address")
				.show();
			return false;
		} else if(data.password.length < 8) {
			$password_box.css("background-color", "#fff0f3");
			$password2_box.css("background-color", "#fff0f3");
			$error
				.text("Password must be at least 8 characters long")
				.show();
			return false;
		} else if(data.password != data.password2) {
			$password_box.css("background-color", "#fff0f3");
			$password2_box.css("background-color", "#fff0f3");
			$error
				.text("Passwords do not match")
				.show();
			return false;
		}

		// At this point the input is good, start AJAX process
		clearErrors();

		$.ajax({
			type: 'POST',
			url: 'ajax/register.php',
			data: data,
			dataType: 'json',
			async: true,
		})
		.done(function ajaxDone(data){
			// Whatever data is
			console.log(data);
			if(data.redirect !== undefined) {
				window.location = data.redirect;
			}
		})
		.fail(function ajaxFailed(e){
			// This failed
			console.log(e);
		})
		.always(function ajaxAlways(data){
			// Always do
			console.log('Always');
		})


		console.log(data);

		function clearErrors(){
			$("#email-input", $form).css('background-color', '#fff');
			$("#password-input", $form).css("background-color", "#fff");
			$("#password-repeat-input", $form).css("background-color", "#fff");
			$error.hide();
		}

		return false;
	});