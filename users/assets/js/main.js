$(document).ready(function() {
	var today = new Date();
	var minDate = today.toISOString().split('T')[0];

	$('#startDate').datepicker({
	dateFormat: 'yy-mm-dd',
	minDate: minDate,
	onSelect: function(selectedDate) {
		$('#endDate').datepicker('option', 'minDate', selectedDate);
	}
	});

  // Close sidebar when clicking outside
  $(document).on('click', function(event) {
		if (!$(event.target).closest('.sidebar, .openbtn').length) {
			$('.sidebar').removeClass('open');
			$('body').removeClass('overlay-active'); // Re-enable scrolling
		}
  });

  // Prevent sidebar from closing when clicking inside it
  $('.sidebar').on('click', function(event) {
		event.stopPropagation();
  });
  
  // Handle dropdown toggle
  $('.dropdown').on('click', function() {
		$(this).find('.dropdown-menu').toggleClass('show');
  });
  
  // Close dropdown when clicking outside
  $(document).on('click', function(event) {
		if (!$(event.target).closest('.dropdown').length) {
			$('.dropdown-menu').removeClass('show');
		}
  });

	var today = new Date();
	var minDate = today.toISOString().split('T')[0];

	$('#startDate').datepicker({
		dateFormat: 'yy-mm-dd',
		minDate: minDate,
		onSelect: function(selectedDate) {
			$('#endDate').datepicker('option', 'minDate', selectedDate);
		}
	});
	
	$('#endDate').datepicker({
		dateFormat: 'yy-mm-dd'
	});

	function formatTime(value) {
		// Remove non-digit characters
		var cleaned = value.replace(/\D/g, '');

		// Check if we have enough digits for hours and minutes
		if (cleaned.length < 4) {
			return cleaned; // Return the cleaned value as is if not enough digits
		}

		// Extract hours and minutes
		var hours = cleaned.slice(0, -2);
		var minutes = cleaned.slice(-2);

		// Format the time
		var formatted = hours.padStart(2, '0') + ':' + minutes.padStart(2, '0');

		// Add AM/PM
		var amPm = 'AM';
		if (parseInt(hours, 10) >= 12) {
			amPm = 'PM';
			if (parseInt(hours, 10) > 12) {
				hours -= 12;
			}
		}
		if (hours === '0') hours = '12'; // Handle midnight

		return formatted + ' ' + amPm;
	}

	$('input[name="originalTime"], input[name="newTime"]').on('input', function() {
		var formattedTime = formatTime($(this).val());
		$(this).val(formattedTime);
	});
});