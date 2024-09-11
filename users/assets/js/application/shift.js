$(document).ready(function() {
  $("#submitChangeShift").click(function(e) {
    e.preventDefault();

    $(this).text('Processing...');

    var formData = $("#changeshiftForm").serialize();

    function notif(title, message) {
      $(".notification").addClass("active");
      $(".notification .title").text(title);
      $(".notification .message").text(message);
    }

    $.ajax({
      type: "POST",
      url: "controller/application/changeShift",
      data: formData,
      dataType: "json",
      success: function (response) {
        if (response.status === 'success') {
          $(".notification").removeClass("active");
          notif(response.title, response.message);
          setTimeout(() => {
            $(".notification").removeClass("active");
            window.location.reload();
          }, 3000);
        } else if (response.status === 'empty') {
          $(".notification").removeClass("active");
          notif(response.title, response.message);
          setTimeout(() => {
            $(".notification").removeClass("active");
            window.location.reload();
          }, 3000);
        } else {
          $(".notification").removeClass("active");
          notif(response.title, response.message);
          setTimeout(() => {
            $(".notification").removeClass("active");
            window.location.reload();
          }, 3000);
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.table(jqXHR)
      }
    });
  });
});