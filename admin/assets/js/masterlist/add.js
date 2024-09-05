$(document).ready(function() {
  $("#addMaster").click(function(e) {
    e.preventDefault();

    var formData = $("#masterlistForm").serialize();

    $(this).text('Data Gathering...');

    function notif(title, message) {
      $(".notification").addClass("active");
      $(".notification .title").text(title);
      $(".notification .message").text(message);
    }

    $.ajax({
      type: "POST",
      url: "controller/master/add",
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