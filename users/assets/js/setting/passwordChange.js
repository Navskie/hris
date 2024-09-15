$(document).ready(function() {
  $('#submitPassword').on('click', function(e) {
    e.preventDefault(); // Prevent the default form submission

    $(this).text("Please wait...")

    function notif(title, message, type) {
      // Add the notification to the DOM
      $(".notification").addClass("active").removeClass("success error").addClass(type);
      $(".notification .title").text(title);
      $(".notification .message").text(message);

      // Automatically hide the notification after 5 seconds
      setTimeout(function() {
        $(".notification").removeClass("active");
        window.location.reload();
      }, 5000);
    }

    $.ajax({
      url: 'controller/setting/password_change.php', // Replace with the actual path to your PHP script
      type: 'POST',
      data: $('#passwordForm').serialize(), // Serialize form data for submission
      dataType: 'json',
      success: function(response) {
        if (response.status === 'success') {
          notif('Success', response.message, 'success');
          // Optionally redirect or reset the form
          $('#passwordForm')[0].reset();
        } else {
          notif('Error', response.message, 'error');
        }
      },
      error: function(xhr, status, error) {
        console.error('Error:', error);
        notif('Error', 'An error occurred while processing your request.', 'error');
      }
    });
  });
});
