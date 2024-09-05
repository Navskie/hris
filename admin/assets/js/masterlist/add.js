$(document).ready(function() {
  $("#addMaster").click(function(e) {
    e.preventDefault();

    var formData = $("#masterlistForm").serialize();

    $(this).text('Data Gathering...');

    function notif(title, message) {
      $(".notification").addClass("active");
      $(".title").text(title);
      $(".message").text(message);
    }

    $.ajax({
      type: "POST",
      url: "controller/master/add",
      data: formData,
      dataType: "json",
      success: function (response) {
        console.log(response.status)
        if (response.status === 'success') {
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