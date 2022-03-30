$(function () {
	$("form").on("submit", function (e) {
		e.preventDefault();

		// console.log($("#input_email").val());
		let input_email = $("#input_email").val();

		$.ajax({
			url: "index_function.php",
			method: "POST",
			dataType: "json",
			data: {
				key: "validate_email",
				input_email,
			},
			success: function (response) {
				console.log(response);

				if (!response.status) {
					$(".status").text("error");
					$(".status").css("color", "red");
				} else {
					$(".status").text("success");
					$(".status").css("color", "green");
				}
			},
		});
	});
});
